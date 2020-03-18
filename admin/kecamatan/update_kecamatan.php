<?php
//koneksi database
include "../../koneksi.php";

//menanglap data yang di kirim
$id_kecamatan=$_POST['id_kecamatan'];
$nama_kecamatan=$_POST['nama_kecamatan'];

//update ke database
mysqli_query($konek,"update kecamatan set nama_kecamatan='$nama_kecamatan' where id_kecamatan=$id_kecamatan");

//mengalihkan
header("location:index.php");
?>