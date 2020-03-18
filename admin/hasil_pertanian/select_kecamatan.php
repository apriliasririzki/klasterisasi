<?php
if (!empty($_GET['id_kecamatan'])){
	if (ctype_digit($_GET['id_kecamatan'])) {
		include '../../koneksi.php';
		$query = mysqli_query($konek,"SELECT * FROM desa where id_kecamatan=$_GET[id_kecamatan] order by nama_desa");
		echo"<option selected value=''>Pilih Desa</option>";
		while($d = mysqli_fetch_array($query)){
			echo "<option value='$d[id_desa]&kecamatan=$_GET[id_kecamatan]'>$d[nama_desa]</option>";
		}
 
 
	}
}

?>