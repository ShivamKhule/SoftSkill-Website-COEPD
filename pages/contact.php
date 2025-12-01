<?php
$pageTitle = "Contact Us - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/includes/functions.php';
$courses = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/courses.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Contact Us</h1>
        <p class="text-xl max-w-3xl mx-auto">Have questions about our training programs? Get in touch with our team.</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div>
                <h2 class="text-3xl font-bold mb-6">Send Us a Message</h2>
                <form class="bg-white p-8 rounded-lg shadow-md">
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                        <input type="text" id="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your name">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                            <input type="tel" id="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your phone number">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                            <input type="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your email address">
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label for="course" class="block text-gray-700 font-medium mb-2">Course Interest</label>
                        <select id="course" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select a course</option>
                            <?php foreach ($courses as $course): ?>
                            <option value="<?php echo $course['id']; ?>"><?php echo $course['title']; ?></option>
                            <?php endforeach; ?>
                            <option value="corporate">Corporate Training</option>
                            <option value="other">Other Inquiry</option>
                        </select>
                    </div>
                    
                    <div class="mb-6">
                        <label for="mode" class="block text-gray-700 font-medium mb-2">Preferred Mode</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <label class="flex items-center">
                                <input type="radio" name="mode" value="online" class="mr-2">
                                <span>Online</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="mode" value="inperson" class="mr-2">
                                <span>In-person</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="mode" value="hybrid" class="mr-2">
                                <span>Hybrid</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                        <textarea id="message" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your message"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Send Message</button>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div>
                <h2 class="text-3xl font-bold mb-6">Get In Touch</h2>
                
                <div class="bg-white p-8 rounded-lg shadow-md mb-8">
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="text-blue-600 text-2xl mr-4 mt-1">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">Our Location</h3>
                                <p class="text-gray-600">123 Education Street, Learning City, LC 10001</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="text-blue-600 text-2xl mr-4 mt-1">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">Phone Number</h3>
                                <p class="text-gray-600">+1 (555) 123-4567</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="text-blue-600 text-2xl mr-4 mt-1">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">Email Address</h3>
                                <p class="text-gray-600">info@softskillsacademy.com</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="text-blue-600 text-2xl mr-4 mt-1">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">Working Hours</h3>
                                <p class="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM</p>
                                <p class="text-gray-600">Saturday: 10:00 AM - 4:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-800 text-white p-8 rounded-lg">
                    <h3 class="text-xl font-bold mb-4">Need Immediate Assistance?</h3>
                    <p class="mb-4">For urgent inquiries, call our support line:</p>
                    <p class="text-2xl font-bold">+1 (555) 987-6543</p>
                    <p class="mt-4 text-gray-300">Available Monday-Friday, 8:00 AM - 8:00 PM</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Find Us</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Visit our training center for in-person sessions and consultations.</p>
        </div>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gray-200 border-2 border-dashed w-full h-96 flex items-center justify-center">
                <span class="text-gray-500">Interactive Map Placeholder</span>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/layout.php';
?>