<?php
// Process download form submission
if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    
    // Simple validation
    if (empty($name)) {
        die('Name is required');
    }
    
    if (empty($email)) {
        die('Email is required');
    }
    
    // Simple email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format');
    }
    
    // In a real application, you would save this data to a database here
    // For now, we'll just redirect to the download
    
    // Redirect to download the PDF
    header('Location: includes/downloadPDF.php?file=pdf-sample_0');
    exit;
} else {
    // If form wasn't submitted properly, redirect back to home
    header('Location: index.php');
    exit;
}
?>