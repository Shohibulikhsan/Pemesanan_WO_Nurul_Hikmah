
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE-edge" />
	<meta name="viewport" content="width=device-witdh, initial-scale-1" />
	<link rel="stylesheet" type="text/css" href="assets/css/stylelogin.css"/> 
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="shortcut icon" href="img/LOGOPNG.png" type="image/x-icon" />
	<title>Masuk</title>
</head>
<body>

<nav class="navbar navbar-light">
	<img src="img/LOGOPNG.png" style="width: 28px; height: 28px; position: absolute; left: 25px; top: 17px;">
	<a href="index.php" class="navbar-brand">Nurul Hikmah</a>
	<a href="index.php"><button class="btn btn-default">Kembali</button></a>
</nav>



<section class="login">

<?php 
		if(isset($_GET['pesan'])){
			$pesan = $_GET['pesan'];
			if($pesan == "input"){
				echo "<div class='alert alert-success'>Anda berhasil daftar</div>";
			}else if($pesan == "logout"){
				echo "<div class='alert alert-success'>Anda berhasil Logout.</div>";
			}else if($pesan == "gagal"){
				echo"<div class='alert alert-danger'>Username atau Password salah !</div>";
			}else if($pesan == "block"){
				echo "<br><div class='alert alert-danger'>Anda sudah login !</div>";
			}
		}
?>

	<div class="form_login">
		<div class="form"><h2>Masuk</h2></div>
			<form action="proses-login.php" method="post" onSubmit="return validasi()">
				<div class="form-element">
					<label for="username">Username</label>
					<input type="text" class="username" placeholder="Enter username" name="username" required="true">
				</div>
		<br>
				<div class="form-element" >
					<label for="password">Password</label>
					<input type="password" class="password" placeholder="Enter Password" name="password" required="true" >
				</div>
		<br>
				<div class="form-element">
					<input type="submit" class="tombol_login" value="MASUK" onclick="validasi()x">
				</div>
		<br>
				<div class="form-element">
					<a href="daftar.php" style="text-align: center; color:#1E90FF;"><p>Daftar</p></a>
				</div>
		</div>
			</form>
		<img src="img/LOGO.JPG" style="width: 520px; position: absolute; top: 50%; left: 50%; transform: translate(-10.6%, -50%);">
	</div>
</section>



<section class="footer">
	<small>Copyright 2022 Ibnu Saiful - All Right Reserved</small>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>