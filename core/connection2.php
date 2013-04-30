<?php
$db_name = "sia";
$db_user = "mtievent";
$db_pass = "eventmti2013";
$db_host = "localhost";

$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die("Cannot connect to database sia! Check your database setting!");
?>