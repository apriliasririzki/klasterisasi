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
        $b="Klasterisasi"; 
        $kb="klasterisasi/index.php"; 
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
        <?php 
        include "../../koneksi.php";
         function get_data($hubung,$query){
                // Query

            $data = mysqli_query($hubung,$query);
            // Iki Penumpung
            $arr = array();
            // Kanggo Masukno
            while($k=mysqli_fetch_assoc($data)){
                $arr[count($arr)] = $k;
            }

            return $arr;
        }
         // Table Hasil Pertanian
         $hasil_pertanian = get_data($konek,"select * from hasil_pertanian, desa where hasil_pertanian.id_desa=desa.id_desa");
        ?>
          <section class="content-header">
            <h5>
              <?php include '../breadcumbnya.php' ?>
            </h5>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>Menentukan Centroid Acak</b></h3>
                </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form action="hasil_klaster.php" method="get">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="">Unggul (id_desa)</label>
                        <input type="text" id="data_1" name="hasil_1" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="">Perlu Penanganan (id_desa)</label>
                        <input type="text" id="data_2" name="hasil_2" class="form-control">
                      </div>
                    </div>
                    <div class="box-footer">
                      <center><button type="submit" class="btn btn-primary">Submit</button></center>
                    </div>
                  </form>
                </div>
          <!-- Main content -->
          <!-- /.content -->
          </section>
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Data Hasil Pertanian Desa</h3>
                  </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th><center>Id Desa</center></th>
                          <th><center>Nama Desa</center></th>
                          <th><center>Padi</center></th>
                          <th><center>Jagung</center></th>
                          <th><center>Kacang Tanah</center></th>
                          <th><center>Kedelai</center></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $i = 0;

                        foreach ($hasil_pertanian as $y) { ?>
                        <tr>
                          <td><a href="#" onClick="pilih_centroid(<?= $y['id_desa'] ?>)"><?= $y['id_desa'] ?></a></td>
                          <td><?= $y['nama_desa'] ?></td>
                          <td><?= $y['padi'] ?></td>
                          <td><?= $y['jagung'] ?></td>
                          <td><?= $y['kacang_tanah'] ?></td>
                          <td><?= $y['kedelai'] ?></td>
                        </tr>
                        <?php }
                ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th><center>Id Desa</center></th>
                          <th><center>Nama Desa</center></th>
                          <th><center>Padi</center></th>
                          <th><center>Jagung</center></th>
                          <th><center>Kacang Tanah</center></th>
                          <th><center>Kedelai</center></th>
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

      </div>
      <div class="modal fade" id="pilih" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
            <div class="col-md-6 text-center">
                    <button class="btn btn-success" onclick="push_data_1()">Unggul</button>
            </div>
            <div class="col-md-6 text-center">
                <button class="btn btn-warning" onclick="push_data_2()">Perlupenanganan</button>
                    
            </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<script>
var tmp_data = "";
  function pilih_centroid(id_desa){
    tmp_data = id_desa;
    $('#pilih').modal('show');
  }

  function push_data_1(id){
      $('#data_1').val(tmp_data)
    $('#pilih').modal('hide');

  }
  function push_data_2(id){
      $('#data_2').val(tmp_data);
    $('#pilih').modal('hide');

  }
</script>
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
