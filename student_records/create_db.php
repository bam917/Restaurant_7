<?php
// Enable error reporting for development
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
$conn = mysqli_connect("localhost", "root", "", "");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the database
$sql = "CREATE DATABASE IF NOT EXISTS school_db";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully.<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

// Select the database
mysqli_select_db($conn, "school_db");

// Create the students table
$tableSql = "CREATE TABLE IF NOT EXISTS students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    last_name VARCHAR(50) NOT NULL
)";

if (mysqli_query($conn, $tableSql)) {
    echo "Table created successfully.<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
}

// Insert sample data
$dataSql = "INSERT IGNORE INTO students (last_name)
VALUES 
('Doe'),
('Smith'),
('Johnson'),
('Brown'),
('White')";

if (mysqli_query($conn, $dataSql)) {
    echo "Sample data inserted successfully.<br>";
} else {
    echo "Error inserting data: " . mysqli_error($conn) . "<br>";
}

// Close connection
mysqli_close($conn);
?>
