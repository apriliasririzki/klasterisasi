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
        $a=$namasistemnya; //nampak
        $ka="sipehataman";  //link
        $b="Kecamatan"; 
        $kb="kecamatan/index.php"; 
        $c=""; 
        $kc=""; 
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
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Data Kecamatan</h3>
                  </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th><center>No.</center></th>
                          <th><center>Nama Kecamatan</center></th>
                          <th><center><a class="btn btn-sm btn-primary tooltips" data-original-title=""href="tambah.php"><i class="fa fa-plus"></i> Tambah</a></center></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include '../../koneksi.php'; 
                        $no=1;
                        $data = mysqli_query($konek,"select * from kecamatan");
                        while($d=mysqli_fetch_array($data)){
                        ?>
                        <tr>
                          <td><center><?php echo $no++; ?></center></td>
                          <td><?php echo $d['nama_kecamatan']; ?></td>
                          <td><center>
                          <a class="btn btn-sm btn-info tooltips" href="detail_kecamatan.php?id_kecamatan=<?php echo $d['id_kecamatan']; ?>"><i class="fa fa-search"></i>DETAIL</a>
                          <a class="btn btn-sm btn-warning tooltips" href="edit_kecamatan.php?id_kecamatan=<?php echo $d['id_kecamatan']; ?>"><i class="fa fa-edit"></i>EDIT</a>
                          <a class="btn btn-sm btn-danger tooltips" href="hapus_kecamatan.php?id_kecamatan=<?php echo $d['id_kecamatan']; ?>"><i class="fa fa-trash"></i>HAPUS</a></center>
                          </td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th><center>No.</center></th>
                          <th><center>Nama Kecamatan</center></th>
                          <th><center>opsi</center></th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col -->
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
