<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin_dashboard.css">
</head>
<body>
    <header>
        <h1>Welcome, Admin!</h1>
    </header>
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
    <!-- Content sections for each navigation link -->
    <div class="content" id="about">
        <h2>About</h2>
        <p>Add your about content here</p>
    </div>
    <div class="content" id="students">
        <h2>Students</h2>
        <p>Add your students content here</p>
    </div>
    <div class="content" id="violations">
        <h2>Violations</h2>
        <p>Add your violations content here</p>
    </div>
    <div class="content" id="policy">
        <h2>Policy</h2>
        <p>Add your policy content here</p>
    </div>
    <div class="content" id="intervention">
        <h2>Intervention Programs</h2>
        <p>Add your intervention programs content here</p>
    </div>
    <div class="content" id="incident">
        <h2>Incident Report</h2>
        <p>Add your incident report content here</p>
    </div>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Your School Name. All Rights Reserved.</p>
    </footer>
</body>
</html>
