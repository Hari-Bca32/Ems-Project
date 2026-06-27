<?php
session_start();
require_once('dbh.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['mailuid']);
    $password = $_POST['pwd'];

    // Check database connection
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Fetch user data
    $stmt = $conn->prepare("SELECT id, email, password FROM alogin WHERE email = ?");
    if (!$stmt) {
        die("Query preparation failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $db_email, $db_password);
        $stmt->fetch();

        // Verify the hashed password
        if (password_verify($password, $db_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $db_email;
            header("Location: ../aloginwel.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password! Try again.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('No user found with this email! Check your input.'); window.history.back();</script>";
    }

    $stmt->close();
}
?>
