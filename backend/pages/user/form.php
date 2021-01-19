<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php
  if (!empty($_GET["user_id"])) {

    $sql = "SELECT * FROM tbl_user INNER JOIN tbl_school ON tbl_user.school_id = tbl_school.school_id WHERE tbl_user.user_id ='" . decrypt(urldecode(@$_GET['user_id'])) . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>แก้ไขข้อมูลบัญชีผู้ใช้: <?php echo $row['school_name_th']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">แก้ไขข้อมูลบัญชีผู้ใช้: <?php echo $row['school_name_th']; ?></li>
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
            <h1>เพิ่มข้อมูลบัญชีผู้ใช้</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">เพิ่มข้อมูลบัญชีผู้ใช้</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <?php } ?>


  <!-- Main content -->
  <section class="content">

    <?php
    if (@$_GET["Action"] == "edit") {

      if (($_GET["user_id"] != "") && ($_POST["new_password"] != "")) {

        if(md5($_POST["con_password"]) != $_POST["old_password"] ){

          ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> ยืนยั่นรหัสผ่านเดิมไม่ตรงกัน!</h5>
            กรุณารอสักครู่.
          </div>
          <?php

          //echo '<script> window.setTimeout("history.back();", 3000);</script>';
        }else{

          $sql = "UPDATE tbl_user SET password = '" . md5($_POST["new_password"]) . "', updated_at = '" . date("Y-m-d H:i:s") . "' where user_id = '" . $_GET["user_id"] . "'";
          $result = $conn->query($sql);

          if ($result == true) { ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-check"></i> แก้ไขข้อมูลบัญชีผู้ใช้เรียบร้อย!</h5>
              กรุณาเข้าสู่ระบบอีกครั้ง.
            </div>
            <?php
            session_destroy();
          } else {

            echo '<script> window.setTimeout("history.back();", 3000);</script>';
          }

        }
      }
      echo '<script> window.setTimeout("history.back();", 3000);</script>';
    }
    ?>
    <form method="POST" action="?menu=user-edit&Action=edit&user_id=<?php echo urlencode(encrypt(@$_GET['user_id'])); ?>">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ข้อมูลทั่วไป</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="user_name">ชื่อผู้ใช้</label>
                    <input type="text" id="user_name" name="user_name" value="<?php echo @$row['user_name']; ?>" class="form-control" pattern="^[A-Za-z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" maxlength="10" minlength="5" disabled>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="usr">รหัสผ่านใหม่ :</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="รหัสผ่านใหม่" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="usr">ยืนยันรหัสผ่านเดิม :</label>
                    <input type="password" class="form-control" id="con_password" name="con_password" placeholder="ยืนยันรหัสผ่านเดิม" required>

                    <input type="hidden" class="form-control" id="old_password" name="old_password" value="<?php echo @$row["password"]; ?>">
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