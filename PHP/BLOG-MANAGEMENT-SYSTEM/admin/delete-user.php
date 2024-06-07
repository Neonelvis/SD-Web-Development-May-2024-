<?php
session_start();
require_once '../includes/db.php';

// Check if the user is logged in and has admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Delete the user from the database
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        // User deleted successfully
        header("Location: users.php");
        exit();
    } else {
        // Error deleting user
        echo "Error: " . $stmt->error;
    }
} else {
    // User ID not provided
    header("Location: users.php");
    exit();
}
?>