<?php 
  include '../sistemnya.php'
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../assets/dist/css/skins/_all-skins.min.css">
 <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <title>
      <?php 
        // DEKLARASI INISIALISASI UNTUK TITLE DAN BREADCUMB
		include "../../koneksi.php";

        $a=$namasistemnya; //nampak
        $ka="sipehataman";  //link
        $b="Kecamatan"; 
        $kb="kecamatan/index.php";
        $id=$_GET['id_kecamatan'];
		$data=mysqli_query($konek, "select * from kecamatan where id_kecamatan='$id'");
		$res_kec=mysqli_fetch_array($data);
		$nama_kecamatan=$res_kec['nama_kecamatan'];
		$c="Detail Kecamatan $nama_kecamatan"; 
		$kc="kecamatan/detail_kecamatan.php?id_kecamatan=$id"; 
        $d=""; 
        $kd=""; 
        $e=""; 
        $ke=""; 
        $pemisah= " || ";
      include '../titlenya.php';
      echo $title;
    ?>
  </title>
  </head>
  <body>
    <?php include "../headernya.php"; ?>
    <?php include "../sisikiri.php"; ?>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <?php include '../breadcumbnya.php' ?>
              <div class="col-xs-12">
            	<div class="col-md-12">
            	   <div class="panel panel-default">
		              <div class="panel-body no-padding">
		                <div class="box">
		                  <div class="panel-default">

		                  	<div class="col-md-5">
		                  		<div class="box-body">
				                  <?php
					                $id=$_GET['id_kecamatan'];
					                $data=mysqli_query($konek, "select * from kecamatan where id_kecamatan='$id'");
					                while($d=mysqli_fetch_array($data)){
					                ?>
						              <div class="panel-body no-padding">
						              	<h4>Data Kecamatan</h4>
						                  <table class="table table-bordered table-striped">
						                  	<tr>
						                  		<td style="text-align: right">ID KECAMATAN</td>
						                  		<td><?php echo $d['id_kecamatan']; ?></td>
						                  	</tr>
						                  	<tr>
						                  		<td style="text-align: right">NAMA KECAMATAN</td>
						                  		<td><?php echo $d['nama_kecamatan']; ?></td>
						                  	</tr>
						                  </table>
						              </div>
						        </div>
						        <?php
								}
								?>
							</div>

				                    <!-- /.box-header -->
				            <div class="form-horizontal row-border">
				              <div class="col-md-7">
								<h4>DATA DESA</h4>
									<table id="example1" class="table table-bordered table-striped">
				                      <thead>
				                        <tr>
				                          <th><center>No.</center></th>
				                          <th><center>Nama Desa</center></th>
				                          <!-- <th><center><a class="btn btn-sm btn-primary tooltips" data-original-title=""href="tambah_desa.php?id_kecamatan=<?php echo $_GET['id_kecamatan'];?>"><i class="fa fa-plus"></i> Tambah</a></center></th> -->
				                        </tr>
				                      </thead>
				                      <tbody>
				                        <?php
				                        include '../../koneksi.php'; 
				                        $no=1;
				                        $data = mysqli_query($konek,"select * from desa where id_kecamatan='$id'");
				                        while($id=mysqli_fetch_array($data)){
				                        ?>
				                        <tr>
				                          <td><center><?php echo $no++; ?></center></td>
				                          <td><?php echo $id['nama_desa']; ?></td>
				                          <!-- <td>
				                          <center><a class="btn btn-sm btn-warning tooltips" href="edit_desa.php?id_kecamatan=<?php echo $_GET['id_kecamatan'];?>&id_desa=<?php echo $id['id_desa']; ?>"><i class="fa fa-edit"></i>EDIT</a>
				                          <a class="btn btn-sm btn-danger tooltips" href="hapus_desa.php?id_kecamatan=<?php echo $_GET['id_kecamatan'];?>&id_desa=<?php echo $id['id_desa']; ?>"><i class="fa fa-trash"></i>HAPUS</a></center>
				                          </td> -->
				                        </tr>
				                        <?php
				                        }
				                        ?>
				                      </tbody>
				                      <tfoot>
				                      <tr>
					                      <th><center>No.</center></th>
					                      <th><center>Nama Desa</center></th>
					                      <!-- <th><center>opsi</center></th> -->
				                      </tr>
				                      </tfoot>
				                    </table>
				                    <a class="btn btn-primary" data-original-title="" href="index.php"><i class="fa fa-chevron-left"></i>Kembali</a>
				              </div>
							</div>
				          </div>
				        </div>
				    </div>
			      </div>
			    </div>
		      </div>
		            <!-- /.row -->
		  </section>
          <!-- /.content -->
          
        </div>
        <?php include '../footernya.php'; ?>
        <!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
      </body>
      </html>
