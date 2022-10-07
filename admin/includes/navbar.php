<style>
  #static {
    background: #559E54;
  }

  #logo {
    background: #305A30;
  }

  #dd:hover {
    background: none;
  }

  #dmenuadmin .user-header {
    background: #3e4444;
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

<header class="main-header">
  <!----------------------- LOGO ----------------------- -->
  <a href="#" class="logo" id="logo">
    <span class="logo-mini">MI</span>
    <span class="logo-lg"><b>MARP</b> Inc.</span>
  </a>

  <!----------------------- STATIC HEADER ----------------------- -->
  <nav class="navbar navbar-static-top" id="static">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" id="dd">
      <span class="sr-only">Toggle navigation</span>

    </a>

    <!----------------------- ADMIN MENU ----------------------- -->
    <div class="navbar-custom-menu">

      <ul class="nav navbar-nav">
        <div class="notif-parent">
          <div onclick="showNotif()">
            <i class="fa fa-bell" style="font-size:24px"></i>
          </div>

          <ul class="notif" id="notif-body">
              <?php
                $conn = $pdo->open();
                $stmt = $conn->prepare("SELECT p.name,n.notificationid FROM notifications n inner join products p  on n.productid = p.id WHERE n.userid = :userid");
                $stmt->execute(['userid'=>$admin['id']]);
                $result = $stmt->fetchall();
                foreach($result as $row){
                  ?>
                    <li><label><?php echo $row['name']?></label></li>
                  <?php
                }
              ?>
          </ul>
        </div>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo (!empty($admin['photo'])) ? '../images/' . $admin['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $admin['firstname'] . ' ' . $admin['lastname']; ?></span>
          </a>


          <ul class="dropdown-menu" id="dmenuadmin">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo (!empty($admin['photo'])) ? '../images/' . $admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
              <p>
                <?php echo $admin['firstname'] . ' ' . $admin['lastname']; ?>
                <small>Member since <?php echo date('M. Y', strtotime($admin['created_on'])); ?></small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-success" id="admin_profile">Update</a>
              </div>
              <div class="pull-right">
                <a href="../logout.php" class="btn btn-danger">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <script>
    function showNotif() {
      let body = document.getElementById("notif-body");
      if (body.style.display == "none") {
        body.style.display = "block";
      } else {
        body.style.display = "none";
      }
    }


    let allData = JSON.parse(`<?php echo json_encode($result);?>`);

    let notifBody = document.getElementById("notif-body");
    async function checkNotif(id){

        try {
          const data = await(await fetch(`../checkfornotif.php?id=${id}`,{
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
   checkNotif(<?php echo $admin['id']?>);
  </script>
</header>

<?php include 'includes/profile_modal.php'; ?>