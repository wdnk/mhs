<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Melihat Log Mahasiswa</title>
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

h4 { font-size: 8px; }
input { padding: 3px; border: 1px solid #999; }
input.error, select.error { border: 1px solid red; }
label.error { color:red; margin-left: 10px; }
td { padding: 3px; }
<!--
.style3 {
	font-size: 12px;
	color: #666666;
}
-->
<!--
-->
<!--
body {
	background-image: url();
	background-color: #F0F0F0;
}
-->
</style>
</head>

<body>
<form action="log.php" method="post" name="input_detil" id="input_detil">
  <table width="100%" border="0" bgcolor="#F3F3F3">
    <tr background="../img/bg_form.jpg">
      <td height="35" colspan="5"><div align="center"><strong>  Lihat Log Data Mahasiswa </strong></div></td>
    </tr>
    <tr>
      <td width="4">&nbsp;</td>
      <td width="103">NIF</td>
      <td width="6">:</td>
      <td width="199"><input name="nif" type="text" id="nif" size="5" maxlength="5" class="required" title="NIF wajib diisi"></td>
      <td width="106" valign="middle"><div align="center"></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><span class="style3">*) Masukkan Nomor Induk Fakultas </span></td>
      <td width="106" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="106" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Cari"></td>
      <td width="106" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;</td>
    </tr>
  </table>
  
</form>
</body>
</html>
