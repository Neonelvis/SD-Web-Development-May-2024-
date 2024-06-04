<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Form</h2>

    <form action="process.php" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required> <br><br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required> <br><br>

        <label for="message">Message</label>
        <textarea name="message" id="message" required></textarea> <br><br>

        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>

form