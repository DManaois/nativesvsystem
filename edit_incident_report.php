<!DOCTYPE html>
<html>
<head>
    <title>Edit Incident Report</title>
    <link rel="stylesheet" type="text/css" href="edit_incident_report.css">
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
    <h2>Edit Incident Report</h2>

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
            ?>
            <form action='update_incident_report.php' method='post'>
                <input type='hidden' name='id' value='<?php echo $incident_id; ?>'>
                <label>Date:</label><br>
                <input type='date' name='date' value='<?php echo $incident["date"]; ?>' required><br><br>
                <label>Details:</label><br>
                <textarea name='details' required><?php echo $incident["details"]; ?></textarea><br><br>
                <label>Level of Violation/ Disciplinary Actions:</label><br>
                <select name='level_of_violation' required>
                    <option value='Detention' <?php if ($incident["level_of_violation"] == "Detention") echo "selected"; ?>>Detention</option>
                    <option value='Sending a student to the principal's office' <?php if ($incident["level_of_violation"] == "Sending a student to the principal's office") echo "selected"; ?>>Sending a student to the principal's office</option>
                    <option value='Reprimand' <?php if ($incident["level_of_violation"] == "Reprimand") echo "selected"; ?>>Reprimand</option>
                    <option value='Warning' <?php if ($incident["level_of_violation"] == "Warnings") echo "selected"; ?>>Warnings</option>
                    <option value='Suspension' <?php if ($incident["level_of_violation"] == "Suspensions") echo "selected"; ?>>Suspensions</option>
                    <option value='Interim suspension' <?php if ($incident["level_of_violation"] == "Interim suspension") echo "selected"; ?>>Interim suspension</option>
                    <option value='Expulsion' <?php if ($incident["level_of_violation"] == "Expulsions") echo "selected"; ?>>Expulsions</option>
                </select><br><br>
                <label>Type of Violation:</label><br>
                <select name='violation_type_id' required>
                    <?php
                    // Output options for violation types
                    $sql_violation_types = "SELECT * FROM violation_types";
                    $result_violation_types = $conn->query($sql_violation_types);
                    while ($violation_type = $result_violation_types->fetch_assoc()) {
                        $selected = ($violation_type["id"] == $incident["violation_type_id"]) ? "selected" : "";
                        echo "<option value='" . $violation_type["id"] . "' $selected>" . $violation_type["name"] . "</option>";
                    }
                    ?>
                </select><br><br>
                <input type='submit' value='Update'>
            </form>
            <?php
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
