<?php
@ob_start();
@session_start();
include("../config/connect.php");
include("../config/date_time.php");
$content = isset($_GET["menu"])?$_GET["menu"]:"home";
if ($_SESSION['login'] != "Admin") {
  header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
<?php include("layouts/head.php");?>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include("layouts/nav.php");?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("layouts/sidebar.php");?>

    <!-- Content Wrapper. Contains page content -->
    <?php
    switch($content) {
      case "home"                   : include("pages/main.php");                     break;

      case "school"                 : include("pages/school/index.php");             break;
      case "school-view"            : include("pages/school/view.php");              break;
      case "school-add"             : include("pages/school/form.php");              break;
      case "school-edit"            : include("pages/school/form.php");              break;

      case "user"                   : include("pages/user/index.php");               break;
      case "user-view"              : include("pages/user/view.php");                break;
      case "user-add"               : include("pages/user/form.php");                break;
      case "user-edit"              : include("pages/user/form.php");                break;

      case "learning_type"          : include("pages/learning_type/index.php");      break;
      case "learning_type-view"     : include("pages/learning_type/view.php");       break;
      case "learning_type-add"      : include("pages/learning_type/form.php");       break;
      case "learning_type-edit"     : include("pages/learning_type/form.php");       break;

      case "copyright"              : include("pages/copyright/index.php");          break;
      case "copyright-view"         : include("pages/copyright/view.php");           break;
      case "copyright-add"          : include("pages/copyright/form.php");           break;
      case "copyright-edit"         : include("pages/copyright/form.php");           break;

      case "learning"               : include("pages/learning/index.php");           break;
      case "learning-view"          : include("pages/learning/view.php");            break;
      case "learning-add"           : include("pages/learning/form.php");            break;
      case "learning-edit"          : include("pages/learning/form_edit.php");       break;
      case "learning-edit_img"      : include("pages/learning/edit_img.php");        break;
      case "learning-edit_vdo"      : include("pages/learning/edit_vdo.php");        break;
      
      default                       : include("pages/main.php");                           
    }
    ?>
    <!-- /.content-wrapper -->

    <?php include("layouts/footer.php");?>
    
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <?php include("layouts/jQuery.php");?>

</body>
</html>
