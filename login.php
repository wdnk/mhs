<?php
if(!isset($_SESSION)){
	session_start();
}

include_once "koneksi.php";

$id = $_GET['user'];
if($_POST["Submit"]=="login")
{
$user = $_POST['user']; 
$pass = $_POST['pass']; 

$query="SELECT * FROM user where username='$user' && password='$pass'";
$result=mysql_query($query); 
if(mysql_num_rows($result)>0)  
{  
         list ($user,$pass) = mysql_fetch_row($result);  
         $_SESSION['username']=$user;  
		 if ($_SESSION['username'] == "akademik")
		 {
         header('location: admin/index.php'); 
		 }
else
	{        
         header('location: index.php'); 
	}
 }  
?>
