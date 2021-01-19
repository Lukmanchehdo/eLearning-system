<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>จัดการข้อมูลนักเรียน</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">จัดการข้อมูลนักเรียน</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <?php
    if (@$_GET["Action"] == "insert") {
      if ((@$_POST["card_id"] != "")) {

        $sqlInsert = "INSERT INTO tbl_personality(personality, personality_description, realistic, investigative, artistic, social, conventional, enterprising, entrepreneurial_chaacteristics, cross_cultural_awareness, adaptability, teamwork, career, disciplines, card_id) VALUES ('" . $_POST["personality"] . "', '" . $_POST["personality_description"] . "', '" . $_POST["realistic"] . "', '" . $_POST["investigative"] . "', '" . $_POST["artistic"] . "', '" . $_POST["social"] . "', '" . $_POST["conventional"] . "', '" . $_POST["enterprising"] . "','" . $_POST["entrepreneurial_chaacteristics"] . "' , '" . $_POST["cross_cultural_awareness"] . "', '" . $_POST["adaptability"] . "', '" . $_POST["teamwork"] . "', '" . $_POST["career"] . "', '" . $_POST["disciplines"] . "', '" . $_POST["card_id"] . "')";
        $result = $conn->query($sqlInsert);
        if ($result = true) {
          ?>
        <script type="text/javascript">
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: 'บันทึกข้อมูลบุคลิกภาพ เรียบร้อย'
            })
        </script>
        <script type="text/javascript">
            window.setTimeout("history.back();", 5000);
        </script>
        <?php }else{ ?>
        <script type="text/javascript">
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                title: 'บันทึกข้อมูลบุคลิกภาพ ไม่สำเร็จ'
            })
        </script>
        <script type="text/javascript">
            window.setTimeout("history.back();", 5000);
        </script>
        <?php } }else{ ?>
        <script type="text/javascript">
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'warning',
                title: 'ไม่พบข้อมูลนักเรียนที่บันทึก'
            })
        </script>
        <script type="text/javascript">
            window.setTimeout("history.back();", 5000);
        </script>

        <?php } }

        if (@$_GET["Action"] == "update") {
          if ((@$_POST["card_id"] != "")) {

            $sqlUpdate = "UPDATE tbl_personality SET personality='" . $_POST["personality"] . "', personality_description='" . $_POST["personality_description"] . "', realistic='" . $_POST["realistic"] . "', investigative='" . $_POST["investigative"] . "', artistic='" . $_POST["artistic"] . "', social='" . $_POST["social"] . "', conventional='" . $_POST["conventional"] . "', enterprising='" . $_POST["enterprising"] . "', entrepreneurial_chaacteristics='" . $_POST["entrepreneurial_chaacteristics"] . "', cross_cultural_awareness='" . $_POST["cross_cultural_awareness"] . "', adaptability='" . $_POST["adaptability"] . "', teamwork='" . $_POST["teamwork"] . "', career='" . $_POST["career"] . "', disciplines='" . $_POST["disciplines"] . "' WHERE card_id = '" . $_POST["card_id"] . "'";
            $result = $conn->query($sqlUpdate);
            if ($result = true) {
              ?>
        <script type="text/javascript">
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: 'แก้ไขข้อมูลบุคลิกภาพ เรียบร้อย'
            })
        </script>
        <script type="text/javascript">
            window.setTimeout("history.back();", 5000);
        </script>
        <?php }else{ ?>
        <script type="text/javascript">
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                title: 'แก้ไขข้อมูลบุคลิกภาพ ไม่สำเร็จ'
            })
        </script>
        <script type="text/javascript">
            window.setTimeout("history.back();", 5000);
        </script>
        <?php } }else{ ?>
        <script type="text/javascript">
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'warning',
                title: 'ไม่พบข้อมูลนักเรียนที่แก้ไข'
            })
        </script>
        <script type="text/javascript">
            window.setTimeout("history.back();", 5000);
        </script>

        <?php } } ?>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">นำเข้าข้อมูลนักเรียน</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-group list-group-horizontal-sm">
                            <li class="list-group-item active"><i class="fas fa-list"></i> เลือกชั้นเรียน :</li>
                            <?php
                      $sqlSelect = "SELECT class FROM tbl_student WHERE school_id = '" . $_SESSION['school_id'] . "' GROUP BY class";
                      $result = $conn->query($sqlSelect);
                      if (! empty($result)) {
                        foreach ($result as $row) {
                          ?>
                            <a href="?menu=personality&class=<?php  echo $row['class']; ?>" class="list-group-item" style="text-decoration: none;">
                                <?php  echo $row['class']; ?>
                            </a>
                            <?php } }?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- Default box -->
        <?php
              if (@$_GET["class"] == '') { ?>

        <div class="p-3 mb-2 text-white bg-warning" role="alert" align="center">
            กรุณาเลือกชั้นเรียน
        </div>

        <?php
              } else {

                $sqlSelect = "SELECT * FROM tbl_student WHERE class = '" . @$_GET["class"] . "' AND school_id = '" . $_SESSION['school_id'] . "'";
                $result = $conn->query($sqlSelect);
                if (! empty($result)) {
                  $i=0;
                  ?>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">นักเรียนชั้น : <?php echo @$_GET["class"]; ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <div class="card-body">
                    <table class="table table-hover text-nowrap" id="example_2">
                        <thead>
                            <tr align="center">
                                <th>Card ID</th>
                                <th>Room</th>
                                <th>Name</th>
                                <th>Name EN</th>
                                <th>Birthday</th>
                                <th>บันทึก</th>
                                <th>ดูรายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row) { $i++; ?>
                            <tr>
                                <td><?php  echo $row['card_id']; ?></td>
                                <td>ห้องที่ <?php  echo $row['room']; ?></td>
                                <td><?php  echo $row['prefix'].$row['name'].' '.$row['surname']; ?></td>
                                <td><?php  echo $row['name_en'].' '.$row['surname_en']; ?></td>
                                <td><?php echo DateThaiTime($row["birthday"]) ?></td>
                                <td align="center">
                                    <?php
                                      $sqlSelect_p = "SELECT * FROM tbl_personality WHERE card_id = '" . @$row["card_id"] . "'";
                                      $result_p = $conn->query($sqlSelect_p);
                                      $row_p = $result_p->fetch_assoc();
                                      if (!empty(@$row_p["card_id"])) {
                                        ?>
                                    <a data-toggle="modal" data-target="#personalityModal" data-action="update&menu=personality&class=<?php  echo $row['class']; ?>" data-card_id="<?php  echo $row['card_id']; ?>" data-name="<?php  echo $row['prefix'].$row['name'].' '.$row['surname']; ?>" data-personality="<?php  echo $row_p['personality']; ?>" data-personality_description="<?php  echo $row_p['personality_description']; ?>" data-realistic="<?php  echo $row_p['realistic']; ?>" data-investigative="<?php  echo $row_p['investigative']; ?>" data-artistic="<?php  echo $row_p['artistic']; ?>" data-social="<?php  echo $row_p['social']; ?>" data-conventional="<?php  echo $row_p['conventional']; ?>" data-enterprising="<?php  echo $row_p['enterprising']; ?>" data-entrepreneurial_chaacteristics="<?php  echo $row_p['entrepreneurial_chaacteristics']; ?>" data-cross_cultural_awareness="<?php  echo $row_p['cross_cultural_awareness']; ?>" data-adaptability="<?php  echo $row_p['adaptability']; ?>" data-teamwork="<?php  echo $row_p['teamwork']; ?>" data-career="<?php  echo $row_p['career']; ?>" data-disciplines="<?php  echo $row_p['disciplines']; ?>" style="color: #17a2b8; font-size: 26px;"><i class="fas fa-clipboard"></i></a>

                                    <?php }else{ ?>

                                    <a data-toggle="modal" data-target="#personalityModal" data-action="insert&menu=personality&class=<?php  echo $row['class']; ?>" data-card_id="<?php  echo $row['card_id']; ?>" data-name="<?php echo $row['prefix'].$row['name'].' '.$row['surname']; ?>" style="color: #17a2b8; font-size: 26px;"><i class="far fa-clipboard"></i></a>

                                    <?php } ?>
                                </td>
                                <td align="center"><a href="std_charts.php?card_id=<?php  echo $encode = urlencode(encrypt($row['card_id'])); ?>&std_code=<?php  echo $encode = urlencode(encrypt($row['std_code'])); ?>" style="color: #20c997; font-size: 18px;"><i class="far fa-eye"></i></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <?php } } ?>
        </div>
        <!-- /.card -->

    </section>
    <div class="modal fade" id="personalityModal" data-backdrop="static" tabindex="-1" aria-labelledby="personalityModalLabel" aria-hidden="true">
        <form action="?Action" method="post" name="form_p" id="form_p">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-info text-light">
                        <h5 class="modal-title" id="personalityModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">บุคลิกภาพที่โดดเด่น:</label>
                            <input type="text" class="form-control" id="personality" name="personality">
                            <input type="hidden" class="form-control" id="card_id" name="card_id">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">รายละเอียด:</label>
                            <textarea class="form-control" id="personality_description" name="personality_description"></textarea>
                        </div>
                        <div class="form-group">
                            <table class="table table-bordered">
                                <thead>
                                    <tr align="center">
                                        <th scope="col" width="80%">บุคลิกภาพ</th>
                                        <th scope="col" width="20%">คะแนน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>นิยมความจริง</td>
                                        <td><input type="number" min="1" max="100" class="form-control mb" id="realistic" name="realistic"></td>
                                    </tr>
                                    <tr>
                                        <td>ชอบค้นหา</td>
                                        <td><input type="number" min="1" max="100" class="form-control mb" id="investigative" name="investigative"></td>
                                    </tr>
                                    <tr>
                                        <td>ใฝ่ศิลปะ</td>
                                        <td><input type="number" min="1" max="100" class="form-control mb" id="artistic" name="artistic"></td>
                                    </tr>
                                    <tr>
                                        <td>ชอบสังคม</td>
                                        <td><input type="number" min="1" max="100" class="form-control mb" id="social" name="social"></td>
                                    </tr>
                                    <tr>
                                        <td>อนุรักษนิยม</td>
                                        <td><input type="number" min="1" max="100" class="form-control mb" id="conventional" name="conventional"></td>
                                    </tr>
                                    <tr>
                                        <td>แคล่วคล่องว่องไว</td>
                                        <td><input type="number" min="1" max="100" class="form-control mb" id="enterprising" name="enterprising"></td>
                                    </tr>
                                    <tr>
                                        <td>ใฝ่ประกอบการ</td>
                                        <td><input type="number" min="1" max="100" class="form-control mb" id="entrepreneurial_chaacteristics" name="entrepreneurial_chaacteristics"></td>
                                    </tr>
                                    <tr>
                                        <td>ตระหนักข้ามวัฒนธรรม</td>
                                        <td><input type="number" min="1" max="100" class="form-control mb" id="cross_cultural_awareness" name="cross_cultural_awareness"></td>
                                    </tr>
                                    <tr>
                                        <td>ความสามารถในการปรับตัว</td>
                                        <td><input type="number" min="1" max="100" class="form-control mb" id="adaptability" name="adaptability"></td>
                                    </tr>
                                    <tr>
                                        <td>การทำงานเป็นทีม</td>
                                        <td><input type="number" min="1" max="100" class="form-control mb" id="teamwork" name="teamwork"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">อาชีพที่เหมาะสม:</label>
                            <textarea class="form-control" id="career" name="career"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">สาขาวิชาที่สอดคล้อง:</label>
                            <textarea class="form-control" id="disciplines" name="disciplines"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer bg-info text-light">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>