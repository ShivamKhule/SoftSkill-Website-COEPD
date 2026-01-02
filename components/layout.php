<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'SoftSkill Mentor Academy'; ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASE_PATH; ?>/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_PATH; ?>/assets/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo BASE_PATH; ?>/assets/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Notyf CSS for notifications -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F6ZLFWVPRH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-F6ZLFWVPRH');
    </script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .whatsapp-widget {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .whatsapp-widget a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .whatsapp-widget a:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        .counter {
            font-size: 2.5rem;
            font-weight: 700;
        }

        .counter-label {
            font-size: 1rem;
            font-weight: 500;
        }

        /* Dropdown styles */
        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            min-width: 12rem;
            padding: 0.5rem 0;
            margin: 0.125rem 0 0;
            font-size: 1rem;
            color: #212529;
            text-align: left;
            list-style: none;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, .15);
            border-radius: 0.25rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .175);
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.25rem 1rem;
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
            transition: background-color 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: #f0f9ff;
            color: #2563eb;
            text-decoration: none;
        }

        /* Responsive improvements */
        @media (max-width: 1024px) {
            .counter {
                font-size: 2.25rem;
            }

            .hero-title {
                font-size: 3rem;
            }

            .section-title {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .counter {
                font-size: 2rem;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 640px) {
            .counter {
                font-size: 1.75rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.75rem;
            }
        }

        /* Smooth transitions */
        .transition-all {
            transition-property: all;
        }

        .duration-300 {
            transition-duration: 300ms;
        }

        .ease-in-out {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>

<body class="bg-gray-50">
    <?php include __DIR__ . '/header.php'; ?>

    <main>
        <?php
        if (isset($content)) {
            echo $content;
        } else {
            ?>
            <div class="container mx-auto px-4 py-16">
                <h1 class="text-3xl font-bold text-center mb-8">Welcome to SoftSkill Mentor Academy</h1>
                <p class="text-center text-gray-600 max-w-2xl mx-auto">Please navigate to a specific page to view content.
                </p>
            </div>
        <?php } ?>
    </main>

    <?php include __DIR__ . '/footer.php'; ?>

    <!-- WhatsApp Widget -->
    <div class="whatsapp-widget">
        <a href="https://wa.me/9154829627" target="_blank" title="Chat with us on WhatsApp">
            <i class="fab fa-whatsapp text-3xl"></i>
        </a>
    </div>

    <script src="../js/main.js"></script>
</body>

</html>