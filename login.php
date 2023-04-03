<?php
session_start();

if (isset($_SESSION["user_id"])) {
    // User is already logged in, redirect to index page
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle login form submission
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Sanitize the user input
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Connect to database and check if email and password match a user in the database
    $conn = mysqli_connect("localhost", "root", "", "php_webshop_database");
    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    if ($user && password_verify($password, $user["password"])) {
        // Set session variables
        $_SESSION["user_id"] = $user["id"];
        
        // Check if user is admin and redirect to appropriate page
        if ($user["email"] == "admin@admin.com") {
            header("Location: admin.php");
            exit;
        } else {
            header("Location: index.php");
            exit;
        }
    } else {
        // Invalid email or password
        $error = "Invalid email or password.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <br>
    <a href="signup.php">Sign up</a>
</body>
</html>
