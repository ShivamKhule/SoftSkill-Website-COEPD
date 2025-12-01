<?php
$pageTitle = "About Us - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/includes/functions.php';
$trainers = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/trainers.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">About SoftSkills Academy</h1>
        <p class="text-xl max-w-3xl mx-auto">We are dedicated to developing essential people skills through practical and industry-relevant training.</p>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-4">Our Mission & Vision</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">We believe that soft skills are the foundation of personal and professional success in the modern world.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="bg-white p-8 rounded-lg shadow-md">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                <p class="text-gray-600">To empower individuals and organizations with essential soft skills that drive personal growth, professional advancement, and meaningful connections. We strive to make high-quality soft skills training accessible to everyone, regardless of their background or experience level.</p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-md">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-eye"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Our Vision</h3>
                <p class="text-gray-600">To be the leading provider of soft skills training globally, recognized for our innovative teaching methods, experienced trainers, and measurable impact on our students' lives. We envision a world where everyone has the communication, leadership, and interpersonal skills needed to thrive.</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Approach -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Our Approach</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">We combine proven methodologies with practical application to ensure lasting skill development.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-users text-blue-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Interactive Learning</h3>
                <p class="text-gray-600">Hands-on activities, role-playing, and group discussions to practice new skills in a supportive environment.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-chart-line text-blue-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Measurable Outcomes</h3>
                <p class="text-gray-600">Assessments and feedback systems to track progress and ensure skill development translates to real-world improvement.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-sync-alt text-blue-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Continuous Improvement</h3>
                <p class="text-gray-600">Ongoing support, resources, and alumni networks to reinforce learning and facilitate lifelong skill development.</p>
            </div>
        </div>
    </div>
</section>

<!-- Meet Our Trainers -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Meet Our Expert Trainers</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Our trainers bring decades of real-world experience and proven teaching expertise.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($trainers as $trainer): ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-gray-200 border-2 border-dashed w-full h-48" />
                <div class="p-6">
                    <h3 class="text-xl font-bold"><?php echo $trainer['name']; ?></h3>
                    <p class="text-blue-600 mb-3"><?php echo $trainer['title']; ?></p>
                    <p class="text-gray-600 text-sm mb-4"><?php echo substr($trainer['bio'], 0, 120); ?>...</p>
                    <a href="trainers/<?php echo $trainer['id']; ?>.php" class="text-blue-600 hover:text-blue-800 font-medium">View Profile →</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-16 bg-blue-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Why Choose SoftSkills Academy</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">We stand out through our commitment to quality, practical application, and student success.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex">
                <div class="mr-4">
                    <i class="fas fa-check-circle text-green-500 text-2xl mt-1"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">Industry Expert Trainers</h3>
                    <p class="text-gray-600">Learn from professionals with real-world experience in corporate training and skill development.</p>
                </div>
            </div>
            
            <div class="flex">
                <div class="mr-4">
                    <i class="fas fa-check-circle text-green-500 text-2xl mt-1"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">Practical Application</h3>
                    <p class="text-gray-600">Focus on real-world scenarios and hands-on practice rather than theoretical concepts.</p>
                </div>
            </div>
            
            <div class="flex">
                <div class="mr-4">
                    <i class="fas fa-check-circle text-green-500 text-2xl mt-1"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">Flexible Learning Options</h3>
                    <p class="text-gray-600">Choose from online, in-person, or hybrid formats to fit your schedule and learning preferences.</p>
                </div>
            </div>
            
            <div class="flex">
                <div class="mr-4">
                    <i class="fas fa-check-circle text-green-500 text-2xl mt-1"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">Proven Results</h3>
                    <p class="text-gray-600">Join thousands of satisfied students who have advanced their careers through our programs.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/layout.php';
?>