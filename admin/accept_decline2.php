<?php
include 'includes/session.php';

$conn = $pdo->open();

if (isset($_POST['accept_id'])) {
	$user_id = $_POST['user_id'];
	$verified = 1;
	$stmt = $conn->prepare("UPDATE users
		SET id_verified = :id_verified
		WHERE id=:id");
	$stmt->execute(['id_verified'=>$verified, 'id'=>$user_id]);

	$pdo->close();
	}
	header('location: resellers.php');	


if (isset($_POST['accept_apform'])) {
	$user_id = $_POST['user_id'];
	$approved = 1;
	$stmt = $conn->prepare("UPDATE users
		SET apform_verified = :apform_verified
		WHERE id=:id");
	$stmt->execute(['apform_verified'=>$approved, 'id'=>$user_id]);

	$pdo->close();
	}
	header('location: resellers.php');

if (isset($_POST['user_paid'])) {
	$user_id = $_POST['user_id'];
	$paid = 1;
	$user_type = "Reseller";
	$stmt = $conn->prepare("UPDATE users
		SET paid = :paid,
			user_type = :user_type
		WHERE id=:id");
	$stmt->execute(['paid'=>$paid, 'user_type'=>$user_type, 'id'=>$user_id]);

	$pdo->close();
	}
	header('location: resellers.php');	
?>