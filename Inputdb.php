<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS studentdetails";
if ($conn->query($sql) === TRUE) {
    echo "Database 'studentdetails' created successfully.<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select database
$conn->select_db("studentdetails");

// Create table
$table_sql = "CREATE TABLE IF NOT EXISTS students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  register_number VARCHAR(50) NOT NULL,
  uploaded_from VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
    echo "Table 'students' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
