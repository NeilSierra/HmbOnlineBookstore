<?php
    session_start();

    // Signup Submit
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["signup-submit"])) {
        if ($_POST["signup-password"] === $_POST["signup-confirm-password"]) {
            $_SESSION["user_id"] = $_POST["signup-email"];
            header("Location: home.php");
        } else {
            echo "<script>alert('Passwords does not match!');</script>";
        };
    };

    // To login page
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["to-login"])) {
        header("Location: login.php");
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMB - Sign Up Page</title>
</head>
<body>
    <!-- Signup -->
    <form action="" method="post">
        <p>Username</p>
        <input type="text" name="signup-username" id="signup-username" required>
        <br>
        <p>Email</p>
        <input type="email" name="signup-email" id="signup-email" required>
        <br>
        <p>Contact Number</p>
        <input type="number" name="signup-contact" id="signup-contact" required>
        <br>
        <p>Password</p>
        <input type="password" name="signup-password" id="signup-password" required>
        <br>
        <p>Confirm Password</p>
        <input type="password" name="signup-password" id="signup-confirm-password" required>
        <br>
        <button type="submit" name="signup-submit">Sign Up</button>
    </form>

    <!-- To login -->
    <form action="" method="post">
        <button type="submit" name="to-login">Log In</button>
    </form>
</body>
</html>