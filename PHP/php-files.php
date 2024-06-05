<?php 

    // define the file path
    $file_path = "data.txt";

    // function to display the file contents 
    function displayFileContent($file_path) {
        if (file_exists($file_path)) {
            $file_content = file_get_contents($file_path);
            echo "<div class='file-content'><h2>File Content:</h2><pre>$file_content</pre></div>";
        } else {
            echo "<p class='error'>File does not exist</p>";
        }
    }

    // function to save contents to the file 
    function saveContentToFile($file_path, $content) {
        if (file_put_contents($file_path, $content)) {
            echo "<p class='success'>Content saved to the file successfully.</p>";
        } else {
            echo "<p class='error'>Error ocurred while saving content to the file.</p>";
        }
    }

    // check if the form is submitted 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $content = $_POST['content'];
        saveContentToFile($file_path, $content);
    }
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple File App</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 20px;
        }

        h1, h2 {
            color: #333;
        }

        .file-content {
            background-color: #f4f4f4;
            padding: 20px;
            border: 1px solid #ddd;
        }

        textarea {
            width: 100%;
            height: 150px;
            padding: 10px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Simple File App</h2>

    <?php displayFileContent($file_path);?>

    <h2>Enter Content</h2>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <textarea name="content" rows="5" cols="30"></textarea>
    <br>
    <input type="submit" value="Save Content">
    </form>
</body>
</html>