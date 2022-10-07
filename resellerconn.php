<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="city.js"></script> 
</head>

<style>
  body { background-image: url('images/BG_BANNER/Distriwall3.png');
    background-size: 100% 100%; }
  .flexgroup3 { display: flex; flex-direction: row; }
  .one, .two { width: auto; }
  .two { 
    box-shadow: 10px 10px 10px #777; 
    background: #999; margin: 5%; 
    position:relative;
	
    top: 100px;

  }
  .disth1 { margin: 0; padding: 20px; background: #305A30; color: #EEE; }
  .disth2 { margin: 0; padding: 5px; background: #EEE; color: #305A30; }
  .twoforms { padding: 4%; color: #FFF; }
  .apform { color: #305A30; }
  .apform:hover { color: #FFF; }
  .resellerform { padding: 4%; color: #EEE; }
  .getstarted {
    padding: 15px;
    background: #305A30;
    font-size: 15px;
    width: 200px;
    text-align: center;
    border-radius: 2em;
    border: none;
    margin-top: 15%;
    margin-bottom: 5%;
  }
  .getstarted a { color: #FFF; }
  .getstarted:hover { background: #559E54; }
  #submit_id , #submit_appform { width: 100%; border: none; border-radius: 2em; padding: 2%; }
  #province, #city {
    width:100%;
    color: #111;
    padding: 1%;
    margin-bottom: 10px;
    border: none;
    border-radius: 1em;
  }
</style>

<body class="hold-transition skin-blue layout-top-nav">
  <div class="flexgroup3">
    <div class="one">
      
    </div>
    <div class="two">
      <h1 class="disth1" style="text-align:center">RESELLER</h1>
      <h3 class="disth2" style="text-align:center">₱ 2,880.00</h3>

      <div class="twoforms">
      <?php
        error_reporting(E_ERROR | E_PARSE);
        if ($user['id_verified'] == '' && $user['apform_verified'] == '') { 
          if ($user['id'] == ''){ ?>

            
            <h4><i class="fa-solid fa-check"></i> &emsp; 
            Php 340.00 per pack on humicPlus and humicVet  product</h4>
            <h4><i class="fa-solid fa-check"></i> &emsp;
            Customer SRP Price, Php 600.00 humicPlus and humicVet  product</h4>
            <h4><i class="fa-solid fa-check"></i> &emsp;
            Discount 20%</h4>

            <div style="text-align: center;">
              <button class="getstarted"><a href='login.php'>Get Started</a></button>
            </div>
            
          <?php }
          else { ?>
            <!-- NO ID and APPLICATION FORM SUBMITTED-->
            <form method="post" enctype="multipart/form-data" action="resellerID.php">
              <div class="form-group">
                <h3 style="text-align:Left">ID Verification</h3>
                <p style="text-align:Left">Unified Multi-Purpose ID, Driver License and ETC.</p>
                <label>Upload</label>
                <input type="file" id="photo" name="photo"/>
                <h3 style="text-align:Left">Location</h3>
                <p style="text-align:Left">Please select your province and city.</p>
                <select id="province" name="province"></select>
                <select id="city" name="city"></select>
              </div>
              <input type="submit" name="submit" value="Submit" class="btn btn-success"
              id="submit_id">
            </form>
            <hr>

      <?php }} 
        else if ($user['id_verified'] == '0' && $user['apform_verified'] == '') { ?>
        <!-- ID SUBMITTED, WAITING FOR APPROVAL -->
        <h3 style="text-align: center; margin-top: 20%; height: 150px;">
        Verifying your ID credentials...</h3>
        <form
					action="cancel.php" method="POST"
				 >
					<input name="userid" value="<?php echo $user['id'] ?>" style="display: none;"/>
          <input name="accType" value="reseller" style="display: none;"/>
					<button  name='cancel'>Cancel</button>
				</form>
      <?php }
        else if ($user['id_verified'] == '1' && $user['apform_verified'] == '') { ?> 
        <!-- ID VERIFIED, SUBMITTING APPLICATION FORM -->
        <form method="post" enctype="multipart/form-data" action="resellerApplication.php">
          <h3 style="text-align:Center"></h3>
          <h3 style="text-align:Left">Application Form</h3>
          <a class="apform" href="#">Application Form</a>
          <p style="text-align:Left">Download and fill out the application form then submit it here</p>
          <div class="form-group">
            <label>Upload</label>
            <input type="file" id="file" name ="file"/>
            <br>
          </div>
          <input type="submit" name="submit" value="Submit" class="btn btn-success"
          id="submit_appform">
        </form>
        <hr>
        

      <?php } 
        else if ($user['id_verified'] == '1' && $user['apform_verified'] == '0') { ?>
        <!-- APPLCIATION FORM SUBMITTED, WAITING FOR APPROVAL -->
          <h3 style="text-align: center; margin-top: 20%; height: 150px;">
          Processing your application...</h3>
          <form
					action="cancel.php" method="POST"
				 >
					<input name="userid" value="<?php echo $user['id'] ?>" style="display: none;"/>
          <input name="accType" value="reseller" style="display: none;"/>
					<button  name='cancel'>Cancel</button>
				</form>
      <?php }
        else if ($user['id_verified'] == '1' && $user['apform_verified'] == '1') {
          if  ($user['paid'] == '1') { ?>
            <h3 style="text-align: center; margin-top: 20%; height: 150px;">
            You are now a Reseller</h3>

          <?php }
          else { ?>
            <h3 style="text-align:Left; height: 150px;">Payment method</h3>
            <?php
            if(isset($_SESSION['user'])){
              echo "
                <div align=center id='paypal-button'></div>
              "; }
            else{
              echo "
                <h4>You need to <a href='login.php'>Login</a> to checkout.</h4>
              ";}
            ?>
          <hr>
        <?php } } ?>
      </div>

    </div>
  </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<?php include 'includes/scripts.php'; ?>


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
      window.location = 'sales.php?pay='+payment.id;
        });
    },

}, '#paypal-button');
</script>

<script>
window.onload = function() {
  var $ = new City();
  $.showProvinces("#province");
  $.showCities("#city");
  console.log($.getProvinces());
  console.log($.getAllCities());
  console.log($.getCities("Batangas")); 
}
</script>

</body>
</html>
