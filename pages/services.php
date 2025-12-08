<?php
$pageTitle = "Our Services - SoftSkills Academy";
include __DIR__ . '/../includes/functions.php';
// include __DIR__ . '/../pages/services.php';
$services = loadData(__DIR__ . '/../data/services.json');
$program = loadData(__DIR__ . '/../data/program.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20 animate-fade-in">
    <div class="container mx-auto px-4 text-center animate-slide-up">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">Our Training Services</h1>
        <p class="text-xl max-w-3xl mx-auto animate-fade-in-delay">Comprehensive soft skills programs designed for individuals and organizations.</p>
    </div>
</section>

<!-- Services Overview -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Training Programs</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Explore our comprehensive range of soft skills training programs designed to meet your personal and professional development needs.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 services-container">
            <?php foreach ($services as $index => $service): ?>
            <div class="bg-gradient-to-br from-gray-50 to-white p-6 rounded-xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100 transform hover:-translate-y-2 service-card animate-fade-in-up delay-<?php echo (($index % 3) + 1); ?>">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas <?php echo $service['icon']; ?> "></i>
                </div>
                <h3 class="text-xl font-bold mb-3"><?php echo $service['title']; ?></h3>
                <p class="text-gray-600 mb-4"><?php echo $service['description']; ?></p>
                <a href="<?php echo ($service['id'] == 'complete-program') ? 'schedule.php' : 'contact.php?service=' . $service['id']; ?>" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center transform hover:translate-x-1 transition-transform">
                    <?php echo ($service['id'] == 'complete-program') ? 'View Details & Schedule' : 'Learn more'; ?>
                    <i class="fas fa-arrow-right ml-2 text-sm transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Program Highlights -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Why Our <?php echo $program['title']; ?>?</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Discover what makes our program unique and transformative</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-lg transition-shadow">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">95% Practical</h3>
                <p class="text-gray-600">Hands-on exercises and real-world simulations</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-lg transition-shadow">
                <div class="text-teal-600 text-3xl mb-4">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Daily 60-Minute Sessions</h3>
                <p class="text-gray-600">Consistent daily practice for lasting results</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-lg transition-shadow">
                <div class="text-indigo-600 text-3xl mb-4">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Expert Instructors</h3>
                <p class="text-gray-600">Industry professionals with proven track records</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-lg transition-shadow">
                <div class="text-purple-600 text-3xl mb-4">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Certification</h3>
                <p class="text-gray-600">Recognized credential upon completion</p>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-md p-8">
            <h3 class="text-2xl font-bold mb-6 text-center">Program Structure</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ($program['structure'] as $monthIndex => $month): ?>
                <div class="border border-gray-200 rounded-lg p-6 hover:border-blue-300 transition-colors">
                    <div class="text-center mb-4">
                        <span class="inline-block bg-blue-100 text-blue-800 font-bold px-4 py-2 rounded-full">Month <?php echo ($monthIndex + 1); ?></span>
                        <h4 class="text-xl font-bold mt-4"><?php echo $month['title']; ?></h4>
                    </div>
                    <ul class="space-y-2 mt-4">
                        <?php foreach ($month['weeks'] as $week): ?>
                        <li class="flex items-start">
                            <i class="fas fa-circle text-blue-500 text-xs mt-2 mr-2"></i>
                            <span class="text-sm"><?php echo $week['title']; ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Corporate Training -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-12 corporate-training-container">
            <div class="lg:w-1/2 animate-slide-in-left">
                <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Corporate Training" class="rounded-xl shadow-lg w-full transform hover:scale-105 transition duration-500">
            </div>
            <div class="lg:w-1/2 animate-slide-in-right">
                <h2 class="text-3xl font-bold mb-6">Corporate Soft Skills Training</h2>
                <p class="text-gray-600 mb-6">We provide customized corporate soft-skills programs for teams and organizations to enhance workplace communication, collaboration, and productivity.</p>
                
                <div class="space-y-4 mb-8">
                    <div class="flex items-start animate-fade-in-left delay-1">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3 animate-rotate-in"></i>
                        <span class="text-gray-700"><span class="font-semibold">Team Communication & Collaboration</span> - Build cohesive teams with improved trust and cooperation</span>
                    </div>
                    <div class="flex items-start animate-fade-in-left delay-2">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3 animate-rotate-in"></i>
                        <span class="text-gray-700"><span class="font-semibold">Leadership Development Programs</span> - Cultivate authentic leaders who inspire teams</span>
                    </div>
                    <div class="flex items-start animate-fade-in-left delay-3">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3 animate-rotate-in"></i>
                        <span class="text-gray-700"><span class="font-semibold">Customer Service Excellence</span> - Equip your customer-facing teams with empathy and problem-solving skills</span>
                    </div>
                    <div class="flex items-start animate-fade-in-left delay-4">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3 animate-rotate-in"></i>
                        <span class="text-gray-700"><span class="font-semibold">Change Management & Adaptability</span> - Help employees navigate transitions and embrace innovation</span>
                    </div>
                    <div class="flex items-start animate-fade-in-left delay-5">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3 animate-rotate-in"></i>
                        <span class="text-gray-700"><span class="font-semibold">Conflict Resolution & Workplace Etiquette</span> - Develop skills to handle disagreements constructively</span>
                    </div>
                </div>
                
                <a href="/learn/pages/contact.php?service=corporate" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105 shadow-md">Learn About Corporate Programs</a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-500 text-white animate-fade-in">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-pulse-slow">Ready to Enhance Your Skills?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto animate-fade-in-delay">Join our next batch or contact us to learn more about our training programs.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-delay-2">
            <a href="/learn/pages/schedule.php" class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105 shadow-lg">View Schedule</a>
            <a href="/learn/pages/contact.php" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105">Contact Us</a>
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
    
    @keyframes slideInLeft {
        from {
            transform: translateX(-100px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideInRight {
        from {
            transform: translateX(100px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
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
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
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
    
    .animate-slide-in-left {
        animation: slideInLeft 0.8s ease-out forwards;
        opacity: 0;
    }
    
    .animate-slide-in-right {
        animation: slideInRight 0.8s ease-out forwards;
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
    .animate-slide-in-left,
    .animate-slide-in-right,
    .animate-fade-in-delay,
    .animate-fade-in-delay-2 {
        opacity: 0;
    }
    
    /* Stagger animations for services */
    .services-container .service-card:nth-child(3n+1) { animation-delay: 0.1s; }
    .services-container .service-card:nth-child(3n+2) { animation-delay: 0.2s; }
    .services-container .service-card:nth-child(3n+3) { animation-delay: 0.3s; }
    
    /* Stagger animations for corporate training benefits */
    .corporate-training-container .animate-fade-in-left:nth-child(1) { animation-delay: 0.1s; }
    .corporate-training-container .animate-fade-in-left:nth-child(2) { animation-delay: 0.2s; }
    .corporate-training-container .animate-fade-in-left:nth-child(3) { animation-delay: 0.3s; }
    .corporate-training-container .animate-fade-in-left:nth-child(4) { animation-delay: 0.4s; }
    .corporate-training-container .animate-fade-in-left:nth-child(5) { animation-delay: 0.5s; }
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
?>