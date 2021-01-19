<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php
  if (!empty($_GET["copyright_id"])) {

    $sql = "SELECT * FROM tbl_copyright WHERE copyright_id ='" . $_GET["copyright_id"] . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>แก้ไขข้อมูลการเผยแพร่</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">แก้ไขข้อมูลการเผยแพร่</li>
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
            <h1>เพิ่มข้อมูลการเผยแพร่</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">เพิ่มข้อมูลการเผยแพร่</li>
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

      // File upload path
      $targetDir = "../assets/img/copyright/";
      $fileName = date("Ymd_His").basename($_FILES["copyright_img"]["name"]);
      $targetFilePath = $targetDir . $fileName;
      $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

      if(isset($_POST["submit"]) && !empty($_FILES["copyright_img"]["name"])){
    // Allow certain file formats
        $allowTypes = array('jpg','JPG','PNG','png','jpeg');
        if(in_array($fileType, $allowTypes)){
        // Upload file to server
          if(move_uploaded_file($_FILES["copyright_img"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT INTO tbl_copyright(copyright_name, copyright_img, created_at, updated_at) VALUES (
              '" . $_POST["copyright_name"] . "', '".$fileName."', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "')");
            if($insert){
              ?>

              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> เพิ่มข้อมูลเรียบร้อย!</h5>
                กรุณารอสักครู่.
              </div>
              <META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=copyright">

              <?php
            }else{
              $statusMsg = "อัปโหลดไฟล์ไม่สำเร็จโปรดลองอีกครั้ง";
            } 
          }else{
            $statusMsg = "ขออภัยเกิดข้อผิดพลาดในการอัปโหลดไฟล์ของคุณ";
          }
        }else{
          $statusMsg = 'ขออภัยอนุญาตให้อัปโหลดเฉพาะไฟล์ JPG, JPEG และ PNG เท่านั้น';
        }
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
    if (@$_GET["Action"] == "edit") {

      // File upload path
      $targetDir = "../assets/img/copyright/";
      $fileName = date("Ymd_His").basename($_FILES["copyright_img"]["name"]);
      $targetFilePath = $targetDir . $fileName;
      $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

      if(!empty($_GET["copyright_id"]) && !empty($_FILES["copyright_img"]["name"])){

        $sql_del = "select * from tbl_copyright where copyright_id = '".$_GET["copyright_id"]."'";
        $result_del = $conn->query($sql_del);
        $row = $result_del->fetch_assoc();

        $del_img="../assets/img/copyright/".$row['copyright_img'];"";

        if (@unlink($del_img)) {
    // Allow certain file formats
          $allowTypes = array('jpg','JPG','PNG','png','jpeg');
          if(in_array($fileType, $allowTypes)){
        // Upload file to server
            if(move_uploaded_file($_FILES["copyright_img"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
              $update = $conn->query("UPDATE tbl_copyright SET copyright_name = '" . $_POST["copyright_name"] . "', copyright_img = '".$fileName."', updated_at = '" . date("Y-m-d H:i:s") . "' WHERE copyright_id ='" . $_GET["copyright_id"] . "'");
              if($update){
                ?>

                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> แก้ไขข้อมูลเรียบร้อย!</h5>
                  กรุณารอสักครู่.
                </div>
                <META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=copyright">

                <?php
              }else{
                $statusMsg = "อัปโหลดไฟล์ไม่สำเร็จโปรดลองอีกครั้ง";
              } 
            }else{
              $statusMsg = "ขออภัยเกิดข้อผิดพลาดในการอัปโหลดไฟล์ของคุณ";
            }
          }
        }else{
          $statusMsg = 'ขออภัยอนุญาตให้อัปโหลดเฉพาะไฟล์ JPG, JPEG และ PNG เท่านั้น';
        }
      }else{
        if(!empty($_GET["copyright_id"]) && !empty($_POST["copyright_name"])){

          $update = $conn->query("UPDATE tbl_copyright SET copyright_name = '" . $_POST["copyright_name"] . "', updated_at = '" . date("Y-m-d H:i:s") . "' WHERE copyright_id ='" . $_GET["copyright_id"] . "'");

          if($update){
            ?>

            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-check"></i> แก้ไขข้อมูลเรียบร้อย!</h5>
              กรุณารอสักครู่.
            </div>
            <META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=copyright">

            <?php
          }else{
            echo '<script> window.setTimeout("history.back();", 3000);</script>';
          }
        }
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
    ?>

    <?php
    if (!empty($_GET["copyright_id"])) {
      ?>
      <form method="POST" action="?menu=copyright-add&Action=edit&copyright_id=<?php echo $_REQUEST["copyright_id"]; ?>" enctype="multipart/form-data">
      <?php } else { ?>
        <form method="POST" action="?menu=copyright-add&Action=insert" enctype="multipart/form-data">
        <?php } ?>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ข้อมูลการเผยแพร่</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <?php if (!empty($_GET["copyright_id"])) { ?>
                      <div class="form-group" align="center">
                        <a href="#" class="thumbnail" style="width: 300px; height: 300px; margin: 0px;">
                          <img id="blah" style="width: 50%;height: 50%;border: solid 1.5px;border-radius: 5px;" src="../assets/img/copyright/<?php echo $row['copyright_img']; ?>" alt="User image" onerror="ON_IMAGE_ERROR(this)">
                        </a>
                      </div>
                    <?php } else { ?>
                      <div class="form-group" align="center">
                        <a href="#" class="thumbnail" style="width: 300px; height: 300px; margin: 0px;">
                          <img id="blah" style="width: 50%;height: 50%;border: solid 1.5px;border-radius: 5px;" src="../dist/img/no-img.png" alt="User image" onerror="ON_IMAGE_ERROR(this)">
                        </a>
                      </div>
                    <?php } ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">                      
                      <label for="copyright_img">สัญลักษณ์การเผยแพร่</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="copyright_img" name="copyright_img" accept="image/png, image/jpeg" onchange="readURL(this);">
                        <label class="custom-file-label" for="copyright_img">Choose file</label>
                        <p class="help-block" style="font-size: 14px; color:red;">อนุญาตให้อัปโหลดเฉพาะไฟล์ JPG, JPEG และ PNG เท่านั้น</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <label for="copyright_name">ชื่อการเผยแพร่</label>
                      <input type="text" id="copyright_name" name="copyright_name" value="<?php echo @$row['copyright_name']; ?>" class="form-control" required>
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
            <input type="submit" value="บันทึกข้อมูล" name="submit" class="btn btn-success float-right">
          </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>