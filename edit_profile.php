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
    <h1>Edit Profile</h1>
    <?php
    session_start();
    include 'connect.php';

    if(isset($_SESSION['id'])) {
        $student_id = $_SESSION['id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["password"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            // Update student's email and password in the database
            $sql_update = "UPDATE users SET email='$email', password='$password' WHERE id='$student_id'";
            if ($conn->query($sql_update) === TRUE) {
                echo "<p>Profile updated successfully</p>";
            } else {
                echo "<p>Error updating profile: " . $conn->error . "</p>";
            }
        }
    } else {
        echo "<p>Unauthorized access</p>";
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Update Profile">
    </form>
    <button><a href="student_dashboard.php">Back to Dashboard</a></button>


    <footer>
        <p>&copy; <?php echo date("Y"); ?> Your School Name. All Rights Reserved.</p>
    </footer>
</body>
</html>
