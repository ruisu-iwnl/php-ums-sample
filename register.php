<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysql_real_escape_string($_POST['first_name']);
    $last_name = mysql_real_escape_string($_POST['last_name']);
    $email = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string($_POST['password']);
    
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
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form method="POST" action="">
        <div>
            <label>First Name:</label>
            <input type="text" name="first_name" required>
        </div>
        <div>
            <label>Last Name:</label>
            <input type="text" name="last_name" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <input type="submit" value="Register">
        </div>
    </form>
</body>
</html> 