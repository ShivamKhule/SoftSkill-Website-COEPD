<?php
$pageTitle = "FAQ - SoftSkills Academy";

// Include configuration file
require_once __DIR__ . '/../config.php';

include __DIR__ . '/../includes/functions.php';
$faqs = loadData(__DIR__ . '/../data/faqs.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20 animate-fade-in">
    <div class="container mx-auto px-4 text-center animate-slide-up">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">Frequently Asked Questions</h1>
        <p class="text-xl max-w-3xl mx-auto animate-fade-in-delay">Find answers to common questions about our training programs.</p>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 faq-container">
                <?php foreach ($faqs as $index => $faq): ?>
                    <div class="animate-fade-in-up delay-<?php echo (($index % 2) + 1); ?>">
                        <div class="border border-gray-200 rounded-xl overflow-hidden shadow-md transform hover:scale-[1.02] transition-all duration-300" data-faq-item>
                            <button
                                class="w-full flex justify-between items-center p-6 text-left bg-gradient-to-r from-gray-50 to-white hover:from-blue-50 hover:to-teal-50 transition duration-300"
                                data-faq-button>
                                <h3 class="text-lg font-bold text-gray-800"><?php echo $faq['question']; ?></h3>
                                <i class="fas fa-chevron-down text-blue-600 transition duration-300 transform"></i>
                            </button>
                            <div class="bg-gray-50 p-6 border-t border-gray-200 hidden" data-faq-content>
                                <p class="text-gray-600"><?php echo $faq['answer']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>

<!-- Additional Information -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Important Information</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Additional details about our training programs and policies.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto additional-info-container">
            <div class="bg-white p-6 rounded-xl shadow-md transform hover:scale-105 transition-all duration-300 additional-info-card animate-fade-in-up delay-1">
                <div class="text-blue-600 text-2xl mb-4">
                    <i class="fas fa-file-contract animate-bounce"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Cancellation Policy</h3>
                <p class="text-gray-600">Full refunds available up to 7 days before the program starts. After that,
                    credits can be applied to future programs.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md transform hover:scale-105 transition-all duration-300 additional-info-card animate-fade-in-up delay-2">
                <div class="text-blue-600 text-2xl mb-4">
                    <i class="fas fa-certificate animate-bounce"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Certification Requirements</h3>
                <p class="text-gray-600">Certificates are awarded to participants who attend at least 80% of sessions
                    and complete all assignments.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md transform hover:scale-105 transition-all duration-300 additional-info-card animate-fade-in-up delay-3">
                <div class="text-blue-600 text-2xl mb-4">
                    <i class="fas fa-laptop animate-bounce"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Technical Requirements</h3>
                <p class="text-gray-600">For online sessions, stable internet connection and modern browser required.
                    Detailed setup instructions provided upon enrollment.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md transform hover:scale-105 transition-all duration-300 additional-info-card animate-fade-in-up delay-4">
                <div class="text-blue-600 text-2xl mb-4">
                    <i class="fas fa-users animate-bounce"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Group Discounts</h3>
                <p class="text-gray-600">Special pricing available for groups of 3 or more participants from the same
                    organization. Contact us for details.</p>
            </div>
        </div>
    </div>
</section>

<style>
    /* Animation classes */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
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
    
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5px);
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
    
    .animate-slide-up {
        animation: slideUp 0.8s ease-out forwards;
        opacity: 0;
    }
    
    .animate-bounce {
        animation: bounce 1s ease-in-out infinite;
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
    
    /* Ensure elements with delayed animations are initially hidden */
    .animate-fade-in-up,
    .animate-fade-in-down,
    .animate-slide-up,
    .animate-fade-in-delay {
        opacity: 0;
    }
    
    /* Stagger animations for FAQ items */
    .faq-container > div:nth-child(odd) { animation-delay: 0.1s; }
    .faq-container > div:nth-child(even) { animation-delay: 0.2s; }
    
    /* Stagger animations for additional info cards */
    .additional-info-container .additional-info-card:nth-child(1) { animation-delay: 0.1s; }
    .additional-info-container .additional-info-card:nth-child(2) { animation-delay: 0.2s; }
    .additional-info-container .additional-info-card:nth-child(3) { animation-delay: 0.3s; }
    .additional-info-container .additional-info-card:nth-child(4) { animation-delay: 0.4s; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const faqItems = document.querySelectorAll('[data-faq-item]');
        
        // Intersection Observer for animations
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
        
        // Observe elements with slide animations
        document.querySelectorAll('.animate-slide-up').forEach(el => {
            observer.observe(el);
        });

        faqItems.forEach(item => {
            const button = item.querySelector('[data-faq-button]');
            const content = item.querySelector('[data-faq-content]');
            const icon = button.querySelector('i');

            button.addEventListener('click', () => {
                const isOpen = !content.classList.contains('hidden');

                // Close all other items
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.querySelector('[data-faq-content]').classList.add('hidden');
                        const otherIcon = otherItem.querySelector('[data-faq-button] i');
                        otherIcon.classList.remove('fa-chevron-up', 'rotate-180');
                        otherIcon.classList.add('fa-chevron-down');
                    }
                });

                // Toggle current item
                content.classList.toggle('hidden');
                if (isOpen) {
                    icon.classList.remove('fa-chevron-up', 'rotate-180');
                    icon.classList.add('fa-chevron-down');
                } else {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up', 'rotate-180');
                }
            });
        });
    });
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/layout.php';
?>