<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="dashboard-header">
            <h2>Welcome, <?php echo $user['username']; ?></h2>
            <a href="logout.php">Logout</a>
        </div>
        <div class="user-info">
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p><strong>Gender:</strong> <?php echo $user['gender']; ?></p>
        </div>
    </div>
</body>
</html>
