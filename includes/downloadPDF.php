<?php
// Get the file name from the URL parameter and append the extension
if (isset($_GET['file'])) {
    $fileName = basename($_GET['file']) . '.pdf'; // Use basename for security
    $filePath = './data/files/' . $fileName; // Define the full path

    // Check if the file exists
    if (file_exists($filePath) && is_file($filePath)) {
        // Set the appropriate headers to force download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream'); // Generic type for download
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));

        // Read the file and output it to the browser
        readfile($filePath);
        exit;
    } else {
        // Handle file not found error
        die('Error: The file ' . $fileName . ' does not exist!');
    }
} else {
    // Handle case where no file parameter is provided
    die('Error: No file specified for download.');
}
?>
