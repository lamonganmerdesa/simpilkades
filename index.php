<?php
	session_start();
	if ( !isset($_SESSION['username']) ) {
		header('location:login.php'); 
	}
	else { 
		$usr = $_SESSION['username']; 
	}
	require_once('koneksi.php');
	$query          = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username = '$usr'");
	$hasil          = mysqli_fetch_array($query);
	$nama_petugas   = $hasil['nama_petugas'];
	$username100    = $hasil['username'];
	$id_dpt         = $hasil['id_dpt'];
	if (empty($hasil['username'])) {
		header('Location: ./login.php');
	}
	function TanggalIndo($date){
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl   = substr($date, 8, 2);
 
		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
		return($result);
	}
	$timezone = "Asia/Jakarta";
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$date=date('Y-m-d');
	@ini_set('display_errors', 0);
	include "excel_reader2.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistem Informasi Manajemen Pemilihan Kepala Desa</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<header class="main-header">
		<a href="#" class="logo">
			<span class="logo-mini"><b>SIM</b></span>
			<span class="logo-lg"><b>SIM</b>PILKADES</span>
		</a>
		<nav class="navbar navbar-static-top">
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
		</nav>
	</header>
	<aside class="main-sidebar">
		<section class="sidebar">
			<ul class="sidebar-menu" data-widget="tree">
				<?php
				if ($hasil['hak_akses'] == 'admin') { 
				?>
				<li class="header">MAIN NAVIGATION</li>
				<li><a href="index.php?p=home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
				<li><a href="?p=data_pemilih"><i class="fa fa-hdd-o"></i> <span>Data Pemilih (DPT)</span></a></li>
				<li><a href="?p=pendukung"><i class="fa fa-thumbs-o-up"></i> <span>Daftar Dukungan</span></a></li>
                <li><a href="?p=pendukung_keseluruhan"><i class="fa fa-thumbs-o-up"></i> <span>Dukungan Keseluruhan</span></a></li>
                <li><a href="?p=report"><i class="fa fa-print"></i> <span>Report Dukungan</span></a></li>
                <li class=" treeview">
                    <a href="#"><i class="fa fa-users"></i> <span>Tim Pemenangan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="?p=koordinator"><i class="fa fa-circle-o"></i> Koordinator</a></li>
                        <li><a href="?p=relawan"><i class="fa fa-circle-o"></i> Relawan</a></li>
                    </ul>
                </li>
                <li class=" treeview">
                    <a href="#">
                        <i class="fa fa-folder-o"></i> <span>Data Referensi</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="?p=rtrw"><i class="fa fa-circle-o"></i> Data RT/RW</a></li>
                    </ul>
                </li>
				<li><a href="?p=pengaturan"><i class="fa fa-gears"></i> <span>Pengaturan</span></a></li>
				<li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>
				<?php }
				elseif ($hasil['hak_akses'] == 'koordinator'){
				?>
				<li class="header">MAIN NAVIGATION</li>
				<li><a href="index.php?p=home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
				<li><a href="?p=data_pemilih"><i class="fa fa-hdd-o"></i> <span>Data Pemilih (DPT)</span></a></li>
				<li><a href="?p=pendukung"><i class="fa fa-thumbs-o-up"></i> <span>Daftar Dukungan</span></a></li>
                <li><a href="?p=pendukung_keseluruhan"><i class="fa fa-thumbs-o-up"></i> <span>Dukungan Keseluruhan</span></a></li>
                <li><a href="?p=report"><i class="fa fa-print"></i> <span>Report Dukungan</span></a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>
				<?php }
				elseif ($hasil['hak_akses'] == 'relawan'){
				?>
				<li class="header">MAIN NAVIGATION</li>
				<li><a href="index.php?p=home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
				<li><a href="?p=data_pemilih"><i class="fa fa-hdd-o"></i> <span>Data Pemilih (DPT)</span></a></li>
				<li><a href="?p=pendukung"><i class="fa fa-thumbs-o-up"></i> <span>Daftar Dukungan</span></a></li>
                <li><a href="?p=pendukung_keseluruhan"><i class="fa fa-thumbs-o-up"></i> <span>Dukungan Keseluruhan</span></a></li>
                <li><a href="?p=report"><i class="fa fa-print"></i> <span>Report Dukungan</span></a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>
				<?php }
				?>
			</ul>
		</section>    
	</aside>
	<div class="content-wrapper">
		<?php
        $p=isset($_GET['p'])?$_GET['p']:null;
        switch($p){
            default:
				include "modul/home.php";
			break;
			case "data_pemilih":						
				include "modul/data_pemilih.php";
			break;
			case "pendukung":						
				include "modul/pendukung.php";
			break;
			case "tambah_pendukung":						
				include "modul/tambah_pendukung.php";
			break;
			case "pendukung_keseluruhan":						
				include "modul/pendukung_keseluruhan.php";
			break;
			case "tambah_dpt":						
				include "modul/tambah_dpt.php";
			break;
			case "proses_dptedit":						
				include "modul/proses_dptedit.php";
			break;
			case "import_dpt":						
				include "modul/import_dpt.php";
			break;
			case "report":						
				include "modul/report.php";
			break;
			case "koordinator":						
				include "modul/koordinator.php";
			break;
			case "tambah_koordinator":						
				include "modul/tambah_koordinator.php";
			break;
			case "relawan":						
				include "modul/relawan.php";
			break;
			case "tambah_relawan":						
				include "modul/tambah_relawan.php";
			break;
			case "rtrw":						
				include "modul/rtrw.php";
			break;
			case "rtrw_edit":						
				include "modul/rtrw_edit.php";
			break;
			case "pengaturan":						
				include "modul/pengaturan.php";
			break;
			case "kartukeluarga":						
				include "modul/kartukeluarga.php";
			break;
		}
		?>
	</div>
	<footer class="main-footer">© 2019 Windusengkahan.</footer>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script>

  $(document).ready( function () {
    $('#myTable').DataTable();
    $('#myTable2').DataTable();
    
} );
  $(function () {
   
     //Date picker
    $('#tanggal_lahir').datepicker({
      autoclose: true,
      format:'dd-mm-yyyy'
    })

     //Date picker
    $('#mulai_penilaian').datepicker({
      autoclose: true,
      format:'dd-mm-yyyy'
    })

     //Date picker
    $('#batas_penilaian').datepicker({
      autoclose: true,
      format:'dd-mm-yyyy'
    })

     //Date picker
    $('#tmt').datepicker({
      autoclose: true,
      format:'dd-mm-yyyy'
    })

    $('.select2').select2()
  })
$(document).ready( function () {
    $('#myTable1').DataTable();
    $('#myTable2').DataTable();
} );

</script>
</body>
</html>