  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?menu=home" class="brand-link">
      <img src="../dist/img/PTSLogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
      <span class="brand-text font-weight-light">eLearning</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user-logo.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['login']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-header">MENU ADMIN</li>
           <li class="nav-item">
            <a href="?menu=home" class="nav-link <?php if ($_GET["menu"] == "home"){ echo "active"; } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if (($_GET["menu"] == "school") OR ($_GET["menu"] == "school-add")){ echo "menu-open"; } ?>">
            <a href="#" class="nav-link <?php if (($_GET["menu"] == "school") OR ($_GET["menu"] == "school-add")){ echo "active"; } ?>">
              <i class="nav-icon fas fa-school"></i>
              <p>
                โรงเรียน
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?menu=school" class="nav-link <?php if ($_GET["menu"] == "school"){ echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อมูลโรงเรียน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?menu=school-add" class="nav-link <?php if ($_GET["menu"] == "school-add"){ echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มข้อมูลโรงเรียน</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php if (($_GET["menu"] == "user") OR ($_GET["menu"] == "user-add")){ echo "menu-open"; } ?>">
            <a href="#" class="nav-link <?php if (($_GET["menu"] == "user") OR ($_GET["menu"] == "user-add")){ echo "active"; } ?>">
              <i class="nav-icon fas fa-id-card"></i>
              <p>
                บัญชีผู้ใช้
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?menu=user" class="nav-link <?php if ($_GET["menu"] == "user"){ echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อมูลบัญชีผู้ใช้</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?menu=user-add" class="nav-link <?php if ($_GET["menu"] == "user-add"){ echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มข้อมูลบัญชีผู้ใช้</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php if (($_GET["menu"] == "learning_type") OR ($_GET["menu"] == "learning_type-add")){ echo "menu-open"; } ?>">
            <a href="#" class="nav-link <?php if (($_GET["menu"] == "learning_type") OR ($_GET["menu"] == "learning_type-add")){ echo "active"; } ?>">
              <i class="nav-icon fas fa-list"></i>
              <p>
                ประเภทแหล่งเรียนรู้
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?menu=learning_type" class="nav-link <?php if ($_GET["menu"] == "learning_type"){ echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อมูลประเภทแหล่งเรียนรู้</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?menu=learning_type-add" class="nav-link <?php if ($_GET["menu"] == "learning_type-add"){ echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มประเภทแหล่งเรียนรู้</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php if (($_GET["menu"] == "copyright") OR ($_GET["menu"] == "copyright-add")){ echo "menu-open"; } ?>">
            <a href="#" class="nav-link <?php if (($_GET["menu"] == "copyright") OR ($_GET["menu"] == "copyright-add")){ echo "active"; } ?>">
              <i class="nav-icon far fa-copyright"></i>
              <p>
                การเผยแพร่
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?menu=copyright" class="nav-link <?php if ($_GET["menu"] == "copyright"){ echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อมูลการเผยแพร่</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?menu=copyright-add" class="nav-link <?php if ($_GET["menu"] == "copyright-add"){ echo "active"; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มข้อมูลการเผยแพร่</p>
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
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

