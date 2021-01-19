<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php
  if (!empty($_GET["learning_id"])) {

   $sql = "SELECT tbl_learning.*, tbl_copyright.copyright_img, tbl_copyright.copyright_name, tbl_learning_type.learning_type_name FROM tbl_learning INNER JOIN tbl_learning_type ON tbl_learning.learning_type_id = tbl_learning_type.learning_type_id INNER JOIN tbl_copyright ON tbl_learning.copyright_id = tbl_copyright.copyright_id WHERE tbl_learning.learning_id ='" . $_GET["learning_id"] . "'";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   ?>
   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>แก้ไขข้อมูลแหล่งเรียนรู้: <?php echo $row['learning_name']; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">แก้ไขข้อมูลแหล่งเรียนรู้: <?php echo $row['learning_name']; ?></li>
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
          <h1>เพิ่มข้อมูลแหล่งเรียนรู้</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">เพิ่มข้อมูลแหล่งเรียนรู้</li>
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

    if (($_POST["learning_name"] != "")) {

      $sql = "UPDATE tbl_learning SET learning_name = '" . $_POST["learning_name"] . "', learning_owner = '" . $_POST["learning_owner"] . "', learning_point = '" . $_POST["learning_point"] . "', learning_description = '" . $_POST["learning_description"] . "', learning_find = '" . $_POST["learning_find"] . "', learning_media = '" . $_POST["learning_media"] . "', learning_note = '" . $_POST["learning_note"] . "', learning_type_id = '" . $_POST["learning_type_id"] . "', copyright_id = '" . $_POST["copyright_id"] . "', updated_at = '" . date("Y-m-d H:i:s") . "' WHERE learning_id = '" . $_GET["learning_id"] . "'";

      $result = $conn->query($sql);

      if ($result==true) { 
        ?>

        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-check"></i> แก้ไขข้อมูลเรียบร้อย!</h5>
          กรุณารอสักครู่.
        </div>
        <META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=learning">

        <?php
      }
    } else {

      echo '<script> window.setTimeout("history.back();", 3000);</script>';
    }
  }
  ?>

  <form method="POST" enctype="multipart/form-data"  action="?menu=learning-edit&Action=edit&learning_id=<?php echo $_REQUEST["learning_id"]; ?>">

    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">ข้อมูลทั่วไป</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="learning_type_id">ประเภทแหล่งเรียนรู้</label>
                  <select class="form-control select2bs4" style="width: 100%;" id="learning_type_id" name="learning_type_id" required>
                    <option selected="">-- เลือกประเภทแหล่งเรียนรู้ --</option>
                    <?php
                    $sql_1 = "SELECT * FROM tbl_learning_type";
                    $result_1 = $conn->query($sql_1);
                    $i = 0;
                    while ($row_1 = $result_1->fetch_assoc()) {
                      $i++;
                      ?>
                      <option value="<?php echo $row_1["learning_type_id"]; ?>" <?php if (@$row["learning_type_id"] == @$row_1["learning_type_id"]){ echo "selected"; } ?>><?php echo $row_1["learning_type_name"]; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="learning_name">ชื่อภูมิปัญญา/ปราชญ์ชาวบ้าน</label>
                  <input type="text" id="learning_name" name="learning_name" value="<?php echo @$row['learning_name']; ?>" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="learning_owner">เจ้าของภูมิปัญญา</label>
                  <input type="text" id="learning_owner" name="learning_owner" value="<?php echo @$row['learning_owner']; ?>" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="learning_point">จุดเด่นของภูมิปัญญา</label>
                  <textarea class="form-control" id="learning_point" name="learning_point"><?php echo @$row['learning_point']; ?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="learning_description">ข้อมูลภูมิปัญญาท้องถิ่น</label>
                  <textarea class="form-control" id="learning_description" name="learning_description"><?php echo @$row['learning_description']; ?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="learning_find">บริเวณที่พบ</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..." id="learning_find" name="learning_find"><?php echo @$row['learning_find']; ?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="learning_media">ประเภทสื่อ</label>
                  <input type="text" id="learning_media" name="learning_media" value="<?php echo @$row['learning_media']; ?>" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="learning_note">หมายเหตุ</label>
                  <input type="text" id="learning_note" name="learning_note" value="<?php echo @$row['learning_note']; ?>" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">การเผยแพร่</h3>
          </div>
          <div class="card-body">
            <?php
            $i=0;

            $sql_1 = "SELECT * FROM tbl_copyright";
            $result_1 = $conn->query($sql_1);
            while($row_1 = $result_1->fetch_assoc()) {
             $i++;
             ?>
             <div class="row">
              <div class="col-sm-2">
                <div class="form-group">
                 <div class="form-check">
                  <input class="form-check-input" type="radio" name="copyright_id" id="copyright_id" value="<?php echo $row_1['copyright_id']; ?>" <?php if (@$row["copyright_id"] == $row_1["copyright_id"]){ echo "checked"; } ?>>
                  <label class="form-check-label">
                    <img style="width: 80%;border: solid 1.5px;border-radius: 5px;" src="assets/img/copyright/<?php echo $row_1['copyright_img']; ?>">
                  </label>
                </div>  
              </div>
            </div>
            <div class="col-sm-10">
              <a><?php echo $row_1['copyright_name']; ?></a>
            </div>
          </div>
        <?php } ?>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
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