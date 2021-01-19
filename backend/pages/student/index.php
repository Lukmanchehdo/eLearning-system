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
    require_once ('plugins/phpspreadsheet/vendor/autoload.php');

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Reader\Csv;
    use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

    if (@$_GET["Action"] == "import") {

      $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

      if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

        $arr_file = explode('.', $_FILES['file']['name']);
        $extension = end($arr_file);

        if('csv' == $extension) {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $reader->load($_FILES['file']['tmp_name']);

        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        if (!empty($sheetData)) {
          for ($i=1; $i<count($sheetData); $i++) {
            $card_id = $sheetData[$i][1];
            $class = $sheetData[$i][2];
            $room = $sheetData[$i][3];
            $std_code = $sheetData[$i][4];
            $sex = $sheetData[$i][5];
            $prefix = $sheetData[$i][6];
            $name = $sheetData[$i][7];
            $surname = $sheetData[$i][8];
            $name_en = $sheetData[$i][9];
            $surname_en = $sheetData[$i][10];
            $birthday = $sheetData[$i][11];
            $age_years = $sheetData[$i][12];
            $blood_group = $sheetData[$i][13];
            $race = $sheetData[$i][14];
            $nationality = $sheetData[$i][15];
            $religion = $sheetData[$i][16];
            $brother_number = $sheetData[$i][17];
            $y_brother_number = $sheetData[$i][18];
            $sister_number = $sheetData[$i][19];
            $y_sister_number = $sheetData[$i][20];
            $the_son_who = $sheetData[$i][21];
            $parents_status = $sheetData[$i][22];
            $parent_prefix = $sheetData[$i][23];
            $parent_name = $sheetData[$i][24];
            $parent_surname = $sheetData[$i][25];
            $parent_monthly_income = $sheetData[$i][26];
            $parent_phone = $sheetData[$i][27];
            $house_code = $sheetData[$i][28];
            $house_number = $sheetData[$i][29];
            $moo = $sheetData[$i][30];
            $street = $sheetData[$i][31];
            $district = $sheetData[$i][32];
            $aphure = $sheetData[$i][33];
            $province = $sheetData[$i][34];
            $postal_code = $sheetData[$i][35];
            $weight = $sheetData[$i][36];
            $height = $sheetData[$i][37];
            $student_type = $sheetData[$i][38];

            $insertId =  $conn->query("INSERT INTO tbl_student(card_id, class, room, std_code, sex, prefix, name, surname, name_en, surname_en, birthday, age_years, blood_group, race, nationality, religion, brother_number, y_brother_number, sister_number, y_sister_number, the_son_who, parents_status, parent_prefix, parent_name, parent_surname, parent_monthly_income, parent_phone, house_code, house_number, moo, street, district, aphure, province, postal_code, weight, height, student_type, school_id) 
              VALUES(
              '$card_id' ,
              '$class' ,
              '$room' ,
              '$std_code' ,
              '$sex' ,
              '$prefix' ,
              '$name' ,
              '$surname' ,
              '$name_en' ,
              '$surname_en' ,
              '$birthday' ,
              '$age_years' ,
              '$blood_group' ,
              '$race' ,
              '$nationality' ,
              '$religion' ,
              '$brother_number' ,
              '$y_brother_number' ,
              '$sister_number' ,
              '$y_sister_number' ,
              '$the_son_who' ,
              '$parents_status' ,
              '$parent_prefix' ,
              '$parent_name' ,
              '$parent_surname' ,
              '$parent_monthly_income' ,
              '$parent_phone' ,
              '$house_code' ,
              '$house_number' ,
              '$moo' ,
              '$street' ,
              '$district' ,
              '$aphure' ,
              '$province' ,
              '$postal_code' ,
              '$weight' ,
              '$height' ,
              '$student_type' ,
              '" . $_SESSION['school_id'] . "'
            )");
          }
          if (! empty($insertId)) {
            $type = "success";
            $message = "Excel Data Imported into the Database";
          } else {
            $type = "danger";
            $message = "Problem in Importing Excel Data";
          }
        }
      } else {
        $type = "danger";
        $message = "Invalid File Type. Upload Excel File.";
      }
    }
    if (@$_GET["Action"] == "delete") {

      if (($_GET["std_id"] != "")) {

        $sqlDelete = "delete from tbl_student where std_id = '" . $_GET["std_id"] . "'";
        $result = $conn->query($sqlDelete);

        if ($result) {

          header('Location: ' . $_SERVER['HTTP_REFERER']);;
        }
      } else {

        echo '<script> window.setTimeout("history.back();", 3000);</script>';
      }
    }
    if (@$_GET["Action"] == "delete_all") {

      if (($_POST["std_id"] != "")) {

        for ($i = 0; $i < count($_POST["std_id"]); $i++) {
          if ($_POST["std_id"][$i] != "") {
            $sqlDelete_all = "delete from tbl_student where std_id = '" . $_POST["std_id"][$i] . "'";
            $result = $conn->query($sqlDelete_all);
          }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
      } else {

        echo '<script> window.setTimeout("history.back();", 3000);</script>';
      }
    }
    ?>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">นำเข้าข้อมูลนักเรียน</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <ul class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active"><i class="fas fa-list"></i> เลือกชั้นเรียน :</a>
                            <?php
              $sqlSelect = "SELECT class FROM tbl_student WHERE school_id = '" . $_SESSION['school_id'] . "' GROUP BY class";
              $result = $conn->query($sqlSelect);
              if (! empty($result)) {
                foreach ($result as $row) { 
                  ?>
                            <a href="?menu=student&class=<?php  echo $row['class']; ?>" class="list-group-item list-group-item-action">
                                <?php  echo $row['class']; ?>
                            </a>
                            <?php } }?>
                        </ul>
                    </div>
                    <div class="col-8">
                        <form action="?menu=student&Action=import" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Choose Excel File <span style="color: red;">(เทมเพลตข้อมูลนำเข้า <a href="Template/test_std.xlsx" target="_blank">Excel</a>)</span></label>
                                <input type="file" class="form-control-file" name="file" id="file" accept=".xls,.xlsx">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </form>

                        <div id="response" class="p-3 mb-2 text-white bg-<?php if(!empty($type)) { echo $type . " display-block"; } ?>" role="alert">
                            <?php if(!empty($message)) { echo $message; } ?>
                        </div>
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
                    <form name="bulk_action_form" action="?menu=student&Action=delete_all" method="post" onSubmit="return delete_confirm();" />
                    <div class="container" id="btn_del">
                        <button type="submit" class="btn btn-danger" name="bulk_delete_submit"><i class="fas fa-trash"></i> ลบข้อมูลที่เลือก</button>
                    </div>
                    <table class="table table-hover text-nowrap" id="example">
                        <thead>
                            <tr align="center">
                                <th><input type="checkbox" id="select_all" value="" /> เลือกทั้งหมด</th>
                                <th>Card ID</th>
                                <th>Room</th>
                                <th>Name</th>
                                <th>Name EN</th>
                                <th>Birthday</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row) { $i++; ?>
                            <tr>
                                <td align="center"><input type="checkbox" id="select_all<?php echo $i; ?>" name="std_id[]" class="checkbox" value="<?php echo $row['std_id']; ?>" /></td>
                                <td><?php  echo $row['card_id']; ?></td>
                                <td>ห้องที่ <?php  echo $row['room']; ?></td>
                                <td><?php  echo $row['prefix'].$row['name'].' '.$row['surname']; ?></td>
                                <td><?php  echo $row['name_en'].' '.$row['surname_en']; ?></td>
                                <td><?php echo DateThaiTime($row["birthday"]) ?></td>
                                <td align="center"><a href="?menu=student&Action=delete&std_id=<?php echo $row["std_id"]; ?>" onclick="return confirm('คุณต้องการลบใช่หรือไม่ ?');" title="ลบ" style="color: #dc3545;"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <?php } ?>
                            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                            <script type="text/javascript">
                                $(function () {
                                    $("#btn_del").hide();
                                    $("#select_all").click(function () {
                                        if ($(this).is(":checked")) {
                                            $("#btn_del").show();
                                        } else {
                                            $("#btn_del").hide();
                                        }
                                    });
                                    $("#select_all<?php echo $i; ?>").click(function () {
                                        if ($(this).is(":checked")) {
                                            $("#btn_del").show();
                                        } else {
                                            $("#btn_del").hide();
                                        }
                                    });
                                });
                            </script>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
            <?php } } ?>
        </div>
        <!-- /.card -->

    </section>
</div>