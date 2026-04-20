<?php
    session_start();

    // Block unlogged users
    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
    }

    // Logout user
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["logout"])) {
        unset($_SESSION["user_id"]);
        header("Location: login.php");
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMB - Home Page</title>
</head>
<body>
    <!-- Display email -->
    <?php echo "<h1> {$_SESSION["user_id"]} </h1>" ?>

    <!-- Logout -->
    <form action="" method="post">
        <button type="submit" name="logout">Log Out</button>
    </form>
</body>
</html>