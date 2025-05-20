<?php
session_start();
require_once 'db_connect.php';

if (isset($_SESSION['user_id'])) {
    header("Location: list.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysql_real_escape_string($_POST['first_name']);
    $last_name = mysql_real_escape_string($_POST['last_name']);
    $email = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string($_POST['password']);
    
    $check_query = "SELECT id FROM users WHERE email = '$email'";
    $check_result = mysql_query($check_query);
    
    if (mysql_num_rows($check_result) > 0) {
        echo "Email already exists. Please use a different email address.";
    } else {
        $hashed_password = md5($password);
        
        $query = "INSERT INTO users (first_name, last_name, email) 
                  VALUES ('$first_name', '$last_name', '$email')";
        
        if (mysql_query($query)) {
            $user_id = mysql_insert_id();
            
            $query = "INSERT INTO user_passwords (user_id, password) 
                      VALUES ($user_id, '$hashed_password')";
            
            if (mysql_query($query)) {
                echo "Registration successful!";
            } else {
                echo "Error: " . mysql_error();
            }
        } else {
            echo "Error: " . mysql_error();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        body { font-family: Arial; max-width: 500px; margin: 20px auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        input[type="text"], input[type="email"], input[type="password"] { width: 100%; padding: 8px; }
        input[type="submit"] { background: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; }
        .links { margin-top: 20px; }
    </style>
</head>
<body>
    <h2>User Registration</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="first_name" required>
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="last_name" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Register">
        </div>
    </form>
    <div class="links">
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html> 