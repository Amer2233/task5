<?php
session_start();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    // Validate input fields
    $errors = [];
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    elseif (empty($email)) {
        $errors[] = "Email is required.";
    }
    elseif (empty($password)) {
        $errors[] = "Password is required.";
    }
    elseif (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    if (!empty($errors)) {
        $_SESSION['error'] = implode(" ", $errors);
        header("Location: register.php"); 
        exit();
    }

    // Load user data from JSON file
    $users = json_decode(file_get_contents('data/users.json'), true);

    // Check if email already exists
    foreach ($users as $user) {
        if ($user['email'] === $email) {
            $_SESSION['error'] = "Email already exists. Please login or use a different email.";
            header("Location: register.php"); 
            exit();
        }
    }

    //  registration
    $newUser = [
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'gender' => $gender
    ];
    $users[] = $newUser;
    file_put_contents('data/users.json', json_encode($users));

    $_SESSION['success'] = "Registration successful! You can now log in.";
    header("Location: login.php"); 
    exit();
} elseif (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validation input fields
    $errors = [];
    if (empty($email)) {
        $errors[] = "Email is required.";
    }
    elseif (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (!empty($errors)) {
        $_SESSION['error'] = implode(" ", $errors);
        header("Location: login.php"); 
        exit();
    }

    // Load user data from JSON file
    $users = json_decode(file_get_contents('data/users.json'), true);

    // Find the user by email
    $foundUser = null;
    foreach ($users as $user) {
        if ($user['email'] === $email) {
            $foundUser = $user;
            break;
        }
    }

    if ($foundUser !== null && $foundUser['password'] === $password) {
        $_SESSION['user'] = $foundUser;
        header('Location: dashboard.php'); 
        exit();
    } else {
        $_SESSION['error'] = "Username or password is incorrect.";
        header("Location: login.php"); 
        exit();
    }
}
?>
