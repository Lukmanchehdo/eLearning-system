<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>eLearning | <?php if ($_GET["menu"] == "home"){ echo $title = "หน้าหลัก"; } 
	if (($_GET["menu"] == "school") OR ($_GET["menu"] == "school-add") OR ($_GET["menu"] == "school-view") OR ($_GET["menu"] == "school-edit")){ echo $title = "ข้อมูลโรงเรียน"; } 
	if (($_GET["menu"] == "user") OR ($_GET["menu"] == "user-add") OR ($_GET["menu"] == "user-edit")){ echo $title = "ข้อมูลบัญชีผู้ใช้"; } 
	if (($_GET["menu"] == "learning_type") OR ($_GET["menu"] == "learning_type-add") OR ($_GET["menu"] == "learning_type-edit")){ echo $title = "ข้อมูลประเภทแหล่งเรียนรู้"; } 
	if (($_GET["menu"] == "copyright") OR ($_GET["menu"] == "copyright-add") OR ($_GET["menu"] == "copyright-edit")){ echo $title = "ข้อมูลการเผยแพร่"; } 
	if (($_GET["menu"] == "learning") OR ($_GET["menu"] == "learning-add") OR ($_GET["menu"] == "learning-view") OR ($_GET["menu"] == "learning-edit") OR ($_GET["menu"] == "learning-edit_img") OR ($_GET["menu"] == "learning-edit_vdo")){ echo $title = "ข้อมูลแหล่งเรียนรู้"; } if ($_GET["menu"] == "student"){ echo $title = "ข้อมูลนักเรียน"; }  ?></title>	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/img/icon/favicon.ico">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
	<!-- Ekko Lightbox -->
	<link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

	<style type="text/css">
		body {
			font-family: 'K2D', sans-serif !important;
			font-size: 15px !important;
		}
		.gm-style .gm-style-iw {
			font-family: 'K2D', sans-serif !important;
			font-weight: bold !important;
		}
		.imageThumb {
			max-width: 80px;
			border: 2px solid #b21f2d;
			padding: 1px;
			cursor: pointer;
		}
		.pip {
			display: inline-block;
			margin: 10px 10px 0 0;
		}
		.metta-learning{
			padding: 0 0 0 20px;
		}
		.callout {
			padding: 5px !important;
		}
		#response {
			display: none;
		}
		.success {
			background: #c7efd9;
			border: #bbe2cd 1px solid;
		}
		.danger {
			background: #fbcfcf;
			border: #f3c6c7 1px solid;
		}
		div#response.display-block {
			display: block;
		}
		tr.group,
		tr.group:hover {
			background-color: #a0cbfa !important;
		}
		.highcharts-root {
			font-family: 'K2D', sans-serif !important;
			font-size: 16px !important;
		}
		g text {
			font-family: 'K2D', sans-serif !important;
			font-size: 16px !important;
		}
	</style>
</head>