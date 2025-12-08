<?php
// Script to populate batches table with data from batches.json

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';

// Load batches data
$batches = loadData(__DIR__ . '/../data/batches.json');

// Connect to database
$db = new Database();

try {
    $db->connectServerWithDB();
    echo "Connected to database successfully.\n";
} catch (Exception $e) {
    echo "Failed to connect to database: " . $e->getMessage() . "\n";
    echo "Attempting to create database...\n";
    
    try {
        $db->connectServer();
        $db->createDatabase();
        $db->connectServerWithDB();
        echo "Database created and connected successfully.\n";
    } catch (Exception $e2) {
        echo "Failed to create database: " . $e2->getMessage() . "\n";
        exit(1);
    }
}

// Create tables
$db->createBatchesTable();

try {
    // Clear existing data
    $db->conn->exec("DELETE FROM batches");
    
    // Prepare insert statement
    $sql = "INSERT INTO batches (id, course, start_date, end_date, timings, mode, type, seats_available, instructor) 
            VALUES (:id, :course, :start_date, :end_date, :timings, :mode, :type, :seats_available, :instructor)";
    $stmt = $db->conn->prepare($sql);
    
    // Insert each batch
    $count = 0;
    foreach ($batches as $batch) {
        $stmt->bindValue(':id', $batch['id'], PDO::PARAM_STR);
        $stmt->bindValue(':course', $batch['course'], PDO::PARAM_STR);
        $stmt->bindValue(':start_date', $batch['startDate'], PDO::PARAM_STR);
        $stmt->bindValue(':end_date', $batch['endDate'], PDO::PARAM_STR);
        $stmt->bindValue(':timings', $batch['timings'], PDO::PARAM_STR);
        $stmt->bindValue(':mode', $batch['mode'], PDO::PARAM_STR);
        $stmt->bindValue(':type', $batch['type'], PDO::PARAM_STR);
        $stmt->bindValue(':seats_available', $batch['seatsAvailable'], PDO::PARAM_INT);
        $stmt->bindValue(':instructor', $batch['instructor'], PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            $count++;
        }
    }
    
    echo "Successfully populated batches table with " . $count . " records.\n";
    
} catch (PDOException $e) {
    echo "Error populating batches table: " . $e->getMessage() . "\n";
}
?>