    <?php
	    $message	= $_GET['message'];
	    $no_kk      = $_GET['kk'];
	    //$aksi		= "modul/proses_pendukung.php";
    ?>
    <section class="content-header">
        <h1>
            <small>Selamat datang, <?php echo $nama_petugas; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=home"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Daftar Pendukung</li>
        </ol>
    </section>
    <section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Kartu Keluarga <?php echo $no_kk; ?></h3>
				<div class="block-options pull-right">
                    <a class="btn btn-danger btn-sm" href='?p=pendukung' ><i class="fa fa-undo"></i> Kembali</a>
                </div>
			</div>
			<div class="box-body table-responsive pad">
            <table id="myTable1" class="responsive display nowrap table table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                    <th>RT</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
					$i=1;
					$tp=mysqli_query($koneksi, "SELECT * FROM dpt WHERE no_kk='$no_kk' AND status='0' ORDER BY id");
					while($r=mysqli_fetch_array($tp)){
					    $tanggal_lahir  = $r['tanggal_lahir'];
					    $tahun_lahir    = substr($tanggal_lahir,-4);
					    $tahun_ini      ='2019';
					    $umur           = $tahun_ini-$tahun_lahir;
				?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $r['nama']; ?></td>
                    <td><?php echo $r['jenis_kelamin']; ?></td>
                    <td><?php echo $umur.' Tahun'; ?></td>
                    <td><?php echo $r['kode_rt']; ?></td>
                    <td>
                        <?php
							echo "
								<a class='btn btn-primary btn-sm' href='$aksi?act=tambah&id=$r[id]&rekom=$username100'><i class='fa fa-thumbs-o-up'></i>&nbsp;&nbsp;&nbsp;Tambahkan</a>
							";
						?>
                    </td>
                </tr> 
                <?php
                    $i++;
					}
                ?>
                </tbody>
            </table>
        </div>
		</div>
    </section>