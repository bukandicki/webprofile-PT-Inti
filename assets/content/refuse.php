<?php
  include '../settings/koneksi.php';
  $id = $_POST['idnyaa'];
  $sql = mysql_query("UPDATE lamaran SET STATUS='DITOLAK' WHERE ID_LAMARAN='$id'");
  if ($sql) {
    echo "Berhasil Menolak";
  }
?>
