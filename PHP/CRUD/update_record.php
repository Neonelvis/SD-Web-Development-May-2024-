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

    // get the input values from the form
    $id = $_POST["id"];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // create the insert query 
    $sql = "UPDATE user SET name='$name', email='$email' WHERE id=$id";

    // execute the query 
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); 
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // close the db connection 
    $conn->close();

