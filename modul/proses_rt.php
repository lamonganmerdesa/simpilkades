<?php
	include "../koneksi.php";
	
	$id     = $_POST['id'];
	$rw     = $_POST['rw'];
	$rt     = $_POST['rt'];
	$status = $_POST['status'];
	$rtrw   = $rt.'/'.$rw;
	
	$p=isset($_GET['act'])?$_GET['act']:null;
    switch($p){
        default:
			break;
        case "input":						
			mysqli_query($koneksi, "INSERT INTO rtrw VALUES ('', '$rw', '$rt', '$rtrw', '$status')");
			header('location:../index.php?p=rtrw');
	        break;
        case "hapus":
			mysqli_query($koneksi, "DELETE FROM rtrw WHERE id='$_GET[id]'");
			header('location:../index.php?p=rtrw');
	        break;
        case "update":
			mysqli_query($koneksi, "UPDATE rtrw SET rw='$_POST[rw]', rt='$_POST[rt]', status='$_POST[status]' WHERE id='$_POST[id]'");
			header('location:../index.php?p=rtrw');  
	}
?>   