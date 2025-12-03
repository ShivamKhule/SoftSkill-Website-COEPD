<?php
$pageTitle = "Blog Post - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/includes/functions.php';
$posts = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/blog.json');

// Ensure $posts is always an array
if (!is_array($posts)) {
    $posts = [];
}

// Get the post ID from URL parameter
$postId = isset($_GET['id']) ? $_GET['id'] : '';

// Find the post with matching ID
$currentPost = null;
if (is_array($posts) && count($posts) > 0) {
    foreach ($posts as $post) {
        if ($post['id'] == $postId) {
            $currentPost = $post;
            break;
        }
    }
}

// If post not found, redirect to blog index
if (!$currentPost) {
    header('Location: index.php');
    exit;
}
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6"><?php echo $currentPost['title']; ?></h1>
            <div class="flex flex-wrap justify-center items-center gap-4 text-lg">
                <span><?php echo date('F j, Y', strtotime($currentPost['date'])); ?></span>
                <span>•</span>
                <span><?php echo $currentPost['author']; ?></span>
                <span>•</span>
                <span><?php echo $currentPost['category']; ?></span>
            </div>
        </div>
    </div>
</section>

<!-- Blog Post Content -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-gray-200 border-2 border-dashed w-full h-96 rounded-xl mb-12"></div>
            
            <div class="prose max-w-none">
                <p class="text-xl text-gray-600 mb-8"><?php echo $currentPost['excerpt']; ?></p>
                
                <div class="text-gray-700">
                    <?php echo nl2br($currentPost['content']); ?>
                </div>
            </div>
            
            <!-- Tags -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <div class="flex flex-wrap gap-2">
                    <?php if (isset($currentPost['tags']) && is_array($currentPost['tags'])): ?>
                        <?php foreach ($currentPost['tags'] as $tag): ?>
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm"><?php echo ucfirst($tag); ?></span>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Author Box -->
            <div class="mt-12 p-6 bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-md">
                <div class="flex items-center">
                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 mr-4"></div>
                    <div>
                        <h3 class="text-xl font-bold"><?php echo $currentPost['author']; ?></h3>
                        <p class="text-gray-600">Expert Trainer at SoftSkills Academy</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <div class="mt-12 flex justify-between">
                <a href="index.php" class="text-blue-600 hover:text-blue-800 font-bold inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Blog
                </a>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-500 hover:text-blue-600">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-blue-600">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-blue-600">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Posts -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Related Articles</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-gray-200 border-2 border-dashed w-full h-48"></div>
                <div class="p-6">
                    <div class="text-gray-500 text-sm mb-2">April 5, 2025 • Career Development</div>
                    <h3 class="text-xl font-bold mb-3">Building Confidence in Professional Settings</h3>
                    <p class="text-gray-600 mb-4">Practical techniques to boost your self-assurance in workplace interactions.</p>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-bold">Read More →</a>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-gray-200 border-2 border-dashed w-full h-48"></div>
                <div class="p-6">
                    <div class="text-gray-500 text-sm mb-2">March 22, 2025 • Communication Skills</div>
                    <h3 class="text-xl font-bold mb-3">Cross-Cultural Communication in Global Teams</h3>
                    <p class="text-gray-600 mb-4">Navigating cultural differences to build stronger international collaborations.</p>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-bold">Read More →</a>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-gray-200 border-2 border-dashed w-full h-48"></div>
                <div class="p-6">
                    <div class="text-gray-500 text-sm mb-2">February 10, 2025 • Leadership</div>
                    <h3 class="text-xl font-bold mb-3">Emotional Intelligence for New Managers</h3>
                    <p class="text-gray-600 mb-4">Essential EQ skills every new leader should develop for team success.</p>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-bold">Read More →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/layout.php';
?>