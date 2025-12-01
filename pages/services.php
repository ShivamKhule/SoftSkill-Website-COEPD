<?php
$pageTitle = "Our Services - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/includes/functions.php';
$services = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/services.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Our Training Services</h1>
        <p class="text-xl max-w-3xl mx-auto">Comprehensive soft skills programs designed for individuals and organizations.</p>
    </div>
</section>

<!-- Services Overview -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Training Programs</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Explore our comprehensive range of soft skills training programs designed to meet your personal and professional development needs.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($services as $service): ?>
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 border border-gray-100">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-<?php echo $service['icon']; ?>"></i>
                </div>
                <h3 class="text-xl font-bold mb-3"><?php echo $service['title']; ?></h3>
                <p class="text-gray-600 mb-4"><?php echo $service['description']; ?></p>
                <a href="courses/<?php echo str_replace(' ', '-', strtolower($service['title'])); ?>.php" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center">
                    Learn more
                    <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Corporate Training -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Corporate Training" class="rounded-lg shadow-lg">
            </div>
            <div class="md:w-1/2 md:pl-12">
                <h2 class="text-3xl font-bold mb-6">Corporate Soft Skills Training</h2>
                <p class="text-gray-600 mb-6">We provide customized corporate soft-skills programs for teams and organizations to enhance workplace communication, collaboration, and productivity.</p>
                
                <div class="space-y-4 mb-8">
                    <div class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Team Communication & Collaboration</span>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Leadership Development Programs</span>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Customer Service Excellence</span>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Change Management & Adaptability</span>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Conflict Resolution & Workplace Etiquette</span>
                    </div>
                </div>
                
                <a href="corporate.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Learn About Corporate Programs</a>
            </div>
        </div>
    </div>
</section>

<!-- Training Formats -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Flexible Training Formats</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Choose the learning format that best fits your schedule and preferences.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-md text-center border-t-4 border-blue-500">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-laptop"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Online Training</h3>
                <p class="text-gray-600 mb-4">Live interactive sessions from anywhere with our virtual classroom technology.</p>
                <ul class="text-left text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Live instructor-led sessions</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Session recordings for review</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Interactive exercises and activities</span>
                    </li>
                </ul>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-md text-center border-t-4 border-green-500">
                <div class="text-green-600 text-4xl mb-4">
                    <i class="fas fa-building"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">In-Person Classes</h3>
                <p class="text-gray-600 mb-4">Traditional classroom experience at our training centers with direct interaction.</p>
                <ul class="text-left text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Face-to-face instruction</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Networking opportunities</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Hands-on practice sessions</span>
                    </li>
                </ul>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-md text-center border-t-4 border-purple-500">
                <div class="text-purple-600 text-4xl mb-4">
                    <i class="fas fa-building"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">On-Site Corporate</h3>
                <p class="text-gray-600 mb-4">Customized training delivered at your organization's location.</p>
                <ul class="text-left text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Tailored to your company needs</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Minimize employee travel time</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Team building benefits</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Enhance Your Skills?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Join our next batch or contact us to learn more about our training programs.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="schedule.php" class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">View Schedule</a>
            <a href="contact.php" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Contact Us</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/layout.php';
?>