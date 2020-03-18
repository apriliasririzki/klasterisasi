<?php
//koneksi database
include "../../koneksi.php";
//mengangkap data
$id=$_GET['id_desa'];
$nama_desa=$_POST['nama_desa'];
$padi=$_POST['padi'];
$jagung=$_POST['jagung'];
$kacang_tanah=$_POST['kacang_tanah'];
$kedelai=$_POST['kedelai'];

//input database
mysqli_query($konek, "insert into hasil_pertanian values('','$id','$padi','$jagung','$kacang_tanah','$kedelai')");
//mengalihkan kembali
header("location:detail_desa.php?id_desa=$id");
?>