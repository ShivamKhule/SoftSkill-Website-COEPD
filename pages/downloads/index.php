<?php
$pageTitle = "Free Resources - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/includes/functions.php';
$resources = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/resources.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Free Resources</h1>
        <p class="text-xl max-w-3xl mx-auto">Valuable resources to kickstart your soft skills journey.</p>
    </div>
</section>

<!-- Lead Magnet Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Download Our Free Guides</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Get instant access to our expert-curated resources designed to help you develop essential soft skills.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($resources as $resource): ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
                <div class="bg-gray-200 border-2 border-dashed w-full h-48" />
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3"><?php echo $resource['title']; ?></h3>
                    <p class="text-gray-600 text-sm mb-4"><?php echo $resource['description']; ?></p>
                    <div class="flex justify-between text-xs text-gray-500 mb-6">
                        <span><?php echo $resource['format']; ?></span>
                        <span><?php echo $resource['size']; ?></span>
                    </div>
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 download-btn" data-resource="<?php echo $resource['id']; ?>">
                        Download Now
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Featured Resource -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-96" />
            </div>
            <div class="md:w-1/2 md:pl-12">
                <h2 class="text-3xl font-bold mb-6">7-Day Communication Mastery Guide</h2>
                <p class="text-gray-600 mb-6">Our most popular resource, this comprehensive guide will transform your communication skills in just one week with daily exercises and practical tips.</p>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Daily communication exercises</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Active listening techniques</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Non-verbal communication mastery</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                        <span>Conflict resolution strategies</span>
                    </li>
                </ul>
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300 download-btn" data-resource="communication-guide">
                    Download Free Guide
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Email Signup -->
<section class="py-16">
    <div class="container mx-auto px-4 max-w-3xl">
        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg p-8 text-white text-center">
            <h2 class="text-3xl font-bold mb-4">Join Our Community</h2>
            <p class="text-xl mb-6">Subscribe to our newsletter for exclusive resources, tips, and special offers.</p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-2xl mx-auto">
                <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 rounded-lg text-gray-800 focus:outline-none">
                <button type="submit" class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-6 rounded-lg transition duration-300">Subscribe</button>
            </form>
        </div>
    </div>
</section>

<!-- Modal for Download Form -->
<div id="downloadModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold">Download Resource</h3>
            <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="downloadForm">
            <div class="mb-4">
                <label for="fullName" class="block text-gray-700 font-medium mb-2">Full Name</label>
                <input type="text" id="fullName" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="interest" class="block text-gray-700 font-medium mb-2">Primary Interest</label>
                <select id="interest" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select your interest</option>
                    <option value="communication">Communication Skills</option>
                    <option value="leadership">Leadership Development</option>
                    <option value="public-speaking">Public Speaking</option>
                    <option value="interview">Interview Preparation</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                Get Instant Access
            </button>
            <p class="text-gray-500 text-xs mt-4">By downloading, you agree to our privacy policy and consent to receive updates.</p>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('downloadModal');
    const closeModalBtn = document.getElementById('closeModal');
    const downloadBtns = document.querySelectorAll('.download-btn');
    const downloadForm = document.getElementById('downloadForm');
    
    // Open modal when download button is clicked
    downloadBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const resourceId = this.getAttribute('data-resource');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });
    });
    
    // Close modal
    closeModalBtn.addEventListener('click', function() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    });
    
    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    });
    
    // Handle form submission
    downloadForm.addEventListener('submit', function(e) {
        e.preventDefault();
        // In a real implementation, this would send the data to a server
        alert('Thank you! Your resource will be sent to your email.');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        downloadForm.reset();
    });
});
</script>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/layout.php';
?>