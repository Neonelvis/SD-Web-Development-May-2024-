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

    // Fetch the post from the database
    $sql = "SELECT * FROM posts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $post = $result->fetch_assoc();
    } else {
        // Post not found
        header("Location: posts.php");
        exit();
    }
} else {
    // Post ID not provided
    header("Location: posts.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];

    // Validate and sanitize user input
    // ...

    // Generate a unique slug for the post
    $slug = strtolower(str_replace(' ', '-', $title));

    // Update the post in the database
    $sql = "UPDATE posts SET title = ?, slug = ?, content = ?, category_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $title, $slug, $content, $category, $postId);

    if ($stmt->execute()) {
        // Post updated successfully
        header("Location: posts.php");
        exit();
    } else {
        // Error updating post
        echo "Error: " . $stmt->error;
    }
}

// Fetch categories from the database
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
$categories = $result->fetch_all(MYSQLI_ASSOC);
?>

<?php include '../includes/header.php'; ?>

<div class="container mt-5">
    <h1>Edit Post</h1>
    <form action="edit-post.php?id=<?php echo $postId; ?>" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $post['title']; ?>"
                required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="10"
                required><?php echo $post['content']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category" required>
                <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category['id']; ?>"
                    <?php if ($category['id'] === $post['category_id']) echo 'selected'; ?>>
                    <?php echo $category['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>