<section class="paket" style="height: 80vh; background-color: white">
<div class="container">	

<?php 	

switch ($_GET['action']) {

	default:
?>
<h3>Daftar Paket</h3>
<br>
<div>
	<div style="padding-right: 10px; float: left;">
		<a href="home.php?page=paket&action=add" class="btn btn-sm btn-primary" style=""><span class="glyphicon glyphicon-plus"></span>Tambah Paket</a>
	</div>
	<div>

<?php
	if(isset($_POST['cari_t'])){
		$carit =$_POST['cari_tenda'];
		$tampiltenda = mysqli_query($koneksi, "SELECT * FROM paket WHERE nama_paket LIKE '%".$carit."%'");	
	}else{
		$tampiltenda=mysqli_query($koneksi," SELECT * FROM paket ORDER BY kode_paket ASC ");
	}
?>

		<form method="POST" action="">
			<input type="text" name="cari_tenda" class="form-control" placeholder="cari Paket" style="width: 300px; float: left;" value="<?php echo $carit;?>">
			<input type="submit" value="cari" name="cari_t" class="btn btn-info">
		</form>
	</div>
</div>


				<br>
<div class="table-responsive" style="border-bottom:1px solid; border-color: silver; padding-bottom: 20px;">
<table class="table table-bordered table-striped">
	<thead>
		<th>Kode</th>
		<th>Nama Paket</th>
		<th>Harga sewa</th>

		<th></th>
	</thead>
	<tbody>
		<?php

			while ($data=mysqli_fetch_assoc($tampiltenda)) {
		?>
		<tr>
			<td><?php echo $data["kode_paket"]; ?></td>
			<td><?php echo $data["nama_paket"]; ?></td>
			<td><?php echo $data["harga"]; ?></td>
			<td>
				
				<a href="home.php?page=paket&action=edit&id=<?=$data['kode_paket'];?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span>Ubah</a>

				<a href="home.php?page=paket&action=hapus&id=<?=$data['kode_paket'];?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span>Hapus</a>
			</td>
		</tr>
		<?php
		}
		?>
</tbody>
</table>
</div>
<br>

<?php
			break;

		case 'add':

		?>
		<h3>Tambah Paket</h3>
		<br>
		<form method="POST" action="home.php?page=paket&action=savetenda" style="width: 600px;" >
			<label>Kode</label>
			<input type="text" name="kode" class="form-control" required="true">
			<label>nama paket</label>
			<input type="text" name="nama" class="form-control">
			<label>Harga</label>
			<input type="text" name="harga" class="form-control" required="true">
			<br>
			<button type="submit" class="btn btn-primary">SIMPAN</button>
			<a href="home.php?page=paket" class="btn btn-default">KEMBALI</a>
		</form>
		<?php
			
			break;

		case 'save':

		if (isset($_POST['kode'])) {
				$kode_paket = $_POST['kode'];
				$harga = $_POST['harga'];
				$nama_paket = $_POST['nama'];
				$query=mysqli_query($koneksi, "INSERT INTO paket (kode_paket,nama_paket,harga) VALUES ('".$kode_paket."','".$nama_paket."','".$harga."')");

				if ($query) {
					echo "<script>document.location='home.php?page=paket';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=paket&action=addtenda';</script>";
				}
			}
			
			break;

		case 'edit':

		$query=mysqli_query($koneksi,"SELECT * FROM paket WHERE kode_paket='".$_GET['id']."'");
$data=mysqli_fetch_array($query);
?>
	<form method="POST" action="home.php?page=paket&action=update"
		enctype="multipart/form-data">
			<label>Kode</label>
			<input type="text" name="id" class="form-control" required="true" value="<?=$data['kode_paket']?>" readonly>
			<label>nama paket</label>
			<input type="text" name="nama" class="form-control" value="<?=$data['nama_paket']?>">
			<label>Harga</label>
			<input type="text" name="harga" class="form-control" required="true" value="<?=$data['harga']?>">
			<br>
			<button type="submit" class="btn btn-primary">SIMPAN</button>
			<a href="home.php?page=paket" class="btn btn-default">KEMBALI</a>
		</form>

	<?php
			break;

		case 'update':

		if (isset($_POST['id'])) {
				$harga = $_POST['harga'];
				$nama_paket = $_POST['nama'];
				$query=mysqli_query( $koneksi, "UPDATE paket SET harga ='".$harga."' , nama_paket ='".$nama_paket."' WHERE kode_paket ='".$_POST['id']."'");
				if ($query) {
					echo "<script>document.location='home.php?page=paket';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=paket&action=edit&id=".$_POST['id']."';</script>";
				}
			}

			break;

		case 'hapus':

		$query=mysqli_query($koneksi, "DELETE FROM paket WHERE kode_paket='".$_GET['id']."'");
				if ($query) {
					echo "<script>document.location='home.php?page=paket';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=paket;</script>";
				}
			
			break;
	}?>
</div>
</section>