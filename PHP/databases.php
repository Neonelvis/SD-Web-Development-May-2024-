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
        echo "<div class='success-message'>New record created successfully.</div>";
    } else {
        echo "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
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
                <a href='?action=update&id=" . $row['id'] . "' class='update-link'>Update</a>
                <a href='?action=delete&id=" . $row['id'] . "' class='delete-link' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
            </td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<div class='info-message'>No data found.</div>";
    }
}

// Update
function updateUser($conn, $id, $name, $email)
{
    $sql = "UPDATE user SET name='$name', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-message'>Record updated successfully.</div>";
    } else {
        echo "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Delete
function deleteUser($conn, $id)
{
    $sql = "DELETE FROM user WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-message'>Record deleted successfully.</div>";
    } else {
        echo "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Handle actions
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    switch ($action) {
        case 'delete':
            deleteUser($conn, $id);
            break;
    }
}

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
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD with PHP and MySQL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        h2 {
            color: #555;
            margin-bottom: 10px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .update-link, .delete-link {
            color: #4CAF50;
            text-decoration: none;
            margin-right: 10px;
        }

        .delete-link {
            color: #f44336;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .info-message {
            background-color: #d1ecf1;
            color: #0c5460;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>CRUD with PHP and MySQL</h1>

    <h2>User Data</h2>
    <?php readUsers($conn); ?>

    <h2>
        <?php
        if (isset($_GET['action']) && $_GET['action'] === 'update') {
            $id = $_GET['id'];
            $sql = "SELECT * FROM user WHERE id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "Update User";
            } else {
                echo "User not found.";
            }
        } else {
            echo "Create New User";
        }
        ?>
    </h2>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="action" value="<?php echo (isset($_GET['action']) && $_GET['action'] === 'update') ? 'update' : 'create'; ?>">
        <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>" required>
        <label for="email">Email:</label>
    </form>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>