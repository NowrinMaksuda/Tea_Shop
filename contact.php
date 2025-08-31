<?php
include 'config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    if(empty($name) || empty($email) || empty($message)){
        echo "সব ফিল্ড পূরণ করুন।";
        exit;
    }

    $sql = "INSERT INTO contacts (name,email,message) VALUES ('$name','$email','$message')";
    if($conn->query($sql)){
        echo "ধন্যবাদ $name! আপনার মেসেজ আমাদের কাছে পৌঁছেছে।";
    } else {
        echo "দুঃখিত, কিছু সমস্যা হয়েছে।";
    }
}
?>
