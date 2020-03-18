<?php 
	$base_url="http://localhost/sipehataman/"; 
	session_start(); //mulai session
	if (!(isset($_SESSION["username"]))){ //jika belum login akan diarahkan ke halaman login
		header("Location: $base_url");
	}

	$s_username=$_SESSION["username"]; //menangkap session username
	$s_level=$_SESSION["level"]; //menangkap sessio level
	//$nama=$_SESSION["nama"]; //menangkap sessio level
	$namasistemnya="SIPEHATAMAN";

	include '../../koneksi.php';
	if ($s_level=='admin') {
		header('location:$base_url'.'admin/');//  meredirect ke kehalaman admin/index.php
	}
 ?>