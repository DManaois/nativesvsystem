<!DOCTYPE html>
<html>
<head>
    <title>Add Incident Report</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Add Incident Report</h2>
    <?php
    include 'connect.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $student_id = $_GET["id"];
        ?>
        <form action='add_incident_report.php' method='post'>
            <label>Date:</label><br>
            <input type='date' name='date' required><br><br>
            <label>Details:</label><br>
            <textarea name='details' required></textarea><br><br>
            <label>Level of Violation/ Disciplinary Actions:</label><br>
            <select name='level_of_violation' required>
                <option value='Detention'>Detention</option>
                <option value='Sending a student to the principal's office'>Sending a student to the principal's office</option>
                <option value='Reprimand'>Reprimand</option>
                <option value='Warning'>Warnings</option>
                <option value='Suspension'>Suspensions</option>
                <option value='Interim suspension'>Interim suspension</option>
                <option value='Expulsion'>Expulsions</option>
            </select><br><br>
            <label>Intervention Programs:</label><br>
            <select name='intervention_program' required>
                <option value='Counseling Sessions'>Counseling Sessions</option>
                <option value='Behavior Modification Workshops'>Behavior Modification Workshops</option>
                <option value='Academic Support Programs'>Academic Support Programs</option>
                <option value='Peer Mediation Programs'>Peer Mediation Programs</option>
                <option value='Restorative Justice Practices'>Restorative Justice Practices</option>
                <option value='Community Service Assignments'>Community Service Assignments</option>
                <option value='Parent-Teacher Conferences'>Parent-Teacher Conferences</option>
                <option value='Anger Management Training'>Anger Management Training</option>
                <option value='Substance Abuse Counseling'>Substance Abuse Counseling</option>
                <option value='Conflict Resolution Training'>Conflict Resolution Training</option>
            </select><br><br>
            <label>Type of Violation:</label><br>
            <select name='violation_type_id' required>
                <?php
                // Output options for violation types
                $sql_violation_types = "SELECT * FROM violation_types";
                $result_violation_types = $conn->query($sql_violation_types);
                while ($violation_type = $result_violation_types->fetch_assoc()) {
                    echo "<option value='" . $violation_type["id"] . "'>" . $violation_type["name"] . "</option>";
                }
                ?>
            </select><br><br>
            <input type='hidden' name='student_id' value='<?php echo $student_id; ?>'>
            <input type='submit' value='Add'>
        </form>
    <?php
    } else {
        echo "<p>Invalid request</p>";
    }

    $conn->close();
    ?>
</body>
</html>
