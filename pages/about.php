<?php
$pageTitle = "About Us - SoftSkills Academy";

include __DIR__ . '/../includes/functions.php';
$trainers = loadData(__DIR__ . '/../data/trainers.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="relative text-white py-20">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
            alt="About Us" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-teal-500 opacity-90"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">About SoftSkills Academy</h1>
        <p class="text-xl max-w-3xl mx-auto">We are dedicated to developing essential people skills through practical
            and industry-relevant training.</p>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-4">Our Mission & Vision</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">We believe that soft skills are the foundation of personal and
                professional success in the modern world.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-xl shadow-md">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                <p class="text-gray-600">To empower individuals and organizations with essential soft skills that drive
                    personal growth, professional advancement, and meaningful connections. We strive to make
                    high-quality soft skills training accessible to everyone, regardless of their background or
                    experience level.</p>
            </div>

            <div class="bg-gradient-to-br from-teal-50 to-white p-8 rounded-xl shadow-md">
                <div class="text-teal-600 text-4xl mb-4">
                    <i class="fas fa-eye"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Our Vision</h3>
                <p class="text-gray-600">To be the leading provider of soft skills training globally, recognized for our
                    innovative teaching methods, experienced trainers, and measurable impact on our students' lives. We
                    envision a world where everyone has the communication, leadership, and interpersonal skills needed
                    to thrive.</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Approach -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Our Approach</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">We combine proven methodologies with practical application to
                ensure lasting skill development.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-blue-50 hover:bg-blue-200 p-8 rounded-xl shadow-md text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-users text-blue-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Interactive Learning</h3>
                <p class="text-gray-600">Hands-on activities, role-playing, and group discussions to practice new skills
                    in a supportive environment.</p>
            </div>

            <div class="bg-teal-50 hover:bg-teal-200 p-8 rounded-xl shadow-md text-center">
                <div class="bg-teal-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-chart-line text-teal-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Measurable Outcomes</h3>
                <p class="text-gray-600">Assessments and feedback systems to track progress and ensure skill development
                    translates to real-world improvement.</p>
            </div>

            <div class="bg-indigo-50 hover:bg-indigo-200 p-8 rounded-xl shadow-md text-center">
                <div class="bg-indigo-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-sync-alt text-indigo-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Continuous Improvement</h3>
                <p class="text-gray-600">Ongoing support, resources, and alumni networks to reinforce learning and
                    facilitate lifelong skill development.</p>
            </div>
        </div>
    </div>
</section>

<!-- Meet Our Trainers -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">

        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Meet Our Expert Trainers</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Our trainers bring decades of real-world experience and proven teaching expertise.
            </p>
        </div>

        <!-- Fixed Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php foreach ($trainers as $trainer): ?>
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">

                    <!-- Fixed (changed self-closing div to proper div) -->
                    <div class="w-full h-48 bg-gray-200 border-2 border-dashed overflow-hidden rounded-xl">
                        <img src="<?php echo $trainer['image']; ?>" alt="<?php echo $trainer['name']; ?>"
                            class="w-full h-full object-cover" />
                    </div>


                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900">
                            <?php echo $trainer['name']; ?>
                        </h3>

                        <p class="text-blue-600 mb-3 font-medium">
                            <?php echo $trainer['title']; ?>
                        </p>

                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                            <?php echo substr($trainer['bio'], 0, 120); ?>...
                        </p>

                        <!-- <a href="trainers/<?php echo $trainer['id']; ?>.php" -->
                        <a href="#"
                            class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center">
                            View Profile
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>

                </div>
            <?php endforeach; ?>

        </div>

    </div>
</section>


<!-- Why Choose Us -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Why Choose SoftSkills Academy</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">We stand out through our commitment to quality, practical
                application, and student success.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            <div class="flex">
                <div class="mr-4">
                    <i class="fas fa-check-circle text-green-500 text-2xl mt-1"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">Industry Expert Trainers</h3>
                    <p class="text-gray-600">Learn from professionals with real-world experience in corporate training
                        and skill development.</p>
                </div>
            </div>

            <div class="flex">
                <div class="mr-4">
                    <i class="fas fa-check-circle text-green-500 text-2xl mt-1"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">Practical Application</h3>
                    <p class="text-gray-600">Focus on real-world scenarios and hands-on practice rather than theoretical
                        concepts.</p>
                </div>
            </div>

            <div class="flex">
                <div class="mr-4">
                    <i class="fas fa-check-circle text-green-500 text-2xl mt-1"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">Flexible Learning Options</h3>
                    <p class="text-gray-600">Choose from online, in-person, or hybrid formats to fit your schedule and
                        learning preferences.</p>
                </div>
            </div>

            <div class="flex">
                <div class="mr-4">
                    <i class="fas fa-check-circle text-green-500 text-2xl mt-1"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">Proven Results</h3>
                    <p class="text-gray-600">Join thousands of satisfied students who have advanced their careers
                        through our programs.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-500 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Transform Your Skills?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Join our community of professionals advancing their careers with our
            proven training programs.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <!-- <a href="../pages/courses/" -->
            <a href="#"
                class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Explore
                Courses</a>
            <a href="../pages/contact.php"
                class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Contact
                Us</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/layout.php';
?>