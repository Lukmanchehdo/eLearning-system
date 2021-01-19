<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<?php
	if (!empty($_GET["school_id"])) {

		$sql = "SELECT * FROM tbl_school INNER JOIN amphur ON tbl_school.amphur = amphur.AMPHUR_ID INNER JOIN district ON tbl_school.district = district.DISTRICT_ID INNER JOIN province ON tbl_school.province = province.PROVINCE_ID WHERE tbl_school.school_id ='" . $_GET["school_id"] . "'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		?>
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>แก้ไขข้อมูลโรงเรียน: <?php echo $row['school_name_th']; ?></h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
							<li class="breadcrumb-item active">แก้ไขข้อมูลโรงเรียน: <?php echo $row['school_name_th']; ?></li>
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
						<h1>เพิ่มข้อมูลโรงเรียน</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
							<li class="breadcrumb-item active">เพิ่มข้อมูลโรงเรียน</li>
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

			if (($_POST["school_name_th"] != "")) {

				$sql = "INSERT INTO tbl_school(school_code, school_obec_code, school_name_th, school_name_en, school_director, school_director_tell, school_tell, school_fax, school_email, school_website, province, amphur, district, postcode, school_lat,  school_lng, created_at, updated_at) 
				VALUES (
				'" . $_POST["school_code"] . "', '" . $_POST["school_obec_code"] . "', '" . $_POST["school_name_th"] . "', '" . $_POST["school_name_en"] . "', '" . $_POST["school_director"] . "', '" . $_POST["school_director_tell"] . "', '" . $_POST["school_tell"] . "', '" . $_POST["school_fax"] . "', '" . $_POST["school_email"] . "', '" . $_POST["school_website"] . "', '" . $_POST["province"] . "', '" . $_POST["amphur"] . "', '" . $_POST["district"] . "', '" . $_POST["postcode"] . "', '" . $_POST["school_lat"] . "', '" . $_POST["school_lng"] . "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "')";
				
				$result = $conn->query($sql);
				if ($result==true) { 
					?>

					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-check"></i> เพิ่มข้อมูลเรียบร้อย!</h5>
						กรุณารอสักครู่.
					</div>
					<META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=school">
					
					<?php
				}
			} else {

				echo '<script> window.setTimeout("history.back();", 3000);</script>';
			}
		}
		if (@$_GET["Action"] == "edit") {

			if (($_POST["school_name_th"] != "") AND ($_GET["school_id"] != "")) {

				$sql = "UPDATE tbl_school SET school_code = '" . $_POST["school_code"] . "', school_obec_code = '" . $_POST["school_obec_code"] . "', school_name_th = '" . $_POST["school_name_th"] . "', school_name_en = '" . $_POST["school_name_en"] . "', school_director = '" . $_POST["school_director"] . "', school_director_tell = '" . $_POST["school_director_tell"] . "', school_tell = '" . $_POST["school_tell"] . "', school_fax = '" . $_POST["school_fax"] . "', school_email = '" . $_POST["school_email"] . "', school_website = '" . $_POST["school_website"] . "', province = '" . $_POST["province"] . "', amphur = '" . $_POST["amphur"] . "', district = '" . $_POST["district"] . "', postcode = '" . $_POST["postcode"] . "', school_lat = '" . $_POST["school_lat"] . "', school_lng = '" . $_POST["school_lng"] . "', updated_at = '" . date("Y-m-d H:i:s") . "' WHERE school_id = '" . $_GET["school_id"] . "'";
				
				$result = $conn->query($sql);
				if ($result==true) { 
					?>

					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-check"></i> แก้ไขข้อมูลเรียบร้อย!</h5>
						กรุณารอสักครู่.
					</div>
					<META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=school-view&school_id=<?php echo $_GET['school_id']; ?>">
					
					<?php
				}
			} else {

				echo '<script> window.setTimeout("history.back();", 3000);</script>';
			}
		}
		?>

		<?php
		if (!empty($_GET["school_id"])) {
			?>
			<form method="POST" action="?menu=school-add&Action=edit&school_id=<?php echo $_REQUEST["school_id"]; ?>">
			<?php } else { ?>
				<form method="POST" action="?menu=school-add&Action=insert">
				<?php } ?>

				<div class="row">
					<div class="col-md-6">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">ข้อมูลทั่วไป</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="school_code">รหัสโรงเรียน</label>
											<input type="text" id="school_code" name="school_code" value="<?php echo @$row['school_code']; ?>" class="form-control" onKeyUp="if (isNaN(this.value)) {
											alert('กรุณากรอกตัวเลข');
											this.value = '';
										}">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="school_obec_code">รหัส Obec</label>
										<input type="text" id="school_obec_code" name="school_obec_code" value="<?php echo @$row['school_obec_code']; ?>" class="form-control" onKeyUp="if (isNaN(this.value)) {
										alert('กรุณากรอกตัวเลข');
										this.value = '';
									}">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="school_name_th">ชื่อโรงเรียน (ภาษาไทย)</label>
									<input type="text" id="school_name_th" name="school_name_th" value="<?php echo @$row['school_name_th']; ?>" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="school_name_en">ชื่อโรงเรียน (ภาษาอังกฤษ)</label>
									<input type="text" id="school_name_en" name="school_name_en" value="<?php echo @$row['school_name_en']; ?>" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="school_director">ผู้อำนวยการโรงเรียน</label>
									<input type="text" id="school_director" name="school_director" value="<?php echo @$row['school_director']; ?>" class="form-control">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="school_director_tell">เบอร์ติดต่อ (ผู้อำนวยการโรงเรียน)</label>
									<input type="text" id="school_director_tell" name="school_director_tell" value="<?php echo @$row['school_director_tell']; ?>" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="school_tell">เบอร์ติดต่อ</label>
									<input type="text" id="school_tell" name="school_tell" value="<?php echo @$row['school_tell']; ?>" class="form-control">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="school_fax">โทรสาร</label>
									<input type="text" id="school_fax" name="school_fax" value="<?php echo @$row['school_fax']; ?>" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="school_email">อีเมล</label>
									<input type="email" id="school_email" name="school_email" value="<?php echo @$row['school_email']; ?>" class="form-control">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="school_website">เว็บไซต์</label>
									<input type="text" id="school_website" name="school_website" value="<?php echo @$row['school_website']; ?>" class="form-control" pattern="https?://.+" title="Include http://">
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
						<h3 class="card-title">ที่อยู่</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<label for="province">จังหวัด</label>
									<select class="form-control" id="province" name="province" required>
										<?php
										if (!empty(@$row["province"])) {
											?>
											<option value="<?php echo $row["province"]; ?>"><?php echo $row["PROVINCE_NAME"]; ?></option>
										<?php } else { ?>
											<option value="">-เลือกจังหวัด-</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="amphur">อำเภอ</label>
									<select class="form-control" id="amphur" name="amphur" required>
										<?php
										if (!empty(@$row["amphur"])) {
											?>
											<option value="<?php echo $row["amphur"]; ?>"><?php echo $row["AMPHUR_NAME"]; ?></option>
										<?php } else { ?>
											<option value="">-เลือกอำเภอ-</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="district">ตำบล</label>
									<select class="form-control" id="district" name="district" required>
										<?php
										if (!empty(@$row["district"])) {
											?>
											<option value="<?php echo $row["district"]; ?>"><?php echo $row["DISTRICT_NAME"]; ?></option>
										<?php } else { ?>
											<option value="">-เลือกตำบล-</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="postcode">รหัสไปรษณีย์</label>
									<input type="text" class="form-control" placeholder="กรอกรหัสไปรษณีย์" id="postcode" name="postcode"value="<?php echo @$row['postcode']; ?>"onKeyUp="if (isNaN(this.value)) {
									alert('กรุณากรอกตัวเลข');
									this.value = '';
								}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputName">Latitude</label>
								<input type="text" id="school_lat" name="school_lat" value="<?php echo @$row['school_lat']; ?>" class="form-control">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputName">Longitude</label>
								<input type="text" id="school_lng" name="school_lng" value="<?php echo @$row['school_lng']; ?>" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div id="map" style="height: 240px;"></div>
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
			<input type="submit" value="บันทึกข้อมูล" class="btn btn-success float-right">
		</div>
	</div>
</form>
</section>
<!-- /.content -->
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVorLvHctD5wbBG1ghZnDNOFizhDerS8E&callback=initMap">
</script>

<?php if (@$row["school_lat"] == '' AND @$row["school_long"] == '') { ?>

	<script type="text/javascript" >

		function initMap() {
			var pos = {lat: 6.5494933, lng: 101.2890184};
                        // var urlTimeZone = 'https://maps.googleapis.com/maps/api/timezone/json?timestamp=0&location=';

                        var map = new google.maps.Map(document.getElementById('map'), {
                        	center: pos,
                        	zoom: 14,
                        	disableDefaultUI: true,
                        });
                        var geocoder = new google.maps.Geocoder;
                        var marker = new google.maps.Marker({
                        	position: pos,
                        	map: map,
                        });

                        var infowindow = new google.maps.InfoWindow({
                        	content: "เลือกพิกัดโรงเรียน"
                        });
                        infowindow.open(map, marker);

                        map.addListener('click', function (e) {
                        	marker.setPosition(e.latLng);
                        	var pos = {lat: e.latLng.lat(), lng: e.latLng.lng()};
                        	getLocation(pos);
                        	infowindow.open(map, marker);
                        });

                        if (navigator.geolocation) {
                        	navigator.geolocation.getCurrentPosition(function (position) {
                        		var pos = {
                        			lat: position.coords.latitude,
                        			lng: position.coords.longitude
                        		};
                        		marker.setPosition(pos);
                        		map.panTo(pos);
                        		getLocationName(pos);
                        	});
                        }

                        function getLocation(pos) {
                        	$('#school_lat').val(pos.lat);
                        	$('#school_lng').val(pos.lng);
                        }

                    }
                    ;
                </script>

            <?php }else {  ?>

            	<script type="text/javascript" >

            		function initMap() {
            			var pos = {lat: <?php echo @$row["school_lat"]; ?>, lng: <?php echo @$row["school_lng"]; ?>};
                        // var urlTimeZone = 'https://maps.googleapis.com/maps/api/timezone/json?timestamp=0&location=';

                        var map = new google.maps.Map(document.getElementById('map'), {
                        	center: pos,
                        	zoom: 14,
                        	disableDefaultUI: true,
                        });
                        var geocoder = new google.maps.Geocoder;
                        var marker = new google.maps.Marker({
                        	position: pos,
                        	map: map,
                        });

                        var infowindow = new google.maps.InfoWindow({
                        	content: "<?php echo @$row["school_name_th"]; ?>"
                        });
                        infowindow.open(map, marker);

                        map.addListener('click', function (e) {
                        	marker.setPosition(e.latLng);
                        	var pos = {lat: e.latLng.lat(), lng: e.latLng.lng()};
                        	getLocation(pos);
                        	infowindow.open(map, marker);
                        });

                        if (navigator.geolocation) {
                        	navigator.geolocation.getCurrentPosition(function (position) {
                        		var pos = {
                        			lat: position.coords.latitude,
                        			lng: position.coords.longitude
                        		};
                        		marker.setPosition(pos);
                        		map.panTo(pos);
                        		getLocationName(pos);
                        	});
                        }

                        function getLocation(pos) {
                        	$('#school_lat').val(pos.lat);
                        	$('#school_lng').val(pos.lng);
                        }

                    }
                    ;
                </script>

            <?php } ?>
