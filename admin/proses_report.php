<?php
include_once ('../koneksi.php');

if(!isset($_SESSION)){
	session_start();
}

include_once ('../cek.php');
// koneksi ke mysql

// membaca username yang disimpan dalam session
$user = $_SESSION['username'];				

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Proses Report</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p></p>

<?php

$jenjang=$_POST['jenjang'];
$country=$_POST['country'];
$prodi=$_POST['prodi'];

if($jenjang=="" || $country=="") {

echo "<span>Maaf, Njenengan harus memilih semua</span>";
echo "<a href='form_report.php'><img src='../img/ok1.png' name='ok'></a><br><br>";
}
else {

echo "<table width='1820' border='1' cellpadding='3' ><tr>
<th align='center' width='35' height='35' bgcolor='333333' class='style2'>No</th>
<th align='center' width='35' height='35' bgcolor='333333' class='style2'>NIF</th>
<th align='center' width='250' height='35' bgcolor='333333' class='style2'>Nama</th>
<th align='center' width='45' height='35' bgcolor='333333' class='style2'>Angkatan</th>
<th align='center' width='75' height='35' bgcolor='333333' class='style2'>Jenjang Studi</th>
<th align='center' width='190' height='35' bgcolor='333333' class='style2'>Program Studi</th>
<th align='center' width='35' height='35' bgcolor='333333' class='style2'>IPK</th>
<th align='center' width='50' height='35' bgcolor='333333' class='style2'>SKS Kum.</th>
<th align='center' width='50' height='35' bgcolor='333333' class='style2'>Tugas Akhir</th>
<th align='center' width='100' height='35' bgcolor='333333' class='style2'>Kategori Satus</th>
<th align='center' width='100' height='35' bgcolor='333333' class='style2'>Status Detail</th>
<th align='center' width='75' height='35' bgcolor='333333' class='style2'>Target Lulus</th>
<th align='center' width='200' height='35' bgcolor='333333' class='style2'>Catatan</th>
<th align='center' width='100' height='35' bgcolor='333333' class='style2'>Tanggal Update</th>
</tr>";

// Langkah 1: Tentukan batas,cek halaman & posisi data
$batas   = 12000;

if(empty($_GET['halaman'])){
	$posisi  = 0;
	$halaman = 1;
}
else{
	$halaman = $_GET['halaman'];
	$posisi = ($halaman-1) * $batas;
}

//$tampil = "select * from (mahasiswa LEFT JOIN jenjang ON mahasiswa.jenjang = jenjang.NO_ID) LEFT JOIN program ON mahasiswa.PRODI = program.PRODI where jenjang='$jenjang' || PRODI='$prodi' || KS='$country' order by NIF LIMIT $posisi,$batas";
//Langkah 2: Sesuaikan perintah SQL
$prodi=$_POST['prodi'];
$jenjang=$_POST['jenjang'];
$country=$_POST['country'];

//menampilkan hanya 1 data terbaru yang mewakili
$tampil_jenjang = "select * from mahasiswa 
LEFT JOIN jenjang ON mahasiswa.jenjang = jenjang.NO_ID 
LEFT JOIN program ON program.prodi = mahasiswa.prodi
where mahasiswa.PRODI='$prodi' 
and KS='$country' 
and NO=(
select MAX(NO)
from mahasiswa AS a
where a.NIF=mahasiswa.NIF)
order by NO desc";
$tampil_prodi = "select * from mahasiswa LEFT JOIN program ON mahasiswa.PRODI = program.PRODI where KS='$country' and mahasiswa.PRODI='$prodi'";
$tampil_KS = "SELECT * from mahasiswa LEFT JOIN m_country ON mahasiswa.KS = m_country.CountryCode where KS='$country' and PRODI='$prodi'";
$tampil_SD = "SELECT * from mahasiswa LEFT JOIN m_province ON mahasiswa.ProvinceCode = m_province.ProvinceCode where KS='$country' and PRODI='$prodi'";

//$hasil_semua  = mysql_query($tampil_semua);
$hasil  = mysql_query($tampil_jenjang);
//echo $tampil_prodi;
$hasil2  = mysql_query($tampil_prodi);
$hasil3 = mysql_query($tampil_KS);
$hasil4 = mysql_query($tampil_SD);

if($hasil2 === FALSE) {
    die(mysql_error()); 
}else{
	$s = mysql_fetch_array($hasil2);
}

if($hasil3 === FALSE) {
    die(mysql_error()); 
}else{
	$f = mysql_fetch_array($hasil3);
}

if($hasil4 === FALSE) {
    die(mysql_error()); 
}else{
	$i = mysql_fetch_array($hasil4);
}

//$e=mysql_fetch_array($hasil_semua);

$no = $posisi+1;
while($r=mysql_fetch_array($hasil))
{


  echo "<tr>
  <td align='center' width='35' height='30' id='td2'>$no</td>
  <td align='center' width='35' height='30' id='td2'>$r[NIF]</td>
  <td align='center' width='250' height='30' id='td2'>$r[NAMA]</td>
  <td align='center' width='45' height='30' id='td2'>$r[ANGKATAN]</td>
  <td align='center' width='75' height='30' id='td2'>$r[NJ]</td>
  <td align='center' width='190' height='30' id='td2'>$r[PS]</td>
  <td align='center' width='35' height='30' id='td2'>$r[IPK]</td>
  <td align='center' width='50' height='30' id='td2'>$r[SKS]</td>
  <td align='center' width='50' height='30' id='td2'>$r[TA]</td>
  <td align='center' width='100' height='30' id='td2'>$f[CountryDesc]</td>
  <td align='center' width='100' height='30' id='td2'>$i[ProvinceDesc]</td>
  <td align='center' width='75' height='30' id='td2'>$r[bulan] $r[Tahun]</td>
  <td align='center' width='200' height='30' id='td2'>$r[catatan]</td>  
  <td align='center' width='100' height='30' id='td2'>$r[DATE] - $r[TIME]</td>  
  </tr>";
  $no++;
}

//Langkah 3: Hitung total data dan halaman 
$tampil2 = mysql_query("select * from mahasiswa where PRODI='$prodi' && KS='$country' GROUP BY NIF order by NO desc");
$jmldata = mysql_num_rows($tampil2);
$jmlhal  = ceil($jmldata/$batas);

echo "<tr><td colspan='14'>Total data : <b>$jmldata</b> </td></tr>";
}
echo "</table>";
?>


</body>
</html>