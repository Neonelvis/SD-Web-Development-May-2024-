<?php
session_start();
require_once '../includes/db.php';

// Check if the user is logged in and has admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

// Fetch statistics data from the database
$sql = "SELECT COUNT(*) AS total_posts FROM posts";
$result = $conn->query($sql);
$totalPosts = $result->fetch_assoc()['total_posts'];

$sql = "SELECT COUNT(*) AS total_categories FROM categories";
$result = $conn->query($sql);
$totalCategories = $result->fetch_assoc()['total_categories'];

$sql = "SELECT COUNT(*) AS total_comments FROM comments";
$result = $conn->query($sql);
$totalComments = $result->fetch_assoc()['total_comments'];

$sql = "SELECT COUNT(*) AS total_users FROM users";
$result = $conn->query($sql);
$totalUsers = $result->fetch_assoc()['total_users'];
?>

<?php include '../includes/header.php'; ?>

<div class="container mt-5">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Posts</h5>
                    <p class="card-text"><?php echo $totalPosts; ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Categories</h5>
                    <p class="card-text"><?php echo $totalCategories; ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Comments</h5>
                    <p class="card-text"><?php echo $totalComments; ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text"><?php echo $totalUsers; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>