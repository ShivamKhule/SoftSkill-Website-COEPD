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
<section class="relative text-white py-20 md:py-28 animate-fade-in">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
            alt="Soft Skills Training" class="w-full h-full object-cover animate-zoom-in">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-teal-500 opacity-75"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center animate-slide-up">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in-down">Transform Your Professional Skills</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto animate-fade-in-delay">Master communication,
                leadership, and workplace skills
                to accelerate your career and boost confidence.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-delay-2">
                <!-- <a href="pages/courses/" -->
                <a href="#"
                    class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 shadow-lg transform hover:scale-105">Explore
                    Courses</a>
                <!-- <a href="pages/downloads/" -->
                <a href="#"
                    class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105">Free
                    E-book</a>
            </div>
        </div>
    </div>
</section>

<!-- Trust Indicators -->
<section class="py-8 bg-gray-100 animate-fade-in-up">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16">
            <div class="text-center animate-float">
                <div class="counter text-blue-600 text-4xl md:text-5xl font-bold" data-target="10000">0</div>
                <div class="counter-label text-gray-600 mt-2">Students Trained</div>
            </div>
            <div class="text-center animate-float delay-1">
                <div class="counter text-blue-600 text-4xl md:text-5xl font-bold" data-target="250">0</div>
                <div class="counter-label text-gray-600 mt-2">Corporate Clients</div>
            </div>
            <div class="text-center animate-float delay-2">
                <div class="counter text-blue-600 text-4xl md:text-5xl font-bold" data-target="95">0</div>
                <div class="counter-label text-gray-600 mt-2">Success Rate %</div>
            </div>
            <div class="text-center animate-float delay-3">
                <div class="counter text-blue-600 text-4xl md:text-5xl font-bold" data-target="50">0</div>
                <div class="counter-label text-gray-600 mt-2">Expert Trainers</div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Services Overview -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Training Programs</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Comprehensive soft skills training designed for professionals,
                job seekers, and organizations.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 service-cards-container">
            <?php foreach (array_slice($services, 0, 6) as $index => $service): ?>
                <div
                    class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 transform hover:-translate-y-2 service-card animate-fade-in-up delay-<?php echo ($index + 1); ?>">
                    <div class="text-blue-600 text-3xl mb-4">
                        <i class="fas <?php echo $service['icon']; ?>"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2"><?php echo $service['title']; ?></h3>
                    <p class="text-gray-600 mb-4"><?php echo $service['description']; ?></p>
                    <!-- <a href="pages/services.php" -->
                    <a href="#"
                        class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center transform hover:translate-x-1 transition-transform">
                        Learn more
                        <i
                            class="fas fa-arrow-right ml-2 text-sm transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-10 animate-fade-in-delay-3">
            <!-- <a href="pages/services.php" -->
            <a href="#"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105 shadow-lg">View
                All Services</a>
        </div>
    </div>
</section>

<!-- Why Soft Skills Matter -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50 animate-fade-in">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-1/2 animate-slide-in-left">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    alt="Team Collaboration"
                    class="rounded-xl shadow-lg w-full transform hover:scale-105 transition duration-500">
            </div>
            <div class="lg:w-1/2 animate-slide-in-right">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Why Soft Skills Matter</h2>
                <p class="text-gray-600 mb-6">In today's workplace, technical skills alone aren't enough. Employers
                    increasingly value professionals who can communicate effectively, lead teams, and adapt to changing
                    environments.</p>
                <ul class="space-y-4">
                    <li class="flex items-start animate-fade-in-left delay-1">
                        <i
                            class="fas fa-check-circle text-green-500 mt-1 mr-3 transform rotate-0 animate-rotate-in"></i>
                        <span class="text-gray-700"><span class="font-semibold">Career advancement</span> depends more
                            on soft skills than technical expertise</span>
                    </li>
                    <li class="flex items-start animate-fade-in-left delay-2">
                        <i
                            class="fas fa-check-circle text-green-500 mt-1 mr-3 transform rotate-0 animate-rotate-in"></i>
                        <span class="text-gray-700"><span class="font-semibold">Strong communication</span> improves
                            team collaboration and productivity</span>
                    </li>
                    <li class="flex items-start animate-fade-in-left delay-3">
                        <i
                            class="fas fa-check-circle text-green-500 mt-1 mr-3 transform rotate-0 animate-rotate-in"></i>
                        <span class="text-gray-700"><span class="font-semibold">Leadership skills</span> are essential
                            for career progression</span>
                    </li>
                    <li class="flex items-start animate-fade-in-left delay-4">
                        <i
                            class="fas fa-check-circle text-green-500 mt-1 mr-3 transform rotate-0 animate-rotate-in"></i>
                        <span class="text-gray-700"><span class="font-semibold">Emotional intelligence</span> drives
                            better workplace relationships</span>
                    </li>
                </ul>
                <!-- <a href="pages/about.php" -->
                <a href="#"
                    class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105 shadow-md">Learn
                    More About Us</a>
            </div>
        </div>
    </div>
</section>

<!-- Who Should Join -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Who Should Join</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Our training programs are designed for diverse professionals at
                all career stages.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-xl shadow-md text-center border border-blue-100 transform hover:scale-105 transition-all duration-300 hover:shadow-xl who-join-card animate-fade-in-up delay-1">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-user-graduate animate-pulse"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Students & Graduates</h3>
                <p class="text-gray-600 mb-4">Prepare for the professional world with essential workplace skills</p>
                <!-- <a href="pages/courses/interview.php" class="text-blue-600 hover:text-blue-800 font-medium">Explore -->
                <a href="#"
                    class="text-blue-600 hover:text-blue-800 font-medium transform hover:translate-x-1 inline-flex items-center transition-transform">
                    Explore Programs
                    <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
            <div
                class="bg-gradient-to-br from-teal-50 to-white p-8 rounded-xl shadow-md text-center border border-teal-100 transform hover:scale-105 transition-all duration-300 hover:shadow-xl who-join-card animate-fade-in-up delay-2">
                <div class="text-teal-600 text-4xl mb-4">
                    <i class="fas fa-briefcase animate-pulse"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Working Professionals</h3>
                <p class="text-gray-600 mb-4">Advance your career with improved communication and leadership</p>
                <!-- <a href="pages/courses/leadership.php" class="text-teal-600 hover:text-teal-800 font-medium">Explore -->
                <a href="#"
                    class="text-teal-600 hover:text-teal-800 font-medium transform hover:translate-x-1 inline-flex items-center transition-transform">
                    Explore Programs
                    <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
            <div
                class="bg-gradient-to-br from-indigo-50 to-white p-8 rounded-xl shadow-md text-center border border-indigo-100 transform hover:scale-105 transition-all duration-300 hover:shadow-xl who-join-card animate-fade-in-up delay-3">
                <div class="text-indigo-600 text-4xl mb-4">
                    <i class="fas fa-building animate-pulse"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Organizations</h3>
                <p class="text-gray-600 mb-4">Enhance team performance with customized corporate training</p>
                <!-- <a href="pages/corporate.php" class="text-indigo-600 hover:text-indigo-800 font-medium">Explore Programs -->
                <a href="#"
                    class="text-indigo-600 hover:text-indigo-800 font-medium transform hover:translate-x-1 inline-flex items-center transition-transform">
                    Explore Programs
                    <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Courses -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Featured Courses</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Handpicked programs designed by industry experts to transform
                your skills.</p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <?php foreach (array_slice($courses, 0, 2) as $index => $course): ?>
                <div
                    class="border border-gray-200 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 course-card animate-fade-in-up delay-<?php echo ($index + 1); ?>">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2"><?php echo $course['title']; ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo $course['description']; ?></p>
                        <ul class="mb-6 space-y-2">
                            <?php foreach (array_slice($course['skills_learned'], 0, 4) as $skill): ?>
                                <li class="flex items-center animate-fade-in-left">
                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                    <span><?php echo $skill; ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="flex flex-wrap justify-between items-center">
                            <span class="text-blue-600 font-bold text-lg"><?php echo $course['fees']; ?></span>
                            <!-- <a href="pages/courses/<?php echo $course['id']; ?>.php" -->
                            <a href="#"
                                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300 transform hover:scale-105">Learn
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

        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">What Our Students Say</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Real stories from professionals who transformed their careers with our training.
            </p>
        </div>

        <!-- Proper Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 testimonial-container">
            <?php foreach (array_slice($testimonials, 0, 3) as $index => $testimonial): ?>
                <div
                    class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 testimonial-card animate-fade-in-up delay-<?php echo ($index + 1); ?>">
                    <!-- Rating Stars -->
                    <div class="flex items-center mb-4">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <i
                                class="fas fa-star <?php echo $i <= $testimonial['rating'] ? 'text-yellow-400' : 'text-gray-300'; ?> animate-pulse-slow"></i>
                        <?php endfor; ?>
                    </div>

                    <p class="text-gray-700 italic mb-6 leading-relaxed">
                        "<?php echo $testimonial['comment']; ?>"
                    </p>

                    <!-- Profile -->
                    <div class="flex items-center">
                        <div class="w-16 h-16 flex-shrink-0">
                            <img src="<?php echo $testimonial['image']; ?>" alt="<?php echo $testimonial['name']; ?>"
                                class="w-16 h-16 rounded-xl object-cover border-2 border-dashed bg-gray-200 transform hover:scale-110 transition duration-300" />
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

        <div class="text-center mt-10 animate-fade-in-delay-2">
            <!-- <a href="pages/stories.php" -->
            <a href="#"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg transform hover:scale-105">
                View All Success Stories
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-500 text-white animate-fade-in">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-pulse-slow">Ready to Transform Your Skills?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto animate-fade-in-delay">Join thousands of professionals who have
            advanced their careers with
            our proven training programs.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-delay-2">
            <!-- <a href="pages/courses/" -->
            <a href="#"
                class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 shadow-lg transform hover:scale-105">Enroll
                Now</a>
            <!-- <a href="pages/contact.php" -->
            <a href="#"
                class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105">Schedule
                a Consultation</a>
        </div>
    </div>
</section>

<!-- Lead Capture Form -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50 shadow-lg animate-fade-in">
    <div class="container mx-auto px-4 text-center">
        <div class="text-center mb-8 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Get Our Free E-book</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Download "7-Day Communication Mastery Guide" - Transform your
                communication skills in just one week!</p>
        </div>

        <!-- Key fixes here -->
        <form id="downloadForm" action="includes/process_download.php" method="POST"
            class="flex flex-wrap gap-4 max-w-2xl mx-auto items-center justify-center">

            <input type="text" id="userName" name="name" placeholder="Your Name"
                class="flex-1 min-w-[200px] px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transform focus:scale-[1.02] transition duration-300">

            <input type="email" id="userEmail" name="email" placeholder="Your Email"
                class="flex-1 min-w-[200px] px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transform focus:scale-[1.02] transition duration-300">

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 shadow-md whitespace-nowrap">
                Download Now
            </button>
        </form>

        <p class="text-gray-500 text-xs mt-4 text-center animate-fade-in-delay">
            By downloading, you agree to our privacy policy and consent to receive updates.
        </p>
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

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
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

    .animate-slide-in-left {
        animation: slideInLeft 0.8s ease-out forwards;
        opacity: 0;
    }

    .animate-slide-in-right {
        animation: slideInRight 0.8s ease-out forwards;
        opacity: 0;
    }

    .animate-zoom-in {
        animation: zoomIn 1.2s ease-out forwards;
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    .animate-bounce {
        animation: bounce 1s ease-in-out infinite;
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

    .animate-fade-in-delay {
        animation: fadeIn 0.8s ease-out 0.3s forwards;
        opacity: 0;
    }

    .animate-fade-in-delay-2 {
        animation: fadeIn 0.8s ease-out 0.6s forwards;
        opacity: 0;
    }

    .animate-fade-in-delay-3 {
        animation: fadeIn 0.8s ease-out 0.9s forwards;
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
    .animate-fade-in-delay-2,
    .animate-fade-in-delay-3 {
        opacity: 0;
    }

    /* Stagger animations for service cards */
    .service-cards-container .service-card:nth-child(1) {
        animation-delay: 0.1s;
    }

    .service-cards-container .service-card:nth-child(2) {
        animation-delay: 0.2s;
    }

    .service-cards-container .service-card:nth-child(3) {
        animation-delay: 0.3s;
    }

    .service-cards-container .service-card:nth-child(4) {
        animation-delay: 0.4s;
    }

    .service-cards-container .service-card:nth-child(5) {
        animation-delay: 0.5s;
    }

    .service-cards-container .service-card:nth-child(6) {
        animation-delay: 0.6s;
    }

    /* Stagger animations for who join cards */
    .who-join-card:nth-child(1) {
        animation-delay: 0.1s;
    }

    .who-join-card:nth-child(2) {
        animation-delay: 0.2s;
    }

    .who-join-card:nth-child(3) {
        animation-delay: 0.3s;
    }

    /* Stagger animations for course cards */
    .course-card:nth-child(1) {
        animation-delay: 0.1s;
    }

    .course-card:nth-child(2) {
        animation-delay: 0.2s;
    }

    /* Stagger animations for testimonial cards */
    .testimonial-container .testimonial-card:nth-child(1) {
        animation-delay: 0.1s;
    }

    .testimonial-container .testimonial-card:nth-child(2) {
        animation-delay: 0.2s;
    }

    .testimonial-container .testimonial-card:nth-child(3) {
        animation-delay: 0.3s;
    }

    /* Stagger animations for trust indicators */
    .animate-float:nth-child(1) {
        animation-delay: 0s;
    }

    .animate-float:nth-child(2) {
        animation-delay: 0.1s;
    }

    .animate-float:nth-child(3) {
        animation-delay: 0.2s;
    }

    .animate-float:nth-child(4) {
        animation-delay: 0.3s;
    }
</style>

<script>
    // Counter animation
    document.addEventListener('DOMContentLoaded', function () {
        const counters = document.querySelectorAll('.counter');

        // Intersection Observer for animations
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

        // Counter animation
        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
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
                    observer.unobserve(counter);
                }
            });
        }, observerOptions);

        counters.forEach(counter => {
            counterObserver.observe(counter);
        });

        // Form validation
        const downloadForm = document.getElementById('downloadForm');
        if (downloadForm) {
            downloadForm.addEventListener('submit', function (e) {
                const name = document.getElementById('userName').value.trim();
                const email = document.getElementById('userEmail').value.trim();

                if (!name) {
                    alert('Please enter your name');
                    e.preventDefault();
                    return false;
                }

                if (!email) {
                    alert('Please enter your email');
                    e.preventDefault();
                    return false;
                }

                // Simple email validation
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    alert('Please enter a valid email address');
                    e.preventDefault();
                    return false;
                }
            });
        }
    });
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/components/layout.php';
?>