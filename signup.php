<?php
session_start();
if (isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
if (isset($_POST["signup"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phone_number = $_POST["phone_number"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    if ($password != $confirm_password) {
        $error = "Password and confirm password do not match.";
    } else {
        $conn = mysqli_connect("localhost", "root", "", "php_webshop_database");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (name, email, address, phone_number, password) VALUES ('$name','$email', '$address', '$phone_number', '$password')";
        mysqli_query($conn, $query);
        header("Location: login.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="address" name="address" placeholder="Address" required>
        <input type="phone_number" name="phone_number" placeholder="Phone Number" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit" name="signup">Sign Up</button>
    </form>
</body>
</html>
