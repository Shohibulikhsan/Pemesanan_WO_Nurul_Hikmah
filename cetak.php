
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

<?php
include ('assets/koneksi.php');

$query=mysqli_query($koneksi,"SELECT * FROM transaksi WHERE id_transaksi='".$_GET['id']."'");
$data=mysqli_fetch_array($query);
?>
<section class="navbar navbar-default">
	<div class="navbar-header" >
		<a class="navbar-brand" href="home.php?page=beranda" style="color:#1167b0;">Nurul Hikmah</a>
		<a href="admin/home.php?page=pesanan" class="btn btn-sm btn-primary" style="position: absolute; right: 20px; top: 9px;">lanjutkan</a>
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
						<p style="float: left;">Nota  : &nbsp;</p>
						<p><?=$data['id_transaksi']?></p>
						<p for="nama" style="float: left;">Nama  : &nbsp;</p>
						<p><?=$data['id_pengguna'];?></p>
						<p for="notelp" style="float: left;">No. Telp  : &nbsp;</p>
						<p><?=$data['notelp'];?></p>
						<p style="float: left;">Alamat  : &nbsp;</p>
						<p><?=$data['alamat']?></p>
						<p style="float: left;">Dari Tanggal  : &nbsp;</p>
						<p><?=$data['tanggal_awal']?></p>
						<p style="float: left;">Sampai Tanggal  : &nbsp;</p>
						<p><?=$data['tanggal_akhir']?></p>
						<p style="text-align: center;">-------------------------------------------------------------------------------------------------</p>
						<p style="float: left;">Paket  : &nbsp;</p>
                     	<p><?=$data['paket']?></p>
                     	<p style="float: left;">warna  : &nbsp;</p>
                     	<p><?=$data['warna']?></p>
						<p for="nama" style="float: left;">Harga  : &nbsp;</p>
						<p><?=$data['harga']?></p>
						<p style="text-align: center;">-------------------------------------------------------------------------------------------------</p>
						<p style="float: left;">Pesan  :  &nbsp;</p>
						<p><?=$data['pesan']?></p>
						<p style="float: left;">Keterangan  : &nbsp;</p>
						<p><?=$data['id_keterangan']?></p>
				</form>
		</div>
	</div>
</section>
<br>

<section class="footer">
	<small>Copyright 2022 Ibnu Saiful - All Right Reserved</small>
</section>

<style type="text/css">
	@media print{
		small , .btn-primary {
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
