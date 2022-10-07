<?php
	include 'includes/session.php';
	$selected_shops = $_GET['id'];
	
	$conn = $pdo->open();
	
	try{
		$stmt = $conn->prepare("DELETE FROM distributor_shop WHERE selected_shops=:selected_shops");
		$stmt->execute(['selected_shops'=>$selected_shops]);

		$_SESSION['success'] = 'Product deleted successfully';
	}
	catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
	}

	$pdo->close();

	header('location: distributor_myshop.php');
?>