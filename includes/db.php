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
    // 5. INSERT DATA INTO CONTACT US TABLE
    // -------------------------------------------
    public function insertContactMessage($name, $phone, $email, $course, $mode, $message)
    {
        try {
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
}

// $db = new Database();

// $db->connectServer();
// $db->createDatabase();
// $db->createUsersTable();
// $db->createContactUsTable();
?>