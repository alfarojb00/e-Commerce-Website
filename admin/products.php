<?php include 'includes/session.php'; ?>
<?php
$where = '';
if (isset($_GET['category'])) {
  $catid = $_GET['category'];
  $where = 'WHERE category_id =' . $catid;
}

?>
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
          Product List
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Products</li>
          <li class="active">Product List</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <?php
        if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
          unset($_SESSION['success']);
        }
        ?>

        <div class="modal fade" id="delete">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Delete</b></h4>
              </div>

              <div class="modal-body">
                <h4>Are you sure you want to delete this product?</h4>
              </div>

              <div class="modal-footer">
                <form action="products_delete.php" method="POST">
                  <input name="id" class="hidden" id="myID">
                  <button type="submit" name="delete"class="btn btn-danger pull-right">
                    <i class="fas fa-trash"></i> &nbsp; Remove</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <a href="#addnew" data-toggle="modal" class="btn btn-success" id="addproduct"><i class="fa fa-plus"></i> New</a>
                <div class="pull-right">
                  <form class="form-inline">
                    <div class="form-group">
                      <label>Category: </label>
                      <select class="form-control input-sm" id="select_category">
                        <option value="0">ALL</option>
                        <?php
                        $conn = $pdo->open();

                        $stmt = $conn->prepare("SELECT * FROM category");
                        $stmt->execute();

                        foreach ($stmt as $crow) {
                          $selected = ($crow['id'] == $catid) ? 'selected' : '';
                          echo "
                            <option value='" . $crow['id'] . "' " . $selected . ">" . $crow['name'] . "</option>
                          ";
                        }

                        $pdo->close();
                        ?>
                      </select>
                    </div>
                  </form>
                </div>
              </div>
              <?php include 'includes/products_modal.php'; ?>
              <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Views Today</th>
                    <th>Tools</th>
                  </thead>
                  <tbody>
                    <?php
                    $conn = $pdo->open();

                    try {
                      $now = date('Y-m-d');
                      $stmt = $conn->prepare("SELECT * FROM category");
                      $stmt->execute();
                      $category = $stmt->fetchAll();

                      $stmt = $conn->prepare("SELECT * FROM products $where");
                      $stmt->execute();

                      foreach ($stmt as $row) {
                        $image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/noimage.jpg';
                        $counter = ($row['date_view'] == $now) ? $row['counter'] : 0;
                        include 'includes/products_modal2.php';
                        echo "
                          <tr>
                            <td>" . $row['name'] . "</td>
                            <td>
                              <img src='" . $image . "' height='30px' width='30px'>
                              <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i></a></span>
                            </td>
                            <td><a href='#description' data-toggle='modal' class='btn btn-info btn-sm btn-flat desc' data-id='" . $row['id'] . "'><i class='fa fa-search'></i> View</a></td>
                            <td>&#8369; " . number_format($row['price'], 2) . "</td>
                            <td>" . $row['productquantity'] . "</td>
                            <td>" . $counter . "</td>
                            <td>
                              <button class='btn btn-success btn-sm edit btn-flat' data-toggle='modal' data-id='edit" . $row['id'] . "' href='#edit" . $row['id'] . "'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['id'] . "' href='#delete' onclick='remove(".$row['id'].")'><i class='fa fa-trash'></i> Delete</button>
                            </td>
                          </tr>
                        ";
                      }
                    } catch (PDOException $e) {
                      echo $e->getMessage();
                    }

                    $pdo->close();
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
    <?php include 'includes/footer.php'; ?>
    


  </div>
  <!-- ./wrapper -->

  <?php include 'includes/scripts.php'; ?>

  <script>
    $(function() {
      $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        $('#edit').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        $('#delete').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.photo', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.desc', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        getRow(id);
      });

      $('#select_category').change(function() {
        var val = $(this).val();
        if (val == 0) {
          window.location = 'products.php';
        } else {
          window.location = 'products.php?category=' + val;
        }
      });

      $('#addproduct').click(function(e) {
        e.preventDefault();
        getCategory();
      });

      $("#addnew").on("hidden.bs.modal", function() {
        $('.append_items').remove();
      });

      $("#edit").on("hidden.bs.modal", function() {
        $('.append_items').remove();
      });

    });
    function remove(data){
      
      $('#myID').val(data);
    }
    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'products_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('#desc').html(response.description);
          $('.name').html(response.prodname);
          $('.prodid').val(response.prodid);
          $('#edit_name').val(response.prodname);
          $('#catselected').val(response.category_id).html(response.catname);
          $('#edit_price').val(response.price);
          CKEDITOR.instances["editor2"].setData(response.description);
          getCategory();
        }
      });
    }

    function getCategory() {
      $.ajax({
        type: 'GET',
        url: 'category_fetch.php',
        dataType: 'json',
        success: function(response) {
          
          $('#category').append(response);
          $('#edit_category').append(response);
        }
      });
    }
  </script>
</body>

</html>