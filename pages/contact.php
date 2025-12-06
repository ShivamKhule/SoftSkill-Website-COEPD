<?php
$pageTitle = "Contact Us - SoftSkills Academy";

// Include configuration file
require_once __DIR__ . '/../config.php';

include __DIR__ . '/../includes/functions.php';
$courses = loadData(__DIR__ . '/../data/courses.json');
require_once __DIR__ . '/../includes/db.php';

$db = new Database();
$db->connectServerWithDB();
$db->createContactUsTable();

$name = $phone = $email = $course = $mode = $message = '';
$show_success_alert = false;
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = test_input($_POST["name"]);
    $phone = test_input($_POST["phone"]);
    $email = test_input($_POST["email"]);
    $course = test_input($_POST["course"]);
    $mode = test_input($_POST["mode"]);
    $message = test_input($_POST["message"]);

    $result = $db->insertContactMessage($name, $phone, $email, $course, $mode, $message);
    
    if (strpos($result, '✔') !== false) {
        $show_success_alert = true;
        $success_message = 'Thank you! Your message has been sent successfully.';
        // Clear form fields after successful submission
        $name = $phone = $email = $course = $mode = $message = '';
        
        // Use GET parameter to indicate success
        header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
        exit();
    }
}

// Check for success parameter
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $show_success_alert = true;
    $success_message = 'Thank you! Your message has been sent successfully.';
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20 animate-fade-in">
    <div class="container mx-auto px-4 text-center animate-slide-up">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">Contact Us</h1>
        <p class="text-xl max-w-3xl mx-auto animate-fade-in-delay">Have questions about our training programs? Get in touch with our team.</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 contact-container">
            <!-- Contact Form -->
            <div class="animate-fade-in-left">
                <h2 class="text-3xl font-bold mb-6">Send Us a Message</h2>
                
                <form method="post" action="" class="bg-gradient-to-br from-gray-50 to-white p-8 rounded-xl shadow-md animate-fade-in-up" id="contactForm">
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $name; ?>"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transform focus:scale-[1.02] transition duration-300"
                            placeholder="Your name" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transform focus:scale-[1.02] transition duration-300"
                                placeholder="Your phone number">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                            <input type="email" id="email" name="email" value="<?php echo $email; ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transform focus:scale-[1.02] transition duration-300"
                                placeholder="Your email address" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="course" class="block text-gray-700 font-medium mb-2">Course Interest</label>
                        <select id="course" name="course"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transform focus:scale-[1.02] transition duration-300">
                            <option value="">Select a course</option>
                            <?php foreach ($courses as $course_item): ?>
                                <option value="<?php echo $course_item['id']; ?>" <?php echo ($course == $course_item['id']) ? 'selected' : ''; ?>><?php echo $course_item['title']; ?></option>
                            <?php endforeach; ?>
                            <option value="corporate" <?php echo ($course == 'corporate') ? 'selected' : ''; ?>>Corporate Training</option>
                            <option value="other" <?php echo ($course == 'other') ? 'selected' : ''; ?>>Other Inquiry</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="mode" class="block text-gray-700 font-medium mb-2">Preferred Mode</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <label class="flex items-center bg-gray-100 p-3 rounded-lg cursor-pointer hover:bg-blue-50 transform hover:scale-105 transition duration-300">
                                <input type="radio" name="mode" value="online" class="mr-2" <?php echo ($mode == 'online') ? 'checked' : ''; ?>>
                                <span>Online</span>
                            </label>
                            <label class="flex items-center bg-gray-100 p-3 rounded-lg cursor-pointer hover:bg-blue-50 transform hover:scale-105 transition duration-300">
                                <input type="radio" name="mode" value="inperson" class="mr-2" <?php echo ($mode == 'inperson') ? 'checked' : ''; ?>>
                                <span>In-person</span>
                            </label>
                            <label class="flex items-center bg-gray-100 p-3 rounded-lg cursor-pointer hover:bg-blue-50 transform hover:scale-105 transition duration-300">
                                <input type="radio" name="mode" value="hybrid" class="mr-2" <?php echo ($mode == 'hybrid') ? 'checked' : ''; ?>>
                                <span>Hybrid</span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                        <textarea id="message" rows="5" name="message"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transform focus:scale-[1.02] transition duration-300"
                            placeholder="Your message"><?php echo $message; ?></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105 shadow-md">Send
                        Message</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="animate-fade-in-right">
                <h2 class="text-3xl font-bold mb-6">Get In Touch</h2>

                <div class="bg-gradient-to-br from-gray-50 to-white p-8 rounded-xl shadow-md mb-8 contact-info-card animate-fade-in-up delay-1">
                    <div class="space-y-6">
                        <div class="flex items-start animate-fade-in-left delay-1">
                            <div class="text-blue-600 text-2xl mr-4 mt-1">
                                <i class="fas fa-map-marker-alt animate-bounce"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">Our Location</h3>
                                <p class="text-gray-600">123 Education Street, Learning City, LC 10001</p>
                            </div>
                        </div>

                        <div class="flex items-start animate-fade-in-left delay-2">
                            <div class="text-blue-600 text-2xl mr-4 mt-1">
                                <i class="fas fa-phone animate-bounce"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">Phone Number</h3>
                                <p class="text-gray-600">+91 1234567890</p>
                                <p class="text-gray-600 mt-1">WhatsApp: <a href="https://wa.me/9876543210"
                                        class="text-green-600 hover:text-green-800 transform hover:underline">Chat with us</a></p>
                            </div>
                        </div>

                        <div class="flex items-start animate-fade-in-left delay-3">
                            <div class="text-blue-600 text-2xl mr-4 mt-1">
                                <i class="fas fa-envelope animate-bounce"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">Email Address</h3>
                                <p class="text-gray-600">info@softskillmentor.com</p>
                            </div>
                        </div>

                        <div class="flex items-start animate-fade-in-left delay-4">
                            <div class="text-blue-600 text-2xl mr-4 mt-1">
                                <i class="fas fa-clock animate-bounce"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">Working Hours</h3>
                                <p class="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM</p>
                                <p class="text-gray-600">Saturday: 10:00 AM - 4:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-blue-600 to-teal-500 text-white p-8 rounded-xl shadow-md contact-emergency-card animate-fade-in-up delay-2">
                    <h3 class="text-xl font-bold mb-4">Need Immediate Assistance?</h3>
                    <p class="mb-4">For urgent inquiries, call our support line:</p>
                    <p class="text-2xl font-bold">+91 9876543210</p>
                    <p class="mt-4 text-blue-100">Available Monday-Friday, 8:00 AM - 8:00 PM</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl font-bold mb-4">Find Us</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Visit our training center for in-person sessions and consultations.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden h-96 map-container animate-fade-in-up">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.05546980793!2d73.85674387496354!3d18.520430873856254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c06d14a8e0ef%3A0xdea3b1a0b0481218!2sPune%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>


<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-500 text-white animate-fade-in">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-pulse-slow">Ready to Start Your Journey?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto animate-fade-in-delay">Join thousands of professionals who have advanced their careers with
            our proven training programs.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-delay-2">
            <!-- <a href="../pages/courses/" -->
            <a href="#"
                class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105 shadow-lg">Explore
                Courses</a>
            <!-- <a href="../pages/downloads/" -->
            <a href="#"
                class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105">Free
                E-book</a>
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
    
    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
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
    
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5px);
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
    
    .animate-fade-in-right {
        animation: fadeInRight 0.6s ease-out forwards;
        opacity: 0;
    }
    
    .animate-slide-up {
        animation: slideUp 0.8s ease-out forwards;
        opacity: 0;
    }
    
    .animate-bounce {
        animation: bounce 1s ease-in-out infinite;
    }
    
    .animate-pulse-slow {
        animation: pulseSlow 2s ease-in-out infinite;
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
    .animate-fade-in-right,
    .animate-slide-up,
    .animate-fade-in-delay,
    .animate-fade-in-delay-2 {
        opacity: 0;
    }
    
    /* Stagger animations for contact info */
    .contact-info-card > div:nth-child(1) { animation-delay: 0.1s; }
    .contact-info-card > div:nth-child(2) { animation-delay: 0.2s; }
    .contact-info-card > div:nth-child(3) { animation-delay: 0.3s; }
    .contact-info-card > div:nth-child(4) { animation-delay: 0.4s; }
    
    /* Stagger animations for contact container */
    .contact-container > div:nth-child(1) { animation-delay: 0.1s; }
    .contact-container > div:nth-child(2) { animation-delay: 0.2s; }
</style>

<script>
// Show alert if form was successfully submitted
<?php if ($show_success_alert): ?>
    // Initialize Notyf
    window.addEventListener('load', function() {
        const notyf = new Notyf({
            duration: 3000,
            position: {
                x: 'right',
                y: 'top'
            }
        });

        // Show success notification
        notyf.success('<?php echo $success_message; ?>');
        
        // Remove success parameter from URL without refresh
        if (window.history.replaceState) {
            const url = new URL(window.location);
            url.searchParams.delete('success');
            window.history.replaceState({}, document.title, url.toString());
        }
    });
<?php endif; ?>

// Include Notyf JS
document.addEventListener('DOMContentLoaded', function() {
    var script = document.createElement('script');
    script.src = 'https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js';
    script.onload = function() {
        console.log('Notyf library loaded');
    };
    document.head.appendChild(script);
    
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
    
    // Observe elements with fade-in-right animations
    document.querySelectorAll('.animate-fade-in-right').forEach(el => {
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