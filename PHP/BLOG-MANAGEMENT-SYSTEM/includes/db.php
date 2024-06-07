<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "blog_db";

// create a connection 
$conn = new mysqli($host, $username, $password, $dbname);  

// check the connection 
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}