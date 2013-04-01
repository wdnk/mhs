<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Form Kategori Mahasiswa</title>
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
<!--
.style4 {font-size: 14px; color: #FFFFFF; font-weight: bold;}
-->
<!--
.style6 {font-size: 12px; color: #FF0000; }
.style7 {color: #F3F3F3}
-->
</style>
</head>

<body>
<form action="proses_kategori_detil.php" method="post" name="input_detil" id="input_detil">
  <br>
  <table width="552" border="0" align="center" bgcolor="#F3F3F3">
    <tr background="../img/bg_form.jpg">
      <td height="40" colspan="5"><div align="center"><strong>  Input Status Detil Mahasiswa </strong></div></td>
    </tr>
    <tr>
      <td width="12">&nbsp;</td>
      <td width="106">Status Detil </td>
      <td width="16">:</td>
      <td colspan="2"><input name="status" type="text" id="status" size="30" class="required" title="Status wajib diisi">        
      <div align="center"></div></td>
    </tr>
    <tr>
      <td rowspan="4">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="305"><span class="style3">*) Masukkan status detil mahasiswa </span></td>
      <td width="129" valign="bottom">&nbsp;</td>
    </tr>
    <tr>
      <td>Nomor ID</td>
      <td>:</td>
      <td valign="bottom"><input name="id" type="text" id="id" size="5" maxlength="1" class="required" title="ID wajib diisi">
        <span class="style7">..<img src="../img/warning.png" width="18" height="16" align="bottom"></span></td>
      <td width="129" rowspan="5" valign="bottom"><img src="../img/ndut1.png" width="95" height="117"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><span class="style6">*) Masukkan nomor id kategori sesuai tabel dibawah </span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr bgcolor="#CCCCCC">
      <td colspan="5"><div align="center"><span class="style3">** Best view in mozilla firefox ** </span></div></td>
    </tr>
  </table>
  <br>  
  <table width="552" border="0" align="center" bgcolor="#F3F3F3">
    <tr background="../img/bg_form.jpg">
      <td width="535" height="40"><div align="center"><strong> Tabel Kategori Status </strong></div></td>
    </tr>
    <tr>
      <td>
	  
	  <?php
		//panggil file koneksi.php untuk menghubung ke server
		include "../koneksi.php";
		
		$warnaGenap = "#CCFF99";   // warna abu-abu
		$warnaGanjil = "#FFFFCC";  // warna putih
		$warnaHeading = "#0066FF"; // warna merah untuk heading tabel

		$query = "SELECT * FROM m_country";
		$hasil = mysql_query($query);

		echo "<table border='0'>";
		echo "<tr bgcolor='".$warnaHeading."'>
      		<td height=35 align=center><span class=style4>Nomor ID</span></td>
      		<td align=center><span class=style4>Kategori Status</span></td>
      		</tr>";

		$counter = 1;

		while($data = mysql_fetch_array($hasil))
		{

		// cek apakah counternya ganjil atau genap
		if ($counter % 2 == 0) $warna = $warnaGenap;
		else $warna = $warnaGanjil;

		echo "<tr bgcolor='".$warna."'>";
		echo "<td align=center width=100>".$data['CountryCode']."</td>";
		echo "<td width=450>".$data['CountryDesc']."</td>";
		echo "</tr>";
		$counter++; // menambah counter
		}
		echo "</table>";
		?>
			  
	  </td>
    </tr>
  </table>
</form>
</body>
</html>
