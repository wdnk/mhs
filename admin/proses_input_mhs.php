<?php
//panggil file koneksi.php untuk menghubung ke server
include "../koneksi.php";
session_start();
include "../cek.php";
// membaca username yang disimpan dalam session
$user = $_SESSION['username'];
 
//tangkap data dari form
//$nm_prodi = $_POST['nm_prodi'];
//$nm_jenjang = $_POST['nm_jenjang'];
 
//simpan data ke database
$kueri = "INSERT INTO mahasiswa (NIU,NIF,NAMA,ANGKATAN,NOTEST,JALUR,JK,jenjang,PRODI,ALAMAT,ALAMATOT,catatan) 
		VALUES 
		('$_POST[niu]','$_POST[nif]','$_POST[nm_mhs]','$_POST[tahun]','$_POST[notest]','$_POST[jalur_masuk]','$_POST[jk]','$_POST[nm_jenjang]','$_POST[nm_prodi]','$_POST[alamat_mhs]','$_POST[alamat_ortu]','$_POST[catatan]')";
$hasil = mysql_query($kueri);
 
if ($hasil) {
    header('location:form_input_mahasiswa.php?message=success');
}

?>