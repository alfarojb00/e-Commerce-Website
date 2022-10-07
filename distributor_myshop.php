<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Shop</title>

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
        width:480px;
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
	#selectitems { margin-bottom: 20px; }
	.hover:hover { cursor: pointer; }
	.whole { display: flex; flex-direction: row; }
	.left, .right { width: 50%; }
	.shop_title { background: linear-gradient(135deg, #daa520, #305A30);
		padding: 20px; margin-bottom: 10px; display: flex; flex-direction: row; }
	.one { width: 10%; } .two { width: 90%; }
	.two h5 { color: #FFF; }
	.twoflex { display: flex; flex-direction: row; }
	.twoleft, .tworight { width: 50%; }
	.shop_title h4 { color: #FFF; width: 85%; }
	.mypurchase { border: 1px solid #FFF; background: none; padding: 10px; width: 200px; 
		border-radius: 5px; }
</style>

</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="bodywrap">
	<div class="box-body">
		<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="distributor_myshop.php"
		    	style="color: #305A30;">My Shop</a></li>
		  </ol>
		</nav>

		<div class="shop_title">
 			<div class="one">
 				<img src="<?php echo (!empty($r['photo'])) ? 'images/'.$r['photo'] : 'images/profile.jpg'; ?>" width="80px" style="border-radius: 50%;">
 			</div>
 			<div class="two">
 				<h4>My Shop</h4>
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
							<a href="#select_items" data-toggle="modal" id="selectitems"
       				style="color: #FFF;"><i class="fa fa-plus">&nbsp;&nbsp;
						</i>Select Products</a></button>
   				</div>
 				</div>
   			
 			</div>
 		</div>

			<table id="example1" class="table table-bordered">
	      <thead>
	        <th>Name</th>
	        <th>Product</th>
	        <th>Price</th>
	        <th>Views Today</th>
	        <th>Action</th>
	      </thead>
			<?php
				$now = date('Y-m-d');
				$shop_id = $user['id'];
				$stmt = $conn->prepare("SELECT * FROM distributor_shop WHERE shop_id = $shop_id");
				$stmt->execute();
				
				foreach($stmt as $row){
					$query = $conn->prepare("SELECT * FROM products WHERE id = '$row[selected_shops]' ");
					$query->execute();

					foreach($query as $r) { 
						$image = (!empty($r['photo'])) ? 'images/'.$r['photo'] : 'images/noimage.jpg';
		        $counter = ($r['date_view'] == $now) ? $r['counter'] : 0;
				?>
	      <tbody>
	      	<tr>
            <td><?php echo $r['name']; ?></td>
            <td>
              <img src='<?php echo $image; ?>' height='30px' width='30px'>
              <span class="hover">
              	<a class="pull-right" data-toggle='modal'
              	data-target="#view<?php echo $r['id'];?>">
              	<i class='fa fa-edit'></i></a>
              </span>

              <!-- View Product Modal -->
							<div class="modal fade" id="view<?php echo $r['id'];?>">
						    <div class="modal-dialog">
						      <div class="modal-content">
				            <div class="modal-header">
				              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                  <span aria-hidden="true">&times;</span></button>
				              <h4 class="modal-title"><b>About the product</b></h4>
				            </div>

				            <div class="modal-body">
				            	<?php 
					            		$query = $conn->prepare("SELECT * FROM products 
					            			WHERE id = '$row[selected_shops]' ");
					            		$query->execute();
					            		foreach($query as $q) { 
					            			$ph = (!empty($q['photo'])) ? 'images/'.$q['photo'] : 'images/noimage.jpg';
					            			?>
					            			<div class="whole">
					            				<div class="left">
					            					<img src='<?php echo $ph; ?>' width='90%'>
					            				</div>
					            				<div class="right">
					            					<h3><?php echo $q['name']; ?></h3>
					            					<label><?php echo "&#8369; " . number_format($q['price'], 2); ?>
					            					</label>
					            					<p><?php echo $q['description']; ?></p>
					            				</div>
					            			</div>
					            		<?php }
					            	?>
							      </div>

							      <div class="modal-footer">
				              <button type="button" class="btn btn-success pull-right" data-dismiss="modal">
				              	<i class="fa fa-close"></i> Close</button>
				            </div>
							    </div>
								</div>
							</div>
							<!-- END MODAL -->
            </td>
            <td><?php echo "&#8369; " . number_format($r['price'], 2); ?></td>
            <td><?php echo $counter; ?></td>
            <td>
            	<button type="button" data-toggle='modal'
            		data-target="#delete<?php echo $r['id'];?>"
            		class="btn btn-danger"><i class="fas fa-trash"></i> &nbsp; Remove
            	</button>

            		<!-- Delete Product Modal -->
								<div class="modal fade" id="delete<?php echo $r['id'];?>">
							    <div class="modal-dialog">
							      <div class="modal-content">
					            <div class="modal-header">
					              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                  <span aria-hidden="true">&times;</span></button>
					              <h4 class="modal-title"><b>Delete</b></h4>
					            </div>

					            <div class="modal-body">
					            	<?php 
					            		$query = $conn->prepare("SELECT * FROM products 
					            			WHERE id = '$row[selected_shops]' ");
					            		$query->execute();
					            		foreach($query as $q) { ?>
					            			<h4>Are you sure you want to remove 
					            				<b><?php echo $q['name']; ?></b> ?</h4>
					            		<?php }
					            	?>
								      </div>

								      <div class="modal-footer">
					              <button type="button" class="btn btn-success pull-left" data-dismiss="modal">
					              	<i class="fa fa-close"></i> Close</button>
					              <a href="delete.php?id=<?php echo $r['id']; ?>"
					            		class="btn btn-danger pull-right"><i class="fas fa-trash"></i> &nbsp; Remove</a>
					            </div>
								    </div>
									</div>
								</div>
								<!-- END MODAL -->
            </td>
          </tr>
		<?php } } ?>
        </tbody>
      </table>

    </div>
  </div>

  <!-- Select Items Modal -->
	<div class="modal fade" id="select_items">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Product Selection</b></h4>
            </div>
            <div class="modal-body">
            	<form id="product_select" action="distributor_actions.php" method="POST">

            		<table id="example1" class="table table-bordered">
						      <thead>
						      	<th><input style="height: 12px; width: 12px;"
						      		type="checkbox" id="select-all"> &nbsp; Select</th>
						        <th>Name</th>
						        <th>Photo</th>
						        <th>Price</th>
						      </thead>

	      					<tbody>
	                  <?php
	                    $conn = $pdo->open();

	                    try{
	                      $now = date('Y-m-d');
	                      $stmt = $conn->prepare("SELECT * FROM products ");
	                      $stmt->execute();
	                      foreach($stmt as $row){
	                        $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 
	                        'images/noimage.jpg';
	                        ?>
	                        <tr>
	                        	<td><input style="height: 12px; width: 12px;" type="checkbox" name="check[]" value="<?php echo $row['id']; ?>"></td>
	                        	<td><?php echo $row['name']; ?></td>
	                          <td>
	                            <img src='<?php echo $image; ?>' height='30px' width='30px'>
	                          </td>
	                          <td><?php echo number_format($row['price'], 2); ?></td>
	                        </tr>

	                      <?php } }
	                    	catch(PDOException $e){
	                      	echo $e->getMessage(); }
	                    	$pdo->close(); ?>
	                </tbody>
	              </table>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
              	<i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success" name="selected">
              	<i class="fa fa-save"></i> Save</button>
	          </div>
          </form>
        </div>
    </div>
	</div>



<?php include 'includes/scripts.php'; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#product_select #select-all").click(function(){
		          $("#product_select input[type='checkbox']").prop('checked', this.checked);
		      });
		  });
	$('#delete').on('show.bs.modal', function(e) {
    var userid = $(e.relatedTarget).data('userid');
    $(e.currentTarget).find('input[name="id"]').val(userid);
	});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
