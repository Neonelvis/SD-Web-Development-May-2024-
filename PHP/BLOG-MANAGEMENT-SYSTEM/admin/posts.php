<?php
session_start();
require_once '../includes/db.php';

// Check if the user is logged in and has admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

$sql = "SELECT p.*, u.username, c.name AS category 
        FROM posts p
        JOIN users u ON p.user_id = u.id
        JOIN categories c ON p.category_id = c.id
        ORDER BY p.created_at DESC";
$result = $conn->query($sql);
?>

<?php include '../includes/header.php'; ?>

<div class="container mt-5">
    <h1>Posts Management</h1>
    <a href="add-post.php" class="btn btn-primary mb-3">Add New Post</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['title'] . '</td>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['category'] . '</td>';
                    echo '<td>' . $row['created_at'] . '</td>';
                    echo '<td>';
                    echo '<a href="edit-post.php?id=' . $row['id'] . '" class="btn btn-sm btn-primary mr-2">Edit</a>';
                    echo '<a href="delete-post.php?id=' . $row['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this post?\')">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5">No posts found.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>