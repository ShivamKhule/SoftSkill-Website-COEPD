<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Soft Skills Training'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/header.php'; ?>
    
    <main>
        <?php 
        if (isset($content)) { 
            echo $content;
        } else { 
        ?>
        <div class="container mx-auto px-4 py-16">
            <h1 class="text-3xl font-bold text-center mb-8">Welcome to SoftSkills Academy</h1>
            <p class="text-center text-gray-600 max-w-2xl mx-auto">Please navigate to a specific page to view content.</p>
        </div>
        <?php } ?>
    </main>
    
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/softskill_website/components/footer.php'; ?>
    
    <script src="/softskill_website/js/main.js"></script>
</body>
</html>