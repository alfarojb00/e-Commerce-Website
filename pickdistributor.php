<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition register-page">
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
    	<p class="login-box-msg">Pick Your Distributor</p>

    	<form method="POST">
		<li >
              <?php
             
                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM users where plan_type=1");
                  $stmt->execute();
                  foreach($stmt as $row){
                    echo "
                      <li><a href= profile.php?profile=".$row['plan_type']."'>".$row['firstname'],' '.$row['lastname']."</a></li>
                    ";       
                    $stmt = $conn->prepare("UPDATE users SET distributor_id =:distributor_id WHERE id=:id ");
                    $stmt->execute(['distributor_id'=> 'id','id'=>$user['id']]);         
                  }
                }
                catch(PDOException $e){
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

              ?>
            </ul>
            </li>
          <hr>
    	</form>
      <br>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>