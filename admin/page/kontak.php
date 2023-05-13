<link rel="stylesheet" type="text/css" href="../assets/css/stylekontak_admin.css">


<section class="penilaian">
	<div class="container">
		<h3>Kritik Dan Saran</h3>

<?php
	switch ($_GET['action']) {

default:

?> 

<table class="table table-bordered table-striped">
	<thead>
		<th>No.</th>
		<th>Nama Lengkap</th>
		<th>penilaian</th>
		<th>Opsi</th>
	</thead>
	<tbody>
		<?php
			$nomor=1;
			$query=mysqli_query($koneksi," SELECT * FROM penilaian ORDER BY id_pengguna ASC ");
			while ($data=mysqli_fetch_assoc($query)) {
		?>
		<tr>
			<td><?=$nomor;?></td>
			<td><?=$data['id_pengguna'];?></td>
			<td><?=$data['i_penilaian'];?></td>
			<td>
				<a href="home.php?page=kontak&action=lihat&id=<?=$data['id_penilaian'];?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-eye-open" ><font style="font-family: sans-serif;">&nbsp; Lihat</font></span></a>

				<a href="home.php?page=kontak&action=hapus&id=<?=$data['id_penilaian'];?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"><font style="font-family: sans-serif;">&nbsp; Hapus</font></span></a>
			</td>
		</tr>
		<?php
		$nomor++;
		}
		?>
</tbody>
</table>
<?php
			break;

		case 'lihat':

		$query=mysqli_query($koneksi,"SELECT * FROM penilaian where id_penilaian='".$_GET['id']."'");
		$data=mysqli_fetch_assoc($query);
		?>

		<form method="POST" action="">
			<input type="hidden" name="id" value="<?=$data['id_penilaian']?>">

							<label>Nama Lengkap</label>
							<input type="text" name="nama"  required="true" disabled="true" class="form-control" value="<?=$data['id_pengguna']?>">
						<br>
							<label>penilaian</label>
							<select name="penilaian" required="true" disabled="true" class="form-control">
								<option><?=$data['i_penilaian']?></option>
							</select>
						<br>
							<label>Pesan</label>
							<textarea name="pesan" required="true" disabled="true" class="form-control"><?=$data['pesan']?></textarea>
			<br>

			<a href="home.php?page=kontak" class="btn btn-default">KEMBALI</a>
		</form>

	<?php
			break;

		case 'hapus':

		$query=mysqli_query($koneksi, "DELETE FROM  penilaian WHERE id_penilaian ='".$_GET['id']."'");
				if ($query) {
					echo "<script>document.location='index.php?page=kontak';</script>";
				}else{
					echo "<script>alert('Gagal');  document.location='index.php?page=kategori;</script>";
				}
			
			break;
		
		}

?>

</div>
</section>