    <?php
	    $aksi		= "modul/proses_rt.php";
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
				<h3 class="box-title">Data RT/RW</h3>
				<div class="block-options pull-right">
				    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Tambah RT/RW</button>
                </div>
			</div>
			<div class="box-body table-responsive pad">
            <table id="myTable1" class="responsive display nowrap table table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama RT/RW</th>
                    <th>Aktif</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
					$i=1;
					$tp=mysqli_query($koneksi, "SELECT * FROM rtrw ORDER BY id ");
					while($r=mysqli_fetch_array($tp)){
					    $rtrw   = $r['rtrw'];
					    $status = $r['status'];
				?>
                <tr>
                    <th><?php echo $i; ?></th>
                    <th><?php echo $rtrw; ?></th>
                    <th><?php echo $status; ?></th>
                    <th>
                        <?php
							echo "
								<a class='btn btn-primary btn-sm' href='?p=rtrw_edit&id=$r[id]'><i class='fa fa-edit'></i>&nbsp;&nbsp;&nbsp;Edit</a>
								<a class='btn btn-danger btn-sm' href='$aksi?act=hapus&id=$r[id]'><i class='fa fa-trash'></i>&nbsp;&nbsp;&nbsp;Hapus</td>
							";
						?>
                    </th>
                </tr>
                <?php 
                    $i=$i+1;
                    } 
                ?>
                </tbody>
            </table>
        </div>
		</div>
    </section>
    <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah RT/RW</h4>
            </div>
            <div class="modal-body">
            <form method='POST' class="form-horizontal" action='modul/proses_rt.php?act=input' enctype='multipart/form-data'>
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-3 control-label">Nama RW</label>
						<div class="col-sm-9">
							<select class="form-control" name="rw">
							    <option value=''>- Pilih -</option>
							    <option value='RW 001'>RW 001</option>
							    <option value='RW 002'>RW 002</option>
							    <option value='RW 003'>RW 003</option>
							    <option value='RW 004'>RW 004</option>
							    <option value='RW 005'>RW 005</option>
							    <option value='RW 006'>RW 006</option>
							    <option value='RW 007'>RW 007</option>
							    <option value='RW 008'>RW 008</option>
							    <option value='RW 009'>RW 009</option>
							    <option value='RW 010'>RW 010</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nama RT</label>
						<div class="col-sm-9">
							<select class="form-control" name="rt">
							    <option value=''>- Pilih -</option>
							    <option value='RT 001'>RT 001</option>
							    <option value='RT 002'>RT 002</option>
							    <option value='RT 003'>RT 003</option>
							    <option value='RT 004'>RT 004</option>
							    <option value='RT 005'>RT 005</option>
							    <option value='RT 006'>RT 006</option>
							    <option value='RT 007'>RT 007</option>
							    <option value='RT 008'>RT 008</option>
							    <option value='RT 009'>RT 009</option>
							    <option value='RT 010'>RT 010</option>
							</select>
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-3 control-label">Aktif</label>
						<div class="col-sm-9">
							<select class="form-control" name="status">
							    <option value=''>- Pilih -</option>
							    <option value='Y'>Y</option>
							    <option value='N'>N</option>
							</select>
						</div>
					</div>
				</div>			
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>			
            </div>            
        </div>
	</div>
</div>