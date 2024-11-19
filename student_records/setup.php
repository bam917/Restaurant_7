<?php

    $conn = mysqli_connect("localhost", "root", "", "school_db");
    
    $studentId = $_POST['studentId'];
    $lastName = $_POST['lastName'];
    
    // Vulnerable SQL query - NO INPUT VALIDATION
    $query = "SELECT * FROM students WHERE student_id = '$studentId' AND last_name = '$lastName'";
    
    $result = mysqli_query($conn, $query);
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['student_id'] . " Name: " . $row['first_name'] . " " . $row['last_name'] . "
";
    }
    
    mysqli_close($conn);
?>