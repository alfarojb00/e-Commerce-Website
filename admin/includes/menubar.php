<style>
  #mainsidebar {
    background: #3e4444;
    box-shadow: 5px 5px 5px #989898;
  }
  #titles {
    background: #383C3C;
    color: #FFF;
  }
</style>


<aside class="main-sidebar" id="mainsidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="header" id="titles">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
      <li><a href="sales.php"><i class="fa fa-money"></i><span>Sales</span></a></li>

      <li class="header" id="titles">MANAGE</li>
      <li><a href="users.php"><i class="fa fa-user"></i><span>User Account Record</span></a></li>
      <li><a href="users1.php"><i class="fa fa-user"></i><span>Distributors</span></a></li>
      <li><a href="resellers.php"><i class="fa fa-user"></i><span>Resellers</span></a></li>

      <li class="header" id="titles">PRODUCTS</li>
      <li><a href="products.php"><i class="fa fa-users"></i><span>Product List</span></a></li>
      <li><a href="category.php"><i class="fa fa-users"></i><span>Category</span></a></li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>