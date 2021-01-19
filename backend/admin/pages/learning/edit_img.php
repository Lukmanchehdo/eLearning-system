<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php
  if (!empty($_GET["learning_id"])) {

    $sql = "SELECT * FROM tbl_learning WHERE learning_id ='" . $_GET["learning_id"] . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>แก้ไขภาพแหล่งเรียนรู้: <?php echo $row['learning_name']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">แก้ไขภาพแหล่งเรียนรู้: <?php echo $row['learning_name']; ?></li>
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
            <h1>แก้ไขภาพแหล่งเรียนรู้</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">แก้ไขภาพแหล่งเรียนรู้</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <?php } ?>


  <!-- Main content -->
  <section class="content">

    <?php
    if (@$_GET["Action"] == "del") {

      if (($_GET["img_learning_id"] != "")) {

        $sql_del = "select * from tbl_img_learning where img_learning_id = '".$_GET["img_learning_id"]."'";
        $result_del = $conn->query($sql_del);
        $row = $result_del->fetch_assoc();

        $del_img="../assets/img/img_learning/".$row['img_learning_name'];"";

        if (@unlink($del_img)) {

          $sql = "DELETE FROM tbl_img_learning WHERE img_learning_id = '" . $_GET["img_learning_id"] . "'";
          $result = $conn->query($sql);

          if ($result==true) { 
            ?>

            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-check"></i> ลบข้อมูลเรียบร้อย!</h5>
              กรุณารอสักครู่.
            </div>
            <META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=learning-edit_img&learning_id=<?php echo @$_GET['learning_id']; ?>">

            <?php
          }
        } else {

          echo '<script> window.setTimeout("history.back();", 3000);</script>';
        }
      }
    }
    if (@$_GET["Action"] == "add") {

      if (($_REQUEST["learning_id"] != "")) {

        if(!empty($_FILES["img_learning_name"]["name"])){

          foreach ($_FILES["img_learning_name"]["name"] as $key => $val) {

            // File upload path
            $targetDir = "../assets/img/img_learning/";
            $fileName = date("Ymd_His").basename($_FILES["img_learning_name"]["name"][$key]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            // Allow certain file formats
            $allowTypes = array('jpg','JPG','PNG','png','jpeg');
            if(in_array($fileType, $allowTypes)){
              // Upload file to server
              if(move_uploaded_file($_FILES["img_learning_name"]["tmp_name"][$key], $targetFilePath)){
                // Insert image file name into database
                $insert_img = $conn->query("INSERT INTO tbl_img_learning(img_learning_name, learning_id, created_at, updated_at) VALUES (
                  '" . $fileName . "', '".$_REQUEST["learning_id"]."', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "')");

              }else{
                $statusMsg = "ขออภัยเกิดข้อผิดพลาดในการอัปโหลดไฟล์ของคุณ";
              }
            }else{
              $statusMsg = 'ขออภัยอนุญาตให้อัปโหลดเฉพาะไฟล์ JPG, JPEG และ PNG เท่านั้น';
            }
          }
          ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> เพิ่มข้อมูลเรียบร้อย!</h5>
            กรุณารอสักครู่.
          </div>
          <META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=learning-edit_img&learning_id=<?php echo @$_GET['learning_id']; ?>">
          <?php
        }else{
          $statusMsg = 'โปรดเลือกไฟล์ที่จะอัปโหลด';
        }
        if(!empty($statusMsg)){
          ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> <?php  echo @$statusMsg; // Display status message ?>!</h5>
            กรุณารอสักครู่.
          </div>
          <?php
          echo '<script> window.setTimeout("history.back();", 3000);</script>';
        } 
      }
    }
    ?>

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">ภาพประกอบ</h3>
      </div>
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="?menu=learning-edit_img&Action=add&learning_id=<?php echo $_REQUEST["learning_id"]; ?>">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="school_code">อัพโหลดภาพ</label>
                <div class="custom-file">
                  <input type="file" id="img_learning_name" name="img_learning_name[]" class="custom-file-input"  multiple>
                  <label class="custom-file-label" for="chooseFile">Select file</label>
                  <p class="help-block" style="font-size: 14px; color:red;">อนุญาตให้อัปโหลดเฉพาะไฟล์ JPG, JPEG และ PNG เท่านั้น</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <a href="?menu=home" class="btn btn-secondary">ยกเลิก</a>
                <input type="submit" value="บันทึกข้อมูล" class="btn btn-success float-right">
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="card card-primary">
      <div class="card-header">
        <div class="card-title">
          Gallery ภาพแหล่งเรียนรู้
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <?php
          $i=0;

          $sql_1 = "SELECT * FROM tbl_img_learning WHERE learning_id = '" . @$_GET['learning_id'] . "'";
          $result_1 = $conn->query($sql_1);
          while($row_1 = $result_1->fetch_assoc()) {
           $i++
           ?>
           <div class="col-sm-2">
            <a href="../assets/img/img_learning/<?php echo $row_1['img_learning_name']; ?>" data-toggle="lightbox" data-title="<?php echo $row['learning_name']; ?>" data-gallery="gallery">
              <img src="../assets/img/img_learning/<?php echo $row_1['img_learning_name']; ?>" class="img-fluid mb-2" alt="<?php echo $row_1['img_learning_name']; ?>" style="max-width: 100%;border: solid 1.5px;border-radius: 5px;">
            </a>
            <a href="?menu=learning-edit_img&Action=del&img_learning_id=<?php echo $row_1['img_learning_id']; ?>&learning_id=<?php echo @$_GET['learning_id']; ?>" onclick="return confirm('คุณต้องการลบใช่หรือไม่ ?');" class="btn btn-danger btn-sm" title="ลบภาพ"><i class="fas fa-times-circle"></i></a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
</div>