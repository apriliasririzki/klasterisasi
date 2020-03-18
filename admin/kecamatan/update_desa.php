<?php
//koneksi database
include "../../koneksi.php";

//menanglap data yang di kirim
$id=$_GET['id_kecamatan'];
$id_desa=$_POST['id_desa'];
$nama_desa=$_POST['nama_desa'];

//update ke database
mysqli_query($konek,"update desa set nama_desa='$nama_desa' where id_desa=$id_desa");

//mengalihkan
header("location:detail_kecamatan.php?id_kecamatan=$id");
?>