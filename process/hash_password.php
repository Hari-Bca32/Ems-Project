<?php
require_once('dbh.php');

$new_password = "admin"; // Your actual admin password
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

$sql = "UPDATE alogin SET password='$hashed_password' WHERE email='admin'";

if ($conn->query($sql) === TRUE) {
    echo "Password updated successfully!";
} else {
    echo "Error updating password: " . $conn->error;
}

$conn->close();
?>
