<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php
  if (!empty($_GET["user_id"])) {

    $sql = "SELECT * FROM tbl_user INNER JOIN tbl_school ON tbl_user.school_id = tbl_school.school_id WHERE tbl_user.user_id ='" . $_GET["user_id"] . "'";
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
    if (@$_GET["Action"] == "insert") {

      if (($_POST["school_id"] != "")) {

        $sql = "INSERT INTO tbl_user(user_name, password, school_id, role, created_at, updated_at) 
        VALUES (
        '" . $_POST["user_name"] . "', '" . md5($_POST["password"]) . "', '" . $_POST["school_id"] . "', '" . $_POST["role"] . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "')";
        
        $result = $conn->query($sql);
        if ($result==true) { 
          ?>

          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> เพิ่มข้อมูลเรียบร้อย!</h5>
            กรุณารอสักครู่.
          </div>
          <META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=user">
          
          <?php
        }
      } else {

        echo '<script> window.setTimeout("history.back();", 3000);</script>';
      }
    }
    if (@$_GET["Action"] == "edit") {

      if (($_GET["user_id"] != "")) {

        $sql = "UPDATE tbl_user SET user_name = '" . $_POST["user_name"] . "', password = '" . md5($_POST["password"]) . "', school_id = '" . $_POST["school_id"] . "', updated_at = '" . date("Y-m-d H:i:s") . "' WHERE user_id = '" . $_GET["user_id"] . "'";
        
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
    if (!empty($_GET["user_id"])) {
      ?>
      <form method="POST" action="?menu=user-add&Action=edit&user_id=<?php echo $_REQUEST["user_id"]; ?>">
      <?php } else { ?>
        <form method="POST" action="?menu=user-add&Action=insert">
        <?php } ?>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ข้อมูลทั่วไป</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="amphur">โรงเรียน</label>
                      <select class="form-control select2bs4" style="width: 100%;" id="school_id" name="school_id" required>
                        <?php
                        if (!empty(@$row["school_id"])) {
                          ?>
                          <?php
                          $sql_1 = "SELECT * FROM tbl_school";
                          $result_1 = $conn->query($sql_1);
                          $i = 0;
                          while ($row_1 = $result_1->fetch_assoc()) {
                            $i++;
                            ?>
                            <option value="<?php echo $row_1["school_id"]; ?>" <?php if (@$row["school_id"] == $row_1["school_id"]){ echo "selected"; } ?>><?php echo $row_1["school_name_th"]; ?></option>
                          <?php } } else { ?>
                            <option selected="">-- เลือกโรงเรียน --</option>
                            <?php
                            $sql_1 = "SELECT * FROM tbl_school WHERE school_id NOT IN (SELECT school_id FROM tbl_user)";
                            $result_1 = $conn->query($sql_1);
                            $i = 0;
                            while ($row_1 = $result_1->fetch_assoc()) {
                              $i++;
                              ?>
                              <option value="<?php echo $row_1["school_id"]; ?>"><?php echo $row_1["school_name_th"]; ?></option>
                            <?php } } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="user_name">ชื่อผู้ใช้</label>
                          <input type="text" id="user_name" name="user_name" value="<?php echo @$row['user_name']; ?>" class="form-control" required pattern="^[A-Za-z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" maxlength="10" minlength="5">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="password">รหัสผ่าน</label>
                          <input type="password" id="password" name="password" value="<?php echo @$row['password']; ?>" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="role">บทบาท</label>
                          <select class="form-control select2bs4" style="width: 100%;" id="role" name="role" required>
                            <?php if (!empty(@$row["school_id"])) { ?>
                              <option value="Member" <?php if (@$row["role"] == "Member"){ echo "selected"; } ?>>Member</option>
                              <option value="Admin" <?php if (@$row["role"] == "Admin"){ echo "selected"; } ?>>Admin</option>
                            <?php } else { ?>
                              <option selected="">-- เลือกบทบาท --</option>
                              <option value="Member">Member</option>
                              <option value="Admin">Admin</option>
                            <?php  } ?>
                          </select>
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