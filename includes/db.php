<?php

// Include configuration file
require_once __DIR__ . '/../config.php';

class Database
{
    // Database credentials from config
    private $servername = DB_HOST;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $dbname = DB_NAME;

    public $conn; // main PDO connection

    // -------------------------------------------
    // 1. CONNECT TO MYSQL SERVER ONLY
    // -------------------------------------------
    public function connectServer()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->servername}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo "✔ Connected to MySQL server successfully<br>";
        } catch (PDOException $e) {
            die("❌ Server connection failed: " . $e->getMessage());
        }
    }

    public function connectServerWithDB()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->servername};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo "✔ Connected to MySQL server Database '{$this->dbname}' successfully<br>";
        } catch (PDOException $e) {
            die("❌ Server connection failed: " . $e->getMessage());
        }
    }

    // -------------------------------------------
    // 2. CREATE DATABASE IF NOT EXISTS
    // -------------------------------------------
    public function createDatabase()
    {
        try {
            // Check if database exists
            $stmt = $this->conn->query("SHOW DATABASES LIKE '{$this->dbname}'");

            if ($stmt->rowCount() > 0) {
                // echo "✔ Database '{$this->dbname}' already exists<br>";
            } else {
                $this->conn->exec("CREATE DATABASE {$this->dbname}");
                // echo "✔ Database '{$this->dbname}' created successfully<br>";
            }

            // Now connect to the newly created database
            $this->conn = new PDO("mysql:host={$this->servername};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("❌ Error creating database: " . $e->getMessage());
        }
    }

    // -------------------------------------------
    // 3. CREATE USERS TABLE IF NOT EXISTS
    // -------------------------------------------
    public function createUsersTable()
    {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS users (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        firstname VARCHAR(30) NOT NULL,
                        lastname VARCHAR(30) NOT NULL,
                        email VARCHAR(100) NOT NULL UNIQUE,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                    )";

            $this->conn->exec($sql);

            // echo "✔ Table 'users' created or already exists<br>";

        } catch (PDOException $e) {
            echo "❌ Error creating users table: " . $e->getMessage() . "<br>";
        }
    }

    // -------------------------------------------
    // 4. CREATE CONTACT US TABLE IF NOT EXISTS
    // -------------------------------------------
    public function createContactUsTable()
    {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS contact_us (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(150) NOT NULL,
                    phone VARCHAR(20) NULL,
                    email VARCHAR(150) NULL,
                    course VARCHAR(100) NULL,
                    mode ENUM('online', 'inperson', 'hybrid') NULL,
                    message TEXT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";

            $this->conn->exec($sql);

            // echo "✔ Table 'contact_us' created or already exists<br>";

        } catch (PDOException $e) {
            echo "❌ Error creating contact_us table: " . $e->getMessage() . "<br>";
        }
    }

    // -------------------------------------------
    // 5. CREATE FREE-E-BOOK USERS TABLE IF NOT EXISTS
    // -------------------------------------------
    public function createFreeEBookUsersTable()
    {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS free_e_book_users (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(150) NOT NULL,
                    email VARCHAR(150) NULL,
                    bookname VARCHAR(150) NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";

            $this->conn->exec($sql);

            // echo "✔ Table 'free_e_book_users' created or already exists<br>";

        } catch (PDOException $e) {
            echo "❌ Error creating free_e_book_users table: " . $e->getMessage() . "<br>";
        }
    }

    // -------------------------------------------
    // 6. CREATE ENROLLMENTS TABLE IF NOT EXISTS
    // -------------------------------------------
    public function createEnrollmentsTable()
    {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS enrollments (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(150) NOT NULL,
                    email VARCHAR(150) NOT NULL,
                    phone VARCHAR(20) NULL,
                    batch_id VARCHAR(50) NOT NULL,
                    course VARCHAR(100) NOT NULL,
                    enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending'
                )";

            $this->conn->exec($sql);

            // echo "✔ Table 'enrollments' created or already exists<br>";

        } catch (PDOException $e) {
            echo "❌ Error creating enrollments table: " . $e->getMessage() . "<br>";
        }
    }

    // -------------------------------------------
    // 7. CREATE BATCHES TABLE IF NOT EXISTS
    // -------------------------------------------
    public function createBatchesTable()
    {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS batches (
                    id VARCHAR(50) PRIMARY KEY,
                    course VARCHAR(150) NOT NULL,
                    start_date DATE NOT NULL,
                    end_date DATE NOT NULL,
                    timings VARCHAR(100) NOT NULL,
                    mode VARCHAR(20) NOT NULL,
                    type VARCHAR(50) NOT NULL,
                    seats_available INT NOT NULL,
                    instructor VARCHAR(100) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";

            $this->conn->exec($sql);

            // echo "✔ Table 'batches' created or already exists<br>";

        } catch (PDOException $e) {
            echo "❌ Error creating batches table: " . $e->getMessage() . "<br>";
        }
    }

    // -------------------------------------------
    // 8. INSERT DATA INTO CONTACT US TABLE
    // -------------------------------------------
    public function insertContactMessage($name, $phone, $email, $course, $mode, $message)
    {
        try {
            // Handle empty mode values
            if (empty($mode)) {
                $mode = null;
            } else {
                // Validate mode against enum values
                $valid_modes = ['online', 'inperson', 'hybrid'];
                if (!in_array($mode, $valid_modes)) {
                    $mode = null;
                }
            }
            
            $sql = "INSERT INTO contact_us (name, phone, email, course, mode, message)
                VALUES (:name, :phone, :email, :course, :mode, :message)";

            $stmt = $this->conn->prepare($sql);

            // Bind values (prepared statement)
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':course', $course, PDO::PARAM_STR);
            $stmt->bindValue(':mode', $mode, PDO::PARAM_STR);
            $stmt->bindValue(':message', $message, PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "✔ Contact form submitted successfully";
            } else {
                return "❌ Failed to submit contact form";
            }

        } catch (PDOException $e) {
            return "❌ Error inserting contact form: " . $e->getMessage();
        }
    }

    // -------------------------------------------
    // 9. INSERT DATA INTO FREE-E-BOOK USERS TABLE
    // -------------------------------------------
    public function insertFreeEBookUsers($name, $email, $bookname)
    {
        try {
            $sql = "INSERT INTO free_e_book_users (name, email, bookname)
                VALUES (:name, :email, :bookname)";

            $stmt = $this->conn->prepare($sql);

            // Bind values (prepared statement)
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "✔ Free E-Book form submitted successfully";
            } else {
                return "❌ Failed to submit Free E-Book form";
            }

        } catch (PDOException $e) {
            return "❌ Error inserting contact form: " . $e->getMessage();
        }
    }

    // -------------------------------------------
    // 10. INSERT DATA INTO ENROLLMENTS TABLE
    // -------------------------------------------
    public function insertEnrollment($name, $email, $phone, $batch_id, $course)
    {
        try {
            $sql = "INSERT INTO enrollments (name, email, phone, batch_id, course)
                VALUES (:name, :email, :phone, :batch_id, :course)";

            $stmt = $this->conn->prepare($sql);

            // Bind values (prepared statement)
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindValue(':batch_id', $batch_id, PDO::PARAM_STR);
            $stmt->bindValue(':course', $course, PDO::PARAM_STR);

            if ($stmt->execute()) {
                return $this->conn->lastInsertId();
            } else {
                return false;
            }

        } catch (PDOException $e) {
            return false;
        }
    }

    // -------------------------------------------
    // 11. GET BATCH DETAILS BY ID
    // -------------------------------------------
    public function getBatchById($batch_id)
    {
        try {
            $sql = "SELECT * FROM batches WHERE id = :batch_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':batch_id', $batch_id, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
}

// $db = new Database();

// $db->connectServer();
// $db->createDatabase();
// $db->createUsersTable();
// $db->createContactUsTable();
?>