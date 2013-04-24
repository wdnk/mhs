<?php
include "../koneksi.php";
session_start();
include "../cek.php";
// koneksi ke mysql

// membaca username yang disimpan dalam session
$user = $_SESSION['username'];
?>
<?php
function indonesian_date ($timestamp = '', $date_format = 'l, j F Y') {
	    if (trim ($timestamp) == '')
	    {
	            $timestamp = time ();
	    }
	    elseif (!ctype_digit ($timestamp))
	    {
	        $timestamp = strtotime ($timestamp);
	    }
	    # remove S (st,nd,rd,th) there are no such things in indonesia :p
	    $date_format = preg_replace ("/S/", "", $date_format);
	    $pattern = array (
	        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
	        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
	        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
	        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
	        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
	        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
	        '/April/','/June/','/July/','/August/','/September/','/October/',
	        '/November/','/December/',
	    );
	    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
	        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
	        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
	        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
	        'Oktober','November','Desember',
	    );
	    $date = date ($date_format, $timestamp);
	    $date = preg_replace ($pattern, $replace, $date);
	    $date = "{$date}";
	    return $date;
} 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="main">
  <div class="content">
    <div class="content_resize">
      <div id="sidebar"><div id="sidebar-wrapper">
        <div id="logo">
            <div id="ugm"><img src="../img/logo.gif" width="70%" height="70%"></div>
            <div id="head">SISTEM MONITORING MAHASISWA KHUSUS</div>
            <div id="subhead">FAKULTAS TEKNIK</div>
            <div id="subhead">UNIVERSITAS GADJAH MADA</div>
        </div>
        <div id="profile-links">
          <div id="tanggal"><?php echo indonesian_date (); ?></div>
        </div>

        <ul id="main-nav"> 
          <li>
            <a href="index_user.php" target="_parent" class="nav-top-item no-submenu">HOME</a>
          </li>
          <li>
            <a href="update_report.php" target="mainFrame" class="nav-top-item no-submenu">UPDATE DATA TERBARU</a>
          </li>
          <li>
            <a href="form_report.php" target="mainFrame" class="nav-top-item no-submenu">TAMPILKAN MAHASISWA KHUSUS</a>
          </li>
          <li>
            <a href="http://akademik.ugm.ac.id/2013/home.php?ma=profil&ms=mhs_profile" target="mainFrame" class="nav-top-item no-submenu">INFO REG MAHASISWA</a>
          </li>
          <li>
            <a href="../logout.php" target="_parent" class="nav-top-item no-submenu">LOGOUT</a>
          </li>
        </ul>
        <div align="center"><img src="../img/akeh.png" width="40%" height="40%"></div>
      </div>
    </div>
  </div>
</div>
<blockquote>&nbsp;</blockquote>
</body>
</html>
