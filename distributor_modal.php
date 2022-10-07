<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<script src="https://www.paypal.com/sdk/js?client-id=AVIrWFEig0aQgkLitn6_MgSn5rs22gItTOWM6_LeK243tFAoafLMBlEZ8ShfLw3pqGF250NfheaYe80D"></script>
	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	     <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

.columns {
  float: left;
  width: 33.3%;
  padding: 8px;
}

.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
  background-color: #111;
  color: white;
  font-size: 25px;
}

.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}

.price .grey {
  background-color: #eee;
  font-size: 20px;
}

.button {
  background-color: #3c8dbc;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}

@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}
</style>
</head>
<body>

<h1 style="text-align:center">DISTRIBUTOR</h1>
<h3 style="text-align:center">₱ 9,500<br><br></h3>
<!--  
<h3 style="text-align:Center">Benefits</h3>
<p style="text-align:Center">Discount up to 25% <br> lifetime DISTRIBUTOR <br> business account <br> Max. potential income 18k a day</p>
-->
<?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>

<h3 style="text-align:Left">ID Verification</h3>
<p style="text-align:Left">Unified Multi-Purpose ID, Driver License and ETC.</p>
                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>   
                    

<h3 style="text-align:Center"><br><br></h3>


<h3 style="text-align:Left">Application Form</h3>
<a href="#" class="btn btn-sm btn-flat btn-info transact">Application Form</a>
<p style="text-align:Left">Download and fill out the application form then submit it here</p>
                    <div class="col-sm-9">
                      <input type="file" id="photo1" name="photo1">
                      <div class="col-sm-9">
                      <h3 style="text-align:Center"><br></h3>          
<button type="submit" class="btn btn-primary btn-flat" name="distributorApplicationForm"><i  class="fa fa-save"></i> Submit</button>
</div>
                    </div>
                    </div>
 
 <?php
	        			if(isset($_SESSION['user'])){
	        				echo "
	        					<div align=center id='paypal-button'></div>
	        				";
	        			}
	        			else{
	        				echo "
	        					<h4>You need to <a href='login.php'>Login</a> to checkout.</h4>
	        				";
	        			}
	        		?>
</div>
      	

  
    </script>	
</body>
</html>
	    
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
paypal.Button.render({
    env: 'sandbox', // change for production if app is live,

	client: {
        sandbox:    'AVIrWFEig0aQgkLitn6_MgSn5rs22gItTOWM6_LeK243tFAoafLMBlEZ8ShfLw3pqGF250NfheaYe80D',
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
			window.location = 'sales.php?pay='+payment.id;
        });
    },

}, '#paypal-button');
</script>
</body>
</html>