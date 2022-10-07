<?php
	include 'includes/session.php';

	$output = '';

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM category");
	$stmt->execute();

	foreach($stmt as $row){
		$output .= "
			<option value='".$row['id']."' class='append_items'>".$row['name']."</option>
		";
	}
	print_r($output);
	$pdo->close();
	echo json_encode($output);

?>