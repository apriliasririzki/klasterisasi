<?php
//koneksi database
include "../../koneksi.php";

//menangkap data
$id_desa=$_GET['id_desa'];

//menghapus data
mysqli_query($konek, "delete from desa where id_desa='$id_desa'");

//mengalihkan halaman
header("location:index.php");
?>