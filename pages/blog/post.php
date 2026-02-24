<?php
// Start session for flash messages
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = "Blog Post - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$posts = loadData($_SERVER['DOCUMENT_ROOT'] . '/data/blog.json');
if (!is_array($posts)) {
    $posts = [];
}

// Get and safely decode the post ID
$postId = isset($_GET['id']) ? urldecode($_GET['id']) : '';

// Find the current post using strict comparison
$currentPost = null;
foreach ($posts as $post) {
    if (isset($post['id']) && $post['id'] === $postId) {
        $currentPost = $post;
        break;
    }
}

// Redirect if post not found
if (!$currentPost) {
    header('Location: index.php');
    exit;
}

// Get related posts (same category, exclude current)
$relatedPosts = array_filter($posts, function ($p) use ($currentPost) {
    return isset($p['id'], $p['category']) &&
        $p['category'] === $currentPost['category'] &&
        $p['id'] !== $currentPost['id'];
});
$relatedPosts = array_slice($relatedPosts, 0, 3);
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6"><?php echo htmlspecialchars($currentPost['title']); ?></h1>
            <div class="flex flex-wrap justify-center items-center gap-4 text-lg">
                <span><?php echo date('F j, Y', strtotime($currentPost['date'])); ?></span>
                <span>•</span>
                <span><?php echo htmlspecialchars($currentPost['author']); ?></span>
                <span>•</span>
                <span><?php echo htmlspecialchars($currentPost['category']); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- Blog Post Content -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Featured Image -->
            <div class="mb-12">
                <img src="<?php echo BASE_PATH . htmlspecialchars($currentPost['image']); ?>"
                    alt="<?php echo htmlspecialchars($currentPost['title']); ?>"
                    class="w-full h-96 object-cover rounded-xl shadow-lg">
            </div>

            <div class="prose max-w-none lg:prose-lg">
                <p class="text-xl text-gray-600 mb-8 lead"><?php echo htmlspecialchars($currentPost['excerpt']); ?></p>

                <div class="text-gray-700 leading-relaxed text-lg">
                    <?php echo nl2br(htmlspecialchars($currentPost['content'])); ?>
                </div>
            </div>

            <!-- Tags -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <div class="flex flex-wrap gap-2">
                    <?php if (!empty($currentPost['tags']) && is_array($currentPost['tags'])): ?>
                        <?php foreach ($currentPost['tags'] as $tag): ?>
                            <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium">
                                <?php echo htmlspecialchars(ucfirst($tag)); ?>
                            </span>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Author Box -->
            <div class="mt-12 p-8 bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-md">
                <div class="flex items-center">
                    <img src="<?php echo htmlspecialchars($currentPost['authorImage']); ?>"
                        alt="<?php echo htmlspecialchars($currentPost['author']); ?>"
                        class="w-20 h-20 rounded-full object-cover mr-6 shadow-md">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">
                            <?php echo htmlspecialchars($currentPost['author']); ?></h3>
                        <p class="text-gray-600 mt-1">Expert Trainer & Career Coach at SoftSkills Academy</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="mt-12 flex flex-wrap justify-between items-center gap-6">
                <a href="index.php"
                    class="text-blue-600 hover:text-blue-800 font-bold inline-flex items-center text-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    Back to Blog
                </a>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-500 hover:text-blue-600 text-2xl"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-500 hover:text-blue-600 text-2xl"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-500 hover:text-blue-600 text-2xl"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Posts -->
<?php if (!empty($relatedPosts)): ?>
    <section class="py-16 bg-gradient-to-br from-blue-50 to-teal-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Related Articles</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <?php foreach ($relatedPosts as $relPost): ?>
                    <article class="bg-white rounded-xl shadow-md overflow-hidden group hover:shadow-xl transition-shadow">
                        <div class="h-48 overflow-hidden">
                            <img src="<?php echo BASE_PATH . htmlspecialchars($relPost['image']); ?>"
                                alt="<?php echo htmlspecialchars($relPost['title']); ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <div class="text-sm text-gray-500 mb-2">
                                <?php echo date('F j, Y', strtotime($relPost['date'])); ?> •
                                <?php echo htmlspecialchars($relPost['category']); ?>
                            </div>
                            <h3 class="text-xl font-bold mb-3 line-clamp-2"><?php echo htmlspecialchars($relPost['title']); ?>
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3"><?php echo htmlspecialchars($relPost['excerpt']); ?></p>
                            <a href="post.php?id=<?php echo urlencode($relPost['id']); ?>"
                                class="text-blue-600 hover:text-blue-800 font-bold inline-flex items-center">
                                Read More
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/components/layout.php';
?>