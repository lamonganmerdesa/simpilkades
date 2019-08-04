<?php
if (!empty($_GET['pesan']) && $_GET['pesan'] == 'tambah') {//NOTIFIKASI DATA BERHASIL DITAMBAH
?>
    <div class="alert alert-success">
        <a href="index.php?modul=<?php echo $_GET["modul"]; ?>">×</a>
        <strong>Sukses !</strong> Data berhasil ditambah.
    </div>
<?php
} else if (!empty($_GET['pesan']) && $_GET['pesan'] == 'ubah') {//NOTIFIKASI DATA BERHASIL DIUBAH
?>
    <div class="alert alert-success">
       <a href="index.php?modul=<?php echo $_GET["modul"]; ?>">×</a>
        <strong>Sukses !</strong> Data berhasil diubah.
    </div>
<?php
} else if (!empty($_GET['pesan']) && $_GET['pesan'] == 'hapus') {//NOTIFIKASI DATA BERHASIL DIHAPUS
?>
    <div class="alert alert-success">
       <a href="index.php?modul=<?php echo $_GET["modul"]; ?>" >×</a>
        <strong>Sukses !</strong> Data berhasil dihapus.
    </div>
<?php
} else if (!empty($_GET['pesan']) && $_GET['pesan'] == 'error') {//NOTIFIKASI DATA BERHASIL DIHAPUS
?>
    <div class="alert alert-error">
       <a href="index.php?modul=<?php echo $_GET["modul"]; ?>">×</a>
        <strong>Gagal !</strong> Terjadi kesalahan data.
    </div>
<?php
}
