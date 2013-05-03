<?php
include "../koneksi.php";
session_start();
include "../cek.php";
// koneksi ke mysql

// membaca username yang disimpan dalam session
$user = $_SESSION['username'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<meta name="author" content="Widy Agung Priasmoro" />
	<meta name="copyright" content="Copyright (c) JTETI UGM 2013" />
	<meta name="description" content="" />
	<meta name="keywords" content="Mahasiswa Khusus, Mhs Khusus, UGM" />
	<link href="css/styles.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.4.custom.css"/>
	<link href="css/base.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery.fixheadertable.min.js"></script>	
	<script type="text/javascript">
	    $(document).ready(function()
		{
			$('#table_mahasiswa_khusus').fixheadertable({ 
			        colratio    : [40, 70, 200, 200, 80, 70, 70, 70, 140, 120], 
				    height      : 450, 
				    zebra       : true,
				    resizeCol   : true,
				    sortable    : true,
				    sortedColId : 3, 
				    sortType    : ['integer', 'string', 'string', 'string', 'string', 'date'],
				    dateFormat  : 'm/d/Y',
				    pager       : true,
				    rowsPerPage : 10,
				    minColWidth : 50 
			});
		});
    </script>
	<title>Update Data Mahasiswa Khusus</title>
</head>

<body style="background-color : #FFFFFF; overflow-x : hidden"
	<br><br><p>&nbsp;</p>
	<div class="ui-widget ui-widget-content ui-corner-all" style="padding: 5px; font-size: 1em; width: 100%;">
	<div class="t_fixed_header_main_wrapper ui-widget ui-widget-header ui ui-corner-all">
	<div class="ui-state-active" style="cursor : pointer; display : inline-block; vertical-align : middle; background : none; border : none;">
	</div>
	<div class="t_fixed_header_main_wrapper_child">
	<div class="t_fixed_header ui-state-default ui" style="border: medium none; font-weight: normal;">
	<div class="headtable ui-state-default" style="margin-right : 0px">
	<div>
	<table style="overflow:auto;" id="table_mahasiswa_khusus" title="tabel mahasiswa khusus" class="head">
	<thead>
		<tr>
			<th>No.</th>
			<th>NIF</th>
			<th>Nama</th>
			<th>Prodi</th>
			<th>Angkatan</th>
			<th>Semester</th>
			<th>IPK</th>
			<th>SKS</th>
			<th>Kategori Status</th>
			<th>Perbaharui</th>
		</tr>
	</thead>
	<tbody>
<?php
	$hostname_akademik = "localhost";
	$database_akademik = "sia";
	$username_akademik = "mtievent";
	$password_akademik = "eventmti2013";
	$akademik = mysql_pconnect($hostname_akademik, $username_akademik, $password_akademik) or trigger_error(mysql_error(),E_USER_ERROR); 
	mysql_select_db($database_akademik) or die("Database gagal diakses");;
	//mysql_connect('localhost', 'mtievent', 'eventmti2013');
	//mysql_select_db('sia');
	$no=1;
	$mhs=mysql_query("select mhsNiu, mhsNif, mhsNama, mhsAngkatan, mhsJenisKelamin, mhsAlamatMhs, mhsProdiKode, mhsSksTranskrip, mhsIpkTranskrip, mhsTanggalLulus from mahasiswa WHERE (mhsProdiKode >= 64 AND mhsProdiKode <= 74) AND mhsIsTranskripAkhirDiarsipkan <> 1") or die(mysql_error());
	while($mhs2=mysql_fetch_array($mhs)){
		//$pembimbing_akademik=$mhs2['pembimbing_akademik'];
		//$qq=mysql_query("SELECT inf_dosen.* FROM inf_dosen_prodi inner join inf_dosen on inf_dosen_prodi.kode_dosen=inf_dosen.kode_dosen WHERE inf_dosen_prodi.	id_dosen_prodi='".$pembimbing_akademik."'");
		//$hh=mysql_fetch_array($qq);
		//$nama_dosen=$hh['nama'];
		//$qq=mysql_query("SELECT * FROM inf_program_studi WHERE kode_prodi='".$mhs2['prodi_asal']."'");
		//$hh=mysql_fetch_array($qq);
		//$prodi=$hh['nama'];
		//echo $mhs2['mhsProdiKode'];
		//$semester=null;
		//$status=null;
		$hostname_akademik = "localhost";
		$database_akademik = "sia";
		$username_akademik = "mtievent";
		$password_akademik = "eventmti2013";
		$akademik = mysql_pconnect($hostname_akademik, $username_akademik, $password_akademik) or trigger_error(mysql_error(),E_USER_ERROR); 
		mysql_select_db($database_akademik) or die("Database gagal diakses");;
		//mysql_connect('localhost', 'mtievent', 'eventmti2013');
		//mysql_select_db('sia');
		//mysql_close($conn);
		$qprodi="SELECT * from program_studi WHERE prodiKode=".$mhs2['mhsProdiKode']." AND prodiFakKode='17'";
		$query_prodi=mysql_query($qprodi) or die(mysql_error());
		//echo $qprodi;
		$qq=mysql_fetch_row($query_prodi);
		$niu=$mhs2['mhsNiu'];
		$nif=$mhs2['mhsNif'];
		//echo $nif;
		//exit;
		$nama=$mhs2['mhsNama'];
		$angkatan=$mhs2['mhsAngkatan'];
		$jnsKelamin=$mhs2['mhsJenisKelamin'];
		$alamat=$mhs2['mhsAlamatMhs'];
		$kode_prodi=$mhs2['mhsProdiKode'];
		$sks=$mhs2['mhsSksTranskrip'];
		$IPK=$mhs2['mhsIpkTranskrip'];
	 	$nama_prodi=$qq[6];
	 	$tahun_sekarang = date("Y");
	 	$weekNumber = date("W"); 
	 	$waktu=date("H:i:s");

		
		//$query_mhs = mysql_query("select * from mahasiswa WHERE NIF='$nif'") or die('SQL Error :: '.mysql_error());
		//$hitung_mhs = mysql_num_rows($query_mhs);
		//if($hitung_mhs == null || $hitung_mhs == 0){
			//echo "kosong";
		//}else{
		
	 	//echo $tahun_sekarang."-".$angkatan."<br>";
	 	if($angkatan < 2006){

	 	}else{
	 		//if($IPK >0){
	 					mysql_connect('localhost', 'akadft', 'teknik0417');
						mysql_select_db('akadft_akdemikft');
						$q_prodi="SELECT * from program WHERE PS='".$nama_prodi."'";
						//echo $q_prodi;
						$prodi=mysql_query($q_prodi) or die(mysql_error());
						$qp=mysql_fetch_row($prodi);
						$kd_prodi=$qp[0];
						//echo $kd_prodi;
						//exit;
	 					$semester = $tahun_sekarang - $angkatan;
						$semester = $semester * 2;
						//echo $tahun_sekarang."-".$angkatan."=";
						if($tahun_sekarang == $angkatan){
								$semester = 1;
						}else if(($weekNumber < 35) AND ($weekNumber > 8)){
								$semester=$semester-1;
						}
						//echo $semester."<br>";

						if($semester == 3){
							if($IPK < 2.00 && $sks < 30){
								$status="Evaluasi 2 tahun";
								$semester=$semester+1;
								
								echo "<tr>";
								echo "<td>".$no++."</td>";
								echo "<td>".$niu."</td>";
								echo "<td>".$nama."</td>";
								echo "<td>".$nama_prodi."</td>";
								echo "<td>".$angkatan."</td>";
								echo "<td>".$semester."</td>";
								echo "<td>".$IPK."</td>";
								echo "<td>".$sks."</td>";
								echo "<td>".$status."</td>";
								echo "<td><center><a href=\"edit_mahasiswa1.php?nif=$nif\" class=\"button2 blue\" id=\"button2 blue\">Perbaharui</a></center></td>";
								echo "</tr>";
								
								$q_insert="INSERT INTO temp_mhs (NIU, NIF, NAMA, ANGKATAN, PRODI, ALAMAT, JK, jenjang, IPK, SKS, KS, TIME) VALUES ('$niu', '$nif', '$nama', '$angkatan', '$kd_prodi', '$alamat', '$jnsKelamin', '3', '$IPK', '$sks', '1', '$waktu')";
								mysql_query($q_insert) or die(mysql_error());
						}
						}elseif ($semester == 7){
							if($IPK < 2.00 && $sks < 80){
								$status="Evaluasi 4 tahun";
								$semester=$semester+1;
								
								echo "<tr>";
								echo "<td>".$no++."</td>";
								echo "<td>".$niu."</td>";
								echo "<td>".$nama."</td>";
								echo "<td>".$nama_prodi."</td>";
								echo "<td>".$angkatan."</td>";
								echo "<td>".$semester."</td>";
								echo "<td>".$IPK."</td>";
								echo "<td>".$sks."</td>";
								echo "<td>".$status."</td>";
								echo "<td><center><a href=\"edit_mahasiswa1.php?nif=$nif\" class=\"button2 blue\" id=\"button2 blue\">Perbaharui</a></center></td>";
								echo "</tr>";
								
								$q_insert="INSERT INTO temp_mhs (NIU, NIF, NAMA, ANGKATAN, PRODI, ALAMAT, JK, jenjang, IPK, SKS, KS, TIME) VALUES ('$niu', '$nif', '$nama', '$angkatan', '$kd_prodi', '$alamat', '$jnsKelamin', '3', '$IPK', '$sks', '2', '$waktu')";
								mysql_query($q_insert) or die(mysql_error());
							}
						}
						//mysql_close($conn2);
						/*}elseif($semester == 11){
							$status="Evaluasi Akhir";
								echo "<tr>";
								echo "<td>".$no++."</td>";
								echo "<td>".$niu."</td>";
								echo "<td>".$nama."</td>";
								echo "<td>".$nama_prodi."</td>";
								echo "<td>".$angkatan."</td>";
								echo "<td>".$semester."</td>";
								echo "<td>".$IPK."</td>";
								echo "<td>".$sks."</td>";
								echo "<td>".$status."</td>";
								echo "<td><center><a href=\"#\" class=\"button2 blue\" id=\"button2 blue\">Perbaharui</a></center></td>";
								echo "</tr>";
						}*/
	 		//}
	 	}
	 //}	
	}

		mysql_connect('localhost', 'akadft', 'teknik0417');
		mysql_select_db('akadft_akdemikft');
		$q_mhs = mysql_query("select * from temp_mhs") or die('SQL Error :: '.mysql_error());
		$number=0;
		$masuk=0;
		while($mhs3=mysql_fetch_array($q_mhs)){
			$niu=$mhs3['NIU'];
			$nif=$mhs3['NIF'];
			$nama=$mhs3['NAMA'];
			$angkatan=$mhs3['ANGKATAN'];
			$jnsKelamin=$mhs3['JK'];
			$jenjang=$mhs3['jenjang'];
			$alamat=$mhs3['ALAMAT'];
			$kd_prodi=$mhs3['PRODI'];
			$q_prodi="SELECT * from prodi WHERE id_prodi='".$kd_prodi."'";
			$r_prodi=mysql_query($q_prodi) or die(mysql_error());
			$qp=mysql_fetch_row($r_prodi);
			$nama_prodi=$qp[1];
			
			$tahun_sekarang = date("Y");
			$weekNumber = date("W"); 
			$semester = $tahun_sekarang - $angkatan;
			$semester = $semester * 2;
			
			if($tahun_sekarang == $angkatan){
				$semester = 1;
			}else if(($weekNumber < 35) AND ($weekNumber > 8)){
				$semester=$semester-1;
			}
			$semester=$semester+1;
			$kd_khusus=$mhs3['KS'];
			$q_khus="SELECT * from m_country WHERE CountryCode='".$kd_khusus."'";
			$r_khus=mysql_query($q_khus) or die(mysql_error());
			$qk=mysql_fetch_row($r_khus);
			$status=$qk[2];
			$IPK=$mhs3['IPK'];
			$SKS=$mhs3['SKS'];
			$KS=$mh3s['KS'];
			$waktu=$mhs3['TIME'];
			$query_mhs = mysql_query("select * from mahasiswa WHERE NIF='$nif'") or die('SQL Error :: '.mysql_error());
			if(mysql_num_rows($query_mhs) > 0 ){
				//echo "data di local dan di server sudah sync. Tidak ada data terbaru";
			}else{

				$q_insert="INSERT INTO mahasiswa (NIU, NIF, NAMA, ANGKATAN, PRODI, ALAMAT, JK, jenjang, IPK, SKS, KS, TIME) VALUES ('$niu', '$nif', '$nama', '$angkatan', '$kd_prodi', '$alamat', '$jnsKelamin', '$jenjang', '$IPK', '$sks', '2', '$waktu')";
				mysql_query($q_insert) or die(mysql_error());
				$masuk++;
					/*
					echo "<tr>";
					echo "<td>".$number++."</td>";
					echo "<td>".$niu."</td>";
					echo "<td>".$nama."</td>";
					echo "<td>".$nama_prodi."</td>";
					echo "<td>".$angkatan."</td>";
					echo "<td>".$semester."</td>";
					echo "<td>".$IPK."</td>";
					echo "<td>".$sks."</td>";
					echo "<td>".$status."</td>";
					echo "<td><center><a href=\"edit_mahasiswa1.php?nif=$nif\" class=\"button2 blue\" id=\"button2 blue\">Perbaharui</a></center></td>";
					echo "</tr>";
					*/
			}
		}
		//$conn4 = mysql_connect('localhost', 'akadft', 'teknik0417');
		//mysql_select_db('akadft_akdemikft');
		//$q_del="DELETE FROM temp_mhs";
		//mysql_query($q_del) or die(mysql_error());
	?>
</tbody>
</table>
</div>
</div></div></div></div></div></div>
Data baru yang masuk : <?=$masuk?> data
</body>
</html>