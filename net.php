<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_akademik = "localhost";
$database_akademik = "akadft";
$username_akademik = "akadft";
$password_akademik = "akadft*#*2013";
$akademik = mysqli_connect($hostname_akademik, $username_akademik, $password_akademik); 

if (mysqli_connect_errno($akademik))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

mysql_select_db($database_akademik) or die("Database tidak bisa dibuka");
?>