<?php
// Include configuration file
require_once __DIR__ . '/../config.php';
?>

<footer class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
            <div class="lg:col-span-2">
                <span class=""> <!-- Increased padding if you want -->
                    <a href="<?php echo BASE_PATH; ?>/index.php" id="home-link">
                        <img src="<?php echo BASE_PATH; ?>/assets/SOFT SKILL MENTOR vr.png" alt="SoftSkill Mentor Logo"
                            class="w-50 h-24 bg-white p-2 rounded-lg"
                        style="background-color: white !important;">    
                    </a>
                </span>
                <p class="text-gray-400 mb-6 leading-relaxed">
                    Empowering individuals and organizations with essential soft skills for professional success.
                    Transform your career with our expert-led training programs.
                </p>
                <div class="flex space-x-4 mb-6">
                    <a href="#" class="text-gray-400 hover:text-blue-800 transition duration-300">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300">
                        <i class="fab fa-linkedin-in text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-red-400 transition duration-300">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="https://wa.me/9876543210"
                        class="text-gray-400 hover:text-green-500 transition duration-300">
                        <i class="fab fa-whatsapp text-xl"></i>
                    </a>
                </div>
                <div class="flex items-center text-gray-400">
                    <i class="fas fa-phone mr-2"></i>
                    <span>+91 1234567890</span>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-3">
                    <li><a href="<?php echo BASE_PATH; ?>/index.php"
                            class="text-gray-400 hover:text-blue-400 transition duration-300">Home</a></li>
                    <li><a href="<?php echo BASE_PATH; ?>/pages/about.php"
                            class="text-gray-400 hover:text-blue-400 transition duration-300">About Us</a></li>
                    <li><a href="<?php echo BASE_PATH; ?>/pages/services.php"
                            class="text-gray-400 hover:text-blue-400 transition duration-300">Services</a></li>
                    <li><a href="<?php echo BASE_PATH; ?>/pages/contact.php"
                            class="text-gray-400 hover:text-blue-400 transition duration-300">Contact</a></li>
                    <li><a href="<?php echo BASE_PATH; ?>/pages/faq.php"
                            class="text-gray-400 hover:text-blue-400 transition duration-300">FAQ</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Our Services</h4>
                <ul class="space-y-3">
                    <li><a href="<?php echo BASE_PATH; ?>/pages/schedule.php"
                            class="text-gray-400 hover:text-blue-400 transition duration-300">COMPLETE 3-MONTH
                            PROGRAM</a></li>
                    <li><a href="<?php echo BASE_PATH; ?>/pages/schedule.php"
                            class="text-gray-400 hover:text-blue-400 transition duration-300">Communication &
                            Confidence</a></li>
                    <li><a href="<?php echo BASE_PATH; ?>/pages/schedule.php"
                            class="text-gray-400 hover:text-blue-400 transition duration-300">Career Growth & Workplace
                            Skills</a></li>
                    <li><a href="<?php echo BASE_PATH; ?>/pages/schedule.php"
                            class="text-gray-400 hover:text-blue-400 transition duration-300">Personality, EQ &
                            Leadership</a></li>
                    <li><a href="<?php echo BASE_PATH; ?>/pages/contact.php?service=corporate"
                            class="text-gray-400 hover:text-blue-400 transition duration-300">Corporate Training</a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                <ul class="space-y-3 text-gray-400">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                        <span>123 Education Street, Learning City, LC 10001</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone mr-3"></i>
                        <span>+91 9876543210</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-3"></i>
                        <span>info@softskillmentor.com</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-clock mr-3"></i>
                        <span>Mon-Fri: 9AM-6PM</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-500">
            <p>&copy; 2025 SoftSkills Academy. All rights reserved.</p>
        </div>
    </div>
</footer>