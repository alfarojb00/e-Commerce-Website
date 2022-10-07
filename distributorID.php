<?php 
include 'includes/session.php';
	$conn = $pdo->open();
if (isset($_POST['submit'])) {
	$photo = $_FILES['photo']['name'];
	$province = $_POST['province'];
	$city = $_POST['city'];

	$verified = 0;
	
	if(!empty($photo)){
		move_uploaded_file($_FILES['photo']['tmp_name'], 'images/VALID_IDS/'.$photo);
		$filename = $photo;	
	}
	else{
		$filename = $user['photo'];
	}

	$stmt = $conn->prepare("UPDATE users
		SET dist_id = :dist_id,
			id_verified = :id_verified,
			province = :province,
			city = :city
		WHERE id=:id");
	$stmt->execute(['dist_id'=>$photo, 'id_verified'=>$verified, 
		'province'=>$province, 'city'=>$city, 'id'=>$user['id'] ]);

	$pdo->close();
	}
	header('location: distributor_modal1.php');

 include 'includes/scripts.php';
?>