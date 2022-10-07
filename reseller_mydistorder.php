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
	body { background: #ebebeb;}
	.bodywrap { padding-left: 10%; padding-right: 10%; padding-bottom: 10%;}
	.box-body { background: #FFF;
				
				position: relative;
				top:100px;
				}
	.whole { display: flex; flex-direction: row; }
	.left, .right { width: 50%; }
	.placeorder { border-top: 1px solid #CCC; padding: 0; background: #FFF; height: 70px; }
	.po-btn { padding: 20px; height: 70px; width: 200px; float: right; margin-bottom: 50px; 
		border: none; background: #559E54; color: #FFF; font-size: 18px; font-weight: 400; }
	.po-btn:hover { background: #305A30; }
	.can-btn { padding: 20px; height: 70px; width: 200px; float: right; margin-bottom: 50px; 
		border: none; background: #ffa500; color: #FFF; font-size: 20px; font-weight: 400;
		text-align: center; }
	.can-btn:hover { background: #ff8c00; color: #FFF; }
	#price, #total_price, #discount { text-align: left; height: 30px; border: none; 
		font-size: 25px; font-weight: 400; }
	#address { border: none; border-bottom: 1px solid #CCC; font-size: 15px; width: 100%; 
		margin-bottom: 20px; }
	#quantity { text-align: center; }

	.cpn { display: flex; flex-direction: column; }
	.cpn input[type="radio"] { display: none; }
	.cpn .cpncard1, .cpncard2 { 
		background: linear-gradient(135deg, #559E54, #305A30);
		color: #FFF;
		text-align: center;
		padding: 10px 20px;
		border-radius: 15px;
		box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.15);
		width: 80%;
	}
	.cpn .cpncard1, .cpncard2 p { font-size: 12px; font-weight: 400; }
	.cpn .cpncard1, .cpncard2 .cpn-row { align-items: center; margin: 10px; }
	#cpncode { border: 1px dashed #FFF; padding: 10px 20px; border-right: 0; }
	#cpnbtn, #cpnbtn2 { background: #FFF; padding: 10px 20px; color: #305A30;
		cursor: pointer; }
</style>

</head>

<body class="hold-transition skin-blue layout-top-nav">
<div class="bodywrap">
	<div class="box-body">
	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="reseller_mydistributor.php"
	    	style="color: #305A30;">My Distributor</a></li>
	     <li class="breadcrumb-item active" aria-current="page">Checkout</li>
	  </ol>
	</nav>
	<!-- **************** START FORM ********************** -->
	<form action="reseller_orders.php" method="POST">
		<div class="checkout-productinfo">
			<?php
				$reseller_id = $user['id'];
	    		$query = $conn->prepare("SELECT * FROM distributor_resellers 
	    			WHERE reseller_id = '$reseller_id' ");
	    		$query->execute();
	    		foreach($query as $q) {
	    			$dist_id = $q['distributor_id'];
	    		}

				$id = $_GET['id'];
	    		$sql = $conn->prepare("SELECT * FROM products 
	    			WHERE id = '$id' ");
	    		$sql->execute();
	    		foreach($sql as $s) { 
	    			$ph = (!empty($s['photo'])) ? 'images/'.$s['photo'] 
	    			: 'images/noimage.jpg';?>

	    	<div class="whole">
				<div class="left">
					<img src='<?php echo $ph; ?>' width='80%'>
					<br><br>
					<div class="form-group">
            			<div class="input-group col-sm-5">		
            				<span class="input-group-btn">
            					<button type="button" id="minus" class="btn btn-default"><i class="fa fa-minus"></i></button>
            				</span>

				          	<input type="text" name="quantity" id="quantity"
				          	class="form-control" value="1">

				            <span class="input-group-btn">
				                <button type="button" id="add" class="btn btn-default"><i class="fa fa-plus"></i>
				                </button>
				            </span>
						</div>
		            </div>
		            <h4>Vouchers & Coupons</h4>

            		<div class="cpn">
            			<div class="cpncard1">
            				<h4>20% off on all items within the city 
            				using Paymaya</h4>
            				<p>Valid Till: 20 Dec, 2022</p>
            				<div class="cpn-row">
            					<span id="cpncode">STEALDEAL20</span>
            					<input type="radio" name="coupon" id="cpn1">
		            			<label id="cpnbtn" for="cpn1">APPLY</label>
            				</div>
            			</div>

            			
            		</div>
            		<hr>
            		<div class="summary">
						<label>Price : &#8369; </label>
						<input type="text" name="price" id="price" 
						value="<?php echo $s['price']; ?>" readonly>
						<br>
						<label>Voucher Discount :</label>
						<input type="text" name="discount" id="discount" 
						value="0" readonly><br>
						<label>Delivery Address : </label>
            			<input type="text" name="address" id="address" 
						value="" required>
						<label>Total : &#8369; </label>
						<input type="text" name="total_price" id="total_price" 
						value="0" readonly><br>
						<div align=center id='paypal-button'></div>
            		</div>            		                             
	    		</div>
				<div class="right">
					<input type="text" name="reseller_id"
						value="<?php echo $reseller_id; ?>" hidden>
					<input type="text" name="dist_id"
						value="<?php echo $dist_id; ?>" hidden>
					<input type="text" name="product_id"
						value="<?php echo $id; ?>" hidden>
					<input type="text" name="product_name"
						value="<?php echo $s['name']; ?>" hidden>
					<h3><?php echo $s['name']; ?></h3>
					<h4><?php echo "&#8369; " . number_format($s['price'], 2); ?>
					</h4>
					<p><?php echo $s['description']; ?></p>
				</div>
	    	</div>
	    	
	    	<?php } ?>
	    </div>
	
	<div class="placeorder">
		<button type="submit" name="reseller_addorder" class="po-btn"><i class="fa fa-shopping-cart">
		</i>&nbsp;Place Order</button>
		<a href="reseller_mydistributor.php" class="can-btn">Cancel</a>
	</div>
	</div>				
	</form>
    <!-- **************** END FORM ********************** --> 
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
<script>
	$(function(){
		$('#add').click(function(e){
			e.preventDefault();
			var quantity = $('#quantity').val();
			var price = $('#price').val();
			price = price/quantity;
			quantity++;
			price = price * quantity;

			$('#quantity').val(quantity);
			$('#price').val(price);
		});
		$('#minus').click(function(e){
			e.preventDefault();
			var quantity = $('#quantity').val();
			var price = $('#price').val();
			price = price/quantity;
			if(quantity > 1){
				quantity--;
				price = price * quantity;
			}
			$('#quantity').val(quantity);
			$('#price').val(price);
		});
		$('#cpn1').click(function(e){
			var price = $('#price').val();
			var total_price = $('#total_price').val();
			var discount = 0.2;
			total_price = price - (price * discount);

			$('#total_price').val(total_price);
			$('#discount').val(discount);
		});
		$('#cpn2').click(function(e){
			var price = $('#price').val();
			var total_price = $('#total_price').val();
			var discount = 0.5;
			total_price = price - (price * discount);

			$('#total_price').val(total_price);
			$('#discount').val(discount);
		});

	});
	var cpnbtn = document.getElementById("cpnbtn");
	var cpnbtn2 = document.getElementById("cpnbtn2");

	cpnbtn.onclick = function() {
		if (cpnbtn.innerHTML == "APPLY") {
			cpnbtn.innerHTML = "APPLIED";
		}
		else if (cpnbtn.innerHTML == "APPLIED") {
			cpnbtn.innerHTML = "APPLY";
		}
		
	}
	cpnbtn2.onclick = function() {
		if (cpnbtn2.innerHTML == "APPLY") {
			cpnbtn2.innerHTML = "APPLIED";
		}
		else if (cpnbtn2.innerHTML == "APPLIED") {
			cpnbtn2.innerHTML = "APPLY";
		}
		
	}
</script>
<script>
	paypal.Button.render({
	    env: 'sandbox', // change for production if app is live,
		client: {
	        sandbox: 'AVIrWFEig0aQgkLitn6_MgSn5rs22gItTOWM6_LeK243tFAoafLMBlEZ8ShfLw3pqGF250NfheaYe80D',
	        //production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
	    },
	    commit: true, // Show a 'Pay Now' button
	    style: {
	    	color: 'gold',
	    	size: 'medium'
	    },
	    payment: function(data, actions) {
	        return actions.payment.create({
	            payment: {
	                transactions: [
	                    {
	                    	//total purchase
	                        amount: { 
	                        	total: 9500, 
	                        	currency: 'PHP' 
	                        }
	                    }
	                ]
	            }
	        });
	    },
	    onAuthorize: function(data, actions) {
	        return actions.payment.execute().then(function(payment) {
				window.location = 'sales.php?pay='+payment.id+'&dist_id='+<?php echo $dist_id?>;
	        });
	    },

	}, '#paypal-button');
</script>

</body>
</html>