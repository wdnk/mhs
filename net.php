<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_akademik = "175.111.88.169";
$database_akademik = "sia";
$username_akademik = "sia";
$password_akademik = "sia_2012";
$akademik = mysql_pconnect($hostname_akademik, $username_akademik, $password_akademik) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_akademik) or die("Database sia tidak bisa dibuka");;
?>