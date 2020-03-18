<?php
include "../../koneksi.php";

$id=$_POST['id'];
$sql=mysqli_query($konek, "SELECT *FROM desa WHERE id_kecamatan='$id'");

$arr_kecamatan = array();
while ($k=mysqli_fetch_assoc($sql)) {
	
	$arr_kecamatan[count($arr_kecamatan)] = $k;

}

echo json_encode($arr_kecamatan);
?>