<?php
	session_start();
	include '../settings/koneksi.php';
	$id = $_POST['idnya'];
	$pilih = mysql_query("SELECT * FROM lamaran WHERE ID_LAMARAN = '$id'");
	$result = mysql_fetch_array($pilih);
	$sql = mysql_query("DELETE FROM lamaran WHERE ID_LAMARAN = '$id'");
	if ($sql) {
		echo $result['NAMA']." Berhasil Terhapus";
	}
?>