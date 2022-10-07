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
    .register-box  {
    position:relative;
    top:50px;
    left:4px;
    margin-top: 200px;
    margin-right: 200px;
    box-shadow: 10px 10px 10px #333;
  }
  .flexgroup {
    display: flex;
    flex-direction: row;
  }
  .one, .two, .three {
    width: 100%;
  }
}
  body {
    background-image: url('images/BG_BANNER/wallresel.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
  }
  .register-box {
    position:relative;
    margin-top: 100px;
    box-shadow: 10px 10px 10px #333;
    
  }
   .register-box-body{
    width:100%;
    
  } 
  .flexgroup {
    display: flex;
    flex-direction: row;
  }
  .three {
    width: 100%;
  }
</style>

<body class="hold-transition skin-blue layout-top-nav">
  <div class="flexgroup">
    <div class="one">

    </div>
    <div class="two">

    </div>
    <div class="three" id="signupset">
    <div class="register-box">
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
      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="register.php" method="POST">
            <div class="form-group has-feedback">
              <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" name="password" placeholder="Password" title="password must contain special characters ( @ , # , ! , $ ..)" 
              pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^0-9a-zA-Z]).{8,}$" minlength="8" required>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" name="repassword" placeholder="Retype password" title="password must contain special characters ( @ , # , ! , $ ..)"  
              pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^0-9a-zA-Z]).{8,}$" minlength="8" required>
              <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <hr>
            <div class="row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-success" name="signup">
                  <i class="fa fa-pencil"></i> Sign Up</button>
              </div>
            </div>
        </form>
        <br>
        <a href="login.php">I already have a membership</a><br>
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
      </div>
    </div>
  </div>
<?php include 'includes/scripts.php' ?>
</body>
</html>



