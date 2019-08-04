<?php
    include "../koneksi.php";
    
	$timezone = "Asia/Jakarta";
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$date=date('Y-m-d');
	
	$id_dpt	        = $_POST['id_dpt'];
	$username       = $_POST['username'];
	$password       = md5($_POST['password']);
	$koordinator	= $_POST['koordinator'];
	
	$p=isset($_GET['act'])?$_GET['act']:null;
    switch($p){
        default:
			break;
		case "tambah":
			mysqli_query($koneksi, "UPDATE dpt SET rekom='$_GET[rekom]', status = '1' WHERE id='$_GET[id]'");
			header('location:../index.php?p=pendukung');
	        break;
	    case "hapus":
			mysqli_query($koneksi, "UPDATE dpt SET rekom='$_GET[rekom]', status = '0' WHERE id='$_GET[id]'");
			header('location:../index.php?p=pendukung');
	        break;
	}
?>