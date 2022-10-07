<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reseller Applications
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th></th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Date Added</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                    $res = $conn->prepare("SELECT * FROM users WHERE res_id != ''");
                    $res->execute();
                    foreach ($res as $r) {
                  ?>
                  <tr>
                    <td>
                      <?php
                        if ($r['id_verified'] == '0' && $r['apform_verified'] == '') { ?>
                          <span class='pull-right'>
                            <a href='#open_id' class='photo' data-toggle='modal'
                            data-id='<?php $r['id'] ?>'><i class='fa fa-eye'></i></a>
                          </span>
                        <?php }
                        if ($r['id_verified'] == '1' && $r['apform_verified'] == '0') { ?>
                          <span class='pull-right'>
                            <a href='#open_apform' class='photo' data-toggle='modal'
                            data-id='<?php $r['id'] ?>'><i class='fa fa-eye'></i></a>
                          </span>
                        <?php }
                      ?>
                      
                    </td>
                    <td><?php echo $r['email']; ?></td>
                    <td><?php echo $r['firstname'] . " " . $r['lastname']; ?></td>
                    <td><?php 
                      if ($r['id_verified'] == '0' && $r['apform_verified'] == '') 
                        echo "ID verification";
                      else if ($r['id_verified'] == '1' && $r['apform_verified'] == '')
                        echo "ID verified";
                      else if ($r['id_verified'] == '1' && $r['apform_verified'] == '0')
                        echo "Application Submitted";
                      else if ($r['id_verified'] == '1' && $r['apform_verified'] == '1')
                        if ($r['paid'] == '1')
                          echo "Paid";
                        else
                          echo "Application Approved";
                    ?></td>
                    <td><?php echo $r['created_on']; ?></td>
                    <td>
                      <?php 
                        if ($r['id_verified'] == '0' && $r['apform_verified'] == '') {
                      ?>
                      <form method="post" action="accept_decline2.php">
                        <div class="form-group">
                        <input type="text" name="user_id" value="<?php echo $r['id']; ?>" hidden >
                        <input type="submit" name="accept_id" value="Accept" class="btn btn-success">
                        <input type="submit" name="decline_id" value="Decline" class="btn btn-danger">
                      </form>

                      <?php }
                        else if ($r['id_verified'] == '1' && $r['apform_verified'] == '') {
                          echo "Waiting for application form";
                        }
                        else if ($r['id_verified'] == '1' && $r['apform_verified'] == '0') { ?>
                          <form method="post" action="accept_decline2.php">
                            <div class="form-group">
                            <input type="text" name="user_id" value="<?php echo $r['id']; ?>" hidden >
                            <input type="submit" name="accept_apform" value="Accept" class="btn btn-success">
                            <input type="submit" name="decline_apform" value="Decline" class="btn btn-danger">
                          </form>

                      <?php }
                        else if ($r['id_verified'] == '1' && $r['apform_verified'] == '1') {
                          if ($r['paid'] == '1') { ?>
                            <label style="
                              background: green; color: #FFF; padding: 5px;
                            ">Completed</label>
                          <?php }
                          else { ?>
                            <form method="post" action="accept_decline2.php">
                              <div class="form-group">
                              <input type="text" name="user_id" value="<?php echo $r['id']; ?>" hidden >
                              <input type="submit" name="user_paid" value="Payment Received" class="btn btn-success">
                            </form>
                          <?php }
                        }
                      ?>


                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                  <!--
                  <?php
                    $conn = $pdo->open();

                    try{
                     
                      $stmt = $conn->prepare(" SELECT * FROM users JOIN distributorid ON users.id=distributorid.user_id ORDER BY users.lastname;"); 
                      $stmt->execute(['type'=>0]);
                      foreach($stmt as $row){
                        $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                        
                        echo "
                          <tr>
                            <td>
                              <img src='".$image."' height='30px' width='30px'>
                              <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='".$row['id']."'><i class='fa fa-edit'></i></a></span>
                            </td>
                            <td>".$row['email']."</td>
                            <td>".$row['firstname'].' '.$row['lastname']."</td>
                            <td>
                            <p>ID Verification</p>
                            </td>
                            <td>".date('M d, Y', strtotime($row['created_on']))."</td>
                            <td>
                              <button class='btn btn-success btn-sm btn-flat' data-id='".$row['id']."'></i> Accept </button>
                              <button class='btn btn-danger btn-sm remove btn-flat' data-id='".$row['id']."'></i> Decline</button>
                            </td>
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                  -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/resellers_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.remove', function(e){
    $conn = $pdo->open();
    $stmt = $conn->prepare(" DELETE FROM  distributorid WHERE id=:id");
      
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'User deleted successfully';
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.status', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'distributorid_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.id);
      $('#edit_email').val(response.email);
      $('#edit_password').val(response.password);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_address').val(response.address);
      $('#edit_contact').val(response.contact_info);
      $('.fullname').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>
</body>
</html>
