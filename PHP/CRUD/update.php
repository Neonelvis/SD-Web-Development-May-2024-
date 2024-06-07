<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
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

        $id = $_GET['id'];

        $sql = "SELECT name, email FROM user WHERE id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } 

    ?>
    <div class="container mt-5">
        <h1>Update Record</h1>

        <form action="update_record.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>