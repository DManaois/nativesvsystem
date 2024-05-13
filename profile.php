<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="student_dashboard.css">
</head>
<body>
    <ul>
        <li><a href="#about">About</a></li>
        <li><a href="profile.php">My Profile</a></li>
        <li><a href="#violations">Violations</a></li>
        <li><a href="#policy">Policy</a></li>
        <li><a href="#intervention">Intervention Programs</a></li>
        <li><a href="#incident">Incident Report</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <?php
    session_start();
    include 'connect.php';

    if(isset($_SESSION['id'])) {
        $student_id = $_SESSION['id'];
        $sql_student = "SELECT * FROM users WHERE id='$student_id' AND role='student'";
        $result_student = $conn->query($sql_student);

        if ($result_student->num_rows == 1) {
            $student = $result_student->fetch_assoc();
            echo "<h1>Welcome, " . $student["name"] . "</h1>";
            echo "<h2>Student Details</h2>";
            echo "<p>Email: " . $student["email"] . "</p>";
            echo "<button><a href='edit_profile.php'>Edit Profile</a></button>";

            $sql_incident = "SELECT * FROM incident_reports WHERE student_id='$student_id'";
            $result_incident = $conn->query($sql_incident);
            if ($result_incident->num_rows > 0) {
                echo "<h3>Incident Reports:</h3>";
                while ($incident = $result_incident->fetch_assoc()) {
                    echo "<p>Date: " . $incident["date"] . "</p>";
                    echo "<p>Level of Violation: " . $incident["level_of_violation"] . "</p>";
                    echo "<button><a href='student_view_incident_report.php?id=" . $incident["id"] . "'>View Details</a></button>";
                    echo "<br>"; // Add a line break for better separation
                }
            } else {
                echo "<p>No incident reports found</p>";
            }
        } else {
            echo "<p>Student not found</p>";
        }
    } else {
        echo "<p>Unauthorized access</p>";
    }
    ?>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Your School Name. All Rights Reserved.</p>
    </footer>
</body>
</html>
