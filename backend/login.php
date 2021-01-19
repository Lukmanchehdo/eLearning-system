<?php 
@ob_start();
@session_start();
include("config/connect.php");
include("config/encrypt_function.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>eLearning | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/img/icon/favicon.ico">  <!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<style type="text/css">
		body {
			font-family: 'K2D', sans-serif !important;
			font-size: 15px !important;
		}
	</style>
</head>
<body class="hold-transition login-page" style="background: url(https://www.digitalchalk.com/wp-content/uploads/2019/04/h1-bg.jpg);">
	<?php
	if (@$_GET["Action"] == "login") {

		$sql_login = "SELECT * FROM tbl_user WHERE user_name = '" . $_POST['user_name'] . "' AND password = '" . md5($_POST["password"]) . "'";
		$result_login = $conn->query($sql_login);
		$row_login = $result_login->fetch_assoc();
		$count = mysqli_num_rows($result_login);

		if ($row_login == true) {

			if (!empty($_POST["remember"])) {
				setcookie("user_name", $_POST["user_name"], time() + (10 * 365 * 24 * 60 * 60));
				setcookie("password", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
			} else {
				if (isset($_COOKIE["user_name"])) {
					setcookie("user_name", "");
				}
				if (isset($_COOKIE["password"])) {
					setcookie("password", "");
				}
			}

			if ($row_login["role"] == 'Admin') {
				$sql = "SELECT * FROM  tbl_school  WHERE school_id = '" . $row_login["school_id"] . "'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();

				$_SESSION["login"] = $row_login["role"];
				$_SESSION["school_id"] = $row["school_id"];
				$_SESSION["school_name_th"] = $row["school_name_th"];
				$id = $row["school_id"];

				session_write_close();

				header("Location: admin/?menu=home");
			} else {
				$sql = "SELECT * FROM  tbl_school  WHERE school_id = '" . $row_login["school_id"] . "'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();

				$_SESSION["login"] = $row_login["role"];
				$_SESSION["user_id"] = $row_login["user_id"];
				$_SESSION["school_id"] = $row["school_id"];
				$_SESSION["school_name_th"] = $row["school_name_th"];
				$id = urlencode(encrypt($row['school_id']));

				session_write_close();

				header("Location: index.php?menu=school-view&school_id=$id");
			}
		} else {

			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}
	?>
	<div class="login-box">
		<div class="login-logo">
			<a><strong>Admin</strong> : eLearning</a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in to start your session</p>

				<form action="?Action=login" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="ชื่อผู้ใช้" id="user_name" name="user_name" value="<?php
						if (isset($_COOKIE["user_name"])) {
							echo $_COOKIE["user_name"];
						}
						?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control pass-swap" placeholder="รหัสผ่าน" id="password" name="password" value="<?php
						if (isset($_COOKIE["password"])) {
							echo $_COOKIE["password"];
						}
						?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="far fa-eye"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="remember" name="remember" <?php if (isset($_COOKIE["user_name"])) { ?> checked <?php } ?>>
								<label for="remember">
									Remember Me
								</label>
							</div>
						</div>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>

	<script type="text/javascript">
		$(function(){
     // กรณีใช้ร่วมกับ bootstrap และ fontawesome 
     $(document.body).on("click","[class*='fa-eye']",function(){
     	$(this).toggleClass("fa-eye-slash fa-eye");  
     	let ele = $(this).closest(".input-group-append").siblings(".pass-swap");
     	let swap_attr = (ele.attr("type")=="password")?"text":"password";
     	ele.attr("type",swap_attr);         
     });     
 });
</script>

</body>
</html>
