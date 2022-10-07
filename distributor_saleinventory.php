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
        top:120px; 
	
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
	.totalsales { display: flex; flex-direction: row; }
	.leftsales, .rightsales { width: 50%; }
	.rightsales .exportpdf { float: right; background: #305A30; color: #FFF; border: none;
		border-radius: 10px; padding: 10px; width: 200px; }
</style>

<body class="hold-transition skin-blue layout-top-nav">
<div class="bodywrap">
	<div class="box-body">
		<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		  	<li class="breadcrumb-item active" aria-current="page">Manage</li>
		  	<li class="breadcrumb-item"><a href="distributor_resellerrequest.php"
		    	style="color: #305A30;">Reseller's Request(s)</a></li>
		    <li class="breadcrumb-item"><a href="distributor_resellerorder.php"
		    	style="color: #305A30;">Reseller's Order(s)</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Sale Inventory</li>
		  </ol>
		</nav>
		<div class="shop_title">
 			<div class="one">
 				<img src="<?php echo (!empty($r['photo'])) ? 'images/'.$r['photo'] : 'images/profile.jpg'; ?>" width="80px" style="border-radius: 50%;">
 			</div>
 			<div class="two">
 				<h4>Sale Inventory</h4>
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
							<a href="distributor_announcements.php"
       				style="color: #FFF;"><i class="fa-solid fa-bullhorn">&nbsp;&nbsp;
						</i>Announcements</a></button>
   				</div>
 				</div>
   			
 			</div>
 		</div>

 		<div class="sales">
 			<table id="example1" class="table table-bordered">
		        <thead>
		        	<th>Product</th>
		        	<th>Quantity</th>
		        	<th>Delivery Address</th>
		        	<th>Date Ordered</th>
		        	<th>Price</th>
		        </thead>
		        <?php
					$dist_id = $user['id'];
		    		$query = $conn->prepare("SELECT * FROM reseller_orders 
		    			WHERE dist_id = '$dist_id' AND status = 'order received' ");
		    		$query->execute();
		    		foreach($query as $q) { ?>
		        <tbody>
			      	<tr>
		            	<td><?php echo $q['product_name']; ?></td>
		            	<td><?php echo $q['product_quantity']; ?></td>
		            	<td><?php echo $q['delivery_address']; ?></td>
		            	<td><?php echo $q['order_date']; ?></td>
		            	<td><?php echo "&#8369; " .  number_format($q['total_price'], 2); ?></td>
		            </tr>
		        </tbody>
		    <?php } ?>
		    </table>
		    <hr>
		    <div class="totalsales">
		    	<div class="leftsales">
		    		<?php
		    			$fname = $user['firstname'] ." ". $user['lastname'];
		    			$stmt = $conn->prepare("SELECT SUM(total_price) AS value_sum FROM reseller_orders
		    				WHERE dist_id = '$dist_id' AND status = 'order received' ");
						$stmt->execute();
						$row = $stmt->fetch();
						$sum = $row['value_sum'];
		    		?>
		    		<h4>Total Sales : <b><?php echo "&#8369; " . number_format($sum, 2); ?></b></h4>
		    	</div>
		    	<div class="rightsales">

		    		<button class="exportpdf">
						<a href="distributor_totalsales.php?id=<?php echo $dist_id; ?>&fname=<?php echo $fname ?>" target="_blank" 
							style="color: #FFF;">
							<i class="fa-solid fa-file-pdf"></i> &nbsp; Export to PDF
						</a>
					</button>
		    	</div>
		    </div>
 		</div>

	</div>
</div>


<?php include 'includes/scripts.php'; ?>
</body>
</html>
