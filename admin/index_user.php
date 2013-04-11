<?php
if(!isset($_SESSION)){ 
	session_start();
}

include_once ('../cek.php');

// koneksi ke mysql

include_once ('../koneksi.php');
// membaca username yang disimpan dalam session


$user = $_SESSION['username'];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Halaman Admin</title>
</head>

<frameset cols="250,*" frameborder="NO" border="0" framespacing="0">
  <div class="content">
    <div class="content_resize">
		<div class="sidebar">
  			<frame src="kiri_user.php" name="leftFrame" scrolling="NO" noresize>
  		</div>
	  	<div id="main-content">
  			<frame src="kanan_user.php" name="mainFrame">
  		</div>
  	</div>
  </div>
</frameset>
<noframes><body>
</body></noframes>
</html>
