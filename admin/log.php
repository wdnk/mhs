<?
    //panggil file koneksi.php untuk menghubung ke server
	include "../koneksi.php";
	
	//njupuk data dari form atas
	$nif= $_POST['nif']; 
	$id_edit=$_GET['NO'];
	//$nif= $_GET['nif'];
	
	//query pencarian form NIF = NIF tabel mahasiswa
	$r = "SELECT * from mahasiswa where NIF='$nif' order by DATE asc limit 1 "; 
	$result1 = mysql_query($r); 
	$data1 = mysql_fetch_array($result1);
	
	//query pencarian form NIF = NIF tabel mahasiswa
	$q = "SELECT * from mahasiswa where NIF='$nif' order by NO asc "; 
	$result = mysql_query($q); 
	
	$a = "SELECT mahasiswa.PRODI, mahasiswa.NAMA, program.PRODI, program.PS from mahasiswa LEFT JOIN program ON mahasiswa.PRODI = program.PRODI where NIF='$nif' order by DATE asc limit 1";
	$b = mysql_query($a);
	$c = mysql_fetch_array($b);
	
	$d = "SELECT mahasiswa.KS, m_country.CountryCode, m_country.CountryDesc from mahasiswa LEFT JOIN m_country ON mahasiswa.KS = m_country.CountryCode";
	$e = mysql_query($d);
	$f = mysql_fetch_array($e);
	
				include "../koneksi.php";		
			$g = "SELECT mahasiswa.ProvinceCode, m_province.ProvinceCode, m_province.ProvinceDesc from mahasiswa LEFT JOIN m_province ON mahasiswa.ProvinceCode = m_province.ProvinceCode";
			$h = mysql_query($g);
			$i = mysql_fetch_array($h);
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Log Update Mahasiswa</title>
<style type="text/css">
<!--
.style1 {color: #333333}
body {
	background-color: #F0F0F0;
}
-->
</style>
</head>

<body>
<?php echo "".$f['CountryDesc'].""; ?>

<form name="form1" method="post" action="">

	<table width="100%"  border="0">
      <tr>
        <td width="24%">Nomor Induk Universitas </td>
        <td width="1%">:</td>
        <td width="75%"><?php echo $data1['NIU'];?></td>
      </tr>
      <tr>
        <td>Nomor Induk Fakultas </td>
        <td>:</td>
        <td><?php echo $data1['NIF'];?></td>
      </tr>
      <tr>
        <td>Nama Mahasiswa </td>
        <td>:</td>
        <td><?php echo $data1['NAMA'];?></td>
      </tr>
      <tr>
        <td>Angkatan</td>
        <td>:</td>
        <td><?php echo $data1['ANGKATAN'];?></td>
      </tr>
      <tr>
        <td>Nomor Test </td>
        <td>:</td>
        <td><?php echo $data1['NOTEST'];?></td>
      </tr>
      <tr>
        <td>Jalur Masuk </td>
        <td>:</td>
        <td><?php echo $data1['JALUR'];?></td>
      </tr>
      <tr>
        <td>Jenis Kelamin </td>
        <td>:</td>
        <td><?php echo $data1['JK'];?></td>
      </tr>
      <tr>
        <td>Jenjang Studi </td>
        <td>:</td>
        <td><?php echo $data1['jenjang'];?></td>
      </tr>
      <tr>
        <td>Program Studi </td>
        <td>:</td>
        <td><?php echo "".$c['PS'].""; ?></td>
      </tr>
      <tr>
        <td>Alamat Mahasiswa </td>
        <td>:</td>
        <td><?php echo $data1['ALAMAT'];?></td>
      </tr>
      <tr>
        <td>Alamat Orang Tua </td>
        <td>:</td>
        <td><?php echo $data1['ALAMATOT'];?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>

	<?php
	//echo "<center>";
	echo "<table border='0' width='100%'>";
	echo "
	<tr bgcolor='#CCCCCC'>
	<td align=center height=25 ><span class=style1>IPK</span></td>
	<td align=center height=25 ><span class=style1>SKS</span></td>
	<td align=center height=25 ><span class=style1>TA</span></td>
	<td align=center height=25 ><span class=style1>Status</span></td>
	<td align=center height=25 ><span class=style1>Status Detil</span></td>
	<td align=center height=25 ><span class=style1>Target Lulus</span></td>
	<td align=center height=25 ><span class=style1>Log Operator</span></td>
	<td align=center height=25 ></td>
	</tr>";
	while ($data = mysql_fetch_array($result)) { 
	echo "
	<tr bgcolor='#FFFFCC'>
	<td align=center>".$data['IPK']."</td>
	<td align=center>".$data['SKS']."</td>
	<td align=center>".$data['TA']."</td>
	<td align=center>".$data['KS']."</td>
	<td align=center>".$data['ProvinceCode']."</td>
	<td align=center>".$data['bulan']." ".$data['Tahun']."</td>
	<td align=center>".$data['DATE']."</td>
	<td align=center><a href='hapus_log.php?id=$data[NO]'><img src='../img/button1b.png'></a></td>

	</tr>";
	}
	echo "</table>";
	?>
</form>
</body>
</html>
