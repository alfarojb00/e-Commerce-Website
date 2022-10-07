<?php
	include 'includes/session.php';

	if (isset($_POST['proceed_status'])) {
		$conn = $pdo->open();

		$product_id = $_POST['product_id'];
		$reseller_id = $_POST['reseller_id'];
		$status = "shipped out";

		$stmt = $conn->prepare("UPDATE reseller_orders
		SET status = :status
		WHERE reseller_id=:reseller_id
		AND product_id=:product_id");
		$stmt->execute(['status'=>$status, 'reseller_id'=>$reseller_id, 
			'product_id'=>$product_id ]);

		$pdo->close();
		header('location: distributor_resellerorder.php');
	}
	
	if (isset($_POST['confirm_received'])) {
		$conn = $pdo->open();
		
		$product_id = $_POST['product_id'];
		$reseller_id = $_POST['reseller_id'];
		$dist_id = $_POST['dist_id'];
		$status = "order received";

		$stmt = $conn->prepare("UPDATE reseller_orders
		SET status = :status
		WHERE reseller_id=:reseller_id
		AND product_id=:product_id");
		$stmt->execute(['status'=>$status, 'reseller_id'=>$reseller_id, 
			'product_id'=>$product_id ]);

		$pdo->close();
		header('location: reseller_mypurchase.php?id='.$dist_id);
	}

?>