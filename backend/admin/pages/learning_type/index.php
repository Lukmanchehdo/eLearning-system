<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>ข้อมูลประเภทแหล่งเรียนรู้</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
						<li class="breadcrumb-item active">ข้อมูลประเภทแหล่งเรียนรู้</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<?php
		if (@$_GET["Action"] == "del") {

			if (($_GET["learning_type_id"] != "")) {

				$sql = "DELETE FROM tbl_learning_type WHERE learning_type_id = '" . $_GET["learning_type_id"] . "'";
				
				$result = $conn->query($sql);
				if ($result==true) { 
					?>

					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-check"></i> ลบข้อมูลเรียบร้อย!</h5>
						กรุณารอสักครู่.
					</div>
					<META HTTP-EQUIV="Refresh" CONTENT="3;URL=?menu=learning_type">
					
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
				<h3 class="card-title">ข้อมูลประเภทแหล่งเรียนรู้</h3>

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
										<th style="width: 10%">
											#
										</th>
										<th style="width: 20%">
											ประเภทแหล่งเรียนรู้
										</th>
										<th style="width: 20%">
											จัดการ
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=0;
									
									$sql = "SELECT * FROM tbl_learning_type";
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
													<?php echo $row['learning_type_name']; ?>
												</a>
											</td>
											<td class="project-actions text-right">
                <!-- <a class="btn btn-primary btn-sm" href="?menu=learning_type-view&learning_type_id=<?php //echo $row['learning_type_id']; ?>">
                  <i class="fas fa-folder">
                  </i>
                  View
              </a> -->
              <a class="btn btn-info btn-sm" href="?menu=learning_type-edit&learning_type_id=<?php echo $row['learning_type_id']; ?>">
              	<i class="fas fa-pencil-alt">
              	</i>
              	Edit
              </a>
              <a class="btn btn-danger btn-sm" href="?menu=learning_type&Action=del&learning_type_id=<?php echo $row['learning_type_id']; ?>" onclick="return confirm('คุณต้องการลบใช่หรือไม่ ?');" >
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
