<?php include 'includes/session.php'; ?>

<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	}
?>
<?php include 'includes/header.php'; ?>
<style>
@media (max-width: 575.98px) { 
    .content-wrapper{
        display: block;
        width:400px;
    }
    .box-body{
        display:block;
    }
    .row{
        
    }
    
    .col-sm-3{
        display:block;
    }
    .col-sm-9{
       
    }
    .col-sm-12{
        display: block;
    }
}

	.content-wrapper{
		position:relative;
        top:70px;
		
	}
</style>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
	 
  <div class="content-wrapper">
    <div class="container">

      <!-- Main content -->
      <section class="content">
        <div class="row">
        	<div class="col-sm-9">
        		<?php
        			if(isset($_SESSION['error'])){
        				echo "
        					<div class='callout callout-danger'>
        						".$_SESSION['error']."
        					</div>
        				";
        				unset($_SESSION['error']);
        			}

        			if(isset($_SESSION['success'])){
        				echo "
        					<div class='callout callout-success'>
        						".$_SESSION['success']."
        					</div>
        				";
        				unset($_SESSION['success']);
        			}
        		?>
        		<div class="box box-solid">
        			<div class="box-body">
        				<div class="col-sm-3">
        					<img src="<?php echo (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg'; ?>" width="100%" 
        					style="border-radius: 50%;">
        				</div>
        				<div class="col-sm-9">
        					<div class="row">
        						<div class="col-sm-3">
        							<h5>Name:</h5>
        							<h5>Email:</h5>
        							<h5>Contact Info:</h5>
        							<h5>Address:</h5>
        							<h5>Member Since:</h5>
        						</div>
        						<div class="col-sm-9">
        							<h5><?php echo $user['firstname'].' '.$user['lastname']; ?>
        								<span class="pull-right">
        									<a href="#edit" data-toggle="modal" style="
        										font-size: 20px;
        										color: green;
        									"><i class="fa fa-edit"></i>
        									</a>
        								</span>
        							</h5>
        							<h5><?php echo $user['email']; ?></h5>
        							<h5><?php echo (!empty($user['contact_info'])) ? $user['contact_info'] : ' - '; ?></h5>
        							<h5><?php echo (!empty($user['address'])) ? $user['address'] : ' - '; ?></h5>
        							<h5><?php echo date('M d, Y', strtotime($user['created_on'])); ?></h5>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        		<div class="box box-solid">
        			<div class="box-header with-border">
        				<h4 class="box-title"><i class="fa fa-calendar"></i> <b>Transaction History</b></h4>
        			</div>
        			<div class="box-body">
        				<table class="table table-bordered" id="example1">
        					<thead>
        						<th class="hidden"></th>
        						<th>Date</th>
        						<th>Transaction#</th>
        						<th>Amount</th>
        						<th>Full Details</th>
        					</thead>
        					<tbody>
        					<?php
        						$conn = $pdo->open();

        						try{
        							$stmt = $conn->prepare("SELECT * FROM sales WHERE user_id=:user_id ORDER BY sales_date DESC");
        							$stmt->execute(['user_id'=>$user['id']]);
        							foreach($stmt as $row){
        								$stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
        								$stmt2->execute(['id'=>$row['id']]);
        								$total = 0;
        								foreach($stmt2 as $row2){
        									$subtotal = $row2['price']*$row2['quantity'];
        									$total += $subtotal;
        								}
        								echo "
        									<tr>
        										<td class='hidden'></td>
        										<td>".date('M d, Y', strtotime($row['sales_date']))."</td>
        										<td>".$row['pay_id']."</td>
        										<td>&#8369; ".number_format($total, 2)."</td>
        										<td><button class='btn btn-sm btn-flat btn-info transact' data-id='".$row['id']."'><i class='fa fa-search'></i> View</button></td>
        									</tr>
        								";
        							}

        						}
    							catch(PDOException $e){
									echo "There is some problem in connection: " . $e->getMessage();
								}

        						$pdo->close();
        					?>
        					</tbody>
        				</table>
        			</div>
        		</div>
        	</div>
        	<div class="col-sm-3">
        		<?php include 'includes/sidebar.php'; ?>
        	</div>
        </div>
      </section>
     
    </div>
  </div>
  
<?php include 'includes/footer.php'; ?>
<?php include 'includes/profile_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

<script>
$(function(){
	$(document).on('click', '.transact', function(e){
		e.preventDefault();
		$('#transaction').modal('show');
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'transaction.php',
			data: {id:id},
			dataType: 'json',
			success:function(response){
				$('#date').html(response.date);
				$('#transid').html(response.transaction);
				$('#detail').prepend(response.list);
				$('#total').html(response.total);
			}
		});
	});

	$("#transaction").on("hidden.bs.modal", function () {
	    $('.prepend_items').remove();
	});
});
</script>
</body>
</html>