<?php
// Email configuration file

// Gmail SMTP settings
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'shivam.coepd@gmail.com');
define('SMTP_PASSWORD', 'ukev gjsu ehjy upwd'); // Replace with your app password
define('SMTP_ENCRYPTION', 'tls'); // Options: 'tls', 'ssl', or 'none'

// Sender information
define('SENDER_EMAIL', 'shivam.coepd@gmail.com');
define('SENDER_NAME', 'SoftSkills Academy');

// Fallback settings
define('USE_MAIL_FUNCTION_AS_FALLBACK', true);
define('SAVE_EMAILS_TO_FILE', true);
?>