<?php
$pageTitle = "FAQ - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/includes/functions.php';
$faqs = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/faqs.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Frequently Asked Questions</h1>
        <p class="text-xl max-w-3xl mx-auto">Find answers to common questions about our training programs.</p>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <div class="space-y-6">
                <?php foreach ($faqs as $faq): ?>
                <div class="border border-gray-200 rounded-xl overflow-hidden shadow-md" data-faq-item>
                    <button class="w-full flex justify-between items-center p-6 text-left bg-gradient-to-r from-gray-50 to-white hover:from-blue-50 hover:to-teal-50 transition duration-300" data-faq-button>
                        <h3 class="text-lg font-bold text-gray-800"><?php echo $faq['question']; ?></h3>
                        <i class="fas fa-chevron-down text-blue-600 transition duration-300"></i>
                    </button>
                    <div class="bg-gray-50 p-6 border-t border-gray-200 hidden" data-faq-content>
                        <p class="text-gray-600"><?php echo $faq['answer']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="mt-12 bg-gradient-to-br from-blue-50 to-teal-50 border border-blue-200 rounded-xl p-8 text-center shadow-md">
                <h3 class="text-xl font-bold mb-4">Still Have Questions?</h3>
                <p class="text-gray-600 mb-6">Our team is here to help you with any additional inquiries about our programs.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="contact.php" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Contact Us</a>
                    <a href="schedule.php" class="bg-white border-2 border-blue-600 text-blue-600 hover:bg-blue-50 font-bold py-3 px-6 rounded-lg transition duration-300">View Schedule</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Information -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Important Information</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Additional details about our training programs and policies.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div class="bg-white p-6 rounded-xl shadow-md">
                <div class="text-blue-600 text-2xl mb-4">
                    <i class="fas fa-file-contract"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Cancellation Policy</h3>
                <p class="text-gray-600">Full refunds available up to 7 days before the program starts. After that, credits can be applied to future programs.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md">
                <div class="text-blue-600 text-2xl mb-4">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Certification Requirements</h3>
                <p class="text-gray-600">Certificates are awarded to participants who attend at least 80% of sessions and complete all assignments.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md">
                <div class="text-blue-600 text-2xl mb-4">
                    <i class="fas fa-laptop"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Technical Requirements</h3>
                <p class="text-gray-600">For online sessions, stable internet connection and modern browser required. Detailed setup instructions provided upon enrollment.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md">
                <div class="text-blue-600 text-2xl mb-4">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Group Discounts</h3>
                <p class="text-gray-600">Special pricing available for groups of 3 or more participants from the same organization. Contact us for details.</p>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('[data-faq-item]');
    
    faqItems.forEach(item => {
        const button = item.querySelector('[data-faq-button]');
        const content = item.querySelector('[data-faq-content]');
        const icon = button.querySelector('i');
        
        button.addEventListener('click', () => {
            const isOpen = !content.classList.contains('hidden');
            
            // Close all other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.querySelector('[data-faq-content]').classList.add('hidden');
                    const otherIcon = otherItem.querySelector('[data-faq-button] i');
                    otherIcon.classList.remove('fa-chevron-up');
                    otherIcon.classList.add('fa-chevron-down');
                }
            });
            
            // Toggle current item
            content.classList.toggle('hidden');
            if (isOpen) {
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            } else {
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            }
        });
    });
});
</script>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/layout.php';
?>