<?php
	include 'includes/session.php';
	$id = $_GET['id'];
	
	$conn = $pdo->open();
	
	try{
		$stmt = $conn->prepare("DELETE FROM announcements WHERE id=:id");
		$stmt->execute(['id'=>$id]);

		$_SESSION['success'] = 'Product deleted successfully';
	}
	catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
	}

	$pdo->close();

	header('location: distributor_announcements.php');
?>