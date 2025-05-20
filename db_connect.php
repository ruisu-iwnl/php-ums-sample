<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'loginmanagement';

$conn = mysql_connect($host, $username, $password);
if (!$conn) {
    die('could not connect: ' . mysql_error());
}

mysql_select_db($database, $conn);
?> 