<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <link rel="stylesheet" type="text/css" href="view_student.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="#about">About</a></li>
            <li><a href="listofstudents.php">Students</a></li>
            <li><a href="#violations">Violations</a></li>
            <li><a href="#policy">Policy</a></li>
            <li><a href="#intervention">Intervention Programs</a></li>
            <li><a href="#incident">Incident Report</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <h2>Student Details</h2>

    <?php
    include 'connect.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $student_id = $_GET["id"];

        // Retrieve student's information
        $sql_student = "SELECT * FROM users WHERE id='$student_id' AND role='student'";
        $result_student = $conn->query($sql_student);

        if ($result_student->num_rows == 1) {
            $student = $result_student->fetch_assoc();
            echo "<h3>Name: " . $student["name"] . "</h3>";
            echo "<p>Email: " . $student["email"] . "</p>";

            $sql_incident = "SELECT * FROM incident_reports WHERE student_id='$student_id'";
            $result_incident = $conn->query($sql_incident);
            if ($result_incident->num_rows > 0) {
                echo "<h4>Incident Reports:</h4>";
                while ($incident = $result_incident->fetch_assoc()) {
                    echo "<p>Date: " . $incident["date"] . "</p>";
                    echo "<p>Level of Violation: " . $incident["level_of_violation"] . "</p>";
                    echo "<button><a href='view_incident_report.php?id=" . $incident["id"] . "'>View Details</a></button>";
                    echo "<br>"; // Add a line break for better separation
                }
            } else {
                echo "<p>No incident reports found</p>";
            }


        } else {
            echo "<p>Student not found</p>";
        }
    } else {
        echo "<p>Invalid request</p>";
    }

    $conn->close();
    ?>
    <button><a href='incident_report.php?id=<?php echo $student_id; ?>'>Add Incident Report</a></button>
    <button><a href='listofstudents.php'>Back to Student List</a></button>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Your School Name. All Rights Reserved.</p>
    </footer>
</body>
</html>
