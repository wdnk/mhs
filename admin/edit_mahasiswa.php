 	<?php
		include "../koneksi.php";
  		$id_edit=$_GET['NO'];
  		//$queri="select * from mahasiswa where NO='".$id_edit."'";
		$queri="select * from mahasiswa where NO='$_GET[id]'";
  		$execute=mysql_query($queri);
  		$baris=mysql_fetch_array($execute);
		//$baris=mysql_fetch_object($execute);

			include "../koneksi.php";		
			$a = "SELECT mahasiswa.PRODI, mahasiswa.NAMA, program.PRODI, program.PS from mahasiswa LEFT JOIN program ON mahasiswa.PRODI = program.PRODI where NO='$_GET[id]'";
			$b = mysql_query($a);
			$c = mysql_fetch_array($b);
			
		include "../core/config.inc.php";
		include "../core/connection.php";
		//require_once('lib/query.php'); 
	?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Edit data mahasiswa</title>
<script language="text/javascript" src="../js/form_validation.js"></script>
<script language="text/javascript" src="../js/myform.js"></script>
<script type="text/javascript" src="../jquery/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="../jquery/jquery.validate.pack.js"></script>

<script type="text/javascript">
<!--
$(document).ready(function() {
	$("#editmhs").validate({
		messages: {
			email: {
				required: "E-mail harus diisi",
				email: "Masukkan E-mail yang valid"
			}
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		}
	});
})

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

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

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<style type="text/css">
input.error, select.error { border: 1px solid red; }
label.error { color:red; margin-left: 10px; }
td { padding: 3px; }


<!--
.style7 {color: #000000}
.style8 {
	font-size: 12px;
	color: #FF0000;
}
.style11 {font-size: 12px; color: #FF0000; font-weight: bold; }
body {
	background-image: url(../img/bg.gif);
}
-->
</style>
</head>

<body onLoad="MM_preloadImages('../img/button1b.png')">

 	<form action="" method="post" name="editmhs" id="editmhs">

        <table width="800" border="0" align="center" bgcolor="#E5E5E5">
          <tr background="../img/bg_form.jpg">
            <td height="30" colspan="5"><div align="center"><strong>Edit Data Mahasiswa </strong></div></td>
          </tr>
          <tr>
            <td width="12">&nbsp;</td>
            <td width="188">&nbsp;</td>
            <td width="18">&nbsp;</td>
            <td width="284">&nbsp;</td>
            <td width="276">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span class="style7">Nomor Induk Universitas </span></td>
            <td>:</td>
            <td valign="top"><input name="niu" type="text" id="niu" value="<?php echo $baris['NIU'];?>" size="7" maxlength="7" readonly="readonly"> 
              <span class="style8">*</span></td>
            <td valign="top"><span class="style8">*) Data tidak bisa diubah </span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span class="style7">Nomor Induk Fakultas </span></td>
            <td>:</td>
            <td><input name="nif" type="text" id="nif" value="<?php echo $baris['NIF'];?>" size="5" maxlength="5" readonly="readonly"> <span class="style8">*</span></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span class="style7">Nama Mahasiswa </span></td>
            <td>:</td>
            <td><input name="nama" type="text" id="nama" value="<?php echo $baris['NAMA'];?>" size="35" maxlength="50" readonly="readonly"> <span class="style8">*</span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span class="style7">Angkatan</span></td>
            <td>:</td>
            <td><input name="tahun" type="text" id="tahun" value="<?php echo $baris['ANGKATAN'];?>" size="4" maxlength="4" readonly="readonly"> <span class="style8">*</span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span class="style7">Nomor Test </span></td>
            <td>:</td>
            <td><input name="notest" type="text" id="notest" value="<?php echo $baris['NOTEST'];?>" readonly="readonly"> <span class="style8">*</span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span class="style7">Jalur Masuk </span></td>
            <td>:</td>
            <td><input name="jalur" type="text" id="jalur" value="<?php echo $baris['JALUR'];?>" readonly="readonly"> <span class="style8">*</span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span class="style7">Jenis Kelamin </span></td>
            <td>:</td>
            <td><input name="jenis" type="text" id="jenis" value="<?php echo $baris['JK'];?>" size="1" maxlength="1" readonly="readonly"> <span class="style8">*</span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span class="style7">Jenjang Studi </span></td>
            <td>:</td>
            <td><input name="jenjang" type="text" id="jenjang" value="<?php echo $baris['jenjang'];?>" readonly="readonly"> <span class="style8">*</span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span class="style7">Program Studi </span></td>
            <td>:</td>
            <td><input name="prodi" type="text" id="prodi" value="<?php echo "".$c['PS'].""; ?>" size="35" readonly="readonly"> <span class="style8">*</span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="top">Alamat Mahasiswa </td>
            <td valign="top">:</td>
            <td><textarea name="alamat" cols="26" rows="2" id="alamat"><?php echo $baris['ALAMAT'];?> </textarea> </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="top">Alamat Orang Tua </td>
            <td valign="top">:</td>
            <td><textarea name="alamatot" cols="26" rows="2" id="alamatot"><?php echo $baris['ALAMATOT'];?></textarea></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="top">Indeks Prestasi Kumulatif (IPK) </td>
            <td valign="top">:</td>
            <td><input name="ipk" type="text" id="ipk" size="5" <?php echo $baris['IPK'];?> class="required" title="IPK wajib diisi"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="top">SKS Kumulatif </td>
            <td valign="top">:</td>
            <td><input name="sks" type="text" id="sks" size="5" maxlength="5" <?php echo $baris['SKS'];?> class="required" title="SKS wajib diisi"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="top">Tugas Akhir </td>
            <td valign="top">:</td>
            <td><input name="ta-ya" type="checkbox" id="ta-ya" value="Ya">
              Ya
                <input name="ta-no" type="checkbox" id="ta-no" value="Tidak">
              Tidak</td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="top">Kategori Status </td>
            <td valign="top">:</td>
            <td><select name='kat' id='kat' onChange='DinamisCountry(this);' class="cmb">
			<option value="">-- Kategori Status --</option>		
		
			<?php
			
              		$query = "select * from m_country";
					$result = mysqli_query($connection,$query);
					while ($rotasi=mysqli_fetch_array($result))
					{
			  		  	echo "<option value=$rotasi[1]>$rotasi[2]</option>";
					}
              		echo"</select>";?>
	  
            </select></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="top">Status Detail </td>
            <td valign="top">:</td>
            <td><select name='status' id='status' class="cmb">
			<option value="">-- Status Detil --</option>  	
			
			
            </select>
			
			
			</select></td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      <p>&nbsp;</p>
 	</form>
 	
</body>
</html>
