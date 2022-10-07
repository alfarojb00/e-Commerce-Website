<style>
  #nav-header {
    /* background-color: #51585f; */
    background-color: #007230;
    width: 100%;
    height: 70px;
    color: white;
    font-family: "open sans";
    position: fixed;
    font-weight: bold;
    font-size: 1.8rem;
    align-content: center;

  }

  #dmenuuser .user-header {
    background: #AAA;
    height: auto;

  }

  #dmenuuser .user-footer {
    padding-bottom: 10px;

  }

  .navbar-collapse:after {
    background-color: #AAA;
  }

  .LOGO {
    float: left;
    position: relative;
    bottom: 14px;
  }
  .notif-parent {
    position: relative;
  }

  .notif {
    background-color: white;
    width: 200px;
    padding: 5px;
    position: absolute;
    left: -100%;
    border-radius: 2px;
    display: none;
    list-style: none;
    z-index: 5;
    max-height: 200px;
    overflow: auto;
  }

  .notif label {
    border-bottom: solid black 2px;
  }
</style>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" href="custom.css">

  <header class="main-header">
    <nav class="navbar navbar-static-top" id="nav-header">
      <div class="container">
        <div class="navbar-header" title="Follow us on Facebook">
          <a href="https://www.facebook.com/MKSecretsOfficial/" class="navbar-brand">
            <img class="LOGO" src="./images/UCORPpics/Logo.png" width="120px">
          </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            <?php
            error_reporting(E_ERROR | E_PARSE);
            if ($user['user_type'] == '') { ?>
              <li><a href="modshop.php?page=1">SHOP</a></li>
              <li><a href="distributor_modal1.php">BE A DISTRIBUTOR</a></li>
              <li><a href="resellerconn.php">BE A RESELLER</a></li>
            <?php } else if ($user['user_type'] == 'Reseller') { ?>
              <li><a href="reseller_announcements.php">ANNOUNCEMENT</a></li>
              <li><a href="reseller_mydistributor.php">MY DISTRIBUTOR</a></li>
              <!--<li><a href="item_inventory.php">INVENTORY</a></li>-->
            <?php } else if ($user['user_type'] == 'Distributor') { ?>
              <li><a href="modshop.php?page=1">SHOP</a></li>
              <li><a href="distributor_myshop.php">MY SHOP</a></li>
              <li><a href="item_inventory.php">INVENTORY</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  MANAGE<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="distributor_resellerorder.php">
                      RESELLER'S ORDER</a></li>
                  <li><a class="dropdown-item" href="distributor_resellerrequest.php">
                      RESELLER REQUEST</a></li>
                  <li><a class="dropdown-item" href="distributor_saleinventory.php">
                      SALE INVENTORY</a></li>
                  <li><a class="dropdown-item" href="distributor_announcements.php">
                      ANNOUNCEMENTS</a></li>
                </ul>

              </li>
              <li class="notif-parent">
                <div onclick="showNotif()">
                  <i class="fa fa-bell" style="font-size:24px"></i>
                </div>

                <ul class="notif" id="notif-body">
                  <?php
                  $conn = $pdo->open();
                  $stmt = $conn->prepare("SELECT p.name,n.notificationid FROM notifications n inner join products p  on n.productid = p.id WHERE n.userid = :userid");
                  $stmt->execute(['userid' => $admin['id']]);
                  $result = $stmt->fetchall();
                  foreach ($result as $row) {
                  ?>
                    <li><label><?php echo $row['name'] ?></label></li>
                  <?php
                  }
                  ?>
                </ul>
              </li>
            <?php } ?>
            <!-- <li id="plan" ><a href="plan.php">PLANS</a></li> -->
            <li><a href="about.php">ABOUT US</a></li>

            <li class="dropdown">
              <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">PRODUCT CATEGORY <span class="caret"></span></a> -->

              <ul class="dropdown-menu" role="menu">
                <?php
                $conn = $pdo->open();
                try {
                  $stmt = $conn->prepare("SELECT * FROM category");
                  $stmt->execute();
                  foreach ($stmt as $row) {
                    echo "
                      <li><a href='category.php?category=" . $row['cat_slug'] . "'>" . $row['name'] . "</a></li>
                    ";
                  }
                } catch (PDOException $e) {
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();
                ?>
              </ul>
            </li>

        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->

              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <div class="carticon"> <i class="fa fa-shopping-cart"></i></div>
                <span class="label label-success cart_count"></span>
              </a>

              <ul class="dropdown-menu">
                <li class="header">You have <span class="cart_count"></span> item(s) in cart</li>
                <li>
                  <ul class="menu" id="cart_menu">
                  </ul>
                </li>
                <li class="footer"><a href="cart_view.php">Go to Cart</a></li>
              </ul>
            </li>

            <?php
            if (isset($_SESSION['user'])) {
              $image = (!empty($user['photo'])) ? 'images/' . $user['photo'] : 'images/profile.jpg';
              if ($user['isVerified']) {

                echo '
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="' . $image . '" class="user-image" alt="User Image">
                      <span class="hidden-xs">' . $user['firstname'] . ' ' . $user['lastname'] . '</span>
                    </a>
                    <ul class="dropdown-menu" id="dmenuuser"">
                      <!-- User image -->
                      <li class="user-header">
                        <img src="' . $image . '" class="img-circle" alt="User Image">
  
                        <p>
                          ' . $user['firstname'] . ' ' . $user['lastname'] . '
                          <small>Member since ' . date('M. Y', strtotime($user['created_on'])) . '</small>
                          <small>VERIFIED</small>
                        </p>
                      </li>
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="profile.php" class="btn btn-success">Profile</a>
                        </div>
                        <div class="pull-right">
                          <a href="logout.php" class="btn btn-danger">Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                ';
              } else {

                echo '
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="' . $image . '" class="user-image" alt="User Image">
                      <span class="hidden-xs">' . $user['firstname'] . ' ' . $user['lastname'] . '</span>
                    </a>
                    <ul class="dropdown-menu" id="dmenuuser"">
                      <!-- User image -->
                      <li class="user-header">
                        <img src="' . $image . '" class="img-circle" alt="User Image">
  
                        <p>
                          ' . $user['firstname'] . ' ' . $user['lastname'] . '
                          <small>Member since ' . date('M. Y', strtotime($user['created_on'])) . '</small>
                          <small>NOT VERIFIED</small>
                        </p>
                      </li>
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="profile.php" class="btn btn-success">Profile</a>
                        </div>
                        <div class="pull-right">
                          <a href="logout.php" class="btn btn-danger">Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                ';
              }
            } else {
              echo "
                <li><a href='login.php' class='loginnav'>LOGIN</a></li>
                <li><a href='signup.php' class='signinnav'>SIGNUP</a></li>
              ";
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <script>
    function showNotif() {
      let body = document.getElementById("notif-body");
      if (body.style.display == "none") {
        body.style.display = "block";
      } else {
        body.style.display = "none";
      }
    }


    let allData = JSON.parse(<?php echo json_encode($result);?>);

    let notifBody = document.getElementById("notif-body");
    async function checkNotif(id){

        try {
          const data = await(await fetch(./checkfornotif.php?id=${id},{
            method:"GET",
            headers:{
              "Content-type":"application/json"
            },
          
          })).json();
          
          if (data!=false&&!allData.find(e => e.notificationid === data.notificationid)) {
              allData.push(data);
              let li = document.createElement("li");
              let label = document.createElement("label");
              label.textContent = data.name;
              li.appendChild(label);
              notifBody.appendChild(li);
          }
          setTimeout(checkNotif(id),
            2000
          );
          
        } catch (error) {
          setTimeout(checkNotif(id),
            2000
          );
            
        }
    }
   checkNotif(<?php echo $_SESSION['user']?>);
  </script>
</head>