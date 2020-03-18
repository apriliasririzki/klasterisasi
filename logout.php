<?php
	session_start();
	if (!(isset($_SESSION["username"]))){ //jika belum login akan diarahkan ke halaman login
		header("Location: ../");
	}
	session_unset();
	session_destroy();
	header("Location: index.php");
?>