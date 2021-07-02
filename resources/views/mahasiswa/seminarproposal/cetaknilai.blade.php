<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>E-Skripsi | Nilai Seminar Proposal</title>
  <link href="./css/invoice.css" rel="stylesheet">
</head>

<body>
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
          <strong>REKAPITULASI NILAI SEMINAR PROPOSAL</strong>
        </td>
      </tr>
    </table>

    <table>
      <tr class="details">
        <td>Nama Mahasiswa </td>
        <td>:</td>
        <td>{{$hasil_seminar['mahasiswa']['nama_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>NPM </td>
        <td>:</td>
        <td>{{$hasil_seminar['mahasiswa']['npm_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>Prodi / Fakultas </td>
        <td>:</td>
        <td>{{$hasil_seminar['program_studi']['nama_program_studi']}} / {{$hasil_seminar['program_studi']['fakultas_program_studi']}}</td>
      </tr>
      <tr class="details">
        <td>Judul Skripsi </td>
        <td>:</td>
        <td>{{$hasil_seminar['judul_skripsi']['nama_judul_skripsi']}}</td>
      </tr>
      <tr class="details">
        <td>Waktu Seminar </td>
        <td>:</td>
        <td>{{$hasil_seminar['waktu_seminar_proposal']}}</td>
      </tr>
      <tr class="details">
        <td>Tempat Seminar </td>
        <td>:</td>
        <td>{{$hasil_seminar['tempat_seminar_proposal']}}</td>
      </tr>
      <tr class="details">
        <td>Pembimbing 1 </td>
        <td>:</td>
        <td>{{$hasil_seminar['dosen_pembimbing_1']['nama_dosen']}}</td>
      </tr>
      <tr class="details">
        <td>Pembimbing 2 </td>
        <td>:</td>
        <td>{{$hasil_seminar['dosen_pembimbing_2']['nama_dosen']}}</td>
      </tr>
      <tr class="details">
        <td>Penguji 1 </td>
        <td>:</td>
        <td>{{$hasil_seminar['dosen_penguji_1']['nama_dosen']}}</td>
      </tr>
      <tr class="details">
        <td>Penguji 2 </td>
        <td>:</td>
        <td>{{$hasil_seminar['dosen_penguji_2']['nama_dosen']}}</td>
      </tr>
    </table>

    <table style="padding-top: 5px;">
      <tr class="heading">
        <td>No</td>
        <td>Komponen Penilaian</td>
        <td>Bobot</td>
        <td>Nilai</td>
      </tr>

      <!-- Nilai B  -->
      <tr class="item">
        <td class="number">1</td>
        <td>Rata-Rata Nilai Bimbingan Proposal</td>
        <td class="number">20</td>
        <td class="number">{{$hasil_seminar['rekap_nilai_seminar_proposal']['rata2_nilai_a_hasil_seminar_proposal']}}</td>
      </tr>
      <tr class="item">
        <td class="number">2</td>
        <td>Rata-Rata Nilai Naskah Proposal Skripsi</td>
        <td class="number">30</td>
        <td class="number">{{$hasil_seminar['rekap_nilai_seminar_proposal']['rata2_nilai_b_hasil_seminar_proposal']}}</td>
      </tr>
      <tr class="item">
        <td class="number">3</td>
        <td>Rata-Rata Nilai Pelaksanaan Seminar</td>
        <td class="number">50</td>
        <td class="number">{{$hasil_seminar['rekap_nilai_seminar_proposal']['rata2_nilai_c_hasil_seminar_proposal']}}</td>
      </tr>
      <tr class="item">
        <td class="number"></td>
        <td><b>Jumlah Rata-Rata Nilai</b></td>
        <td class="number"></td>
        <td class="number"><b>{{$hasil_seminar['rekap_nilai_seminar_proposal']['jumlah_rata2_nilai_hasil_seminar_proposal']}}</b></td>
      </tr>
      <tr class="item">
        <td></td>
        <td colspan="2"><b>Nilai Akhir Seminar = Jumlah(Bobot*Nilai)/100</b></td>
        <td class="number"><b>{{$hasil_seminar['rekap_nilai_seminar_proposal']['nilai_akhir_hasil_seminar_proposal']}}</b></td>
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
            Tuban, {{date('d-m-Y', strtotime($hasil_seminar['waktu_seminar_proposal']))}} <br>
            Ketua Penguji <br><br><br><br>
            <b>____________________________</b><br>
            NIDN.
          </div>
        </td>
      </tr>
    </table>

    <div class="footer">
      <b>Halaman 1 </b>| E-Skripsi Universitas PGRI Ronggolawe Tuban | <?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?>
    </div>
  </div>

  <script language="javascript">
    var today = new Date();
    document.getElementById('time').innerHTML = today;
  </script>
</body>

</html>