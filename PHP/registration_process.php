<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // get form data 
    $username = sanitize_input($_POST['username']);
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']); 
    $confirm_password = sanitize_input($_POST['confirm_password']);

    // validate input 
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "All fields are required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
    } else if ($password != $confirm_password) {
        echo "Passwords do not match!";
    } else {
        // process the form data 
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // store the user data in a database or process it further 
        echo "Username: " . $username . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Password: " . $hashed_password ."<br>";
    }
}

// create a helper method to sanitize the form data 
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}