<link rel="stylesheet" type="text/css" href="../assets/css/stylepesanan.css">
<script src='../assets/pdfmake-0.1.36/pdfmake.min.js'></script>

<script type="text/javascript">
$(document).ready(function () {
        $('#table-datatables').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>
<section class="pesanan">
	<div class="container">
		
		
<?php
		switch ($_GET['action']) {

		default:

?> 
<div style="padding-left: 200px;">
		<div class="kalender-info-pesanan" style="width:700px;">
			<h3>Informasi Tanggal&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar" style="color: grey;"></span></h3>
				<div id="calendar"></div>	
		</div>
</div>

		<link rel="stylesheet" type="text/css" href="../assets/fullcalendar-5.11.0/main.css">

<script src="../assets/fullcalendar-5.11.0/main.js"></script>

<script>
	document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events : [ 
				<?php
					$data = mysqli_query($koneksi,'SELECT * FROM transaksi');
    				while($d = mysqli_fetch_array($data)){  
    				$akhir = strtotime("+1 day", strtotime($d['tanggal_akhir']));   
				?>
						{
    						title: '<?php echo 'penuh'; ?>', //menampilkan title dari tabel
  							start: '<?php echo $d['tanggal_awal']; ?>', //menampilkan tgl mulai dari tabel
  							end: '<?php echo date("Y-m-d", $akhir); ?>' //menampilkan tgl selesai dari tabel
						},
				<?php 
					} 
				?>
                    ],
        	selectOverlap: function (event) {
            	return event.rendering == 'background';
        	}
    	});
        calendar.render();
    });
	</script>


<div class="tabel-info">
			<h3>Daftar Sewa Paket</h3>
<br>
			<div>
				<div style="padding-right: 10px; float: left;">
					<a href="home.php?page=pesanan&action=addpaket" class="btn btn-sm btn-primary" style=""><span class="glyphicon glyphicon-plus"></span>Tambah Tenda</a>
				</div>
			<div>

<?php
	if(isset($_POST['cari_p'])){
		$no=1;
		$cari_paket =$_POST['cari_paket'];
		$tampil_ppaket = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_pengguna LIKE '%".$cari_paket."%' OR tanggal_awal LIKE '%".$cari_paket."%'");	
	}else{
		$no=1;
		$tampil_ppaket=mysqli_query($koneksi," SELECT * FROM transaksi ORDER BY tanggal_awal ASC ");
	}
?>

			<form method="POST" action="">
				<input type="text" name="cari_paket" class="form-control" placeholder="cari transaksi paket" style="width: 300px; float: left;" value="<?php echo $cari_paket;?>">
				<input type="submit" value="cari" name="cari_p" class="btn btn-info">
			</form>
		</div>
	</div>

<br>
<div class="table-responsive" style="border-bottom:1px solid; border-color: silver; padding-bottom: 20px;">
<table class="table table-bordered table-striped">
	<thead>
		<th>No</th>
		<th>Nama</th>
		<th>No Telp</th>
		<th>Tanggal</th>
		<th>paket</th>
		<th>keterangan</th>
	</thead>
	<tbody>
		<?php
			while ($data=mysqli_fetch_assoc($tampil_ppaket)) {
		?>
		<tr>
			<td><?=$no?></td>
			<td><?php echo $data["id_pengguna"]; ?></td>
			<td><?php echo $data["notelp"]; ?></td>
			<td><?php echo $data["tanggal_awal"];?>&nbsp;&nbsp;s/d&nbsp;&nbsp;<?php echo $data["tanggal_akhir"];?></td>
			<td><?php echo $data["paket"]; ?></td>
			<td><?php echo $data["id_keterangan"]; ?></td>
			<td>
				
				<a href="home.php?page=pesanan&action=editpaket&id=<?=$data['id_transaksi'];?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Ubah</a>

				<a href="home.php?page=pesanan&action=hapuspaket&id=<?=$data['id_transaksi'];?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;Hapus</a>

				<a href="../cetak.php?id=<?=$data['id_transaksi'];?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-print"></span>&nbsp;Cetak</a>
			</td>
		</tr>
		<?php
		$no++;
		}
		?>
</tbody>
</table>
</div>
<br>

<h3>Daftar Sewa Tenda Satuan</h3>
<br>
		<div>
				<div style="padding-right: 10px; float: left;">
					<a href="home.php?page=pesanan&action=addsatuan" class="btn btn-sm btn-primary" style=""><span class="glyphicon glyphicon-plus"></span>Tambah Tenda</a>
				</div>
			<div>

<?php
	if(isset($_POST['cari_s'])){
		$no=1;
		$cari =$_POST['cari_satuan'];
		$tampil_psatuan = mysqli_query($koneksi, "SELECT * FROM transaksi_satuan WHERE id_pengguna LIKE '%".$cari."%' OR tanggal_awal LIKE '%".$cari."%'");	
	}else{
		$no=1;
		$tampil_psatuan=mysqli_query($koneksi," SELECT * FROM transaksi_satuan ORDER BY tanggal_awal ASC ");
	}
?>

			<form method="POST" action="">
				<input type="text" name="cari_satuan" class="form-control" placeholder="cari transaksi satuan" style="width: 300px; float: left;" value="<?php echo $cari;?>">
				<input type="submit" value="cari" name="cari_s" class="btn btn-info">
			</form>
		</div>
	</div>
<br>
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<th>No</th>
					<th>Kode</th>
					<th>Nama</th>
					<th>No Telp</th>
					<th>Tanggal</th>
					<th>keterangan</th>
				</thead>
				<tbody>

					<?php
						while ($data=mysqli_fetch_assoc($tampil_psatuan)) {
					?>
						<tr>
							<td><?=$no?></td>
							<td><?php echo $data["id_pengguna"]; ?></td>
							<td><?php echo $data["notelp"]; ?></td>
							<td><?php echo $data["tanggal_awal"];?>&nbsp;&nbsp;s/d&nbsp;&nbsp;<?php echo $data["tanggal_akhir"];?></td>
							<td><?php echo $data["keterangan"]; ?></td>
							<td>
				
								<a href="home.php?page=pesanan&action=editsatuan&id=<?=$data['id_transaksis'];?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span>Ubah</a>

								<a href="home.php?page=pesanan&action=hapussatuan&id=<?=$data['id_transaksis'];?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;Hapus</a>

								<a href="../cetaksatuan.php?id=<?=$data['id_transaksis'];?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-print"></span>&nbsp;Cetak</a>
							</td>
						</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
			break;

		case 'addpaket':

		?>
<div class="container">
		<div class="form-pemesanan">
				<h3 style="padding-bottom: 10px;">Pemesanan Paket</h3>
				<form action="home.php?page=pesanan&action=savepaket" method="post">
					<div class="part">
						<label for="nama">Nama</label>
						<input type="text"  placeholder="Masukan nama lengkap" name="id_pengguna" required="true" class="form-control">
					</div><br>
					<div class="part">
						<label for="notelp">No. Telp</label>
						<input type="text" placeholder="Masukan No Telpon" name="notelp" required="true"  value="<?=$data['notelp'];?>" class="form-control">
					</div><br>
					<div class="part">
						<label>Alamat</label>
						<textarea name="alamat" required="true" placeholder="masukan alamat" class="form-control"></textarea>
					</div><br>
					<div class="part">
						<label >Dari Tanggal</label>
						<input type="date"  name="tanggal_awal" required="true" class="form-control">
					</div><br>
					<div class="part">
						<label>Sampai Tanggal </label>
						<input type="date"  name="tanggal_akhir" required="true" class="form-control">
					</div><br>
					<div class="part">
						<label>Paket</label>
                     	<select name="nama_paket" id="nama_paket" onchange='changeValue(this.value)' required class="form-control">  
                     		<option>pilih paket</option>
                    	    <?php   
                        		$query  = mysqli_query($koneksi, "SELECT * FROM paket ORDER BY nama_paket esc");  
                          		$result = mysqli_query($koneksi, "SELECT * FROM paket");  
                          		$harga  = "var harga = new Array();\n;";  
         
                          		while ($row = mysqli_fetch_array($result)) {  
                              		echo '<option name="nama_paket" value="'.$row['nama_paket'] . '">' . $row['nama_paket'] . '</option>';   
                         			$harga .= "harga['" . $row['nama_paket'] . "'] = {harga:'" . addslashes($row['harga'])."'};\n";  
                     			}
                          	?>  
                    	</select>
                 	</div><br>
                 	<div class="part">
						<label>Warna</label>
                     	<select name="warna" id="warna" required="ture" class="form-control">  
                     		<option>pilih warna</option>
                     		<option>Putih Merah</option>
                     		<option>putih Moca</option>
                     		<option>putih ungu</option>
                     		<option>putih pink</option>
                     		<option>putih</option>
                    	</select>
                 	</div>
					<div class="part">
						<label for="nama" style="padding-top: 20px">Harga</label>
						<input type="text" name="harga" id="harga" readonly class="form-control">
					</div><br>
						
					<script type="text/javascript">   
                        <?php   
                        	echo $harga;   
                        ?>  
                          	function changeValue(id){  
                            	document.getElementById('harga').value = harga[id].harga;  
                          	};   
                    </script>  

					<div class="part">
						<label>pesan</label>
						<textarea name="pesan" placeholder="masukan detail tambahan" class="form-control"></textarea>
					</div><br>
						<input type="submit" class="btn btn-primary" value="Submit">
				
					<a href="home.php?page=pesanan" class="btn btn-default">KEMBALI</a>
				</form>	
			</div>

			<div class="kalender-info">
			<h3>Informasi Tanggal&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar" style="color: grey;"></span></h3>
				<div id="calendar"></div>	
		</div>
		</div>

		<?php
			
			break;

		case 'savepaket':

        				if(isset($_POST['id_pengguna'])){
							$tanggal_awal	= $_POST['tanggal_awal'];

							$pemesanan = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tanggal_awal='".$_POST['tanggal_awal']."' OR tanggal_akhir='".$_POST['tanggal_akhir']."'");
							$cek_data=mysqli_num_rows($pemesanan);

								if ($cek_data > 0) {
									echo "<script>alert('Tanggal tersebut Sudah terpesan , Silahkan Pilih tanggal lain');  document.location='home.php?page=pesanan';</script>";
								}else{

									$nama			= $_POST['id_pengguna'];
									$notelp			= $_POST['notelp'];
									$nama_paket		= $_POST['nama_paket'];
									$alamat 		= $_POST['alamat'];
									$tanggal_awal	= $_POST['tanggal_awal'];
									$tanggal_akhir	= $_POST['tanggal_akhir'];
									$harga 			= $_POST['harga'];
									$pesan			= $_POST['pesan'];
									$warna			= $_POST['warna'];


										$query=mysqli_query($koneksi, "INSERT INTO transaksi (id_pengguna,notelp,paket,alamat,tanggal_awal,tanggal_akhir,harga,pesan,warna) VALUES ('".$nama."','".$notelp."','".$nama_paket."','".$alamat."','".$tanggal_awal."','".$tanggal_akhir."','".$harga."','".$pesan."','".$warna."')");

										echo "<script>alert('Data berhasil di simpan , Silahkan konfirmasi pemesanan'); document.location='home.php?page=pesanan';</script>";
								}
							}
			
			break;

		case 'editpaket':

		$query=mysqli_query($koneksi,"SELECT * FROM transaksi WHERE id_transaksi='".$_GET['id']."'");
$data=mysqli_fetch_array($query);
?>
<div class="container">

			<div class="form-pemesanan">
				<h3 style="padding-bottom: 10px;">Pemesanan Paket</h3>
				<form action="home.php?page=pesanan&action=updatepaket" method="post">
					<input type="hidden" name="id" value="<?=$data['id_transaksi']?>" class="form-control">
					<div class="part">
						<label for="nama">Nama</label>
						<input type="text"  placeholder="Masukan nama lengkap" name="id_pengguna" required="true" value="<?=$data['id_pengguna'];?>" class="form-control" readonly>
					</div><br>
					<div class="part">
						<label for="notelp">No. Telp</label>
						<input type="text" placeholder="Masukan No Telpon" name="notelp" required="true"  value="<?=$data['notelp'];?>" class="form-control" readonly>
					</div><br>
					
					<div class="part">
						<label>Alamat</label>
						<textarea name="alamat" required="true" placeholder="masukan alamat" class="form-control" readonly><?=$data['alamat']?></textarea>
					</div><br>
					<div class="part">
						<label >Dari Tanggal</label>
						<input type="date"  name="tanggal_awal" required="true" class="form-control" value="<?=$data['tanggal_awal']?>">
					</div><br>
					<div class="part">
						<label>Sampai Tanggal </label>
						<input type="date"  name="tanggal_akhir" required="true" class="form-control" value="<?=$data['tanggal_akhir']?>">
					</div><br>
					<div class="part">
						<label>Paket</label>
                     	<select name="nama_paket" id="nama_paket" onchange='changeValue(this.value)' required class="form-control">  
                     		<option value="<?=$data['paket']?>"><?=$data['paket']?></option>
                    	    <?php   
                        		$query  = mysqli_query($koneksi, "SELECT * FROM paket ORDER BY nama_paket esc");  
                          		$result = mysqli_query($koneksi, "SELECT * FROM paket");  
                          		$harga  = "var harga = new Array();\n;";  
         
                          		while ($row = mysqli_fetch_array($result)) {  
                              		echo '<option name="nama_paket" value="'.$row['nama_paket'] . '">' . $row['nama_paket'] . '</option>';   
                         			$harga .= "harga['" . $row['nama_paket'] . "'] = {harga:'" . addslashes($row['harga'])."'};\n";  
                     			}
                          	?>  
                    	</select>
                 	</div>
                 	<div class="part">
						<label>Warna</label>
                     	<select name="warna" id="warna" required="ture" class="form-control">  
                     		<option value="<?=$data['warna']?>"><?=$data['warna']?></option>
                     		<option>Putih Merah</option>
                     		<option>putih Moca</option>
                     		<option>putih ungu</option>
                     		<option>putih pink</option>
                     		<option>putih</option>
                    	</select>
                 	</div>
					<div class="part">
						<label for="nama" style="padding-top: 20px">Harga</label>
						<input type="text" name="harga" id="harga" readonly class="form-control" value="<?=$data['harga']?>">
					</div><br>

						
					<script type="text/javascript">   
                        <?php   
                        	echo $harga;   
                        ?>  
                          	function changeValue(id){  
                            	document.getElementById('harga').value = harga[id].harga;  
                          	};   
                    </script>  

					<div class="part">
						<label>pesan</label>
						<textarea name="pesan" placeholder="masukan detail tambahan" class="form-control"><?=$data['pesan']?></textarea>
					</div><br>
					<label>Keterangan :</label>
					<select name="keterangan" class="form-control" required="true">
						<option value="<?=$data['id_keterangan']?>"><?=$data['id_keterangan']?></option>
						<option value="LUNAS">LUNAS</option>
						<option value="BELUM LUNAS">BELUM LUNAS</option>
					</select>
					<br>
					<input type="submit" class="btn btn-primary" value="Submit">
					<a href="home.php?page=pesanan" class="btn btn-default">KEMBALI</a>
				</form>	
			</div>
			<div class="kalender-info">
			<h3>Informasi Tanggal&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar" style="color: grey;"></span></h3>
				<div id="calendar"></div>	
		</div>
		</div>

	<?php
			break;

		case 'updatepaket':

		if (isset($_POST['id'])) {

				$nama_paket		= $_POST['nama_paket'];
				$tanggal_awal	= $_POST['tanggal_awal'];
				$tanggal_akhir	= $_POST['tanggal_akhir'];
				$harga 			= $_POST['harga'];
				$pesan			= $_POST['pesan'];
				$warna			= $_POST['warna'];
				$keterangan 	= $_POST['keterangan'];

				$query=mysqli_query( $koneksi, "UPDATE transaksi SET paket ='".$nama_paket."', warna ='".$warna."' , tanggal_awal ='".$tanggal_awal."' , tanggal_akhir ='".$tanggal_akhir."' , harga ='".$harga."' , pesan ='".$pesan."' , id_keterangan ='".$keterangan."' WHERE id_transaksi ='".$_POST['id']."'");
				if ($query) {
					echo "<script>document.location='home.php?page=pesanan';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=pesanan&action=editpaket&id=".$_POST['id']."';</script>";
				}
			}

			break;

		case 'hapuspaket':

		$query=mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi='".$_GET['id']."'");
				if ($query) {
					echo "<script>document.location='home.php?page=pesanan';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=pesanan;</script>";
				}
			
			break;

		case 'addsatuan':

		?>
		<div style="width: 100%;">
		
			<div class="form-pemesanan" style="width: 50%; float: left;">
				<h3>Pemesanan Satuan</h3>
				<form action="home.php?page=pesanan&action=savesatuan" method="post" class="p_satuan">
					<div class="part">
						<label for="nama">Nama</label>
						<input type="text"  placeholder="Masukan nama lengkap" name="id_pengguna" required="true"  class="form-control">
					</div><br>
					<div class="part">
						<label for="notelp">No. Telp</label>
						<input type="text" placeholder="Masukan No Telpon" name="notelp" required="true" class="form-control">
					</div>

					<div class="part">
						<label>Alamat</label>
						<textarea name="alamat" required="true" placeholder="masukan alamat" class="form-control"></textarea>
					</div><br>
					<div class="part">
						<label >Dari Tanggal</label>
						<input type="date"  name="tanggal_awal" required="true" class="form-control">
					</div><br>
					<div class="part">
						<label>Sampai Tanggal </label>
						<input type="date"  name="tanggal_akhir" required="true" class="form-control">
					</div>
					<br><br>

					<div class="part">
						<label style="font-size: 18px; color: blue;">Pilih Tenda</label><br>
						<label>Tenda 4x4</label>
						<p>harga 1 set =</p>
						<input type="number" placeholder="Masukan Jumlah" name="tenda4x4"  value="0" id="tenda4x4" class="form-control">
					</div>
					<div class="part">
						<?php
							$query=mysqli_query($koneksi,"SELECT * FROM tenda where id_tenda=02");
							$data=mysqli_fetch_assoc($query);
						?>			
						<input type="hidden" placeholder="Masukan Jumlah" name="harga4x4" id="harga4x4" value="<?=$data['harga']?>" class="form-control">
					</div><br>
					<div class="part">
						<label>Tenda 8x8</label>
						<p>harga 1 set =</p>
						<input type="number" placeholder="Masukan Jumlah" name="tenda8x8"  value="0" id="tenda8x8" class="form-control">
					</div>
					<div class="part">
						<?php
							$query=mysqli_query($koneksi,"SELECT * FROM tenda where id_tenda=03");
							$data=mysqli_fetch_assoc($query);
						?>
							
						<input type="hidden" placeholder="Masukan Jumlah" name="harga8x8" id="harga8x8" value="<?=$data['harga']?>" class="form-control">
					</div><br>
					<div class="part">
						<label for="notelp">Tenda Sisir</label>
						<p>harga 1 set =</p>
						<input type="number" placeholder="Masukan Jumlah" name="tendasisir" value="0" id="tendasisir" class="form-control">
					</div>
					<div class="part">
						<?php
							$query=mysqli_query($koneksi,"SELECT * FROM tenda where id_tenda=01");
							$data=mysqli_fetch_assoc($query);
						?>
	
						<input type="hidden" placeholder="Masukan Jumlah" name="hargasisir" id="hargasisir" value="<?=$data['harga']?>" class="form-control" >
					</div><br><br>

					<div class="part">
						<label style="padding-top: 20px">Warna</label>
						<input type="text" name="warna" id="" class="form-control">
					</div><br>

					<div class="part">
						<label>Harga</label>
						<input type="text" name="harga" id="Jumlah" readonly class="form-control">
					</div><br>
					<div class="part">
						<label>pesan</label>
						<textarea name="pesan" placeholder="masukan detail tambahan" class="form-control"></textarea>
					</div><br>
						<input type="submit" class="btn btn-primary" value="Submit">
						<a href="home.php?page=pesanan" class="btn btn-default">KEMBALI</a>

							<script type="text/javascript" src="../assets/jquery-3.6.0.min.js"></script>
							<script type="text/javascript">
								$(".p_satuan").keyup(function(){
									var tenda4x4 = parseInt($("#tenda4x4").val()) 
									var harga4x4 = parseInt($("#harga4x4").val()) 
									var tenda8x8 = parseInt($("#tenda8x8").val()) 
									var harga8x8 = parseInt($("#harga8x8").val()) 
									var tendasisir = parseInt($("#tendasisir").val()) 
									var hargasisir = parseInt($("#hargasisir").val()) 

									var Jumlah = (tenda4x4*harga4x4)+(tenda8x8*harga8x8)+(tendasisir*hargasisir);
									$("#Jumlah").attr("value",Jumlah)
								})
							</script>
				</form>
			</div>

				<div class="kalender-info-satuan">
			<h3>Informasi Tanggal&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar" style="color: grey;"></span></h3>
				<div id="calendar"></div>	
		</div>
	</div>
		<?php
			
			break;

		case 'savesatuan':

							if(isset($_POST['id_pengguna'])){
							$tanggal_awal_satuan	= $_POST['tanggal_awal'];

							$pemesanan_satuan = mysqli_query($koneksi, "SELECT * FROM transaksi_satuan WHERE tanggal_awal='".$_POST['tanggal_awal']."' OR tanggal_akhir='".$_POST['tanggal_akhir']."'");
							$cek_data_satuan=mysqli_num_rows($pemesanan_satuan);

								if ($cek_data_satuan > 0) {
									echo "<script>alert('Tanggal tersebut Sudah terpesan , Silahkan Pilih tanggal lain');  document.location='home.php?page=pesanan';</script>";
								}else{

									$nama			= $_POST['id_pengguna'];
									$notelp			= $_POST['notelp'];
									$alamat 		= $_POST['alamat'];
									$tanggal_awal	= $_POST['tanggal_awal'];
									$tanggal_akhir	= $_POST['tanggal_akhir'];
									$tenda4x4		= $_POST['tenda4x4'];
									$tenda8x8		= $_POST['tenda8x8'];
									$tendasisir 	= $_POST['tendasisir'];
									$warna			= $_POST['warna'];
									$harga 			= $_POST['harga'];
									$pesan			= $_POST['pesan'];

										$query=mysqli_query($koneksi, "INSERT INTO transaksi_satuan (id_pengguna,notelp,alamat,tanggal_awal,tanggal_akhir,tenda4x4,tenda8x8,tendasisir,warna,harga,pesan) VALUES ('".$nama."','".$notelp."','".$alamat."','".$tanggal_awal."','".$tanggal_akhir."','".$tenda4x4."','".$tenda8x8."','".$tendasisir."','".$warna."','".$harga."','".$pesan."')");

										echo "<script>alert('Data berhasil di simpan , Silahkan konfirmasi pemesanan'); document.location='home.php?page=pesanan';</script>";
								}
							}
			
			break;

		case 'editsatuan':

		$query=mysqli_query($koneksi,"SELECT * FROM transaksi_satuan WHERE id_transaksis ='".$_GET['id']."'");
		$data=mysqli_fetch_assoc($query);
?>
	<div style="width: 100%;">
		
			<div class="form-pemesanan" style="width: 50%; float: left;">
				<h3>Pemesanan Satuan</h3>
				<form action="home.php?page=pesanan&action=updatesatuan" method="post" class="p_satuan">
					<input type="hidden" name="id" value="<?=$data['id_transaksis']?>" class="form-control">
					<div class="part">
						<label for="nama">Nama</label>
						<input type="text"  placeholder="Masukan nama lengkap" name="id_pengguna" required="true"  class="form-control" value="<?=$data['id_pengguna']?>" readonly>
					</div><br>
					<div class="part">
						<label for="notelp">No. Telp</label>
						<input type="text" placeholder="Masukan No Telpon" name="notelp" required="true" class="form-control" value="<?=$data['notelp']?>" readonly>
					</div>

					<div class="part">
						<label>Alamat</label>
						<textarea name="alamat" required="true" placeholder="masukan alamat" readonly class="form-control"><?=$data['alamat']?></textarea>
					</div><br>
					<div class="part">
						<label >Dari Tanggal</label>
						<input type="date"  name="tanggal_awal" required="true" class="form-control" value="<?=$data['tanggal_awal']?>">
					</div><br>
					<div class="part">
						<label>Sampai Tanggal </label>
						<input type="date"  name="tanggal_akhir" required="true" class="form-control" value="<?=$data['tanggal_akhir']?>">
					</div>
					<br><br>

					<div class="part">
						<label style="font-size: 18px; color: blue;">Pilih Tenda</label><br>
						<label>Tenda 4x4</label>
						<p>harga 1 set =</p>
						<input type="number" placeholder="Masukan Jumlah" name="tenda4x4"  value="<?=$data['tenda4x4']?>" id="tenda4x4" class="form-control">
					</div>
					<div class="part">
						<label>Tenda 8x8</label>
						<p>harga 1 set =</p>
						<input type="number" placeholder="Masukan Jumlah" name="tenda8x8"  value="<?=$data['tenda8x8']?>" id="tenda8x8" class="form-control">
					</div>
					<div class="part">
						<label for="notelp">Tenda Sisir</label>
						<p>harga 1 set =</p>
						<input type="number" placeholder="Masukan Jumlah" name="tendasisir" value="<?=$data['tendasisir']?>" id="tendasisir" class="form-control">
					</div>

					<div class="part">
						<label style="padding-top: 20px">Warna</label>
						<input type="text" name="warna" id="" class="form-control" value="<?=$data['warna']?>">
					</div><br>

					<div class="part">
						<label>Harga</label>
						<input type="text" name="harga" id="Jumlah" readonly class="form-control"  value="<?=$data['harga']?>">
					</div><br>
					<div class="part">
						<label>pesan</label>
						<textarea name="pesan" placeholder="masukan detail tambahan" class="form-control"><?=$data['pesan']?></textarea>
					</div><br>
					<label>Keterangan :</label>
					<select name="keterangan" class="form-control" required="true">
						<option value="<?=$data['keterangan']?>"><?=$data['keterangan']?></option>
						<option value="LUNAS">LUNAS</option>
						<option value="BELUM LUNAS">BELUM LUNAS</option>
					</select>
					<br>
					<input type="submit" class="btn btn-primary" value="Submit">
						<a href="home.php?page=pesanan" class="btn btn-default">KEMBALI</a>
					<div class="part">
						<?php
							$query=mysqli_query($koneksi,"SELECT * FROM tenda where id_tenda=02");
							$data=mysqli_fetch_assoc($query);
						?>			
						<input type="hidden" placeholder="Masukan Jumlah" name="harga4x4" id="harga4x4" value="<?=$data['harga']?>" class="form-control">
					</div>
					
					<div class="part">
						<?php
							$query=mysqli_query($koneksi,"SELECT * FROM tenda where id_tenda=03");
							$data=mysqli_fetch_assoc($query);
						?>
							
						<input type="hidden" placeholder="Masukan Jumlah" name="harga8x8" id="harga8x8" value="<?=$data['harga']?>" class="form-control">
					</div>
					<div class="part">
						<?php
							$query=mysqli_query($koneksi,"SELECT * FROM tenda where id_tenda=01");
							$data=mysqli_fetch_assoc($query);
						?>
	
						<input type="hidden" placeholder="Masukan Jumlah" name="hargasisir" id="hargasisir" value="<?=$data['harga']?>" class="form-control" >
					</div><br><br>

							<script type="text/javascript" src="../assets/jquery-3.6.0.min.js"></script>
							<script type="text/javascript">
								$(".p_satuan").keyup(function(){
									var tenda4x4 = parseInt($("#tenda4x4").val()) 
									var harga4x4 = parseInt($("#harga4x4").val()) 
									var tenda8x8 = parseInt($("#tenda8x8").val()) 
									var harga8x8 = parseInt($("#harga8x8").val()) 
									var tendasisir = parseInt($("#tendasisir").val()) 
									var hargasisir = parseInt($("#hargasisir").val()) 

									var Jumlah = (tenda4x4*harga4x4)+(tenda8x8*harga8x8)+(tendasisir*hargasisir);
									$("#Jumlah").attr("value",Jumlah)
								})
							</script>
				</form>
			</div>

				<div class="kalender-info-satuan">
			<h3>Informasi Tanggal&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar" style="color: grey;"></span></h3>
				<div id="calendar"></div>	
		</div>
	</div>

	<?php
			break;

		case 'updatesatuan':


		if (isset($_POST['id'])) {

				$tanggal_awal	= $_POST['tanggal_awal'];
				$tanggal_akhir	= $_POST['tanggal_akhir'];
				$tenda4x4		= $_POST['tenda4x4'];
				$tenda8x8		= $_POST['tenda8x8'];
				$tendasisir 	= $_POST['tendasisir'];
				$warna			= $_POST['warna'];
				$harga 			= $_POST['harga'];
				$pesan			= $_POST['pesan'];
				$keterangan 	= $_POST['keterangan'];

				$query=mysqli_query( $koneksi, "UPDATE transaksi_satuan SET  
					tanggal_awal ='".$tanggal_awal."' , 
					tanggal_akhir ='".$tanggal_akhir."' ,
					tenda4x4 ='".$tenda4x4."' ,
					tenda8x8 ='".$tenda8x8."' ,
					tendasisir ='".$tendasisir."', 
					warna ='".$warna."' , 
					harga ='".$harga."' , 
					pesan ='".$pesan."' ,
					keterangan ='".$keterangan."'
					 WHERE id_transaksis ='".$_POST['id']."'");
				if ($query) {
					echo "<script>document.location='home.php?page=pesanan';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=pesanan&action=editsatuan&id=".$_POST['id']."';</script>";
				}
			}
			
			break;

		case 'hapussatuan':

		$query=mysqli_query($koneksi, "DELETE FROM transaksi_satuan WHERE id_transaksis='".$_GET['id']."'");
				if ($query) {
					echo "<script>document.location='home.php?page=pesanan';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=pesanan;</script>";
				}
			
			break;
		}
?>

</section>


<link rel="stylesheet" type="text/css" href="../assets/fullcalendar-5.11.0/main.css">

<script src="../assets/fullcalendar-5.11.0/main.js"></script>

<script>
	document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events : [ 
				<?php
					$data = mysqli_query($koneksi,'SELECT * FROM transaksi');
    				while($d = mysqli_fetch_array($data)){  
    				$akhir = strtotime("+1 day", strtotime($d['tanggal_akhir']));   
				?>
						{
    						title: '<?php echo 'penuh'; ?>', //menampilkan title dari tabel
  							start: '<?php echo $d['tanggal_awal']; ?>', //menampilkan tgl mulai dari tabel
  							end: '<?php echo date("Y-m-d", $akhir); ?>' //menampilkan tgl selesai dari tabel
						},
				<?php 
					} 
				?>
                    ],
        	selectOverlap: function (event) {
            	return event.rendering == 'background';
        	}
    	});
        calendar.render();
    });
	</script>

