<?php
  session_start();
  include '../settings/koneksi.php';
  $id = $_SESSION['ID_USER'];
  $sql = mysql_query("UPDATE user SET STATUS = 'OFFLINE' WHERE ID_USER = '$id'");
    if ($sql) {
      echo "<meta http-equiv='refresh' content='0; url=../../index.html' />";
    }else {
      echo "gagal";
    }
?>
