<?php
$pageTitle = "Batches & Schedule - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/includes/functions.php';
$batches = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/batches.json');
$courses = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/courses.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Batches & Schedule</h1>
        <p class="text-xl max-w-3xl mx-auto">Find the perfect batch timing that fits your schedule.</p>
    </div>
</section>

<!-- Upcoming Batches -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Upcoming Batches</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Check our schedule for upcoming training sessions. All batches are led by experienced trainers and offer flexible learning options.</p>
        </div>
        
        <div class="overflow-x-auto">
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
                    <?php foreach ($batches as $batch): ?>
                    <tr>
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
                            <a href="contact.php?batch=<?php echo $batch['id']; ?>" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-sm transition duration-300">Enroll</a>
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
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Special Programs</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Additional training opportunities for specific needs and groups.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-md">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-calendar-week"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Weekend Intensives</h3>
                <p class="text-gray-600 mb-4">Accelerated weekend programs for busy professionals who want to complete courses quickly.</p>
                <ul class="text-gray-600 space-y-2 mb-4">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Condensed curriculum</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Extended session hours</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Same certification</span>
                    </li>
                </ul>
                <a href="contact.php" class="text-blue-600 hover:text-blue-800 font-medium">Learn More →</a>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-building"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Corporate Batches</h3>
                <p class="text-gray-600 mb-4">Customized training programs for organizations with specific team development needs.</p>
                <ul class="text-gray-600 space-y-2 mb-4">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Tailored curriculum</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>On-site or remote delivery</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Team pricing options</span>
                    </li>
                </ul>
                <a href="corporate.php" class="text-blue-600 hover:text-blue-800 font-medium">Learn More →</a>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Executive Coaching</h3>
                <p class="text-gray-600 mb-4">One-on-one coaching for senior professionals and executives focused on leadership development.</p>
                <ul class="text-gray-600 space-y-2 mb-4">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Personalized development plan</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>360-degree feedback</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Ongoing support</span>
                    </li>
                </ul>
                <a href="contact.php" class="text-blue-600 hover:text-blue-800 font-medium">Learn More →</a>
            </div>
        </div>
    </div>
</section>

<!-- How to Enroll -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">How to Enroll</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Simple steps to join our upcoming batches.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-blue-600 font-bold text-xl">1</span>
                </div>
                <h3 class="text-lg font-bold mb-2">Choose a Batch</h3>
                <p class="text-gray-600">Select a course and batch timing that fits your schedule.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-blue-600 font-bold text-xl">2</span>
                </div>
                <h3 class="text-lg font-bold mb-2">Register</h3>
                <p class="text-gray-600">Complete the enrollment form and make payment.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-blue-600 font-bold text-xl">3</span>
                </div>
                <h3 class="text-lg font-bold mb-2">Confirmation</h3>
                <p class="text-gray-600">Receive confirmation and joining instructions via email.</p>
            </div>
            
            <div class="text-center">
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
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-500 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Join a Batch?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Secure your spot in our upcoming training sessions.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="contact.php" class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Enroll Now</a>
            <a href="contact.php" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Contact for Custom Scheduling</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/layout.php';
?>