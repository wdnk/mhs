<?php
if(!isset($_SESSION)){ 
session_start();
}

if (!isset($_SESSION['username']))
{
   echo "<h1>Maaf, Anda belum login</h1>";
   exit;
}
 
?>