<?php
// Start session for flash messages
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$pageTitle = "Blog & Resources - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
$posts = loadData($_SERVER['DOCUMENT_ROOT'] . '/data/blog.json');

// Debugging - ensure posts is always an array
if (!is_array($posts)) {
    $posts = [];
}

// Extract categories and counts
$categories = [];
foreach ($posts as $post) {
    $cat = $post['category'] ?? 'Uncategorized';
    $categories[$cat] = ($categories[$cat] ?? 0) + 1;
}

// Category filter
$selectedCategory = $_GET['category'] ?? null;
$filteredPosts = $posts;

// Search query
$searchQuery = trim($_GET['q'] ?? '');
if ($searchQuery) {
    $filteredPosts = array_filter($filteredPosts, function ($p) use ($searchQuery) {
        $queryLower = strtolower($searchQuery);
        return
            str_contains(strtolower($p['title'] ?? ''), $queryLower) ||
            str_contains(strtolower($p['excerpt'] ?? ''), $queryLower) ||
            str_contains(strtolower($p['content'] ?? ''), $queryLower) ||
            str_contains(strtolower(implode(' ', $p['tags'] ?? [])), $queryLower);
    });
}

if ($selectedCategory) {
    $filteredPosts = array_filter($posts, fn($p) => ($p['category'] ?? '') === $selectedCategory);
}

// Pagination setup
$postsPerPage = 6;
$currentPage = max(1, (int) ($_GET['page'] ?? 1));
$totalPosts = count($filteredPosts);
$totalPages = max(1, ceil($totalPosts / $postsPerPage));

$offset = ($currentPage - 1) * $postsPerPage;
$paginatedPosts = array_slice($filteredPosts, $offset, $postsPerPage);

// Popular posts (latest 3)
usort($posts, fn($a, $b) => strtotime($b['date'] ?? '2025-09-27') - strtotime($a['date'] ?? '2025-09-27'));
$popularPosts = array_slice($posts, 0, 3);
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="relative text-white py-20 animate-fade-in">
    <div class="absolute inset-0 z-0">
        <img src="<?php echo BASE_PATH . '/assets/blogs/blogs-header.jpg' ?>"
            alt="Blogs" class="w-full h-full object-cover animate-zoom-in">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-teal-500 opacity-90"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center animate-slide-up">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">Blog & Resources</h1>
        <p class="text-xl max-w-3xl mx-auto animate-fade-in-delay">Insights, tips, and strategies to enhance your soft
            skills journey in the Indian professional landscape.</p>
    </div>
</section>

<!-- Blog Grid with Sidebar -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
            <!-- Main Blog Grid -->
            <div class="lg:col-span-3">
                <h2 class="text-3xl font-bold mb-8">Latest Articles</h2>

                <?php if ($totalPosts > 0): ?>
                    <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-8">
                        <?php foreach ($paginatedPosts as $post): ?>
                            <article
                                class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group flex flex-col h-full">
                                <div class="h-48 overflow-hidden">
                                    <img src="<?php echo BASE_PATH . htmlspecialchars($post['image'] ?? ''); ?>"
                                        alt="<?php echo htmlspecialchars($post['title'] ?? ''); ?>"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                </div>

                                <div class="p-6 flex flex-col flex-grow">
                                    <div class="text-sm text-gray-500 mb-3">
                                        <?php echo date('M d, Y', strtotime($post['date'] ?? 'now')); ?>
                                        <span class="mx-2">•</span>
                                        <?php echo htmlspecialchars($post['category'] ?? ''); ?>
                                    </div>

                                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                                        <?php echo htmlspecialchars($post['title'] ?? ''); ?>
                                    </h3>

                                    <p class="text-gray-600 text-sm mb-5 line-clamp-3 flex-grow">
                                        <?php echo htmlspecialchars($post['excerpt'] ?? ''); ?>
                                    </p>

                                    <a href="post.php?id=<?php echo urlencode($post['id']); ?>"
                                        class="text-blue-600 font-semibold text-sm inline-flex items-center hover:text-blue-800 mt-auto">
                                        Read More
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <!-- Pagination (unchanged - kept as is since it works well) -->
                    <?php if ($totalPages > 1): ?>
                        <nav class="mt-12 flex justify-center" aria-label="Pagination">
                            <ul class="inline-flex items-center -space-x-px rounded-lg shadow-sm bg-white">
                                <!-- Previous -->
                                <li>
                                    <?php if ($currentPage > 1): ?>
                                        <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $currentPage - 1])); ?>"
                                            class="px-4 py-3 text-gray-700 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-900 transition flex items-center">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                            Previous
                                        </a>
                                    <?php else: ?>
                                        <span
                                            class="px-4 py-3 text-gray-400 bg-gray-50 border border-gray-300 rounded-l-lg cursor-not-allowed flex items-center">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                            Previous
                                        </span>
                                    <?php endif; ?>
                                </li>

                                <!-- Page numbers (simplified logic remains same) -->
                                <?php
                                $startPage = max(1, $currentPage - 2);
                                $endPage = min($totalPages, $currentPage + 4);
                                if ($startPage > 1): ?>
                                    <li><a href="?<?php echo http_build_query(array_merge($_GET, ['page' => 1])); ?>"
                                            class="px-4 py-3 border border-gray-300 hover:bg-gray-100 transition">1</a></li>
                                    <?php if ($startPage > 2): ?>
                                        <li><span class="px-4 py-3 text-gray-500">...</span></li><?php endif; ?>
                                <?php endif; ?>

                                <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                                    <li>
                                        <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $i])); ?>"
                                            class="px-4 py-3 border border-gray-300 hover:bg-gray-100 transition <?php echo $i === $currentPage ? 'bg-blue-600 text-white hover:bg-blue-700' : 'bg-white text-gray-700'; ?>">
                                            <?php echo $i; ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($endPage < $totalPages): ?>
                                    <?php if ($endPage < $totalPages - 1): ?>
                                        <li><span class="px-4 py-3 text-gray-500">...</span></li><?php endif; ?>
                                    <li><a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $totalPages])); ?>"
                                            class="px-4 py-3 border border-gray-300 hover:bg-gray-100 transition bg-white text-gray-700"><?php echo $totalPages; ?></a>
                                    </li>
                                <?php endif; ?>

                                <!-- Next -->
                                <li>
                                    <?php if ($currentPage < $totalPages): ?>
                                        <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $currentPage + 1])); ?>"
                                            class="px-4 py-3 text-gray-700 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-900 transition flex items-center">
                                            Next
                                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    <?php else: ?>
                                        <span
                                            class="px-4 py-3 text-gray-400 bg-gray-50 border border-gray-300 rounded-r-lg cursor-not-allowed flex items-center">
                                            Next
                                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </span>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </nav>
                    <?php endif; ?>

                <?php else: ?>
                    <p class="text-center text-gray-600 py-12">No blog posts available at the moment. Please check back
                        later.</p>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <aside class="space-y-8">
                <!-- Search -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-bold mb-4">Search Articles</h3>
                    <form action="index.php" method="get" class="relative">
                        <input type="text" name="q" value="<?php echo htmlspecialchars($_GET['q'] ?? ''); ?>"
                            placeholder="Search articles..."
                            class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="submit"
                            class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>
                    <div class="mt-4">
                        <?php echo '<div class="mb-8 text-center"><p class="text-lg text-gray-700">(' . count($filteredPosts) . ' results found)</p></div>';
                        ?>
                    </div>
                </div>

                <!-- Categories -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-bold mb-4">Categories</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="?"
                                class="flex justify-between items-center px-4 py-2 rounded-lg <?php echo !$selectedCategory ? 'bg-blue-50 text-blue-700' : 'hover:bg-gray-100'; ?>">
                                <span>All Posts</span>
                                <span
                                    class="text-xs bg-gray-200 px-2 py-1 rounded-full"><?php echo count($posts); ?></span>
                            </a>
                        </li>
                        <?php foreach ($categories as $cat => $count): ?>
                            <li>
                                <a href="?category=<?php echo urlencode($cat); ?>"
                                    class="flex justify-between items-center px-4 py-2 rounded-lg <?php echo $selectedCategory === $cat ? 'bg-blue-50 text-blue-700' : 'hover:bg-gray-100'; ?>">
                                    <span><?php echo htmlspecialchars($cat); ?></span>
                                    <span class="text-xs bg-gray-200 px-2 py-1 rounded-full"><?php echo $count; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Popular Posts -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-bold mb-4">Popular Posts</h3>
                    <div class="space-y-5">
                        <?php foreach ($popularPosts as $p): ?>
                            <a href="post.php?id=<?php echo urlencode($p['id']); ?>" class="flex gap-4 group">
                                <div class="flex-shrink-0">
                                    <img src="<?php echo BASE_PATH . htmlspecialchars($p['image']); ?>"
                                        alt="<?php echo htmlspecialchars($p['title']); ?>"
                                        class="w-20 h-20 rounded-lg object-cover">
                                </div>
                                <div class="flex-grow">
                                    <h4 class="text-sm font-semibold line-clamp-2 group-hover:text-blue-600 transition">
                                        <?php echo htmlspecialchars($p['title']); ?>
                                    </h4>
                                    <p class="text-xs text-gray-500 mt-1">
                                        <?php echo date('M d, Y', strtotime($p['date'])); ?>
                                    </p>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- Newsletter Signup -->
<section class="bg-gradient-to-br from-blue-50 to-teal-50">
    <div class="max-w-screen">
        <div class="bg-gradient-to-br from-blue-500 to-teal-500 shadow-lg p-16 text-white text-center">
            <h2 class="text-3xl font-bold mb-4">Stay Updated</h2>
            <p class="text-xl mb-6 max-w-2xl mx-auto">Subscribe to our newsletter for the latest
                articles, tips, and
                resources delivered to your inbox.</p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-2xl mx-auto">
                <input type="email" placeholder="Your email address"
                    class="flex-grow px-4 py-3 rounded-lg text-gray-800 focus:outline-none">
                <button type="submit"
                    class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-6 rounded-lg transition duration-300">Subscribe</button>
            </form>
        </div>
    </div>
</section>


<style>
    /* Animation classes */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(50px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes zoomIn {
        from {
            transform: scale(1.1);
        }

        to {
            transform: scale(1);
        }
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }
    }

    @keyframes pulseSlow {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.8;
        }
    }

    @keyframes rotateIn {
        from {
            transform: rotate(-45deg);
            opacity: 0;
        }

        to {
            transform: rotate(0);
            opacity: 1;
        }
    }

    /* Base animation classes */
    .animate-fade-in {
        animation: fadeIn 0.8s ease-out forwards;
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }

    .animate-fade-in-down {
        animation: fadeInDown 0.6s ease-out forwards;
        opacity: 0;
    }

    .animate-fade-in-left {
        animation: fadeInLeft 0.6s ease-out forwards;
        opacity: 0;
    }

    .animate-slide-up {
        animation: slideUp 0.8s ease-out forwards;
        opacity: 0;
    }

    .animate-zoom-in {
        animation: zoomIn 1.2s ease-out forwards;
    }

    .animate-bounce {
        animation: bounce 3s ease-in-out infinite;
    }

    .animate-pulse {
        animation: pulse 1s ease-in-out infinite;
    }

    .animate-pulse-slow {
        animation: pulseSlow 2s ease-in-out infinite;
    }

    .animate-rotate-in {
        animation: rotateIn 0.5s ease-out forwards;
        opacity: 0;
    }

    /* Delay classes */
    .delay-1 {
        animation-delay: 0.1s;
    }

    .delay-2 {
        animation-delay: 0.2s;
    }

    .delay-3 {
        animation-delay: 0.3s;
    }

    .delay-4 {
        animation-delay: 0.4s;
    }

    .animate-fade-in-delay {
        animation: fadeIn 0.8s ease-out 0.3s forwards;
        opacity: 0;
    }

    .animate-fade-in-delay-2 {
        animation: fadeIn 0.8s ease-out 0.6s forwards;
        opacity: 0;
    }

    /* Ensure elements with delayed animations are initially hidden */
    .animate-fade-in-up,
    .animate-fade-in-down,
    .animate-fade-in-left,
    .animate-slide-up,
    .animate-fade-in-delay,
    .animate-fade-in-delay-2 {
        opacity: 0;
    }

    /* Stagger animations for cards */
    .mission-vision-container>div:nth-child(1) {
        animation-delay: 0.1s;
    }

    .mission-vision-container>div:nth-child(2) {
        animation-delay: 0.2s;
    }

    .approach-container .approach-card:nth-child(1) {
        animation-delay: 0.1s;
    }

    .approach-container .approach-card:nth-child(2) {
        animation-delay: 0.2s;
    }

    .approach-container .approach-card:nth-child(3) {
        animation-delay: 0.3s;
    }

    .trainer-container .trainer-card:nth-child(3n+1) {
        animation-delay: 0.1s;
    }

    .trainer-container .trainer-card:nth-child(3n+2) {
        animation-delay: 0.2s;
    }

    .trainer-container .trainer-card:nth-child(3n+3) {
        animation-delay: 0.3s;
    }

    .choose-us-container>div:nth-child(1) {
        animation-delay: 0.1s;
    }

    .choose-us-container>div:nth-child(2) {
        animation-delay: 0.2s;
    }

    .choose-us-container>div:nth-child(3) {
        animation-delay: 0.3s;
    }

    .choose-us-container>div:nth-child(4) {
        animation-delay: 0.4s;
    }
</style>

<script>
    // Intersection Observer for animations
    document.addEventListener('DOMContentLoaded', function () {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements with fade-in-up animations
        document.querySelectorAll('.animate-fade-in-up').forEach(el => {
            observer.observe(el);
        });

        // Observe elements with fade-in-left animations
        document.querySelectorAll('.animate-fade-in-left').forEach(el => {
            observer.observe(el);
        });

        // Observe elements with slide animations
        document.querySelectorAll('.animate-slide-up').forEach(el => {
            observer.observe(el);
        });
    });
</script>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/components/layout.php';
?>