<link rel="stylesheet" type="text/css" href="../assets/css/styleakun.css">

<section class="akun">
<div class="container">
<?php
	switch ($_GET['action']) {

default:

?> 
<div class="form_tambah">
	<h3>Tambah Akun</h3>
<form method="POST" action="home.php?page=akun&action=save" style="padding-right: 2%; padding-bottom: 2%;" id="id_pengguna">
			<label>Nama</label>
			<input type="text" name="nama_pengguna" class="form-control" required="true">
			<label>No Telpon</label>
			<input type="text" name="notelp" class="form-control" required="true">
			<label>alamat</label>
			<input type="text" name="alamat" class="form-control" required="true">
			<label>Username</label>
			<input type="text" name="username" class="form-control" required="true">
			<label>Password</label>
			<input type="password" name="password" class="form-control" required="true">
			<br>
			<button type="submit" class="btn btn-primary"s>SIMPAN</button>
</form>
</div>

<div class="table-responsive">
	<h3>Daftar Akun</h3>
	<br>
<div>
	<div>

<?php
	if(isset($_POST['cari_akun'])){
		$cari =$_POST['kata_kunci'];
		$tampil = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username LIKE '%".$cari."%' OR nama_pengguna LIKE '%".$cari."%'");	
	}else{
		$tampil=mysqli_query($koneksi," SELECT * FROM pengguna ");
	}
?>

		<form method="POST" action="">
			<input type="text" name="kata_kunci" class="form-control" placeholder="cari akun" style="width: 300px; float: left;" value="<?php echo $cari;?>">
			<input type="submit" value="cari" name="cari_akun" class="btn btn-info">
		</form>
	</div>
</div> 
	<br>
<table class="table table-bordered table-striped">
	<thead>
		<th>Id</th>
		<th>Nama</th>
		<th>No Telp</th>
		<th>Username</th>
		<th>Opsi</th>
	</thead>
	<tbody>
		<?php
			while ($data=mysqli_fetch_assoc($tampil)) {
		?>
		<tr>
			<td><?php echo $data["id_pengguna"]; ?></td>
			<td><?php echo $data["nama_pengguna"]; ?></td>
			<td><?php echo $data["notelp"]; ?></td>
			<td><?php echo $data["username"]; ?></td>
			<td>
				<a href="home.php?page=akun&action=edit&id=<?=$data['id_pengguna'];?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>

				<a href="home.php?page=akun&action=resset&id=<?=$data['id_pengguna'];?>"
					class="btn btn-sm btn-default"><span class="glyphicon glyphicon-refresh"></span></a>

				<a href="home.php?page=akun&action=hapus&id=<?=$data['id_pengguna'];?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
			</td>
		</tr>
		<?php
		}
		?>
</tbody>
</table>
</div>
<?php
			break;

		case 'save':
			$username= $_POST['username'];
			$daftar = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username='".$_POST['username']."'");
			$cek_user=mysqli_num_rows($daftar);

				if ($cek_user > 0) {

					echo "<script>alert('username sudah ada , silahkan masukan username lain');  document.location=home.php?page=akun&action=add';</script>";

				}else{
					

				$nama_pengguna	 = $_POST['nama_pengguna'];
				$password 		 = $_POST['password'];
				$alamat			 = $_POST['alamat'];
				$notelp			 = $_POST['notelp'];


					mysqli_query($koneksi, "INSERT INTO pengguna (nama_pengguna,notelp,alamat,username,password,id_level) VALUES ('".$nama_pengguna."','".$notelp."','".$alamat."','".$username."','".$password."','2')");

					echo "<script>document.location='home.php?page=akun';</script>";
				}
			
			
			break;

		case 'edit':

		$query=mysqli_query($koneksi,"SELECT * FROM pengguna where id_pengguna='".$_GET['id']."'");
		$data=mysqli_fetch_assoc($query);
		?>

		<form method="POST" action="home.php?page=akun&action=update" style="padding-right: 18px;">
			<input type="hidden" name="id" value="<?=$data['id_pengguna']?>">

			<label>Nama</label>
			<input type="text" name="nama_pengguna" class="form-control" required="true" value="<?=$data['nama_pengguna']?>">

			<label>No Telpon</label>
			<input type="text" name="username" class="form-control" required="true" value="<?=$data['notelp']?>">

			<label>Alamat</label>
			<textarea name="alamat" class="form-control" required="true"><?=$data['alamat']?></textarea>

			<label>Username</label>
			<input type="text" name="username" class="form-control" required="true" value="<?=$data['username']?>" disabled = "true">


			<label>Password</label>
			<input type="password" name="password" class="form-control" required="true" value="<?=$data['password']?>" >
			<br>

			<button type="submit" class="btn btn-primary">SIMPAN</button>
			<a href="home.php?page=akun" class="btn btn-default">KEMBALI</a>
		</form>
		<br>

	<?php
			break;

		case 'update':

		if (isset($_POST['id'])) {
				$nama_pengguna = $_POST['nama_pengguna'];
				$password = $_POST['password'];
				$query=mysqli_query($koneksi, "UPDATE pengguna SET nama_pengguna='".$nama_pengguna."' , password='".$password."'WHERE id_pengguna='".$_POST['id']."'");
				if ($query) {
					echo "<script>document.location='home.php?page=akun';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=akun&action=edit&id=".$_POST['id']."';</script>";
				}
			}
			
			break;

		case 'hapus':

		$query=mysqli_query($koneksi, "DELETE FROM pengguna WHERE id_pengguna='".$_GET['id']."'");
				if ($query) {
					echo "<script>document.location='home.php?page=akun';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=akun;</script>";
				}
			
			break;
			
		case 'resset':

		$password = ("12345678");
		$query=mysqli_query($koneksi, "UPDATE pengguna SET password='".$password."' WHERE id_pengguna='".$_GET['id']."'");
				if ($query) {
					echo "<script>alert('Sukses Reset Password 12345678'); document.location='home.php?page=akun';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=akun;</script>";
				}
			
			break;
		
		}
		?>
	
</div>
</section>