<?php
 	// koneksi mysql
	include "../koneksi.php";
	include "../core/config.inc.php";
	include "../core/connection.php";
	session_start();
	include "../cek.php";
	$user = $_SESSION['username'];
?>


<html>
<head>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
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
   echo "if (document.demo.jenjang.value == \"".$idProp."\")";
   echo "{";

   // membuat option kabupaten untuk masing-masing propinsi
   $query2 = "SELECT * FROM program WHERE NO_ID = $idProp";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('program').innerHTML = \"";
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
</head>

<body>
<form name="demo"  method="post"  action="proses_report.php">
<table width="100%">
<tr>
  <td height="35" colspan="3" id="judul"><div id="judul" align="center">Form Laporan Data Mahasiswa</div></td>
</tr>
<tr>
  <td width="316">&nbsp;</td>
  <td width="15">&nbsp;</td>
  <td width="978">&nbsp;</td>
</tr>
<tr>
  <td>Pilih Jenjang Studi </td>
  <td width="15">:</td>
  <td width="978"><select name="jenjang" onChange="showKab()">
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
  </select>    </td>
</tr>
<tr>
  <td>Pilih Program Studi </td>
  <td>:</td>
      <td>
      <select name="prodi" id="program" onchange="showKat()">
      </select>
      </td>	   
</tr>
<tr>
  <td>Pilih Kategori Status </td>
  <td>:</td>
  <td><select name='country' onChange='DinamisCountry(this);' class="cmb">
            		<option value="">-- Pilih Kategori Status --</option>
              		<?php
              		$query = "select * from m_country";
					$result = mysqli_query($connection,$query);
					while ($rotasi=mysqli_fetch_array($result))
					{
			  		  	echo "<option value=$rotasi[1]>$rotasi[2]</option>";
					}?>
           		</select></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><input type="submit" name="Submit" value="Cari"></td>
</tr>
</table>
</form>
</body>
</html>