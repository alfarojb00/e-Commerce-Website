<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>


<?php

$query = "SELECT * FROM `users` WHERE `user_type` = 'Distributor';";
try {
	$result = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
	throw $th;
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Distributor</title>

<style>
	@media (max-width: 575.98px) { 
        body { background: #ebebeb;
                display:block;
        }
    .bodywrap { padding-left: 10%; padding-right: 10%;}
    .box-body { 
		background: #FFF;  margin-bottom: 20px;
		position:relative;
		right:38px;
        top:100px; 
        width:500px;
	}
	.box.box-solid{
	        display:block;
		    background: white;
		    position:relative;
		    top:-90px;
		    left:34px;
		}
	.whole { display: flex; flex-direction: row; }
	.left, .right { width: 50%; }
	.two{
	    padding-top:80px;
	    padding-right:40px;
	}
	.shop_title { background: linear-gradient(135deg, #daa520, #305A30);
		padding: ""; margin-bottom: 10px; display: block; flex-direction: row; 
	    
	}
	
	.shop_title h4 {
			color: #FFF;
			width: 85%;
		}

		.mypurchase {
			border: 1px solid #FFF;
			background: none;
			padding: 10px;
			width: 200px;
			border-radius: 5px;
		}

		#productbtn {
			border: 1px solid #305A30;
			width: 200px;
			border-radius:12px;
		}
		
}

		body {
			background: #ebebeb;
		}

		.bodywrap {
			padding-left: 10%;
			padding-right: 10%;
		}

		.box-body {
		    position:relative;
			top:100px;
			background: #FFF;
			margin-bottom: 20px;
		}
		.box.box-solid{
		    background: none;
		    
		    position:relative;
		    top:-20px;
		}
		
		#selectitems {
			margin-bottom: 20px;
		}

		.hover:hover {
			cursor: pointer;
		}

		.whole {
			display: flex;
			flex-direction: row;
		}

		.left,
		.right {
			width: 50%;
		}

		.shop_title {
			background: linear-gradient(135deg, #559E54, #305A30);
			padding: 20px;
			margin-bottom: 10px;
			display: flex;
			flex-direction: row;
		}

		.one {
			width: 10%;
		}

		.two {
			width: 90%;
		}

		.two h5 {
			color: #FFF;
		}

		.twoflex {
			display: flex;
			flex-direction: row;
		}

		.twoleft,
		.tworight {
			width: 50%;
		}

		.shop_title h4 {
			color: #FFF;
			width: 85%;
		}

		.mypurchase {
			border: 1px solid #FFF;
			background: none;
			padding: 10px;
			width: 200px;
			border-radius: 5px;
		}

		#productbtn {
			border: 1px solid #305A30;
			width: 100%;
			border-radius:12px;
		}
	</style>

</head>

<body class="hold-transition skin-blue layout-top-nav">
	<div class="bodywrap">
		<div class="box-body">
			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="reseller_mydistributor.php" style="color: #305A30;">My Distributor</a></li>
				</ol>
			</nav>

			<div class="modal fade" id="selectDistributor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Select Distributor</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form
							method="POST"
							action="choosedistributor.php"
						>
							<div class="modal-body">
								<ul 
									style="list-style: none;"
								>
									<?php
									foreach ($result as $key => $value) {
									?>

										<li
											style="margin-bottom: 8px;"
										>
											<input value="<?php echo $value['id']; ?>" type="radio" name="distributorid"/>
											<input value="<?php echo $user['id'] ?>" type="text" name="userid" hidden/>
											<input value="<?php echo $user['firstname'] . " " .$user['lastname'] ?>" type="text" name="name" hidden/>
											<img src="images/<?php echo !empty($value['photo']) ?$value['photo'] : 'profile.jpg' ?>" 
												style="margin-inline: 5px;width: 50px;"
											/>
											<?php echo $value['firstname']." ".$value['lastname']; ?>
										</li>
									<?php
									}
									?>
								</ul>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="dist_request">
				<?php
				$reseller_id = $user['id'];
				$stmt = $conn->prepare("SELECT * FROM distributor_resellers 
					WHERE reseller_id = $reseller_id");
				$stmt->execute();

				$stmt1 = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM distributor_resellers 
					WHERE reseller_id = $reseller_id");
				$stmt1->execute();
				$num = $stmt1->fetch();

				foreach ($stmt as $row) {
					$query = $conn->prepare("SELECT * FROM users WHERE id = '$row[distributor_id]' ");
					$query->execute();

					foreach ($query as $r) {
						$distributor_name =  $r['firstname'] . " " . $r['lastname'];
						$location =  $r['city'] . ", " . $r['province'];
						$joined =  $r['created_on'];
						$email =  $r['email'];
					}
				}

				if ($num['numrows'] > 0) { ?>
					<?php if ($row['approval'] == '0') { ?>
						<table id="example1" class="table table-bordered">
							<tbody>
								<tr>
									<td><?php echo $r['city'] . ", " . $r['province']; ?></td>
									<td><?php echo "Your request has been sent to <b>" .
											$r['firstname'] . " " . $r['lastname'] . "</b>"; ?></td>
									<td style="color: green;"><i class="fa-solid fa-hourglass"></i>&nbsp;
										<?php echo "Pending Approval " ?></td>
									<td><a href="reseller_cancelrequest.php?id=<?php echo $reseller_id; ?>">Cancel Request</a></td>
								</tr>
							</tbody>
						</table>
					<?php } else { ?>
						<!-- AFTER CHOOSING A DISTRIBUTOR -->
						<div>
							<div class="shop_title">
								<div class="one">
									<img src="<?php echo (!empty($r['photo'])) ? 'images/' . $r['photo'] : 'images/profile.jpg'; ?>" width="80px" style="border-radius: 50%;">
								</div>
								<div class="two">
									<h4><?php echo $r['firstname'] . " " . $r['lastname']; ?>'s Shop</h4>
									<div class="twoflex">
										<div class="twoleft">
											<?php
											$shop_id = $r['id'];
											$newq = $conn->prepare("SELECT COUNT(*) AS numrows FROM distributor_shop
	         								WHERE shop_id=:shop_id ");
											$newq->execute(['shop_id' => $shop_id]);
											$row = $newq->fetch();
											$c_prod = $row['numrows'];


											$newq2 = $conn->prepare("SELECT COUNT(*) AS numrows2 FROM distributor_resellers
	         								WHERE distributor_id=:distributor_id ");
											$newq2->execute(['distributor_id' => $shop_id]);
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
											<button class="mypurchase">
												<a href="reseller_mypurchase.php?id=<?php echo $r['id']; ?>" style="color: #FFF;"><i class="fa fa-shopping-cart">&nbsp;
													</i>My Purchase</a></button>
										</div>
									</div>

								</div>
							</div>

							<?php
							$shop_id = $r['id'];
							$stmt = $conn->prepare("SELECT * FROM distributor_shop 
	         					WHERE shop_id = $shop_id");
							$stmt->execute();

							foreach ($stmt as $row) {
								$query = $conn->prepare("SELECT * FROM products
											WHERE id = '$row[selected_shops]' ");
								$query->execute();

								foreach ($query as $q) {
									$image = (!empty($q['photo'])) ? 'images/' . $q['photo'] :
										'images/noimage.jpg'; ?>

									<div class='col-sm-4'>
										<div class='box box-solid'>
											<button class='box-body prod-body' id="productbtn">
												<a href="reseller_mydistorder.php?id=<?php echo $q['id']; ?>">
													<img src='<?php echo $image; ?>' width='100%' height='230px' class='thumbnail'>
													<h5><?php echo $q['name']; ?></h5>
												</a>
												<div class='box-footer'>
													<b><?php echo "&#8369; " . number_format($q['price'], 2); ?></b>
												</div>
											</button>
										</div>
									</div>
							<?php }
							} ?>

						</div>
					<?php }
				} else { ?>
					<button href="#selectDistributor" data-toggle="modal" class="btn btn-success" id="selectitems">
						<i class="fa fa-plus"></i> &nbsp; Select a distributor</button>
				<?php } ?>

			</div>
		</div>
	</div>


	<?php include 'includes/scripts.php'; ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>