<?php
// Start session for flash messages
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$pageTitle = "All Programs - SoftSkill Mentor Academy";
require_once __DIR__ . '/../config.php';
include __DIR__ . '/../includes/functions.php';

$programs = loadData(__DIR__ . '/../data/programs.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20 animate-fade-in">
    <div class="container mx-auto px-4 text-center animate-slide-up">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">Our Training Programs</h1>
        <p class="text-xl max-w-3xl mx-auto animate-fade-in-delay">Choose the program that best fits your goals and experience level.</p>
    </div>
</section>

<!-- Programs Overview -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Program Categories</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Select from our range of soft skills training programs designed for different experience levels.</p>
        </div>

        <div class="program-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($programs as $index => $program): ?>
            <?php if (isset($program['status']) && $program['status'] === 'coming_soon'): ?>
            <div class="program-card bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl shadow-md overflow-hidden border border-gray-200 opacity-75">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-600"><?php echo htmlspecialchars($program['title']); ?></h3>
                            <p class="text-gray-500 text-sm mt-1"><?php echo htmlspecialchars($program['category']); ?> Level</p>
                        </div>
                        <span class="bg-gray-300 text-gray-700 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                            Coming Soon
                        </span>
                    </div>
                    
                    <div class="mb-4">
                        <p class="text-gray-500 text-sm">
                            <?php 
                                if (is_array($program['audience'])) {
                                    echo htmlspecialchars(implode(', ', $program['audience']));
                                } else {
                                    echo htmlspecialchars($program['audience']);
                                }
                            ?>
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3 mb-4 text-sm">
                        <div class="flex items-center">
                            <i class="fas fa-clock text-gray-400 mr-2"></i>
                            <span class="text-gray-500"><?php echo htmlspecialchars($program['dailyTime']); ?></span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-tasks text-gray-400 mr-2"></i>
                            <span class="text-gray-500"><?php echo isset($program['structure']) ? count($program['structure']) : '0'; ?> Phases</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2 mb-4">
                        <?php if (!empty($program['overview'])): ?>
                            <?php foreach (array_slice($program['overview'], 0, 2) as $overview): ?>
                                <span class="bg-gray-200 text-gray-600 text-xs px-2 py-1 rounded"><?php echo htmlspecialchars($overview); ?></span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mt-6">
                        <button class="w-full bg-gray-400 text-white font-bold py-2 px-4 rounded-lg cursor-not-allowed" disabled>
                            Coming Soon
                        </button>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="program-card bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02]">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800"><?php echo htmlspecialchars($program['title']); ?></h3>
                            <p class="text-gray-600 text-sm mt-1"><?php echo htmlspecialchars($program['category']); ?> Level</p>
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                            <?php echo htmlspecialchars($program['practicalPercentage']); ?> Practical
                        </span>
                    </div>
                    
                    <div class="mb-4">
                        <p class="text-gray-700 text-sm">
                            <?php 
                                if (is_array($program['audience'])) {
                                    echo htmlspecialchars(implode(', ', $program['audience']));
                                } else {
                                    echo htmlspecialchars($program['audience']);
                                }
                            ?>
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3 mb-4 text-sm">
                        <div class="flex items-center">
                            <i class="fas fa-clock text-blue-500 mr-2"></i>
                            <span><?php echo htmlspecialchars($program['dailyTime']); ?></span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-tasks text-teal-500 mr-2"></i>
                            <span><?php echo isset($program['structure']) ? count($program['structure']) : '0'; ?> Phases</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2 mb-4">
                        <?php if (!empty($program['overview'])): ?>
                            <?php foreach (array_slice($program['overview'], 0, 2) as $overview): ?>
                                <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded"><?php echo htmlspecialchars($overview); ?></span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mt-6">
                        <a href="<?php echo BASE_PATH; ?>/pages/schedule.php?program=<?php echo urlencode($program['id']); ?>" 
                           class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 transform hover:scale-105 shadow-md text-center inline-block">
                            View Details & Enroll
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- How to Choose -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">How to Choose the Right Program</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Consider your experience level, goals, and current skill set when selecting a program.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-md text-center animate-fade-in-up delay-1">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Basic Level</h3>
                <p class="text-gray-600">Perfect for beginners and those looking to build foundational soft skills.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md text-center animate-fade-in-up delay-2">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-crown"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Advanced Level</h3>
                <p class="text-gray-600">For experienced professionals seeking advanced leadership and communication skills.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md text-center animate-fade-in-up delay-3">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-star"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Master Level</h3>
                <p class="text-gray-600">Designed for senior professionals and executives needing expert-level skills.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-500 text-white animate-fade-in">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-pulse-slow">Ready to Transform Your Skills?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto animate-fade-in-delay">Join thousands of professionals who have advanced their careers with our proven training programs.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-delay-2">
            <a href="<?php echo BASE_PATH; ?>/pages/programs.php" 
                class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105 shadow-lg">Explore All Programs</a>
            <a href="<?php echo BASE_PATH; ?>/pages/contact.php" 
                class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105">Contact Us</a>
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
    
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
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
    
    .animate-bounce {
        animation: bounce 1s ease-in-out infinite;
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
    
    /* Stagger animations for programs */
    .program-container .program-card:nth-child(1) { animation-delay: 0.1s; }
    .program-container .program-card:nth-child(2) { animation-delay: 0.2s; }
    .program-container .program-card:nth-child(3) { animation-delay: 0.3s; }
    .program-container .program-card:nth-child(4) { animation-delay: 0.4s; }
    .program-container .program-card:nth-child(5) { animation-delay: 0.5s; }
    .program-container .program-card:nth-child(6) { animation-delay: 0.6s; }
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