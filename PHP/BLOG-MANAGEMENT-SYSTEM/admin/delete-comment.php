<?php
session_start();
require_once '../includes/db.php';

// Check if the user is logged in and has admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

if (isset($_GET['id'])) {
    $commentId = $_GET['id'];

    // Delete the comment from the database
    $sql = "DELETE FROM comments WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $commentId);

    if ($stmt->execute()) {
        // Comment deleted successfully
        header("Location: comments.php");
        exit();
    } else {
        // Error deleting comment
        echo "Error: " . $stmt->error;
    }
} else {
    // Comment ID not provided
    header("Location: comments.php");
    exit();
}
?>