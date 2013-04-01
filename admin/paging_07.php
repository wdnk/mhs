<link href="file:///K|/CD%20Buku/Trik%20Rahasia%20Master%20PHP/SOURCE%20CODE/bab%201/roundcorner.css" rel="stylesheet" type="text/css">
<?php
include "../koneksi.php";
$jenjang= $_POST['jenjang']; 
$prodi= $_POST['prodi']; 
$country= $_POST['country'];

echo "<table align=center><tr><th>No</th><th>Nama</th><th>Alamat</th></tr>";

// Langkah 1: Tentukan batas,cek halaman & posisi data
$batas   = 2;
$halaman = $_GET['halaman'];
if(empty($halaman)){
	$posisi  = 0;
	$halaman = 1;
}
else{
	$posisi = ($halaman-1) * $batas;
}

//Langkah 2: Sesuaikan perintah SQL
$tampil = "SELECT * from mahasiswa where jenjang='$jenjang' and PRODI='$prodi' and KS='$country' order by NIF LIMIT $posisi,$batas";
$hasil  = mysql_query($tampil);

$no = $posisi+1;
while($r=mysql_fetch_array($hasil)){
  echo "<tr><td>$no</td><td>$r[NIU]</td><td>$r[NAMA]</td></tr>";
  $no++;
}
echo "</table><br>";

//Langkah 3: Hitung total data dan halaman 
$tampil2 = mysql_query("SELECT * from mahasiswa where jenjang='$jenjang' and PRODI='$prodi' and KS='$country'");
$jmldata = mysql_num_rows($tampil2);
$jmlhal  = ceil($jmldata/$batas);

echo "<div class=paging>";
// Link ke halaman sebelumnya (previous)
if($halaman > 1){
	$prev=$halaman-1;
	echo "<span class=prevnext><a href=$_SERVER[PHP_SELF]?halaman=$prev>« Prev</a></span> ";
}
else{ 
	echo "<span class=disabled>« Prev</span> ";
}

// Tampilkan link halaman 1,2,3 ...
for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman){
	echo " <a href=$_SERVER[PHP_SELF]?halaman=$i>$i</a> ";
}
else{
	echo " <span class=current>$i</span> ";
}

// Link kehalaman berikutnya (Next)
if($halaman < $jmlhal){
	$next=$halaman+1;
	echo "<span class=prevnext><a href=$_SERVER[PHP_SELF]?halaman=$next>Next »</a></span>";
}
else{ 
	echo "<span class=disabled>Next »</span>";
}
echo "</div>";
echo "<p align=center>Total anggota : <b>$jmldata</b> orang</p>";
?>
