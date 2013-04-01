<?php

session_start();
include "../koneksi.php";
include "../cek.php";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Halaman Admin</title>
</head>

<body>
<?php
//baca level user yang login
$user = $_SESSION['username'];

	$query = "SELECT * FROM user WHERE username = '$user'";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);


if ($_SESSION['level'] == "admin")
	{

echo "<table width='500' border='0' align='center' cellspacing='0'>";
echo "  <tr>
    <td width='235'>&nbsp;</td>
    <td width='129'>&nbsp;</td>
    <td width='130'>&nbsp;</td>
  </tr>";
echo "  
  <tr>
    <td colspan='3'>Selamat datang : "; ?>
	<strong><?php echo $data['real']; ?></strong> <?php echo "</td>";
	echo "
  </tr>
  
  <tr>
    <td colspan='3'>Untuk melanjutkan, silahkan klik tombol &quot;lanjut&quot; dibawah ini. Apabila anda bukan"; ?> <strong><?php echo $data['real']; ?></strong> <?php echo" silahkan klik tombol logout.</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width='130'>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width='130'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan='3'><a href='index.php'><img src='../img/lanjut.png' width='95' height='23' border='0'></a><a href='../index.php'><img src='../img/logout.png' width='95' height='23' border='0'></a></td>
  </tr>
  
</table>";


  	}
else if ($_SESSION['level'] == "user")
{
    // tampilkan menu untuk user biasa
echo "<table width='500' border='0' align='center' cellspacing='0'>";
echo "  <tr>
    <td width='235'>&nbsp;</td>
    <td width='129'>&nbsp;</td>
    <td width='130'>&nbsp;</td>
  </tr>";
echo "  
  <tr>
    <td colspan='3'>Selamat datang : "; ?>
	<strong><?php echo $data['real']; ?></strong> <?php echo "</td>";
	echo "
  </tr>
  
  <tr>
    <td colspan='3'>Untuk melanjutkan, silahkan klik tombol &quot;lanjut&quot; dibawah ini. Apabila anda bukan"; ?> <strong><?php echo $data['real']; ?></strong> <?php echo" silahkan klik tombol logout.</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width='130'>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width='130'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan='3'><a href='index_user.php'><img src='../img/lanjut.png' width='95' height='23' border='0'></a><a href='../index.php'><img src='../img/logout.png' width='95' height='23' border='0'></a></td>
  </tr>
  
</table>";
}

?>
</body>
</html>
