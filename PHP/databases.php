<?php 

    // Database connection details
    $hostname = "localhost";
    $username = "root"; 
    $password = "";
    $dbname = "crud_db";

    // create connection to the database 
    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    // check if the connection is successful 
    if (mysqli_connect_errno()) {
        die("Connection Failed!" . mysqli_connect_error());
    }

    // CRUD functions/operations 

    // create (INSERT)
    function createUser($conn, $name, $email) {
        $query = "INSERT INTO user (name, email) VALUES ('$name', '$name)";

        if (mysqli_query($conn, $query)) {
            echo "New User Created Successfully!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }

    // Read (SELECT)
    function readUsers($conn) {
        $query = "SELECT * FROM user";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
            echo "</table>";

            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>
                    <a href='?action=update&id=" . $row['id'] . "'>Update</a>
                    <a href='?action=update&id=" . $row['id'] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "No Data Found. Try again later!";
        }
    }

    // Update (UPDATE)
    function updateUser($conn, $id, $name, $email) {
        $query = "UPDATE user SET name = '$name', email = '$email' WHERE id = '$id'";

        if (mysqli_query($conn, $query) === TRUE) {
            echo "User Updated Successfully!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
    // Delete (DELETE)
    function deleteUser($conn, $id) {
        $query = "DELETE FROM user WHERE id = '$id'";

        if (mysqli_query($conn, $query) === TRUE) {
            echo "User Deleted Successfully!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
    // Handle Actions

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $action = $_POST["action"];
        $id = $_POST["id"] ? $_POST["id"] : null;
        $name = $_POST["name"];
        $email = $_POST["email"];

        switch ($action) {
            case 'create':
                createUser($conn, $name, $email );
                break;
            case 'update':
                updateUser($conn, $id, $name, $email );
                break;
            case 'delete':
                deleteUser( $conn, $name);
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
            if ($_GET['action'] && $_GET['action'] === 'update') {
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
    <input type="hidden" name="action"  value="<?php echo (isset($row['action'])  && $_GET['action'] === 'update') ? 'Update' : 'Create'; ?>"> <br>
    Name: <input type="text" name="name" required value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>"> <br>
    Email: <input type="email" name="email" required value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>"> <br>
    <input type="submit" value="<?php echo (isset($row['action'])  && $_GET['action'] === 'update') ? 'Update' : 'Create'; ?>">
    </form>

</body>
</html>