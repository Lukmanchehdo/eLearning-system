<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>ข้อมูลแหล่งเรียนรู้</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">ข้อมูลแหล่งเรียนรู้</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <?php
    if (@$_GET["Action"] == "del") {

      if (($_GET["learning_id"] != "")) {

        $sql = "DELETE FROM tbl_learning WHERE learning_id = '" . $_GET["learning_id"] . "'";
        
        $result = $conn->query($sql);
        if ($result==true) { 

          $result = $conn->query("DELETE FROM tbl_vdo_learning WHERE learning_id = '" . $_GET["learning_id"] . "'");

          $sql_del = "select * from tbl_img_learning where learning_id = '" . $_GET["learning_id"] ."'";
          $result_del = $conn->query($sql_del);
          while($row = $result_del->fetch_assoc()) {

            $del_img="assets/img/img_learning/".$row['img_learning_name'];"";

            @unlink($del_img);
          }

          ?>

          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> ลบข้อมูลเรียบร้อย!</h5>
            กรุณารอสักครู่.
          </div>
          <META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=learning">
          
          <?php
        } else {

          echo '<script> window.setTimeout("history.back();", 3000);</script>';
        }
      }
      echo '<script> window.setTimeout("history.back();", 3000);</script>';
    }
    ?>

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">ข้อมูลแหล่งเรียนรู้</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th style="width: 1%">
                    #
                  </th>
                  <th style="width: 15%">
                    ชื่อภูมิปัญญา/ปราชญ์ชาวบ้าน
                  </th>
                  <th style="width: 15%">
                    เจ้าของภูมิปัญญา
                  </th>
                  <th style="width: 20%">
                    ประเภทสื่อ
                  </th>
                  <th>
                    การเผยแพร่
                  </th>
                  <th style="width: 30%">
                    จัดการ
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i=0;
                
                $sql = "SELECT * FROM tbl_learning INNER JOIN tbl_copyright ON tbl_learning.copyright_id = tbl_copyright.copyright_id WHERE tbl_learning.school_id = '" . $_SESSION["school_id"] . "'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                 $i++;
                 ?>    
                 <tr>
                  <td>
                    <?php echo $i; ?>
                  </td>
                  <td>
                    <a>
                      <?php echo $row['learning_name']; ?>
                    </a>
                  </td>
                  <td>
                    <a>
                      <?php echo $row['learning_owner']; ?>
                    </a>
                  </td>
                  <td>
                    <?php echo $row['learning_media']; ?>
                  </td>
                  <td>
                    <img id="blah" style="width: 15%;border: solid 1.5px;border-radius: 5px;" src="assets/img/copyright/<?php echo $row['copyright_img']; ?>" alt="<?php echo $row['copyright_img']; ?>">
                    <br/>
                    <small>
                      <?php echo $row['copyright_name']; ?>
                    </small>
                  </td>
                  <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="?menu=learning-view&learning_id=<?php echo $row['learning_id']; ?>">
                      <i class="fas fa-folder">
                      </i>
                      View
                    </a>
                    <a class="btn btn-info btn-sm" href="?menu=learning-edit&learning_id=<?php echo $row['learning_id']; ?>">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="?menu=learning&Action=del&learning_id=<?php echo $row['learning_id']; ?>" onclick="return confirm('คุณต้องการลบใช่หรือไม่ ?');" >
                      <i class="fas fa-trash">
                      </i>
                      Delete
                    </a>
                    <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                      <i class="fas fa-cogs"></i> แก้ไขสื่อ
                    </button>
                    <div class="dropdown-menu" x-placement="top-start">
                      <a class="dropdown-item" href="?menu=learning-edit_img&learning_id=<?php echo $row['learning_id']; ?>"><i class="nav-icon far fa-image"></i> แก้ไขภาพ</a>
                      <a class="dropdown-item" href="?menu=learning-edit_vdo&learning_id=<?php echo $row['learning_id']; ?>"><i class="fas fa-video"></i> แก้ไขวีดีโอ</a>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>