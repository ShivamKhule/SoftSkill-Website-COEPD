<?php
$pageTitle = "Corporate Training - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/includes/functions.php';
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Corporate Soft Skills Training</h1>
        <p class="text-xl max-w-3xl mx-auto">Customized programs for teams to enhance workplace communication, collaboration, and productivity.</p>
    </div>
</section>

<!-- Corporate Training Overview -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-1/2">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Corporate Training" class="rounded-xl shadow-lg w-full">
            </div>
            <div class="lg:w-1/2">
                <h2 class="text-3xl font-bold mb-6">Transform Your Organization</h2>
                <p class="text-gray-600 mb-6">We provide customized corporate soft-skills programs for teams and organizations to enhance workplace communication, collaboration, and productivity.</p>
                <p class="text-gray-600 mb-6">Our corporate training solutions are designed to address specific organizational challenges and align with your company's goals and culture.</p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="#programs" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">View Programs</a>
                    <a href="../pages/contact.php" class="bg-white border-2 border-blue-600 text-blue-600 hover:bg-blue-50 font-bold py-3 px-6 rounded-lg transition duration-300">Request Proposal</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Key Benefits -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Key Benefits</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Our corporate training programs deliver measurable improvements in workplace performance and employee satisfaction.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-md text-center">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Improved Performance</h3>
                <p class="text-gray-600">Enhanced communication leads to better collaboration and project outcomes.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md text-center">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Stronger Teams</h3>
                <p class="text-gray-600">Build cohesive teams with improved trust and cooperation.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md text-center">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-redo"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Increased Retention</h3>
                <p class="text-gray-600">Investment in employee development boosts job satisfaction and loyalty.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md text-center">
                <div class="text-blue-600 text-3xl mb-4">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Enhanced Innovation</h3>
                <p class="text-gray-600">Better communication fosters creative problem-solving and idea sharing.</p>
            </div>
        </div>
    </div>
</section>

<!-- Training Programs -->
<section id="programs" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Our Corporate Training Programs</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Comprehensive solutions tailored to your organization's specific needs and objectives.</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <div class="border border-gray-200 rounded-xl p-8 shadow-md">
                <h3 class="text-2xl font-bold mb-4">Team Communication & Collaboration</h3>
                <p class="text-gray-600 mb-6">Develop effective communication channels and collaborative workflows that enhance productivity and reduce misunderstandings.</p>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Active listening and feedback techniques</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Virtual team communication strategies</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Conflict resolution and mediation</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Cross-departmental collaboration</span>
                    </li>
                </ul>
            </div>
            
            <div class="border border-gray-200 rounded-xl p-8 shadow-md">
                <h3 class="text-2xl font-bold mb-4">Leadership Development</h3>
                <p class="text-gray-600 mb-6">Cultivate authentic leaders who inspire teams and drive organizational success through emotional intelligence and effective management.</p>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Situational leadership approaches</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Coaching and mentoring skills</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Change management and adaptation</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Emotional intelligence in leadership</span>
                    </li>
                </ul>
            </div>
            
            <div class="border border-gray-200 rounded-xl p-8 shadow-md">
                <h3 class="text-2xl font-bold mb-4">Customer Service Excellence</h3>
                <p class="text-gray-600 mb-6">Equip your customer-facing teams with the empathy, problem-solving skills, and communication techniques needed to exceed expectations.</p>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Empathy and emotional intelligence</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Difficult customer management</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Service recovery techniques</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Building long-term customer relationships</span>
                    </li>
                </ul>
            </div>
            
            <div class="border border-gray-200 rounded-xl p-8 shadow-md">
                <h3 class="text-2xl font-bold mb-4">Workplace Productivity & Well-being</h3>
                <p class="text-gray-600 mb-6">Help employees manage time effectively, reduce stress, and maintain work-life balance for sustained performance.</p>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Time management and prioritization</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Stress management techniques</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Work-life balance strategies</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Resilience and adaptability</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-blue-50 to-teal-50 border border-blue-200 rounded-xl p-8 shadow-md">
            <h3 class="text-2xl font-bold mb-4">Customized Workshops</h3>
            <p class="text-gray-600 mb-6">We also offer bespoke workshops tailored to your organization's unique challenges and objectives:</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <h4 class="font-bold mb-2">Needs Assessment</h4>
                    <p class="text-gray-600 text-sm">Comprehensive evaluation to identify specific skill gaps and training priorities.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-2">Program Design</h4>
                    <p class="text-gray-600 text-sm">Custom curriculum development aligned with your organizational goals.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-2">Implementation & Evaluation</h4>
                    <p class="text-gray-600 text-sm">Delivery of training with post-program assessment and impact measurement.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Approach -->
<section class="py-16 bg-gradient-to-br from-gray-800 to-blue-900 text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Our Corporate Training Approach</h2>
            <p class="text-gray-300 max-w-3xl mx-auto">We combine proven methodologies with industry expertise to deliver impactful training solutions.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-blue-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-search text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Assessment</h3>
                <p class="text-gray-300">Thorough analysis of your organization's current challenges and desired outcomes.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-cogs text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Customization</h3>
                <p class="text-gray-300">Development of tailored programs that align with your company culture and goals.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-chart-bar text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Measurement</h3>
                <p class="text-gray-300">Ongoing evaluation to ensure training effectiveness and ROI.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Transform Your Team?</h2>
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">Contact us to discuss your organization's training needs and receive a customized proposal.</p>
        <a href="../pages/contact.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg text-lg transition duration-300">Request Corporate Training Proposal</a>
    </div>
</section>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/layout.php';
?>