<?php
//koneksi database
include "../../koneksi.php";
//mengangkap data
$id=$_GET['id_kecamatan'];
$nama_kecamatan=$_POST['nama_kecamatan'];
$nama_desa=$_POST['nama_desa'];

//input database
mysqli_query($konek, "insert into desa values('','$id','$nama_desa')");
//mengalihkan kembali
header("location:detail_kecamatan.php?id_kecamatan=$id");
?>