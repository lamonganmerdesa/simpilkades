<?php
    include "../koneksi.php";
    
	$timezone = "Asia/Jakarta";
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$date=date('Y-m-d');
	
	$id_dpt	        = $_POST['id_dpt'];
	$username       = $_POST['username'];
	$password       = md5($_POST['password']);
	
	$p=isset($_GET['act'])?$_GET['act']:null;
    switch($p){
        default:
			break;
		case "input":
	        $cek	= mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username' OR id_dpt='$id_dpt'");
			$jumlah = mysqli_num_rows($cek);
			if ($jumlah == 0 ) {
			    mysqli_query($koneksi, "INSERT INTO relawan VALUES ('', '$id_dpt', '$username', '$password')");
			    
			    $sql	= mysqli_query($koneksi, "SELECT * FROM dpt WHERE id='$id_dpt'");
			    $hasil  = mysqli_fetch_array($sql);
			    $nama   = $hasil['nama'];
			    
			    mysqli_query($koneksi, "INSERT INTO petugas VALUES ('', '$id_dpt', '$nama', '$username', '$password', 'relawan','1')");
				mysqli_query($koneksi, "UPDATE dpt SET rekom='admin', status = '1' WHERE id='$id_dpt'");
				header('location:../index.php?p=relawan');						   
				break;
			}
			else {
				$message = 'DATA SUDAH ADA DALAM DATABASE';
				header("location:../index.php?p=relawan&message=$message");						   
				break;
			}
		case "hapus":
			mysqli_query($koneksi, "DELETE FROM relawan WHERE id_dpt='$_GET[id_dpt]'");
			mysqli_query($koneksi, "DELETE FROM petugas WHERE id_dpt='$_GET[id_dpt]'");
			mysqli_query($koneksi, "UPDATE dpt SET rekom='admin', status = '0' WHERE id='$_GET[id_dpt]'");
			header('location:../index.php?p=relawan');
	        break;
		case "update":
			mysqli_query($koneksi, "UPDATE dpt SET no_kk = '$no_kk', nik = '$nik', nama ='$nama', 
			tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', 
			kode_rt = '$kode_rt', keterangan = '$keterangan' WHERE id='$_POST[id]'");
			header('location:../index.php?p=data_pemilih');  
  	        break;
	}
?>