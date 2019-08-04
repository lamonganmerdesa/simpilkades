    <section class="content-header">
        <h1>
            <small>Selamat datang, <?php echo $nama_petugas; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=home"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="?p=relawan"> Data Relawan</a></li>
            <li class="active"> Tambah Data Relawan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" >
                        <h3 class="box-title " style="margin-top: 5px;"> TAMBAH RELAWAN</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <form method='POST' class="form-horizontal" action='modul/proses_relawan.php?act=input' enctype='multipart/form-data'>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 ">Nama Relawan</label>
                            <div class="col-sm-4">
                                <select  class="form-control" name="id_dpt">
							    <?php
								    $tp2=mysqli_query($koneksi, "SELECT * FROM dpt ORDER BY id");
								    while($r2=mysqli_fetch_array($tp2)){
							    ?>
								        <option value='<?php echo $r2['id'];?>'><?php echo $r2['nama'];?></option>
							    <?php 
							        } 
							    ?>
							    </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 label-sm">Username</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control " placeholder="Username" name="username" id="username" required >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 label-sm">Password</label>
                            <div class="col-sm-3">
                                <input type="password" class="form-control " placeholder="Password" name="password" id="password" required >
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="submit"  class="btn bg-navy "><i class="fa fa-check"></i> Submit</button>
                        <a  class="btn btn-danger"  href="?p=relawan" ><i class="fa fa-remove"></i> Batal</a>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>