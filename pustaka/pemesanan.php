<link rel="stylesheet" type="text/css" href="../assets/css/stylepemesanan.css"/> 
<link rel="stylesheet" type="text/css" href="../assets/fullcalendar-5.11.0/main.css">
<script src="../assets/moment.min.js"></script>
<script src="../assets/fullcalendar-5.11.0/main.js"></script>
<script src="../assets/script.js"></script>
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
    						title: '<?php echo $d['paket']; ?>', //menampilkan title dari tabel
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
<section class="pemesanan">
	<div class="container">
			<div class="header">
				<h3>Form Pemesanan</h3>
			</div>
			<div class="content">

<?php

			switch ($_GET['action']) {

			default:
?>

			<div class="form-pemesanan">
				<h3 style="padding-bottom: 10px;">Pemesanan Paket</h3>
				<?php
					$query=mysqli_query($koneksi,"SELECT * FROM pengguna INNER JOIN level on pengguna.id_level=level.id_level WHERE username = '$username'");
					$data=mysqli_fetch_array($query);
				?>

				<form action="" method="post">
				<?php
				$query=mysqli_query($koneksi,"SELECT * FROM pengguna INNER JOIN level on pengguna.id_level=level.id_level WHERE username = '$username'");
				$data=mysqli_fetch_array($query);
				?>
					<div class="part">
						<label for="nama">Nama</label>
						<input type="text"  placeholder="Masukan nama lengkap" name="id_pengguna" required="true" value="<?=$data['nama_pengguna'];?>">
					</div><br>
					<div class="part">
						<label for="notelp">No. Telp</label>
						<input type="text" placeholder="Masukan No Telpon" name="notelp" required="true"  value="<?=$data['notelp'];?>" >
					</div><br>
					
					<div class="part">
						<label>Alamat</label>
						<textarea name="alamat" required="true" placeholder="masukan alamat"></textarea>
					</div><br>
					<div class="part">
						<label >Dari Tanggal</label>
						<input type="date"  name="tanggal_awal" required="true" >
					</div><br>
					<div class="part">
						<label>Sampai Tanggal </label>
						<input type="date"  name="tanggal_akhir" required="true" >
					</div>
					<div class="part">
						<label>Paket</label>
                     	<select name="nama_paket" id="nama_paket" class="part" onchange='changeValue(this.value)' required >  
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
						<label for="nama" style="padding-top: 20px">Harga</label>
						<input type="text" name="harga" id="harga" readonly>
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
						<textarea name="pesan" placeholder="masukan detail tambahan"></textarea>
					</div><br>
						<input type="submit" class="btn btn-primary" value="Submit">
							
						<?php
							if(isset($_POST['id_pengguna'])){
							$tanggal_awal	= $_POST['tanggal_awal'];

							$pemesanan = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tanggal_awal='".$_POST['tanggal_awal']."' OR tanggal_akhir='".$_POST['tanggal_akhir']."'");
							$cek_data=mysqli_num_rows($pemesanan);

								if ($cek_data > 0) {
									echo "<script>alert('Tanggal tersebut Sudah terpesan , Silahkan Pilih tanggal lain');  document.location='home.php?page=pemesanan';</script>";
								}else{

									$nama			= $_POST['id_pengguna'];
									$notelp			= $_POST['notelp'];
									$nama_paket		= $_POST['nama_paket'];
									$alamat 		= $_POST['alamat'];
									$tanggal_awal	= $_POST['tanggal_awal'];
									$tanggal_akhir	= $_POST['tanggal_akhir'];
									$harga 			= $_POST['harga'];
									$pesan			= $_POST['pesan'];

										$query=mysqli_query($koneksi, "INSERT INTO transaksi (id_pengguna,notelp,paket,alamat,tanggal_awal,tanggal_akhir,harga,pesan) VALUES ('".$nama."','".$notelp."','".$nama_paket."','".$alamat."','".$tanggal_awal."','".$tanggal_akhir."','".$harga."','".$pesan."')");

										echo "<script>alert('Data berhasil di simpan , Silahkan konfirmasi pemesanan'); document.location='home.php?page=pemesanan';</script>";
								}
							}?>

					<a href="home.php?page=pemesanan&action=pesan_satuan" style="padding-left: 325px;">sewa tenda satuan ?</a>
				</form>	
			</div>
<?php
			break;

		case 'pesan_satuan':

?>
		<h3>Pemesanan Satuan</h3>
			<div class="form-pemesanan">
				<form action="" method="post" class="p_satuan">
					<?php 
						$query=mysqli_query($koneksi,"SELECT * FROM pengguna INNER JOIN level on pengguna.id_level=level.id_level WHERE username = '$username'");
						$data=mysqli_fetch_array($query);
					?>
					<div class="part">
						<label for="nama">Nama</label>
						<input type="text"  placeholder="Masukan nama lengkap" name="id_pengguna" required="true" value="<?=$data['nama_pengguna'];?>">
					</div><br>
					<div class="part">
						<label for="notelp">No. Telp</label>
						<input type="text" placeholder="Masukan No Telpon" name="notelp" required="true"  value="<?=$data['notelp'];?>" >
					</div>

					<div class="part">
						<label>Alamat</label>
						<textarea name="alamat" required="true" placeholder="masukan alamat"></textarea>
					</div><br>
					<div class="part">
						<label >Dari Tanggal</label>
						<input type="date"  name="tanggal_awal" required="true" >
					</div><br>
					<div class="part">
						<label>Sampai Tanggal </label>
						<input type="date"  name="tanggal_akhir" required="true" >
					</div>
					<br><br>

					<div class="part">
						<label style="font-size: 18px; color: blue;">Pilih Tenda</label><br>
						<label>Tenda 4x4</label>
						<p>harga 1 set =</p>
						<input type="text" placeholder="Masukan Jumlah" name="tenda4x4"  value="0" id="tenda4x4">
					</div>
					<div class="part">
						<?php
							$query=mysqli_query($koneksi,"SELECT * FROM tenda where id_tenda=02");
							$data=mysqli_fetch_assoc($query);
						?>			
						<input type="hidden" placeholder="Masukan Jumlah" name="harga4x4" id="harga4x4" value="<?=$data['harga']?>" >
					</div><br>
					<div class="part">
						<label>Tenda 8x8</label>
						<p>harga 1 set =</p>
						<input type="text" placeholder="Masukan Jumlah" name="tenda8x8"  value="0" id="tenda8x8">
					</div>
					<div class="part">
						<?php
							$query=mysqli_query($koneksi,"SELECT * FROM tenda where id_tenda=03");
							$data=mysqli_fetch_assoc($query);
						?>
							
						<input type="hidden" placeholder="Masukan Jumlah" name="harga8x8" id="harga8x8" value="<?=$data['harga']?>" >
					</div><br>
					<div class="part">
						<label for="notelp">Tenda Sisir</label>
						<p>harga 1 set =</p>
						<input type="text" placeholder="Masukan Jumlah" name="tendasisir" value="0" id="tendasisir">
					</div>
					<div class="part">
						<?php
							$query=mysqli_query($koneksi,"SELECT * FROM tenda where id_tenda=01");
							$data=mysqli_fetch_assoc($query);
						?>
	
						<input type="hidden" placeholder="Masukan Jumlah" name="hargasisir" id="hargasisir" value="<?=$data['harga']?>">
					</div><br><br>

					<div class="part">
						<label style="padding-top: 20px">Warna</label>
						<input type="text" name="warna" id="">
					</div><br>

					<div class="part">
						<label>Harga</label>
						<input type="text" name="harga" id="Jumlah" readonly>
					</div><br>
					<div class="part">
						<label>pesan</label>
						<textarea name="pesan" placeholder="masukan detail tambahan"></textarea>
					</div><br>
						<input type="submit" class="btn btn-primary" value="Submit">

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

				<?php
							if(isset($_POST['id_pengguna'])){
							$tanggal_awal	= $_POST['tanggal_awal'];

							$pemesanan = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tanggal_awal='".$_POST['tanggal_awal']."' OR tanggal_akhir='".$_POST['tanggal_akhir']."'");
							$cek_data=mysqli_num_rows($pemesanan);

								if ($cek_data > 0) {
									echo "<script>alert('Tanggal tersebut Sudah terpesan , Silahkan Pilih tanggal lain');  document.location='home.php?page=pemesanan';</script>";
								}else{

									$nama			= $_POST['id_pengguna'];
									$notelp			= $_POST['notelp'];
									$nama_paket		= $_POST['nama_paket'];
									$alamat 		= $_POST['alamat'];
									$tanggal_awal	= $_POST['tanggal_awal'];
									$tanggal_akhir	= $_POST['tanggal_akhir'];
									$harga 			= $_POST['harga'];
									$pesan			= $_POST['pesan'];

										$query=mysqli_query($koneksi, "INSERT INTO transaksi (id_pengguna,notelp,paket,alamat,tanggal_awal,tanggal_akhir,harga,pesan) VALUES ('".$nama."','".$notelp."','".$nama_paket."','".$alamat."','".$tanggal_awal."','".$tanggal_akhir."','".$harga."','".$pesan."')");

										echo "<script>alert('Data berhasil di simpan , Silahkan konfirmasi pemesanan'); document.location='home.php?page=pemesanan';</script>";
								}
							}
					?>

			</div>
<?php
			break;
		}
?>		
<br>
			<div class="kalender-info">
				<h3>Informasi Tanggal&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar" style="color: grey;"></span></h3>
					<div id="calendar"></div>	
			</div>
		</div>
	</div>	
</div>
</section>