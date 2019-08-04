<?php
    $dpt            = mysqli_query($koneksi, "SELECT nik FROM dpt");
    $jumlahdpt      = mysqli_num_rows($dpt);
    
    $pendukung      = mysqli_query($koneksi, "SELECT nik FROM dpt WHERE status='1'");
    $jmlpendukung   = mysqli_num_rows($pendukung);
    
    $perempuan      = mysqli_query($koneksi, "SELECT nik FROM dpt WHERE jenis_kelamin='P'");
    $jmlperempuan   = mysqli_num_rows($perempuan);
    
    $laki      = mysqli_query($koneksi, "SELECT nik FROM dpt WHERE jenis_kelamin='L'");
    $jmllaki   = mysqli_num_rows($laki);
    
    $capaian         = (($jmlpendukung)/($jumlahdpt))*100;
    $pilihperempuan  = (($jmlperempuan)/($jumlahdpt))*100;
    $pilihlaki       = (($jmllaki)/($jumlahdpt))*100;
?>
<section class="content-header">
    <h1>
        <small>Selamat datang, <?php echo $hasil['nama_petugas']; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
    </ol>
</section>
<section class="content">
	<div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo $jumlahdpt; ?></h3>
                    <p>Data Pemilih</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo round($capaian,2).'%'; ?></h3>
                    <p>Presentase Capaian Suara</p>
                </div>
                <div class="icon">
                    <i class="fa fa-pie-chart"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo round($pilihlaki,2).'%'?></h3>
                    <p>Pemilih Pria</p>
                </div>
                <div class="icon">
                    <i class="fa fa-male"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo round($pilihperempuan,2).'%'?></h3>
                    <p>Pemilih Perempuan</p>
                </div>
                <div class="icon">
                    <i class="fa fa-female"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="box ">
                <div class="box-header with-border  box-header">
                  <h3 class="box-title"> Top Relawan</h3>
                </div>
                <div class="box-body">
                <table id="myTable1" class="responsive display nowrap table table-bordered table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jumlah Dukungan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
					    $i=1;
					    $tp=mysqli_query($koneksi, "SELECT * FROM relawan ORDER BY id");
					    while($r=mysqli_fetch_array($tp)){  
					        $id_dpt     = $r['id_dpt'];
					        $username   = $r['username'];
					?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                        <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM dpt WHERE id = '$id_dpt'");
	                        $hasil = mysqli_fetch_array($query);
	                        echo $hasil['nama'];
                        ?>
                        </td>
                        <td>
                        <?php
                            $relawan   = mysqli_query($koneksi, "SELECT nik FROM dpt WHERE rekom='$username' AND status='1'");
                            $jml100 = mysqli_num_rows($relawan);
                            echo $jml100;
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
        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="box ">
                <div class="box-header with-border  box-header">
                  <h3 class="box-title "> Top Koordinator</h3>
                </div>
                <div class="box-body">
                <table id="myTable2" class="responsive display nowrap table table-bordered table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jumlah Dukungan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
					    $i=1;
					    $tp=mysqli_query($koneksi, "SELECT * FROM koordinator ORDER BY id");
					    while($r=mysqli_fetch_array($tp)){  
					        $id_dpt     = $r['id_dpt'];
					        $username   = $r['username'];
					?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                        <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM dpt WHERE id = '$id_dpt'");
	                        $hasil = mysqli_fetch_array($query);
	                        echo $hasil['nama'];
                        ?>
                        </td>
                        <td>
                        <?php
                            $relawan   = mysqli_query($koneksi, "SELECT nik FROM dpt WHERE rekom='$username' AND status='1'");
                            $jml100 = mysqli_num_rows($relawan);
                            echo $jml100;
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
        </div>
    </div>
</section>