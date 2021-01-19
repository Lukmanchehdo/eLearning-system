  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../" class="nav-link" target="_blank"><i class="far fa-eye"></i> เยี่ยมชมเว็บไซต์</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="../dist/img/user-logo.jpg" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"><?php echo $_SESSION['school_name_th']; ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="../dist/img/user-logo.jpg" class="img-circle elevation-2" alt="User Image">

            <p>
              <?php echo @$_SESSION['school_name_th']; ?>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="?menu=school-view&school_id=<?php echo $_SESSION['school_id']; ?>" class="btn btn-default btn-flat">Profile</a>
            <a href="?Action=logout" class="btn btn-default btn-flat float-right">Sign out</a>
          </li>
        </ul>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->
  <?php
if (@$_GET["Action"] == "logout") {

    session_destroy();

    header("Location: ../../");
}
?>