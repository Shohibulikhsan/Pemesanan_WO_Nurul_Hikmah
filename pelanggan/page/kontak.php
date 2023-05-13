<link rel="stylesheet" type="text/css" href="../assets/css/stylekontak.css"/>

<section class="kontak">
	<div class="container">
		<div class="judul">
			<h3>Kontak</h3>
		</div>
			<div class="container" style="width: 650px;">
				<form method="POST" action="">
					<div>
					<?php 
						$query=mysqli_query($koneksi,"SELECT * FROM pengguna INNER JOIN level on pengguna.id_level=level.id_level WHERE username = '$username'");
						$data=mysqli_fetch_array($query);
					?>
						<label>Nama Lengkap</label>
						<input type="text" name="nama" class="" required="true" value="<?=$data['nama_pengguna'];?>" readonly>
					</div>
<br>
					<div class="part">
						<label>penilaian</label>
						<select name="penilaian" required="true">
							<option>pilih</option>
							<option>sangat baik</option>
							<option>baik</option>
							<option>cukup</option>
							<option>kurang baik</option>
							<option>tidak baik</option>
						</select>
					</div>
<br>
					<div>
						<label>Pesan</label>
						<textarea name="pesan" class="" required="true" placeholder="Kritik dan Saran"></textarea>
					</div>
<br>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
<?php
			if (isset($_POST['nama'])) {
				$nama = $_POST['nama'];
				$penilaian = $_POST['penilaian'];
				$pesan = $_POST['pesan'];

				$query=mysqli_query($koneksi, "INSERT INTO penilaian (id_pengguna , i_penilaian , pesan) VALUES ('".$nama."','".$penilaian."','".$pesan."')");

				if ($query) {
					echo "<script>alert('pesan anda sudah tersimpan , terima kasih atas saran dan kritiknya');document.location='home.php?page=kontak';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=kontak';</script>";
				}
			}

?>

		</div>
	</div>
</section>