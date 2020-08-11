<?php
    session_start();
    include '../settings/koneksi.php';
    $username = mysql_real_escape_string($_POST['usr']);
    $password = mysql_real_escape_string(md5($_POST['psw']));

    $sql = mysql_query("SELECT * FROM user WHERE USERNAME='$username' and PASSWORD='$password'");
    $result = mysql_fetch_array($sql);
    $row = mysql_num_rows($sql);
    $_SESSION['ID_USER'] = $result['ID_USER'];
    $_SESSION['LEVEL'] = $result['LEVEL'];
    if (empty($username) || empty($password)) {
      echo "* Username atau password masih kosong";
    }else {
      if ($row > 0) {
        if ($_SESSION['LEVEL'] == 'ADMIN') {
          mysql_query("UPDATE user SET STATUS = 'ONLINE' WHERE ID_USER = '".$_SESSION['ID_USER']."'");
          echo "<script>window.location.href='assets/content/admin.php'</script>";
        }else {
          mysql_query("UPDATE user SET STATUS = 'ONLINE' WHERE ID_USER = '".$_SESSION['ID_USER']."'");
          echo "<script>window.location.href='dasboard.php'</script>";
        }
      }else {
        echo "* Username atau password anda mungkin salah";
      }
    }
?>
