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

<h2 style="text-align:center">PRICING PLAN</h2>
<p style="text-align:center">APPLY NOW AND LET’S BUILD SUCCESS TOGETHER.</p>

<div class="columns">
  <ul class="price">
    <li class="header">RESELLER</li>
    <li class="grey">₱ 3,500</li>
    <li>Discount up to 15%</li>
    <li>lifetime reseller</li>
    <li>business account</li>
    <li>Max. potential income 6k a day</li>
    <li class="grey"><a href="resellerconn.php" id = "reseller" class="button">Apply Now</a></li>
  </ul>
</div>
      	
<div class="columns">
  <ul class="price">
    <li class="header" style="background-color:#3c8dbc">DISTRIBUTOR</li>
    <li class="grey">₱ 9,500</li>
    <li>Discount up to 25%</li>
    <li>lifetime DISTRIBUTOR</li>
    <li>business account</li>
    <li>Max. potential income 18k a day</li>
    <li class="grey"><a href="distributorconn.php" class="button"  id = "distributor"  >Apply Now</a></li>
  </ul>

</div>
<script >
        document.getElementById("reseller").onclick = function() {
          document.getElementById("reseller").disabled = true;
          document.getElementById("distributor").disabled = true; 
          
        }
  
        document.getElementById("distributor").onclick = function() {
          document.getElementById("reseller").disabled = true;
          document.getElementById("distributor").disabled = true; 
  
        }
  
    </script>	
</body>
</html>
	    
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

</body>
</html>