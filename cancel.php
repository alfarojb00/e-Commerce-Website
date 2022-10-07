<?php
    include 'includes/session.php';
    $id = $_POST['userid'];
    $type= $_POST['accType'];
    if(isset($_POST['cancel'])){
        $conn = $pdo->open();
        $stmt = $conn->prepare("UPDATE `users` SET `id_verified`='',`apform_verified`='', `application_form`='' WHERE `id` = :id ");
        $stmt->execute(['id'=>$id]);  
        $pdo->close();
        if($accType=="distributor"){
            header('location:distributor_modal1.php',true);
        }else{
            header('location:resellerconn.php',true);
        }
        
    }

    
?>