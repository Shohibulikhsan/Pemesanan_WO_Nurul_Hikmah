<link rel="stylesheet" type="text/css" href="../assets/css/stylebarang.css">
<section class="tenda">
	<div class="container">
		
<?php
	switch ($_GET['action']) {

default:

?> 

<h3>Daftar Tenda</h3>
<br>
<div>
	<div style="padding-right: 10px; float: left;">
		<a href="home.php?page=barang&action=addtenda" class="btn btn-sm btn-primary" style=""><span class="glyphicon glyphicon-plus"></span>Tambah Tenda</a>
	</div>
	<div>

<?php
	if(isset($_POST['cari_t'])){
		$carit =$_POST['cari_tenda'];
		$tampiltenda = mysqli_query($koneksi, "SELECT * FROM tenda a
											INNER JOIN jenis_tenda b ON a.id_jenis=b.id_jenis WHERE tenda_jenis LIKE '%".$carit."%'");	
	}else{
		$tampiltenda=mysqli_query($koneksi," SELECT * FROM tenda a
											INNER JOIN jenis_tenda b ON a.id_jenis=b.id_jenis
											ORDER BY id_tenda ASC ");
	}
?>

		<form method="POST" action="">
			<input type="text" name="cari_tenda" class="form-control" placeholder="cari jenis tenda" style="width: 300px; float: left;" value="<?php echo $carit;?>">
			<input type="submit" value="cari" name="cari_t" class="btn btn-info">
		</form>
	</div>
</div>


				<br>
<div class="table-responsive" style="border-bottom:1px solid; border-color: silver; padding-bottom: 20px;">
<table class="table table-bordered table-striped">
	<thead>
		<th>Kode</th>
		<th>Jenis Tenda</th>
		<th>Satuan</th>
		<th>Harga sewa</th>
		<th>Stok</th>

		<th></th>
	</thead>
	<tbody>
		<?php

			while ($data=mysqli_fetch_assoc($tampiltenda)) {
		?>
		<tr>
			<td><?php echo $data["id_tenda"]; ?></td>
			<td><?php echo $data["tenda_jenis"]; ?></td>
			<td><?php echo $data["satuan"]; ?></td>
			<td><?php echo $data["harga"]; ?></td>
			<td><?php echo $data["stok"]; ?></td>
			<td>
				
				<a href="home.php?page=barang&action=edittenda&id=<?=$data['id_tenda'];?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span>Ubah</a>

				<a href="home.php?page=barang&action=hapustenda&id=<?=$data['id_tenda'];?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span>Hapus</a>
			</td>
		</tr>
		<?php
		}
		?>
</tbody>
</table>
</div>
<br>

<h3>Daftar Barang Tambahan</h3>
<br>
<div>
	<div style="padding-right: 10px; float: left;">
		<a href="home.php?page=barang&action=addbarang" class="btn btn-sm btn-primary" style=""><span class="glyphicon glyphicon-plus"></span>Tambah Barang</a>
	</div>
	<div>
		<?php
	if(isset($_POST['cari'])){
		$cari =$_POST['kata_kunci'];
		$tampilbarang = mysqli_query($koneksi, "SELECT * FROM barang_tambahan WHERE nama_barang LIKE '%".$cari."%'");	
	}else{
		$tampilbarang=mysqli_query($koneksi," SELECT * FROM barang_tambahan ORDER BY id_barang ASC ");
	}
?>
		<form method="POST" action="">
			
			<input type="text"value="<?php echo $cari;?>" name="kata_kunci" class="form-control" placeholder="cari Barang" style="width: 300px; float: left;">
			<input type="submit" value="cari" name="cari" class="btn btn-info">
		</form>
	</div>
</div>
				<br>
<div class="table-responsive">
<table class="table table-bordered table-striped">
	<thead>
		<th>Kode</th>
		<th>Nama Barang</th>
		<th>Satuan</th>
		<th>Harga sewa</th>
		<th>Stok</th>
		<th></th>
	</thead>
	<tbody>

		<?php
			while ($data=mysqli_fetch_assoc($tampilbarang)) {
		?>
		<tr>
			<td><?php echo $data["id_barang"]; ?></td>
			<td><?php echo $data["nama_barang"]; ?></td>
			<td><?php echo $data["satuan"]; ?></td>
			<td><?php echo $data["harga"]; ?></td>
			<td><?php echo $data["stok"]; ?></td>

			<td>
				
				<a href="home.php?page=barang&action=editbarang&id=<?=$data['id_barang'];?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span>Ubah</a>

				<a href="home.php?page=barang&action=hapusbarang&id=<?=$data['id_barang'];?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span>Hapus</a>
			</td>
		</tr>
		<?php
		}
		?>
</tbody>
</table>
</div>
<?php
			break;

		case 'addtenda':

		?>
		<h3>Tambah Tenda</h3>
		<br>
		<form method="POST" action="home.php?page=barang&action=savetenda" style="width: 600px;" >
			<label>Kode</label>
			<input type="text" name="kode" class="form-control" required="true">
			<label>Jenis Tenda</label>
			<select name="id_jenis" class="form-control" required="true">
			<option value="">Pilih</option>
			<?php
				$query_jenis=mysqli_query($koneksi,"SELECT * FROM jenis_tenda
												ORDER BY id_jenis ASC");
				while($data_jenis=mysqli_fetch_assoc($query_jenis)){
					?>
						<option value="<?=$data_jenis['id_jenis']?>">
							<?=$data_jenis['tenda_jenis']?></option>
					<?php
				}
			?>
			</select>
			<label>Satuan</label>
			<input type="text" name="satuan" class="form-control" required="true">
			<label>Harga</label>
			<input type="text" name="harga" class="form-control" required="true">
			<label>Stok</label>
			<input type="text" name="stok" class="form-control" required="true">
			<br>
			<button type="submit" class="btn btn-primary">SIMPAN</button>
			<a href="home.php?page=barang" class="btn btn-default">KEMBALI</a>
		</form>
		<?php
			
			break;

		case 'savetenda':

		if (isset($_POST['kode'])) {
				$id_tenda = $_POST['kode'];
				$id_jenis = $_POST['id_jenis'];
				$satuan = $_POST['satuan'];
				$harga = $_POST['harga'];
				$stok = $_POST['stok'];
				$query=mysqli_query($koneksi, "INSERT INTO tenda (id_tenda,id_jenis,satuan,harga,stok) VALUES ('".$id_tenda."','".$id_jenis."','".$satuan."','".$harga."','".$stok."')");

				if ($query) {
					echo "<script>document.location='home.php?page=barang';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=barang&action=addtenda';</script>";
				}
			}
			
			break;

		case 'edittenda':

		$query=mysqli_query($koneksi,"SELECT * FROM tenda a
					INNER JOIN jenis_tenda b ON a.id_jenis=b.id_jenis
					WHERE a.id_tenda='".$_GET['id']."'");
$data=mysqli_fetch_array($query);
?>
	<form method="POST" action="home.php?page=barang&action=updatetenda"
		enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?=$data['id_tenda']?>" class="form-control">
		<label>Jenis Tenda</label>
			<select name="id_jenis" class="form-control" disabled="true">
			<option value="<?=$data['id_jenis']?>">
							<?=$data['tenda_jenis']?></option>
		</select>
			<label>Satuan</label>
			<input type="text" name="satuan" class="form-control" value="<?=$data['satuan']?>" disabled="true">
			<label>Harga</label>
			<input type="text" name="harga" class="form-control" required="true" value="<?php echo $data["harga"]; ?>">
			<label>Stok</label>
			<input type="text" name="stok" class="form-control" required="true" value="<?php echo $data["stok"]; ?>">
			<br>

			<button type="submit" class="btn btn-primary">SIMPAN</button>
			<a href="home.php?page=barang" class="btn btn-default">KEMBALI</a>
		</form>

	<?php
			break;

		case 'updatetenda':

		if (isset($_POST['id'])) {
				$harga = $_POST['harga'];
				$stok = $_POST['stok'];
				$query=mysqli_query( $koneksi, "UPDATE tenda SET harga ='".$harga."' , stok ='".$stok."' WHERE id_tenda ='".$_POST['id']."'");
				if ($query) {
					echo "<script>document.location='home.php?page=barang';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=barang&action=edittenda&id=".$_POST['id']."';</script>";
				}
			}
			?>
			<?php
			break;

		case 'hapustenda':

		$query=mysqli_query($koneksi, "DELETE FROM tenda WHERE id_tenda='".$_GET['id']."'");
				if ($query) {
					echo "<script>document.location='home.php?page=barang';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=barang;</script>";
				}
			
			break;

		case 'addbarang':

		?>
		<h3>Tambah Barang</h3>
		<br>
		<form method="POST" action="home.php?page=barang&action=savebarang" style="width: 600px;">
			<label>Kode</label>
			<input type="text" name="id_barang" class="form-control" required="true">
			<label>Nama Barang</label>
			<input type="text" name="nama_barang" class="form-control" required="true">
			<label>Satuan</label>
			<input type="text" name="satuan" class="form-control" required="true">
			<label>Harga</label>
			<input type="text" name="harga" class="form-control" required="true">
			<label>Stok</label>
			<input type="text" name="stok" class="form-control" required="true">
			<br>
			<button type="submit" class="btn btn-primary">SIMPAN</button>
			<a href="home.php?page=barang" class="btn btn-default">KEMBALI</a>
		</form>
		<?php
			
			break;

		case 'savebarang':

		if (isset($_POST['id_barang'])) {
				$id_barang = $_POST['id_barang'];
				$nama_barang = $_POST['nama_barang'];
				$satuan = $_POST['satuan'];
				$harga = $_POST['harga'];
				$stok = $_POST['stok'];
				$query=mysqli_query($koneksi, "INSERT INTO barang_tambahan (id_barang,nama_barang,satuan,harga,stok) VALUES ('".$id_barang."','".$nama_barang."','".$satuan."','".$harga."','".$stok."')");

				if ($query) {
					echo "<script>document.location='home.php?page=barang';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=barang&action=add';</script>";
				}
			}
			
			break;

		case 'editbarang':

		$query=mysqli_query($koneksi,"SELECT * FROM barang_tambahan WHERE id_barang ='".$_GET['id']."'");
		$data=mysqli_fetch_assoc($query);
?>
	<form method="POST" action="home.php?page=barang&action=updatebarang"
		enctype="multipart/form-data">
		<input name="id" value="<?=$data['id_barang']?>" class="form-control" type="hidden">
		<label>Nama Barang</label>
			<input type="text" name="nama_barang" class="form-control" required="true" disabled="true" value="<?=$data['nama_barang']?>">
			<label>Satuan</label>
			<input type="text" name="satuan" class="form-control" required="true" value="<?=$data['satuan']?>" disabled="true">
			<label>Harga</label>
			<input type="text" name="harga" class="form-control" required="true" value="<?=$data['harga']?>">
			<label>Stok</label>
			<input type="text" name="stok" class="form-control" required="true" value="<?=$data['stok']?>">
			<br>

			<button type="submit" class="btn btn-primary">SIMPAN</button>
			<a href="home.php?page=barang" class="btn btn-default">KEMBALI</a>
		</form>

	<?php
			break;

		case 'updatebarang':

		if (isset($_POST['id'])) {
				$harga_barang = $_POST['harga'];
				$stok_barang = $_POST['stok'];
				$query=mysqli_query($koneksi, "UPDATE barang_tambahan SET harga ='".$harga_barang."' , 
					 stok ='".$stok_barang."' 
					 WHERE id_barang='".$_POST['id']."'");

				if ($query) {
					echo "<script>document.location='home.php?page=barang';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=barang&action=editbarang&id=".$_POST['id']."';</script>";
				}
			}
			
			break;

		case 'hapusbarang':

		$query=mysqli_query($koneksi, "DELETE FROM barang_tambahan WHERE id_barang='".$_GET['id']."'");
				if ($query) {
					echo "<script>document.location='home.php?page=barang';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='home.php?page=barang;</script>";
				}
			
			break;

		case 'caribarang':
			if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$query = mysql_query("SELECT * FROM barang_tambahan WHERE nama_barang LIKE '%".$cari."%'");	
	}else{
			$query=mysqli_query($koneksi," SELECT * FROM barang_tambahan ORDER BY id_barang ASC ");
	}

			break;
		}
		?>
	</div>


</section>