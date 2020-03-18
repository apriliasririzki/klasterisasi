<?php 
  include '../sistemnya.php'
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"><title>SIPEHATAMAN</title>
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
        $c="Edit Kecamatan $nama_kecamatan"; 
        $kc="kecamatan/edit_kecamatan.php?id_kecamatan=$id"; 
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
        <section class="content-header">
          <h5>
            <?php include '../breadcumbnya.php' ?>
          </h5>
        
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><b>Edit Kecamatan</b></h3>
              </div>
            <!-- /.box-header -->
            <!-- form start -->
              <?php
                include "../../koneksi.php";
                $id=$_GET['id_kecamatan'];
                $data=mysqli_query($konek, "select * from Kecamatan where id_kecamatan='$id'");
                while($d=mysqli_fetch_array($data)){
                ?>
                <form action="update_kecamatan.php" method="post" role="form">
                    <div class="box-body">
                    <div class="form-group">
                      <div class="form-group has-feedback">
                      <label>Id Kecamatan</label>
                      <input type="text" name="id_kecamatan" readonly="" value="<?php echo $d['id_kecamatan']; ?>">
                      </div>
                      <label for="exampleInputEmail1">Nama Kecamatan</label>
                      <input type="text" name="nama_kecamatan" placeholder="Nama Kecamatan" value="<?php echo $d['nama_kecamatan']; ?>">
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <center><button type="submit" class="btn btn-primary">Submit</button></center>
                  </div>
                </form>
                 <center><a class="btn btn-primary" data-original-title="" href="index.php"><i class="fa fa-chevron-left"></i>Kembali</a></center>
            </div>
            <?php
            }
            ?>
          <!-- Main content -->
          <!-- /.content -->
          </section>
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