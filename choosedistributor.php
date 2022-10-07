<?php

include 'includes/session.php'; 

$id = $_POST['distributorid'];
$userid = $_POST['userid'];
$name = $_POST['name'];

$query = "INSERT INTO `distributor_resellers`(`distributor_id`, `reseller_id`, `reseller_name`, `approval`) VALUES ('$id','$userid','$name','0')";


try {

    $result = $conn->query($query);

    
} catch (\Throwable $th) {
    throw $th;
}

if($result!=false){
    
    header('location:reseller_mydistributor.php',true);
    exit();
}

// $stmt = $conn->prepare("UPDATE users SET distributor_id =:distributor_id WHERE id=:id ");
// $stmt->execute(['distributor_id'=> 'id','id'=>$user['id']]);    


?>