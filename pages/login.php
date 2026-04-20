<?php
    session_start();

    // Login submit
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login-submit"])) {
        $_SESSION["user_id"] = $_POST["login-email"];
        header("Location: home.php");
    };

    // To signup page
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["to-signup"])) {
        header("Location: signup.php");
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMB - Login Page</title>
</head>
<body>
    <!-- Login -->
    <form action="" method="post">
        <p>Email</p>
        <input type="email" name="login-email" id="login-email" required>
        <br>
        <p>Password</p>
        <input type="password" name="login-password" id="login-password" required>
        <br>
        <button type="submit" name="login-submit">Log In</button>
    </form>

    <!-- To signup -->
    <form action="" method="post">
        <button type="submit" name="to-signup">Sign Up</button>
    </form>
</body>
</html>