<?php
session_start();
require_once '../includes/db.php';

// Check if the user is logged in and has admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
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

    // Insert the post into the database
    $sql = "INSERT INTO posts (title, slug, content, user_id, category_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $title, $slug, $content, $_SESSION['user_id'], $category);

    if ($stmt->execute()) {
        // Post added successfully
        header("Location: posts.php");
        exit();
    } else {
        // Error adding post
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
    <h1>Add New Post</h1>
    <form action="add-post.php" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category" required>
                <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Post</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>