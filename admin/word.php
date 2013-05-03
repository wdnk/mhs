<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=surat_peringatan.doc");

echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"application/vnd.ms-word; charset=UTF-8\" />";
echo "<STYLE TYPE='text/css'>
.Tab {
  line-height:1;
  word-spacing:30px;
  margin-left: 70px;
  text-indent: 5em;
  white-space: pre;
  }
.Kop-Text {
  font-family: Times New Roman,serif;
  font-size: 12pt;
  color: black;
  text-align: justify;
  line-height:1;
  margin-left: 65px;
  }
.Isi-Text {
  font-family: Times New Roman,serif;
  font-size: 12pt;
  color: black;
  text-align: justify;
  margin-left: 65px;
  }
.Ttd {
  font-family: Times New Roman,serif;
  font-size: 12pt;
  color: black;
  text-align: left;
  margin-left: 300px;
  padding-left: 300px;
  white-space: pre;
  }
ol li{
  font-family: Times New Roman,serif;
  font-size: 12pt;
  color: black;
  text-align: left;
  margin-left: 65px;
}
  ";
echo "<body>";
echo "Nomor<span class='Tab'>  </span>: <span class='Tab'>         </span>/H1.17/PS/2013<br>";
echo "Hal<span class='Tab'>        </span>:&nbsp;&nbsp;<b>Surat Peringatan I Evaluasi Akhir</b><br><br>";
echo "Kepada<span class='Tab'>  </span>: Yth. Sdr. <b>Priyo Atom Sancoyo</b><br>";
echo "<div class='Kop-Text'>NIM. 07/250008/TK/32304</div>";
echo "<div class='Kop-Text'>Program Studi SI Arsitektur</div>";
echo "<div class='Kop-Text'>Jurusan Teknik Arsitektur dan Perencanaan, Fakultas Teknik UGM</div>";
echo "<br>";
echo "<p class='Isi-Text'>Dengan hormat,</p>";
echo "<p class='Isi-Text'>Berdasarkan Peraturan Akademik Fakultas Teknik UGM bahwa mahasiswa Program Sarjana yang belum mengumpulkan <b>80 SKS</b> dengan <b>IPK &ge; 2,00</b> selama 8 (delapan) semester pertama diberikan <b>Surat Peringatan Evaluasi Delapan Semester. </b>";
echo "Di samping itu, batas maksimal masa studi yang diperkenankan untuk Program Sarjana adalah 7 tahun (14 semester). Apabila mahasiswa tidak dapat menyelesaikan studi setelah batas tersebut, maka masa studi bagi mahasiswa yang bersangkutan dinyatakan habis dan diminta untuk mengundurkan diri.</p>";
echo "<p class='Isi-Text'>Menurut catatan akademik kami, hasil studi Saudara sampai dengan akhir Semester 1 Tahun Akademik 2013/14 adalah :</p>";
echo "<p class='Isi-Text'><span class='Tab'>                </span>SKS Kumulatif tanpa nilai E = <b>48</b> SKS dengan IPK = <b>2.69</b>";
echo "<p class='Isi-Text'>Oleh karena itu, kami sampaikan <b>Surat Peringatan Evaluasi 8 (delapan) Semester</b> agar Saudara memberikan perhatian dan dapat menyelesaikan studi Saudara sebelum batas maksimal masa studi yang diperkenankan yang akan jatuh pada Semester II Tahun Akademik 2013/2014 (31 Agustus 2013).</p>";
echo "<p class='Isi-Text'>Selanjutnya Saudara diminta untuk lebih aktif berkonsultasi kepada Pengurus Jurusan dan Dosen Pembimbing Akademik (DPA) agar dapat membantu menyelesaikan permasalahan yang Saudara hadapi.</p>";
echo "<p class='Isi-Text'>Demikian, harap Saudara mengindahkan surat peringatan ini.</p>";
echo "<p class='Ttd'>Wakil Dekan<br>Bidang Akademik dan Kemahasiswaan<br><br><br><br>Ir. Muhammad Waziz Wildan, M.Sc., Ph.D.<br>NIP 196805121994031003</p>";
echo "<p class='Isi-Text'>TEMBUSAN :<ol><li>Ketua Jurusan Teknik Arsitektur dan Perencanaan</li><li>Orangtua mahasiswa yang bersangkutan<br>Bpk/Ibu Azril<br>Karangwaru Lor TR 2/415<br>Yogyakarta</li></ol></p>";
echo "</body>";
echo "</html>";
?>