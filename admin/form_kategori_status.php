<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>form input kategori</title>
<script type="text/javascript" src="../jquery/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="../jquery/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#input_kategori").validate({
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
</style>
</head>

<body>
<form action="proses_input_kategori.php" method="post" name="input_kategori" id="input_kategori">
  <br>
  <table width="520" border="0" align="center" bgcolor="#F3F3F3">
    <tr background="../img/bg_form.jpg">
      <td height="40" colspan="5"><div align="center"><strong>  Input Kategori Status Mahasiswa </strong></div></td>
    </tr>
    <tr>
      <td width="6">&nbsp;</td>
      <td width="142">Kategori Status</td>
      <td width="7">:</td>
      <td width="237"><input name="status" type="text" id="status" size="35" class="required" title="Kategori wajib diisi"></td>
      <td width="106" rowspan="4" valign="top"><div align="center"><img src="../img/ndut.png" width="84" height="104"></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><span class="style3">*) Masukkan kategori status mahasiswa </span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr bgcolor="#CCCCCC">
      <td colspan="5"><div align="center"><span class="style3">** Best view in mozilla firefox ** </span></div></td>
    </tr>
  </table>
</form>
</body>
</html>
