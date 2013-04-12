<?php
session_start();
include "../cek.php";
// koneksi ke mysql
include "../koneksi.php";
// membaca username yang disimpan dalam session
$user = $_SESSION['username'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Sistem Monitoring Mahasiswa Khusus</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td width="52">&nbsp;</td>
    <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="7"><span>SISTEM MONITORING MAHASISWA KHUSUS</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="7"><div align="justify">Selamat datang di halaman <span>SISTEM MONITORING MAHASISWA yang perlu perhatian khusus. </span><br>
  Untuk kenyamanan tampilan, silahkan menggunakan browser Mozilla Firefox atau Google Chrome </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="119" height="35"><img src="../img/firefox.png" width="37" height="35"></td>
    <td width="133"><img src="../img/chrome.png" width="37" height="35"></td>
    <td width="171"><img src="../img/php.png" width="61" height="35"></td>
    <td width="166"><img src="../img/ajax.png" width="61" height="35"></td>
    <td width="274"><img src="../img/jquery.png" width="61" height="35"></td>
    <td width="88">&nbsp;</td>
    <td width="288">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="7">&nbsp;</td>
  </tr>
</table>
</body>
</html>
