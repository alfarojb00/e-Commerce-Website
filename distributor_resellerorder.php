<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reseller's Order</title>
</head>

<style>
@media (max-width: 575.98px) { 
        body { background: #ebebeb;
                display:block;
        }
    .bodywrap { padding-left: 10%; padding-right: 10%;}
    .box-body { 
		background: #FFF;  margin-bottom: 20px;
		position:relative;
		right:50px;
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
		background: #FFF;  margin-bottom: 20px; 
		position:relative;
        top:130px;
	}
	.shop_title { background: linear-gradient(135deg, #daa520, #305A30);
		padding: 20px; margin-bottom: 10px; display: flex; flex-direction: row; }
	.one { width: 10%; } .two { width: 90%; }
	.two h5 { color: #FFF; }
	.twoflex { display: flex; flex-direction: row; }
	.twoleft, .tworight { width: 50%; }
	.shop_title h4 { color: #FFF; width: 85%; }
	.mypurchase { border: 1px solid #FFF; background: none; padding: 10px; width: 200px; 
		border-radius: 5px; }
	.shippedout { background: #305A30; padding: 5px; padding-left: 10px; padding-right: 10px; 
		border-radius: 5px; color: #FFF; }
</style>

<body class="hold-transition skin-blue layout-top-nav">
<div class="bodywrap">
	<div class="box-body">
		<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		  	<li class="breadcrumb-item active" aria-current="page">Manage</li>
		    <li class="breadcrumb-item"><a href="distributor_resellerrequest.php"
		    	style="color: #305A30;">Reseller's Request(s)</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Reseller's Order(s</li>
		  </ol>
		</nav>

		<div class="shop_title">
 			<div class="one">
 				<img src="<?php echo (!empty($r['photo'])) ? 'images/'.$r['photo'] : 'images/profile.jpg'; ?>" width="80px" style="border-radius: 50%;">
 			</div>
 			<div class="two">
 				<h4>Reseller's Order(s)</h4>
 				<div class="twoflex">
 					<div class="twoleft">
 						<?php
 							$shop_id = $user['id'];
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
							Email: &nbsp;&nbsp;&nbsp; <?php echo $user['email']; ?></h5>
   				</div>
   				<div class="tworight">
   					<h5><i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp;
   						Joined: &nbsp;&nbsp;&nbsp; <?php echo $user['created_on']; ?></h5>
						<h5><i class="fa-solid fa-location-dot"></i> &nbsp;&nbsp;
							Location: &nbsp;&nbsp;&nbsp; <?php echo $user['city'] .", ". $user['province']; ?></h5>
						<button class="mypurchase">
							<a href="distributor_saleinventory.php"
       				style="color: #FFF;"><i class="fa-solid fa-file-invoice-dollar">&nbsp;&nbsp;
						</i>Sale Inventory</a></button>
   				</div>
 				</div>
   			
 			</div>
 		</div>

		<table id="example1" class="table table-bordered">
	      <thead>
	        <th>Reseller</th>
	        <th>Product Order</th>
	        <th>Quantity</th>
	        <th>Date Ordered</th>
	        <th>Delivery Address</th>
	        <th>Total Price</th>
	        <th>Status</th>
	      </thead>
	      <tbody>
	      	<?php
	      		$dist_id = $user['id'];
	      		$stmt = $conn->prepare("SELECT * FROM reseller_orders WHERE dist_id = $dist_id
	      			AND status != 'order received' ");
				$stmt->execute();

				foreach($stmt as $row){ ?>
			<tr>
	      		<td><?php 
	      			$sql = $conn->prepare("SELECT * FROM users WHERE id = $row[reseller_id]; ");
					$sql->execute();

					foreach($sql as $s) {
						echo $s['firstname'] ." ". $s['lastname'];
					}
	      		?></td>
	      		<td><?php echo $row['product_name']; ?></td>
	      		<td><?php echo $row['product_quantity']; ?></td>
	      		<td><?php echo $row['order_date']; ?></td>
	      		<td><?php echo $row['delivery_address']; ?></td>
	      		<td><?php echo "&#8369; " .  number_format($row['total_price'], 2); ?></td>
	      		<td>
	      			<?php
	      				if ($row['status'] == "order placed") {
	      			?>
	      			<a href="#change_status<?php echo $row['product_id']; ?><?php echo $row['reseller_id']; ?>" data-toggle="modal" id="status"
       				style="color: #daa520; font-weight: bold;"><?php echo $row['status']; ?></a>

       				<!-- Change Status Modal -->
					<div class="modal fade" id="change_status<?php echo $row['product_id']; ?><?php echo $row['reseller_id']; ?>">
					    <div class="modal-dialog">
					        <div class="modal-content">
					        	<form action="distributor_changestatus.php" method="POST">
						            <div class="modal-header">
						              <button type="button" class="close" data-dismiss="modal" 
						              	aria-label="Close">
						                  <span aria-hidden="true">&times;</span></button>
						              <h4 class="modal-title"><b>Change Product Status</b></h4>
						            </div>
						            <div class="modal-body">
						            	<input type="text" name="product_id" 
						            	value="<?php echo $row['product_id']; ?>" hidden>
						            	<input type="text" name="reseller_id" 
						            	value="<?php echo $row['reseller_id']; ?>" hidden>
						            	
						            	<h4>By clicking proceed, this confirms that:</h4>
										a) the distributor have <b>received the full payment</b> and<br>
										b) the product(s) has been shipped out and being <b>delivered to the reseller</b>.
						            </div>
						            <div class="modal-footer">
						              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
						              	<i class="fa fa-close"></i> Close</button>
						              <button type="submit" class="btn btn-success" 
						              	name="proceed_status">
						              	<i class="fa fa-save"></i> Proceed</button>
							        </div>
					          	</form>
					        </div>
					    </div>
					</div>
					<?php }
						else { ?>
							<label class="shippedout"><?php echo $row['status']; ?></label>
					<?php } ?>
	      		</td>
	      	</tr>

			<?php } ?>
	      </tbody>
	    </table>
	</div>
</div>


<?php include 'includes/scripts.php'; ?>
</body>
</html>
