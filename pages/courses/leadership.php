<?php
$pageTitle = "Leadership & Team Building - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/includes/functions.php';
$course = getCourseById('leadership');
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/layout.php';
?>

<?php $content = '
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6"><?php echo $course[\'title\']; ?></h1>
            <p class="text-xl max-w-3xl mx-auto"><?php echo $course[\'description\']; ?></p>
        </div>
    </div>
</section>

<!-- Course Details -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Overview -->
                <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-6">Course Overview</h2>
                    <p class="text-gray-600"><?php echo $course[\'overview\']; ?></p>
                </div>
                
                <!-- Skills You Will Learn -->
                <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-6">Skills You Will Learn</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php foreach ($course[\'skills_learned\'] as $skill): ?>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span><?php echo $skill; ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Who Should Attend -->
                <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-6">Who Should Attend</h2>
                    <p class="text-gray-600"><?php echo $course[\'who_attend\']; ?></p>
                </div>
                
                <!-- Training Formats -->
                <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-6">Training Formats</h2>
                    <div class="flex flex-wrap gap-4">
                        <?php foreach ($course[\'formats\'] as $format): ?>
                        <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-lg"><?php echo $format; ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Curriculum -->
                <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-6">Curriculum / Modules</h2>
                    <div class="space-y-4">
                        <?php foreach ($course[\'curriculum\'] as $index => $module): ?>
                        <div class="flex items-start">
                            <div class="bg-blue-100 text-blue-800 font-bold rounded-full w-8 h-8 flex items-center justify-center mr-4 mt-1">
                                <?php echo $index + 1; ?>
                            </div>
                            <span><?php echo $module; ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Testimonials -->
                <div class="bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-bold mb-6">Student Testimonials</h2>
                    <div class="space-y-6">
                        <?php foreach ($course[\'testimonials\'] as $testimonial): ?>
                        <div class="border-l-4 border-blue-500 pl-4 py-2">
                            <p class="text-gray-700 italic mb-4">"<?php echo $testimonial[\'comment\']; ?>"</p>
                            <p class="font-bold"><?php echo $testimonial[\'name\']; ?></p>
                            <p class="text-gray-600"><?php echo $testimonial[\'role\']; ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div>
                <!-- Course Info Card -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8 sticky top-6">
                    <h3 class="text-xl font-bold mb-4">Course Information</h3>
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Duration:</span>
                            <span class="font-bold"><?php echo $course[\'duration\']; ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Fees:</span>
                            <span class="font-bold text-blue-600"><?php echo $course[\'fees\']; ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Certification:</span>
                            <span class="font-bold"><?php echo $course[\'certification\']; ?></span>
                        </div>
                    </div>
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                        Enroll Now
                    </button>
                    <a href="../contact.php" class="block text-center mt-4 text-blue-600 hover:text-blue-800 font-bold">
                        Contact for Corporate Training
                    </a>
                </div>
                
                <!-- Why Choose Us -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-4">Why Choose Us</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span>Industry expert trainers</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span>Practical, hands-on approach</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span>Flexible learning formats</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span>Recognized certification</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
'; ?>