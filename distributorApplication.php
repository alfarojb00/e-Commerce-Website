<?php 
include 'includes/session.php';
	$conn = $pdo->open();
if (isset($_POST['submit'])) {
	$apform = $_FILES['file']['name'];
	$approved = 0;
	
	if(!empty($apform)){
		move_uploaded_file($_FILES['file']['tmp_name'], 'images/APPLICATION_FORMS/'.$apform);
		$filename = $apform;	
	}

	$stmt = $conn->prepare("UPDATE users
		SET application_form = :application_form,
			apform_verified = :apform_verified
		WHERE id=:id");
	$stmt->execute(['application_form'=>$apform, 'apform_verified'=>$approved, 'id'=>$user['id']]);

	$pdo->close();
	}
	header('location: distributor_modal1.php');

 include 'includes/scripts.php';
?>