<?php
$pageTitle = "Home - SoftSkills Academy";

// Include configuration file
require_once __DIR__ . '/config.php';

include __DIR__ . '/includes/functions.php';
$testimonials = loadData(__DIR__ . '/data/testimonials.json');
$courses = loadData(__DIR__ . '/data/courses.json');
$services = loadData(__DIR__ . '/data/services.json');
require_once __DIR__ . '/includes/db.php';
$db = new Database();

$db->connectServer();
$db->createDatabase();
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="relative text-white py-20 md:py-28">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
            alt="Soft Skills Training" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-teal-500 opacity-75"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Transform Your Professional Skills</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">Master communication, leadership, and workplace skills
                to accelerate your career and boost confidence.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <!-- <a href="pages/courses/" -->
                <a href="#"
                    class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 shadow-lg">Explore
                    Courses</a>
                <!-- <a href="pages/downloads/" -->
                <a href="#"
                    class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Free
                    E-book</a>
            </div>
        </div>
    </div>
</section>

<!-- Trust Indicators -->
<section class="py-8 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16">
            <div class="text-center">
                <div class="counter text-blue-600" data-target="10000">0</div>
                <div class="counter-label text-gray-600">Students Trained</div>
            </div>
            <div class="text-center">
                <div class="counter text-blue-600" data-target="250">0</div>
                <div class="counter-label text-gray-600">Corporate Clients</div>
            </div>
            <div class="text-center">
                <div class="counter text-blue-600" data-target="95">0</div>
                <div class="counter-label text-gray-600">Success Rate %</div>
            </div>
            <div class="text-center">
                <div class="counter text-blue-600" data-target="50">0</div>
                <div class="counter-label text-gray-600">Expert Trainers</div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Services Overview -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Training Programs</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Comprehensive soft skills training designed for professionals,
                job seekers, and organizations.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach (array_slice($services, 0, 6) as $service): ?>
                <div
                    class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300 border border-gray-100">
                    <div class="text-blue-600 text-3xl mb-4">
                        <i class="fas <?php echo $service['icon']; ?>"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2"><?php echo $service['title']; ?></h3>
                    <p class="text-gray-600 mb-4"><?php echo $service['description']; ?></p>
                    <!-- <a href="pages/services.php" -->
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center">
                        Learn more
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-10">
            <!-- <a href="pages/services.php" -->
            <a href="#"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">View
                All Services</a>
        </div>
    </div>
</section>

<!-- Why Soft Skills Matter -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-1/2">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    alt="Team Collaboration" class="rounded-xl shadow-lg w-full">
            </div>
            <div class="lg:w-1/2">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Why Soft Skills Matter</h2>
                <p class="text-gray-600 mb-6">In today's workplace, technical skills alone aren't enough. Employers
                    increasingly value professionals who can communicate effectively, lead teams, and adapt to changing
                    environments.</p>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><span class="font-semibold">Career advancement</span> depends more
                            on soft skills than technical expertise</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><span class="font-semibold">Strong communication</span> improves
                            team collaboration and productivity</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><span class="font-semibold">Leadership skills</span> are essential
                            for career progression</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700"><span class="font-semibold">Emotional intelligence</span> drives
                            better workplace relationships</span>
                    </li>
                </ul>
                <!-- <a href="pages/about.php" -->
                <a href="#"
                    class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Learn
                    More About Us</a>
            </div>
        </div>
    </div>
</section>

<!-- Who Should Join -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Who Should Join</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Our training programs are designed for diverse professionals at
                all career stages.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-xl shadow-md text-center border border-blue-100">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Students & Graduates</h3>
                <p class="text-gray-600 mb-4">Prepare for the professional world with essential workplace skills</p>
                <!-- <a href="pages/courses/interview.php" class="text-blue-600 hover:text-blue-800 font-medium">Explore -->
                <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Explore
                    Programs →</a>
            </div>
            <div
                class="bg-gradient-to-br from-teal-50 to-white p-8 rounded-xl shadow-md text-center border border-teal-100">
                <div class="text-teal-600 text-4xl mb-4">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Working Professionals</h3>
                <p class="text-gray-600 mb-4">Advance your career with improved communication and leadership</p>
                <!-- <a href="pages/courses/leadership.php" class="text-teal-600 hover:text-teal-800 font-medium">Explore -->
                <a href="#" class="text-teal-600 hover:text-teal-800 font-medium">Explore
                    Programs →</a>
            </div>
            <div
                class="bg-gradient-to-br from-indigo-50 to-white p-8 rounded-xl shadow-md text-center border border-indigo-100">
                <div class="text-indigo-600 text-4xl mb-4">
                    <i class="fas fa-building"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Organizations</h3>
                <p class="text-gray-600 mb-4">Enhance team performance with customized corporate training</p>
                <!-- <a href="pages/corporate.php" class="text-indigo-600 hover:text-indigo-800 font-medium">Explore Programs -->
                <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">Explore Programs
                    →</a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Courses -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Featured Courses</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Handpicked programs designed by industry experts to transform
                your skills.</p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <?php foreach (array_slice($courses, 0, 2) as $course): ?>
                <div
                    class="border border-gray-200 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition duration-300">
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
                        <div class="flex flex-wrap justify-between items-center">
                            <span class="text-blue-600 font-bold text-lg"><?php echo $course['fees']; ?></span>
                            <!-- <a href="pages/courses/<?php echo $course['id']; ?>.php" -->
                            <a href="#"
                                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300">Learn
                                More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="container mx-auto px-4">

        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">What Our Students Say</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Real stories from professionals who transformed their careers with our training.
            </p>
        </div>

        <!-- Proper Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php foreach (array_slice($testimonials, 0, 3) as $testimonial): ?>
                <div
                    class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">

                    <!-- Rating Stars -->
                    <div class="flex items-center mb-4">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <i
                                class="fas fa-star <?php echo $i <= $testimonial['rating'] ? 'text-yellow-400' : 'text-gray-300'; ?>"></i>
                        <?php endfor; ?>
                    </div>

                    <p class="text-gray-700 italic mb-6 leading-relaxed">
                        "<?php echo $testimonial['comment']; ?>"
                    </p>

                    <!-- Profile -->
                    <div class="flex items-center">
                        <div class="w-16 h-16 flex-shrink-0">
                            <img src="<?php echo $testimonial['image']; ?>" alt="<?php echo $testimonial['name']; ?>"
                                class="w-16 h-16 rounded-xl object-cover border-2 border-dashed bg-gray-200" />
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-900"><?php echo $testimonial['name']; ?></h4>
                            <p class="text-gray-600 text-sm">
                                <?php echo $testimonial['role']; ?>
                                <?php echo !empty($testimonial['company']) ? ', ' . $testimonial['company'] : ''; ?>
                            </p>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>

        </div>

        <div class="text-center mt-10">
            <!-- <a href="pages/stories.php" -->
            <a href="#"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg">
                View All Success Stories
            </a>
        </div>

    </div>
</section>


<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-500 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Transform Your Skills?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Join thousands of professionals who have advanced their careers with
            our proven training programs.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <!-- <a href="pages/courses/" -->
            <a href="#"
                class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 shadow-lg">Enroll
                Now</a>
            <!-- <a href="pages/contact.php" -->
            <a href="#"
                class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Schedule
                a Consultation</a>
        </div>
    </div>
</section>

<!-- Lead Capture Form -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50 shadow-lg">
    <div class="container mx-auto px-4 text-center">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold mb-4">Get Our Free E-book</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Download "7-Day Communication Mastery Guide" - Transform your
                communication skills in just one week!</p>
        </div>
        <form class="flex flex-col sm:flex-row gap-4 max-w-2xl mx-auto">
            <input type="text" placeholder="Your Name"
                class="flex-grow px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <input type="email" placeholder="Your Email"
                class="flex-grow px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Download
                Now</button>
        </form>
        <p class="text-gray-500 text-xs mt-4 text-center">By downloading, you agree to our privacy policy and
            consent to receive updates.</p>
    </div>
</section>

<script>
    // Counter animation
    document.addEventListener('DOMContentLoaded', function () {
        const counters = document.querySelectorAll('.counter');

        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;

                const increment = target / 100;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 20);
                } else {
                    counter.innerText = target;
                }
            };

            updateCount();
        });
    });
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/components/layout.php';
?>
