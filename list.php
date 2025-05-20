<?php
require_once 'session_check.php';
require_once 'db_connect.php';


$users_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $users_per_page;


$total_query = "SELECT COUNT(*) as total FROM users";
$total_result = mysql_query($total_query);
$total_users = mysql_fetch_assoc($total_result)['total'];
$total_pages = ceil($total_users / $users_per_page);

$query = "SELECT id, first_name, last_name, email 
          FROM users 
          ORDER BY first_name ASC 
          LIMIT $offset, $users_per_page";
$result = mysql_query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <style>
        body { font-family: Arial; max-width: 800px; margin: 20px auto; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
        th { background: #f5f5f5; }
        .pagination { margin-top: 20px; }
        .pagination a { padding: 5px 10px; margin: 0 5px; text-decoration: none; border: 1px solid #ddd; }
        .pagination a:hover { background: #f5f5f5; }
        .welcome { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="welcome">
        <p>Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?>! 
           <a href="logout.php">Logout</a>
        </p>
    </div>
    
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <?php while ($user = mysql_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <div class="pagination">
        <?php if ($total_pages > 1): ?>
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>">Previous</a>
            <?php endif; ?>
            
            Page <?php echo $page; ?> of <?php echo $total_pages; ?>
            
            <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page + 1; ?>">Next</a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html> 