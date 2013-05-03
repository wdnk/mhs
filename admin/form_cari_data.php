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
<title>Form Cari Data</title>
<script type="text/javascript" src="../jquery/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="../jquery/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#input_detil").validate({
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
-->
.style4 {
	font-size: 12px;
	color: #ffffff;
}
<!--
-->
<!--
body {
	background-image: url();
	background-color: #F0F0F0;
}
-->
</style>
</head>

<body>
<form action="form_cari_data.php" method="post" name="input_detil" id="input_detil">
  <br>
  <table width="100%" border="0" bgcolor="#F3F3F3">
    <tr background="../img/bg_form.jpg">
      <td height="35" colspan="5"><div align="center"><strong> Perbarui Status Mahasiswa </strong></div></td>
    </tr>
    <tr>
      <td width="4">&nbsp;</td>
      <td width="103">NIF</td>
      <td width="6">:</td>
      <td width="199"><input name="nif" type="text" id="nif" size="5" maxlength="5" class="required" title="NIF wajib diisi"></td>
      <td width="106" valign="middle"><div align="center"></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><span class="style3">*) Masukkan Nomor Induk Fakultas </span></td>
      <td width="106" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="106" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Cari"></td>
      <td width="106" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;</td>
    </tr>
  </table>
  
  <br>  
  <table width="100%" border="0" bgcolor="#F3F3F3">
    <tr background="../img/bg_form.jpg">
      <td height="35"><div align="center"><strong>Hasil Pencarian </strong></div></td>
    </tr>
    <tr>
      <td height="25" valign="middle">
	  
	      <?php
    //panggil file koneksi.php untuk menghubung ke server
	include "../koneksi.php";
	
	//njupuk data dari form atas
	$nif= $_POST['nif']; 
	
	//query pencarian form NIF = NIF tabel mahasiswa
	$q = "SELECT * from mahasiswa where NIF='$nif' order by NO desc limit 1"; 
	$result = mysql_query($q); 
	
	//echo "<center>";
	echo "<table border='0' width='100%'>";
	echo "
	<tr bgcolor='#333333'>
	<td align=center height=25 width=100><span class=style4>NIF</span></td>
	<td align=center height=25 ><span class=style4>NAMA</span></td>
	<td align=center height=25 width=125><span class=style4></span></td>
	</tr>";
	while ($data = mysql_fetch_array($result)) { 
	echo "
	<tr bgcolor='#FFFFFF'>
	<td align=center>".$data['NIF']."</td>
	<td>".$data['NAMA']."</td>
	<td align=center><a href='edit_mahasiswa1.php?id=$data[NO]'><img src='../img/baru.png'></a> </td>
	</tr>";
	}
	echo "</table>";
	?>
    
	  
	  </td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
