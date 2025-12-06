<?php
$pageTitle = "About Us - SoftSkills Academy";

include __DIR__ . '/../includes/functions.php';
$trainers = loadData(__DIR__ . '/../data/trainers.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="relative text-white py-20 animate-fade-in">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
            alt="About Us" class="w-full h-full object-cover animate-zoom-in">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-teal-500 opacity-90"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center animate-slide-up">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">About SoftSkills Academy</h1>
        <p class="text-xl max-w-3xl mx-auto animate-fade-in-delay">We are dedicated to developing essential people skills through practical
            and industry-relevant training.</p>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Our Mission & Vision</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">We believe that soft skills are the foundation of personal and
                professional success in the modern world.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mission-vision-container">
            <div class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-xl shadow-md transform hover:scale-105 transition-all duration-300 hover:shadow-xl animate-fade-in-up delay-1">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-bullseye animate-bounce"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                <p class="text-gray-600">To empower individuals and organizations with essential soft skills that drive
                    personal growth, professional advancement, and meaningful connections. We strive to make
                    high-quality soft skills training accessible to everyone, regardless of their background or
                    experience level.</p>
            </div>

            <div class="bg-gradient-to-br from-teal-50 to-white p-8 rounded-xl shadow-md transform hover:scale-105 transition-all duration-300 hover:shadow-xl animate-fade-in-up delay-2">
                <div class="text-teal-600 text-4xl mb-4">
                    <i class="fas fa-eye animate-bounce"></i>
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
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Our Approach</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">We combine proven methodologies with practical application to
                ensure lasting skill development.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 approach-container">
            <div class="bg-blue-50 hover:bg-blue-200 p-8 rounded-xl shadow-md text-center transform hover:-translate-y-2 transition-all duration-300 approach-card animate-fade-in-up delay-1">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-users text-blue-600 text-3xl animate-pulse"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Interactive Learning</h3>
                <p class="text-gray-600">Hands-on activities, role-playing, and group discussions to practice new skills
                    in a supportive environment.</p>
            </div>

            <div class="bg-teal-50 hover:bg-teal-200 p-8 rounded-xl shadow-md text-center transform hover:-translate-y-2 transition-all duration-300 approach-card animate-fade-in-up delay-2">
                <div class="bg-teal-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-chart-line text-teal-600 text-3xl animate-pulse"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Measurable Outcomes</h3>
                <p class="text-gray-600">Assessments and feedback systems to track progress and ensure skill development
                    translates to real-world improvement.</p>
            </div>

            <div class="bg-indigo-50 hover:bg-indigo-200 p-8 rounded-xl shadow-md text-center transform hover:-translate-y-2 transition-all duration-300 approach-card animate-fade-in-up delay-3">
                <div class="bg-indigo-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-sync-alt text-indigo-600 text-3xl animate-pulse"></i>
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

        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Meet Our Expert Trainers</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Our trainers bring decades of real-world experience and proven teaching expertise.
            </p>
        </div>

        <!-- Fixed Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 trainer-container">
            <?php foreach ($trainers as $index => $trainer): ?>
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 trainer-card animate-fade-in-up delay-<?php echo (($index % 3) + 1); ?>">

                    <!-- Fixed (changed self-closing div to proper div) -->
                    <div class="w-full h-48 bg-gray-200 border-2 border-dashed overflow-hidden rounded-xl">
                        <img src="<?php echo $trainer['image']; ?>" alt="<?php echo $trainer['name']; ?>"
                            class="w-full h-full object-cover transform hover:scale-110 transition duration-500" />
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
                            class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center transform hover:translate-x-1 transition-transform">
                            View Profile
                            <i class="fas fa-arrow-right ml-2 text-sm transform group-hover:translate-x-1 transition-transform"></i>
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
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Why Choose SoftSkills Academy</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">We stand out through our commitment to quality, practical
                application, and student success.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 choose-us-container">
            <div class="flex animate-fade-in-left delay-1">
                <div class="mr-4">
                    <i class="fas fa-check-circle text-green-500 text-2xl mt-1 animate-rotate-in"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">Industry Expert Trainers</h3>
                    <p class="text-gray-600">Learn from professionals with real-world experience in corporate training
                        and skill development.</p>
                </div>
            </div>

            <div class="flex animate-fade-in-left delay-2">
                <div class="mr-4">
                    <i class="fas fa-check-circle text-green-500 text-2xl mt-1 animate-rotate-in"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">Practical Application</h3>
                    <p class="text-gray-600">Focus on real-world scenarios and hands-on practice rather than theoretical
                        concepts.</p>
                </div>
            </div>

            <div class="flex animate-fade-in-left delay-3">
                <div class="mr-4">
                    <i class="fas fa-check-circle text-green-500 text-2xl mt-1 animate-rotate-in"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">Flexible Learning Options</h3>
                    <p class="text-gray-600">Choose from online, in-person, or hybrid formats to fit your schedule and
                        learning preferences.</p>
                </div>
            </div>

            <div class="flex animate-fade-in-left delay-4">
                <div class="mr-4">
                    <i class="fas fa-check-circle text-green-500 text-2xl mt-1 animate-rotate-in"></i>
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
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-500 text-white animate-fade-in">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-pulse-slow">Ready to Transform Your Skills?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto animate-fade-in-delay">Join our community of professionals advancing their careers with our
            proven training programs.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-delay-2">
            <!-- <a href="../pages/courses/" -->
            <a href="#"
                class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105 shadow-lg">Explore
                Courses</a>
            <a href="../pages/contact.php"
                class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105">Contact
                Us</a>
        </div>
    </div>
</section>

<style>
    /* Animation classes */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
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
    
    @keyframes zoomIn {
        from {
            transform: scale(1.1);
        }
        to {
            transform: scale(1);
        }
    }
    
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }
    
    @keyframes pulseSlow {
        0%, 100% {
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
    
    .animate-zoom-in {
        animation: zoomIn 1.2s ease-out forwards;
    }
    
    .animate-bounce {
        animation: bounce 1s ease-in-out infinite;
    }
    
    .animate-pulse {
        animation: pulse 1s ease-in-out infinite;
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
    
    /* Ensure elements with delayed animations are initially hidden */
    .animate-fade-in-up,
    .animate-fade-in-down,
    .animate-fade-in-left,
    .animate-slide-up,
    .animate-fade-in-delay,
    .animate-fade-in-delay-2 {
        opacity: 0;
    }
    
    /* Stagger animations for cards */
    .mission-vision-container > div:nth-child(1) { animation-delay: 0.1s; }
    .mission-vision-container > div:nth-child(2) { animation-delay: 0.2s; }
    
    .approach-container .approach-card:nth-child(1) { animation-delay: 0.1s; }
    .approach-container .approach-card:nth-child(2) { animation-delay: 0.2s; }
    .approach-container .approach-card:nth-child(3) { animation-delay: 0.3s; }
    
    .trainer-container .trainer-card:nth-child(3n+1) { animation-delay: 0.1s; }
    .trainer-container .trainer-card:nth-child(3n+2) { animation-delay: 0.2s; }
    .trainer-container .trainer-card:nth-child(3n+3) { animation-delay: 0.3s; }
    
    .choose-us-container > div:nth-child(1) { animation-delay: 0.1s; }
    .choose-us-container > div:nth-child(2) { animation-delay: 0.2s; }
    .choose-us-container > div:nth-child(3) { animation-delay: 0.3s; }
    .choose-us-container > div:nth-child(4) { animation-delay: 0.4s; }
</style>

<script>
    // Intersection Observer for animations
    document.addEventListener('DOMContentLoaded', function () {
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
        document.querySelectorAll('.animate-slide-up').forEach(el => {
            observer.observe(el);
        });
    });
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/layout.php';
?>