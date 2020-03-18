<?php
//koneksi database
include "../../koneksi.php";
//mengangkap data
$nama_kecamatan=$_POST['nama_kecamatan'];
$nama_desa=$_POST['nama_desa'];

//input database
mysqli_query($konek, "insert into desa values('','$nama_kecamatan','$nama_desa')");
//mengalihkan kembali
header("location:index.php");
?>