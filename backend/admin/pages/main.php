<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard v1</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3>
								<?php
								$sql = "SELECT COUNT(*) AS learning_count FROM tbl_learning";
								$result = $conn->query($sql);
								$row = $result->fetch_assoc();

								echo number_format($row["learning_count"]);
								?>

							</h3>

							<p>แห่ลงเรียนรู้</p>
						</div>
						<div class="icon">
							<i class="fab fa-leanpub"></i>
						</div>
						<a href="?menu=learning" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3>
								<?php
								$sql = "SELECT COUNT(*) AS learning_type_count FROM tbl_learning_type";
								$result = $conn->query($sql);
								$row = $result->fetch_assoc();

								echo number_format($row["learning_type_count"]);
								?>

							</h3>

							<p>ประเภทแหล่งเรียนรู้</p>
						</div>
						<div class="icon">
							<i class="fas fa-list"></i>
						</div>
						<a href="?menu=learning_type" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3>
								<?php
								$sql = "SELECT COUNT(*) AS user_count FROM tbl_user";
								$result = $conn->query($sql);
								$row = $result->fetch_assoc();

								echo number_format($row["user_count"]);
								?>

							</h3>

							<p>บัญชีผู้ใช้</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="?menu=user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3>
								<?php
								$sql = "SELECT COUNT(*) AS school_count FROM tbl_school";
								$result = $conn->query($sql);
								$row = $result->fetch_assoc();

								echo number_format($row["school_count"]);
								?>

							</h3>

							<p>โรงเรียน</p>
						</div>
						<div class="icon">
							<i class="fas fa-school"></i>
						</div>
						<a href="?menu=school" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
			<!-- Main row -->
			<div class="row">
				<!-- Left col -->
				<section class="col-lg-6 connectedSortable ui-sortable">
					<!-- Custom tabs (Charts with tabs)-->
					<div class="card">
						<div class="card-header ui-sortable-handle" style="cursor: move;">
							<h3 class="card-title">
								<i class="fas fa-chart-bar mr-1"></i>
								สถิติผู้เข้าชมเว็บไซต์
							</h3>
							<div class="card-tools">
								<ul class="nav nav-pills ml-auto">
									<li class="nav-item">
										<a class="nav-link active" href="#sales-chart" data-toggle="tab"><i class="fas fa-chart-pie"></i></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#revenue-chart" data-toggle="tab"><i class="fas fa-table"></i></a>
									</li>
								</ul>
							</div>
						</div><!-- /.card-header -->
						<div class="card-body table-responsive p-0">
							<div class="tab-content p-0">
								<!-- Morris chart - Sales -->
								<div class="chart tab-pane active" id="sales-chart" style="position: relative; height: 300px;"></div>
								<div class="chart tab-pane" id="revenue-chart" style="position: relative; height: 300px;">
									<table class="table table-hover text-nowrap">
										<tr>
											<th style="width: 10%">#</th>
											<th style="width: 70%">รายการ</th>
											<th style="width: 20%" align="center">ผู้เข้าชม(คน)</th>
										</tr>
										<tr>
											<td>1.</td>
											<td>ขณะนี้</td>
											<td align="center"><span class="badge bg-green"><?php include("../config/useronline.php"); ?></span></td>
										</tr>
										<tr>
											<td>2.</td>
											<td>วันนี้</td>
											<td align="center"><span class="badge bg-blue"><?php echo number_format($strToday,0);?></span></td>
										</tr>
										<tr>
											<td>3.</td>
											<td>ปีนี้</td>
											<td align="center"><span class="badge bg-orange"><?php echo number_format($strThisYear,0);?></span></td>
										</tr>
										<tr>
											<td>4.</td>
											<td>ทั้งหมด</td>
											<td align="center"><span class="badge bg-red"><?php echo number_format($strAll,0);?></span></td>
										</tr>
									</table>                        
								</div>  
							</div>
						</div><!-- /.card-body -->
					</div>
					<!-- /.card -->
				</section>
				<section class="col-lg-6 connectedSortable">

					<!-- Map card -->
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="ion ion-clipboard mr-1"></i>
								To Do List
							</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<ul class="todo-list" data-widget="todo-list">
								<?php
								$i=0;

								$sql = "SELECT learning_name, learning_view FROM tbl_learning ORDER BY learning_view DESC LIMIT 7";
								$result = $conn->query($sql);
								while($row = $result->fetch_assoc()) {
									$i++;
									?> 
									<li>
										<span class="handle">
											<i class="fas fa-eye"></i>
											<?php echo $row['learning_view']; ?> | 
											<i class="fas fa-ellipsis-v"></i>
											<i class="fas fa-ellipsis-v"></i>
										</span>
										<span class="text"><?php echo $row['learning_name']; ?></span>
									</li>
								<?php } ?>
							</ul>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card-tools -->
				</section>
			</div>
			<div class="row">
				<!-- Left col -->
				<section class="col-lg-12 connectedSortable">
					<!-- Custom tabs (Charts with tabs)-->
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas fa-map-marker mr-1"></i>
								MAP โรงเรียนเครือข่าย
							</h3>
							<div class="card-tools">
							</div>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div id="map_canvas" style="height: 400px;"></div>
						</div><!-- /.card-body -->
					</div>
					<!-- /.card -->
				</section>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVorLvHctD5wbBG1ghZnDNOFizhDerS8E&callback=initMap">
</script>
<script type="text/javascript" >
	var map,infowindow;
	function initMap() { 
		var myOptions = {
			zoom: 9,
			center: new google.maps.LatLng(6.474179,101.532269),
			mapTypeId: 'roadmap'
		};
		map = new google.maps.Map(document.getElementById('map_canvas'),
			myOptions);
		infowindow = new google.maps.InfoWindow({
			map:map,
		});
		selectLocation();
	}
	var icons = {
		74:{
			icon: '../assets/img/icon/pn.png'
		},
		75:{
			icon: '../assets/img/icon/yl.png'
		},
		76:{
			icon: '../assets/img/icon/nt.png'
		}
	};
	function selectLocation(){
		<?php
		$sql = "SELECT * FROM tbl_school INNER JOIN amphur ON tbl_school.amphur = amphur.AMPHUR_ID INNER JOIN district ON tbl_school.district = district.DISTRICT_ID INNER JOIN province ON tbl_school.province = province.PROVINCE_ID WHERE tbl_school.school_lat != '' AND tbl_school.school_lng != ''";
		$result = $conn->query($sql);
		$count = mysqli_num_rows($result);
		if($count > 0){
			while ($row = $result->fetch_assoc()) {
				?>
				var type = '<?php echo $row['province']; ?>';
				var content = '<h6 class="mt-0"><i class="fa fa-map-marker" aria-hidden="true"></i> : <?php echo $row['school_name_th']; ?> ' + 'ต.<?php echo $row['DISTRICT_NAME']; ?> ' + ' อ.<?php echo $row['AMPHUR_NAME']; ?> ' + ' จ.<?php echo $row['PROVINCE_NAME']; ?>' + '</h6>'

				var makeroption = {
					map:map,
					content:content,
					position: new google.maps.LatLng(<?php echo $row['school_lat']; ?>,<?php echo $row['school_lng']; ?>),
					draggalbe:true,
					icon: icons[type].icon
				};
				var marker = new google.maps.Marker(makeroption);
				google.maps.event.addListener(marker,'click',function(e){
					infowindow.setContent(this.content);
					infowindow.open(map,this);
				});
				<?php
			} 
		} else {
			echo "ไม่พบข้อมูล";
                //selectLocation();
		}
		?>
	}
</script>