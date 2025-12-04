// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent event from bubbling to document
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
            // Check if click was outside the menu and button
            if (!mobileMenu.contains(event.target) && mobileMenuButton !== event.target && !mobileMenuButton.contains(event.target)) {
                mobileMenu.classList.add('hidden');
            }
        }
    });
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Counter animation for trust indicators
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.counter');
    
    const animateCounter = (counter) => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        
        const increment = target / 100;
        
        if (count < target) {
            counter.innerText = Math.ceil(count + increment);
            setTimeout(() => animateCounter(counter), 20);
        } else {
            counter.innerText = target.toLocaleString();
        }
    };
    
    // Check if counters are in viewport
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                counters.forEach(counter => {
                    animateCounter(counter);
                });
                observer.disconnect(); // Stop observing after animation
            }
        });
    }, { threshold: 0.5 });
    
    if (counters.length > 0) {
        observer.observe(counters[0].parentElement.parentElement);
    }
});

// Enhanced hover effects for cards
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects to testimonial cards
    const testimonialCards = document.querySelectorAll('.bg-white.rounded-xl.shadow-md');
    testimonialCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Add hover effects to trainer cards
    const trainerCards = document.querySelectorAll('.bg-white.rounded-xl.shadow-md.overflow-hidden');
    trainerCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Add hover effects to blog post cards
    const blogCards = document.querySelectorAll('.bg-gradient-to-br.from-gray-50.to-white.rounded-xl');
    blogCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Add hover effects to story cards
    const storyCards = document.querySelectorAll('.bg-gradient-to-br.from-gray-50.to-white.rounded-xl.overflow-hidden');
    storyCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});

// Dropdown menu handling
document.addEventListener('DOMContentLoaded', function() {
    const dropdowns = document.querySelectorAll('.dropdown');
    
    dropdowns.forEach(dropdown => {
        const menu = dropdown.querySelector('.dropdown-menu');
        
        if (menu) {
            // Prevent menu from closing immediately when moving between trigger and menu
            let closeTimeout;
            
            dropdown.addEventListener('mouseenter', function() {
                clearTimeout(closeTimeout);
                menu.style.display = 'block';
            });
            
            dropdown.addEventListener('mouseleave', function() {
                closeTimeout = setTimeout(() => {
                    menu.style.display = 'none';
                }, 300); // Delay before closing
            });
            
            // Keep menu open when hovering over it
            menu.addEventListener('mouseenter', function() {
                clearTimeout(closeTimeout);
            });
            
            menu.addEventListener('mouseleave', function() {
                closeTimeout = setTimeout(() => {
                    menu.style.display = 'none';
                }, 300); // Delay before closing
            });
        }
    });
});