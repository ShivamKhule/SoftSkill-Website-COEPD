<?php

class Database
{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "softskill";

    public $conn;

    // -------------------------------------------
    // CONNECT TO MYSQL SERVER
    // -------------------------------------------
    public function connectServer()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password);

        if ($this->conn->connect_error) {
            die("❌ Server Connection Failed: " . $this->conn->connect_error);
        }

        echo "✔ Server Connected Successfully<br>";
    }

    // -------------------------------------------
    // CREATE DATABASE IF NOT EXISTS
    // -------------------------------------------
    public function createDatabase()
    {
        $check = $this->conn->query("SHOW DATABASES LIKE '$this->dbname'");

        if ($check->num_rows > 0) {
            echo "✔ Database already exists<br>";
        } else {
            $sql = "CREATE DATABASE $this->dbname";
            if ($this->conn->query($sql) === TRUE) {
                echo "✔ Database created successfully<br>";
            } else {
                echo "❌ Error creating database: " . $this->conn->error . "<br>";
            }
        }

        // Select database
        $this->conn->select_db($this->dbname);
    }

    // -------------------------------------------
    // CREATE TABLE IF NOT EXISTS
    // -------------------------------------------
    public function createUsersTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS users (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(100) NOT NULL,
                    email VARCHAR(100) NOT NULL UNIQUE,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";

        if ($this->conn->query($sql) === TRUE) {
            echo "✔ Table 'users' created or already exists<br>";
        } else {
            echo "❌ Error creating table: " . $this->conn->error . "<br>";
        }
    }

    public function createContactUsTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS contactus (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(100) NOT NULL,
                    email VARCHAR(100) NOT NULL UNIQUE,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";

        if ($this->conn->query($sql) === TRUE) {
            echo "✔ Table 'contactus' created or already exists<br>";
        } else {
            echo "❌ Error creating table: " . $this->conn->error . "<br>";
        }
    }
}


$db = new Database();

$db->connectServer();
$db->createDatabase();
$db->createUsersTable();

?>




<!-- <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "softskill";

// Connect to MySQL server (no DB selected yet)
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

// Check if database exists
$check = $conn->query("SHOW DATABASES LIKE '$dbname'");

if ($check && $check->num_rows > 0) {
    echo "Database already exists<br>";
} else {

    // Try to create database
    $create = $conn->query("CREATE DATABASE $dbname");

    if ($create === TRUE) {
        echo "Database created successfully<br>";
    } else {
        echo "Error creating database: " . $conn->error . "<br>";
    }
}

$conn->close();
?> -->