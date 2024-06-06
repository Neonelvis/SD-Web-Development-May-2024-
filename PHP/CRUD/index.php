<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>CRUD App</h1>

        <a href="create.php" class="btn btn-primary mb-3">Create New</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // db params 
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "crud_db";

                    // connect to db 
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // check if connection is okay 
                    if ($conn->connect_error) {
                        die("Connection Failed: " . $conn->connect_error);
                    }

                    // create a sql query to get all users from the db 
                    $sql = "SELECT id, name, email FROM user";
                    $result = $conn->query($sql);

                    // check if any result 
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>";
                            echo "<a href='update.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm mr-2'>Update</a>";
                            echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm mr-2'>Delete</a>";
                            echo "</td>";
                            echo "</tr>"; 
                        }
                    } else {
                        echo "<tr><td>No Records Found</td></tr>"; 
                    }

                    // close db connection 
                    $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>