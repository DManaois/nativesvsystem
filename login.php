<?php
include 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve user from database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($password == $row["password"]) { // Assuming password is stored as plain text
            if ($row["role"] == "admin") {
                $_SESSION["id"] = $row["id"];
                $_SESSION["role"] = $row["role"];
                header("Location: admin_dashboard.php");
                
                exit();
            } elseif ($row["role"] == "student") {
                $_SESSION["id"] = $row["id"];
                $_SESSION["role"] = $row["role"];
                header("Location: student_dashboard.php");
                exit();
            } else {
                echo "Invalid role";
            }
        } else {
            echo "Invalid email or password";
        }
    } else {
        echo "Invalid email or password";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="register.php">Create Account</a></p>
</body>
</html>
