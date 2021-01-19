     <?php
     if (!empty($_GET["learning_id"])) {

      $sql = "SELECT tbl_learning.*, tbl_copyright.copyright_img, tbl_copyright.copyright_name, tbl_learning_type.learning_type_name, tbl_school.school_name_th FROM tbl_learning INNER JOIN tbl_learning_type ON tbl_learning.learning_type_id = tbl_learning_type.learning_type_id INNER JOIN tbl_copyright ON tbl_learning.copyright_id = tbl_copyright.copyright_id INNER JOIN tbl_school ON tbl_learning.school_id = tbl_school.school_id WHERE tbl_learning.learning_id ='" . decrypt(urldecode(@$_GET['learning_id'])) . "'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    }
    ?>
    <section class="page-section portfolio" id="portfolio">
      <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><?php echo $row['learning_name']; ?></h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fas fa-book-reader"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <div align="center">
          <p style="font-size: 14px"><i class="far fa-calendar-alt"></i> <?php echo DateThaiTime($row["created_at"]) ?> | โดย <?php echo $row['school_name_th']; ?> | อ่าน <?php $result = $conn->query("UPDATE tbl_learning SET learning_view = learning_view+1 WHERE learning_id ='" . decrypt(urldecode(@$_GET['learning_id'])) . "'"); echo $row['learning_view']; ?> ครั้ง </p>

          <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fpts.yru.ac.th%2FeLearning%2F%3Fmenu%3Dlearning-view%26learning_id%3D<?php echo urlencode(encrypt(@$row["learning_id"])); ?>&layout=button&size=small&width=61&height=20&appId" width="61" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

        </div>
      </div>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="margin-left: 0;">

        <!-- Main content -->
        <section class="content">
          <div class="card card-primary">
            <!-- <div class="card-header">
              <div class="card-title">
                ข้อมูลแหล่งเรียนรู้
              </div>
            </div> -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-9">
                  <div class="callout callout-info">
                    <h6>เจ้าของภูมิปัญญา</h6> 
                  </div>
                  <div class="metta-learning"><p><?php echo $row['learning_owner']; ?></p></div>
                  <div class="callout callout-info">
                    <h6>จุดเด่นของภูมิปัญญา</h6>
                  </div>
                  <div class="metta-learning"><p><?php echo $row['learning_point']; ?></p></div>
                  <div class="callout callout-info">
                    <h6>ข้อมูลภูมิปัญญาท้องถิ่น</h6>
                  </div>
                  <div class="metta-learning"><p><?php echo $row['learning_description']; ?></p></div>
                  <div class="callout callout-info">
                    <h6>บริเวณที่พบ</h6>
                  </div>
                  <div class="metta-learning"><p><?php echo $row['learning_find']; ?></p></div>
                </div>
                <div class="col-md-3">
                  <!-- About Me Box -->
                  <div class="card card-primary">
                    <!-- /.card-header -->
                    <div class="card-body">
                      <strong><i class="fas fa-flag mr-1"></i> การเผยแพร่ :</strong>

                      <span class="text-muted">
                        <img style="width: 30%;border: solid 1.5px;border-radius: 5px;" src="backend/assets/img/copyright/<?php echo $row['copyright_img']; ?>" alt="<?php echo $row['copyright_name']; ?>" title="<?php echo $row['copyright_name']; ?>">
                      </span>

                      <hr>

                      <strong><i class="fas fa-list mr-1"></i> ประเภท :</strong>

                      <span class="text-muted">
                        <?php echo $row['learning_type_name']; ?>
                      </span>

                      <hr>

                      <strong><i class="fas fa-photo-video mr-1"></i> ประเภทสื่อ :</strong>

                      <span class="text-muted">
                        <?php echo $row['learning_media']; ?>
                      </span>

                      <hr>

                      <strong><i class="far fa-file-alt mr-1"></i> หมายเหตุ :</strong>

                      <span class="text-muted">
                        <?php echo $row['learning_note']; ?>
                      </span>              
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>

            </div>
          </div>
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

                $sql_1 = "SELECT * FROM tbl_img_learning WHERE learning_id = '" . decrypt(urldecode(@$_GET['learning_id'])) . "'";
                $result_1 = $conn->query($sql_1);
                while($row_1 = $result_1->fetch_assoc()) {
                 $i++
                 ?>
                 <div class="col-sm-2">

                  <a title="<?php echo $row['learning_name']; ?>" href="backend/assets/img/img_learning/<?php echo $row_1['img_learning_name']; ?>" data-gallery="">

                    <img loading="lazy" src="backend/assets/img/img_learning/<?php echo $row_1['img_learning_name']; ?>" alt="<?php echo $row['learning_name']; ?>" class="img-fluid mb-2" style="max-width: 100%;border: solid 1.5px;border-radius: 5px;">
                  </a>
                  <div
                  id="blueimp-gallery"
                  class="blueimp-gallery"
                  aria-label="image gallery"
                  aria-modal="true"
                  role="dialog"
                  >
                  <div class="slides" aria-live="polite"></div>
                  <h3 class="title"></h3>
                  <a
                  class="prev"
                  aria-controls="blueimp-gallery"
                  aria-label="previous slide"
                  aria-keyshortcuts="ArrowLeft"
                  ></a>
                  <a
                  class="next"
                  aria-controls="blueimp-gallery"
                  aria-label="next slide"
                  aria-keyshortcuts="ArrowRight"
                  ></a>
                  <a
                  class="close"
                  aria-controls="blueimp-gallery"
                  aria-label="close"
                  aria-keyshortcuts="Escape"
                  ></a>
                  <a
                  class="play-pause"
                  aria-controls="blueimp-gallery"
                  aria-label="play slideshow"
                  aria-keyshortcuts="Space"
                  aria-pressed="false"
                  role="button"
                  ></a>
                  <ol class="indicator"></ol>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <div class="card-title">
            Gallery ลิงค์เชื่อมโยงวีดีโอแหล่งเรียนรู้
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <?php
            $i=0;

            $sql_1 = "SELECT * FROM tbl_vdo_learning WHERE learning_id = '" . decrypt(urldecode(@$_GET['learning_id'])) . "'";
            $result_1 = $conn->query($sql_1);
            while($row_1 = $result_1->fetch_assoc()) {
             $i++
             ?>
             <div class="col-sm-4">
              <div class="timeline-body">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $row_1['youtube_link']; ?>" frameborder="0" allowfullscreen=""></iframe>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</section>
