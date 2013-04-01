<?php
session_start();
include "../cek.php";
// koneksi ke mysql
include "../koneksi.php";
// membaca username yang disimpan dalam session
$user = $_SESSION['user'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Halaman Admin</title>
</head>

<frameset cols="250,*" frameborder="NO" border="0" framespacing="0">
  <frame src="kiri.php" name="leftFrame" scrolling="NO" noresize>
  <frame src="kanan.php" name="mainFrame">
</frameset>
<noframes><body>
</body></noframes>
</html>
