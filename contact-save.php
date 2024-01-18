<?php
session_start();

if (isset($_SESSION['user'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $user_id = $_POST['user_id'];

    include 'db.php';
    $q = "insert into contact values ('','$name','$email','$subject','$message','$user_id')";
    $res = mysqli_query($conn, $q);

    if ($conn) {
        echo "<script>alert('Message successfully sent.');window.location='contact.php';</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
    
}

echo "<script>alert('You have no account ,Login please');window.location='login.php';</script>"; 
   
?>