<?php
$pageTitle = "Blog & Resources - SoftSkills Academy";
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/includes/functions.php';
$posts = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/blog.json');
?>

<?php ob_start(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Blog & Resources</h1>
        <p class="text-xl max-w-3xl mx-auto">Insights, tips, and strategies to enhance your soft skills journey.</p>
    </div>
</section>

<!-- Blog Posts -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold mb-6">Latest Articles</h2>
                    
                    <?php foreach ($posts as $post): ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                        <div class="bg-gray-200 border-2 border-dashed w-full h-64" />
                        <div class="p-8">
                            <div class="flex items-center text-gray-500 text-sm mb-4">
                                <span><?php echo date('F j, Y', strtotime($post['date'])); ?></span>
                                <span class="mx-2">•</span>
                                <span><?php echo $post['author']; ?></span>
                                <span class="mx-2">•</span>
                                <span><?php echo $post['category']; ?></span>
                            </div>
                            <h3 class="text-2xl font-bold mb-4"><?php echo $post['title']; ?></h3>
                            <p class="text-gray-600 mb-6"><?php echo $post['excerpt']; ?></p>
                            <a href="post.php?id=<?php echo $post['id']; ?>" class="text-blue-600 hover:text-blue-800 font-bold inline-flex items-center">
                                Read More
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Pagination -->
                <div class="flex justify-center mt-12">
                    <nav class="flex items-center space-x-2">
                        <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-lg">1</a>
                        <a href="#" class="px-4 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-lg">2</a>
                        <a href="#" class="px-4 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-lg">3</a>
                        <a href="#" class="px-4 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-lg">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div>
                <!-- Search -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-xl font-bold mb-4">Search</h3>
                    <div class="relative">
                        <input type="text" placeholder="Search articles..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button class="absolute right-3 top-2 text-gray-400">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Categories -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-xl font-bold mb-4">Categories</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="flex justify-between items-center text-gray-700 hover:text-blue-600">
                                <span>Communication Skills</span>
                                <span class="bg-gray-200 text-gray-700 text-xs font-bold px-2 py-1 rounded-full">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center text-gray-700 hover:text-blue-600">
                                <span>Career Development</span>
                                <span class="bg-gray-200 text-gray-700 text-xs font-bold px-2 py-1 rounded-full">8</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center text-gray-700 hover:text-blue-600">
                                <span>Interview Preparation</span>
                                <span class="bg-gray-200 text-gray-700 text-xs font-bold px-2 py-1 rounded-full">5</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center text-gray-700 hover:text-blue-600">
                                <span>Leadership</span>
                                <span class="bg-gray-200 text-gray-700 text-xs font-bold px-2 py-1 rounded-full">7</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center text-gray-700 hover:text-blue-600">
                                <span>Workplace Skills</span>
                                <span class="bg-gray-200 text-gray-700 text-xs font-bold px-2 py-1 rounded-full">9</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Popular Posts -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold mb-4">Popular Posts</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 mr-4" />
                            <div>
                                <h4 class="font-bold text-sm mb-1">7 Essential Communication Tips for the Modern Workplace</h4>
                                <p class="text-gray-500 text-xs">March 15, 2025</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 mr-4" />
                            <div>
                                <h4 class="font-bold text-sm mb-1">How Soft Skills Drive Career Advancement</h4>
                                <p class="text-gray-500 text-xs">February 28, 2025</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 mr-4" />
                            <div>
                                <h4 class="font-bold text-sm mb-1">Mastering the Behavioral Interview: A Complete Guide</h4>
                                <p class="text-gray-500 text-xs">January 10, 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Signup -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Stay Updated</h2>
            <p class="text-gray-600 mb-6 max-w-2xl mx-auto">Subscribe to our newsletter for the latest articles, tips, and resources delivered to your inbox.</p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-2xl mx-auto">
                <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Subscribe</button>
            </form>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/layout.php';
?>