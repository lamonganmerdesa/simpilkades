    <section class="content-header">
        <h1>
            <small>Selamat datang, <?php echo $nama_petugas; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=home"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="?p=data_pemilih"> Data Pemilih</a></li>
            <li class="active"> Import Data Pemilih</li>
        </ol>
    </section>
    <section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Import Data Pemilih</h3>
				<p><font color="red"><strong><?php echo $errorMessage ?></strong></font></p>
				<div class="block-options pull-right">
                    <a class="btn btn-success btn-sm" href="https://lamonganmerdesa.com/simpilkades/format_excel.xls"><i class="fa fa-download"></i> Download Format Excel</a>
                    <a class="btn btn-danger btn-sm" href="?p=data_pemilih" ><i class="fa fa-undo"></i> Kembali</a>
                </div>
			</div>
			<div class="box-body">
                <form method='POST' class="form-horizontal" action='modul/proses_dpt.php?act=import' enctype='multipart/form-data'>
                    <div class="box-body">
                        <div class="form-group">
                        <label class="col-sm-2 label-sm">File Excel</label>
                            <div class="col-sm-4">
                                <input name="filepegawai" type="file" class="btn btn-default" required >
                                <p>Format : *.xlsx</p>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn bg-navy "><i class="fa fa-check"></i> Submit</button>
                        <a  class="btn btn-danger" href="?p=data_pemilih" ><i class="fa fa-remove"></i> Batal</a>
                    </div>
                </form>
            </div>
		</div>
	</section>