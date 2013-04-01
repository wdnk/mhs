<?php
//panggil file koneksi.php untuk menghubung ke server
include "../koneksi.php";
session_start();
include "../cek.php";
// membaca username yang disimpan dalam session
$user = $_SESSION['username'];
?>

<style type="text/css">
<!--
.style2 {font-size: 12px; color: #FFFFFF; }
.style3 {font-size: 12px}
.style1 {
	font-size: 18px;
	font-weight: bold;
	}
body {
	background-color: #F0F0F0;
}
-->
</style>

<?php

		$id=$_POST['jenjang'];
		$ta=$_POST['ta'];
		$country=$_POST['country'];
		$provinsi=$_POST['provinsi'];
		$bulan_lulus=$_POST['bulan_lulus'];
		$tahun_lulus=$_POST['tahun_lulus'];
		
if($ta=="" || $country=="" || $provinsi=="" || $bulan_lulus=="" || $tahun_lulus=="") {
echo "<span class='style1'>Maaf, kolom :<br><br>- Tugas Akhir <br>- Kategori Status Terbaru<br>- Status Detail Terbaru<br>- Target Lulus<br>jangan sampai kosong ya !!!</span>";
echo "<p></p>";
echo "<a href='form_cari_data.php'><img src='../img/ok1.png' name='ok'></a></a>";
}
else {
		
//		$queri="select * from mahasiswa LEFT JOIN jenjang ON mahasiswa.jenjang = jenjang.NO_ID where NO='$_GET[id]'";
 // 		$execute=mysql_query($queri);
 // 		$baris=mysql_fetch_array($execute);
		

//------------------------------------------Tugas Akhir----------------------------------------------------------//


//Jika kolom TA kosong maka isikan dari kolom ta2 
//if ($ta=='' || $country=='' || $provinsi=='' || $bulan_lulus=='' || $tahun_lulus=='')
//{
//$kueri1a = "INSERT INTO mahasiswa (NIU,NIF,NAMA,ANGKATAN,NOTEST,JALUR,JK,jenjang,PRODI,ALAMAT,ALAMATOT,IPK,SKS,TA,KS,ProvinceCode,bulan,Tahun,DATE,catatan,TIME) 
//		VALUES 
//		('$_POST[niu]','$_POST[nif]','$_POST[nama]','$_POST[tahun]','$_POST[notest]','$_POST[jalur]','$_POST[jenis]','$_POST[jenj]','$_POST[prod]','$_POST[alamat]','$_POST[alamatot]','$_POST[ipk]','$_POST[sks]','$_POST[ta2]','$_POST[country2]','$_POST[provinsi2]','$_POST[bulan_lulus2]','$_POST[tahun_lulus2]',now(),'$_POST[catatan]',now())";
//$hasil1a = mysql_query($kueri1a);
//}
//else 
//{
//jika semua terisi maka proses perintah berikut
$kueri6 = "INSERT INTO mahasiswa (NIU,NIF,NAMA,ANGKATAN,NOTEST,JALUR,JK,jenjang,PRODI,ALAMAT,ALAMATOT,IPK,SKS,TA,KS,ProvinceCode,bulan,Tahun,DATE,catatan,TIME) 
		VALUES 
		('$_POST[niu]','$_POST[nif]','$_POST[nama]','$_POST[tahun]','$_POST[notest]','$_POST[jalur]','$_POST[jenis]','$_POST[jenj]','$_POST[prod]','$_POST[alamat]','$_POST[alamatot]','$_POST[ipk]','$_POST[sks]','$_POST[ta]','$_POST[country]','$_POST[provinsi]','$_POST[bulan_lulus]','$_POST[tahun_lulus]',now(),'$_POST[catatan]',now())";
$hasil6 = mysql_query($kueri6);
//}
echo "<span class='style1'>Anda telah berhasil update data mahasiswa</span>";
echo "<p></p>";
echo "<a href='form_cari_data.php'><img src='../img/ok1.png' name='ok'></a></a>";
  //  header("location:form_cari_data.php?message=success");

}

?>