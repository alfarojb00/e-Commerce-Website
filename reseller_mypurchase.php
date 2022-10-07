<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Distributor</title>

<style>
@media (max-width: 575.98px) { 
        body { background: #ebebeb;
                display:flex;
        }
    .bodywrap { padding-left: 10%; padding-right: 10%;}
    .box-body { 
		background: #FFF;  margin-bottom: 20px;
		position:relative;
		right:-2px;
        top:130px; 
        width:620px;
	}
	.whole { display: flex; flex-direction: row; }
	.left, .right { width: 50%; }
	.two{
	    padding-top:80px;
	    padding-right:40px;
	}
	.shop_title { background: linear-gradient(135deg, #daa520, #305A30);
		padding: ""; margin-bottom: 10px; display: block; flex-direction: row; }
		
}

	body { background: #ebebeb;}
	.bodywrap { padding-left: 10%; padding-right: 10%;}
	.box-body { 
		background: #FFF; 
		position:relative;
        top:150px;
	}
	.shop_title { background: linear-gradient(135deg, #559E54, #305A30);
		padding: 20px; margin-bottom: 10px; display: flex; flex-direction: row; }
	.one { width: 10%; } .two { width: 90%; }
	.two h5 { color: #FFF; }
	.twoflex { display: flex; flex-direction: row; }
	.twoleft, .tworight { width: 50%; }
	.shop_title h4 { color: #FFF; width: 85%; }
	.mypurchase { border: 1px solid #FFF; background: none; padding: 10px; width: 200px; 
		border-radius: 5px; }
	#backbtn { margin-bottom: 20px; } #backbtn a { color: #FFF; }
</style>

</head>

<body class="hold-transition skin-blue layout-top-nav">
<div class="bodywrap">
	<div class="box-body">
		<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="reseller_mydistributor.php"
		    	style="color: #305A30;">My Distributor</a></li>
		    <li class="breadcrumb-item active" aria-current="page">My Purchase</li>
		  </ol>
		</nav>

		<div class="shop_title">
			<?php
				$shop_id = $_GET['id'];

				$query = $conn->prepare("SELECT * FROM users WHERE id= '$shop_id' ");
				$query->execute();

				foreach ($query as $row) {
					$name = $row['firstname'] ." ". $row['lastname'];
					$email = $row['email'];
					$joined = $row['created_on'];
					$location = $row['city'] ." ". $row['province'];
				}

			?>
 			<div class="one">
 				<img src="<?php echo (!empty($r['photo'])) ? 'images/'.$r['photo'] : 'images/profile.jpg'; ?>" width="80px" style="border-radius: 50%;">
 			</div>
 			<div class="two">
 				<h4><?php echo $name; ?>'s Shop</h4>
 				<div class="twoflex">
 					<div class="twoleft">
 						<?php
 							
 							$newq = $conn->prepare("SELECT COUNT(*) AS numrows FROM distributor_shop
 								WHERE shop_id=:shop_id ");
									$newq->execute(['shop_id'=>$shop_id]);
									$row = $newq->fetch();
									$c_prod = $row['numrows'];


							$newq2 = $conn->prepare("SELECT COUNT(*) AS numrows2 FROM distributor_resellers
 								WHERE distributor_id=:distributor_id ");
									$newq2->execute(['distributor_id'=>$shop_id]);
									$row2 = $newq2->fetch();
									$c_resellers = $row2['numrows2'];

 						?>
     					<h5><i class="fa-solid fa-store"></i>&nbsp;&nbsp;
     						Products: &nbsp;&nbsp;&nbsp; <?php echo $c_prod; ?></h5>
	         			<h5><i class="fa-solid fa-user-tag"></i>&nbsp;&nbsp;
	         				Resellers: &nbsp;&nbsp;&nbsp; <?php echo $c_resellers; ?></h5>
  							<h5><i class="fa-solid fa-at"></i>&nbsp;&nbsp;
  								Email: &nbsp;&nbsp;&nbsp; <?php echo $email; ?></h5>
     				</div>
     				<div class="tworight">
     					<h5><i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp;
     						Joined: &nbsp;&nbsp;&nbsp; <?php echo $joined; ?></h5>
  							<h5><i class="fa-solid fa-location-dot"></i> &nbsp;&nbsp;
  								Location: &nbsp;&nbsp;&nbsp; <?php echo $location; ?></h5>
  							<button class="mypurchase"><a href="#purchase_history<?php echo $user['id'];?>" data-toggle="modal" id="history"
	         				style="color: #FFF;"><i class="fa-solid fa-clock-rotate-left">&nbsp;
								</i>Purchase History</a></button>

							<!-- Change Status Modal -->
							<div class="modal fade" id="purchase_history<?php echo $user['id']; ?>">
							    <div class="modal-dialog modal-lg">
							        <div class="modal-content">
							            <div class="modal-header">
							              <button type="button" class="close" data-dismiss="modal" 
							              	aria-label="Close">
							                  <span aria-hidden="true">&times;</span></button>
							              <h4 class="modal-title" style="color: #111;">
							              	<b>Purchase History</b></h4>
							            </div>
							            <div class="modal-body">
							            	
							            	<table id="example1" class="table table-bordered">
										        <thead>
										        	<th>Product</th>
										        	<th>Quantity</th>
										        	<th>Delivery Address</th>
										        	<th>Total Price</th>
										        	<th>Date Ordered</th>
										        </thead>
										        <?php
													$reseller_id = $user['id'];
										    		$sql = $conn->prepare("SELECT * FROM reseller_orders 
										    			WHERE reseller_id = '$reseller_id' AND status = 'order received' ");
										    		$sql->execute();
										    		foreach($sql as $s) { ?>
										        <tbody>
											      	<tr>
										            	<td><?php echo $s['product_name']; ?></td>
										            	<td><?php echo $s['product_quantity']; ?></td>
										            	<td><?php echo $s['delivery_address']; ?></td>
										            	<td><?php echo "&#8369; " .  number_format($s['total_price'], 2); ?></td>
										            	<td><?php echo $s['order_date']; ?></td>
										            </tr>
										        </tbody>
										    <?php } ?>
										    </table>

							            </div>
							            <div class="modal-footer">
							              <button type="button" class="btn btn-success pull-right" data-dismiss="modal">
							              	<i class="fa fa-close"></i> Close</button>
								        </div>
							        </div>
							    </div>
							</div>
     				</div>
 				</div>
     			
 			</div>
 		</div>

    	<div class="purchases">
    		<table id="example1" class="table table-bordered">
		        <thead>
		        	<th>Product</th>
		        	<th>Quantity</th>
		        	<th>Delivery Address</th>
		        	<th>Total Price</th>
		        	<th>Date Ordered</th>
		        	<th>Status</th>
		        </thead>
		        <?php
					$reseller_id = $user['id'];
		    		$query = $conn->prepare("SELECT * FROM reseller_orders 
		    			WHERE reseller_id = '$reseller_id' AND status != 'order received' ");
		    		$query->execute();
		    		foreach($query as $q) { ?>
		        <tbody>
			      	<tr>
		            	<td><?php echo $q['product_name']; ?></td>
		            	<td><?php echo $q['product_quantity']; ?></td>
		            	<td><?php echo $q['delivery_address']; ?></td>
		            	<td><?php echo "&#8369; " .  number_format($q['total_price'], 2); ?></td>
		            	<td><?php echo $q['order_date']; ?></td>
		            	<td>
		            		<?php
		            			if ($q['status'] == "shipped out") { ?>
		            				<a href="#change_status<?php echo $q['product_id']; ?><?php echo $q['reseller_id']; ?>" data-toggle="modal" id="status">
		            				Order Received</a>

		            				<!-- Change Status Modal -->
									<div class="modal fade" id="change_status<?php echo $q['product_id']; ?><?php echo $q['reseller_id']; ?>">
									    <div class="modal-dialog">
									        <div class="modal-content">
									        	<form action="distributor_changestatus.php" method="POST">
										            <div class="modal-header">
										              <button type="button" class="close" data-dismiss="modal" 
										              	aria-label="Close">
										                  <span aria-hidden="true">&times;</span></button>
										              <h4 class="modal-title"><b>Confirm Order Received</b></h4>
										            </div>
										            <div class="modal-body">
										            	<input type="text" name="product_id" 
										            	value="<?php echo $q['product_id']; ?>" hidden>
										            	<input type="text" name="reseller_id" 
										            	value="<?php echo $q['reseller_id']; ?>" hidden>
										            	<input type="text" name="dist_id" 
										            	value="<?php echo $q['dist_id']; ?>" hidden>
										            	
										            	<h4>Order Received?</h4>
										            </div>
										            <div class="modal-footer">
										              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
										              	<i class="fa fa-close"></i> Cancel</button>
										              <button type="submit" class="btn btn-success" 
										              	name="confirm_received">
										              	<i class="fa fa-save"></i>&nbsp; Confirm</button>
											        </div>
									          	</form>
									        </div>
									    </div>
									</div>

		            		<?php } 
		            			else { ?>
		            				<label style="color: #305A30;">
		            					<?php echo $q['status']; ?>
		            				</label>
		            		<?php } ?>
		            	</td>
		            </tr>
		        </tbody>
		        <?php } ?>
	        </table>
    	</div>
	</div>
</div>
	
<?php include 'includes/scripts.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>