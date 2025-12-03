<?php
$pageTitle = "Courses - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/includes/functions.php';
$courses = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/courses.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Our Courses</h1>
        <p class="text-xl max-w-3xl mx-auto">Comprehensive training programs designed to enhance your professional
            skills.</p>
    </div>
</section>

<!-- Courses Grid -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Available Courses</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Choose from our wide range of specialized training programs
                tailored to your professional development needs.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($courses as $course): ?>
                <div
                    class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-md overflow-hidden border border-gray-100">

                    <div class="w-full h-48 bg-gray-200 border-2 border-dashed overflow-hidden">
                        <img src="<?php echo $course['image']; ?>" alt="<?php echo $course['title']; ?>"
                            class="w-full h-full object-cover" />
                    </div>


                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2"><?php echo $course['title']; ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo $course['description']; ?></p>
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-bold"><?php echo $course['fees']; ?></span>
                            <a href="<?php echo $course['id']; ?>.php"
                                class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-sm transition duration-300">View
                                Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Learning Formats -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Flexible Learning Formats</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Choose the format that best fits your schedule and learning
                preferences.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-md text-center">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-laptop"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Online Live</h3>
                <p class="text-gray-600 mb-4">Interactive sessions from anywhere with real-time engagement.</p>
                <ul class="text-left text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Live instructor-led sessions</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Session recordings</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Peer interaction</span>
                    </li>
                </ul>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md text-center">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-building"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">In-Person</h3>
                <p class="text-gray-600 mb-4">Traditional classroom experience with direct interaction.</p>
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
                        <span>Hands-on practice</span>
                    </li>
                </ul>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md text-center">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Corporate</h3>
                <p class="text-gray-600 mb-4">Customized training delivered at your organization.</p>
                <ul class="text-left text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Tailored to your needs</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>On-site or remote</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        <span>Team pricing</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Enhance Your Skills?</h2>
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">Join our next batch or contact us to learn more about
            our training programs.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="../schedule.php"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg text-lg transition duration-300">View
                Schedule</a>
            <a href="../contact.php"
                class="bg-white border-2 border-blue-600 text-blue-600 hover:bg-blue-50 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Contact
                Us</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/layout.php';
?>