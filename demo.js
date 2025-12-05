'use client';

import React, { useEffect, useState } from 'react';
import { ChevronDown, X } from 'lucide-react';

interface ProductFiltersProps {
  selectedCategory: string;
  selectedPriceRange: string;
  selectedRating: number;
  onCategoryChange: (category: string) => void;
  onPriceRangeChange: (range: string) => void;
  onRatingChange: (rating: number) => void;
  onClearFilters: () => void;
}

const API_BASE = process.env.NEXT_PUBLIC_API_BASE_URL ?? '';

export default function ProductFilters({
  selectedCategory,
  selectedPriceRange,
  selectedRating,
  onCategoryChange,
  onPriceRangeChange,
  onRatingChange,
  onClearFilters,
}: ProductFiltersProps) {
  const [openSections, setOpenSections] = useState({
    category: true,
    price: true,
    rating: true,
  });

  const [categories, setCategories] = useState<{ id: string; name: string; count?: number }[]>([]);
  const [loading, setLoading] = useState<boolean>(false);
  const [error, setError] = useState<string | null>(null);

 useEffect(() => {
  const fetchCategories = async () => {
    setLoading(true);
    setError(null);

    const rawBase = String(API_BASE ?? '').trim();
    const absBase = rawBase ? rawBase.replace(/\/$/, '') : '';
    const absoluteUrl = absBase ? `${absBase}/api/categories` : '';
    const relativeUrl = '/api/categories';

    console.log('[ProductFilters] API_BASE:', JSON.stringify(API_BASE));
    console.log('[ProductFilters] trying absolute:', absoluteUrl || '(skipped)');
    console.log('[ProductFilters] trying relative:', relativeUrl);
    console.log('[ProductFilters] window.location.origin:', typeof window !== 'undefined' ? window.location.origin : 'no window');

    const tryFetch = async (url: string, timeoutMs = 8000) => {
      const controller = new AbortController();
      const timeout = setTimeout(() => controller.abort(), timeoutMs);
      try {
        const res = await fetch(url, { signal: controller.signal, credentials: 'same-origin' });
        clearTimeout(timeout);
        return res;
      } catch (err) {
        clearTimeout(timeout);
        throw err;
      }
    };

    try {
      let res: Response | null = null;
      let lastErr: any = null;

      if (absoluteUrl) {
        try {
          res = await tryFetch(absoluteUrl);
        } catch (err) {
          lastErr = err;
          console.warn('[ProductFilters] absolute fetch failed:', err);
        }
      }

      if (!res) {
        try {
          res = await tryFetch(relativeUrl);
        } catch (err) {
          lastErr = err;
          console.warn('[ProductFilters] relative fetch failed:', err);
        }
      }

      if (!res) {
        // both attempts failed (network/CORS)
        throw lastErr ?? new Error('No response from API (both absolute & relative failed).');
      }

      // If 404: treat as "no categories" but keep a warning message
      if (res.status === 404) {
        const bodyText = await res.text().catch(() => null);
        console.warn('[ProductFilters] /api/categories returned 404. Body:', bodyText);
        setCategories([]);
        setError('Categories not found (404). Check API route.');
        return;
      }

      if (!res.ok) {
        const bodyText = await res.text().catch(() => null);
        console.error('[ProductFilters] fetch failed:', res.status, res.statusText, 'body:', bodyText);
        setError(`API error: ${res.status} ${res.statusText}`);
        setCategories([]);
        return;
      }

      const json = await res.json().catch(() => null);
      console.log('[ProductFilters] categories JSON:', json ?? res);

      let data: any[] = [];
      if (json && json.success && Array.isArray(json.data)) {
        data = json.data;
      } else if (Array.isArray(json)) {
        data = json;
      } else if (json && Array.isArray(json.categories)) {
        data = json.categories;
      } else {
        // Unexpected shape — leave empty but log it
        const txt = typeof json === 'string' ? json : JSON.stringify(json);
        console.warn('[ProductFilters] Unexpected response shape for categories:', txt);
      }

      const mapped = (data || []).map((c: any) => ({
        id: c._id ?? c.id ?? String(c.id ?? c._id ?? c.name),
        name: c.name ?? c.title ?? 'Unnamed',
        count: c.count ?? undefined,
      }));

      setCategories(mapped);
    } catch (err: any) {
      console.error('[ProductFilters] final fetch error:', err);
      setError(err?.message ? String(err.message) : 'Failed to load categories');
      setCategories([]);
    } finally {
      setLoading(false);
    }
  };

  fetchCategories();
}, []);


  const toggleSection = (section: keyof typeof openSections) => {
    setOpenSections((prev) => ({ ...prev, [section]: !prev[section] }));
  };

  const hasActiveFilters =
    selectedCategory !== 'all' || selectedPriceRange !== 'all' || selectedRating > 0;

  const priceRanges = [
    { id: 'all', label: 'All' },
    { id: 'under-100', label: 'Under ₹100' },
    { id: '100-200', label: '₹100 - ₹200' },
    { id: '200-300', label: '₹200 - ₹300' },
    { id: '300-400', label: '₹300 - ₹400' },
    { id: 'above-400', label: 'Above ₹400' },
  ];

  return (
    <div className="bg-white rounded-2xl soft-shadow p-6">
      {/* Header */}
      <div className="flex items-center justify-between mb-6">
        <h3 className="text-lg font-semibold text-[#111827]">Filters</h3>
        {hasActiveFilters && (
          <button
            onClick={onClearFilters}
            className="text-sm text-[#D97706] hover:text-[#7CB342] font-medium flex items-center gap-1"
          >
            <X size={16} />
            Clear All
          </button>
        )}
      </div>

      {/* Category Filter */}
      <div className="mb-6">
        <button
          onClick={() => toggleSection('category')}
          className="flex items-center justify-between w-full mb-3"
        >
          <h4 className="font-medium text-[#111827]">Category</h4>
          <ChevronDown size={18} className={`transition-transform ${openSections.category ? 'rotate-180' : ''}`} />
        </button>

        {openSections.category && (
          <div className="space-y-2">
            {loading ? (
              <div className="text-sm text-gray-500">Loading categories...</div>
            ) : error ? (
              <div className="text-sm text-red-500">{error}</div>
            ) : categories.length === 0 ? (
              <div className="text-sm text-gray-500">No categories</div>
            ) : (
              categories.map((cat) => (
                <label key={cat.id} className="flex items-center justify-between cursor-pointer group">
                  <div className="flex items-center gap-2">
                    <input
                      type="radio"
                      name="category"
                      value={cat.id}
                      checked={selectedCategory === cat.id}
                      onChange={(e) => onCategoryChange(e.target.value)}
                      className="w-4 h-4 text-[#D97706] focus:ring-[#D97706]"
                    />
                    <span className="text-sm text-gray-700 group-hover:text-[#D97706] transition-colors">
                      {cat.name}
                    </span>
                  </div>
                  <span className="text-xs text-gray-400">({cat.count ?? '—'})</span>
                </label>
              ))
            )}
          </div>
        )}
      </div>

      {/* Price Range Filter */}
      <div className="mb-6 pb-6 border-b border-gray-100">
        <button
          onClick={() => toggleSection('price')}
          className="flex items-center justify-between w-full mb-3"
        >
          <h4 className="font-medium text-[#111827]">Price Range</h4>
          <ChevronDown size={18} className={`transition-transform ${openSections.price ? 'rotate-180' : ''}`} />
        </button>

        {openSections.price && (
          <div className="space-y-2">
            {priceRanges.map((range) => (
              <label key={range.id} className="flex items-center gap-2 cursor-pointer group">
                <input
                  type="radio"
                  name="priceRange"
                  value={range.id}
                  checked={selectedPriceRange === range.id}
                  onChange={(e) => onPriceRangeChange(e.target.value)}
                  className="w-4 h-4 text-[#D97706] focus:ring-[#D97706]"
                />
                <span className="text-sm text-gray-700 group-hover:text-[#D97706] transition-colors">
                  {range.label}
                </span>
              </label>
            ))}
          </div>
        )}
      </div>

      {/* Rating Filter */}
      <div>
        <button
          onClick={() => toggleSection('rating')}
          className="flex items-center justify-between w-full mb-3"
        >
          <h4 className="font-medium text-[#111827]">Minimum Rating</h4>
          <ChevronDown size={18} className={`transition-transform ${openSections.rating ? 'rotate-180' : ''}`} />
        </button>

        {openSections.rating && (
          <div className="space-y-2">
            {[4.5, 4.0, 3.5, 3.0].map((rating) => (
              <label key={rating} className="flex items-center gap-2 cursor-pointer group">
                <input
                  type="radio"
                  name="rating"
                  value={rating}
                  checked={selectedRating === rating}
                  onChange={(e) => onRatingChange(parseFloat(e.target.value))}
                  className="w-4 h-4 text-[#D97706] focus:ring-[#D97706]"
                />
                <div className="flex items-center gap-1">
                  <span className="text-sm text-gray-700 group-hover:text-[#D97706] transition-colors">
                    {rating}
                  </span>
                  <span className="text-[#FFB800]">★</span>
                  <span className="text-sm text-gray-500">& above</span>
                </div>
              </label>
            ))}
            <label className="flex items-center gap-2 cursor-pointer group">
              <input
                type="radio"
                name="rating"
                value={0}
                checked={selectedRating === 0}
                onChange={() => onRatingChange(0)}
                className="w-4 h-4 text-[#D97706] focus:ring-[#D97706]"
              />
              <span className="text-sm text-gray-700 group-hover:text-[#D97706] transition-colors">All Ratings</span>
            </label>
          </div>
        )}
      </div>
    </div>
  );
}