<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php
  if (!empty($_GET["learning_type_id"])) {

    $sql = "SELECT * FROM tbl_learning_type WHERE learning_type_id ='" . $_GET["learning_type_id"] . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>แก้ไขข้อมูลประเภทแหล่งเรียนรู้: <?php echo $row['learning_type_name']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">แก้ไขข้อมูลประเภทแหล่งเรียนรู้: <?php echo $row['learning_type_name']; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <?php } else { ?>

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>เพิ่มข้อมูลประเภทแหล่งเรียนรู้</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">เพิ่มข้อมูลประเภทแหล่งเรียนรู้</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <?php } ?>


  <!-- Main content -->
  <section class="content">

    <?php
    if (@$_GET["Action"] == "insert") {

      if (($_POST["learning_type_name"] != "")) {

        $sql = "INSERT INTO tbl_learning_type(learning_type_name, created_at, updated_at) 
        VALUES (
        '" . $_POST["learning_type_name"] . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "')";
        
        $result = $conn->query($sql);
        if ($result==true) { 
          ?>

          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> เพิ่มข้อมูลเรียบร้อย!</h5>
            กรุณารอสักครู่.
          </div>
          <META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=learning_type">
          
          <?php
        }
      } else {

        echo '<script> window.setTimeout("history.back();", 3000);</script>';
      }
    }
    if (@$_GET["Action"] == "edit") {

      if (($_POST["learning_type_name"] != "") AND ($_GET["learning_type_id"] != "")) {

        $sql = "UPDATE tbl_learning_type SET learning_type_name = '" . $_POST["learning_type_name"] . "', updated_at = '" . date("Y-m-d H:i:s") . "' WHERE learning_type_id = '" . $_GET["learning_type_id"] . "'";
        
        $result = $conn->query($sql);
        if ($result==true) { 
          ?>

          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> แก้ไขข้อมูลเรียบร้อย!</h5>
            กรุณารอสักครู่.
          </div>
          <META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=learning_type">
          
          <?php
        }
      } else {

        echo '<script> window.setTimeout("history.back();", 3000);</script>';
      }
    }
    ?>

    

    <?php
    if (!empty($_GET["learning_type_id"])) {
      ?>
      <form method="POST" action="?menu=learning_type-add&Action=edit&learning_type_id=<?php echo $_REQUEST["learning_type_id"]; ?>">
      <?php } else { ?>
        <form method="POST" action="?menu=learning_type-add&Action=insert">
        <?php } ?>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ข้อมูลประเภทแหล่งเรียนรู้</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="learning_type_name">ประเภทแหล่งเรียนรู้</label>
                      <input type="text" id="learning_type_name" name="learning_type_name" value="<?php echo @$row['learning_type_name']; ?>" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a href="?menu=home" class="btn btn-secondary">ยกเลิก</a>
            <input type="submit" value="บันทึกข้อมูล" class="btn btn-success float-right">
          </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
  </div>