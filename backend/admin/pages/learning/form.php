<div class="content-wrapper">
  <!-- Content Header (Page header) -->

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
  
  <!-- Main content -->
  <section class="content">

    <?php
    if (@$_GET["Action"] == "insert") {

      if (($_POST["learning_name"] != "")) {

        $sql = "INSERT INTO tbl_learning(learning_name, learning_owner, learning_point, learning_description, learning_find, learning_media, learning_note, learning_type_id, copyright_id, school_id, created_at, updated_at) 
        VALUES (
        '" . $_POST["learning_name"] . "', '" . $_POST["learning_owner"] . "', '" . $_POST["learning_point"] . "', '" . $_POST["learning_description"] . "', '" . $_POST["learning_find"] . "', '" . $_POST["learning_media"] . "', '" . $_POST["learning_note"] . "', '" . $_POST["learning_type_id"] . "', '" . $_POST["copyright_id"] . "', '" . $_SESSION["school_id"] . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "')";
        
        $result = $conn->query($sql);
        $learning_id = $conn->insert_id;
        if ($result==true) { 

          foreach ($_FILES["img_learning_name"]["name"] as $key => $val) {

            if(!empty($val)){

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
                    '" . $fileName . "', '".$learning_id."', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "')");
                }else{
                  $statusMsg = "ขออภัยเกิดข้อผิดพลาดในการอัปโหลดไฟล์ของคุณ";
                }
              }else{
                $statusMsg = 'ขออภัยอนุญาตให้อัปโหลดเฉพาะไฟล์ JPG, JPEG และ PNG เท่านั้น';
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

          foreach ($_POST["youtube_link"] as $key => $val) {

            if (!empty($val)) {

            // Insert image file name into database
              $insert_vdo = $conn->query("INSERT INTO tbl_vdo_learning(youtube_link, learning_id, created_at, updated_at) VALUES (
                '" . $_POST["youtube_link"][$key] . "', '".$learning_id."', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "')");
            }
          } 
          ?>

          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> เพิ่มข้อมูลเรียบร้อย!</h5>
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
    <form method="POST" enctype="multipart/form-data"  action="?menu=learning-add&Action=insert">
      <div class="row">
        <div class="col-md-6">
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
                        <option value="<?php echo $row_1["learning_type_id"]; ?>"><?php echo $row_1["learning_type_name"]; ?></option>
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
                    <textarea class="form-control" id="learning_point" name="learning_point"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="learning_description">ข้อมูลภูมิปัญญาท้องถิ่น</label>
                    <textarea class="form-control" id="learning_description" name="learning_description"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="learning_find">บริเวณที่พบ</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." id="learning_find" name="learning_find"></textarea>
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
        </div>
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ภาพประกอบ</h3>
            </div>
            <div class="card-body">
              <label for="school_code">อัพโหลดภาพ</label>
              <div class="custom-file">
                <input type="file" id="img_learning_name" name="img_learning_name[]" class="custom-file-input"  multiple>
                <label class="custom-file-label" for="chooseFile">Select file</label>
                <p class="help-block" style="font-size: 14px; color:red;">อนุญาตให้อัปโหลดเฉพาะไฟล์ JPG, JPEG และ PNG เท่านั้น</p>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">วีดีโอ</h3>
            </div>
            <div class="card-body">
              <div class="form-group" align="center">
                <a href="#" class="thumbnail" style="width: 300px; height: 300px; margin: 0px;">
                  <img id="blah" style="width: 100%;height: 100%;border: solid 1.5px;border-radius: 5px;" src="../dist/img/youtube.png" alt="User image" onerror="ON_IMAGE_ERROR(this)">
                </a>
              </div>
              <div class="form-group">
                <a id="add" class="btn btn-primary btn-sm">Add more</a>
                <a id="remove" class="btn btn-warning btn-sm">Remove last</a>
                <p class="help-block" style="font-size: 14px;">หากมีหลายวีดีโอคลิก Add more</p>
              </div>
              <div class="form-group">
                <label for="youtube_link">ลิงค์เชื่อมโยงวีดีโอ</label>
                <input type="text" class="form-control" id="youtube_link" name="youtube_link[]" placeholder="ลิงค์เชื่อมโยงวีดีโอ">
              </div>
              <div id="more-youtube_link"></div>
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
                    <input class="form-check-input" type="radio" name="copyright_id" id="copyright_id" value="<?php echo $row_1['copyright_id']; ?>">
                    <label class="form-check-label">
                      <img style="width: 100%;border: solid 1.5px;border-radius: 5px;" src="../assets/img/copyright/<?php echo $row_1['copyright_img']; ?>">
                    </label>
                  </div>  
                </div>
              </div>
              <div class="col-sm-10">
                <small><?php echo $row_1['copyright_name']; ?></small>
              </div>
            </div>
          <?php } ?>
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