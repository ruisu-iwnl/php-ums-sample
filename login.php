<?php
session_start();
require_once 'db_connect.php';

if (isset($_SESSION['user_id'])) {
    header("Location: list.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string($_POST['password']);
    $hashed_password = md5($password);
    
    // Get user data
    $query = "SELECT u.id, u.first_name, u.last_name 
              FROM users u 
              JOIN user_passwords p ON u.id = p.user_id 
              WHERE u.email = '$email' AND p.password = '$hashed_password'";
    
    $result = mysql_query($query);
    
    if (mysql_num_rows($result) == 1) {
        $user = mysql_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
        header("Location: list.php");
        exit();
    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="POST" action="">
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
</body>
</html> 