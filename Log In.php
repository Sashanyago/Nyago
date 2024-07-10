<?php
include_once("templates/header.php");
include_once("templates/nav.php");
require_once("sql/db_connect.php");

if (isset($_POST["login"])) {
    $email = mysqli_real_escape_string($conn, addslashes($_POST["email"]));
    $password = mysqli_real_escape_string($conn, addslashes($_POST["password"]));

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location: welcome.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <style>
        body {
            background-color: turquoise;
        }
        h1 {
            color: black;
            text-transform: uppercase;
            text-decoration: wavy;
        }
    </style>
</head>
<body>
    <h1>Log In</h1>
    <form action="login.php" method="post">
        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email" placeholder="Email Address" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" class="btn btn-default" name="login" value="Log In">
    </form>

    <?php include_once("templates/footer.php"); ?>
</body>
</html>