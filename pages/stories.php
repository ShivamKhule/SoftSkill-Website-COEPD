<?php
$pageTitle = "Success Stories - SoftSkill Mentor Academy";

// Start session for flash messages
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include configuration file
require_once __DIR__ . '/../config.php';

include __DIR__ . '/../includes/functions.php';
$stories = loadData(__DIR__ . '/../data/success-stories.json');
$testimonials = loadData(__DIR__ . '/../data/testimonials.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="relative text-white py-20 animate-fade-in">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
            alt="Success Stories" class="w-full h-full object-cover animate-zoom-in">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-teal-500 opacity-90"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center animate-slide-up">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">Success Stories</h1>
        <p class="text-xl max-w-3xl mx-auto animate-fade-in-delay">Real transformations from our students and corporate clients.</p>
    </div>
</section>

<!-- Stories Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Transformations That Inspire</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Highlights of learner achievements and growth in communication,
                confidence, professional behavior, and job performance.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 story-container">
            <?php foreach ($stories as $index => $story): ?>
                <div
                    class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 story-card animate-fade-in-up delay-<?php echo (($index % 2) + 1); ?>">
                    <div class="p-6 md:p-8">
                        <div class="flex items-center mb-6">
                            <div
                                class="w-16 h-16 flex-shrink-0 overflow-hidden rounded-xl bg-gray-200 border-2 border-dashed">
                                <img src="<?php echo $story['image']; ?>" alt="<?php echo $story['name']; ?>"
                                    class="w-full h-full object-cover transform hover:scale-110 transition duration-500" />
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-bold text-gray-900"><?php echo $story['name']; ?></h3>
                                <p class="text-gray-600">
                                    <?php echo $story['role']; ?>
                                    <?php echo !empty($story['company']) ? ', ' . $story['company'] : ''; ?>
                                </p>
                            </div>
                        </div>

                        <div class="mb-6 animate-fade-in-left delay-1">
                            <h4 class="font-bold text-gray-800 mb-2">Before Training:</h4>
                            <p class="text-gray-700 leading-relaxed"><?php echo $story['before']; ?></p>
                        </div>

                        <div class="mb-6 animate-fade-in-left delay-2">
                            <h4 class="font-bold text-gray-800 mb-2">After Training:</h4>
                            <p class="text-gray-700 leading-relaxed"><?php echo $story['after']; ?></p>
                        </div>

                        <div class="mb-6 animate-fade-in-left delay-3">
                            <h4 class="font-bold text-gray-800 mb-2">Key Improvement:</h4>
                            <p class="text-gray-700 leading-relaxed"><?php echo $story['improvement']; ?></p>
                        </div>

                        <div class="border-l-4 border-blue-500 pl-4 py-2 animate-fade-in-up delay-4">
                            <p class="italic text-gray-700">"<?php echo $story['quote']; ?>"</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Testimonial Carousel -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">What Our Alumni Say</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Hear from our graduates about their learning experience and
                career growth.</p>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 md:p-8 max-w-4xl mx-auto testimonial-card animate-fade-in-up">
            <div class="text-center">
                <div class="bg-gray-200 border-2 border-dashed rounded-xl w-24 h-24 mx-auto mb-6 overflow-hidden animate-float">
                    <img src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6" alt="Michael Rodriguez"
                        class="w-full h-full object-cover transform hover:scale-110 transition duration-500" />
                </div>

                <p class="text-xl italic text-gray-700 mb-6 leading-relaxed animate-fade-in-delay">"The leadership training I received
                    completely transformed my approach to managing my team. Within six months, our department
                    productivity increased by 35%, and employee satisfaction scores reached an all-time high."</p>
                <div class="animate-fade-in-delay-2">
                    <h4 class="font-bold text-lg text-gray-900">Michael Rodriguez</h4>
                    <p class="text-gray-600">Senior Manager, TechGlobal Inc.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-500 text-white animate-fade-in">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-pulse-slow">Begin Your Transformation Journey</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto animate-fade-in-delay">Join thousands of professionals who have advanced their careers with
            our proven training programs.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-delay-2">
            <a href="<?php echo BASE_PATH; ?>/pages/schedule.php"
                class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105 shadow-lg">Explore
                Courses</a>
            <a href="<?php echo BASE_PATH; ?>/pages/contact.php"
                class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105">Contact
                Us</a>
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
    
    @keyframes float {
        0% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
        100% {
            transform: translateY(0px);
        }
    }
    
    @keyframes pulseSlow {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.8;
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
    
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
    
    .animate-pulse-slow {
        animation: pulseSlow 2s ease-in-out infinite;
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
    
    /* Stagger animations for stories */
    .story-container .story-card:nth-child(odd) { animation-delay: 0.1s; }
    .story-container .story-card:nth-child(even) { animation-delay: 0.2s; }
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
include __DIR__ . '/../components/layout.php';
?>