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
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<meta name="author" content="Widy Agung Priasmoro" />
	<meta name="copyright" content="Copyright (c) JTETI UGM 2013" />
	<meta name="description" content="" />
	<meta name="keywords" content="Mahasiswa Khusus, Mhs Khusus, UGM" />
	<link href="css/styles.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.4.custom.css"/>
	<link href="css/base.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery.fixheadertable.min.js"></script>	
	<script type="text/javascript">
	    $(document).ready(function()
		{
			$('#table_hasil_pencarian').fixheadertable({ 
			        colratio    : [40, 70, 200, 200, 80, 70, 70, 70, 140, 120], 
				    height      : 200, 
				    zebra       : true,
				    resizeCol   : true,
				    sortable    : true,
				    sortedColId : 3, 
				    sortType    : ['integer', 'string', 'string', 'string', 'string', 'date'],
				    dateFormat  : 'm/d/Y',
				    minColWidth : 50 
			});
		});
    </script>
</head>

<body>
<form action="form_cari_data.php" method="post" name="input_detil" id="input_detil">
  <br>
  <table border="0" align="center">
    <tr>
      <td class='txt_tengah' height="15" colspan="4"><strong> Perbarui Status Mahasiswa </strong></td>
    </tr>
    <tr>
      <td class='txt_tengah' width="60">NIF</td>
      <td class='txt_tengah' width="6">:</td>
      <td class='txt_tengah' width="150" height="25"><input name="nif" type="text" id="nif" size="5" maxlength="5" class="required" title="NIF wajib diisi"></td>
      <td class='txt_tengah' width="150" height="25"><input type="hidden" name="action" value="cari_mhs"><input class="form_button" type="submit" name="Submit" value="Cari"></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td colspan="2">*) Masukkan Nomor Induk Fakultas</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
  </table>
  
  <br>  
<?php
    //panggil file koneksi.php untuk menghubung ke server
	include "../koneksi.php";
	
	//njupuk data dari form atas
	$nif= $_POST['nif']; 
	
	if ($_REQUEST['action']=="cari_mhs"){
		if ( isset($_POST['nif'])){
			echo "<br><center><p>Hasil Pencarian</p></center><br><br>";
			echo "<table width='100%' style='overflow:auto;' id='table_hasil_pencarian' title='tabel mahasiswa khusus' class='head'";
			echo "
			<thead>
			<tr>
				<th align=center height=25 width=100>NIF</th>
				<th align=center height=25 >NAMA</th>
				<th align=center height=25 width=125>&nbsp;</th>
			</tr>
			</thead><tbody>";
			$q = "SELECT * from mahasiswa where NIF='$nif' order by NO desc limit 1"; 
			$result = mysql_query($q); 
			while ($data = mysql_fetch_array($result)) { 
			echo "
			<tr>
			<td align=center>".$data['NIF']."</td>
			<td>".$data['NAMA']."</td>
			<td align=center><a class='btn_cetak' href='edit_mahasiswa1.php?nif=$nif'>Perbarui</a> </td>
			</tr>";
			}
			echo "</tbody></table>";
		}
	}
?>
	  </td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
