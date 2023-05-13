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

				<form action="../cetakpelanggan.php" method="post">
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
						<textarea name="alamat" required="true" placeholder="masukan alamat"><?=$data['alamat'];?></textarea>
					</div><br>
					<div class="part">
						<label >Dari Tanggal</label>
						<input type="date"  name="tanggal_awal" required="true" >
					</div><br>
					<div class="part">
						<label>Sampai Tanggal </label>
						<input type="date"  name="tanggal_akhir" required="true" >
					</div><br>
					<div class="part">
						<?php 
								$query_paket=mysqli_query($koneksi,"SELECT * FROM paket WHERE kode_paket='".$_GET['id']."'");
								$data_paket=mysqli_fetch_array($query_paket);
						?>
						<input type="hidden" name="id" value="<?=$data_paket['kode_paket']?>" class="form-control">
						<label>Paket</label>
                     	<select name="nama_paket" id="nama_paket" class="part" onchange='changeValue(this.value)' required >  
                     		<option value="<?=$data_paket['nama_paket']?>"><?=$data_paket['nama_paket']?></option>
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
                     	<select name="warna" id="warna" required="true">  
                     		<option>Pilih</option>
                     		<option>Putih Merah</option>
                     		<option>putih Moca</option>
                     		<option>putih ungu</option>
                     		<option>putih pink</option>
                     		<option>putih</option>
                    	</select>
                 	</div><br>
					<div class="part">
						<label for="nama" style="padding-top: 20px">Harga</label>
						<input type="text" name="harga" id="harga" readonly value="<?=$data_paket['harga']?>">
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
				</form>	
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