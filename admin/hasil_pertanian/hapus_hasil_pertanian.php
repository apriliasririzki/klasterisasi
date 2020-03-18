<?php
//koneksi database
include "../../koneksi.php";

//menangkap data
$id=$_GET['id_desa'];
$id_hasil_pertanian=$_GET['id_hasil_pertanian'];

//menghapus data
mysqli_query($konek, "delete from hasil_pertanian where id_hasil_pertanian='$id_hasil_pertanian'");

//mengalihkan halaman
header("location:index.php");
?>