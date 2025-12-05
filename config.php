<?php
// Configuration file for environment-specific settings

// Automatically detect environment
$environment = (strpos($_SERVER['HTTP_HOST'] ?? '', 'localhost') !== false || strpos($_SERVER['HTTP_HOST'] ?? '', '127.0.0.1') !== false) ? 'development' : 'production';

if ($environment === 'development') {
    // Local development settings
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'softskill');
} else {
    // Production (Hostinger) settings
    define('DB_HOST', 'localhost');
    define('DB_USER', 'u233781988_db_user');
    define('DB_PASS', 'your_actual_db_password_here');
    define('DB_NAME', 'u233781988_softskill');
}

// Base URL for the application
define('BASE_URL', ($environment === 'development') ? 'http://localhost/learn' : 'https://learn.softskillmentor.com');

// Site settings
define('SITE_NAME', 'SoftSkills Academy');
define('ADMIN_EMAIL', ($environment === 'development') ? 'admin@localhost.local' : 'admin@softskillsacademy.com');
?>