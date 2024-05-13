<?php
include 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $incident_id = $_POST["id"];
    $date = $_POST["date"];
    $details = $_POST["details"];
    $level_of_violation = $_POST["level_of_violation"];
    $violation_type_id = $_POST["violation_type_id"];

    // Update incident report in the database
    $sql_update = "UPDATE incident_reports SET date='$date', details='$details', level_of_violation='$level_of_violation', violation_type_id='$violation_type_id' WHERE id='$incident_id'";
    if ($conn->query($sql_update) === TRUE) {
        echo "Incident report updated successfully";
    } else {
        echo "Error updating incident report: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
