<?php
	include 'includes/session.php';

	$total_price = $_POST['total_price'];
	$delivery_address = $_POST['address'];
	$product_quantity = $_POST['quantity'];
	$product_name = $_POST['product_name'];
	$product_id = $_POST['product_id'];
	$reseller_id = $_POST['reseller_id'];
	$dist_id = $_POST['dist_id'];
	$order_date = date("Y/m/d");
	$status = "order placed";

	$conn = $pdo->open();

	$stmt = $conn->prepare("INSERT INTO reseller_orders (
		total_price,
		delivery_address,
		product_quantity,
		product_name,
		product_id,
		reseller_id,
		dist_id,
		order_date,
		status) VALUES (
		:total_price,
		:delivery_address,
		:product_quantity,
		:product_name,
		:product_id,
		:reseller_id,
		:dist_id,
		:order_date,
		:status
	)");

	$stmt->execute([
		'total_price'=>$total_price,
		'delivery_address'=>$delivery_address,
		'product_quantity'=>$product_quantity,
		'product_name'=>$product_name,
		'product_id'=>$product_id,
		'reseller_id'=>$reseller_id,
		'dist_id'=>$dist_id,
		'order_date'=>$order_date,
		'status'=>$status
	]);
	
	header('location: reseller_mypurchase.php?id='.$dist_id);

?>