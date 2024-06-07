<?php
session_start();
require_once '../includes/db.php';

// Check if the user is logged in and has admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Delete the post from the database
    $sql = "DELETE FROM posts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $postId);

    if ($stmt->execute()) {
        // Post deleted successfully
        header("Location: posts.php");
        exit();
    } else {
        // Error deleting post
        echo "Error: " . $stmt->error;
    }
} else {
    // Post ID not provided
    header("Location: posts.php");
    exit();
}
?>