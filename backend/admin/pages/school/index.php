<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>ข้อมูลโรงเรียน</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
						<li class="breadcrumb-item active">ข้อมูลโรงเรียน</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<?php
		if (@$_GET["Action"] == "del") {

			if (($_GET["school_id"] != "")) {

				$sql = "DELETE FROM tbl_school WHERE school_id = '" . $_GET["school_id"] . "'";

				$result = $conn->query($sql);
				if ($result==true) { 
					?>

					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-check"></i> ลบข้อมูลเรียบร้อย!</h5>
						กรุณารอสักครู่.
					</div>
					<META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=school">

					<?php
				}
			} else {

				echo '<script> window.setTimeout("history.back();", 3000);</script>';
			}
		}
		?>

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">ข้อมูลโรงเรียน</h3>

				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fas fa-minus"></i></button>
						<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fas fa-times"></i></button>
						</div>
					</div>
					<div class="card-body table-responsive p-0">
						<div class="card-body">
							<table class="table table-hover text-nowrap" id="dataTable">
								<thead>
									<tr>
										<th style="width: 1%">
											#
										</th>
										<th style="width: 20%">
											โรงเรียน
										</th>
										<th style="width: 30%">
											ผู้บริหาร
										</th>
										<th>
											ข้อมูลติดต่อ
										</th>
									<!-- <th>
										ที่อยู่
									</th> -->
									<th style="width: 20%">
										จัดการ
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i=0;

                // $sql = "SELECT * FROM tbl_school INNER JOIN amphur ON tbl_school.amphur = amphur.AMPHUR_ID INNER JOIN district ON tbl_school.district = district.DISTRICT_ID INNER JOIN province ON tbl_school.province = province.PROVINCE_ID";

								$sql = "SELECT * FROM tbl_school";
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
												<?php echo $row['school_name_th']; ?>
											</a>
											<br/>
											<small>
												<?php echo $row['school_name_en']; ?>
											</small>
										</td>
										<td>
											<a>
												<?php echo $row['school_director']; ?>
											</a>
											<br/>
											<small>
												<?php echo $row['school_director_tell']; ?>
											</small>
										</td>
										<td>
											<small>
												โทร: <?php echo $row['school_tell']; ?>
											</small>
											<br/>
											<small>
												อีเมล: <?php echo $row['school_email']; ?>
											</small>
											<br/>
											<small>
												เว็บไซต์: <?php echo $row['school_website']; ?>
											</small>
										</td>
										<!-- <td>
											<small>
												ตำบล: <?php //echo $row['DISTRICT_NAME']; ?>
											</small>
											<br/>
											<small>
												อำเภอ: <?php //echo $row['AMPHUR_NAME']; ?>
											</small>
											<br/>
											<small>
												จังหวัด: <?php //echo $row['PROVINCE_NAME'].' '.$row['POSTCODE']; ?>
											</small>
										</td> -->
										<td class="project-actions text-right">
											<a class="btn btn-primary btn-sm" href="?menu=school-view&school_id=<?php echo $row['school_id']; ?>">
												<i class="fas fa-folder">
												</i>
												View
											</a>
											<a class="btn btn-info btn-sm" href="?menu=school-edit&school_id=<?php echo $row['school_id']; ?>">
												<i class="fas fa-pencil-alt">
												</i>
												Edit
											</a>
											<a class="btn btn-danger btn-sm" href="?menu=school&Action=del&school_id=<?php echo $row['school_id']; ?>" onclick="return confirm('คุณต้องการลบใช่หรือไม่ ?');" >
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
				<!-- /.card-body -->
			</div>
			<!-- /.card -->

		</section>
		<!-- /.content -->
	</div>