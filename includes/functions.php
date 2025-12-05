<?php
function loadData($filename) {
    // Handle absolute paths
    if (strpos($filename, $_SERVER['DOCUMENT_ROOT']) === 0) {
        $filepath = $filename;
    } else {
        // Convert relative paths to absolute paths
        $baseDir = $_SERVER['DOCUMENT_ROOT'] . '/learn';
        if (strpos($filename, '../') === 0) {
            // Remove ../ prefix and construct absolute path
            $filename = substr($filename, 3);
            $filepath = $baseDir . '/data/' . $filename;
        } else {
            $filepath = $baseDir . '/data/' . $filename;
        }
    }
    
    // Debugging - show what file we're trying to load
    // error_log("Trying to load file: " . $filepath);
    
    if (file_exists($filepath)) {
        $json = file_get_contents($filepath);
        $data = json_decode($json, true);
        
        // Debugging - check if JSON was decoded properly
        // error_log("Data loaded: " . (is_array($data) ? count($data) : 'Not an array'));
        
        return is_array($data) ? $data : [];
    }
    
    // Debugging - file doesn't exist
    // error_log("File does not exist: " . $filepath);
    
    return [];
}

function getCourseById($id) {
    $courses = loadData($_SERVER['DOCUMENT_ROOT'] . '/learn/data/courses.json');
    foreach ($courses as $course) {
        if ($course['id'] == $id) {
            return $course;
        }
    }
    return null;
}

function getServiceById($id) {
    $services = loadData($_SERVER['DOCUMENT_ROOT'] . '/learn/data/services.json');
    foreach ($services as $service) {
        if ($service['id'] == $id) {
            return $service;
        }
    }
    return null;
}
?>