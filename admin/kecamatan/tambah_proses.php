<?php
//koneksi database
include "../../koneksi.php";
//mengangkap data
$nama_kecamatan=$_POST['nama_kecamatan'];

//input database
mysqli_query($konek, "insert into kecamatan values('','$nama_kecamatan')");
//mengalihkan kembali
header("location:index.php");
?>