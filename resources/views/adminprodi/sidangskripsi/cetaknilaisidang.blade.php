<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>E-Skripsi | Nilai Sidang {{$data_nilai['mahasiswa']['npm_mahasiswa']}}</title>
  <link href="./css/invoice.css" rel="stylesheet">
</head>

<body>
  <!-- Page 1  -->
  <div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
      <tr class="top">
        <td colspan="5">
          <table>
            <tr>
              <td class="title">
                <img src="images/logo.png" style="width: 80px" />
              </td>
              <td>
                <strong>UNIVERSITAS PGRI RONGGOLAWE TUBAN</strong><br />
                Jl. Manunggal 61 Tuban Telp. (0356)322233 Fax. (0356)331578 <br />
                Website:www.unirow.ac.id Email:prospective@unirow.ac.id.
              </td>
            </tr>
            <hr>
          </table>
        </td>
      </tr>

      <tr class="top">
        <td colspan="5" style="text-align: center">
          <strong>LEMBAR PENILAIAN SIDANG SKRIPSI</strong>
        </td>
      </tr>
    </table>

    <table>
      <tr class="details">
        <td>Nama Mahasiswa </td>
        <td>:</td>
        <td>{{$data_nilai['mahasiswa']['nama_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>NPM </td>
        <td>:</td>
        <td>{{$data_nilai['mahasiswa']['npm_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>Prodi / Fakultas </td>
        <td>:</td>
        <td>{{$data_nilai['program_studi']['nama_program_studi']}} / {{$data_nilai['program_studi']['fakultas_program_studi']}}</td>
      </tr>
      <tr class="details">
        <td>Judul Skripsi </td>
        <td>:</td>
        <td>{{$data_nilai['judul_skripsi']['nama_judul_skripsi']}}</td>
      </tr>
      <tr class="details">
        <td>Penguji 1 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_penguji1']['dosen']['nama_dosen']}}</td>
      </tr>
      <tr class="details">
        <td>Penguji 2 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_penguji2']['dosen']['nama_dosen']}}</td>
      </tr>
    </table>

    <table style="padding-top: 5px;">
      <tr class="heading">
        <td>No</td>
        <td>Aspek Penilaian</td>
        <td>Bobot</td>
        <td>Nilai</td>
      </tr>

      <!-- Nilai A  -->
      <tr class="item">
        <td class="number"><b>A</b></td>
        <td colspan="3"><b>Bimbingan Skripsi</b></td>
      </tr>
      <tr class="item">
        <td class="number">1</td>
        <td>Ketepatan waktu dalam pembimbingan</td>
        <td></td>
        <td class="number">{{$data_nilai['nilai_pembimbing1']['nilai_a']['nilai_a1_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">2</td>
        <td>Kesopanan dan kejujuran selama proses bimbingan</td>
        <td></td>
        <td class="number">{{$data_nilai['nilai_pembimbing1']['nilai_a']['nilai_a2_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">3</td>
        <td>Kemandirian dalam mengerjakan skripsi</td>
        <td></td>
        <td class="number">{{$data_nilai['nilai_pembimbing1']['nilai_a']['nilai_a3_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td></td>
        <td colspan="2"><b>Rata-Rata Nilai A</b></td>
        <td class="number"><b>{{$data_nilai['nilai_pembimbing1']['nilai_a']['rata2_nilai_a_hasil_sidang_skripsi']}}</b></td>
      </tr>

      <!-- Nilai B  -->
      <tr class="item">
        <td class="number"><b>B</b></td>
        <td colspan="3"><b>Naskah Skripsi</b></td>
      </tr>
      <tr class="item">
        <td class="number">1</td>
        <td>Teknik Penulisan</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_pembimbing1']['nilai_b']['nilai_b1_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">2</td>
        <td>Konsep Pemikiran</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_pembimbing1']['nilai_b']['nilai_b2_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">3</td>
        <td>Kajian Pustaka/Landasan Teori</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_pembimbing1']['nilai_b']['nilai_b3_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">4</td>
        <td>Metode Penelitian</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_pembimbing1']['nilai_b']['nilai_b4_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">5</td>
        <td>Hasil Penelitian dan Pembahasan</td>
        <td class="number">20</td>
        <td class="number">{{$data_nilai['nilai_pembimbing1']['nilai_b']['nilai_b5_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">6</td>
        <td>Kesimpulan Penelitian</td>
        <td class="number">10</td>
        <td class="number">{{$data_nilai['nilai_pembimbing1']['nilai_b']['nilai_b6_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">7</td>
        <td>Kepustakaan</td>
        <td class="number">10</td>
        <td class="number">{{$data_nilai['nilai_pembimbing1']['nilai_b']['nilai_b7_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td></td>
        <td colspan="2"><b>Rata-Rata Nilai B = Jumlah(Bobot*Nilai)/100</b></td>
        <td class="number"><b>{{$data_nilai['nilai_pembimbing1']['nilai_b']['rata2_nilai_b_hasil_sidang_skripsi']}}</b></td>
      </tr>

      <!-- Nilai C  -->
      <tr class="item">
        <td class="number"><b>C</b></td>
        <td colspan="3"><b>Pelaksanaan Sidang</b></td>
      </tr>
      <tr class="item">
        <td class="number">1</td>
        <td>Presentasi dan Sinkronisasi </td>
        <td class="number">20</td>
        <td class="number">{{$data_nilai['nilai_pembimbing1']['nilai_c']['nilai_c1_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">2</td>
        <td>Penguasaan Materi </td>
        <td class="number">50</td>
        <td class="number">{{$data_nilai['nilai_pembimbing1']['nilai_c']['nilai_c2_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">3</td>
        <td>Kemampuan Berargumentasi </td>
        <td class="number">30</td>
        <td class="number">{{$data_nilai['nilai_pembimbing1']['nilai_c']['nilai_c3_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td></td>
        <td colspan="2"><b>Rata-Rata Nilai C = Jumlah(Bobot*Nilai)/100</b></td>
        <td class="number"><b>{{$data_nilai['nilai_pembimbing1']['nilai_c']['rata2_nilai_c_hasil_sidang_skripsi']}}</b></td>
      </tr>
    </table>

    <div style="padding-left:60%; padding-top:1rem; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
      Tuban, {{date('d-m-Y', strtotime($data_nilai['waktu_sidang_skripsi']))}} <br>
      Pembimbing 1 <br><br><br><br>
      <b><u>{{$data_nilai['nilai_pembimbing1']['dosen']['nama_dosen']}}</u></b><br>
      NIDN. {{$data_nilai['nilai_pembimbing1']['dosen']['nidn_dosen']}}
    </div>
    <div class="footer">
      <b>Halaman 1</b> | E-Skripsi Universitas PGRI Ronggolawe Tuban | <?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?>
    </div>
  </div>

  <div class="page-break"></div>
  <!-- Page 2  -->
  <div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
      <tr class="top">
        <td colspan="5">
          <table>
            <tr>
              <td class="title">
                <img src="images/logo.png" style="width: 80px" />
              </td>
              <td>
                <strong>UNIVERSITAS PGRI RONGGOLAWE TUBAN</strong><br />
                Jl. Manunggal 61 Tuban Telp. (0356)322233 Fax. (0356)331578 <br />
                Website:www.unirow.ac.id Email:prospective@unirow.ac.id.
              </td>
            </tr>
            <hr>
          </table>
        </td>
      </tr>

      <tr class="top">
        <td colspan="5" style="text-align: center">
          <strong>LEMBAR PENILAIAN SIDANG SKRIPSI</strong>
        </td>
      </tr>
    </table>

    <table>
      <tr class="details">
        <td>Nama Mahasiswa </td>
        <td>:</td>
        <td>{{$data_nilai['mahasiswa']['nama_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>NPM </td>
        <td>:</td>
        <td>{{$data_nilai['mahasiswa']['npm_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>Prodi / Fakultas </td>
        <td>:</td>
        <td>{{$data_nilai['program_studi']['nama_program_studi']}} / {{$data_nilai['program_studi']['fakultas_program_studi']}}</td>
      </tr>
      <tr class="details">
        <td>Judul Skripsi </td>
        <td>:</td>
        <td>{{$data_nilai['judul_skripsi']['nama_judul_skripsi']}}</td>
      </tr>
      <tr class="details">
        <td>Penguji 1 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_penguji1']['dosen']['nama_dosen']}}</td>
      </tr>
      <tr class="details">
        <td>Penguji 2 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_penguji2']['dosen']['nama_dosen']}}</td>
      </tr>
    </table>

    <table style="padding-top: 5px;">
      <tr class="heading">
        <td>No</td>
        <td>Aspek Penilaian</td>
        <td>Bobot</td>
        <td>Nilai</td>
      </tr>

      <!-- Nilai A  -->
      <tr class="item">
        <td class="number"><b>A</b></td>
        <td colspan="3"><b>Bimbingan Skripsi</b></td>
      </tr>
      <tr class="item">
        <td class="number">1</td>
        <td>Ketepatan waktu dalam pembimbingan</td>
        <td></td>
        <td class="number">{{$data_nilai['nilai_pembimbing2']['nilai_a']['nilai_a1_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">2</td>
        <td>Kesopanan dan kejujuran selama proses bimbingan</td>
        <td></td>
        <td class="number">{{$data_nilai['nilai_pembimbing2']['nilai_a']['nilai_a2_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">3</td>
        <td>Kemandirian dalam mengerjakan skripsi</td>
        <td></td>
        <td class="number">{{$data_nilai['nilai_pembimbing2']['nilai_a']['nilai_a3_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td></td>
        <td colspan="2"><b>Rata-Rata Nilai A</b></td>
        <td class="number"><b>{{$data_nilai['nilai_pembimbing2']['nilai_a']['rata2_nilai_a_hasil_sidang_skripsi']}}</b></td>
      </tr>

      <!-- Nilai B  -->
      <tr class="item">
        <td class="number"><b>B</b></td>
        <td colspan="3"><b>Naskah Skripsi</b></td>
      </tr>
      <tr class="item">
        <td class="number">1</td>
        <td>Teknik Penulisan</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_pembimbing2']['nilai_b']['nilai_b1_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">2</td>
        <td>Konsep Pemikiran</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_pembimbing2']['nilai_b']['nilai_b2_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">3</td>
        <td>Kajian Pustaka/Landasan Teori</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_pembimbing2']['nilai_b']['nilai_b3_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">4</td>
        <td>Metode Penelitian</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_pembimbing2']['nilai_b']['nilai_b4_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">5</td>
        <td>Hasil Penelitian dan Pembahasan</td>
        <td class="number">20</td>
        <td class="number">{{$data_nilai['nilai_pembimbing2']['nilai_b']['nilai_b5_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">6</td>
        <td>Kesimpulan Penelitian</td>
        <td class="number">10</td>
        <td class="number">{{$data_nilai['nilai_pembimbing2']['nilai_b']['nilai_b6_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">7</td>
        <td>Kepustakaan</td>
        <td class="number">10</td>
        <td class="number">{{$data_nilai['nilai_pembimbing2']['nilai_b']['nilai_b7_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td></td>
        <td colspan="2"><b>Rata-Rata Nilai B = Jumlah(Bobot*Nilai)/100</b></td>
        <td class="number"><b>{{$data_nilai['nilai_pembimbing2']['nilai_b']['rata2_nilai_b_hasil_sidang_skripsi']}}</b></td>
      </tr>

      <!-- Nilai C  -->
      <tr class="item">
        <td class="number"><b>C</b></td>
        <td colspan="3"><b>Pelaksanaan Sidang</b></td>
      </tr>
      <tr class="item">
        <td class="number">1</td>
        <td>Presentasi dan Sinkronisasi </td>
        <td class="number">20</td>
        <td class="number">{{$data_nilai['nilai_pembimbing2']['nilai_c']['nilai_c1_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">2</td>
        <td>Penguasaan Materi </td>
        <td class="number">50</td>
        <td class="number">{{$data_nilai['nilai_pembimbing2']['nilai_c']['nilai_c2_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">3</td>
        <td>Kemampuan Berargumentasi </td>
        <td class="number">30</td>
        <td class="number">{{$data_nilai['nilai_pembimbing2']['nilai_c']['nilai_c3_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td></td>
        <td colspan="2"><b>Rata-Rata Nilai C = Jumlah(Bobot*Nilai)/100</b></td>
        <td class="number"><b>{{$data_nilai['nilai_pembimbing2']['nilai_c']['rata2_nilai_c_hasil_sidang_skripsi']}}</b></td>
      </tr>
    </table>

    <div style="padding-left:60%; padding-top:1rem; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
      Tuban, {{date('d-m-Y', strtotime($data_nilai['waktu_sidang_skripsi']))}} <br>
      Pembimbing 2 <br><br><br><br>
      <b><u>{{$data_nilai['nilai_pembimbing2']['dosen']['nama_dosen']}}</u></b><br>
      NIDN. {{$data_nilai['nilai_pembimbing2']['dosen']['nidn_dosen']}}
    </div>
    <div class="footer">
      <b>Halaman 2 </b>| E-Skripsi Universitas PGRI Ronggolawe Tuban | <?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?>
    </div>
  </div>
  <div class="page-break"></div>

  <!-- Page 3  -->
  <div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
      <tr class="top">
        <td colspan="5">
          <table>
            <tr>
              <td class="title">
                <img src="images/logo.png" style="width: 80px" />
              </td>
              <td>
                <strong>UNIVERSITAS PGRI RONGGOLAWE TUBAN</strong><br />
                Jl. Manunggal 61 Tuban Telp. (0356)322233 Fax. (0356)331578 <br />
                Website:www.unirow.ac.id Email:prospective@unirow.ac.id.
              </td>
            </tr>
            <hr>
          </table>
        </td>
      </tr>

      <tr class="top">
        <td colspan="5" style="text-align: center">
          <strong>LEMBAR PENILAIAN SIDANG SKRIPSI</strong>
        </td>
      </tr>
    </table>

    <table>
      <tr class="details">
        <td>Nama Mahasiswa </td>
        <td>:</td>
        <td>{{$data_nilai['mahasiswa']['nama_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>NPM </td>
        <td>:</td>
        <td>{{$data_nilai['mahasiswa']['npm_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>Prodi / Fakultas </td>
        <td>:</td>
        <td>{{$data_nilai['program_studi']['nama_program_studi']}} / {{$data_nilai['program_studi']['fakultas_program_studi']}}</td>
      </tr>
      <tr class="details">
        <td>Judul Skripsi </td>
        <td>:</td>
        <td>{{$data_nilai['judul_skripsi']['nama_judul_skripsi']}}</td>
      </tr>
      <tr class="details">
        <td>Penguji 1 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_penguji1']['dosen']['nama_dosen']}}</td>
      </tr>
      <tr class="details">
        <td>Penguji 2 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_penguji2']['dosen']['nama_dosen']}}</td>
      </tr>
    </table>

    <table style="padding-top: 5px;">
      <tr class="heading">
        <td>No</td>
        <td>Aspek Penilaian</td>
        <td>Bobot</td>
        <td>Nilai</td>
      </tr>

      <!-- Nilai B  -->
      <tr class="item">
        <td class="number"><b>A</b></td>
        <td colspan="3"><b>Naskah Skripsi</b></td>
      </tr>
      <tr class="item">
        <td class="number">1</td>
        <td>Teknik Penulisan</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_penguji1']['nilai_b']['nilai_b1_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">2</td>
        <td>Konsep Pemikiran</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_penguji1']['nilai_b']['nilai_b2_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">3</td>
        <td>Kajian Pustaka/Landasan Teori</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_penguji1']['nilai_b']['nilai_b3_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">4</td>
        <td>Metode Penelitian</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_penguji1']['nilai_b']['nilai_b4_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">5</td>
        <td>Hasil Penelitian dan Pembahasan</td>
        <td class="number">20</td>
        <td class="number">{{$data_nilai['nilai_penguji1']['nilai_b']['nilai_b5_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">6</td>
        <td>Kesimpulan Penelitian</td>
        <td class="number">10</td>
        <td class="number">{{$data_nilai['nilai_penguji1']['nilai_b']['nilai_b6_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">7</td>
        <td>Kepustakaan</td>
        <td class="number">10</td>
        <td class="number">{{$data_nilai['nilai_penguji1']['nilai_b']['nilai_b7_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td></td>
        <td colspan="2"><b>Rata-Rata Nilai A = Jumlah(Bobot*Nilai)/100</b></td>
        <td class="number"><b>{{$data_nilai['nilai_penguji1']['nilai_b']['rata2_nilai_b_hasil_sidang_skripsi']}}</b></td>
      </tr>

      <!-- Nilai C  -->
      <tr class="item">
        <td class="number"><b>B</b></td>
        <td colspan="3"><b>Pelaksanaan Sidang</b></td>
      </tr>
      <tr class="item">
        <td class="number">1</td>
        <td>Presentasi dan Sinkronisasi </td>
        <td class="number">20</td>
        <td class="number">{{$data_nilai['nilai_penguji1']['nilai_c']['nilai_c1_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">2</td>
        <td>Penguasaan Materi </td>
        <td class="number">50</td>
        <td class="number">{{$data_nilai['nilai_penguji1']['nilai_c']['nilai_c2_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">3</td>
        <td>Kemampuan Berargumentasi </td>
        <td class="number">30</td>
        <td class="number">{{$data_nilai['nilai_penguji1']['nilai_c']['nilai_c3_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td></td>
        <td colspan="2"><b>Rata-Rata Nilai B = Jumlah(Bobot*Nilai)/100</b></td>
        <td class="number"><b>{{$data_nilai['nilai_penguji1']['nilai_c']['rata2_nilai_c_hasil_sidang_skripsi']}}</b></td>
      </tr>
    </table>

    <div style="padding-left:60%; padding-top:1rem; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
      Tuban, {{date('d-m-Y', strtotime($data_nilai['waktu_sidang_skripsi']))}} <br>
      Penguji 1 <br><br><br><br>
      <b><u>{{$data_nilai['nilai_penguji1']['dosen']['nama_dosen']}}</u></b><br>
      NIDN. {{$data_nilai['nilai_penguji1']['dosen']['nidn_dosen']}}
    </div>
    <div class="footer">
      <b>Halaman 3 </b>| E-Skripsi Universitas PGRI Ronggolawe Tuban | <?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?>
    </div>
  </div>
  <div class="page-break"></div>

  <!-- Page 3  -->
  <div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
      <tr class="top">
        <td colspan="5">
          <table>
            <tr>
              <td class="title">
                <img src="images/logo.png" style="width: 80px" />
              </td>
              <td>
                <strong>UNIVERSITAS PGRI RONGGOLAWE TUBAN</strong><br />
                Jl. Manunggal 61 Tuban Telp. (0356)322233 Fax. (0356)331578 <br />
                Website:www.unirow.ac.id Email:prospective@unirow.ac.id.
              </td>
            </tr>
            <hr>
          </table>
        </td>
      </tr>

      <tr class="top">
        <td colspan="5" style="text-align: center">
          <strong>LEMBAR PENILAIAN SIDANG SKRIPSI</strong>
        </td>
      </tr>
    </table>

    <table>
      <tr class="details">
        <td>Nama Mahasiswa </td>
        <td>:</td>
        <td>{{$data_nilai['mahasiswa']['nama_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>NPM </td>
        <td>:</td>
        <td>{{$data_nilai['mahasiswa']['npm_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>Prodi / Fakultas </td>
        <td>:</td>
        <td>{{$data_nilai['program_studi']['nama_program_studi']}} / {{$data_nilai['program_studi']['fakultas_program_studi']}}</td>
      </tr>
      <tr class="details">
        <td>Judul Skripsi </td>
        <td>:</td>
        <td>{{$data_nilai['judul_skripsi']['nama_judul_skripsi']}}</td>
      </tr>
      <tr class="details">
        <td>Penguji 1 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_penguji1']['dosen']['nama_dosen']}}</td>
      </tr>
      <tr class="details">
        <td>Penguji 2 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_penguji2']['dosen']['nama_dosen']}}</td>
      </tr>
    </table>

    <table style="padding-top: 5px;">
      <tr class="heading">
        <td>No</td>
        <td>Aspek Penilaian</td>
        <td>Bobot</td>
        <td>Nilai</td>
      </tr>

      <!-- Nilai B  -->
      <tr class="item">
        <td class="number"><b>A</b></td>
        <td colspan="3"><b>Naskah Skripsi</b></td>
      </tr>
      <tr class="item">
        <td class="number">1</td>
        <td>Teknik Penulisan</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_penguji2']['nilai_b']['nilai_b1_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">2</td>
        <td>Konsep Pemikiran</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_penguji2']['nilai_b']['nilai_b2_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">3</td>
        <td>Kajian Pustaka/Landasan Teori</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_penguji2']['nilai_b']['nilai_b3_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">4</td>
        <td>Metode Penelitian</td>
        <td class="number">15</td>
        <td class="number">{{$data_nilai['nilai_penguji2']['nilai_b']['nilai_b4_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">5</td>
        <td>Hasil Penelitian dan Pembahasan</td>
        <td class="number">20</td>
        <td class="number">{{$data_nilai['nilai_penguji2']['nilai_b']['nilai_b5_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">6</td>
        <td>Kesimpulan Penelitian</td>
        <td class="number">10</td>
        <td class="number">{{$data_nilai['nilai_penguji2']['nilai_b']['nilai_b6_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">7</td>
        <td>Kepustakaan</td>
        <td class="number">10</td>
        <td class="number">{{$data_nilai['nilai_penguji2']['nilai_b']['nilai_b7_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td></td>
        <td colspan="2"><b>Rata-Rata Nilai A = Jumlah(Bobot*Nilai)/100</b></td>
        <td class="number"><b>{{$data_nilai['nilai_penguji2']['nilai_b']['rata2_nilai_b_hasil_sidang_skripsi']}}</b></td>
      </tr>

      <!-- Nilai C  -->
      <tr class="item">
        <td class="number"><b>B</b></td>
        <td colspan="3"><b>Pelaksanaan Sidang</b></td>
      </tr>
      <tr class="item">
        <td class="number">1</td>
        <td>Presentasi dan Sinkronisasi </td>
        <td class="number">20</td>
        <td class="number">{{$data_nilai['nilai_penguji2']['nilai_c']['nilai_c1_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">2</td>
        <td>Penguasaan Materi </td>
        <td class="number">50</td>
        <td class="number">{{$data_nilai['nilai_penguji2']['nilai_c']['nilai_c2_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">3</td>
        <td>Kemampuan Berargumentasi </td>
        <td class="number">30</td>
        <td class="number">{{$data_nilai['nilai_penguji2']['nilai_c']['nilai_c3_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td></td>
        <td colspan="2"><b>Rata-Rata Nilai B = Jumlah(Bobot*Nilai)/100</b></td>
        <td class="number"><b>{{$data_nilai['nilai_penguji2']['nilai_c']['rata2_nilai_c_hasil_sidang_skripsi']}}</b></td>
      </tr>
    </table>

    <div style="padding-left:60%; padding-top:1rem; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
      Tuban, {{date('d-m-Y', strtotime($data_nilai['waktu_sidang_skripsi']))}} <br>
      Penguji 2 <br><br><br><br>
      <b><u>{{$data_nilai['nilai_penguji2']['dosen']['nama_dosen']}}</u></b><br>
      NIDN. {{$data_nilai['nilai_penguji2']['dosen']['nidn_dosen']}}
    </div>
    <div class="footer">
      <b>Halaman 4 </b>| E-Skripsi Universitas PGRI Ronggolawe Tuban | <?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?>
    </div>
  </div>
  <div class="page-break"></div>

  <!-- Page 3  -->
  <div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
      <tr class="top">
        <td colspan="5">
          <table>
            <tr>
              <td class="title">
                <img src="images/logo.png" style="width: 80px" />
              </td>
              <td>
                <strong>UNIVERSITAS PGRI RONGGOLAWE TUBAN</strong><br />
                Jl. Manunggal 61 Tuban Telp. (0356)322233 Fax. (0356)331578 <br />
                Website:www.unirow.ac.id Email:prospective@unirow.ac.id.
              </td>
            </tr>
            <hr>
          </table>
        </td>
      </tr>

      <tr class="top">
        <td colspan="5" style="text-align: center">
          <strong>REKAPITULASI NILAI SIDANG SKRIPSI</strong>
        </td>
      </tr>
    </table>

    <table>
      <tr class="details">
        <td>Nama Mahasiswa </td>
        <td>:</td>
        <td>{{$data_nilai['mahasiswa']['nama_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>NPM </td>
        <td>:</td>
        <td>{{$data_nilai['mahasiswa']['npm_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>Prodi / Fakultas </td>
        <td>:</td>
        <td>{{$data_nilai['program_studi']['nama_program_studi']}} / {{$data_nilai['program_studi']['fakultas_program_studi']}}</td>
      </tr>
      <tr class="details">
        <td>Judul Skripsi </td>
        <td>:</td>
        <td>{{$data_nilai['judul_skripsi']['nama_judul_skripsi']}}</td>
      </tr>
      <tr class="details">
        <td>Pembimbing 1 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_pembimbing1']['dosen']['nama_dosen']}}</td>
      </tr>
      <tr class="details">
        <td>Pembimbing 2 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_pembimbing2']['dosen']['nama_dosen']}}</td>
      </tr>
      <tr class="details">
        <td>Penguji 1 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_penguji1']['dosen']['nama_dosen']}}</td>
      </tr>
      <tr class="details">
        <td>Penguji 2 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_penguji2']['dosen']['nama_dosen']}}</td>
      </tr>
    </table>

    <table style="padding-top: 5px;">
      <tr class="heading">
        <td>No</td>
        <td>Komponen Penilaian</td>
        <td>Bobot</td>
        <td>Nilai</td>
      </tr>

      <!-- Nilai Seminar  -->
      <tr class="item">
        <td class="number"><b>A</b></td>
        <td colspan="3"><b>Nilai Seminar Proposal</b></td>
      </tr>
      <tr class="item">
        <td class="number">1</td>
        <td>Rata-Rata Nilai Bimbingan Proposal</td>
        <td class="number">20</td>
        <td class="number">{{$data_nilai['rekap_nilai_seminar']['rata2_nilai_a_hasil_seminar_proposal']}}</td>
      </tr>
      <tr class="item">
        <td class="number">2</td>
        <td>Rata-Rata Nilai Naskah Proposal</td>
        <td class="number">30</td>
        <td class="number">{{$data_nilai['rekap_nilai_seminar']['rata2_nilai_b_hasil_seminar_proposal']}}</td>
      </tr>
      <tr class="item">
        <td class="number">3</td>
        <td>Rata-Rata Nilai Pelaksanaan Seminar</td>
        <td class="number">50</td>
        <td class="number">{{$data_nilai['rekap_nilai_seminar']['rata2_nilai_c_hasil_seminar_proposal']}}</td>
      </tr>
      <tr class="item">
        <td class="number"></td>
        <td>Jumlah A </td>
        <td class="number"></td>
        <td class="number">{{$data_nilai['rekap_nilai_seminar']['jumlah_rata2_nilai_hasil_seminar_proposal']}}</td>
      </tr>
      <tr class="item">
        <td></td>
        <td colspan="2">Nilai Akhir A= Jumlah(Bobot*Nilai)/100</td>
        <td class="number">{{$data_nilai['rekap_nilai_seminar']['nilai_akhir_hasil_seminar_proposal']}}</td>
      </tr>

      <!-- Nilai Sidang  -->
      <tr class="item">
        <td class="number"><b>B</b></td>
        <td colspan="3"><b>Nilai Sidang Skripsi</b></td>
      </tr>
      <tr class="item">
        <td class="number">1</td>
        <td>Rata-Rata Nilai Bimbingan Skripsi</td>
        <td class="number">20</td>
        <td class="number">{{$data_nilai['rekap_nilai_sidang']['rata2_nilai_a_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">2</td>
        <td>Rata-Rata Nilai Naskah Skripsi</td>
        <td class="number">30</td>
        <td class="number">{{$data_nilai['rekap_nilai_sidang']['rata2_nilai_b_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number">3</td>
        <td>Rata-Rata Nilai Pelaksanaan Sidang</td>
        <td class="number">50</td>
        <td class="number">{{$data_nilai['rekap_nilai_sidang']['rata2_nilai_c_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td class="number"></td>
        <td>Jumlah B </td>
        <td class="number"></td>
        <td class="number">{{$data_nilai['rekap_nilai_sidang']['jumlah_rata2_nilai_hasil_sidang_skripsi']}}</td>
      </tr>
      <tr class="item">
        <td></td>
        <td colspan="2">Nilai Akhir B = Jumlah(Bobot*Nilai)/100</td>
        <td class="number">{{$data_nilai['rekap_nilai_sidang']['nilai_akhir_hasil_sidang_skripsi']}}</td>
      </tr>

      <!-- Nilai Akhir  -->
      <tr class="item">
        <td></td>
        <td colspan="2"><b>Nilai Akhir = ((60*Nilai Akhir A)+(40*Nilai Akhir B))/100</b></td>
        <td class="number"><b>{{$data_nilai['nilai_akhir']}}</b></td>
      </tr>
    </table>

    <div style="padding-top: 1rem;">
      Keterangan :
    </div>
    <table>
      <tr>
        <td>
          <table>
            <tr class="heading">
              <td class="number">Interval Nilai</td>
              <td class="number">Nilai Huruf</td>
            </tr>
            <tr class="item">
              <td class="number">81-100</td>
              <td class="number">A</td>
            </tr>
            <tr class="item">
              <td class="number">76-80</td>
              <td class="number">AB</td>
            </tr>
            <tr class="item">
              <td class="number">71-75</td>
              <td class="number">B</td>
            </tr>
            <tr class="item">
              <td class="number">66-70</td>
              <td class="number">BC</td>
            </tr>
            <tr class="item">
              <td class="number">56-65</td>
              <td class="number">C</td>
            </tr>
            <tr class="item">
              <td class="number">46-55</td>
              <td class="number">D</td>
            </tr>
            <tr class="item">
              <td class="number">0-45</td>
              <td class="number">E</td>
            </tr>
          </table>
        </td>
        <td>
          <div style="padding-left:35%; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
            Tuban, {{date('d-m-Y', strtotime($data_nilai['waktu_sidang_skripsi']))}} <br>
            Ketua Penguji <br><br><br><br>
            <b>____________________________</b><br>
            NIDN.
          </div>
        </td>
      </tr>
    </table>

    <div class="footer">
      <b>Halaman 5 </b>| E-Skripsi Universitas PGRI Ronggolawe Tuban | <?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?>
    </div>
  </div>
  <div class="page-break"></div>
  <!-- Page 3  -->
  <div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
      <tr class="top">
        <td colspan="5">
          <table>
            <tr>
              <td class="title">
                <img src="images/logo.png" style="width: 80px" />
              </td>
              <td>
                <strong>UNIVERSITAS PGRI RONGGOLAWE TUBAN</strong><br />
                Jl. Manunggal 61 Tuban Telp. (0356)322233 Fax. (0356)331578 <br />
                Website:www.unirow.ac.id Email:prospective@unirow.ac.id.
              </td>
            </tr>
            <hr>
          </table>
        </td>
      </tr>

      <tr class="top">
        <td colspan="5" style="text-align: center; text-transform: uppercase;">
          <strong>BERITA ACARA SIDANG SKRIPSI</strong> <br>
          <strong>PROGRAM STRUDI {{$data_nilai['program_studi']['nama_program_studi']}}</strong><br>
        </td>
      </tr>
    </table>

    <table>
      <tr class="details">
        <td>Yang bertanda tangan di bawah ini :</td>
      </tr>
    </table>

    <table>
      <tr class="details">
        <td>Nama Penguji 1 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_penguji1']['dosen']['nama_dosen']}}</td>
      </tr>
      <tr class="details">
        <td>Nama Penguji 2 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_penguji2']['dosen']['nama_dosen']}}</td>
      </tr>
      <tr class="details">
        <td>Nama Pembimbing 1 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_pembimbing1']['dosen']['nama_dosen']}}</td>
      </tr>
      <tr class="details">
        <td>Nama Pembimbing 2 </td>
        <td>:</td>
        <td>{{$data_nilai['nilai_pembimbing2']['dosen']['nama_dosen']}}</td>
      </tr>
    </table>

    <table>
      <tr class="details">
        <td><br> Pada hari ini <b>{{date('d-m-Y', strtotime($data_nilai['waktu_sidang_skripsi']))}}</b> telah menguji sidang skripsi mahasiswa dibawah ini :</td>
      </tr>
    </table>

    <table>
      <tr class="details">
        <td>Nama Mahasiswa </td>
        <td>:</td>
        <td>{{$data_nilai['mahasiswa']['nama_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>NPM </td>
        <td>:</td>
        <td>{{$data_nilai['mahasiswa']['npm_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>Fakultas </td>
        <td>:</td>
        <td>{{$data_nilai['program_studi']['fakultas_program_studi']}}</td>
      </tr>
      <tr class="details">
        <td>Prodi </td>
        <td>:</td>
        <td>{{$data_nilai['program_studi']['nama_program_studi']}}</td>
      </tr>
      <tr class="details">
        <td>Judul Skripsi </td>
        <td>:</td>
        <td>{{$data_nilai['judul_skripsi']['nama_judul_skripsi']}}</td>
      </tr>
      <tr class="details">
        <td>Nilai Akhir</td>
        <td>:</td>
        <td>{{$data_nilai['nilai_akhir']}}</td>
      </tr>
    </table>

    <table>
      <tr class="details">
        <td style="text-align: justify;"><br>Menurut hasil Sidang Skripsi, dinyatakan bahwa Skripsi Saudara telah memenuhi kriteria dari penguji dan pembimbing.</td>
      </tr>
    </table>

    <table>
      <tr>
        <td>
          <div style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
            <br>
            Penguji 1<br><br><br><br>
            <b><u>{{$data_nilai['nilai_penguji1']['dosen']['nama_dosen']}}</u></b><br>
            NIDN. {{$data_nilai['nilai_penguji1']['dosen']['nidn_dosen']}}
          </div>
        </td>
        <td>
          <div style="padding-left:20%; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
            Tuban, {{date('d-m-Y', strtotime($data_nilai['waktu_sidang_skripsi']))}} <br>
            Penguji 2<br><br><br><br>
            <b><u>{{$data_nilai['nilai_penguji2']['dosen']['nama_dosen']}}</u></b><br>
            NIDN. {{$data_nilai['nilai_penguji2']['dosen']['nidn_dosen']}}
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
            <br>
            Pembimbing 1<br><br><br><br>
            <b><u>{{$data_nilai['nilai_pembimbing1']['dosen']['nama_dosen']}}</u></b><br>
            NIDN. {{$data_nilai['nilai_pembimbing1']['dosen']['nidn_dosen']}}
          </div>
        </td>
        <td>
          <div style="padding-left:20%; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
            <br>
            Pembimbing 2<br><br><br><br>
            <b><u>{{$data_nilai['nilai_pembimbing2']['dosen']['nama_dosen']}}</u></b><br>
            NIDN. {{$data_nilai['nilai_pembimbing2']['dosen']['nidn_dosen']}}
          </div>
        </td>
      </tr>
    </table>

    <div class="footer">
      <b>Halaman 6 </b>| E-Skripsi Universitas PGRI Ronggolawe Tuban | <?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?>
    </div>
  </div>

  <script language="javascript">
    var today = new Date();
    document.getElementById('time').innerHTML = today;
  </script>
</body>

</html>