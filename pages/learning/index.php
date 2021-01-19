<section class="page-section portfolio" id="portfolio">
	<div class="container">
		<!-- Portfolio Section Heading-->
		<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">แหล่งเรียนรู้</h2>
		<!-- Icon Divider-->
		<div class="divider-custom">
			<div class="divider-custom-line"></div>
			<div class="divider-custom-icon"><i class="fas fa-book-open"></i></div>
			<div class="divider-custom-line"></div>
		</div>
		<!-- Portfolio Grid Items-->
		<div class="row">
			<?php
			$i=0;

			$sql = "SELECT * FROM tbl_learning INNER JOIN tbl_school ON tbl_learning.school_id = tbl_school.school_id WHERE tbl_learning.learning_type_id = '" . decrypt(urldecode($_GET['learning_type_id'])) . "'";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()) {
				$i++;
				?>
				<!-- Portfolio Item 1-->
				<style type="text/css">
					a {
						color: #2c3e50;
						text-decoration: none;
					}
					a:hover {
						color: #117964;
						text-decoration: none;
					}
				</style>
				<div class="col-md-12">
					<div class="box-info">
						<a href="?menu=learning-view&learning_id=<?php echo $encode = urlencode(encrypt($row['learning_id'])); ?>">
							<div class="info">
								<div class="info-txt">
									<h3> 
										<i class="fab fa-leanpub"></i> 
										<?php echo $row['learning_name']; ?> 
									</h3>
								</div>
								<div class="info-meta">
									<i class="fa fa-calendar" style="font-size: 14px"></i> 
									<?php echo DateThaiTime($row["created_at"]) ?> | โดย <?php echo $row['school_name_th']; ?> | อ่าน <?php echo $row['learning_view']; ?> ครั้ง
								</div>
							</div>
						</a>
					</div>
					<hr>
				</div>
			<?php } ?>
		</div>
	</div>
</section>