<?php
$pageTitle = "Batches & Schedule - SoftSkills Academy";
include __DIR__ . '/../includes/functions.php';
$batches = loadData(__DIR__ . '/../data/batches.json');
$courses = loadData(__DIR__ . '/../data/courses.json');
$program = loadData(__DIR__ . '/../data/program.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20 animate-fade-in">
    <div class="container mx-auto px-4 text-center animate-slide-up">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down"><?php echo $program['title']; ?></h1>
        <p class="text-xl max-w-3xl mx-auto animate-fade-in-delay">Find the perfect batch timing that fits your schedule.</p>
    </div>
</section>

<!-- Program Overview -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Program Overview</h2>
            <p class="text-gray-600 max-w-3xl mx-auto"><?php echo $program['duration']; ?> | <?php echo $program['dailyTime']; ?>/Day | <?php echo $program['practicalPercentage']; ?> Practical</p>
            <p class="text-gray-600 mt-2">Audience: <?php echo $program['audience']; ?></p>
        </div>
        
        <div class="bg-white rounded-xl shadow-md p-6 mb-12 animate-fade-in-up">
            <h3 class="text-2xl font-bold mb-4 text-center">Daily Format</h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-blue-50 p-4 rounded-lg text-center">
                    <div class="text-blue-600 font-bold"><?php echo $program['dailyFormat']['warmup']; ?></div>
                    <div>Warm-Up</div>
                </div>
                <div class="bg-teal-50 p-4 rounded-lg text-center">
                    <div class="text-teal-600 font-bold"><?php echo $program['dailyFormat']['technique']; ?></div>
                    <div>Technique of the Day</div>
                </div>
                <div class="bg-indigo-50 p-4 rounded-lg text-center">
                    <div class="text-indigo-600 font-bold"><?php echo $program['dailyFormat']['lab']; ?></div>
                    <div>Lab & Simulation</div>
                </div>
                <div class="bg-purple-50 p-4 rounded-lg text-center">
                    <div class="text-purple-600 font-bold"><?php echo $program['dailyFormat']['coaching']; ?></div>
                    <div>Coaching + Takeaway Tool</div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12 animate-fade-in-up delay-1">
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-bold mb-4 text-center">Weekly Elements</h3>
                <ul class="space-y-2">
                    <?php foreach ($program['weeklyElements'] as $element): ?>
                    <li class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        <span><?php echo $element; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-bold mb-4 text-center">Bi-Weekly Elements</h3>
                <ul class="space-y-2">
                    <?php foreach ($program['biweeklyElements'] as $element): ?>
                    <li class="flex items-center">
                        <i class="fas fa-check-circle text-blue-500 mr-2"></i>
                        <span><?php echo $element; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-bold mb-4 text-center">Monthly Elements</h3>
                <ul class="space-y-2">
                    <?php foreach ($program['monthlyElements'] as $element): ?>
                    <li class="flex items-center">
                        <i class="fas fa-check-circle text-teal-500 mr-2"></i>
                        <span><?php echo $element; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-md p-6 animate-fade-in-up delay-2">
            <h3 class="text-2xl font-bold mb-4 text-center">Program Deliverables</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php foreach ($program['programDeliverables'] as $deliverable): ?>
                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                    <i class="fas fa-gift text-blue-500 mr-3"></i>
                    <span><?php echo $deliverable; ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Program Structure -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Program Structure</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Detailed breakdown of our 3-month transformation journey</p>
        </div>
        
        <?php foreach ($program['structure'] as $monthIndex => $month): ?>
        <div class="mb-16 animate-fade-in-up delay-<?php echo $monthIndex; ?>">
            <h3 class="text-2xl font-bold mb-6 text-center bg-gradient-to-r from-blue-500 to-teal-400 text-white py-3 rounded-lg">Month <?php echo ($monthIndex + 1); ?> - <?php echo $month['title']; ?></h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($month['weeks'] as $week): ?>
                <div class="bg-gradient-to-br from-gray-50 to-white p-6 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="text-center mb-4">
                        <span class="inline-block bg-blue-100 text-blue-800 text-sm font-bold px-3 py-1 rounded-full">Week <?php echo $week['week']; ?></span>
                        <h4 class="text-lg font-bold mt-3"><?php echo $week['title']; ?></h4>
                    </div>
                    
                    <?php if (!empty($week['techniques'])): ?>
                    <div class="mb-4">
                        <h5 class="font-semibold text-gray-700 mb-2">Techniques:</h5>
                        <ul class="text-sm space-y-1">
                            <?php foreach ($week['techniques'] as $technique): ?>
                            <li class="flex items-start">
                                <i class="fas fa-chevron-right text-blue-500 text-xs mt-1 mr-2"></i>
                                <span><?php echo $technique; ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($week['addons'])): ?>
                    <div class="mb-4">
                        <h5 class="font-semibold text-gray-700 mb-2">Add-ons:</h5>
                        <ul class="text-sm space-y-1">
                            <?php foreach ($week['addons'] as $addon): ?>
                            <li class="flex items-start">
                                <i class="fas fa-plus-circle text-teal-500 text-xs mt-1 mr-2"></i>
                                <span><?php echo $addon; ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($week['challenge'])): ?>
                    <div class="mt-4 pt-3 border-t border-gray-200">
                        <div class="flex items-center text-sm font-medium text-blue-600">
                            <i class="fas fa-bullseye mr-2"></i>
                            <span>Challenge: <?php echo $week['challenge']; ?></span>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($week['touchpoint'])): ?>
                    <div class="mt-4 pt-3 border-t border-gray-200">
                        <div class="flex items-center text-sm font-medium text-purple-600">
                            <i class="fas fa-handshake mr-2"></i>
                            <span>Touchpoint: <?php echo $week['touchpoint']; ?></span>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($week['deliverable'])): ?>
                    <div class="mt-4 pt-3 border-t border-gray-200">
                        <div class="flex items-center text-sm font-medium text-green-600">
                            <i class="fas fa-trophy mr-2"></i>
                            <span>Deliverable: <?php echo $week['deliverable']; ?></span>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Upcoming Batches -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50">
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
                            <a href="contact.php?batch=<?php echo $batch['id']; ?>&course=complete-program" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-sm transition duration-300 transform hover:scale-105 shadow-md enroll-btn" data-course="<?php echo $batch['id']; ?>">Enroll</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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
        <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-pulse-slow">Ready to Transform Your Skills?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto animate-fade-in-delay">Secure your spot in our upcoming <?php echo $program['title']; ?>.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-delay-2">
            <a href="contact.php?course=complete-program" class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105 shadow-lg">Enroll Now</a>
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
        
        // Handle enrollment buttons
        document.querySelectorAll('.enroll-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const courseId = this.getAttribute('data-course');
                window.location.href = 'contact.php?batch=' + courseId + '&course=complete-program';
            });
        });
    });
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/layout.php';
?>