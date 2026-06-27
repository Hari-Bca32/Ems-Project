<?php
$servername = "localhost"; // Change if using a different host
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password (default is empty in XAMPP)
$database = "newems"; // Ensure this is correct

// Create Connection
$conn = new mysqli($servername, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
