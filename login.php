<?php
	session_start();
	if( isset($_SESSION['userid']) ) {
		header('location:index.php'); 
	}
	require_once('koneksi.php');
	$userfail = isset($_GET['userfail']);
	$passwordfail = isset($_GET['passwordfail']);
	$logout = isset($_GET['logout']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistem Informasi Manajemen Pemilihan Kepala Desa | Log in</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="#"><b>SIM</b>PILKADES</a>
	</div>
	<div class="login-box-body">
		<p class="login-box-msg">Masukkan Username dan Password</p>
		<?php 
			if ($userfail) {
				echo '
				<div class="alert alert-warning alert-dismissable">
					<button class="close" data-dismiss="alert">&times;</button>
					<p>Username / Password Salah !</p>
                </div>';
			}
			else if ($passwordfail) {
				echo '                        
				<div class="alert alert-warning alert-dismissable">
					<button class="close" data-dismiss="alert">&times;</button>
						<p>Username / Password Salah !</p>
                </div>';
			}
			else if ($logout) {
				echo '                        	
				<div class="alert alert-warning alert-dismissable">
				<button class="close" data-dismiss="alert">&times;</button>
					<p>Anda telah berhasil logout</p>
                </div>';
			}
		?>
		<form action="cek_login.php" method="post">
		<div class="form-group has-feedback">
			<input class="form-control" name="username" type="text" required="" placeholder="Username">			
		</div>
		<div class="form-group has-feedback">
			<input class="form-control" name="password" type="password" required="" placeholder="Password">
        </div>
		<div class="row">
			<div class="col-xs-8">
				<div class="checkbox icheck">
					<label>
						<input type="checkbox"> &nbsp;
					</label>
				</div>
			</div>
			<div class="col-xs-4">
				<button class="btn btn-primary btn-block btn-flat" type="submit">Log In</button>
			</div>        
		</div>
		</form>
	</div>                                 
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>