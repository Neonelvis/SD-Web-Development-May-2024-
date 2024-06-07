<?php
session_start();
require_once '../includes/db.php';

// Check if the user is logged in and has admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];

    // Delete the category from the database
    $sql = "DELETE FROM categories WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $categoryId);

    if ($stmt->execute()) {
        // Category deleted successfully
        header("Location: categories.php");
        exit();
    } else {
        // Error deleting category
        echo "Error: " . $stmt->error;
    }
} else {
    // Category ID not provided
    header("Location: categories.php");
    exit();
}
?>