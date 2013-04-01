<?php
include "../../core/config.inc.php";
include "../../core/connection.php";
echo "<script language=\"JavaScript\" src=\"js/form_validation.js\"></script>";

echo "<select name='wilayah'  class='cmb' onChange='DinamisWilayah(this);'>";
echo "<option value=\"\">- Select Region -</option>";
$query = "select RegionCode, RegionDesc from m_region where ProvinceCode='$_GET[kode]'";
$result = mysqli_query($connection,$query);
while ($wilayah=mysqli_fetch_array($result))
    {
        echo "<option value=$wilayah[0]>$wilayah[1]</option>";
    }
echo "</select>";
?>
