<?php
  include '../settings/koneksi.php';
  $id = $_GET['id'];
  $update = mysql_query("UPDATE lamaran SET STATUS='KARYAWAN' WHERE ID_LAMARAN='$id'");
  $sql = mysql_query("SELECT * FROM lamaran WHERE ID_LAMARAN='$id'");
  $result = mysql_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<body>
	<table>
		<tr>
			<td>Nama</td>
			<td>
				: <input type="text" name="" value="<?php echo $result['NAMA']; ?>" placeholder="">
			</td>
		</tr>
		<tr>
			<td>Golongan</td>
			<td>
				: <select name="" id="golongan">
					<option value="1">A</option>
					<option value="2">B</option>
					<option value="3">AB</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td>
				: <select name="" id="jabatan">
					<option value="0">Karyawan</option>
					<option value="1">Supervisor</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tunjangan</td>
			<td>
				: <select name="" id="tunjangan">
					<option value="0">Rp.200000,-</option>
					<option value="1">Rp.300000,-</option>
					<option value="2">Rp.400000,-</option>
					<option value="3">Rp.500000,-</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Masa Kerja</td>
			<td>
				: From <input type="date" name="" value="" id="from" placeholder=""> - To <input type="date" name="" value="" id="to" placeholder="">
				<span id="date3"></span>
				<input type="hidden" name="" value="0" placeholder="" id="date">
				<input type="hidden" name="" value="0" placeholder="" id="date2">
			</td>
		</tr>
		<tr>
			<td>Gaji Bersih</td>
			<td>
				: <input type="hidden" name="" value="0" id="gaji" placeholder="" disabled><input type="hidden" name="" value="0" id="gajijab" placeholder="" disabled>
				<input type="hidden" name="" value="0" id="tun" placeholder="" disabled>
				<span id="gajtot"></span>
			</td>
		</tr>
	</table>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#from").on("change", function () {
				var a = parseInt($(this).val());
				var b = parseInt($("#to").val());
				$("#date").html(a);
				$("#date3").html((b-a) + " Tahun");
			});

			$("#to").on("change", function () {
				var a = parseInt($(this).val());
				var b = parseInt($("#from").val());
				$("#date2").html(a);
				$("#date3").html((a-b) + " Tahun");
			});

			$("#golongan").on("change", function () {
				var gol = $(this).val();
				switch(gol) {
					case (gol = "1"):
					$("#gaji").prop("value","500000");
					break;
					case (gol = "2"):
					$("#gaji").prop("value","400000");
					break;
					case (gol = "3"):
					$("#gaji").prop("value","300000");
					break;
					default:
					$("#gaji").prop("value","0");
				}
			});

			$("#jabatan").on("change", function () {
				var jab = $(this).val();
				switch(jab) {
					case (jab = "0"):
					$("#gajijab").prop("value","3300000");
					break;
					case (jab = "1"):
					$("#gajijab").prop("value","4200000");
					break;
					default:
					$("#gajijab").prop("value","0");
				}
			});

			$("#tunjangan").on("change", function () {
				var tun = $(this).val();
				switch(tun) {
					case (tun = "0"):
					$("#tun").prop("value","200000");
					break;
					case (tun = "1"):
					$("#tun").prop("value","300000");
					break;
					case (tun = "2"):
					$("#tun").prop("value","400000");
					break;
					case (tun = "3"):
					$("#tun").prop("value","500000");
					break;
					default:
					$("#tun").prop("value","0");
				}
			});

			$("#jabatan,#golongan,#tunjangan").on("change", function () {
				var a = parseInt($("#gaji").val());
				var b = parseInt($("#gajijab").val());
				var c = parseInt($("#tun").val());

				$("#gajtot").html("Rp." + (a+b+c) + ",- / Bulan");
			});
		});
	</script>
</body>
</html>
