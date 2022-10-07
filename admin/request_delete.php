<?php
	include 'includes/session.php';

	if(isset($_POST['remove'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare(" DELETE FROM  distributorid WHERE id=:id");
      
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'User deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select user to delete first';
	}

	header('location: users1.php');
	
?>