<?php
function loadData($filename) {
    // Handle absolute paths
    if (strpos($filename, $_SERVER['DOCUMENT_ROOT']) === 0) {
        $filepath = $filename;
    } else {
        // Convert relative paths to absolute paths
        $baseDir = $_SERVER['DOCUMENT_ROOT'] . '/softskill_website';
        if (strpos($filename, '../') === 0) {
            // Remove ../ prefix and construct absolute path
            $filename = substr($filename, 3);
            $filepath = $baseDir . '/data/' . $filename;
        } else {
            $filepath = $baseDir . '/data/' . $filename;
        }
    }
    
    if (file_exists($filepath)) {
        $json = file_get_contents($filepath);
        return json_decode($json, true);
    }
    return [];
}

function getCourseById($id) {
    $courses = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/courses.json');
    foreach ($courses as $course) {
        if ($course['id'] == $id) {
            return $course;
        }
    }
    return null;
}

function getTrainerById($id) {
    $trainers = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/trainers.json');
    foreach ($trainers as $trainer) {
        if ($trainer['id'] == $id) {
            return $trainer;
        }
    }
    return null;
}

function getServiceById($id) {
    $services = loadData($_SERVER['DOCUMENT_ROOT'] . '/softskill_website/data/services.json');
    foreach ($services as $service) {
        if ($service['id'] == $id) {
            return $service;
        }
    }
    return null;
}
?>