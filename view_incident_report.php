<!DOCTYPE html>
<html>
<head>
    <title>View Incident Report</title>
    <link rel="stylesheet" type="text/css" href="view_incident_report.css">
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
    <h2>Incident Report Details</h2>

    <?php
    include 'connect.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $incident_id = $_GET["id"];

        // Retrieve incident report details
        $sql_incident = "SELECT * FROM incident_reports WHERE id='$incident_id'";
        $result_incident = $conn->query($sql_incident);

        if ($result_incident->num_rows == 1) {
            $incident = $result_incident->fetch_assoc();
            echo "<p>Date: " . $incident["date"] . "</p>";
            echo "<p>Details: " . $incident["details"] . "</p>";
            echo "<p>Level of Violation: " . $incident["level_of_violation"] . "</p>";

            // Retrieve violation type
            $violation_type_id = $incident["violation_type_id"];
            $sql_violation_type = "SELECT * FROM violation_types WHERE id='$violation_type_id'";
            $result_violation_type = $conn->query($sql_violation_type);
            $violation_type = $result_violation_type->fetch_assoc();
            echo "<p>Type of Violation: " . $violation_type["name"] . "</p>";

            // Edit button
            echo "<button><a href='edit_incident_report.php?id=" . $incident["id"] . "'>Edit</a></button>";
        } else {
            echo "<p>Incident report not found</p>";
        }
    } else {
        echo "<p>Invalid request</p>";
    }

    $conn->close();
    ?>
    <button onclick="goBack()">Go Back</button>

    <script>
    function goBack() {
        window.history.back();
    }
    </script>
        <footer>
        <p>&copy; <?php echo date("Y"); ?> Your School Name. All Rights Reserved.</p>
    </footer>
</body>
</html>
