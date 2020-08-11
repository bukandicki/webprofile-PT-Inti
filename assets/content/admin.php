<?php
  session_start();
  include '../settings/koneksi.php';
  error_reporting(~E_NOTICE);
  $id = $_SESSION['ID_USER'];
  $sql = mysql_query("SELECT * FROM user WHERE ID_USER = '$id'");
  $result = mysql_fetch_array($sql);
  $_SESSION['LEVEL'] = $result['LEVEL'];
  $level = $_SESSION['LEVEL'];
  $_SESSION['STATUS'] = $result['STATUS'];
  $status = $_SESSION['STATUS'];
  $nama = $result['NAME'];

  if ($level != 'ADMIN' || $status != 'ONLINE') {
    ?>
      <script type="text/javascript">
        alert("Akses Terlarang !!");
      </script>
    <?php
    echo "<script>window.location.href='../../index.html'</script>";
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/master.css">
    <style media="screen">
      body {
        overflow: hidden;
      }
      table, td, th {
    border: 1px solid #ddd;
    text-align: center;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    font-family: 'Raleway',sans-serif;
    padding: 15px;
}
input,button {
  background-color: transparent;
  border: none;
  font-size: 1.2em;
  font-family: 'Lato',sans-serif;
  outline: none;
  padding: .5em;
}

button {
  color: rgba(255, 0, 0, 0.5);
  cursor: pointer;
}
    </style>
    <!-- javascript & jquery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="../js/master.js"></script>
  </head>
  <body>
    <section class="s_admin">
      <header class="header_admin">
        <div class="container_nav">
          <div class="logo">
            <button class="bars-admin"><i class="fas fa-bars"></i></button>
          </div>
          <nav>
            <ul>
              <li><span class="name-admin"><i class="fas fa-key" style="color: yellow;"></i> <?php echo $result['NAME']; ?></span></li>
              <li><a href="logout.php" title="">Logout</a></li>
            </ul>
          </nav>
        </div>
      </header>
      <div class="sidebar_left_admin">
        <ul>
          <li><a href="#" title=""><i class="fas fa-users"></i> Karyawan</a></li>
          <li><a href="#" title=""><i class="fas fa-plus"></i> Tambah Pengurus</a></li>
          <li><a href="#" title=""><i class="fas fa-cog"></i> Pengaturan</a></li>
        </ul>
      </div>
      <div class="sidebar_right_admin">
        <ul>
          <li style="display: inline-block;"><div style="width: 15px;height: 15px;background: rgb(46, 204, 113);"></div>Diterima</li>
          <li style="display: inline-block;"><div style="width: 15px;height: 15px;background: rgb(231, 76, 60);"></div>Ditolak</li>
          <li style="display: inline-block;"><div style="width: 15px;height: 15px;background: #ffc107;"></div>Ditangguhkan</li>
        </ul>
        <div class="wrap_search_bar">
          <input autofocus type="text" name="search_text" id="search_text" value="" placeholder="Search name...">
      </div>
        <table>
          <thead>
            <tr>
              <th>ID Lamaran</th>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>Tanggal Lamaran</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody id="show-data"></tbody>
        </table>
      </div>
    </section>
    <script type="text/javascript">
    $(document).ready(function () {
      load_data();

     function load_data(query)
     {
      $.ajax({
       url:"data_lamaran.php",
       method:"POST",
       data:{query:query},
       success:function(data)
       {
        $('#show-data').html(data);
       }
      });
     }

     $('#search_text').keyup(function(){
      var search = $(this).val();
      if(search != '')
      {
       load_data(search);
      }
      else
      {
       load_data();
      }
     });
    });
    </script>
  </body>
</html>
