<?php
include "../../core/config.inc.php";
include "../../core/connection.php";
echo "<script language=\"JavaScript\" src=\"js/form_validation.js\"></script>";

echo "<select name='kecamatan' class='cmb'>";
echo "<option value=\"\">- Select Kecamatan -</option>";
$query = "select KecCode, KecDesc from m_kecamatan where RegionCode='$_GET[kode]'";
$result = mysqli_query($connection,$query);
while ($kec=mysqli_fetch_array($result))
	{
		echo "<option value=$kec[0]>$kec[1]</option>";
	}
echo "</select>";
?>
