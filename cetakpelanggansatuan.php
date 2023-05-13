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
				$tenda4x4		= $_POST['tenda4x4'];
				$tenda8x8		= $_POST['tenda8x8'];
				$tendasisir 	= $_POST['tendasisir'];
				$harga1			= $_POST['harga4x4'];
				$harga2			= $_POST['harga8x8'];
				$harga3			= $_POST['hargasisir'];
				$warna			= $_POST['warna'];
				$harga 			= $_POST['harga'];
				$pesan			= $_POST['pesan'];

?>
<section class="navbar navbar-default">
	<div class="navbar-header" >
		<a class="navbar-brand" href="home.php?page=beranda" style="color:#1167b0;">Nurul Hikmah</a>
		<a href="pelanggan/home.php?page=pemesanan" class="btn btn-sm btn-primary" style="position: absolute; right: 20px; top: 9px;">Selesai</a>
	</div>
</section>

<section>
	<div style="width: 470px;">
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
				<p>warna  : &nbsp; <?php echo "".$warna."";?></p>
				<p style="text-align: center;">----------------------------------------------------------------------------------------------</p>
				<div>
					<p style="width: 50%; float: left;">Barang</p>
					<p style="width: 40%; float: left;">harga satuan</p>
					<p style="width: 10%; float: left;">jumlah</p>
				</div>
				<div>
				<?php
					$query=mysqli_query($koneksi,"SELECT * FROM tenda where id_tenda=02");
					$data=mysqli_fetch_assoc($query);
				?>	
					<p style="width: 50%; float: left;">Tenda 4x4</p>
					<p style="width: 40%; float: left;"><?=$data['harga']?></p>
					<p style="width: 10%; float: left; text-align: center;"> <?php echo "".$tenda4x4."";?></p>
				</div>
				<div>
				<?php
					$query=mysqli_query($koneksi,"SELECT * FROM tenda where id_tenda=03");
					$data1=mysqli_fetch_assoc($query);
				?>	
					<p style="width: 50%; float: left;">Tenda 8x8</p>
					<p style="width: 40%; float: left;"><?=$data1['harga']?></p>
					<p style="width: 10%; float: left; text-align: center;"> <?php echo "".$tenda8x8."";?></p>
				</div>
				<div>
				<?php
					$query=mysqli_query($koneksi,"SELECT * FROM tenda where id_tenda=01");
					$data2=mysqli_fetch_assoc($query);
				?>	
					<p style="width: 50%; float: left;">Tenda 4x4</p>
					<p style="width: 40%; float: left;"><?=$data2['harga']?></p>
					<p style="width: 10%; float: left; text-align: center;"> <?php echo "".$tendasisir."";?></p>
				</div>
				
				<p style="text-align: center;">----------------------------------------------------------------------------------------------</p>
				<div>
					<p style="width: 85%; float: left;">Total harga</p>
					<p style="width: 15%; float: left; text-align: center;"> <?php echo "".$harga."";?></p>
				</div>
				<p style="text-align: center;">----------------------------------------------------------------------------------------------</p>
				<p>Pesan  :  &nbsp; <?php echo "".$pesan."";?></p>
			</div>
		</form>
		
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

			