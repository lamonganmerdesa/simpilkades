    <section class="content-header">
        <h1>
            <small>Selamat datang, <?php echo $nama_petugas; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=home"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Pengaturan</li>
        </ol>
    </section>
    <section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Pengaturan</h3>
				<div class="block-options pull-right">
                    <a class="btn btn-danger btn-sm" href='?p=home'><i class="fa fa-undo"></i> Kembali</a>
                </div>
			</div>
			<div class="box-body">
                <form class="form-horizontal" action="#" id="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 label-sm">Nama Tim</label>
                            <div class="col-sm-4">
                                <input type="hidden"  class="form-control "  id="id_pengaturan"   name="id_pengaturan" value="1"  >
                                <input type="text"  class="form-control "  id="nama_tim"   name="nama_tim">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 label-sm">Alamat</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" type="text" name="alamat" id="alamat" ></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 label-sm">Telphone</label>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control "  id="telpon"   name="telpon">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 label-sm">Email</label>
                        <div class="col-sm-4">
                           <input type="text"  class="form-control "  id="email"   name="email" >
                          <span class="help-block"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 label-sm">Username</label>
                        <div class="col-sm-4">
                           <input type="text"  class="form-control "  disabled value="admin"  >
                          <span class="help-block"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 label-sm">Password</label>
                        <div class="col-sm-4">
                           <input type="text"  class="form-control "  id="password" name="password"   >
                           <p>*) Kosongkan apabila tidak mengganti password.</p>
                          <span class="help-block"></span>
                        </div>
                      </div>

                    </div>
                    <div id="notifikasi" style="display:none">
                            <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Data Berhasil diupdate !
                           
                          </div>
                        </div>
                    <div id="notifikasi2" style="display:none">
                            <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Data Gagal diupdate !
                           
                          </div>
                        </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="button" disabled id="btnSave" onclick="save()" class="btn bg-navy "><i class="fa fa-check"></i> Submit</button>
                      <a  class="btn btn-danger "  href="?p=home" ><i class="fa fa-remove"></i> Batal</a>
                      
                    </div>
                  </form>
            </div>
		</div>
	</section>