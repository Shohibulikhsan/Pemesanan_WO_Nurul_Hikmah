<link rel="stylesheet" type="text/css" href="../assets/css/styleberanda.css"/> 

<?php 	
		switch ($_GET['action']) {
			case 'paketA':
?>

<section class="paketA">
	<div class="container">
		<div class="infopaket"  style="background-color: white; height:140vh; width: 100%; ">
			<div style="width: 100%;">
				<h3 style="text-align: left; padding-bottom: 0px; padding-left: 50px; margin-bottom: 0px; width: 77%; float: left;">Detail Paket A</h3>
				<div class="pesansekarang" style="width: 23%; float: left; padding-top: 40px; padding-bottom: 0px;">
					<?php
							$query=mysqli_query($koneksi,"SELECT * FROM paket where kode_paket=01");
							$data=mysqli_fetch_assoc($query);
						?>
					<form method="GET" action="home.php?page=pemesanan">
					<a href="home.php?page=pemesanan&id=<?=$data['kode_paket'];?>" class="btn btn-success">pesan sekarang</a>
					<a href="home.php?page=beranda" class="btn btn-default">Kembali</a>
				</form>
				</div>
			</div>
			<div class="infopaketA" style="padding: 50px; width: 35%; float: left;">
				<div class="fotopaketA"></div>
			</div>
			<div class="infopaket" style="width: 65%; float: left; padding-top: 40px; padding-right: 50px;">
				<div>
					<h4 style="background-color: #333; padding: 10px; color: white;">Detail</h4>
					<h4 style="padding-bottom: 0px;">Paket A</h4>
					<h4 style="padding-top:0px; color: #1E30f1;">Harga : Rp 12.000.000</h4>
					<div style="padding-left: 30px; color: black;">
						<p>1. Tenda&nbsp;&nbsp;:&nbsp;&nbsp; 4 - 5 Set ( Tenda Sisir + Tenda balon )</p>
						<p>2. Kursi + Sarung kursi&nbsp;&nbsp;: &nbsp;&nbsp;200 Buah</p>
						<p>3. Backgound tirai &nbsp;&nbsp; : &nbsp;&nbsp; 1 Set</p>
						<p>4. Alat prasmanan &nbsp;&nbsp; : &nbsp;&nbsp; 1 set
							<br>
							<ul style="padding-left: 40px; color: black;">
								<li>Pirirng 200</li>
								<li>Sendok 200</li>
								<li>Garpu 200</li>
								<li>Toples 2</li>
								<li>Meja prasmanan 2</li>
								<li>Meja Buah 2</li>
							</ul></p>
						<p>5. Blower 2 Buah</p>
						<p>6. Sound System 1 set </p>
						<p>7. Karpet 1 Set</p>
						<p>8. lampu diesel 2 hari 1 malam </p>
					</div>
					<h4>Tata Rias</h4>
						<ul style="color: black; padding-left: 30px;">
							<li>Pakaian Pengantin</li>
							<li>Aksesoris Pengantin</li>
							<li>Foto Album</li>
							<li>Sandal Dan Sepatu</li>
							<li>Gapura Masuk</li>
							<li>Hijab</li>
							<li>Kotak Uang</li>
							<li>Meja Tamu</li>
						</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
				break;

			case 'paketB':
?>

<section class="paketA">
	<div class="container">
		<div class="infopaket"  style="background-color: white; height:140vh; width: 100%; ">
			<div style="width: 100%;">
				<h3 style="text-align: left; padding-bottom: 0px; padding-left: 50px; margin-bottom: 0px; width: 77%; float: left;">Detail Paket B</h3>
				<div class="pesansekarang" style="width: 23%; float: left; padding-top: 40px; padding-bottom: 0px;">
					<?php
							$query1=mysqli_query($koneksi,"SELECT * FROM paket where kode_paket=02");
							$data1=mysqli_fetch_assoc($query1);
						?>
					<form method="GET" action="home.php?page=pemesanan">
					<a href="home.php?page=pemesanan&id=<?=$data1['kode_paket'];?>" class="btn btn-success">pesan sekarang</a>
					<a href="home.php?page=beranda" class="btn btn-default">Kembali</a>
				</div>
			</div>
			<div class="infopaketB" style="padding: 50px; width: 35%; float: left;">
				<div class="fotopaketB"></div>
			</div>
			<div class="infopaket" style="width: 65%; float: left; padding-top: 40px; padding-right: 50px;">
				<div>
					<h4 style="background-color: #333; padding: 10px; color: white;">Detail</h4>
					<h4 style="padding-bottom: 0px;">Paket B</h4>
					<h4 style="padding-top:0px; color: #1E30f1;">Harga : Rp 6.450.000</h4>
					<div style="padding-left: 30px; color: black;">
						<p>1. Tenda&nbsp;&nbsp;:&nbsp;&nbsp; 3 - 4 Set ( Tenda Sisir + Tenda balon )</p>
						<p>2. Kursi + Sarung kursi&nbsp;&nbsp;: &nbsp;&nbsp;200 Buah</p>
						<p>3. Backgound tirai &nbsp;&nbsp; : &nbsp;&nbsp; 1 Set</p>
						<p>4. Alat prasmanan &nbsp;&nbsp; : &nbsp;&nbsp; 1 Set
							<br>
							<ul style="padding-left: 40px; color: black;">
								<li>Piring 200</li>
								<li>Sendok 200</li>
								<li>Garpu 200</li>
								<li>Toples 2</li>
								<li>Meja prasmanan 2</li>
								<li>Meja Buah 2</li>
							</ul></p>
						<p>5. Blower 1 Buah</p>
						<p>6. sound system 1 Set</p>
						<p>7. Karpet 1 Set</p>
						<p>8. Lampu diesel 2 hari 1 malam </p>
						<p>9. panggung pelaminan (tidak ada dekorasi) </p>
						<p>9. Kotak Uang 1 </p>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php

				break;

			case 'paketC':
?>

<section class="paketA">
	<div class="container">
		<div class="infopaket"  style="background-color: white; height:140vh; width: 100%; ">
			<div style="width: 100%;">
				<h3 style="text-align: left; padding-bottom: 0px; padding-left: 50px; margin-bottom: 0px; width: 77%; float: left;">Detail Paket C</h3>
					<div class="pesansekarang" style="width: 23%; float: left; padding-top: 40px; padding-bottom: 0px;">
					<?php
							$query2=mysqli_query($koneksi,"SELECT * FROM paket where kode_paket=03");
							$data2=mysqli_fetch_assoc($query2);
						?>
					<form method="GET" action="home.php?page=pemesanan">
					<a href="home.php?page=pemesanan&id=<?=$data2['kode_paket']?>" class="btn btn-success">pesan sekarang</a>
					<a href="home.php?page=beranda" class="btn btn-default">Kembali</a>
				</form>
				</div>
			</div>
			<div class="infopaketC" style="padding: 50px; width: 35%; float: left;">
				<div class="fotopaketC"></div>
			</div>
			<div class="infopaketC" style="width: 65%; float: left; padding-top: 40px; padding-right: 50px;">
				<div>
					<h4 style="background-color: #333; padding: 10px; color: white;">Detail</h4>
					<h4 style="padding-bottom: 0px;">Paket C</h4>
					<h4 style="padding-top:0px; color: #1E30f1;">Harga : Rp 2.800.000</h4>
					<div style="padding-left: 30px; color: black;">
						<p>1. Tenda&nbsp;&nbsp;:&nbsp;&nbsp; 2 - 3 Set ( Tenda balon )</p>
						<p>2. Kursi + Sarung kursi&nbsp;&nbsp;: &nbsp;&nbsp;100 Buah</p>
						<p>3. Backgound tirai &nbsp;&nbsp; : &nbsp;&nbsp; 1 Set</p>
						<p>4. Alat prasmanan &nbsp;&nbsp; : &nbsp;&nbsp; 1 Set
							<br>
							<ul style="padding-left: 40px; color: black;">
								<li>Piring 100</li>
								<li>Sendok 100</li>
								<li>Garpu< 100</li>
								<li>Toples 1</li>
								<li>Meja prasmanan 1</li>
								<li>Meja Buah 1</li>
							</ul></p>
						<p>5. Blower 1 Buah</p>
						<p>6. Karpet 1 Set</p>
						<p>6. kotak uang 1 buah</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
				break;
			
			default:
?>

			<section class="banner"></section>
<section class="kategori">
	<div class="container">
		<h3>Kategori</h3>
		<div class="box">
			<div class="col-3">
				<div class="icon"> <i class="glyphicon glyphicon-tent" style="font-size: 30px;"></i></div>
				<h4>Tenda</h4>
			</div>
			<div class="col-3">
				<div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
  <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
</svg></div>
				<h4>Dekorasi</h4>
			</div>
			<div class="col-3">
				<div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16">
  <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043.002.001h-.002z"/>
</svg></div>
				<h4>tata Rias</h4>
			</div>
		</div>
	</div>
</section>

<a href="home.php?page=beranda&action=paketA"><section class="paket1">
	<div class="container">
		<h3>Pilihan Paket</h3>
		<div class="part">
			<div class="col-1">
				<h3 style="padding-right: 550px; padding-bottom: 0px;">Paket A</h3>
				<p style="">Paket A adalah paket paling lengkap yang kita tawarkan dilengkapi juga dengan tata rias, peralatan yang ditawarkan diantaranya</p>
					<ul style="padding-left: 30px; color: black;">
						<li>Tenda</li>
						<li>Kursi</li>
						<li>pelaminan</li>
						<li>Alat prasmanan</li>
						<li>Sound System / Salon</li>
						<li>Lampu Diesel</li>
					</ul>
				<h4 style="padding: 0px 0px;">Harga</h4>
				<p>Rp 12.000.000</p>
				<?php
							$query3=mysqli_query($koneksi,"SELECT * FROM paket where kode_paket=01");
							$data3=mysqli_fetch_assoc($query3);
						?>
					<form method="GET" action="home.php?page=pemesanan">
				<a href="home.php?page=beranda&action=paketA" class="btn btn-info">Detail paket</a>
				<a href="home.php?page=pemesanan&id=<?=$data3['kode_paket'];?>" class="btn btn-success" type="submit">Pesan Sekarang</a>
			</form>
			</div>
			<div class="col-2">
				<div class="foto1"></div>
			</div>
		</div>
	</div>
</section>
</a>
<a href="home.php?page=beranda&action=paketB"><section class="paket2">
	<div class="container">
		<div class="part">
			<div class="col-1">
				<h3 style="padding-right: 545px; padding-bottom: 0px;">Paket B</h3>
				<p style="">Paket B hampir selengkap Paket A namun tidak disertai dengan tata rias dan dekorasi pelaminan</p>
				<ul style="padding-left: 30px; color: black;">
					<li>Tenda</li>
					<li>Kursi</li>
					<li>Alat prasmanan</li>
					<li>Sound System / Salon</li>
					<li>Lampu Diesel</li>
				</ul>
				<h4 style="padding: 0px 0px;">Harga</h4>
				<p>Rp 6.450.000</p>
				<?php
							$query4=mysqli_query($koneksi,"SELECT * FROM paket where kode_paket=02");
							$data4=mysqli_fetch_assoc($query4);
						?>
					<form method="GET" action="home.php?page=pemesanan">
				<a href="home.php?page=beranda&action=paketB" class="btn btn-info">Detail paket</a>
				<a href="home.php?page=pemesanan&id=<?=$data4['kode_paket'];?>" class="btn btn-success" type="submit">Pesan Sekarang</a>
			</form>
			</div>
			<div class="col-2">
				<div class="foto2"></div>
			</div>
		</div>
	</div>
</section></a>
<a href="home.php?page=beranda&action=paketB"><section class="paket3">
	<div class="container">
		<div class="part">
			<div class="col-1">
				<h3 style="padding-right: 545px; padding-bottom: 0px;">Paket C</h3>
				<p style="">Paket Murah Meriah</p>
				<ul style="padding-left: 30px; color: black;">
					<li>Tenda</li>
					<li>Kursi</li>
					<li>Alat prasmanan</li>
				</ul>
				<h4 style="padding: 0px 0px;">Harga</h4>
				<p>Rp 2.800.000</p>
				<?php
							$query5=mysqli_query($koneksi,"SELECT * FROM paket where kode_paket=03");
							$data5=mysqli_fetch_assoc($query5);
						?>
					<form method="GET" action="home.php?page=pemesanan">
				<a href="home.php?page=beranda&action=paketC" class="btn btn-info">Detail paket</a>
				<a href="home.php?page=pemesanan&id=<?=$data5['kode_paket'];?>" class="btn btn-success" type="submit">Pesan Sekarang</a>
			</form>
			</div>
			<div class="col-2">
				<div class="foto3"></div>
			</div>
		</div>
	</div>
</section></a>

<section class="about">
	<div class="container">
	<h3>Tentang</h3>
	<p>Nurul Hikmah adalah salah satu usaha yang bergerak di bidang jasa penyewaan yang terletak di Desa Singajaya, Blok Kalen Senen, Jl. Ir. H. Juanda, KM 4. Nurul Hikmah menawarkan jasa penyewaan berbagai macam produk-produk seperti tenda, kursi, sarung kursi, panggung, dekorasi, alat-alat dapur, background/tirai, blower, karpet, sound system, dan terakhir rias pengantin. Nurul Hikmah menyewakan peralatan pesta tersebut untuk keperluan berbagai acara pernikahan, khitanan,dan peringatan hari besar lainnya. </p>
	</div>
</section>
<?php				
				break;
		}
 ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>