    <?php
	    $edit = mysqli_query($koneksi, "SELECT * FROM rtrw WHERE id='$_GET[id]'");
        $r    = mysqli_fetch_array($edit);
    ?>
    <section class="content-header">
        <h1>
            <small>Selamat datang, <?php echo $nama_petugas; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=home"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data RT/RW</li>
        </ol>
    </section>
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<div class="box-body">
					<form method='POST' class="form-horizontal" action='modul/proses_rt.php?act=update' enctype='multipart/form-data'>
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">RT</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name='rt' value='<?php echo $r[rt]; ?>'>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">RW</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name='rw' value='<?php echo $r[rw]; ?>'>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Status</label>
							<div class="col-sm-10">
								<select class="form-control" name="status">
							        <option value=''>- Pilih -</option>
							        <option value='Y'>Y</option>
							        <option value='N'>N</option>
							    </select>
							</div>
						</div>
					</div>	            
					<div class="modal-footer">
						<a href="?p=rtrw" type="button" class="btn btn-default pull-left">Batal</a>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
					<input type='hidden' name='id' value='<?php echo $r[id]; ?>'>
					</form>	
				</div>
			</div>
		</div>
    </section>