<?php
//koneksi database
include "../../koneksi.php";

//menangkap data
$id=$_GET['id_kecamatan'];
$id_desa=$_GET['id_desa'];

//menghapus data
mysqli_query($konek, "delete from desa where id_desa='$id_desa'");

//mengalihkan halaman
header("location:detail_kecamatan.php?id_kecamatan=$id");
?>