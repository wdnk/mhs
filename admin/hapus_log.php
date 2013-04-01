<?php
		include "../koneksi.php";
		
		//kuerinya
		$queri="delete from mahasiswa where NO='".$_GET["id"]."'";
  		$execute=mysql_query($queri);
  		//$baris=mysql_fetch_array($execute);
		
		if ($execute) {
    header('location:form_input_log.php?message=success');
}
?>
		