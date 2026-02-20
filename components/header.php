<?php
// Include configuration file
require_once __DIR__ . '/../config.php';

// Start session for flash messages
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="bg-white shadow-md sticky top-0 z-[1001]">
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <a href="<?php echo BASE_PATH; ?>/index.php" id="home-link">
                <!-- <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-blue-600">SoftSkills</h1>
                </div> -->
                <img src="<?php echo BASE_PATH; ?>/assets/SOFT SKILL MENTOR hz.png" alt="SoftSkill Mentor Logo"
                    class="w-50 h-12">
            </a>

            <nav class="hidden lg:block">
                <ul class="flex flex-wrap space-x-1">

                    <li>
                        <a href="<?php echo BASE_PATH; ?>/index.php" class="text-gray-700 font-medium relative px-3 py-1 rounded-md
          transition-all duration-300
          hover:text-blue-600 hover:bg-blue-50
          
          after:absolute after:left-0 after:bottom-0 after:h-0.5 after:w-0
          after:bg-blue-600 after:rounded-full
          after:transition-all after:duration-300
          hover:after:w-full" id="desktop-home-link">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_PATH; ?>/pages/about.php" id="desktop-about-link" class="text-gray-700 font-medium relative px-3 py-1 rounded-md
          transition-all duration-300
          hover:text-blue-600 hover:bg-blue-50
          
          after:absolute after:left-0 after:bottom-0 after:h-0.5 after:w-0
          after:bg-blue-600 after:rounded-full
          after:transition-all after:duration-300
          hover:after:w-full">
                            About Us
                        </a>
                    </li>

                    <li class="group relative">
                        <a href="<?php echo BASE_PATH; ?>/pages/services.php" id="desktop-services-link" class="text-gray-700 font-medium relative px-3 py-1 rounded-md
          transition-all duration-300
          hover:text-blue-600 hover:bg-blue-50
          
          after:absolute after:left-0 after:bottom-0 after:h-0.5 after:w-0
          after:bg-blue-600 after:rounded-full
          after:transition-all after:duration-300
          hover:after:w-full">
                            Services
                            <!-- <i
                                class="fas fa-chevron-down ml-1 text-xs transform transition-transform duration-300 group-hover:rotate-180"></i> -->
                        </a>

                        <!-- Dropdown menu -->
                        <!-- <div class="absolute left-0 mt-3 w-48 bg-white shadow-xl rounded-lg 
                        opacity-0 invisible translate-y-2 
                        group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 
                        transition-all duration-300 ease-in-out z-50"> -->

                        <!-- <a href="/learn/pages/corporate.php" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600  -->
                        <!-- <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 
                          transition duration-200 transform hover:translate-x-1">
                                Corporate Training
                            </a> -->

                        <!-- <a href="/learn/pages/courses/" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600  -->
                        <!-- <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 
                          transition duration-200 transform hover:translate-x-1">
                                Individual Courses
                            </a> -->
                        <!-- </div> -->
                    </li>

                    <li>
                        <a href="<?php echo BASE_PATH; ?>/pages/programs.php" id="desktop-schedule-link" class=" text-gray-700 font-medium relative px-3 py-1 rounded-md transition-all duration-300
                            hover:text-blue-600 hover:bg-blue-50 after:absolute after:left-0 after:bottom-0 after:h-0.5
                            after:w-0 after:bg-blue-600 after:rounded-full after:transition-all after:duration-300
                            hover:after:w-full">
                            Programs
                        </a>
                    </li>

                    <li class="group relative">
                        <a href="<?php echo BASE_PATH; ?>/pages/faq.php" id="desktop-faq-link" class="text-gray-700 font-medium relative px-3 py-1 rounded-md
          transition-all duration-300
          hover:text-blue-600 hover:bg-blue-50
          
          after:absolute after:left-0 after:bottom-0 after:h-0.5 after:w-0
          after:bg-blue-600 after:rounded-full
          after:transition-all after:duration-300
          hover:after:w-full">
                            FAQ
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_PATH; ?>/pages/contact.php" class="text-gray-700 font-medium relative px-3 py-1 rounded-md
          transition-all duration-300
          hover:text-blue-600 hover:bg-blue-50
          
          after:absolute after:left-0 after:bottom-0 after:h-0.5 after:w-0
          after:bg-blue-600 after:rounded-full
          after:transition-all after:duration-300
          hover:after:w-full" id="desktop-contact-link">
                            Contact
                        </a>
                    </li>

                </ul>
            </nav>

            <!-- Mobile menu button -->
            <div class="flex items-center space-x-2">
                <!-- <a href="/learn/pages/downloads/" class="hidden lg:flex items-center text-gray-700 font-medium relative px-3 py-1 rounded-md -->
                <!-- <a href="#" class="hidden lg:flex items-center text-gray-700 font-medium relative px-3 py-1 rounded-md
          transition-all duration-300

          hover:text-blue-600 hover:bg-blue-50

          after:absolute after:left-0 after:bottom-0 after:h-0.5 after:w-0
          after:bg-blue-600 after:rounded-full
          after:transition-all after:duration-300
          hover:after:w-full">
                    <i class="fas fa-download mr-1"></i>
                    Free Resources
                </a> -->

                <a href="<?php echo BASE_PATH; ?>/pages/programs.php"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition duration-300 shadow-md hover:shadow-lg hidden lg:block">
                    Enroll Now
                </a>
                <button id="mobile-menu-button"
                    class="lg:hidden text-gray-700 z-[1002] relative w-10 h-10 flex items-center justify-center rounded-lg hover:bg-gray-100 transition-colors duration-300">
                    <div class="w-6 h-6 flex flex-col justify-center items-center">
                        <span
                            class="block w-5 h-0.5 bg-gray-700 rounded-full transition-all duration-300 transform origin-center"></span>
                        <span
                            class="block w-5 h-0.5 bg-gray-700 rounded-full transition-all duration-300 transform origin-center mt-1"></span>
                    </div>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu"
            class="lg:hidden fixed top-16 left-0 right-0 bg-white shadow-lg z-50 opacity-0 invisible transition-all duration-300 ease-in-out transform translate-y-[-10px]">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white shadow-lg rounded-lg mx-4 mt-2">
                <a href="<?php echo BASE_PATH; ?>/index.php" id="mobile-home-link"
                    class="text-gray-700 hover:bg-blue-50 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium transition-all duration-200 transform hover:translate-x-1">Home</a>
                <a href="<?php echo BASE_PATH; ?>/pages/about.php" id="mobile-about-link"
                    class="text-gray-700 hover:bg-blue-50 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium transition-all duration-200 transform hover:translate-x-1">About
                    Us</a>

                <div class="flex justify-between items-center">
                    <a href="<?php echo BASE_PATH; ?>/pages/services.php" id="mobile-services-link"
                        class="text-gray-700 hover:bg-blue-50 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium flex-grow transition-all duration-200 transform hover:translate-x-1">Services</a>
                    <button id="services-toggle" class="text-gray-700 px-3 py-2 transition-transform duration-300">
                        <!-- <i class="fas fa-chevron-down text-sm transform transition-transform duration-300"></i> -->
                    </button>
                </div>
                <!-- <div id="services-submenu"
                    class="pl-4 space-y-1 hidden opacity-0 transition-all duration-300 ease-in-out transform translate-y-[-5px]">
                    <a href="#"
                        class="text-gray-700 hover:bg-blue-50 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium transition-all duration-200 transform hover:translate-x-1">Corporate
                        Training</a>
                    <a href="#"
                        class="text-gray-700 hover:bg-blue-50 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium transition-all duration-200 transform hover:translate-x-1">Individual
                        Courses</a>
                </div> -->

                <a href="<?php echo BASE_PATH; ?>/pages/programs.php" id="mobile-schedule-link"
                    class="text-gray-700 hover:bg-blue-50 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium transition-all duration-200 transform hover:translate-x-1">Programs</a>

                <div class="flex justify-between items-center">
                    <a href="<?php echo BASE_PATH; ?>/pages/faq.php" id="mobile-faq-link"
                        class="text-gray-700 hover:bg-blue-50 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium flex-grow transition-all duration-200 transform hover:translate-x-1">FAQ</a>
                    <button id="faq-toggle" class="text-gray-700 px-3 py-2 transition-transform duration-300">
                        <!-- <i class="fas fa-chevron-down text-sm transform transition-transform duration-300"></i> -->
                    </button>
                </div>
                <a href="<?php echo BASE_PATH; ?>/pages/contact.php" id="mobile-contact-link"
                    class="text-gray-700 hover:bg-blue-50 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium transition-all duration-200 transform hover:translate-x-1">Contact</a>
                <a href="<?php echo BASE_PATH; ?>/pages/programs.php"
                    class="bg-blue-600 hover:bg-blue-700 text-white block px-3 py-2 rounded-md text-base font-medium text-center mt-2 transition-all duration-300 transform hover:scale-[1.02]">Enroll
                    Now</a>
            </div>
        </div>
    </div>
    <script>
        // Mobile menu toggle - inline script to avoid conflicts
        document.addEventListener('DOMContentLoaded', function () {
            // Get mobile menu elements
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenuElement = document.getElementById('mobile-menu');
            const servicesToggle = document.getElementById('services-toggle');
            const servicesSubmenu = document.getElementById('services-submenu');
            const faqToggle = document.getElementById('faq-toggle');

            // Get hamburger icon elements
            const hamburgerLines = mobileMenuButton ? mobileMenuButton.querySelectorAll('span') : [];

            // Close mobile menu on page load to ensure it's closed when navigating back
            if (mobileMenuElement) {
                mobileMenuElement.classList.add('hidden');
            }

            // Handle navigation link clicks to close menu before navigating

            if (mobileMenuButton && mobileMenuElement) {
                // Handle both click and touch events for better mobile support
                const toggleMobileMenu = function (e) {
                    e.preventDefault(); // Prevent default touch behavior
                    e.stopPropagation();

                    // Toggle menu visibility with animation
                    if (mobileMenuElement.classList.contains('hidden')) {
                        // Show menu with animation
                        mobileMenuElement.classList.remove('hidden', 'opacity-0', 'invisible', 'translate-y-[-10px]');
                        mobileMenuElement.classList.add('opacity-100', 'visible', 'translate-y-0');

                        // Animate hamburger to cross
                        if (hamburgerLines.length > 0) {
                            hamburgerLines[0].classList.add('rotate-45', 'translate-y-1.5');
                            hamburgerLines[1].classList.add('hidden');
                            setTimeout(() => {
                                hamburgerLines[1].classList.remove('hidden');
                                hamburgerLines[1].classList.add('-rotate-45', '-translate-y-1');
                            }, 150);
                        }
                    } else {
                        // Hide menu with animation
                        mobileMenuElement.classList.remove('opacity-100', 'visible', 'translate-y-0');
                        mobileMenuElement.classList.add('opacity-0', 'invisible', 'translate-y-[-10px]');

                        // Animate cross back to hamburger
                        if (hamburgerLines.length > 0) {
                            hamburgerLines[0].classList.remove('rotate-45', 'translate-y-1.5');
                            hamburgerLines[1].classList.remove('-rotate-45', '-translate-y-1');
                            setTimeout(() => {
                                hamburgerLines[1].classList.add('hidden');
                            }, 150);
                            setTimeout(() => {
                                hamburgerLines[1].classList.remove('hidden');
                            }, 300);
                        }

                        // Hide menu after animation completes
                        setTimeout(() => {
                            mobileMenuElement.classList.add('hidden');
                        }, 300);
                    }
                };

                mobileMenuButton.addEventListener('click', toggleMobileMenu);
                mobileMenuButton.addEventListener('touchstart', function (e) {
                    e.preventDefault(); // Prevent default touch behavior
                    toggleMobileMenu(e);
                });

                // Close mobile menu when clicking/touching outside
                const closeMobileMenu = function (event) {
                    // Check if the click/touch is outside the mobile menu and menu button
                    if (mobileMenuElement && !mobileMenuElement.classList.contains('hidden')) {
                        if (!mobileMenuElement.contains(event.target) && mobileMenuButton !== event.target && !mobileMenuButton.contains(event.target)) {
                            // Hide menu with animation
                            mobileMenuElement.classList.remove('opacity-100', 'visible', 'translate-y-0');
                            mobileMenuElement.classList.add('opacity-0', 'invisible', 'translate-y-[-10px]');

                            // Animate cross back to hamburger
                            if (hamburgerLines.length > 0) {
                                hamburgerLines[0].classList.remove('rotate-45', 'translate-y-1.5');
                                hamburgerLines[1].classList.remove('-rotate-45', '-translate-y-1');
                                setTimeout(() => {
                                    hamburgerLines[1].classList.add('hidden');
                                }, 150);
                                setTimeout(() => {
                                    hamburgerLines[1].classList.remove('hidden');
                                }, 300);
                            }

                            // Hide menu after animation completes
                            setTimeout(() => {
                                mobileMenuElement.classList.add('hidden');
                            }, 300);
                        }
                    }
                };

                document.addEventListener('click', closeMobileMenu);
                document.addEventListener('touchstart', function (e) {
                    // For touch events, we need to be more careful about preventing defaults
                    closeMobileMenu(e);
                }, { passive: true }); // Use passive listener for better performance

                // Close menu when browser back/forward buttons are used
                window.addEventListener('popstate', function () {
                    if (mobileMenuElement) {
                        // Hide menu with animation
                        mobileMenuElement.classList.remove('opacity-100', 'visible', 'translate-y-0');
                        mobileMenuElement.classList.add('opacity-0', 'invisible', 'translate-y-[-10px]');

                        // Reset hamburger icon
                        if (hamburgerLines.length > 0) {
                            hamburgerLines[0].classList.remove('rotate-45', 'translate-y-1.5');
                            hamburgerLines[1].classList.remove('hidden', '-rotate-45', '-translate-y-1');
                        }

                        // Hide menu after animation completes
                        setTimeout(() => {
                            mobileMenuElement.classList.add('hidden');
                        }, 300);
                    }
                });
            }
        });

        // Additional handler to close menu when page visibility changes (helps with mobile back navigation)
        document.addEventListener('visibilitychange', function () {
            if (document.visibilityState === 'visible') {
                const mobileMenuElement = document.getElementById('mobile-menu');
                const mobileMenuButton = document.getElementById('mobile-menu-button');
                const hamburgerLines = mobileMenuButton ? mobileMenuButton.querySelectorAll('span') : [];

                if (mobileMenuElement) {
                    // Hide menu with animation
                    mobileMenuElement.classList.remove('opacity-100', 'visible', 'translate-y-0');
                    mobileMenuElement.classList.add('opacity-0', 'invisible', 'translate-y-[-10px]');

                    // Reset hamburger icon
                    if (hamburgerLines.length > 0) {
                        hamburgerLines[0].classList.remove('rotate-45', 'translate-y-1.5');
                        hamburgerLines[1].classList.remove('hidden', '-rotate-45', '-translate-y-1');
                    }

                    // Hide menu after animation completes
                    setTimeout(() => {
                        mobileMenuElement.classList.add('hidden');
                    }, 300);
                }
            }
        });
    </script>
</header>