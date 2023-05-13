
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE-edge" />
	<meta name="viewport" content="width=device-witdh, initial-scale-1" />
	<link rel="stylesheet" type="text/css" href="assets/css/styledaftar.css"/> 
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="shortcut icon" href="img/LOGOPNG.png" type="image/x-icon" />
	<title>Daftar</title>
</head>
<body>

<nav class="navbar navbar-light">
	<img src="img/LOGOPNG.png" style="width: 28px; height: 28px; position: absolute; left: 25px; top: 17px;">
	<a href="index.php" class="navbar-brand">Nurul Hikmah</a>
</nav>

<section class="daftar">
	<div class="form-daftar">
		<div class="form"><h2>Daftar</h2></div>
			<form action="proses-daftar.php" method="post">
				<div class="form-element">
					<label for="nama">Nama</label>
					<input type="text" class="nama_pengguna" placeholder="Masukan nama lengkap" name="nama_pengguna" required="true">
				</div>
		<br>
				<div class="form-element" >
					<label for="notelp">No. Telp</label>
					<input type="text" class="notelp" placeholder="Masukan No Telpon" name="notelp" required="true" >
				</div>
		<br>
				<div class="form-element" >
					<label for="password">Alamat</label>
					<textarea name="alamat" required="true" placeholder="Masukan Alamat" class="alamat"></textarea>
				</div>
		<br>
				<div class="form-element" >
					<label for="username">Username</label>
					<input type="text" class="username" placeholder="Masukan username" name="username" required="true" >
				</div>
		<br>
				<div class="form-element" >
					<label for="password">Password</label>
					<input type="password" class="password" placeholder="Masukan Password" name="password" required="true" >
				</div>
		<br>
				<div class="form-element">
					<input type="submit" class="tombol_login" value="DAFTAR">
				</div>
		<br>
				<div class="form-element">
					<a href="login.php" style="text-align: center; color:#1E90FF;"><p>Sudah Punya Akun</p></a>
				</div>
		</div>
			</form>
	</div>
</section>



<section class="footer">
	<small>Copyright 2022 Ibnu Saiful - All Right Reserved</small>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>