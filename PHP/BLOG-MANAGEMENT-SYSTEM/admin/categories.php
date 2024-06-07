<?php
session_start();
require_once '../includes/db.php';

// Check if the user is logged in and has admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    // Validate and sanitize user input
    // ...

    // Insert the category into the database
    $sql = "INSERT INTO categories (name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);

    if ($stmt->execute()) {
        // Category added successfully
        header("Location: categories.php");
        exit();
    } else {
        // Error adding category
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
    <h1>Categories Management</h1>
    <form action="categories.php" method="POST" class="mb-3">
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category) { ?>
            <tr>
                <td><?php echo $category['name']; ?></td>
                <td>
                    <a href="edit-category.php?id=<?php echo $category['id']; ?>"
                        class="btn btn-sm btn-primary mr-2">Edit</a>
                    <a href="delete-category.php?id=<?php echo $category['id']; ?>" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>