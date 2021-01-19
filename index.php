<?php
@ob_start();
@session_start();
include("backend/config/connect.php");
include("backend/config/date_time.php");
include 'backend/config/encrypt_function.php';
$content = isset($_GET["menu"])?$_GET["menu"]:"home";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>คลังแหล่งเรียนรู้</title>
	<!-- Theme style -->
	<link rel="stylesheet" href="backend/dist/css/adminlte.min.css">
	<!-- blueimp -->
	<link rel="stylesheet" href="dist/css/blueimp-gallery.css" />
	<link rel="stylesheet" href="dist/css/blueimp-gallery-indicator.css" />
	<link rel="stylesheet" href="dist/css/blueimp-gallery-video.css" />
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
	<!-- Font Awesome icons (free version)-->
	<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="css/styles.css" rel="stylesheet" />
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />    <style type="text/css">
		body {
			font-family: 'K2D', sans-serif !important;
			font-size: 15px !important;
		}
		.text-uppercase{
			font-family: 'K2D', sans-serif !important;
		}
		h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
			font-family: 'K2D', sans-serif !important;
		}
		.metta-learning{
			padding: 0 0 0 20px !important;
			word-wrap: break-word !important;
		}

	</style>
</head>
<body id="page-top">
	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="?menu=home">คลังแหล่งเรียนรู้</a>
			<button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">แหล่งเรียนรู้</a></li>
					<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="backend/?menu=home" target="_blank">สำหรับสมาชิก</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Masthead-->
	<header class="masthead bg-primary text-white text-center">
		<div class="container d-flex align-items-center flex-column">
			<!-- Masthead Avatar Image-->
			<!-- <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="" /> -->
			<!-- Masthead Heading-->
			<h1 class="masthead-heading text-uppercase mb-0">คลังแหล่งเรียนรู้</h1>
			<!-- Icon Divider-->
			<div class="divider-custom divider-light">
				<div class="divider-custom-line"></div>
				<div class="divider-custom-icon"><i class="fas fa-star"></i></div>
				<div class="divider-custom-line"></div>
			</div>
			<!-- Masthead Subheading-->
			<p class="masthead-subheading font-weight-light mb-0">พัฒนาครูและบุคลากรทางการศึกษาชายแดนใต้</p>
		</div>
	</header>
	<!-- Portfolio Section-->
	<?php
	switch($content) {
		case "home"                   : include("pages/main.php");                     break;

		case "learning"               : include("pages/learning/index.php");           break;
		case "learning-view"          : include("pages/learning/view.php");            break;

		default                       : include("pages/main.php");                           
	}
	?>
	<!-- Footer-->
	<footer class="footer text-center">
		<div class="container">
			<div class="row">
				<!-- Footer Location-->
				<div class="col-lg-4 mb-5 mb-lg-0">
					<h4 class="text-uppercase mb-4">ที่อยู่</h4>
					<p class="lead mb-0" style="font-size: 15px;">
						สถาบันพัฒนาครูและบุคลากรทางการศึกษาชายแดนใต้
						<br />  
						อาคาร 4 ชั้น 1 มหาวิทยาลัยราชภัฎยะลา 
						<br />                      
						133 ถ.เทศบาล3 ต.สะเตง อ.เมือง จ.ยะลา 95000
					</p>
				</div>
				<!-- Footer Social Icons-->
				<div class="col-lg-4 mb-5 mb-lg-0">
					<h4 class="text-uppercase mb-4">เว็บไซต์ที่เกี่ยวข้อง</h4>
					<a class="btn btn-outline-light btn-social mx-1" title="Facebook" href="https://www.facebook.com/ptsyru/" target="_blank"><i class="fab fa-fw fa-facebook-f"></i></a>
					<a class="btn btn-outline-light btn-social mx-1" title="Website" href="https://pts.yru.ac.th/" target="_blank"><i class="fab fa-fw fa-dribbble"></i></a>
					<a class="btn btn-outline-light btn-social mx-1" title="คูู่มือการใช้งานระบบ" href="manual/manual_v1.pdf" target="_blank"><i class="fab fa-fw fas fa-book"></i></a>
				</div>
				<!-- Footer About Text-->
				<div class="col-lg-4">
					<h4 class="text-uppercase mb-4">เกี่ยวกับเรา</h4>
					<p class="lead mb-0" style="font-size: 16px;">
						พัฒนาครูและบุคลากรทางการศึกษาชายแดนใต้
						<a href="backend/?menu=home" style="text-decoration: none;" target="_blank">สำหรับสมาชิก</a>
					</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Copyright Section-->
	<div class="copyright py-4 text-center text-white">
		<div class="container">
			<small>
				Copyright © Your Website 2020
			</small>
			<div style="line-height: 30px;font-size: 14px;">
				<span class="label label-success" ><i class="fa fa-eye text-aqua"></i> ขณะนี้ <?php include "backend/config/useronline.php";?> คน</span>

				<?php

				//*** Select วันที่ในตาราง Counter ว่าปัจจุบันเก็บของวันที่เท่าไหร่  ***//
        		//*** ถ้าเป็นของเมื่อวานให้ทำการ Update Counter ไปยังตาราง daily และลบข้อมูล เพื่อเก็บของวันปัจจุบัน ***//
				$strSQL = " SELECT DATE FROM counter LIMIT 0,1";
				$objQuery = $conn->query($strSQL);
				$objResult = $objQuery->fetch_assoc();
				// echo $objResult["DATE"];
				if($objResult["DATE"] != date("Y-m-d"))
				{
            	//*** บันทึกข้อมูลของเมื่อวานไปยังตาราง daily ***//
					$strSQL = " INSERT INTO daily (DATE,NUM) SELECT '".date('Y-m-d',strtotime("-1 day"))."',COUNT(*) AS intYesterday FROM counter WHERE 1 AND DATE = '".date('Y-m-d',strtotime("-1 day"))."'";
					$objQuery = $conn->query($strSQL);

            	//*** ลบข้อมูลของเมื่อวานในตาราง counter ***//
					$strSQL = " DELETE FROM counter WHERE DATE != '".date("Y-m-d")."' ";
					$objQuery = $conn->query($strSQL);
				}

        		//*** Insert Counter ปัจจุบัน ***//
				$strSQL = " INSERT INTO counter (DATE,IP) VALUES ('".date("Y-m-d")."','".$_SERVER["REMOTE_ADDR"]."') ";
				$objQuery = $conn->query($strSQL);

        		// Today //
				$strSQL = " SELECT COUNT(DATE) AS CounterToday FROM counter WHERE DATE = '".date("Y-m-d")."' ";
				$objQuery = $conn->query($strSQL);
				$objResult = $objQuery->fetch_assoc();
				$strToday = $objResult["CounterToday"];

        		// Yesterday //
				$strSQL = " SELECT NUM FROM daily WHERE DATE = '".date('Y-m-d',strtotime("-1 day"))."' ";
				$objQuery = $conn->query($strSQL);
				$objResult = $objQuery->fetch_assoc();
				$strYesterday = $objResult["NUM"];

        		// This Month //
				$strSQL = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '".date('Y-m')."' ";
				$objQuery = $conn->query($strSQL);
				$objResult = $objQuery->fetch_assoc();
				$strThisMonth = $objResult["CountMonth"];

        		// This Year //
				$strSQL = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '".date('Y')."' ";
				$objQuery = $conn->query($strSQL);
				$objResult = $objQuery->fetch_assoc();
				$strThisYear = $objResult["CountYear"];

        		// All //
				$strSQL = " SELECT SUM(NUM) AS CounterAll FROM daily";
				$objQuery = $conn->query($strSQL);
				$objResult = $objQuery->fetch_assoc();
				$strAll = $objResult["CounterAll"];

				?>

				<span class="label label-primary" ><i class="fa fa-user"></i> วันนี้ <?php echo number_format($strToday,0);?></span>

				<span class="label label-primary" ><i class="fa fa-users"></i> เมื่อวาน <?php echo number_format($strYesterday,0);?></span>

				<span class="label label-primary" ><i class="fas fa-chart-bar"></i> ทั้งหมด <?php echo number_format($strAll,0);?></span>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
	<!-- Third party plugin JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
	<!-- Contact form JS-->
	<script src="assets/mail/jqBootstrapValidation.js"></script>
	<script src="assets/mail/contact_me.js"></script>
	<!-- Core theme JS-->
	<script src="js/scripts.js"></script>
	<!-- blueimp -->
	<script src="js/blueimp-helper.js"></script>
	<script src="dist/js/blueimp-gallery.js"></script>
	<script src="dist/js/blueimp-gallery-fullscreen.js"></script>
	<script src="dist/js/blueimp-gallery-indicator.js"></script>
	<script src="dist/js/blueimp-gallery-video.js"></script>
	<script src="dist/js/blueimp-gallery-vimeo.js"></script>
	<script src="dist/js/blueimp-gallery-youtube.js"></script>
	<script src="dist/js/vendor/jquery.js"></script>
	<script src="dist/js/jquery.blueimp-gallery.js"></script>
	<script type="text/javascript">

		$(document).bind("contextmenu", function (event) {
  event.preventDefault(); // ห้ามคลิกขวา
});
		$(document).bind("selectstart", function (event) {
  event.preventDefault(); // ห้ามลากคลุม
});

</script>
</body>
</html>
