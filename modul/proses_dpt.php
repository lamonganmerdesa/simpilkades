<?php
	$timezone = "Asia/Jakarta";
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$date=date('Y-m-d');
	
	$no_kk	= $_POST['no_kk'];
	$nik	= $_POST['nik'];
	$nama	= $_POST['nama'];
	$tempat_lahir	= $_POST['tempat_lahir'];
	$tanggal_lahir	= $_POST['tanggal_lahir'];
	$jenis_kelamin	= $_POST['jenis_kelamin'];
	$kode_rt	= $_POST['kode_rt'];
	$keterangan	= $_POST['keterangan'];
	
	include "../koneksi.php";
	include "../excel_reader2.php";
	
    $p=isset($_GET['act'])?$_GET['act']:null;
    switch($p){
        default:
			break;
		case "input":
			$cek	= mysqli_query($koneksi, "SELECT * FROM dpt WHERE nik='$nik'");
			$jumlah = mysqli_num_rows($cek);	
			if ($jumlah == 0 ) {
				mysqli_query($koneksi, "INSERT INTO dpt VALUES ('', '$no_kk', '$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$kode_rt', '$keterangan', '','')");
				header('location:../index.php?p=data_pemilih');						   
				break;
			}
			else {
				$message = 'DATA SUDAH ADA DALAM DATABASE';
				header("location:../index.php?p=data_pemilih&message=$message");						   
				break;
			}
		case "hapus":
			mysqli_query($koneksi, "DELETE FROM dpt WHERE id='$_GET[id]'");
			header('location:../index.php?p=data_pemilih');
	        break;
		case "update":
			mysqli_query($koneksi, "UPDATE dpt SET no_kk = '$no_kk', nik = '$nik', nama ='$nama', 
			tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', 
			kode_rt = '$kode_rt', keterangan = '$keterangan' WHERE id='$_POST[id]'");
			header('location:../index.php?p=data_pemilih');  
  	        break;
  	    case "import":
			// upload file xls
            $target = basename($_FILES['filepegawai']['name']) ;
            move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);

            // beri permisi agar file xls dapat di baca
            chmod($_FILES['filepegawai']['name'],0777);

            // mengambil isi file xls
            $data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'],false);
            // menghitung jumlah baris data yang ada
            $jumlah_baris = $data->rowcount($sheet_index=0);

            // jumlah default data yang berhasil di import
            $berhasil = 0;
            for ($i=2; $i<=$jumlah_baris; $i++){
	            // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	            $no_kk          = $data->val($i, 1);
	            $nik            = $data->val($i, 2);
	            $nama           = $data->val($i, 3);
	            $tempat_lahir   = $data->val($i, 4);
	            $tanggal_lahir  = $data->val($i, 5);
	            $jenis_kelamin  = $data->val($i, 6);
	            $kode_rt        = $data->val($i, 7);
	            
	            if($no_kk!="" && $nik!="" && $nama!="" && $tempat_lahir!="" && $tanggal_lahir!=""
	            && $jenis_kelamin!="" && $kode_rt!=""){
		            // input data ke database (table data_pegawai)
		            mysqli_query($koneksi,"INSERT into dpt values('','$no_kk','$nik','$nama', '$tempat_lahir', '$tanggal_lahir',
		            '$jenis_kelamin', '$kode_rt', '', '', '0')");
		            $berhasil++;
	            }
            }
            // hapus kembali file .xls yang di upload tadi
            unlink($_FILES['filepegawai']['name']);
			header('location:../index.php?p=data_pemilih');  
  	        break;
	}
?>