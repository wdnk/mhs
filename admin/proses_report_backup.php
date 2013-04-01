<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>

<body>

<?php

//panggil koeksine
include "../koneksi.php";

//ambil data dari form report.php
$jenjang= $_POST['jenjang']; 
$prodi= $_POST['prodi']; 
$country= $_POST['country']; 


$q = "SELECT * from mahasiswa where jenjang='$jenjang' and PRODI='$prodi' and KS='$country' order by NIF"; //query to get the search result
$result = mysql_query($q); //execute the query $q
echo "<center>";
echo "<h2> Hasil Searching </h2>";
echo "<table border='1' cellpadding='5' cellspacing='8'>";
echo "
<tr bgcolor='orange'>
<td>No</td>
<td>Nama Mahasiswa</td>
<td>Alamat</td>
</tr>";
while ($data = mysql_fetch_array($result)) {  //fetch the result from query into an array
echo "

<tr>
<td>".$data['NIF']."</td>
<td>".$data['NIU']."</td>
<td>".$data['NAMA']."</td>
</tr>";
}
echo "</table>";
?>


</body>
</html>
