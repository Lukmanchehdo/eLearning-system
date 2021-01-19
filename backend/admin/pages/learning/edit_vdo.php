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
            <h1>แก้ไขลิงค์เชื่อมโยงวีดีโอแหล่งเรียนรู้: <?php echo $row['learning_name']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">แก้ไขลิงค์เชื่อมโยงวีดีโอแหล่งเรียนรู้: <?php echo $row['learning_name']; ?></li>
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
            <h1>แก้ไขลิงค์เชื่อมโยงวีดีโอแหล่งเรียนรู้</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">แก้ไขลิงค์เชื่อมโยงวีดีโอแหล่งเรียนรู้</li>
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

      if (($_GET["vdo_learning_id"] != "")) {

        $sql = "DELETE FROM tbl_vdo_learning WHERE vdo_learning_id = '" . $_GET["vdo_learning_id"] . "'";
        
        $result = $conn->query($sql);
        if ($result==true) { 
          ?>

          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> ลบข้อมูลเรียบร้อย!</h5>
            กรุณารอสักครู่.
          </div>
          <META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=learning-edit_vdo&learning_id=<?php echo @$_GET['learning_id']; ?>">
          
          <?php
        }
      } else {

        echo '<script> window.setTimeout("history.back();", 3000);</script>';
      }
    }
    if (@$_GET["Action"] == "add") {

      if (($_REQUEST["learning_id"] != "")) {

        if(!empty($_REQUEST["youtube_link"])){

          foreach ($_REQUEST["youtube_link"] as $key => $val) {

            // Insert image file name into database
            $insert_img = $conn->query("INSERT INTO tbl_vdo_learning(youtube_link, learning_id, created_at, updated_at) VALUES (
              '" . $_REQUEST["youtube_link"][$key] . "', '".$_REQUEST["learning_id"]."', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "')");
          }
          ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> เพิ่มข้อมูลเรียบร้อย!</h5>
            กรุณารอสักครู่.
          </div>
          <META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=learning-edit_vdo&learning_id=<?php echo @$_GET['learning_id']; ?>">
          <?php
        }else{
          $statusMsg = 'โปรดระบุลิงค์เชื่อมโยงวีดีโอแหล่งเรียนรู้';
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
        <h3 class="card-title">วีดีโอ</h3>
      </div>
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="?menu=learning-edit_vdo&Action=add&learning_id=<?php echo $_REQUEST["learning_id"]; ?>">
          <div class="row">
            <div class="col-12">
              <div class="form-group" align="left">
                <a href="#" class="thumbnail" style="width: 300px; height: 300px; margin: 0px;">
                  <img id="blah" style="max-width: 100%;border: solid 1.5px;border-radius: 5px;" src="../dist/img/youtube.png" alt="User image" onerror="ON_IMAGE_ERROR(this)">
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
          Gallery ลิงค์เชื่อมโยงวีดีโอแหล่งเรียนรู้
        </div>
      </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th style="width: 1%">
                #
              </th>
              <th style="width: 30%">
                วีดีโอ
              </th>
              <th style="width: 10%">
                ลิงค์เชื่อมโยงวีดีโอ
              </th>
              <th style="width: 20%">
                จัดการ
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i=0;

            $sql_1 = "SELECT * FROM tbl_vdo_learning WHERE learning_id ='" . $row['learning_id'] . "'";
            $result_1 = $conn->query($sql_1);
            while($row_1 = $result_1->fetch_assoc()) {

             $i++;
             ?>    
             <tr>
              <td>
                <?php echo $i; ?>
              </td>
              <td>
                <div class="timeline-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $row_1['youtube_link']; ?>" frameborder="0" allowfullscreen=""></iframe>
                  </div>
                </div>
              </td>
              <td>
                <a>
                  <?php echo $row_1['youtube_link']; ?>
                </a>
              </td>
              <td class="project-actions text-right">
                <!-- <a class="btn btn-info btn-sm" href="?menu=school-edit&school_id=<?php //echo $row['school_id']; ?>">
                  <i class="fas fa-pencil-alt">
                  </i>
                  Edit
                </a> -->
                <a href="?menu=learning-edit_vdo&Action=del&vdo_learning_id=<?php echo $row_1['vdo_learning_id']; ?>&learning_id=<?php echo @$_GET['learning_id']; ?>" onclick="return confirm('คุณต้องการลบใช่หรือไม่ ?');" class="btn btn-danger btn-sm" title="ลบ">
                  <i class="fas fa-trash">
                  </i>
                  Delete
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- /.content -->
</div>