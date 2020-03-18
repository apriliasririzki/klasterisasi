<?php
$host	="localhost";//host server
$user	="root";//user login php my admin
$pass	="";//pass login php my admin
$db		="sipehataman";//nama databasenya
$konek	=mysqli_connect($host, $user, $pass, $db) or die("koneksi gagal");
if(mysqli_connect_errno()){
	echo "koneksi database gagal: ".mysqli_connect_error();
}
?>