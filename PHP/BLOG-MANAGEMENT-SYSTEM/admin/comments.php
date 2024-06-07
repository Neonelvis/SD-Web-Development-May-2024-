<?php
session_start();
require_once '../includes/db.php';

// Check if the user is logged in and has admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

$sql = "SELECT c.*, p.title AS post_title, u.username 
        FROM comments c
        JOIN posts p ON c.post_id = p.id
        JOIN users u ON c.user_id = u.id
        ORDER BY c.created_at DESC";
$result = $conn->query($sql);
$comments = $result->fetch_all(MYSQLI_ASSOC);
?>

<?php include '../includes/header.php'; ?>

<div class="container mt-5">
    <h1>Comments Management</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Post</th>
                <th>Author</th>
                <th>Content</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $comment) { ?>
            <tr>
                <td><?php echo $comment['post_title']; ?></td>
                <td><?php echo $comment['username']; ?></td>
                <td><?php echo $comment['content']; ?></td>
                <td><?php echo $comment['created_at']; ?></td>
                <td>
                    <a href="delete-comment.php?id=<?php echo $comment['id']; ?>" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure you want to delete this comment?')">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>