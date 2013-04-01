<?php
//panggil file koneksi.php untuk menghubung ke server
include "../koneksi.php";
 
//tangkap data dari form
//$nm_prodi = $_POST['nm_prodi'];
//$nm_jenjang = $_POST['nm_jenjang'];
 
//simpan data ke database
$kueri = "INSERT INTO kategori (KS) VALUES ('$_POST[status]')";
$hasil = mysql_query($kueri);
 
if ($hasil) {
    header('location:form_kategori_status.php?message=success');
}

?>