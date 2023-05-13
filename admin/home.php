<?php
session_start();
error_reporting(0);
ini_set('date.timezone', 'Asia/Jakarta');
include "../assets/koneksi.php";

if(empty($_SESSION['username']) AND empty($_SESSION['password'])){
	echo "<script>document.location='../login.php';</script>";
}
else {
	$query_admin=mysqli_query($koneksi,"SELECT * FROM pengguna WHERE username='".$_SESSION['username']."'");
	$data_admin=mysqli_fetch_assoc($query_admin);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE-edge" />
	<meta name="viewport" content="width=device-witdh, initial-scale-1" />
	<link rel="stylesheet" type="text/css" href="../assets/css/stylehome_admin.css"/> 
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="shortcut icon" href="../img/LOGOPNG.png" type="image/x-icon" />
	<title>Admin</title>
</head>
<body>


	<?php 
	session_start();
	$username = $_SESSION['username'];
	$level = $_SESSION['level'] = "pelanggan";
	
	?>

<section class="navbar navbar-default">

			<div class="navbar-header" >
				<button type="button" class="navbar-toggle collapsed" data-toggle ="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" >
					<span class="sr-only" style="background: black;">Toggle Navigation</span>
					<span class="icon-bar" style="background: grey;"></span>
					<span class="icon-bar" style="background: grey;"></span>
					<span class="icon-bar" style="background: grey;"></span>
					
				</button>
				<?php
					$query=mysqli_query($koneksi,"SELECT * FROM pengguna INNER JOIN level on pengguna.id_level=level.id_level WHERE username = '$username'");
					$data=mysqli_fetch_array($query);
				?>
				<img src="../img/LOGOPNG.png" style="width: 28px; height: 28px; position: absolute; left: 17px; top: 9px;">
				<a class="navbar-brand" href="home.php?page=beranda" style="color:#1167b0; padding-left: 56px;">Nurul Hikmah</a>
				<a href=""  style="position: absolute; right: 170px; top: 10px; font-size: 15px; color: grey; border-right: 1px solid; padding-right: 20px; padding-bottom: 0px;"><label><?=$data['nama_pengguna'];?></label>&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user" style="font-size: 20px; padding-top: 2px;"></span></a>
				<a href="../logout.php"><button class="btn btn-primary"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Keluar</button></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="home.php?page=akun" style="color: grey;">Akun</a></li>
					<li><a href="home.php?page=pesanan"  style="color: grey;">Pesanan</a></li>
					<li><a href="home.php?page=kontak"  style="color: grey;">Kritik dan Saran</a></li>
					<li><a href="home.php?page=barang"  style="color: grey;">Barang</a></li>
					<li><a href="home.php?page=paket"  style="color: grey;">Daftar Paket</a></li>
				</ul>
			</div>
			<?php
					switch ($_GET['page']) {
						case 'kontak':
								include "page/kontak.php";
							break;

						case 'pesanan':
								include "page/pesanan.php";
							break;

						case 'barang':
								include "page/barang.php";
							break;

						case 'paket':
								include "page/paket.php";
							break;
						
						default:
								include "page/akun.php";
							break;
					}
			?>

</section>

<section class="footer">
	<small>Copyright 2022 Ibnu Saiful - All Right Reserved</small>
</section>

<script src="../assets/jquery-3.6.0.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>

<?php } ?>