<?php
session_start();
require_once 'includes/db.php';

if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    $sql = "SELECT p.*, u.username, c.name AS category 
            FROM posts p
            JOIN users u ON p.user_id = u.id
            JOIN categories c ON p.category_id = c.id
            WHERE p.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $post = $result->fetch_assoc();
    } else {
        // Post not found
        header("Location: index.php");
        exit();
    }
} else {
    // Post ID not provided
    header("Location: index.php");
    exit();
}
?>


<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title"><?php echo $post['title']; ?></h1>
            <p class="card-text"><small class="text-muted">Posted by <?php echo $post['username']; ?> in
                    <?php echo $post['category']; ?> on <?php echo $post['created_at']; ?></small></p>
            <hr>
            <p class="card-text"><?php echo $post['content']; ?></p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>