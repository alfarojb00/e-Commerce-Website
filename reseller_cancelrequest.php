<?php
	include 'includes/session.php';

	$reseller_id =  $_GET['id'];
	$conn = $pdo->open();
	
	try{
		$stmt = $conn->prepare("DELETE FROM distributor_resellers WHERE reseller_id=:reseller_id");
		$stmt->execute(['reseller_id'=>$reseller_id]);

	}
	catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
	}

	$pdo->close();

	header('location: reseller_mydistributor.php');
?>