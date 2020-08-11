<?php
session_start();
include '../settings/koneksi.php';
    $nama = $_POST['nm'];
    $tempat = $_POST['tmpt'];
    $tanggal = $_POST['tgl'];
    $alamat = $_POST['al'];
    $email = $_POST['e'];
    $telepon = $_POST['nt'];
    $foto = $_FILES['fot']['tmp_name'];
    $ktp = $_FILES['l-ktp']['tmp_name'];
    $ijasah = $_FILES['l-ijasah']['tmp_name'];
    $riwayat = $_FILES['l-riwayat']['tmp_name'];
    $skck = $_FILES['l-skck']['tmp_name'];
    $foto_name = $_FILES['fot']['name'];
    $ktp_name = $_FILES['l-ktp']['name'];
    $ijasah_name = $_FILES['l-ijasah']['name'];
    $riwayat_name = $_FILES['l-riwayat']['name'];
    $skck_name = $_FILES['l-skck']['name'];


    $foto_f = "../data_lamaran/".$nama."/".$foto_name;
    $ktp_f = "../data_lamaran/".$nama."/".$ktp_name;
    $ijasah_f = "../data_lamaran/".$nama."/".$ijasah_name;
    $riwayat_f = "../data_lamaran/".$nama."/".$riwayat_name;
    $skck_f = "../data_lamaran/".$nama."/".$skck_name;
    date_default_timezone_set('Asia/Jakarta');
    $tanggall = date('j F, Y');
    if (empty($nama) || empty($tempat) || empty($tanggal) || empty($alamat) || empty($email) || empty($telepon)) {
      echo "<span style='color: red;'>* Mohon maaf, lamaran anda belum selesai di isi</span>";
    }else {
        $sql = mysql_query("INSERT INTO lamaran (NAMA, TEMPAT, TANGGAL_LAHIR, ALAMAT_LENGKAP, EMAIL, NO_TELEPON, LAMPIRAN_IJAZAH, LAMPIRAN_KTP, LAMPIRAN_HIDUP, LAMPIRAN_SKCK, FOTO, TANGGAL_LAMARAN) VALUES ('$nama', '$tempat', '$tanggal', '$alamat', '$email', '$telepon', '$ijasah_f', '$ktp_f', '$riwayat_f', '$skck_f', '$foto_f', '$tanggall')");
        if ($sql) {

        $fol = mkdir("../data_lamaran/".$nama, 0777, true);
        
          move_uploaded_file($foto,$foto_f);
          move_uploaded_file($ktp,$ktp_f);
          move_uploaded_file($ijasah,$ijasah_f);
          move_uploaded_file($riwayat,$riwayat_f);
          move_uploaded_file($skck,$skck_f);
          echo "<script>alert('* Lamaran anda selesai di kirim, mohon menunggu balasan dari kami')</script>";
          echo "<meta http-equiv='refresh' content='0; url=formulir.html' />";
        }else {
          echo "<script>alert('* Mohon maaf, lamaran anda gagal dikirim')</script>";
          echo "<meta http-equiv='refresh' content='0; url=http://localhost/realptinti/' />";
        }
      }
?>
