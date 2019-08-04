    <?php
	    $message	= $_GET['message'];
	    $aksi		= "modul/proses_relawan.php";
    ?>
    <section class="content-header">
        <h1>
            <small>Selamat datang, <?php echo $nama_petugas; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=home"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Relawan</li>
        </ol>
    </section>
    <section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Relawan</h3>
				<div class="block-options pull-right">
                    <a class="btn btn-danger btn-sm" href="?p=tambah_relawan"><i class="fa fa-plus"></i> Tambah</a>
                </div>
                <p><font color="red"><strong><?php echo $message; ?></strong></font></p>
			</div>
			<div class="box-body table-responsive pad">
            <table id="myTable1" class="responsive display nowrap table table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Relawan</th>
                    <th>Username</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
					$i=1;
					$tp=mysqli_query($koneksi, "SELECT * FROM relawan ORDER BY id");
					while($r=mysqli_fetch_array($tp)){
				?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                    <?php 
                        $nama   = mysqli_query($koneksi, "SELECT * FROM dpt WHERE id='$r[id_dpt]'");
                        $r1      =mysqli_fetch_array($nama);
                        echo $r1[nama];
                    ?>    
                    </td>
                    <td><?php echo $r[username]; ?></td>
                    <td>
                    <?php
						echo "
							<a class='btn btn-primary btn-sm' href='?p=relawan_edit&id=$r[id]'><i class='fa fa-edit'></i>&nbsp;&nbsp;&nbsp;Edit</a>
							<a class='btn btn-danger btn-sm' href='$aksi?act=hapus&id_dpt=$r[id_dpt]'><i class='fa fa-trash'></i>&nbsp;&nbsp;&nbsp;Hapus</td>
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