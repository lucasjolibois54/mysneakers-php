<?php
// Start session
session_start();

// Check if user is already logged in
if (isset($_SESSION['email'])) {
  header("Location: admin.php");
  exit();
}

// Check if user submitted the form
if (isset($_POST['login'])) {
  // Connect to database
  $conn = mysqli_connect("localhost", "username", "password", "php_webshop_database");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Get user input
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Query database to check if user exists
  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  // Check if query returned any result
  if (mysqli_num_rows($result) > 0) {
    // User exists, set session variables and cookies
    $row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $row['email'];
    $_SESSION['user_id'] = $row['user_id'];
    setcookie("user_id", $row['user_id'], time() + (86400 * 30), "/");
    setcookie("email", $row['email'], time() + (86400 * 30), "/");
    
    // Check if user is an admin
    if ($row['email'] == "admin@admin.com") {
      header("Location: admin.php");
    } else {
      header("Location: admin.php");
    }
    exit();
  } else {
    // Invalid login credentials
    $error = "Invalid login credentials.";
  }

  // Close database connection
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <?php
  // Display error message if there was an error
  if (isset($error)) {
    echo "<p>$error</p>";
  }
  ?>
  <form method="post">
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" name="login" value="Login">
  </form>
</body>
</html>
