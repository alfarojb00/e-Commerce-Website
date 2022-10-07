<?php include 'includes/session.php'; ?>

<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }
?>

<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html>
<head>
 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link rel="stylesheet" href="custom.css">
</head>
<style>
@media (max-width: 575.98px) { 
   
  .flexgroup {
    display: flex;
    flex-direction: row;
  }
 
}
  body {
    background-image: url('images/BG_BANNER/LoginHome2.png');
    background-repeat: no-repeat;
    background-size: 100% 100%;
  }
 
  .login-box-body{

  }
  .flexgroup {
    display: flex;
    flex-direction: row;
  }
  .login-box{
    flex:1;
  }
</style>

<body class="hold-transition skin-blue layout-top-nav">
  
      <div class="login-box">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='callout callout-danger text-center'>
              <p>".$_SESSION['error']."</p> 
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='callout callout-success text-center'>
              <p>".$_SESSION['success']."</p> 
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="verify.php" method="POST">
            <div class="form-group has-feedback">
              <input type="email" class="form-control" name="email" placeholder="Email" required>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" name="password" placeholder="Password" required>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <hr>
            <div class="row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-success" name="login">
                <i class="fa fa-sign-in"></i> Sign In</button>
              </div>
            </div>
        </form>
        <br>
        <a href="password_forgot.php">I forgot my password</a><br>
        <a href="signup.php" class="text-center">Register a new membership</a><br>
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
      </div>
      </div>
 

<?php include 'includes/scripts.php' ?>
</body>
</html> 