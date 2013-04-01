<html>
<head>
<title>LOGIN</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-image: url(img/bg.gif);
}
-->
</style></head>
 
<body>

<form name="login" action="otentikasi.php" method="post">
<table width="900" height="170" border="0" align="center">
  <tr>
    <td><img src="img/loginadmin.png" width="900" height="74"></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="600" height="93" border="0" align="center">
        <tr>
          <td width="235" rowspan="3"><div align="center"><img src="img/login-welcome.gif" width="73" height="79"></div></td>
          <td width="10" rowspan="3">&nbsp;</td>
          <td width="148">Username</td>
          <td width="13">&nbsp;</td>
          <td width="422"><input name="username" type="text" id="username"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td>&nbsp;</td>
          <td><input name="password" type="password" id="password"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Login"></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><div align="center"><?php
//kode php ini kita gunakan untuk menampilkan pesan eror
if (!empty($_GET['error'])) {
    if ($_GET['error'] == 1) {
        echo '<h3>Username dan Password belum diisi!</h3>';
    } else if ($_GET['error'] == 2) {
        echo '<h3>Username belum diisi!</h3>';
    } else if ($_GET['error'] == 3) {
        echo '<h3>Password belum diisi!</h3>';
    } else if ($_GET['error'] == 4) {
        echo '<h3>Username dan Password tidak terdaftar!</h3>';
    }
}
?></div></td>
  </tr>
</table>
</form>
</body>
</html>