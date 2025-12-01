<?php
$pageTitle = "Our Trainers - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/includes/functions.php';
$trainers = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/trainers.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Our Expert Trainers</h1>
        <p class="text-xl max-w-3xl mx-auto">Learn from industry professionals with extensive experience and proven expertise.</p>
    </div>
</section>

<!-- Trainers Grid -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Meet Our Training Team</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Our trainers bring decades of real-world experience and proven teaching expertise.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($trainers as $trainer): ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-gray-200 border-2 border-dashed w-full h-64"></div>
                <div class="p-6">
                    <h3 class="text-xl font-bold"><?php echo $trainer['name']; ?></h3>
                    <p class="text-blue-600 mb-3"><?php echo $trainer['title']; ?></p>
                    <p class="text-gray-600 text-sm mb-4"><?php echo substr($trainer['bio'], 0, 120); ?>...</p>
                    <a href="<?php echo $trainer['id']; ?>.php" class="text-blue-600 hover:text-blue-800 font-medium">View Full Profile →</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Trainer Qualifications -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Trainer Qualifications</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">All our trainers undergo rigorous certification and continuous professional development.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div class="bg-white p-8 rounded-lg shadow-md">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-award"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Certification Requirements</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Minimum 10 years of industry experience</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Advanced degree or equivalent professional qualifications</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Proven training and facilitation experience</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Ongoing professional development commitment</span>
                    </li>
                </ul>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-md">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Continuous Development</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Quarterly skills assessments</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Annual recertification process</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Participation in industry conferences</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Feedback-driven improvement programs</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Become a Trainer -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg p-8 text-white text-center">
            <h2 class="text-3xl font-bold mb-4">Interested in Becoming a Trainer?</h2>
            <p class="text-xl mb-6 max-w-2xl mx-auto">Join our team of expert trainers and help shape the next generation of professionals.</p>
            <a href="../../pages/contact.php" class="inline-block bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Apply Now</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/layout.php';
?>