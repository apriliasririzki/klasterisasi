<?php
//koneksi database
include "../../koneksi.php";

//menanglap data yang di kirim
$id_desa=$_POST['id_desa'];
$nama_kecamatan=$_POST['nama_kecamatan'];
$nama_desa=$_POST['nama_desa'];

//update ke database
mysqli_query($konek,"update desa set nama_desa='$nama_desa', id_kecamatan='$nama_kecamatan' where id_desa=$id_desa");

//mengalihkan
header("location:index.php");
?>