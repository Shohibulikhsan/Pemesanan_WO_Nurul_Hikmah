<?php 
include_once('assets/koneksi.php');
$json = array();
$show = mysqli_query($koneksi, "SELECT * FROM  tanggal ");

while($row=mysqli_fetch_assoc($show)){

	$json[]= array(
		'backgroundColor' => 'rgb(255, 0, 0)', 
		'borderColor' => 'rgb(255,0,0)',

		'start' => $row['mulai'],
		'end' => $row ['hingga'],
	);
};
	echo json_encode($json);

 ?>