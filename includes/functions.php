<?php

// Include configuration file
require_once __DIR__ . '/../config.php';

function loadData($filename) {
    // Always try to load from the data directory relative to this file
    $basename = basename($filename);
    $filepath = __DIR__ . '/../data/' . $basename;
    
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
    $courses = loadData(__DIR__ . '/../data/courses.json');
    foreach ($courses as $course) {
        if ($course['id'] == $id) {
            return $course;
        }
    }
    return null;
}

function getServiceById($id) {
    $services = loadData(__DIR__ . '/../data/services.json');
    foreach ($services as $service) {
        if ($service['id'] == $id) {
            return $service;
        }
    }
    return null;
}

function getProgramById($id) {
    // First try to load from programs.json (multiple programs)
    $programs = loadData(__DIR__ . '/../data/programs.json');
    
    if (!empty($programs) && is_array($programs)) {
        foreach ($programs as $program) {
            if (isset($program['id']) && $program['id'] == $id) {
                return $program;
            }
        }
    }
    
    // Fallback to single program.json file for backward compatibility
    $program = loadData(__DIR__ . '/../data/program.json');
    if (!empty($program) && isset($program['title'])) {
        // Add an ID for consistency
        $program['id'] = 'complete-3-month';
        return $program;
    }
    
    return null;
}