    <section class="content-header">
        <h1>
            <small>Selamat datang, <?php echo $nama_petugas; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Report Daftar Pendukung</li>
        </ol>
    </section>
    <section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Report Daftar Pendukung</h3>
				<div class="block-options pull-right">
                    <a class="btn btn-danger btn-sm" href='?p=home'><i class="fa fa-undo"></i> Kembali</a>
                </div>
			</div>
		    <div class="box-body">
            <form action="#" method='GET'>
                <div class="form-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <select class="form-control select2" name="kode_rt">
                                <option>- Pilih -</option>
                            <?php
							    $tp2=mysqli_query($koneksi, "SELECT * FROM rtrw ORDER BY id");
								while($r2=mysqli_fetch_array($tp2)){
								    $rtrw   = $r2['rtrw'];
							?>
							    <option value='<?php echo $rtrw;?>'><?php echo $rtrw; ?></option>
							<?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label class="control-label"></label>
                            <button type="submit" style="margin-top: 8px;" type="button" class="btn bg-navy btn-sm" >Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
	</section>