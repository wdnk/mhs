<?php

session_start();
include "../koneksi.php";
include "../cek.php";
// koneksi ke mysql

// membaca username yang disimpan dalam session
$user = $_SESSION['username'];
?>
<?php
 	// koneksi mysql
	include "../koneksi.php";
	include "../core/config.inc.php";
	include "../core/connection.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>form input mahasiswa</title>
<script type="text/javascript" src="../jquery/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="../jquery/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#input_mhs").validate({
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


<script language="JavaScript" type="text/JavaScript">

 function showKab()
 {
 <?php
 
 // membaca semua jenjang
 $query = "SELECT * FROM jenjang";
 $hasil = mysql_query($query);
 
 // membuat if untuk masing-masing pilihan propinsi beserta isi option untuk combobox kedua
 while ($data = mysql_fetch_array($hasil))
 {
   $idProp = $data['NO_ID'];

   // membuat IF untuk masing-masing propinsi
   echo "if (document.input_mhs.nm_jenjang.value == \"".$idProp."\")";
   echo "{";

   // membuat option kabupaten untuk masing-masing propinsi
   $query2 = "SELECT * FROM program WHERE NO_ID = $idProp";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('nm_prodi').innerHTML = \"";
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['PRODI']."'>".$data2['PS']."</option>";   
   }
   $content .= "\"";
   echo $content;
   echo "}\n";   
 }

 ?> 
 }
 
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
<form action="proses_input_mhs.php" method="post" name="input_mhs" id="input_mhs">
  <table width="100%" border="0">
    <tr background="../img/bg_form.jpg">
      <td height="35" colspan="6"><div align="center"><strong> Form Input Mahasiswa </strong></div></td>
    </tr>
    <tr>
      <td width="5">&nbsp;</td>
      <td width="217">Nomor Induk Universitas </td>
      <td width="8">:</td>
      <td width="254"><input name="niu" type="text" id="niu" size="7" maxlength="7" class="required" title="NIU wajib diisi"></td>
      <td width="186"><span class="style3">*) maksimal 5 karakter </span></td>
      <td width="8" rowspan="8"><div align="center"></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Nomor Induk Fakultas </td>
      <td>:</td>
      <td>        <input name="nif" type="text" id="nif" size="5" maxlength="5" class="required" title="NIF wajib diisi"></td>
      <td><span class="style3">*) maksimal 7 karakter </span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Nama Mahasiswa </td>
      <td>:</td>
      <td><input name="nm_mhs" type="text" id="nm_mhs" size="35" class="required" title="Nama wajib diisi"></td>
      <td><span class="style3">*) huruf KAPITAL </span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Angkatan</td>
      <td>:</td>
      <td><select name="tahun" id="tahun">
	  <option selected="selected">-- Pilih Tahun --</option>
	  <?php
	  for($i=1970; $i<=2030; $i+=1){
	  	echo"
	  <option value=$i>$i</option>";
		}
		?>
      </select></td>
      <td><span class="style3">*) Pilih tahun angkatan mahasiswa </span></td>
    </tr>
    <tr>
      <td rowspan="4">&nbsp;</td>
      <td>No Test </td>
      <td>:</td>
      <td><input name="notest" type="text" id="notest" size="15" maxlength="15"></td>
      <td><span class="style3">*) Masukkan nomor test mahasiswa</span></td>
    </tr>
    <tr>
      <td>Jalur Masuk </td>
      <td>:</td>
      <td><select name="jalur_masuk" id="jalur_masuk">
	  <option selected="selected">-- Jalur Masuk --</option>
	  <option value="UMPTN">UMPTN</option>
	  <option value="SNMPTN/SPMB ">SNMPTN/SPMB </option>
	  <option value="PBS ">PBS </option>
	  <option value="PBUD ">PBUD </option>
	  <option value="UM UGM ">UM UGM </option>
	  <option value="PBUPD ">PBUPD </option>
        <option value="PBUTM">PBUTM</option>
        <option value="PBOS ">PBOS </option>
        <option value="Kerjasama ">Kerjasama </option>
        <option value="SNMPTN Undangan">SNMPTN Undangan</option>
        <option value="Swadaya UM ">Swadaya UM </option>
        <option value="PBUB">PBUB</option>
        <option value="PBS Diploma">PBS Diploma</option>
        <option value="Diploma">Diploma</option>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Jenis Kelamin </td>
      <td>:</td>
      <td><select name="jk" id="jk">
	  <option selected="selected">-- Jenis Kelamin anda --</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Jenjang Studi </td>
      <td>:</td>
      <td><select name="nm_jenjang" id="nm_jenjang" onChange="showKab()">
    <option>-- Pilih Jenjang --</option>
    <?php
	
                 // query untuk menampilkan propinsi
                 $query = "SELECT * FROM jenjang";
                 $hasil = mysql_query($query);
                 while ($data = mysql_fetch_array($hasil))
                 {
                    echo "<option value='".$data['NO_ID']."'>".$data['NJ']."</option>";
                 }
          ?>
  </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Program Studi </td>
      <td>:</td>
      <td><select name="nm_prodi" id="nm_prodi" onchange="showKat()">
      </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Alamat Mahasiswa </td>
      <td>:</td>
      <td><textarea name="alamat_mhs" id="alamat_mhs"></textarea></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Alamat Orang Tua </td>
      <td>:</td>
      <td><textarea name="alamat_ortu" id="alamat_ortu"></textarea></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Catatan</td>
      <td>:</td>
      <td><textarea name="catatan" id="catatan"></textarea></td>
      <td>&nbsp;</td>
      <td rowspan="2">&nbsp;</td>
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
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
