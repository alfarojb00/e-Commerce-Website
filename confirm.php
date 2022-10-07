<?php
include 'includes/conn.php';

$email =  $_POST['email'];


$conn = $pdo->open();

$stmt = $conn->prepare("UPDATE `users` SET `isVerified`= 1 WHERE email = :email");

$stmt->execute([':email'=>$email]);

if($stmt!=false){
    header('location:confirmed.php',true);
    exit();
}
