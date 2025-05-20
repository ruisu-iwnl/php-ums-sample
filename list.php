<?php
require_once 'session_check.php';
require_once 'db_connect.php';

$query = "SELECT id, first_name, last_name, email, created_at FROM users ORDER BY created_at DESC";
$result = mysql_query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h2>User List</h2>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>! 
       <a href="logout.php">Logout</a>
    </p>
    
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Registration Date</th>
        </tr>
        <?php while ($user = mysql_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['created_at']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html> 