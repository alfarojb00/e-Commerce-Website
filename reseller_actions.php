<?php
	include 'includes/session.php';

	$distributor_id =  $_GET['id'];
	$reseller_id =  $user['id'];
	$reseller_name =  $user['firstname'] . " " . $user['lastname'];
	$approval = "0";

	$conn = $pdo->open();

	$stmt = $conn->prepare("INSERT INTO distributor_resellers (distributor_id, reseller_id, reseller_name, approval) VALUES (:distributor_id, :reseller_id, :reseller_name, :approval)");

	$stmt->execute(['distributor_id'=>$distributor_id, 'reseller_id'=>$reseller_id, 'reseller_name'=>$reseller_name, 'approval'=>$approval]);
	
	header('location: reseller_mydistributor.php');
?>