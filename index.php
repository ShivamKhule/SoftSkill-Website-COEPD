<?php
$pageTitle = "Home - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/includes/functions.php';
$testimonials = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/testimonials.json');
$courses = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/courses.json');
$services = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/services.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6">Transform Your Professional Skills</h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">Welcome to our Soft Skills Training platform, where learners, professionals, and organizations build strong communication, leadership, and workplace skills.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="pages/courses/" class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Explore Courses</a>
            <a href="pages/contact.php" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Contact Us</a>
        </div>
    </div>
</section>

<!-- Quick Services Overview -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Our Training Programs</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach (array_slice($services, 0, 6) as $service): ?>
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-<?php echo $service['icon']; ?>"></i>
                </div>
                <h3 class="text-xl font-bold mb-2"><?php echo $service['title']; ?></h3>
                <p class="text-gray-600"><?php echo $service['description']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-10">
            <a href="pages/services.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">View All Services</a>
        </div>
    </div>
</section>

<!-- Why Soft Skills Matter -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Team Collaboration" class="rounded-lg shadow-lg">
            </div>
            <div class="md:w-1/2 md:pl-12">
                <h2 class="text-3xl font-bold mb-6">Why Soft Skills Matter</h2>
                <p class="text-gray-600 mb-6">In today's workplace, technical skills alone aren't enough. Employers increasingly value professionals who can communicate effectively, lead teams, and adapt to changing environments.</p>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Career advancement depends more on soft skills than technical expertise</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Strong communication improves team collaboration and productivity</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Leadership skills are essential for career progression</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Emotional intelligence drives better workplace relationships</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Who Should Join -->
<section class="py-16 bg-blue-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Who Should Join</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Students & Graduates</h3>
                <p class="text-gray-600">Prepare for the professional world with essential workplace skills</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Working Professionals</h3>
                <p class="text-gray-600">Advance your career with improved communication and leadership</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-building"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Organizations</h3>
                <p class="text-gray-600">Enhance team performance with customized corporate training</p>
            </div>
        </div>
    </div>
</section>

<!-- Course Highlights -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Featured Courses</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <?php foreach (array_slice($courses, 0, 2) as $course): ?>
            <div class="border border-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-2"><?php echo $course['title']; ?></h3>
                    <p class="text-gray-600 mb-4"><?php echo $course['description']; ?></p>
                    <ul class="mb-6 space-y-2">
                        <?php foreach (array_slice($course['skills_learned'], 0, 4) as $skill): ?>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span><?php echo $skill; ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="pages/courses/<?php echo $course['id']; ?>.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300">Learn More</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">What Our Students Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach (array_slice($testimonials, 0, 3) as $testimonial): ?>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <i class="fas fa-star <?php echo $i <= $testimonial['rating'] ? 'text-yellow-400' : 'text-gray-300'; ?>"></i>
                    <?php endfor; ?>
                </div>
                <p class="text-gray-600 italic mb-6">"<?php echo $testimonial['comment']; ?>"</p>
                <div class="flex items-center">
                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16" />
                    <div class="ml-4">
                        <h4 class="font-bold"><?php echo $testimonial['name']; ?></h4>
                        <p class="text-gray-600"><?php echo $testimonial['role']; ?><?php echo !empty($testimonial['company']) ? ', ' . $testimonial['company'] : ''; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Transform Your Skills?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Join thousands of professionals who have advanced their careers with our proven training programs.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="pages/courses/" class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Enroll Now</a>
            <a href="pages/contact.php" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Schedule a Consultation</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/layout.php';
?>