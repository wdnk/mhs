<html>
<head>Update Data Mahasiswa Khusus</head>
<body>
	<table border="1">
		<tr>
			<th>No.</th>
			<th>NIF</th>
			<th>Nama</th>
			<th>Tahun Masuk</th>
			<th>IPK</th>
			<th>SKS Kumulatif</th>
			<th>Kategori Status</th>
			<th>Semester</th>
			<th>Status Detail</th>
		</tr>
<?php
	$hostname_akademik = "localhost";
	$database_akademik = "sia";
	$username_akademik = "mtievent";
	$password_akademik = "eventmti2013";
	$akademik = mysql_pconnect($hostname_akademik, $username_akademik, $password_akademik) or trigger_error(mysql_error(),E_USER_ERROR); 
	mysql_select_db($database_akademik) or die("Database gagal diakses");;

	$no=1;
	$mhs=mysql_query("select niu, nama, nif, tahun_masuk, prodi_asal, agama, gender, tanggal_lahir from inf_mahasiswa WHERE keaktifan='Y'");
	while($mhs2=mysql_fetch_array($mhs)){
		$jumlah_matkul=0;
		$sks_kumulatif=0;
		$jumlah_nilaisks=0;
		$jumlah_sks=0;
		$status=null;
		$nama_mahasiswa=$mhs2['nama'];
		$nif=$mhs2['nif'];
		$tahun_masuk=$mhs2['tahun_masuk'];
		//$q=mysql_query("select sum(s_krs_detil.krsdtSksMatakuliah) as sks from s_krs_detil inner join s_krs on s_krs_detil.krsdtKrsId=s_krs.krsId where s_krs.krsMhsNiu='".$str->niu."' and s_krs_detil.krsdtIsBatal='0' and krsdtIsDipakaiTranskrip='1'");
		$q=mysql_query("select distinct s_krs_detil.krsdtMkkurId,s_krs_detil.krsdtSksMatakuliah from s_krs_detil inner join s_krs on s_krs_detil.krsdtKrsId=s_krs.krsId where s_krs.krsMhsNiu='".$mhs2['niu']."' and s_krs_detil.krsdtIsBatal='0' and krsdtIsDipakaiTranskrip='1' and krsdtKodeNilai<>''");
		if(mysql_num_rows($q)>0){
			while($h=mysql_fetch_array($q)){
				$jumlah_matkul++;
				$sks_kumulatif=$sks_kumulatif + $h['krsdtSksMatakuliah'];
			}
		}

		//IP Kumulatif
		$q=mysql_query("select s_krs_detil.* from (s_krs_detil inner join s_krs on s_krs_detil.krsdtKrsId=s_krs.krsId) inner join s_matakuliah_kurikulum on s_krs_detil.krsdtMkkurId=s_matakuliah_kurikulum.mkkurId where s_krs.krsMhsNiu='".$mhs2['niu']."' and s_krs_detil.krsdtIsBatal='0' and s_krs_detil.krsdtIsDipakaiTranskrip='1' order by s_matakuliah_kurikulum.mkkurKode");
		if(mysql_num_rows($q)>0){
			while($h=mysql_fetch_array($q)){
					if($h['krsdtBobotNilai'] == null){
						//
					}else{
						$jumlah_sks=$jumlah_sks+$h['krsdtSksMatakuliah'];
					}
					$jumlah_nilaisks=$jumlah_nilaisks+($h['krsdtSksMatakuliah']*$h['krsdtBobotNilai']);
					//echo "SKS : ".$h['krsdtSksMatakuliah']." dan Bobot Nilai : ".$h['krsdtBobotNilai']."<br>";
			}
		}
		if($jumlah_sks == 0){
			$ip_kumulatif="";
		}else{
			$ip_kumulatif=round($jumlah_nilaisks/$jumlah_sks,2);
		}
		
	 	$tahun_sekarang = date("Y");
	 	//echo "tahun sekarang ".$tahun_sekarang."<br>";
	 	$weekNumber = date("W"); 
	 	//echo "week number : ".$weekNumber."<br>";
		$semester= ($tahun_sekarang - $tahun_masuk);
		$semester=$semester*2;
		//echo "semester ".$semester."<br>";
		//exit;
		if($tahun_sekarang == $tahun_masuk){
				$semester=1;
		}else if(($weekNumber < 35) AND ($weekNumber > 8)){
				$semester=$semester-1;
		}else{
				//
		}

		//echo "SKS Kumulatif : ".$sks_kumulatif."<br>";
		//echo "IP Kumulatif : ".$ip_kumulatif."<br>";
		//echo "Semester : ".$semester."<br>";
		//asumsikan IP < 2.00 + sks < 30 sks sdh dpt SP 1
		if($semester == 3){
			if($ip_kumulatif < 2.00 && $sks_kumulatif < 30){
				$status="Evaluasi 2 tahun";
			}
		}elseif ($semester == 7){
			if($ip_kumulatif < 2.00 && $sks_kumulatif < 80){
				$status="Evaluasi 4 tahun";
			}
		}elseif($semester >= 11){
			$status="Evaluasi Akhir";
		}
		
		if($nama_mahasiswa == null ){

		}else{
			if($status !== null){
				echo "<tr>";
				echo "<td>".$no++."</td>";
				echo "<td>".$nif."</td>";
				echo "<td>".$nama_mahasiswa."</td>";
				echo "<td>".$tahun_masuk."</td>";
				echo "<td>".$ip_kumulatif."</td>";
				echo "<td>".$sks_kumulatif."</td>";
				echo "<td>".$status."</td>";
				echo "<td>".$semester."</td>";
				echo "<td>&nbsp;</td>";
				echo "</tr>";
			}
		}
	}

	?>
</table>
</body>
</html>