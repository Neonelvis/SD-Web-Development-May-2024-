<?php 

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CRUD functions

// Create (Insert)
function createUser($conn, $name, $email)
{
    $sql = "INSERT INTO user (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Read (Select)
function readUsers($conn)
{
    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>
                <a href='?action=update&id=" . $row['id'] . "'>Update</a>
                <a href='?action=delete&id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
            </td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No data found.";
    }
}

// Update
function updateUser($conn, $id, $name, $email)
{
    $sql = "UPDATE user SET name='$name', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete
function deleteUser($conn, $id)
{
    $sql = "DELETE FROM user WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $name = $_POST['name'];
    $email = $_POST['email'];

    switch ($action) {
        case 'create':
            createUser($conn, $name, $email);
            break;
        case 'update':
            updateUser($conn, $id, $name, $email);
            break;
        case 'delete':
            deleteUser($conn, $id);
            break;
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CRUD with PHP and MySQL</h1>

    <?php readUsers($conn); ?>

    <h2>
        <?php
            if (isset($_GET['action']) && $_GET['action'] === 'update') {
                $id = $_GET['id'];
                $query = "SELECT * FROM user WHERE id = '$id'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo "Update User";
                } else {
                    echo "User not found";
                }
            } else {
                echo "Create User";
            }
        ?>
    </h2>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="action" value="<?php echo  (isset($_GET['action']) && $_GET['action'] === 'update') ? 'update' : 'create'; ?>">

        <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">

        Name: <input type="text" name="name" value="<?php echo isset($row['name']) ? $row['name'] : '' ?>"> 

        Email: <input type="email" name="email" value="<?php echo isset($row['email']) ? $row['email'] : '' ?>"> 

        <input type="submit" value="<?php echo (isset($_GET['action']) && $_GET['action'] === 'update') ? 'Update' : 'Create'; ?>">
    </form>

</body>
</html>