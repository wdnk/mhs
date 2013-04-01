<?php
//panggil file koneksi.php untuk menghubung ke server
include "../koneksi.php";
session_start();
include "../cek.php";
// koneksi ke mysql

// membaca username yang disimpan dalam session
$user = $_SESSION['username'];
?>
 
//tangkap data dari form
//$nm_prodi = $_POST['nm_prodi'];
//$nm_jenjang = $_POST['nm_jenjang'];
 
//simpan data ke database
$kueri = "INSERT INTO program (PS,NO_ID) VALUES ('$_POST[nm_prodi]','$_POST[nm_jenjang]')";
$hasil = mysql_query($kueri);
 
if ($hasil) {
    header('location:form_input_prodi.php?message=success');
}

?>