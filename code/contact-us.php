<?php
include("../admin/code/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Insert into database - using the correct table and field order
    $sql = "INSERT INTO contact_us (name, subject, email, message) 
            VALUES ('$name', '$subject', '$email', '$message')";
    
    if (mysqli_query($con, $sql)) {
        header("location:../contact.php?msg=success");
    } else {
        header("location:../contact.php?msg=error");
    }
} else {
    header("location:../contact.php");
}
?>