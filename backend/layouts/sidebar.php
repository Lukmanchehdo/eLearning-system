  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?menu=home" class="brand-link">
      <img src="dist/img/PTSLogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
      <span class="brand-text font-weight-light">eLearning</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user-logo.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['school_name_th']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-header">MENU MEMBER</li>
           <li class="nav-item">
            <a href="?menu=home" class="nav-link <?php if ($_GET["menu"] == "home"){ echo "active"; } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if (($_GET["menu"] == "school") OR ($_GET["menu"] == "school-view")){ echo "menu-open"; } ?>">
            <a href="#" class="nav-link <?php if (($_GET["menu"] == "school") OR ($_GET["menu"] == "school-view")){ echo "active"; } ?>">
              <i class="nav-icon fas fa-school"></i>
              <p>
                โรงเรียน
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?menu=school-view&school_id=<?php echo urlencode(encrypt($_SESSION['school_id'])); ?>" class="nav-link <?php if ($_GET["menu"] == "school-view"){ echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อมูลโรงเรียน</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php if (($_GET["menu"] == "user") OR ($_GET["menu"] == "user-edit")){ echo "menu-open"; } ?>">
            <a href="#" class="nav-link <?php if (($_GET["menu"] == "user") OR ($_GET["menu"] == "user-edit")){ echo "active"; } ?>">
              <i class="nav-icon fas fa-id-card"></i>
              <p>
                บัญชีผู้ใช้
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?menu=user-edit&user_id=<?php echo urlencode(encrypt($_SESSION['user_id'])); ?>" class="nav-link <?php if ($_GET["menu"] == "user-edit"){ echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แก้ไขบัญชีผู้ใช้</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php if (($_GET["menu"] == "learning") OR ($_GET["menu"] == "learning-add")){ echo "menu-open"; } ?>">
            <a href="#" class="nav-link <?php if (($_GET["menu"] == "learning") OR ($_GET["menu"] == "learning-add")){ echo "active"; } ?>">
              <i class="nav-icon fab fa-leanpub"></i>
              <p>
                แหล่งเรียนรู้
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?menu=learning" class="nav-link <?php if ($_GET["menu"] == "learning"){ echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อมูลแหล่งเรียนรู้</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?menu=learning-add" class="nav-link <?php if ($_GET["menu"] == "learning-add"){ echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มข้อมูลแหล่งเรียนรู้</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php if (($_GET["menu"] == "sudent") OR ($_GET["menu"] == "sudent-view")){ echo "menu-open"; } ?>">
            <a href="#" class="nav-link <?php if (($_GET["menu"] == "sudent") OR ($_GET["menu"] == "sudent-view")){ echo "active"; } ?>">
              <i class="nav-icon fab fa-leanpub"></i>
              <p>
                นักเรียน
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?menu=student" class="nav-link <?php if ($_GET["menu"] == "student"){ echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อมูลนักเรียน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link <?php //if ($_GET["menu"] == "learning-add"){ echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มข้อมูลแหล่งเรียนรู้</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

