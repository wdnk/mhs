<?php
include "../koneksi.php";
session_start();
include "../cek.php";
// koneksi ke mysql

// membaca username yang disimpan dalam session
$user = $_SESSION['username'];
?>
<?php
		include "../koneksi.php";
  		$id_edit=$_GET['NO'];
  		//$queri="select * from mahasiswa where NO='".$id_edit."'";
		$queri="select * from mahasiswa LEFT JOIN jenjang ON mahasiswa.jenjang = jenjang.NO_ID where NO='$_GET[id]'";
  		$execute=mysql_query($queri);
  		$baris=mysql_fetch_array($execute);
				
			$x = "SELECT * from mahasiswa where NO='$_GET[id]'";
			//$a = "select * from mahasiswa left join program on mahasiswa.PRODI=program.PS where NO='$_GET[id]'";
			$y = mysql_query($x);
			$z = mysql_fetch_array($y);

					
			$a = "SELECT * from mahasiswa LEFT JOIN program ON mahasiswa.PRODI = program.PRODI where NO='$_GET[id]'";
			//$a = "select * from mahasiswa left join program on mahasiswa.PRODI=program.PS where NO='$_GET[id]'";
			$b = mysql_query($a);
			$c = mysql_fetch_array($b);
			
					
			$d = "SELECT mahasiswa.KS, m_country.CountryCode, m_country.CountryDesc from mahasiswa LEFT JOIN m_country ON mahasiswa.KS = m_country.CountryCode where NO='$_GET[id]'";
			$e = mysql_query($d);
			$f = mysql_fetch_array($e);
			
				
			$g = "SELECT mahasiswa.ProvinceCode, m_province.ProvinceCode, m_province.ProvinceDesc from mahasiswa LEFT JOIN m_province ON mahasiswa.ProvinceCode = m_province.ProvinceCode where NO='$_GET[id]'";
			$h = mysql_query($g);
			$i = mysql_fetch_array($h);


include "../core/config.inc.php";
include "../core/connection.php";
//require_once('lib/query.php');

echo "<script language=\"JavaScript\" src=\"js/form_validation.js\"></script>";
echo "<script language=\"JavaScript\" src=\"js/myform.js\"></script>";
?>
<script type="text/javascript" src="../jquery/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="../jquery/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#input_detil").validate({
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
</script>

<style type="text/css">
<!--
body {
	background-image: url();
	background-color: #F0F0F0;
}
.style7 {color: #000000}
.style8 {	font-size: 12px;
	color: #FF0000;
}
.style9 {font-size: 12px}
.style11 {font-size: 14px; color: #FF0000; }
-->
</style>
<div id="left">		
  <form action="proses_updatet_mhs.php" method="post" name="frmcust" onSubmit="return valcust()">
  <table width=100% border="0" class="style">
    		<tr background="../img/bg_form.jpg">
      			<td height="35" colspan="6" ><div align="center"><strong>Edit Data Mahasiswa </strong></div></td>
	  </tr>
    		<tr>
    		  <td colspan="5" ><div align="center"><strong>
    		    <input name="id_cust" type="hidden" value="">
   		      </strong></div></td>
			  <td width="414"></td>
	      </tr>
    		<tr>
      			<td width="9">&nbsp;</td>
      			<td width="305">&nbsp;</td>
      			<td width="12">&nbsp;</td>
      			<td colspan="2" wight=20%>&nbsp;   			    </td>
         		<td><div id='iataresult'></div></td>
    		</tr>
    		<tr>
    		  <td>&nbsp;</td>
  		      <td><span class="style7">Nomor Induk Universitas </span></td>
  		      <td>:</td>
  		      <td colspan="2" wight=20%><input name="niu" type="text" id="niu" onChange='Checkiatacust(this);' value="<?php echo $baris['NIU'];?>" size="7" maxlength="7" readonly="readonly">
	          <span class="style8">*</span></td>
   		      <td><span class="style8">*) Tidak bisa dirubah </span></td>
   		  </tr>
    		<tr>
      			<td>&nbsp;</td>
      			<td><span class="style7">Nomor Induk Fakultas </span></td>
      			<td>:</td>
      			<td colspan="2"><input name="nif" type="text" id="nif" value="<?php echo $baris['NIF'];?>" size="5" maxlength="5" readonly="readonly">
   			    <span class="style8">*</span></td>
				
    		    <td>&nbsp;</td>
    		</tr>
    		<tr>
      			<td>&nbsp;</td>
      			<td><span class="style7">Nama Mahasiswa </span></td>
      			<td>:</td>
      			<td colspan="2"><input name="nama" type="text" id="nama" value="<?php echo $baris['NAMA'];?>" size=35 maxlength="50" readonly="readonly">
   			    <span class="style8">*</span></td>
    		    <td>&nbsp;</td>
    		</tr>
    		<tr>
      			<td>&nbsp;</td>
      			<td><span class="style7">Angkatan</span></td>
      			<td>:</td>
      			<td colspan="2"><input name="tahun" type="text" id="tahun" value="<?php echo $baris['ANGKATAN'];?>" size=4 maxlength="4" readonly="readonly">
   			    <span class="style8">*</span></td>
    		    <td>&nbsp;</td>
    		</tr>
    		<tr>
      			<td>&nbsp;</td>
      			<td><span class="style7">Nomor Test </span></td>
      			<td>:</td>
      			<td colspan="2"><input name="notest" type="text" id="notest" value="<?php echo $baris['NOTEST'];?>" readonly="readonly">
   			    <span class="style8">*</span></td>
    		    <td>&nbsp;</td>
    		</tr>
    		<tr>
    		  <td><p class="style7">&nbsp;</p>
   		      </td>
  		      <td><span class="style7">Jalur Masuk </span></td>
  		      <td>:</td>
   		      <td colspan="2"><input name="jalur" type="text" id="jalur" value="<?php echo $baris['JALUR'];?>" readonly="readonly">
	          <span class="style8">*</span></td>
   		      <td>&nbsp;</td>
   		  </tr>
    		<tr>
    		  <td>&nbsp;</td>
  		      <td><span class="style7">Jenis Kelamin </span></td>
  		      <td>:</td>
   		      <td colspan="2"><input name="jenis" type="text" id="jenis" value="<?php echo $baris['JK'];?>" size="1" maxlength="1" readonly="readonly"> <span class="style8">*</span></td>
   		      <td>&nbsp;</td>
   		  </tr>
    		<tr>
    		  <td>&nbsp;</td>
  		      <td><span class="style7">Jenjang Studi </span></td>
  		      <td>:</td>
   		      <td colspan="2"><input name="jenjang" type="text" id="jenjang" value="<?php echo $baris['NJ'];?>" readonly="readonly">	          
   		        <span class="style8">*
	          <input name="jenj" type="hidden" id="jenj" value="<?php echo "".$z['jenjang'].""; ?>">
	          </span></td>
			  
   		      <td>&nbsp;</td>
   		  </tr>
    		<tr>
    		  <td>&nbsp;</td>
  		      <td><span class="style7">Program Studi </span></td>
  		      <td>:</td>
   		      <td colspan="2"><input name="prodi" type="text" id="prodi" value="<?php echo "".$c['PS'].""; ?>" size="35" readonly="readonly">   		        
   		        <span class="style8">*</span>
   		        <input name="prod" type="hidden" id="prod" value="<?php echo "".$c['PRODI'].""; ?>">
	          </td>
   		      <td>&nbsp;</td>
   		  </tr>
    		<tr>
    		  <td valign="top">&nbsp;</td>
  		      <td valign="top">Alamat Mahasiswa </td>
  		      <td valign="top">:</td>
   		      <td colspan="2"><textarea name="alamat" cols="26" rows="2" id="alamat"><?php echo $baris['ALAMAT'];?> </textarea></td>
   		      <td>&nbsp;</td>
   		  </tr>
    		<tr>
    		  <td valign="top">&nbsp;</td>
  		      <td valign="top">Alamat Orang Tua </td>
  		      <td valign="top">:</td>
   		      <td colspan="2"><textarea name="alamatot" cols="26" rows="2" id="alamatot"><?php echo $baris['ALAMATOT'];?></textarea></td>
   		      <td>&nbsp;</td>
   		  </tr>
    		<tr>
    		  <td valign="top">&nbsp;</td>
  		      <td valign="top">Catatan</td>
   		      <td valign="top">:</td>
   		      <td colspan="2"><textarea name="catatan" cols="26" rows="2" id="catatan"><?php echo $baris['catatan'];?></textarea></td>
   		      <td>&nbsp;</td>
   		  </tr>
    		<tr>
    		  <td>&nbsp;</td>
  		      <td>Indeks Prestasi Kumulatif (IPK) </td>
  		      <td>:</td>
   		      <td colspan="2"><input name="ipk" type="text" class="required" id="ipk" title="IPK wajib diisi" value="<?php echo $baris['IPK'];?>" size="5" <?php echo $baris['IPK'];?>> 
   		        <span class="style9">contoh : 2<strong>.</strong>75 </span></td>
   		      <td>&nbsp;</td>
   		  </tr>
    		<tr>
    		  <td>&nbsp;</td>
  		      <td>SKS Kumulatif </td>
  		      <td>:</td>
   		      <td colspan="2"><input name="sks" type="text" class="required" id="sks" title="SKS wajib diisi" value="<?php echo $baris['SKS'];?>" size="5" maxlength="5" <?php echo $baris['SKS'];?>></td>
   		      <td>&nbsp;</td>
   		  </tr>
    		<tr>
    		  <td>&nbsp;</td>
  		      <td>Tugas Akhir </td>
  		      <td>:</td>
   		      <td bgcolor="#CFCFCF"><select name="ta" id="ta">
			  <option value="">-- Pilih --</option>
   		        <option value="Ya">Ya</option>
   		        <option value="Tidak">Tidak</option>
	          </select>
   		        <span class="style8">Harus diisi</span>	            <input name="ta2" type="hidden" id="ta2" value="<?php echo $baris['TA'];?>"></td>
   		      <td>status sebelumnya : </td>
   		      <td><input name="tast" type="text" id="tast" value="<?php echo $baris['TA'];?>" readonly="readonly"></td>
   		  </tr>
    		<tr>
    		  <td>&nbsp;</td>
  		      <td>Kategori Status Terbaru </td>
  		      <td>:</td>
   		      <td width="377" valign="middle" bgcolor="#CFCFCF">
			  
			  <select name='country' onChange='DinamisCountry(this);' class="cmb">
            		<option value="">-- Pilih Kategori Status --</option>
              		<?php
              		$query = "select * from m_country";
					$result = mysqli_query($connection,$query);
					while ($rotasi=mysqli_fetch_array($result))
					{
			  		  	echo "<option value=$rotasi[1]>$rotasi[2]</option>";
					}?>
           		</select>
			  <span class="style8"> Harus diisi
			  <input name="country2" type="hidden" id="country2" value="<?php echo $baris['KS'];?>">
</span></td>
	          <td width="167" valign="middle">status sebelumnya : </td>
	          <td valign="middle"><input name="status_sblm" type="text" id="status_sblm" value="<?php echo "".$f['CountryDesc'].""; ?>" size="35" readonly="readonly">
                <span class="style8">*</span> </td>
   		  </tr>
    		<tr>
    		  <td>&nbsp;</td>
  		      <td>Status Detail Terbaru </td>
  		      <td>:</td>
   		      <td bgcolor="#CFCFCF">
			  
			  <div id='provinsi'><select name="provinsi" class="cmb" id="provinsi" >
			    <option value="">-- Pilih Status Detil --</option></select>
			    <span class="style8">Harus diisi 
			    <input name="provinsi2" type="hidden" id="provinsi2" value="<?php echo $baris['ProvinceCode'];?>">
			    </span></div>
			  
			  </td>
   		      <td>status sebelumnya :</td>
   		      <td><input name="status_sblm" type="text" id="status_sblm" value="<?php echo $i['ProvinceDesc'];?>" size="35" readonly="readonly">
	          <span class="style8">*</span> </td>
   		  </tr>
    		<tr>
    		  <td>&nbsp;</td>
  		      <td>Target Lulus</td>
  		      <td>:</td>
   		      <td bgcolor="#CFCFCF"><select name="bulan_lulus" id="bulan_lulus">
   		        <option value="Januari">Januari</option>
   		        <option value="Februari">Februari</option>
   		        <option value="Maret">Maret</option>
   		        <option value="April">April</option>
   		        <option value="Mei">Mei</option>
   		        <option value="Juni">Juni</option>
   		        <option value="Juli">Juli</option>
   		        <option value="Agustus">Agustus</option>
   		        <option value="September">September</option>
   		        <option value="Oktober">Oktober</option>
   		        <option value="November">November</option>
   		        <option value="Desember">Desember</option>
				<option selected="selected">-- Pilih Bulan --</option>
 		        </select>
   		        <select name="tahun_lulus" id="tahun_lulus">
                <option selected="selected">-- Pilih Tahun --</option>
                <?php
	  for($i=1995; $i<=2030; $i+=1){
	  	echo"
	  <option value=$i>$i</option>";
		}
		?>
                </select>
   		        <span class="style8">Harus diisi </span></td>
   		      <td>status sebelumnya :</td>
   		      <td><input name="lulus" type="text" id="lulus" value="<?php echo $baris['bulan'];?> <?php echo $baris['Tahun'];?>" size="35" readonly="readonly">
	          <span class="style8">*</span> </td>
   		  </tr>
    		<tr>
    		  <td>&nbsp;</td>
  		      <td>&nbsp;</td>
  		      <td>&nbsp;</td>
   		      <td colspan="2"><strong>
	          <input name="bulan_lulus2" type="hidden" id="bulan_lulus2" value="<?php echo $baris['bulan'];?>">	          
	          <input name="tahun_lulus2" type="hidden" id="tahun_lulus2" value="<?php echo $baris['Tahun'];?>">
	            </strong><span class="style11">** Harus diisi, bila ada yang kosong, status akan sama dengan sebelumnya.</span></td>
   		      <td>&nbsp;</td>
   		  </tr>
    		<tr>
    		  <td>&nbsp;</td>
  		      <td>&nbsp;</td>
  		      <td>&nbsp;</td>
   		      <td colspan="2">&nbsp;</td>
   		      <td>&nbsp;</td>
   		  </tr>
    		<tr>
    		  <td>&nbsp;</td>
  		      <td>&nbsp;</td>
   		      <td>&nbsp;</td>
   		      <td><input type="submit" name="Submit" value="Update"></td>
   		      <td>&nbsp;</td>
   		      <td>&nbsp;</td>
   		  </tr>
    		<tr>
    		  <td>&nbsp;</td>
	          <td>&nbsp;</td>
	          <td>&nbsp;</td>
	          <td>&nbsp;</td>
	          <td>&nbsp;</td>
	          <td>&nbsp;</td>
   		  </tr>

    		
            	
  </table>
  <p>&nbsp;</p>
  </form>
</div>
