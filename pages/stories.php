<?php
$pageTitle = "Success Stories - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/includes/functions.php';
$stories = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/success-stories.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="relative text-white py-20">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
            alt="Success Stories" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-teal-500 opacity-90"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Success Stories</h1>
        <p class="text-xl max-w-3xl mx-auto">Real transformations from our students and corporate clients.</p>
    </div>
</section>

<!-- Stories Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Transformations That Inspire</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Highlights of learner achievements and growth in communication,
                confidence, professional behavior, and job performance.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach ($stories as $story): ?>
                <div
                    class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-all duration-300">
                    <div class="p-6 md:p-8">
                        <div class="flex items-center mb-6">
                            <div
                                class="w-16 h-16 flex-shrink-0 overflow-hidden rounded-xl bg-gray-200 border-2 border-dashed">
                                <img src="<?php echo $story['image']; ?>" alt="<?php echo $story['name']; ?>"
                                    class="w-full h-full object-cover" />
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-bold text-gray-900"><?php echo $story['name']; ?></h3>
                                <p class="text-gray-600">
                                    <?php echo $story['role']; ?>
                                    <?php echo !empty($story['company']) ? ', ' . $story['company'] : ''; ?>
                                </p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h4 class="font-bold text-gray-800 mb-2">Before Training:</h4>
                            <p class="text-gray-700 leading-relaxed"><?php echo $story['before']; ?></p>
                        </div>

                        <div class="mb-6">
                            <h4 class="font-bold text-gray-800 mb-2">After Training:</h4>
                            <p class="text-gray-700 leading-relaxed"><?php echo $story['after']; ?></p>
                        </div>

                        <div class="mb-6">
                            <h4 class="font-bold text-gray-800 mb-2">Key Improvement:</h4>
                            <p class="text-gray-700 leading-relaxed"><?php echo $story['improvement']; ?></p>
                        </div>

                        <div class="border-l-4 border-blue-500 pl-4 py-2">
                            <p class="italic text-gray-700">"<?php echo $story['quote']; ?>"</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Testimonial Carousel -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">What Our Alumni Say</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Hear from our graduates about their learning experience and
                career growth.</p>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 md:p-8 max-w-4xl mx-auto">
            <div class="text-center">
                <div class="bg-gray-200 border-2 border-dashed rounded-xl w-24 h-24 mx-auto mb-6 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6" alt="Michael Rodriguez"
                        class="w-full h-full object-cover" />
                </div>

                <p class="text-xl italic text-gray-700 mb-6 leading-relaxed">"The leadership training I received
                    completely transformed my approach to managing my team. Within six months, our department
                    productivity increased by 35%, and employee satisfaction scores reached an all-time high."</p>
                <div>
                    <h4 class="font-bold text-lg text-gray-900">Michael Rodriguez</h4>
                    <p class="text-gray-600">Senior Manager, TechGlobal Inc.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-500 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Begin Your Transformation Journey</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Join thousands of professionals who have advanced their careers with
            our proven training programs.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="courses/"
                class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Explore
                Courses</a>
            <a href="contact.php"
                class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Contact
                Us</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/layout.php';
?>