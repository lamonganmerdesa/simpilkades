    <?php
	    $message	= $_GET['message'];
	    $aksi		= "modul/proses_dpt.php";
    ?>
    <section class="content-header">
        <h1>
            <small>Selamat datang, <?php echo $hasil['nama_petugas']; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=home"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Pemilih</li>
        </ol>
    </section>
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Data Pemilih</h3>
				<?php
				if ($hasil['hak_akses'] == 'admin') {
				?>
				<div class="block-options pull-right">
                    <a class="btn btn-danger btn-sm" href="?p=tambah_dpt"><i class="fa fa-plus"></i> Tambah</a>
                    <a class="btn btn-success btn-sm" href="?p=import_dpt"><i class="fa fa-download"></i> Import Excel</a>
                </div>
                <?php
				} else {}
                ?>
			</div>
			<div class="box-body table-responsive pad">
            <table id="myTable1" class="responsive display nowrap table table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                    <th>RT</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
					$i=1;
					$tp=mysqli_query($koneksi, "SELECT * FROM dpt ORDER BY id");
					while($r=mysqli_fetch_array($tp)){
					    $nik            = $r['nik'];
					    $nama           = $r['nama'];
					    $tempat_lahir   = $r['tempat_lahir'];
					    $tanggal_lahir  = $r['tanggal_lahir'];
					    $jenis_kelamin  = $r['jenis_kelamin'];
					    $kode_rt        = $r['kode_rt'];
					    
					    $tahun_lahir    = substr($tanggal_lahir,-4);
					    $tahun_ini      ='2019';
					    $umur           = $tahun_ini-$tahun_lahir;
				?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $nik; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $tempat_lahir.', '.$tanggal_lahir; ?></td>
                    <td><?php echo $jenis_kelamin; ?></td>
                    <td><?php echo $umur.' Tahun'; ?></td>
                    <td><?php echo $kode_rt; ?></td>
                    <td>
                        <?php
                            if ($hasil['hak_akses'] == 'admin') {
							echo "
								<a class='btn btn-primary btn-sm' href='?p=proses_dptedit&id=$r[id]'><i class='fa fa-edit'></i>&nbsp;&nbsp;&nbsp;Edit</a>
								<a class='btn btn-danger btn-sm' href='$aksi?act=hapus&id=$r[id]'><i class='fa fa-trash'></i>&nbsp;&nbsp;&nbsp;Hapus</td>
							";
                            }else {echo "-";}
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