    <section class="content-header">
        <h1>
            <small>Selamat datang, <?php echo $nama_petugas; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=home"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="?p=data_pemilih"> Data Pemilih</a></li>
            <li class="active"> Tambah Data Pemilih</li>
        </ol>
    </section>
    <section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">TAMBAH DATA PEMILIH</h3>
			</div>
			<div class="box-body">
                <form method='POST' class="form-horizontal" action='modul/proses_dpt.php?act=input' enctype='multipart/form-data'>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 label-sm">No. KK</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control " placeholder="No. KK" name="no_kk" id="no_kk" required maxlength="16" minlength="16">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 label-sm">NIK</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control " placeholder="NIK" name="nik" id="nik" maxlength="16" minlength="16">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 ">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control " placeholder="Nama Lengkap" name="nama" id="nama" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 ">Tempat, Tanggal Lahir</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control " placeholder="Tempat Lahir" name="tempat_lahir" id="tempat_lahir" required>
                                <span class="help-block"></span>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                                    <input type="text"  class="form-control " value="29-03-2019" id="tanggal_lahir" name="tanggal_lahir" required  >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 ">Jenis Kelamin</label>
                            <div class="col-sm-3">
                                <select class="form-control select2" name="jenis_kelamin" id="jenis_kelamin" required>
                                    <option value="">- Pilih -</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                            <label class="col-sm-1 ">RT</label>
                            <div class="col-sm-3">
                                <select class="form-control select2" name="kode_rt">
                                    <?php
								    $tp2=mysqli_query($koneksi, "SELECT * FROM rtrw ORDER BY id");
								    while($r2=mysqli_fetch_array($tp2)){
								        $rtrw   = $r2['rtrw'];
								?>
								    <option value='<?php echo $rtrw;?>'><?php echo $rtrw; ?></option>
							    <?php } ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 ">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit"  name="submit" class="btn bg-navy "><i class="fa fa-check"></i> Submit</button>
                        <a  class="btn btn-danger" href="?p=data_pemilih" ><i class="fa fa-remove"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </section>