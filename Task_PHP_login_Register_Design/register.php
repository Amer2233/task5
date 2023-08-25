

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/stlye.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="process.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <div>
                Gender:
                <input type="radio" name="gender" value="male" id="male"><label for="male">Male</label>
                <input type="radio" name="gender" value="female" id="female"><label for="female">Female</label>
            </div>
            <input type="submit" name="register" value="Register">
        </form>
        <?php
session_start();
// Display error message if set
if (isset($_SESSION['error'])) {
    echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']); // Clear the error message
}
?>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
