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
$sql = "CREATE DATABASE IF NOT EXISTS output_db";
if ($conn->query($sql) === TRUE) {
    echo "Database 'output_db' created successfully.<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select the database
$conn->select_db("output_db");

echo "Selected 'output_db'.<br><br>";

// -------- Create Room Tables (201 to 210) ---------

for ($room = 201; $room <= 210; $room++) {
    
    $table_name = "room_" . $room;

    $table_sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id INT AUTO_INCREMENT PRIMARY KEY,
        L3 VARCHAR(50),
        R3 VARCHAR(50),
        L2 VARCHAR(50),
        R2 VARCHAR(50),
        L1 VARCHAR(50),
        R1 VARCHAR(50)
    )";

    if ($conn->query($table_sql) === TRUE) {
        echo "Table '$table_name' created successfully.<br>";
    } else {
        echo "Error creating table '$table_name': " . $conn->error . "<br>";
    }
}

echo "<br>Room tables created successfully.<br><br>";

// -------- Create Audit Table ---------

$audit_sql = "CREATE TABLE IF NOT EXISTS allocation_runs (
    run_id INT AUTO_INCREMENT PRIMARY KEY,
    run_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    rooms_used INT,
    total_students INT,
    conflicts_resolved INT,
    status ENUM('pending','success','failed') DEFAULT 'pending',
    notes TEXT
)";

if ($conn->query($audit_sql) === TRUE) {
    echo "Audit table 'allocation_runs' created successfully.<br>";
} else {
    echo "Error creating audit table: " . $conn->error;
}

$conn->close();
?>
