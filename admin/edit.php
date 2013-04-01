<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Edit data mahasiswa</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<body>
 <span style="font-family: inherit; font-size: small;"><head>
</head>
<body>
 	<?php
		include "../koneksi.php";
  		$id_edit=$_GET['NO'];
  		$queri="select * from mahasiswa where NO='".$id_edit."'";
  		$execute=mysql_query($queri);
  		$baris=mysql_fetch_array($execute);
    ?>
	
    <form action="edit_mhs.php" method="post">
     <table width="800" border="0" align="center">
        <tr align="center" bgcolor="#0066FF">
   <td height="30" colspan="3"><span class="style1">Form Edit Data Mahasiswa </span></td>
       </tr>
        <tr>
         <td colspan="3"><input type="hidden" name="t_id" value="<? echo "$baris[NO]" ?>"></td>
        </tr>
        <tr>
          <td height="12" colspan="3"><table width="795" border="0" align="center">
            <tr>
              <td width="250">
Nomor	Induk Universitas	</td>
              <td width="20">:</td>
              <td width="525">
			<?php
			include "../koneksi.php";
			$id_edit=$_GET['NO'];
  			$kueri1="select * from mahasiswa where NO='".$id_edit."'";
			$hasil1 = mysql_query($kueri1);
			while($data1 = mysql_fetch_array($hasil1))
			{
			echo "".$data1['NIU']."";  
			}
			?>
			  </td>
            </tr>
            <tr>
              <td>Nomor Induk Fakultas </td>
              <td>:</td>
              <td><?php
			include "../koneksi.php";
			$query = "SELECT * FROM mahasiswa";
			$hasil = mysql_query($query);
			while($data = mysql_fetch_array($hasil))
			{
			echo "".$data['NIF']."";  
			}
			?></td>
            </tr>
            <tr>
              <td>Nama Mahasiswa </td>
              <td>:</td>
              <td><?php
			include "../koneksi.php";
			$query = "SELECT * FROM mahasiswa";
			$hasil = mysql_query($query);
			while($data = mysql_fetch_array($hasil))
			{
			echo "".$data['NAMA']."";  
			}
			?></td>
            </tr>
            <tr>
              <td>Angkatan</td>
              <td>:</td>
              <td><?php
			include "../koneksi.php";
			$query = "SELECT * FROM mahasiswa";
			$hasil = mysql_query($query);
			while($data = mysql_fetch_array($hasil))
			{
			echo "".$data['ANGKATAN']."";  
			}
			?></td>
            </tr>
            <tr>
              <td>Nomor Test </td>
              <td>:</td>
              <td><?php
			include "../koneksi.php";
			$query = "SELECT * FROM mahasiswa";
			$hasil = mysql_query($query);
			while($data = mysql_fetch_array($hasil))
			{
			echo "".$data['NOTEST']."";  
			}
			?></td>
            </tr>
            <tr>
              <td>Jalur Masuk </td>
              <td>:</td>
              <td><?php
			include "../koneksi.php";
			$query = "SELECT * FROM mahasiswa";
			$hasil = mysql_query($query);
			while($data = mysql_fetch_array($hasil))
			{
			echo "".$data['JALUR']."";  
			}
			?></td>
            </tr>
            <tr>
              <td>Jenis Kelamin </td>
              <td>:</td>
              <td><?php
			include "../koneksi.php";
			$query = "SELECT * FROM mahasiswa";
			$hasil = mysql_query($query);
			while($data = mysql_fetch_array($hasil))
			{
			echo "".$data['JK']."";  
			}
			?></td>
            </tr>
            <tr>
              <td>Jenjang Studi </td>
              <td>:</td>
              <td><?php
			include "../koneksi.php";
			$query = "SELECT * FROM mahasiswa";
			$hasil = mysql_query($query);
			while($data = mysql_fetch_array($hasil))
			{
			echo "".$data['jenjang']."";  
			}
			?></td>
            </tr>
            <tr>
              <td>Program Studi </td>
              <td>:</td>
              <td>
			  <?php
			include "../koneksi.php";		
			$a = "SELECT mahasiswa.PRODI, mahasiswa.NAMA, program.PRODI, program.PS from mahasiswa LEFT JOIN program ON mahasiswa.PRODI = program.PRODI";
			$b = mysql_query($a);
			while($c = mysql_fetch_array($b))
			{
			echo "".$c['PS']."";  
			}

			?></td>
            </tr>
            <tr>
              <td>Alamat Mahasiswa </td>
              <td>:</td>
              <td><input name="alamat" type="text" id="alamat" value="
			  			<?php
			include "../koneksi.php";
			$query = "SELECT * FROM mahasiswa";
			$hasil = mysql_query($query);
			while($data = mysql_fetch_array($hasil))
			{
			echo "".$data['NIU']."";  
			}
			?>
			  
			  
			  <?php echo $baris['ALAMAT'];?>" size="50" ></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="25" colspan="3">&nbsp;</td>
        </tr>
        <tr>
         <td>PLU</td>
            <td>:</td>
            <td><input type="text" name="t_plu" maxlength="4" value="<? echo "$baris[ALAMAT]" ?>"></td>
        </tr>
        <tr>
         <td>NAMA</td>
            <td>:</td>
            <td><input type="text" name="t_nama" maxlength="20" value="<? echo "$baris[NAMA]" ?>"></td>
        </tr>
        <tr>
         <td>DESC</td>
            <td>:</td>
            <td><input type="text" name="t_desc" maxlength="30" value="<? echo "$baris[DESKRIPSI]" ?>"></td>
        </tr>
        <tr>
         <td>BARCODE</td>
            <td>:</td>
            <td><input type="text" name="t_barcode" maxlength="10" value="<? echo "$baris[BARCODE]" ?>"></td>
        </tr>
    </table>
    

    <center><input type="submit" value="Edit" name="btn_tambah">&nbsp;
    </center>
</form>
		
</body>
</html></span>
</body>
</html></span>

</body>
</html>
