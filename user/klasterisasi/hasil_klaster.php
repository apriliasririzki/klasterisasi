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
        $c="Hasil Klaster"; 
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
function convert_nomor($foo){

    return number_format((float)$foo, 2, '.', '');
}
// Table Hasil Pertanian
$hasil_pertanian = get_data($konek,"select * from hasil_pertanian, desa where hasil_pertanian.id_desa=desa.id_desa");

$id_hasil_1 = @$_GET['hasil_1'];
$id_hasil_2 = @$_GET['hasil_2'];

if(isset($id_hasil_1) AND isset($id_hasil_2)){

    // ====================== CORE DATA =======================
   
    // Klaster
    $klaster         = get_data($konek,"SELECT * FROM klaster");
    // ===================== Iterate Table ====================
    $data_iterasi    = array();



    // Centroid 
    $centroid        = $klaster;
    $arr_data        = array();
    // data 
    $desa_id         = array();
    $desa_id[0]      = $id_hasil_1;
    $desa_id[1]      = $id_hasil_2;
        // tmp index
        $i =    0;
        // mencari centroid
        foreach ($centroid as $k) {
            // 
            $id_desa = $desa_id[$i];
            // Get Random Records 
            $random_data  = get_data($konek,"SELECT * FROM hasil_pertanian WHERE id_desa='$id_desa'");
            $buil_arr     = array_merge($k,$random_data[0]);
            $arr_data[$i] = $buil_arr;
            $i++;
        }
        
        // Uji Centroid Acak
        // NIlai Unggul dan Perlu penanganan
        $data_centroid_acak = array();
        $x = 0;
        // Nilai Centroid Baru
        $nilai_centroid = $klaster;
        // Cari Centroid Data 
        $padi_cbu           = 0;
        $jagung_cbu         = 0;
        $kacang_tanah_cbu   = 0;
        $kedelai_cbu        = 0;

        // Cari Centroid Data 
        $padi_cbp           = 0;
        $jagung_cbp         = 0;
        $kacang_tanah_cbp   = 0;
        $kedelai_cbp        = 0;

        $jumlah_k1         = 0;
        $jumlah_k2         = 0;

        foreach ($hasil_pertanian as $k) {
            $tmp_centroid   = $arr_data;
            $i              = 0;
            $padi           = convert_nomor($k['padi']);
            $jagung         = convert_nomor($k['jagung']);
            $kacang_tanah   = convert_nomor($k['kacang_tanah']);
            $kedelai        = convert_nomor($k['kedelai']);
            $tmp_data       = $k;
            foreach ($tmp_centroid as $y) {
            $padi_c       = $y['padi'];
            $jagung_c     = $y['jagung'];
            $kc_c         = $y['kacang_tanah'];
            $kedelai_c    = $y['kedelai'];
            $tmp_data[$y['nama_klaster']] = convert_nomor(abs(($padi-$padi_c)+($jagung-$jagung_c)+($kacang_tanah-$kc_c)+($kedelai-$kedelai_c)));
            $i++;
            }

            if ($tmp_data['Unggul'] < $tmp_data['Perlupenanganan'] ) {
                $tmp_data['kluster'] = "K1";
                $jumlah_k1 ++;
                $padi_cbu           += convert_nomor($k['padi']);
                $jagung_cbu         += convert_nomor($k['jagung']);
                $kacang_tanah_cbu   += convert_nomor($k['kacang_tanah']);
                $kedelai_cbu        += convert_nomor($k['kedelai']);

            }else if ($tmp_data['Perlupenanganan'] <= $tmp_data['Unggul']) {
                $tmp_data['kluster'] = "K2";
                $jumlah_k2 ++;
                $padi_cbp           += convert_nomor($k['padi']);
                $jagung_cbp         += convert_nomor($k['jagung']);
                $kacang_tanah_cbp   += convert_nomor($k['kacang_tanah']);
                $kedelai_cbp        += convert_nomor($k['kedelai']);
            }

            $data_centroid_acak[$x] = $tmp_data;
            $x++;
        }

        // Centroid baru push
        $xx = 0;
        foreach ($nilai_centroid as $m) {
        

            if ($m['jumlah_klaster'] == 1) {

                $nilai_centroid[$xx]['padi']         = convert_nomor(($jumlah_k1 != 0 ? $padi_cbu/$jumlah_k1 : 0)) ;
                $nilai_centroid[$xx]['jagung']       = convert_nomor(($jumlah_k1 != 0 ? $jagung_cbu/$jumlah_k1 : 0));
                $nilai_centroid[$xx]['kacang_tanah'] = convert_nomor(($jumlah_k1 != 0 ? $jagung_cbu/$jumlah_k1 : 0));
                $nilai_centroid[$xx]['kedelai']      = convert_nomor(($jumlah_k1 != 0 ? $jagung_cbu/$jumlah_k1 : 0)); 

            }else if ($m['jumlah_klaster'] == 2) {

                $nilai_centroid[$xx]['padi']         = convert_nomor(($jumlah_k2 != 0 ? $padi_cbp/$jumlah_k2:0));
                $nilai_centroid[$xx]['jagung']       = convert_nomor(($jumlah_k2 != 0 ? $jagung_cbp/$jumlah_k2:0));
                $nilai_centroid[$xx]['kacang_tanah'] = convert_nomor(($jumlah_k2 != 0 ? $jagung_cbp/$jumlah_k2:0));
                $nilai_centroid[$xx]['kedelai']      = convert_nomor(($jumlah_k2 != 0 ? $jagung_cbp/$jumlah_k2:0)); 
            
            }

            $xx++;
        }

        $data_iterasi[count($data_iterasi)] = array(
            'iterasi' => 1,
            'centroid_baru' => $nilai_centroid,
            'uji_centroid_acak' => $data_centroid_acak
        );
    // Starting Iterasi
        $jumlah_kestabilan=1;
        
        $centroid_baru           = $nilai_centroid;
        $data_centroid_acak_baru = $data_centroid_acak; 

        $iterate = 2;
        while ($jumlah_kestabilan != 0) {

            // Uji Centroid Acak
                // NIlai Unggul dan Perlu penanganan
                $data_centroid_acak = array();
                $x = 0;
                // Nilai Centroid Baru
                $nilai_centroid = $klaster;
                // Cari Centroid Data 
                $padi_cbu           = 0;
                $jagung_cbu         = 0;
                $kacang_tanah_cbu   = 0;
                $kedelai_cbu        = 0;

                // Cari Centroid Data 
                $padi_cbp           = 0;
                $jagung_cbp         = 0;
                $kacang_tanah_cbp   = 0;
                $kedelai_cbp        = 0;

                $jumlah_k1         = 0;
                $jumlah_k2         = 0;
                $tmp_i             = 0;

                $jumlah_stabil_sementara = 0;

                foreach ($hasil_pertanian as $k) {
                    $tmp_centroid   = $centroid_baru;
                    $i              = 0;
                    $padi           = convert_nomor($k['padi']);
                    $jagung         = convert_nomor($k['jagung']);
                    $kacang_tanah   = convert_nomor($k['kacang_tanah']);
                    $kedelai        = convert_nomor($k['kedelai']);
                    $tmp_data       = $k;

                    foreach ($tmp_centroid as $y) {
                        $padi_c       = convert_nomor($y['padi']);
                        $jagung_c     = convert_nomor($y['jagung']);
                        $kc_c         = convert_nomor($y['kacang_tanah']);
                        $kedelai_c    = convert_nomor($y['kedelai']);
                        $tmp_data[$y['nama_klaster']] = convert_nomor(abs(($padi-$padi_c)+($jagung-$jagung_c)+($kacang_tanah-$kc_c)+($kedelai-$kedelai_c)));
                        $i++;
                    }

                    if ($tmp_data['Unggul'] < $tmp_data['Perlupenanganan'] ) {

                        $tmp_data['kluster'] = "K1";
                        $jumlah_k1 ++;
                        $padi_cbu           += convert_nomor($k['padi']);
                        $jagung_cbu         += convert_nomor($k['jagung']);
                        $kacang_tanah_cbu   += convert_nomor($k['kacang_tanah']);
                        $kedelai_cbu        += convert_nomor($k['kedelai']);

                        
                    }else if ($tmp_data['Perlupenanganan'] <= $tmp_data['Unggul']) {

                        $tmp_data['kluster'] = "K2";
                        $jumlah_k2 ++;
                        $padi_cbp           += convert_nomor($k['padi']);
                        $jagung_cbp         += convert_nomor($k['jagung']);
                        $kacang_tanah_cbp   += convert_nomor($k['kacang_tanah']);
                        $kedelai_cbp        += convert_nomor($k['kedelai']);
                        
                    }

                    // Kestabilan
                    if ($tmp_data['kluster'] == $data_centroid_acak_baru[$tmp_i]['kluster']) {
                        $tmp_data['kestabilan'] = 0;
                    }else{
                        $tmp_data['kestabilan'] = 1;
                        $jumlah_stabil_sementara++;
                    }

                    $data_centroid_acak[$x] = $tmp_data;
                    $x++;
                    $tmp_i++;
                    $jumlah_kestabilan = $jumlah_stabil_sementara;
                }

            
                // Centroid baru push
                $xx = 0;
                foreach ($centroid_baru as $m) {
                    if ($m['jumlah_klaster'] == 1) {

                        $centroid_baru[$xx]['padi']         = convert_nomor(($jumlah_k1 != 0 ? $padi_cbu/$jumlah_k1 : 0)) ;
                        $centroid_baru[$xx]['jagung']       = convert_nomor(($jumlah_k1 != 0 ? $jagung_cbu/$jumlah_k1 : 0));
                        $centroid_baru[$xx]['kacang_tanah'] = convert_nomor(($jumlah_k1 != 0 ? $jagung_cbu/$jumlah_k1 : 0));
                        $centroid_baru[$xx]['kedelai']      = convert_nomor(($jumlah_k1 != 0 ? $jagung_cbu/$jumlah_k1 : 0)); 

                    }else if ($m['jumlah_klaster'] == 2) {
                        $centroid_baru[$xx]['padi']         = convert_nomor(($jumlah_k2 != 0 ? $padi_cbp/$jumlah_k2:0));
                        $centroid_baru[$xx]['jagung']       = convert_nomor(($jumlah_k2 != 0 ? $jagung_cbp/$jumlah_k2:0));
                        $centroid_baru[$xx]['kacang_tanah'] = convert_nomor(($jumlah_k2 != 0 ? $jagung_cbp/$jumlah_k2:0));
                        $centroid_baru[$xx]['kedelai']      = convert_nomor(($jumlah_k2 != 0 ? $jagung_cbp/$jumlah_k2:0)); 
                    }
                    $xx++;
                }

                $data_centroid_acak_baru = $data_centroid_acak;

                $data_iterasi[count($data_iterasi)] = array(
                    'iterasi' => $iterate,
                    'centroid_baru' => $centroid_baru,
                    'uji_centroid_acak' => $data_centroid_acak_baru
                );
                $iterate ++;
        }
    ?>
    <div class="content-wrapper">
      <section class="content">
        <h5>
         <?php include '../breadcumbnya.php' ?>
        </h5>
        <div class="container-fluid">

    <?php
    
    $cnt_data_iterasi = count($data_iterasi);
    $i_puncak = -1;
    foreach ($data_iterasi as $k) { ?>
      
      <div class="box">
            <div class="box-header with-border">
            <h3>Iterasi <?= $k['iterasi'] ?></h3>
            <h4 class="text-center">Centroid Baru</h4>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Centroid Cluster</th>
                    <th>P</th>
                    <th>J</th>
                    <th>KT</th>
                    <th>K</th>
                </tr>
                <?php 
                foreach ($k['centroid_baru'] as $y) { ?>
                <tr>
                    <td><?= $y['jumlah_klaster'] ?></td>
                    <td><?= $y['padi'] ?></td>
                    <td><?= $y['jagung'] ?></td>
                    <td><?= $y['kacang_tanah'] ?></td>
                    <td><?= $y['kedelai'] ?></td>
                </tr>
               <?php }  ?>
            </table>
        </div>
        <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Uji Centroid Acak</h3>
                  </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th><center>Id</center></th>
                          <th><center>Desa</center></th>
                          <th><center>P</center></th>
                          <th><center>J</center></th>
                          <th><center>K</center></th>
                          <th><center>KT</center></th>
                          <th><center>K1
                            <br>(Unggul)
                            <br></center></th>
                          <th><center>K2
                            <br>(Perlupenanganan)</center></th>
                          <th><center>Klaster</center></th>
                          <th><center>klaster
                            <br>sebelumnya</center></th>
                          <th><center>Kestabilan</center></th>
                        </tr>
                        </thead>
                        <tbody> 
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><center>(abs((P-$P$1)+(J-$J$1)+($KT-$KT$1)+($K-$K$1)))</center></td>
                            <td><center>(abs((P-$P$2)+(J-$J$2)+($KT-$KT$2)+($K-$K$2)))</center></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php $i_acak = 0; $k1 = 0; $k2 = 0; foreach ($k['uji_centroid_acak'] as $y) { ?>
                        <tr>
                          <td><?= $y['id_desa'] ?></td>
                          <td><?= $y['nama_desa'] ?></td>
                        <td><?= $y['padi'] ?></td>
                        <td><?= $y['jagung'] ?></td>
                        <td><?= $y['kacang_tanah'] ?></td>
                        <td><?= $y['kedelai'] ?></td>
                        <td><?= $y['Unggul'] ?></td>
                        <td><?= $y['Perlupenanganan'] ?></td>
                        <td><?= $y['kluster'] ?></td>
                        <td><?= ($i_puncak == -1 ? "" : $data_iterasi[$i_puncak]['uji_centroid_acak'][$i_acak]['kluster']); ?></td>
                        <td><?= (isset($y['kestabilan']) ? $y['kestabilan'] : "") ?></td>
                        </tr>
                        <?php 
                if ($y['kluster'] == "K1") {
                    $k1++;
                }else if ($y['kluster'] == "K2") {
                    $k2++;
                }
                $i_acak++;
            }  ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th><center>Id</center></th>
                          <th><center>Desa</center></th>
                          <th><center>P</center></th>
                          <th><center>J</center></th>
                          <th><center>K</center></th>
                          <th><center>KT</center></th>
                          <th><center>K1
                            <br>(Unggul)</center></th>
                          <th><center>K2
                            <br>(Perlupenanganan)</center></th>
                          <th><center>Klaster</center></th>
                          <th><center>klaster
                            <br>sebelumnya</center></th>
                          <th><center>Kestabilan</center></th>
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
     <?php if($cnt_data_iterasi == $k['iterasi']): ?>
        <div class="box">
        <div class="box-header">
        <h3>Kesimpulan</h3>
        </div>
        <div class="box-body">
        <table class="table table-striped table-bordered">
            <tr>
                <th>Unggul</th>
                <th>Perlupenanganan</th>
            </tr>
            <tr>
                <td><?= $k1 ?></td>
                <td><?= $k2 ?></td>
            </tr>
        </table>
    </div>
</div>
     <?php endif; ?>
   <?php  
    $i_puncak++;
    }
} ?>
  </div>
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
