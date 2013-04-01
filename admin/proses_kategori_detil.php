<?php
//panggil file koneksi.php untuk menghubung ke server
include "../koneksi.php";
 
//tangkap data dari form
//$nm_prodi = $_POST['nm_prodi'];
//$nm_jenjang = $_POST['nm_jenjang'];
 
//simpan data ke database
$kueri = "INSERT INTO status (SD,ID) VALUES ('$_POST[status]','$_POST[id]')";
$hasil = mysql_query($kueri);
 
if ($hasil) {
    header('location:form_kategori_detil.php?message=success');
}

?>