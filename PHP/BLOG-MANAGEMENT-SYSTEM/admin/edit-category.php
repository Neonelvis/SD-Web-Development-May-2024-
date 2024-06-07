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

    // Fetch the category from the database
    $sql = "SELECT * FROM categories WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $category = $result->fetch_assoc();
    } else {
        // Category not found
        header("Location: categories.php");
        exit();
    }
} else {
    // Category ID not provided
    header("Location: categories.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    // Validate and sanitize user input
    // ...

    // Update the category in the database
    $sql = "UPDATE categories SET name = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $name, $categoryId);

    if ($stmt->execute()) {
        // Category updated successfully
        header("Location: categories.php");
        exit();
    } else {
        // Error updating category
        echo "Error: " . $stmt->error;
    }
}
?>

<?php include '../includes/header.php'; ?>

<div class="container mt-5">
    <h1>Edit Category</h1>
    <form action="edit-category.php?id=<?php echo $categoryId; ?>" method="POST">
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $category['name']; ?>"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>