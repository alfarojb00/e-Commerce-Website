<?php
	include 'includes/session.php';

	if(isset($_GET['pay'])){
		$payid = $_GET['pay'];
		$date = date('Y-m-d');

		$conn = $pdo->open();

		try{
			
			$stmt = $conn->prepare("INSERT INTO sales (user_id, pay_id, sales_date) VALUES (:user_id, :pay_id, :sales_date)");
			
			$stmt->execute(['user_id'=>$user['id'], 'pay_id'=>$payid, 'sales_date'=>$date]);
			$salesid = $conn->lastInsertId();
			
			try{
				$stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
				$stmt->execute(['user_id'=>$user['id']]);

				foreach($stmt as $row){
					

					
					
					if($user['user_type']=="Distributor"){
						$stmt = $conn->prepare("SELECT * FROM distributor_inventory WHERE productid = :product_id AND userid= :userid ");
						$stmt->execute(['product_id'=>$row['product_id'],':userid'=>$user['id']]);
						$distRow = $stmt->fetch();
						if($distRow!=false){
							$stmt = $conn->prepare("UPDATE distributor_inventory SET  inventoryquantity`= inventoryquantity` + :rowquantity WHERE dist_inventoryid = :distid");
							$stmt->execute(['rowquantity'=>$row['quantity'], 'distid'=>$distRow['dist_inventoryid']]);	
						}else{
							$stmt = $conn->prepare("INSERT INTO distributor_inventory`( productid`, inventoryquantity, userid) VALUES (:productid,:quantity,:userid)");
							$stmt->execute(['productid'=>$row['product_id'], 'quantity'=>$row['quantity'], 'userid'=>$user['id']]);	
						}
						$stmt = $conn->prepare("UPDATE products SET productquantity`= productquantity`- :productquantity WHERE id = :productid");
						$stmt->execute(['productquantity'=>$row['quantity'],'productid'=>$row['product_id']]);
						$stmt = $conn->prepare("SELECT * FROM products WHERE id=:product_id");
						$stmt->execute(['product_id'=>$row['product_id']]);

						$productRow = $stmt->fetch();
						if($productRow['productquantity'] < 1000){
							
							$stmt = $conn->prepare("INSERT INTO notifications`( productid`, userid) VALUES (:productid,:userid)");
							$stmt->execute(['productid'=>$productRow['id'],'userid'=>1]);
						}
					}else{
						if($user['user_type']=="Reseller"){
							$stmt = $conn->prepare("UPDATE distributor_inventory SET inventoryquantity = inventoryquantity - :rowquantity WHERE productid = :productid` AND userid = :distid");
							$stmt->execute(['productid'=>$row['product_id'],'rowquantity'=>$row['quantity'],'distid'=>$_GET['dist_id']]);
							$stmt = $conn->prepare("SELECT * FROM distributor_inventory WHERE productid = :product_id AND userid= :userid ");
							$stmt->execute(['product_id'=>$row['product_id'],':userid'=>$_GET['dist_id']]);
							$distRow = $stmt->fetch();
							if($distRow['inventoryquantity'] < 1000){
								$stmt = $conn->prepare("INSERT INTO notifications`( productid`, userid) VALUES (:productid,:userid)");
								$stmt->execute(['productid'=>$productRow['id'],'userid'=>$_GET['dist_id']]);
							}
						}
					}
					
					$stmt = $conn->prepare("INSERT INTO details (sales_id, product_id, quantity) VALUES (:sales_id, :product_id, :quantity)");
					$stmt->execute(['sales_id'=>$salesid, 'product_id'=>$row['product_id'], 'quantity'=>$row['quantity']]);
				}
				if(($row['product_id']) == 39){
					$stmt = $conn->prepare("UPDATE users SET plan_type =:plan_type WHERE id=:id ");
					$stmt->execute(['plan_type'=>1,'id'=>$user['id']]);
				$stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
				$stmt->execute(['user_id'=>$user['id']]);
				$_SESSION['success'] = 'Transaction successful. You are now a Distributor';
				}elseif(($row['product_id']) == 40){
					$stmt = $conn->prepare("UPDATE users SET plan_type =:plan_type WHERE id=:id ");
					$stmt->execute(['plan_type'=>2,'id'=>$user['id']]);
					$stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
					$stmt->execute(['user_id'=>$user['id']]);
					$_SESSION['success'] = 'Transaction successful. You are now a Reseller';
					
				}else{
					$stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
					$stmt->execute(['user_id'=>$user['id']]);
					$_SESSION['success'] = 'Transaction successful. Thank you.';
				}

			

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	if(($row['product_id']) == 40){
		header('location: pickdistributor.php');
	}else{
		header('location: profile.php');
	}
	
	
?>