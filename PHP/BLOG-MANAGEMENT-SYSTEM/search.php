<?php
session_start();
require_once 'includes/db.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    $sql = "SELECT p.*, u.username, c.name AS category 
            FROM posts p
            JOIN users u ON p.user_id = u.id
            JOIN categories c ON p.category_id = c.id
            WHERE p.title LIKE ? OR p.content LIKE ?
            ORDER BY p.created_at DESC";
    $stmt = $conn->prepare($sql);
    $searchQuery = '%' . $query . '%';
    $stmt->bind_param("ss", $searchQuery, $searchQuery);
    $stmt->execute();
    $result = $stmt->get_result();
    $posts = $result->fetch_all(MYSQLI_ASSOC);
} else {
    // No search query provided
    header("Location: index.php");
    exit();
}
?>

<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <h1>Search Results for "<?php echo $query; ?>"</h1>
    <?php if (count($posts) > 0) { ?>
    <?php foreach ($posts as $post) { ?>
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title"><a
                    href="single-post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
            <p class="card-text"><?php echo substr($post['content'], 0, 200); ?>...</p>
            <p class="card-text"><small class="text-muted">Posted by <?php echo $post['username']; ?> in
                    <?php echo $post['category']; ?> on <?php echo $post['created_at']; ?></small></p>
            <a href="single-post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Read More</a>
        </div>
    </div>
    <?php } ?>
    <?php } else { ?>
    <p>No search results found.</p>
    <?php } ?>
</div>

<?php include 'includes/footer.php'; ?>