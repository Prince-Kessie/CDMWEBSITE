<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'churchdb';

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to select data from a table
$sql = "SELECT * FROM partnership";

// Execute the query
$result = mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);
?>
