<?php
include "../koneksi.php";
session_start();
include "../cek.php";
// koneksi ke mysql

// membaca username yang disimpan dalam session
$user = $_SESSION['username'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>form input prodi</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
<script type="text/javascript" src="../jquery/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="../jquery/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#input_prodi").validate({
		messages: {
			email: {
				required: "E-mail harus diisi",
				email: "Masukkan E-mail yang valid"
			}
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		}
	});
})
</script>

<style type="text/css">

h4 { font-size: 8px; }
input { padding: 3px; border: 1px solid #999; }
input.error, select.error { border: 1px solid red; }
label.error { color:red; margin-left: 10px; }
td { padding: 3px; }

<!--
.style3 {
	font-size: 12px;
	color: #666666;
}
body {
	background-image: url();
	background-color: #F0F0F0;
}
-->
</style>
</head>

<body>

  <form action="proses_input_prodi.php" method="post" name="input_prodi" id="input_prodi">
  <table width="100%" border="0">
    <tr background="../img/bg_form.jpg">
      <td height="35" colspan="6"><div align="center"><strong> Form Input Program Studi </strong></div></td>
    </tr>
    <tr>
      <td width="6">&nbsp;</td>
      <td width="142">Nama Program Studi </td>
      <td width="7">:</td>
      <td colspan="2"><input name="nm_prodi" type="text" id="nm_prodi" size="35" class="required" title="Nama Prodi wajib diisi"></td>
      <td width="58" rowspan="5"><div align="center"></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Jenjang Studi</td>
      <td>:</td>
      <td width="237"><select name="nm_jenjang" id="nm_jenjang">
        <option value="2">Diploma 3</option>
        <option value="3">Strata 1</option>
        <option value="4">Strata 2</option>
        <option value="5">Strata 3</option>
      </select></td>
      <td width="174"><span class="style3">*) Pilih nama jenjang studi </span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>
  <?php
  include "../koneksi.php";
 
	//tentukan warnanya
	$warnaGenap = "#ffffff";   // warna abu-abu
	$warnaGanjil = "#C0C0C0";  // warna putih
	
	echo "<table border='0' width='400' align=center>";
	echo "
	<tr bgcolor='#333333'>
	<td align=center height=35><span class=style1>Daftar Program Studi di Database</span></td>
	</tr>";
	$batas   = 20;
	$halaman = $_GET['halaman'];
	if(empty($halaman)){
		$posisi  = 0;
		$halaman = 1;
	}
		else{
	$posisi = ($halaman-1) * $batas;
	}
	$q = "SELECT * from program order by PRODI"; 
	$result = mysql_query($q); 
	$no = $posisi+1;

	while ($data = mysql_fetch_array($result)) { 
	
	if ($counter % 2 == 0) $warna = $warnaGenap;
	else $warna = $warnaGanjil;

	echo "
	<tr bgcolor='".$warna."'>
	<td align=center height=30>".$data['PS']."</td>
	</tr>";
	$counter++;
  $no++;
	
	}
	echo "</table>";
	
	echo "
	<p></p>";
	//Itung total data dan halaman
	$x = "SELECT * from program"; 
	$y = mysql_query($x);
	$jmlhal  = ceil($y/$batas);
	

	?>
  
  
  </p>
  </form>
</body>
</html>
