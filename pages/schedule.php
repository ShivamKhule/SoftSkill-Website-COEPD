<?php
$pageTitle = "Batches & Schedule - SoftSkills Academy";
include __DIR__ . '/../includes/functions.php';
$batches = loadData(__DIR__ . '/../data/batches.json');
$courses = loadData(__DIR__ . '/../data/courses.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20 animate-fade-in">
    <div class="container mx-auto px-4 text-center animate-slide-up">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">Batches & Schedule</h1>
        <p class="text-xl max-w-3xl mx-auto animate-fade-in-delay">Find the perfect batch timing that fits your schedule.</p>
    </div>
</section>

<!-- Upcoming Batches -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Upcoming Batches</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Check our schedule for upcoming training sessions. All batches are led by experienced trainers and offer flexible learning options.</p>
        </div>
        
        <div class="overflow-x-auto animate-fade-in-up">
            <table class="min-w-full bg-white rounded-xl overflow-hidden shadow-md">
                <thead class="bg-gradient-to-r from-blue-500 to-teal-400 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Course</th>
                        <th class="py-3 px-4 text-left">Start Date</th>
                        <th class="py-3 px-4 text-left">End Date</th>
                        <th class="py-3 px-4 text-left">Timings</th>
                        <th class="py-3 px-4 text-left">Mode</th>
                        <th class="py-3 px-4 text-left">Type</th>
                        <th class="py-3 px-4 text-left">Seats</th>
                        <th class="py-3 px-4 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($batches as $index => $batch): ?>
                    <tr class="hover:bg-blue-50 transition-colors duration-300 transform hover:scale-[1.01]">
                        <td class="py-4 px-4">
                            <div class="font-medium"><?php echo $batch['course']; ?></div>
                            <div class="text-sm text-gray-500">Instructor: <?php echo $batch['instructor']; ?></div>
                        </td>
                        <td class="py-4 px-4"><?php echo date('M j, Y', strtotime($batch['startDate'])); ?></td>
                        <td class="py-4 px-4"><?php echo date('M j, Y', strtotime($batch['endDate'])); ?></td>
                        <td class="py-4 px-4"><?php echo $batch['timings']; ?></td>
                        <td class="py-4 px-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium 
                                <?php 
                                    if ($batch['mode'] == 'Online') echo 'bg-blue-100 text-blue-800';
                                    elseif ($batch['mode'] == 'In-person') echo 'bg-green-100 text-green-800';
                                    else echo 'bg-purple-100 text-purple-800';
                                ?>">
                                <?php echo $batch['mode']; ?>
                            </span>
                        </td>
                        <td class="py-4 px-4"><?php echo $batch['type']; ?></td>
                        <td class="py-4 px-4">
                            <span class="<?php echo $batch['seatsAvailable'] > 5 ? 'text-green-600' : 'text-orange-600'; ?> font-medium">
                                <?php echo $batch['seatsAvailable']; ?> seats
                            </span>
                        </td>
                        <td class="py-4 px-4">
                            <a href="contact.php?batch=<?php echo $batch['id']; ?>" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-sm transition duration-300 transform hover:scale-105 shadow-md">Enroll</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Special Programs -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Special Programs</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Additional training opportunities for specific needs and groups.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 program-container">
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 program-card animate-fade-in-up delay-1">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-calendar-week"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Weekend Intensives</h3>
                <p class="text-gray-600 mb-4">Accelerated weekend programs for busy professionals who want to complete courses quickly.</p>
                <ul class="text-gray-600 space-y-2 mb-4">
                    <li class="flex items-center animate-fade-in-left delay-1">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Condensed curriculum</span>
                    </li>
                    <li class="flex items-center animate-fade-in-left delay-2">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Extended session hours</span>
                    </li>
                    <li class="flex items-center animate-fade-in-left delay-3">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Same certification</span>
                    </li>
                </ul>
                <a href="contact.php" class="text-blue-600 hover:text-blue-800 font-medium transform hover:translate-x-1 inline-flex items-center transition-transform">Learn More →</a>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 program-card animate-fade-in-up delay-2">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-building"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Corporate Batches</h3>
                <p class="text-gray-600 mb-4">Customized training programs for organizations with specific team development needs.</p>
                <ul class="text-gray-600 space-y-2 mb-4">
                    <li class="flex items-center animate-fade-in-left delay-1">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Tailored curriculum</span>
                    </li>
                    <li class="flex items-center animate-fade-in-left delay-2">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>On-site or remote delivery</span>
                    </li>
                    <li class="flex items-center animate-fade-in-left delay-3">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Team pricing options</span>
                    </li>
                </ul>
                <a href="corporate.php" class="text-blue-600 hover:text-blue-800 font-medium transform hover:translate-x-1 inline-flex items-center transition-transform">Learn More →</a>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 program-card animate-fade-in-up delay-3">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Executive Coaching</h3>
                <p class="text-gray-600 mb-4">One-on-one coaching for senior professionals and executives focused on leadership development.</p>
                <ul class="text-gray-600 space-y-2 mb-4">
                    <li class="flex items-center animate-fade-in-left delay-1">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Personalized development plan</span>
                    </li>
                    <li class="flex items-center animate-fade-in-left delay-2">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>360-degree feedback</span>
                    </li>
                    <li class="flex items-center animate-fade-in-left delay-3">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Ongoing support</span>
                    </li>
                </ul>
                <a href="contact.php" class="text-blue-600 hover:text-blue-800 font-medium transform hover:translate-x-1 inline-flex items-center transition-transform">Learn More →</a>
            </div>
        </div>
    </div>
</section>

<!-- How to Enroll -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">How to Enroll</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Simple steps to join our upcoming batches.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 enrollment-container">
            <div class="text-center animate-fade-in-up delay-1">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-blue-600 font-bold text-xl">1</span>
                </div>
                <h3 class="text-lg font-bold mb-2">Choose a Batch</h3>
                <p class="text-gray-600">Select a course and batch timing that fits your schedule.</p>
            </div>
            
            <div class="text-center animate-fade-in-up delay-2">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-blue-600 font-bold text-xl">2</span>
                </div>
                <h3 class="text-lg font-bold mb-2">Register</h3>
                <p class="text-gray-600">Complete the enrollment form and make payment.</p>
            </div>
            
            <div class="text-center animate-fade-in-up delay-3">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-blue-600 font-bold text-xl">3</span>
                </div>
                <h3 class="text-lg font-bold mb-2">Confirmation</h3>
                <p class="text-gray-600">Receive confirmation and joining instructions via email.</p>
            </div>
            
            <div class="text-center animate-fade-in-up delay-4">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-blue-600 font-bold text-xl">4</span>
                </div>
                <h3 class="text-lg font-bold mb-2">Attend Sessions</h3>
                <p class="text-gray-600">Join live sessions and engage with fellow learners.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-500 text-white animate-fade-in">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-pulse-slow">Ready to Join a Batch?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto animate-fade-in-delay">Secure your spot in our upcoming training sessions.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-delay-2">
            <a href="contact.php" class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105 shadow-lg">Enroll Now</a>
            <a href="contact.php" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105">Contact for Custom Scheduling</a>
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
    
    /* Stagger animations for enrollment steps */
    .enrollment-container > div:nth-child(1) { animation-delay: 0.1s; }
    .enrollment-container > div:nth-child(2) { animation-delay: 0.2s; }
    .enrollment-container > div:nth-child(3) { animation-delay: 0.3s; }
    .enrollment-container > div:nth-child(4) { animation-delay: 0.4s; }
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