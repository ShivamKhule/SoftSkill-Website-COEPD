<?php
$pageTitle = "Our Services - SoftSkill Mentor Academy";
require_once __DIR__ . '/../config.php';
include __DIR__ . '/../includes/functions.php';
$services = loadData(__DIR__ . '/../data/services.json');

// Start session for flash messages
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20 animate-fade-in">
    <div class="container mx-auto px-4 text-center animate-slide-up">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">Essential Soft Skills</h1>
        <p class="text-xl max-w-3xl mx-auto animate-fade-in-delay">Comprehensive soft skills categories designed for personal and professional development.</p>
    </div>
</section>

<!-- Services Overview -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Core Soft Skills Categories</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Explore our comprehensive range of soft skills training categories designed to meet your personal and professional development needs.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 services-container">
            <?php foreach ($services as $index => $service): ?>
                <div
                    class="bg-gradient-to-br from-gray-50 to-white p-6 rounded-xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100 transform hover:-translate-y-2 service-card animate-fade-in-up delay-<?php echo (($index % 3) + 1); ?>">
                    <div class="text-blue-600 text-3xl mb-4">
                        <i class="fas <?php echo $service['icon']; ?> "></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3"><?php echo $service['title']; ?></h3>
                    <p class="text-gray-600 mb-4"><?php echo $service['description']; ?></p>
                    
                    <div class="mb-4">
                        <h4 class="font-semibold text-gray-700 mb-2">Key Skills:</h4>
                        <ul class="space-y-1">
                            <?php foreach ($service['skills'] as $skill): ?>
                                <li class="flex items-center text-sm">
                                    <i class="fas fa-check-circle text-green-500 mr-2 text-xs"></i>
                                    <span><?php echo $skill; ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <a href="<?php echo BASE_PATH; ?>/pages/programs.php"
                        class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center transform hover:translate-x-1 transition-transform">
                        Explore Programs
                        <i
                            class="fas fa-arrow-right ml-2 text-sm transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- What Are Soft Skills -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">What Are Soft Skills?</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Essential abilities that enable effective interaction and communication</p>
        </div>

        <div class="bg-white rounded-xl shadow-md p-8 mb-12">
            <p class="text-gray-700 text-lg mb-6 text-center">
                Soft skills are personal attributes that enhance an individual's interactions, job performance, and career prospects. 
                Unlike hard skills, which are technical and measurable, soft skills are intangible qualities that help you work effectively with others.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h3 class="text-xl font-bold mb-4 text-blue-800">Why Soft Skills Matter</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span>Enhance workplace communication and collaboration</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span>Improve leadership and team management abilities</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span>Increase career advancement opportunities</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span>Build stronger professional relationships</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span>Improve problem-solving and decision-making</span>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-teal-50 p-6 rounded-lg">
                    <h3 class="text-xl font-bold mb-4 text-teal-800">Benefits of Developing Soft Skills</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-bolt text-yellow-500 mt-1 mr-3"></i>
                            <span>Increased confidence in professional settings</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-bolt text-yellow-500 mt-1 mr-3"></i>
                            <span>Enhanced emotional intelligence</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-bolt text-yellow-500 mt-1 mr-3"></i>
                            <span>Improved conflict resolution abilities</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-bolt text-yellow-500 mt-1 mr-3"></i>
                            <span>Greater adaptability to change</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-bolt text-yellow-500 mt-1 mr-3"></i>
                            <span>Stronger networking and relationship building</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Soft Skills in the Workplace -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Soft Skills in the Workplace</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">How soft skills impact professional success</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-blue-50 to-white p-6 rounded-xl shadow-md text-center border border-blue-100 transform hover:scale-105 transition-all duration-300 hover:shadow-xl animate-fade-in-up delay-1">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Team Collaboration</h3>
                <p class="text-gray-600">Effective communication and interpersonal skills lead to better team dynamics and project outcomes.</p>
            </div>

            <div class="bg-gradient-to-br from-teal-50 to-white p-6 rounded-xl shadow-md text-center border border-teal-100 transform hover:scale-105 transition-all duration-300 hover:shadow-xl animate-fade-in-up delay-2">
                <div class="text-teal-600 text-3xl mb-4">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Leadership Development</h3>
                <p class="text-gray-600">Leadership skills enable professionals to guide teams, inspire innovation, and drive results.</p>
            </div>

            <div class="bg-gradient-to-br from-indigo-50 to-white p-6 rounded-xl shadow-md text-center border border-indigo-100 transform hover:scale-105 transition-all duration-300 hover:shadow-xl animate-fade-in-up delay-3">
                <div class="text-indigo-600 text-3xl mb-4">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Problem Solving</h3>
                <p class="text-gray-600">Critical thinking and analytical skills help navigate challenges and find innovative solutions.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-500 text-white animate-fade-in">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-pulse-slow">Ready to Develop Your Soft Skills?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto animate-fade-in-delay">Start your journey to enhanced professional effectiveness today.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-delay-2">
            <a href="<?php echo BASE_PATH; ?>/pages/programs.php"
                class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105 shadow-lg">Explore Programs</a>
            <a href="<?php echo BASE_PATH; ?>/pages/contact.php"
                class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105">Contact Us</a>
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

    .animate-bounce {
        animation: bounce 1s ease-in-out infinite;
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

    .delay-5 {
        animation-delay: 0.5s;
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

    /* Stagger animations for services */
    .services-container .service-card:nth-child(3n+1) {
        animation-delay: 0.1s;
    }

    .services-container .service-card:nth-child(3n+2) {
        animation-delay: 0.2s;
    }

    .services-container .service-card:nth-child(3n+3) {
        animation-delay: 0.3s;
    }

    /* Stagger animations for corporate training benefits */
    .corporate-training-container .animate-fade-in-left:nth-child(1) {
        animation-delay: 0.1s;
    }

    .corporate-training-container .animate-fade-in-left:nth-child(2) {
        animation-delay: 0.2s;
    }

    .corporate-training-container .animate-fade-in-left:nth-child(3) {
        animation-delay: 0.3s;
    }

    .corporate-training-container .animate-fade-in-left:nth-child(4) {
        animation-delay: 0.4s;
    }

    .corporate-training-container .animate-fade-in-left:nth-child(5) {
        animation-delay: 0.5s;
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
        document.querySelectorAll('.animate-slide-in-left, .animate-slide-in-right, .animate-slide-up').forEach(el => {
            observer.observe(el);
        });
    });
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/layout.php';