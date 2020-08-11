<?php
  include '../settings/koneksi.php';
  $id = $_GET['id'];
  $sql = mysql_query("SELECT * FROM lamaran WHERE ID_LAMARAN='$id'");
  $sql2 = mysql_query("UPDATE lamaran SET STATUS='DITANGGUHKAN' WHERE ID_LAMARAN='$id'");
  $result = mysql_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/master.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style media="screen">
    body {
      background: #f2f5f7;
      font: 14px sans-serif;
      padding: 20px;
      overflow-x: hidden;
    }
    button {
      background-color: transparent;
      outline: none;
      border: none;
      color: #dc3545;
      cursor: pointer;
      font-size: 1.3em;
    }
    </style>
    <title></title>
  </head>
  <body>
    <div class="kertas" id="lamaran">
      <button type="button" name="button" onclick="history.go(-1)"><i class="fas fa-chevron-left"></i></button>
      <button type="button" name="button" id="print"><i class="fas fa-print"></i></button>
      <p style="text-align: right;"><?php echo $result['TEMPAT'].", ".$result['TANGGAL_LAMARAN']; ?></p>
      <p>Kepada Yth :<br><strong>PT.INTI (PERSERO)</strong><br>Jl. Moh. Toha No. 77 Cigereleng Regol Bandung Jawa Barat</p>
      <p>Dengan hormat, Yang bertanda tangan dibawah ini saya :</p>
      <p>
        Nama &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $result['NAMA']; ?><br>
        Tempat, tanggal lahir &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $result['TEMPAT']; ?>, <?php echo $result['TANGGAL_LAHIR']; ?><br>
        Alamat &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $result['ALAMAT_LENGKAP']; ?></br>
        Telepon &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $result['NO_TELEPON']; ?>
      </p>
      <p>Bermaksud untuk mengajukan lamaran pekerjaan di perusahaan yang Bapak / Ibu pimpin sebagai karyawan. Sebagai bahan pertimbangan bersama ini saya lampirkan :</p>
      <ol>
        <li>Pas Foto</li>
        <li>Scan KTP</li>
        <li>Scan Ijazah</li>
        <li>Curriculum Vitae</li>
        <li>Scan Skck</li>
      </ol>
      <p>
        Demikian surat permohonan pekerjaan saya buat besar harapan saya untuk dapat diterima di Perusahaan yang Bapak/Ibu Pimpin. Atas perhatiannya saya ucapkan terima kasih.
      </p>
        <p> Hormat saya</p>
        <p><strong style="text-transform: uppercase;">( <?php echo $result['NAMA']; ?> )</strong></p>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $("#print").on("click", function () {
          window.print();
        });
      });
    </script>
  </body>
</html>
