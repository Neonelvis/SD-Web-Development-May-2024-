<?php 

// GET method

// if ($_SERVER['REQUEST_METHOD'] == "GET") {
//     // check if the name parameter is set 
//     if (isset($_GET['name'])) {
//         $user_name = htmlspecialchars($_GET['name']);
//         echo "Hello, $user_name ! <br>";
//     } else {
//         echo "Name is not set <br>!";
//     }
// }

// // POST Method 
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // check if the name parameter is set 
//     if (isset($_POST["name"])) {
//         $user_name = htmlspecialchars($_POST["name"]);
//         echo "Hello, $user_name ! <br>";
//     } else {
//         echo "Name is not set! <br>";
//     }
// }

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     if (isset($_POST["name"])) {
//         $name = htmlspecialchars(trim($_POST["name"]));
//         if (!empty($name)) {
//             echo "Hello, $name! <br>";
//         } else {
//             echo "Name cannot be empty! <br>";
//         }
//     } else {
//         echo "Name is not set!";
//     }
// }


// contact form processing 
if ($_SERVER['REQUEST_METHOD'] ==='POST') {
    // Get and sanitize the form inputs
    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $message = sanitize_input($_POST['message']);

    // send the form data via email or store in a db 
    $to = "projects.computerpride@gmail.com";
    $subject = "New Contact Form Submission";
    $body = "Name: " . $name . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Message: " . $message . "\n";

    // save the message in the db

    if (mail($to, $subject, $body)) {
        echo "Thank You For Your Message";
    } else {
        echo "There was an error sending your message. Please try again later!";
    }
}

//create a helper method to sanitize the form data 
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}