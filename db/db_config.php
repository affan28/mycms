<?php
// Database credentials
$db_host = 'localhost';
$db_name = 'myadmin_panel';
$db_user = 'root';
$db_pass = '';

// Create a new MySQLi object
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Connection successful, do something with the database...

// Close the connection
$conn->close();
?>
