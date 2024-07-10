<?php
include_once("templates/header.php");
include_once("templates/nav.php");
require_once("sql/db_connect.php");

if(isset($_POST["send_message"])){
    $fullname = mysqli_real_escape_string($conn, addslashes($_POST["fullname"]));
    $email = mysqli_real_escape_string($conn, addslashes($_POST["email_address"]));
    $subject_line = mysqli_real_escape_string($conn, addslashes($_POST["subject_line"]));
    $text_message = mysqli_real_escape_string($conn, addslashes($_POST["message"]));

    $insert_message = "INSERT INTO messages (sender_name, sender_email, subject_line, message) VALUES ('$fullname', '$email', '$subject_line', '$text_message')";
    
    if ($conn->query($insert_message) === TRUE) {
        header("Location: contact.php");
        exit();
    } else {
        echo "Error: " . $insert_message . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        h1 {
            color: black;
            text-transform: uppercase;
            text-decoration: wavy;
        }
        body {
            background-color: turquoise;
        }
    </style>
</head>
<body>
    <h1>Sign Up</h1>
    <form action="signup.php" method="post">
        <label for="Fn">Fullname:</label><br>
        <input type="text" id="Fn" name="fullname" placeholder="Fullname" required><br><br>
        <input type="text" name="gender" placeholder="Gender" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="email" name="email" placeholder="Email Address" required><br><br>
        <input type="number" name="form" placeholder="Form" required><br><br>
        <input type="text" name="school" placeholder="School" required><br><br>
        <input type="text" name="phone" placeholder="Phone Number" required><br><br>
        <input type="submit" class="button" value="Sign Up">
    </form>

    <?php include_once("templates/footer.php"); ?>
</body>
</html>