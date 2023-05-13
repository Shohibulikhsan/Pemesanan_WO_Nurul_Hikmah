<?php 
include 'assets/koneksi.php';
			$username= $_POST['username'];
			$daftar = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username='".$_POST['username']."'");
			$cek_user=mysqli_num_rows($daftar);

				if ($cek_user > 0) {

					echo "<script>alert('username sudah ada , silahkan masukan username lain');  document.location='datftar.php';</script>";

				}else{
					

				$nama_pengguna= $_POST['nama_pengguna'];
				$notelp = $_POST['notelp'];
				$password = $_POST['password'];
				$alamat = $_POST['alamat'];

					mysqli_query($koneksi, "INSERT INTO pengguna (nama_pengguna,notelp,alamat,username,password,id_level) VALUES ('".$nama_pengguna."','".$notelp."','".$alamat."','".$username."','".$password."','2')");

					echo "<script>alert('Anda berhasil daftar , Silahkan masuk terlebih dahulu');
					document.location='login.php';</script>";
				}
?>