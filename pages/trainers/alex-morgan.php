<?php
$pageTitle = "Alex Morgan - Communication Specialist";
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/includes/functions.php';
$trainer = getTrainerById('alex-morgan');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6"><?php echo $trainer['name']; ?></h1>
            <p class="text-xl"><?php echo $trainer['title']; ?></p>
        </div>
    </div>
</section>

<!-- Trainer Profile -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Bio -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-md p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-6">About <?php echo $trainer['name']; ?></h2>
                    <p class="text-gray-600"><?php echo $trainer['bio']; ?></p>
                </div>
                
                <!-- Experience -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-md p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-6">Experience</h2>
                    <p class="text-gray-600"><?php echo $trainer['experience']; ?></p>
                </div>
                
                <!-- Expertise -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-md p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-6">Areas of Expertise</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php foreach ($trainer['expertise'] as $area): ?>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span><?php echo $area; ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Industries Trained -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-md p-8">
                    <h2 class="text-2xl font-bold mb-6">Industries Trained</h2>
                    <div class="flex flex-wrap gap-3">
                        <?php foreach ($trainer['industries_trained'] as $industry): ?>
                        <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-lg"><?php echo $industry; ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div>
                <!-- Profile Card -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-md p-6 mb-8 sticky top-6">
                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-64 mb-6"></div>
                    <h3 class="text-xl font-bold mb-2"><?php echo $trainer['name']; ?></h3>
                    <p class="text-blue-600 mb-4"><?php echo $trainer['title']; ?></p>
                    
                    <div class="space-y-4">
                        <div>
                            <h4 class="font-bold text-gray-800 mb-2">Certifications</h4>
                            <ul class="text-gray-600 text-sm space-y-1">
                                <?php foreach ($trainer['certifications'] as $cert): ?>
                                <li><?php echo $cert; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div>
                            <h4 class="font-bold text-gray-800 mb-2">Teaching Philosophy</h4>
                            <p class="text-gray-600 text-sm"><?php echo $trainer['philosophy']; ?></p>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Trainer -->
                <div class="bg-gradient-to-br from-blue-50 to-teal-50 rounded-xl p-6 shadow-md">
                    <h3 class="text-xl font-bold mb-4">Contact Trainer</h3>
                    <p class="text-gray-600 mb-4">Interested in booking a session with this trainer?</p>
                    <a href="../../pages/contact.php" class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg text-center transition duration-300">
                        Request Session
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-500 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Work with Our Expert Trainers?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Join our training programs and learn from industry professionals.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="../../pages/courses/" class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Explore Courses</a>
            <a href="../../pages/contact.php" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Contact Us</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/layout.php';
?>