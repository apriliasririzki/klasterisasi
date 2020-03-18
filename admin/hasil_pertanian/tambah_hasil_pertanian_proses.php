<?php
//koneksi database
include "../../koneksi.php";
//mengangkap data

$nama_desa=$_POST['nama_desa'];
$padi=$_POST['padi'];
$jagung=$_POST['jagung'];
$kacang_tanah=$_POST['kacang_tanah'];
$kedelai=$_POST['kedelai'];

//input database
$cek = mysqli_query($konek, "SELECT COUNT(*) as hasil FROM hasil_pertanian WHERE id_desa='$nama_desa'");
$get = mysqli_fetch_assoc($cek);


if ($get['hasil'] > 0){
echo "<script>window.alert('nama atau email yang anda masukan sudah ada')
window.location='tambah_hasil_pertanian.php'</script>";
}else {
mysqli_query($konek, "insert into hasil_pertanian values('','$nama_desa','$padi','$jagung','$kacang_tanah','$kedelai')");
 
 echo "<script>window.alert('DATA SUDAH DISIMPAN')
window.location='index.php'</script>";
 }

	// mysqli_query($konek, "insert into hasil_pertanian values('','$id','$padi','$jagung','$kacang_tanah','$kedelai')");
//mengalihkan kembali
// header("location:index.php");
?>