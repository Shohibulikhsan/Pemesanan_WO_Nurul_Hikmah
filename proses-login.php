<?php 
session_start();

$koneksi = mysqli_connect("localhost","root","","nurul_hikmah");
 
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

$username = $_POST['username'];
$password = $_POST['password'];


$login = mysqli_query($koneksi,"select * from pengguna where username='$username' and password='$password'");

$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['id_level']=="1"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/home.php");


	// cek jika user login sebagai pelanggan
	}else if($data['id_level']=="2"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "pelanggan";
		// alihkan ke halaman dashboard pelanggan
		header("location:pelanggan/home.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:login.php?pesan=back");	
	}	
}else{
	header("location:login.php?pesan=gagal");
}

?>