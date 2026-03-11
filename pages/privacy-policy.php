<?php
$pageTitle = "Privacy Policy - SoftSkill Mentor Academy";

// Include configuration files
require_once __DIR__ . '/../config.php';

// Start session for flash messages
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20 animate-fade-in">
    <div class="container mx-auto px-4 text-center animate-slide-up">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">Privacy Policy</h1>
        <p class="text-xl max-w-3xl mx-auto animate-fade-in-delay">Your privacy and data protection are our top priorities at SoftSkill Mentor Academy</p>
    </div>
</section>

<!-- Privacy Policy Content Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-lg p-8 animate-fade-in-up">

            <div class="mb-8 text-center animate-fade-in">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Protecting Your Personal Information</h2>
                <p class="text-gray-600">Last Updated: <?php echo date('F j, Y'); ?></p>
            </div>

            <div class="space-y-8 privacy-content">

                <article class="privacy-section animate-fade-in-up">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">1. Introduction</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        At SoftSkill Mentor Academy, we are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website located at <?php echo BASE_URL; ?> and any related services (collectively, the "Site").
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        We respect your privacy and are committed to protecting the personal information you share with us. Please read this privacy policy carefully to understand our practices regarding your personal data and how we will treat it.
                    </p>
                </article>

                <article class="privacy-section animate-fade-in-up delay-1">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">2. Information We Collect</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">We may collect and process the following categories of personal information:</p>
                    
                    <div class="space-y-4 ml-6">
                        <div class="information-type animate-fade-in-left delay-1">
                            <h4 class="font-bold text-gray-800 mb-2">Personal Identification Information:</h4>
                            <ul class="list-disc pl-5 space-y-1 text-gray-700">
                                <li>Name</li>
                                <li>Email address</li>
                                <li>Phone number</li>
                                <li>Address (if provided)</li>
                            </ul>
                        </div>
                        
                        <div class="information-type animate-fade-in-left delay-2">
                            <h4 class="font-bold text-gray-800 mb-2">Educational and Professional Information:</h4>
                            <ul class="list-disc pl-5 space-y-1 text-gray-700">
                                <li>Course interests</li>
                                <li>Professional background</li>
                                <li>Learning preferences</li>
                                <li>Employment status</li>
                            </ul>
                        </div>
                        
                        <div class="information-type animate-fade-in-left delay-3">
                            <h4 class="font-bold text-gray-800 mb-2">Technical Information:</h4>
                            <ul class="list-disc pl-5 space-y-1 text-gray-700">
                                <li>IP address</li>
                                <li>Browser type and version</li>
                                <li>Operating system</li>
                                <li>Referral source</li>
                                <li>Pages visited and time spent on our Site</li>
                            </ul>
                        </div>
                        
                        <div class="information-type animate-fade-in-left delay-4">
                            <h4 class="font-bold text-gray-800 mb-2">Communication Information:</h4>
                            <ul class="list-disc pl-5 space-y-1 text-gray-700">
                                <li>Messages sent through our contact forms</li>
                                <li>Email correspondence</li>
                                <li>Feedback and reviews</li>
                            </ul>
                        </div>
                    </div>
                </article>

                <article class="privacy-section animate-fade-in-up delay-2">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">3. How We Collect Information</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">We collect information through various methods:</p>
                    
                    <div class="space-y-4 ml-6">
                        <div class="collection-method animate-fade-in-left delay-1">
                            <h4 class="font-bold text-gray-800 mb-2">Direct Collection:</h4>
                            <ul class="list-disc pl-5 space-y-1 text-gray-700">
                                <li>Registration and enrollment forms</li>
                                <li>Contact forms and inquiries</li>
                                <li>Newsletter subscriptions</li>
                                <li>Free resource downloads</li>
                                <li>Feedback and survey responses</li>
                            </ul>
                        </div>
                        
                        <div class="collection-method animate-fade-in-left delay-2">
                            <h4 class="font-bold text-gray-800 mb-2">Automatic Collection:</h4>
                            <ul class="list-disc pl-5 space-y-1 text-gray-700">
                                <li>Cookies and similar technologies</li>
                                <li>Web server logs</li>
                                <li>Analytics tools</li>
                            </ul>
                        </div>
                    </div>
                </article>

                <article class="privacy-section animate-fade-in-up delay-3">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">4. How We Use Your Information</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">We use the information we collect for various purposes:</p>
                    
                    <div class="space-y-4 ml-6">
                        <div class="usage-purpose animate-fade-in-left delay-1">
                            <h4 class="font-bold text-gray-800 mb-2">Service Provision:</h4>
                            <ul class="list-disc pl-5 space-y-1 text-gray-700">
                                <li>To provide and operate our training programs and services</li>
                                <li>To process enrollments and manage your account</li>
                                <li>To communicate with you about your enrollment status</li>
                                <li>To provide customer support and respond to inquiries</li>
                            </ul>
                        </div>
                        
                        <div class="usage-purpose animate-fade-in-left delay-2">
                            <h4 class="font-bold text-gray-800 mb-2">Communication:</h4>
                            <ul class="list-disc pl-5 space-y-1 text-gray-700">
                                <li>To send you important notices about your account or services</li>
                                <li>To send marketing communications (with your consent)</li>
                                <li>To respond to your comments, questions, and requests</li>
                            </ul>
                        </div>
                        
                        <div class="usage-purpose animate-fade-in-left delay-3">
                            <h4 class="font-bold text-gray-800 mb-2">Improvement and Analytics:</h4>
                            <ul class="list-disc pl-5 space-y-1 text-gray-700">
                                <li>To monitor and analyze trends and usage</li>
                                <li>To improve our services and user experience</li>
                                <li>To customize content and recommendations</li>
                                <li>To measure the effectiveness of our communications</li>
                            </ul>
                        </div>
                        
                        <div class="usage-purpose animate-fade-in-left delay-4">
                            <h4 class="font-bold text-gray-800 mb-2">Legal Compliance:</h4>
                            <ul class="list-disc pl-5 space-y-1 text-gray-700">
                                <li>To comply with legal obligations</li>
                                <li>To protect our rights and property</li>
                                <li>To enforce our terms and conditions</li>
                            </ul>
                        </div>
                    </div>
                </article>

                <article class="privacy-section animate-fade-in-up delay-4">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">5. Information Sharing and Disclosure</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">We do not sell, trade, or rent your personal information to third parties. However, we may share your information in the following circumstances:</p>
                    
                    <div class="space-y-4 ml-6">
                        <div class="disclosure-reason animate-fade-in-left delay-1">
                            <h4 class="font-bold text-gray-800 mb-2">Service Providers:</h4>
                            <p class="text-gray-700 mb-2">We may share your information with trusted third-party service providers who assist us in operating our business, conducting business, or serving our users, provided they agree to maintain the confidentiality of your information.</p>
                            <ul class="list-disc pl-5 space-y-1 text-gray-700">
                                <li>Payment processors</li>
                                <li>Email service providers</li>
                                <li>Analytics services</li>
                                <li>Hosting providers</li>
                            </ul>
                        </div>
                        
                        <div class="disclosure-reason animate-fade-in-left delay-2">
                            <h4 class="font-bold text-gray-800 mb-2">Legal Requirements:</h4>
                            <p class="text-gray-700">We may disclose your information if required to do so by law or in response to valid requests by public authorities (e.g., a court or government agency).</p>
                        </div>
                        
                        <div class="disclosure-reason animate-fade-in-left delay-3">
                            <h4 class="font-bold text-gray-800 mb-2">Protection of Rights:</h4>
                            <p class="text-gray-700">We may disclose your information to protect our rights, privacy, safety, or property, and that of our users or others.</p>
                        </div>
                    </div>
                </article>

                <article class="privacy-section animate-fade-in-up delay-5">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">6. Data Security</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. These measures include:</p>
                    <ul class="list-disc pl-8 space-y-2 text-gray-700 mb-4">
                        <li>Secure servers and databases</li>
                        <li>Encryption of sensitive data transmission</li>
                        <li>Access controls and authentication procedures</li>
                        <li>Regular security audits and assessments</li>
                        <li>Employee training on data protection practices</li>
                    </ul>
                    <p class="text-gray-700 leading-relaxed">While we strive to protect your personal information, please note that no method of transmission over the Internet or method of electronic storage is 100% secure.</p>
                </article>

                <article class="privacy-section animate-fade-in-up delay-6">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">7. Data Retention</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">We retain your personal information for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required or permitted by law. Specifically:</p>
                    <ul class="list-disc pl-8 space-y-2 text-gray-700 mb-4">
                        <li>Contact form submissions: 2 years</li>
                        <li>Enrollment records: 5 years</li>
                        <li>Email subscription lists: Until unsubscribed</li>
                        <li>Free resource download records: 3 years</li>
                    </ul>
                    <p class="text-gray-700 leading-relaxed">When your information is no longer needed, we securely delete it according to our data retention policies.</p>
                </article>

                <article class="privacy-section animate-fade-in-up delay-7">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">8. Your Rights</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">Depending on your jurisdiction, you may have the following rights regarding your personal information:</p>
                    <ul class="list-disc pl-8 space-y-2 text-gray-700 mb-4">
                        <li><strong>Access:</strong> The right to obtain a copy of your personal information</li>
                        <li><strong>Rectification:</strong> The right to have inaccurate information corrected</li>
                        <li><strong>Erasure:</strong> The right to have your information deleted</li>
                        <li><strong>Restriction:</strong> The right to restrict processing of your information</li>
                        <li><strong>Data Portability:</strong> The right to receive your information in a structured format</li>
                        <li><strong>Objection:</strong> The right to object to processing of your information</li>
                        <li><strong>Withdraw Consent:</strong> The right to withdraw consent where processing is based on consent</li>
                    </ul>
                    <p class="text-gray-700 leading-relaxed">To exercise any of these rights, please contact us using the information provided below.</p>
                </article>

                <article class="privacy-section animate-fade-in-up delay-8">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">9. Cookies and Tracking Technologies</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">Our website uses cookies and similar tracking technologies to enhance your browsing experience, analyze site traffic, and understand where our visitors come from. Cookies are small data files stored on your device.</p>
                    <p class="text-gray-700 leading-relaxed mb-4">Types of cookies we use:</p>
                    <ul class="list-disc pl-8 space-y-2 text-gray-700 mb-4">
                        <li><strong>Essential Cookies:</strong> Necessary for the website to function properly</li>
                        <li><strong>Analytical Cookies:</strong> Help us understand how visitors interact with our site</li>
                        <li><strong>Functional Cookies:</strong> Enable enhanced functionality and personalization</li>
                        <li><strong>Marketing Cookies:</strong> Used to deliver relevant advertisements</li>
                    </ul>
                    <p class="text-gray-700 leading-relaxed">You can control cookie preferences through your browser settings. Note that disabling certain cookies may impact your experience on our site.</p>
                </article>

                <article class="privacy-section animate-fade-in-up delay-9">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">10. Third-Party Services</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">Our website may contain links to third-party websites or services that are not operated by us. We have no control over and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services. We strongly advise you to review the privacy policy of every site you visit.</p>
                    <p class="text-gray-700 leading-relaxed">Specifically, our website integrates with:</p>
                    <ul class="list-disc pl-8 space-y-2 text-gray-700 mb-4">
                        <li>Google Analytics for website analytics</li>
                        <li>Google Maps for location services</li>
                        <li>Social media platforms for sharing content</li>
                        <li>Email service providers for communications</li>
                    </ul>
                </article>

                <article class="privacy-section animate-fade-in-up delay-10">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">11. Children's Privacy</h3>
                    <p class="text-gray-700 leading-relaxed">Our services are not intended for children under 16 years of age. We do not knowingly collect personal information from children under 16. If you believe we have collected information from a child under 16, please contact us immediately, and we will take steps to delete such information.</p>
                </article>

                <article class="privacy-section animate-fade-in-up delay-11">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">12. Changes to This Privacy Policy</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date.</p>
                    <p class="text-gray-700 leading-relaxed">We encourage you to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>
                </article>

                <article class="privacy-section animate-fade-in-up delay-12">
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">13. Contact Us</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">If you have any questions about this Privacy Policy, please contact us:</p>
                    <div class="bg-blue-50 p-6 rounded-lg border border-blue-200 animate-fade-in-left delay-1">
                        <div class="space-y-3 text-gray-700">
                            <p class="font-bold">By Email:</p>
                            <p>info@softskillmentor.com</p>
                            
                            <p class="font-bold mt-4">By Phone:</p>
                            <p>+91 9154829627</p>
                            
                            <p class="font-bold mt-4">By Mail:</p>
                            <p>SoftSkill Mentor Academy<br>
                            Office No: 301, 3rd Floor, Walchand House Happy Colony Lane, 1, Warje Malwadi Rd,<br>
                            above PNG & sons Jwellery store, Kothrud, Pune, Maharashtra 411038</p>
                            
                            <p class="font-bold mt-4">Data Protection Officer:</p>
                            <p>For data protection inquiries, please contact our designated Data Protection Officer at info@softskillmentor.com</p>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-500 text-white animate-fade-in">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-pulse-slow">Questions About Your Privacy?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto animate-fade-in-delay">We're here to help you understand how we protect your personal information.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-delay-2">
            <a href="<?php echo BASE_PATH; ?>/pages/contact.php"
                class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105 shadow-lg">Contact
                Us</a>
            <a href="<?php echo BASE_PATH; ?>/pages/about.php"
                class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-300 transform hover:scale-105">Learn
                About Us</a>
        </div>
    </div>
</section>

<style>
    /* Animation classes */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
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

    @keyframes pulseSlow {

        0%,
        100% {
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

    .delay-5 {
        animation-delay: 0.5s;
    }

    .delay-6 {
        animation-delay: 0.6s;
    }

    .delay-7 {
        animation-delay: 0.7s;
    }

    .delay-8 {
        animation-delay: 0.8s;
    }

    .delay-9 {
        animation-delay: 0.9s;
    }

    .delay-10 {
        animation-delay: 1.0s;
    }

    .delay-11 {
        animation-delay: 1.1s;
    }

    .delay-12 {
        animation-delay: 1.2s;
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

    /* Privacy content specific styles */
    .privacy-section {
        border-bottom: 1px solid #e5e7eb;
        padding-bottom: 2rem;
    }

    .privacy-section:last-child {
        border-bottom: none;
    }

    h3, h4 {
        scroll-margin-top: 2rem;
    }
</style>

<script>
    // Intersection Observer for animations
    document.addEventListener('DOMContentLoaded', function() {
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
    });
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../components/layout.php';
?>