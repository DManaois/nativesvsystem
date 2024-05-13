<?php
include 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $details = $_POST["details"];
    $level_of_violation = $_POST["level_of_violation"];
    $intervention_program = $_POST["intervention_program"];
    $violation_type_id = $_POST["violation_type_id"];
    $student_id = $_POST["student_id"];

    $sql = "INSERT INTO incident_reports (date, details, level_of_violation, intervention_program, violation_type_id, student_id) VALUES ('$date', '$details', '$level_of_violation', '$intervention_program', '$violation_type_id', '$student_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Incident report added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
