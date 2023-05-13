<link rel="stylesheet" type="text/css" href="assets/css/stylehome_admin.css"/> 
<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

<?php
include ('assets/koneksi.php');

	if ($_POST ['id_pengguna'] !=""){
		$nama			= $_POST['id_pengguna'];
		$notelp			= $_POST['notelp'];
		$alamat 		= $_POST['alamat'];
		$tanggal_awal	= $_POST['tanggal_awal'];
		$tanggal_akhir	= $_POST['tanggal_akhir'];
		$nama_paket		= $_POST['nama_paket'];
		$harga 			= $_POST['harga'];
		$pesan			= $_POST['pesan'];
		$warna			= $_POST['warna'];

?>
<section class="navbar navbar-default">
	<div class="navbar-header" >
		<a class="navbar-brand" href="home.php?page=beranda" style="color:#1167b0;">Nurul Hikmah</a>
		<a href="pelanggan/home.php?page=pemesanan" class="btn btn-sm btn-primary" style="position: absolute; right: 20px; top: 9px;">lanjutkan</a>
	</div>
</section>

<section>
	<div style="width: 470px; justify-content: center;">
		<h4 style="padding-bottom: 10px; text-align: center; padding: 0px;">NURUL HIKMAH</h4>
		<p style="text-align: center;">Desa Singajaya, Blok Kalen Senen <br> Jl. Ir. H. Juanda, KM 4</p>
		<p style="text-align: center;">----------------------------------------------------------------------------------------------</p>
		<h4 style="padding-bottom: 10px; text-align: center;">Detail Penyewaan</h4>
		<form action="" method="post">
			<div class="container-fluid">
				<p>Nama  : &nbsp; <?php echo "".$nama."";?></p>
				<p>No. Telp  : &nbsp; <?php echo "".$notelp."";?></p>
				<p>Alamat  : &nbsp; <?php echo "".$alamat."";?></p>
				<p>Dari Tanggal  : &nbsp; <?php echo "".$tanggal_awal."";?></p>
				<p>Sampai Tanggal  : &nbsp; <?php echo "".$tanggal_akhir."";?></p>
				<p style="text-align: center;">----------------------------------------------------------------------------------------------</p>
				<p>Paket  : &nbsp; <?php echo "".$nama_paket."";?></p>
				<p>Warna  : &nbsp; <?php echo "".$warna."";?></p>
				<p>Harga  : &nbsp;<?php echo "".$harga."";?></p>
				<p style="text-align: center;">----------------------------------------------------------------------------------------------</p>
				<p>Pesan  :  &nbsp; <?php echo "".$pesan."";?></p>
			</div>
		</form>

		<?php 
			if(isset($_POST['id_pengguna'])){
				$tanggal_awal	= $_POST['tanggal_awal'];

				$pemesanan = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tanggal_awal='".$_POST['tanggal_awal']."' OR tanggal_akhir='".$_POST['tanggal_akhir']."'");
				$cek_data=mysqli_num_rows($pemesanan);

					if ($cek_data > 0) {
						echo "<script>alert('Tanggal tersebut Sudah terpesan , Silahkan Pilih tanggal lain');  document.location='pelanggan/home.php?page=pemesanan';</script>";
					}else{
						$nama			= $_POST['id_pengguna'];
						$notelp			= $_POST['notelp'];
						$alamat 		= $_POST['alamat'];
						$tanggal_awal	= $_POST['tanggal_awal'];
						$tanggal_akhir	= $_POST['tanggal_akhir'];
						$nama_paket		= $_POST['nama_paket'];
						$harga 			= $_POST['harga'];
						$pesan			= $_POST['pesan'];
						$warna			= $_POST['warna'];


						$query=mysqli_query($koneksi, "INSERT INTO transaksi (id_pengguna,notelp,alamat,tanggal_awal,tanggal_akhir,paket,harga,pesan,warna)
							VALUES ('".$nama."','".$notelp."','".$alamat."','".$tanggal_awal."','".$tanggal_akhir."','".$nama_paket."','".$harga."','".$pesan."','".$warna."')");

							echo "<script>alert('pemesanan berhasil di simpan'); document.location='pelanggan/home.php?page=pemesanan;</script>";
					}
			}
		?>
	</div>
</section>

<br><br>

<section class="footer">
	<small>Copyright 2022 Ibnu Saiful - All Right Reserved</small>
</section>

<?php 
	}
?>

<style type="text/css">
	@media print{
		small , .btn-default {
			display: none;
		}
	}
</style>

<script>
	window.print();
</script>

			