<?php
	include 'includes/session.php';

	$reseller_id =  $_GET['id'];
	$approval = "1";

	$conn = $pdo->open();

	$stmt = $conn->prepare("UPDATE distributor_resellers
		SET approval = :approval
		WHERE reseller_id=:reseller_id");
	$stmt->execute(['approval'=>$approval, 'reseller_id'=>$reseller_id]);

	$pdo->close();
	header('location: distributor_resellerrequest.php');

?>