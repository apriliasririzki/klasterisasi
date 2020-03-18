<?php
//koneksi database
include "../../koneksi.php";

//menanglap data yang di kirim
$id=$_GET['id_desa'];
$id_hasil_pertanian=$_POST['id_hasil_pertanian'];
$padi=$_POST['padi'];
$jagung=$_POST['jagung'];
$kacang_tanah=$_POST['kacang_tanah'];
$kedelai=$_POST['kedelai'];

//update ke database
mysqli_query($konek,"update hasil_pertanian set padi='$padi', jagung='$jagung', kacang_tanah='$kacang_tanah', kedelai='$kedelai' where id_hasil_pertanian=$id_hasil_pertanian");

//mengalihkan
header("location:detail_desa.php?id_desa=$id");
?>