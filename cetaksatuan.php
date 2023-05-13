
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

<?php
include ('assets/koneksi.php');

	
		$query=mysqli_query($koneksi,"SELECT * FROM transaksi_satuan WHERE id_transaksis ='".$_GET['id']."'");
		$data3=mysqli_fetch_assoc($query);
?>


<section class="navbar navbar-default">
	<div class="navbar-header" >
		<a class="navbar-brand" href="home.php?page=beranda" style="color:#1167b0;">Nurul Hikmah</a>
		<a href="admin/home.php?page=pesanan" class="btn btn-sm btn-primary" style="position: absolute; right: 20px; top: 9px;">Selesai</a>
	</div>
</section>

<section>
<div class="container">
			<div class="form-pemesanan">
				<h4 style="padding-bottom: 10px; text-align: center; padding: 0px;">NURUL HIKMAH</h4>
				<p style="text-align: center;">Desa Singajaya, Blok Kalen Senen <br> Jl. Ir. H. Juanda, KM 4</p>
				<p style="text-align: center;">-------------------------------------------------------------------------------------------------</p>
				<h4 style="padding-bottom: 10px; text-align: center;">Nota Penyewaan</h4>
				<form action="home.php?page=pesanan&action=updatepaket" method="post">
					<p>Nota  : &nbsp; <?=$data3['id_transaksis']?></p>
					<p>Nama  : &nbsp; <?=$data3['id_pengguna'];?></p>
					<p>No. Telp  : &nbsp; <?=$data3['notelp'];?></p>
					<p>Alamat  : &nbsp; <?=$data3['alamat']?></p>
					<p>Dari Tanggal  : &nbsp; <?=$data3['tanggal_awal']?></p>
					<p>Sampai Tanggal  : &nbsp; <?=$data3['tanggal_akhir']?></p>
					<p>Warna  : &nbsp; <?=$data3['warna']?></p>
					<p style="text-align: center;">-------------------------------------------------------------------------------------------------</p>
						<div>
					<p style="width: 50%; float: left;">Barang</p>
					<p style="width: 40%; float: left;">harga satuan</p>
					<p style="width: 10%; float: left;">jumlah</p>
				</div>
				<div style="margin: 0px;">
				<?php
					$query=mysqli_query($koneksi,"SELECT * FROM tenda where id_tenda=02");
					$data=mysqli_fetch_assoc($query);
				?>	
					<p style="width: 50%; float: left;">Tenda 4x4</p>
					<p style="width: 40%; float: left;"><?=$data['harga']?></p>
					<p style="width: 10%; float: left; text-align: center;"><?=$data3['tenda4x4'];?></p>
				</div>
				<div style="margin: 0px;">
				<?php
					$query=mysqli_query($koneksi,"SELECT * FROM tenda where id_tenda=03");
					$data1=mysqli_fetch_assoc($query);
				?>	
					<p style="width: 50%; float: left;">Tenda 8x8</p>
					<p style="width: 40%; float: left;"><?=$data1['harga']?></p>
					<p style="width: 10%; float: left; text-align: center;"><?=$data3['tenda8x8'];?></p>
				</div>
				<div style="margin: 0px;">
				<?php
					$query=mysqli_query($koneksi,"SELECT * FROM tenda where id_tenda=01");
					$data2=mysqli_fetch_assoc($query);
				?>	
					<p style="width: 50%; float: left;">Tenda Sisir</p>
					<p style="width: 40%; float: left;"><?=$data2['harga']?></p>
					<p style="width: 10%; float: left; text-align: center;"><?=$data3['tendasisir'];?></p>
				</div>
				
				<p style="text-align: center;">-------------------------------------------------------------------------------------------------</p>
				<div>
					<p style="width: 85%; float: left;">Total harga</p>
					<p style="width: 15%; float: left; text-align: center;"><?=$data3['harga'];?></p>
				</div>
				<p style="text-align: center;">-------------------------------------------------------------------------------------------------</p>
						<p>Pesan  :  &nbsp; <?=$data3['pesan']?></p>
						<p>Keterangan  : &nbsp; <?=$data3['keterangan']?></p>
				</form>	

</section>

<br><br>

<section class="footer">
	<small>Copyright 2022 Ibnu Saiful - All Right Reserved</small>
</section>

<style type="text/css">
	@media print{
		.footer , .navbar-header, a {
			display: none;
		}
	}

	.footer{
	height: 10vh;
	background-color: #333;
	color: silver;
	text-align: center;
	padding: 20px;
	}
</style>

<script>
		window.print();
</script>
