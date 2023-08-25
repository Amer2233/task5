<!DOCTYPE html>
<html>
<head>
    
    <title>Login_page</title>
    <link rel="stylesheet" type="text/css" href="css/stlye.css">
</head>

<body>
    
    <div class="container">
        <h2>Login</h2>
        <form action="process.php" method="post">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="login" value="Login">
        </form>
        <?php
session_start();
?>
        <!-- Display error message if set -->
        <?php if (isset($_SESSION['error'])) : 
            ?>
            <div class="error-message"><?php echo $_SESSION['error']; ?></div>
            <?php unset($_SESSION['error']); // Clear the error message ?>
        <?php endif; ?>

        <!-- Display success message if set -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="success-message"><?php echo $_SESSION['success']; ?></div>
            <?php unset($_SESSION['success']); // Clear the success message ?>
        <?php endif; ?>
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
</body>

</html>
