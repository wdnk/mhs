<?php
 
session_start();
// menghapus session
session_destroy();
//echo "<h1>Anda sudah logout</h1>";
 
header('location:index.php');
?>