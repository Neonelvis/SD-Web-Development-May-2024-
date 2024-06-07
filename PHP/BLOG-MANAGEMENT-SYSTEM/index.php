<?php

    session_start();

    require_once 'includes/db.php';

    $sql = "SELECT p.*, u.username, c.name AS category 
            FROM posts p 
            JOIN users u ON p.user_id = u.id 
            JOIN categories c ON p.category_id = c.id 
            ORDER BY p.created_at DESC 
    ";

    $result = $conn->query($sql);
?>

<?php include 'includes/header.php'?>



<div class="container mt-5">
    <h1>Recent Blog Posts</h1>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card mb-4">';
            echo '<div class="card-body">';
            echo '<h2 class="card-title"><a href="single-post.php?id=' . $row['id'] . '">' . $row['title'] . '</a></h2>';
            echo '<p class="card-text">' . substr($row['content'], 0, 200) . '...</p>';
            echo '<p class="card-text"><small class="text-muted">Posted by ' . $row['username'] . ' in ' . $row['category'] . ' on ' . $row['created_at'] . '</small></p>';
            echo '<a href="single-post.php?id=' . $row['id'] . '" class="btn btn-primary">Read More</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No blog posts found.</p>';
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>