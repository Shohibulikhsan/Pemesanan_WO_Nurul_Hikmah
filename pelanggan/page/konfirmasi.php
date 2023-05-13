

<?php
include ('assets/koneksi.php');

			if ($_POST ['id_pengguna'] !=""){
				$nama = $_POST['id_pengguna'];
				$notelp = $_POST['notelp'];

				echo "NAMA : ".$nama."<br>";
				echo "NO TELP : ".$notelp;
				echo "<input type='submit' class='btn btn-primary'>";
			
							if(isset($_POST['id_pengguna'])){
							$tanggal_awal	= $_POST['tanggal_awal'];

							$pemesanan = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tanggal_awal='".$_POST['tanggal_awal']."' OR tanggal_akhir='".$_POST['tanggal_akhir']."'");
							$cek_data=mysqli_num_rows($pemesanan);

								if ($cek_data > 0) {
									echo "<script>alert('Tanggal tersebut Sudah terpesan , Silahkan Pilih tanggal lain');  document.location='home.php?page=pemesanan';</script>";
								}else{

									$nama			= $_POST['id_pengguna'];
									$notelp			= $_POST['notelp'];
									$alamat 		= $_POST['alamat'];
									$tanggal_awal	= $_POST['tanggal_awal'];
									$tanggal_akhir	= $_POST['tanggal_akhir'];
									$nama_paket		= $_POST['nama_paket'];
									$harga 			= $_POST['harga'];
									$pesan			= $_POST['pesan'];

										$query=mysqli_query($koneksi, "INSERT INTO transaksi (id_pengguna,notelp,alamat,tanggal_awal,tanggal_akhir,paket,harga,pesan) VALUES ('".$nama."','".$notelp."','".$alamat."','".$tanggal_awal."','".$tanggal_akhir."','".$nama_paket."','".$harga."','".$pesan."')");

										echo "<script>alert('pemesanan berhasil di simpan'); document.location='home.php?page=pemesanan;</script>";
								}
							}
							}?>