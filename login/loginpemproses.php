<?php
	session_start();
	if (isset($_SESSION["username"])){
		header("Location: ../admin/halamanutama/");//maka diarahkan ke halaman admin
	}
	include '../koneksi.php';
	if(isset($_POST['username']) AND ($_POST['password'])){
	$user=$_POST['username'];
	$pass=$_POST['password'];
	//echo $username."<br>";
	//echo $password."<br>";
	if ($user=="" OR $pass=="") {//salah satu kosong
		//echo "KOSONG, Jangan diproses";
		header('Location:login.php');
	} else if ($user==!(NULL) AND $pass==!(NULL)) {//kalau semuanya diisi
		//koneksi database
		//(server, user_db, password_db, nama_db)
		//cek u dan p dengan data di tabel user
		$ceklogin=mysqli_query($konek,"select * from admin WHERE username='$user' AND password='$pass'");
		$hasil=mysqli_num_rows($ceklogin);
		$cekuser=mysqli_query($konek,"select * from user WHERE username='$user' AND password='$pass'");
		$hasiluser=mysqli_num_rows($cekuser);
		//kemungkinan kalau u dan p benar
		if ($hasil==1){
			$row=mysqli_fetch_array($ceklogin);
			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['level'] = "admin";

			header('Location:../admin/halamanutama/');
			//buat session
		}
		else if ($hasiluser==1){
			$rowuser=mysqli_fetch_array($cekuser);
			$_SESSION['username'] = $rowuser['username'];
			$_SESSION['password'] = $rowuser['password'];
			$_SESSION['level'] = "user";

			header('Location:../user/halamanutama/index.php');
		}
	}
		//kemungkinan kalau u dan p salah
		else{
			echo "U dan P salah";
		}
	}
?>