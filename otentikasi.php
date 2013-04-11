<?php
session_start();
include('koneksi.php');

//tangkap data dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
//untuk mencegah sql injection
//kita gunakan mysql_real_escape_string
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

//cek data yang dikirim, apakah kosong atau tidak
if (empty($username) && empty($password)) {
    //kalau username dan password kosong
    header('location:index.php?error=1');
    break;
} else if (empty($username)) {
    //kalau username saja yang kosong
    header('location:index.php?error=2');
    break;
} else if (empty($password)) {
    //kalau password saja yang kosong
    //redirect ke halaman index
    header('location:index.php?error=3');
    break;
}

 
// query untuk mendapatkan record dari username
	$query = "SELECT * FROM user WHERE username = '$username'";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);

// cek kesesuaian password
	if ($password == $data['password'])
	{
    	//echo "<h1>Login Sukses</h1>";
    	// menyimpan username dan level ke dalam session
    	$_SESSION['level'] = $data['level'];
    	$_SESSION['username'] = $data['username'];
		//echo "Selamat datang $user";
    	//echo "<p>";
		// tampilkan menu
    	header('location:admin/index_user.php');

	}
else {
    //kalau username ataupun password tidak terdaftar di database
    header('location:index.php?error=4');
}
?>