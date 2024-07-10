<<?php
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

<div class="container my-4">
<li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
    <h1>Contact Us</h1>
    <p><img src="images/help.jpg" width="900" height="700" alt="Help Image"></p>
    <p>In case of any enquiries or need help signing up, feel free to contact us and we will be willing to help.<br>
       Call Us: +2547564321777<br>
       Email Address: saproache@gmail.com
    </p>
    
    <h2>Send Us a Message</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your full name" required>
        </div>
        <div class="mb-3">
            <label for="email_address" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Enter your email address" required>
        </div>
        <div class="mb-3">
            <label for="subject_line" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject_line" name="subject_line" placeholder="Enter the subject" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="send_message">Send Message</button>
    </form>
</div>

<?php include_once("templates/footer.php"); ?>