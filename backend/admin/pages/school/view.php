<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php
  if (!empty($_GET["school_id"])) {

    $sql = "SELECT * FROM tbl_school INNER JOIN amphur ON tbl_school.amphur = amphur.AMPHUR_ID INNER JOIN district ON tbl_school.district = district.DISTRICT_ID INNER JOIN province ON tbl_school.province = province.PROVINCE_ID WHERE tbl_school.school_id ='" . $_GET["school_id"] . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  }
  ?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                src="../dist/img/user-logo.jpg"
                alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><?php echo $row['school_name_th']; ?></h3>

              <p class="text-muted text-center"><?php echo $row['school_name_en']; ?></p>

              <!-- <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Followers</b> <a class="float-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="float-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="float-right">13,287</a>
                </li>
              </ul> -->

              <a href="?menu=school-edit&school_id=<?php echo $row['school_id']; ?>" class="btn btn-primary btn-block"><b><i class="fas fa-user-edit"></i>
              Edit</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-user mr-1"></i> ผู้อำนวยการ</strong>

              <p class="text-muted">
                <?php echo $row['school_director']; ?>
              </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

              <p class="text-muted">
               ต. <?php echo $row['DISTRICT_NAME']; ?>
               อ. <?php echo $row['AMPHUR_NAME']; ?>
               จ. <?php echo $row['PROVINCE_NAME'].' '.$row['POSTCODE']; ?>
             </p>

             <hr>

             <strong><i class="far fa-address-card mr-1"></i> ติดต่อ</strong>

             <p class="text-muted">
              <span class="tag tag-success">โทร : <?php echo $row['school_tell']; ?></span>
              <span class="tag tag-success">โทรสาร : <?php echo $row['school_fax']; ?></span>
            </p>

            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

            <p class="text-muted">
              <span class="tag tag-success">อีเมล : <?php echo $row['school_email']; ?></span>
            </br>
            <span class="tag tag-success">เว็บไซต์ : <?php echo $row['school_website']; ?></span>
          </p>              </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">ที่ตั้ง</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="form-group">
                  <div id="map" style="height: 740px;"></div>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVorLvHctD5wbBG1ghZnDNOFizhDerS8E&callback=initMap">
</script>
<script type="text/javascript" >

  function initMap() {
    var pos = {lat: <?php echo $row["school_lat"]; ?>, lng: <?php echo $row["school_lng"]; ?>};
                        // var urlTimeZone = 'https://maps.googleapis.com/maps/api/timezone/json?timestamp=0&location=';

                        var map = new google.maps.Map(document.getElementById('map'), {
                          center: pos,
                          zoom: 15,
                          disableDefaultUI: true,
                          mapTypeId: google.maps.MapTypeId.ROADMAP,
                        });
                        var geocoder = new google.maps.Geocoder;
                        var marker = new google.maps.Marker({
                          position: pos,
                          map: map,
                        });

                        var infowindow = new google.maps.InfoWindow({
                          content: "<?php echo $row["school_name_th"]; ?>"
                        });
                        infowindow.open(map, marker);
                      }
                      ;
                    </script>