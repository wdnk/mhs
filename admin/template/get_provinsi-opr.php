<?php
include "../../core/config.inc.php";
include "../../core/connection.php";
echo "<script language=\"JavaScript\" src=\"js/form_validation.js\"></script>";

echo "<select name='provinsi' onChange='DinamisProvinsi(this);' class='cmb'>";
echo "<option value=\"\">-- Pilih Status Detil --</option>";
$query = "select ProvinceCode, ProvinceDesc from m_province where CountryCode='$_GET[kode]'";
$result = mysqli_query($connection,$query);
while ($provinsi=mysqli_fetch_array($result))
	{
		echo "<option value=$provinsi[0]>$provinsi[1]</option>";
	}
echo "</select>";
?>
