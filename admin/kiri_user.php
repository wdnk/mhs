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
	    $date = "{$date} {$suffix}";
	    return $date;
} 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>


<style type="text/css">
<!--
.style1 {
	font-size: 12px;
	color: #ffffff;
}
body {
	background-image: url(../img/bg.gif);
}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body onLoad="MM_preloadImages('../img/home1.png','../img/edit2.png','../img/laporan2.png','../img/DAA2.png','../img/logout2.png')">
<table width="235" border="0">
  <tr>
    <td><a href="index.php" target="_parent"><img src="../img/logo.png" width="235" height="125" border="0"></a></td>
  </tr>
  <tr>
    <td height="6"><div align="center" class="style1"><? echo indonesian_date (); ?></div></td>
  </tr>
  <tr>
    <td height="7">&nbsp;</td>
  </tr>
  <tr>
    <td height="7"></td>
  </tr>
  <tr>
    <td height="7"><a href="index_user.php" target="_parent" onMouseOver="MM_swapImage('home','','../img/home1.png',1)" onMouseOut="MM_swapImgRestore()"><img src="../img/home.png" alt="Back to Home" name="home" width="230" height="35" border="0"></a></td>
  </tr>
  <tr>
    <td height="25"><a href="form_report.php" target="mainFrame" onMouseOver="MM_swapImage('laporan','','../img/laporan2.png',1)" onMouseOut="MM_swapImgRestore()"><img src="../img/laporan1.png" name="laporan" width="230" height="35" border="0"></a></td>
  </tr>
  <tr>
    <td><a href="http://akademik.ugm.ac.id/2013/home.php?ma=profil&ms=mhs_profile" target="mainFrame" onMouseOver="MM_swapImage('daa','','../img/DAA2.png',1)" onMouseOut="MM_swapImgRestore()"><img src="../img/DAA1.png" name="daa" width="230" height="35" border="0"></a></td>
  </tr>
  <tr>
    <td height="25"><a href="../logout.php" target="_parent" onMouseOver="MM_swapImage('logout','','../img/logout2.png',1)" onMouseOut="MM_swapImgRestore()"><img src="../img/logout1.png" name="logout" width="230" height="35" border="0"></a></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td height="12"></td>
  </tr>
  <tr>
    <td height="25"><div align="center"><img src="../img/akeh.png" width="138" height="200"></div></td>
  </tr>
  <tr>
    <td height="25"></td>
  </tr>
</table>
<blockquote>&nbsp;</blockquote>
</body>
</html>
