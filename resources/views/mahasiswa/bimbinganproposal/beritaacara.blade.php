<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>E-Skripsi | Berita Acara Bimbingan Proposal</title>
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
                <img src="images/logo.png" style="width: 100px" />
              </td>
              <td>
                <strong style="text-transform: uppercase;">PROGRAM STUDI {{$data_program_studi['nama_program_studi']}}</strong><br />
                <strong style="text-transform: uppercase;">{{$data_program_studi['fakultas_program_studi']}}</strong><br />
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
          <strong>BERITA ACARA BIMBINGAN PROPOSAL SKRIPSI</strong><br>
          <strong>PEMBIMBING I</strong>
        </td>
      </tr>
    </table>

    <table>
      <tr class="details">
        <td>Nama Mahasiswa </td>
        <td>:</td>
        <td>{{$data_mahasiswa['nama_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>NPM </td>
        <td>:</td>
        <td>{{$data_mahasiswa['npm_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>Program Studi </td>
        <td>:</td>
        <td>{{$data_program_studi['nama_program_studi']}}</td>
      </tr>
      <tr class="details">
        <td>Fakultas </td>
        <td>:</td>
        <td>{{$data_program_studi['fakultas_program_studi']}}</td>
      </tr>
      <tr class="details">
        <td>Judul Skripsi </td>
        <td>:</td>
        <td style="text-align: justify;">{{$data_judul_skripsi['nama_judul_skripsi']}}</td>
      </tr>
      <tr class="details">
        <td>Tanggal Pengajuan </td>
        <td>:</td>
        <td>{{$data_judul_skripsi['tanggal_pengajuan_judul_skripsi']}}</td>
      </tr>
      <tr class="details">
        <td>Nama Pembimbing I </td>
        <td>:</td>
        <td>{{$data_dosen_pembimbing_1['nama_dosen']}}</td>
      </tr>
    </table>

    <table style="padding-top: 5px;">
      <tr class="heading">
        <td>No</td>
        <td>Tanggal</td>
        <td>Topik Bimbingan</td>
        <td>Status</td>
        <td>Tanda Tangan</td>
      </tr>

      <?php $no = 0; ?>
      @foreach($data_bimbingan_1 as $bimbingan_1)
      <?php $no++; ?>
      <tr class="item">
        <td class="number">{{$no}}</td>
        <td class="number">{{$bimbingan_1['tanggal_pengajuan_bimbingan_proposal']}}</td>
        <td>{{$bimbingan_1['topik_bimbingan_proposal']}}</td>
        <td>{{$bimbingan_1['status_persetujuan_bimbingan_proposal']}}</td>
        <td></td>
      </tr>
      @endforeach
    </table>

    <table>
      <tr>
        <td>
          <div style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
            <br>
            Kaprodi {{$data_program_studi['nama_program_studi']}}<br><br><br><br>
            <b>________________________</b><br>
            NIDN.
          </div>
        </td>
        <td>
          <div style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
            Tuban, <?php echo (new \DateTime())->format('d-m-Y'); ?> <br>
            Pembimbing I <br><br><br><br>
            <b><u>{{$data_dosen_pembimbing_1['nama_dosen']}}</u></b><br>
            NIDN. {{$data_dosen_pembimbing_1['nidn_dosen']}}
          </div>
        </td>
      </tr>
    </table>
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
                <img src="images/logo.png" style="width: 100px" />
              </td>
              <td>
                <strong style="text-transform: uppercase;">PROGRAM STUDI {{$data_program_studi['nama_program_studi']}}</strong><br />
                <strong style="text-transform: uppercase;">{{$data_program_studi['fakultas_program_studi']}}</strong><br />
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
          <strong>BERITA ACARA BIMBINGAN PROPOSAL SKRIPSI</strong><br>
          <strong>PEMBIMBING II</strong>
        </td>
      </tr>
    </table>

    <table>
      <tr class="details">
        <td>Nama Mahasiswa </td>
        <td>:</td>
        <td>{{$data_mahasiswa['nama_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>NPM </td>
        <td>:</td>
        <td>{{$data_mahasiswa['npm_mahasiswa']}}</td>
      </tr>
      <tr class="details">
        <td>Program Studi </td>
        <td>:</td>
        <td>{{$data_program_studi['nama_program_studi']}}</td>
      </tr>
      <tr class="details">
        <td>Fakultas </td>
        <td>:</td>
        <td>{{$data_program_studi['fakultas_program_studi']}}</td>
      </tr>
      <tr class="details">
        <td>Judul Skripsi </td>
        <td>:</td>
        <td style="text-align: justify;">{{$data_judul_skripsi['nama_judul_skripsi']}}</td>
      </tr>
      <tr class="details">
        <td>Tanggal Pengajuan </td>
        <td>:</td>
        <td>{{$data_judul_skripsi['tanggal_pengajuan_judul_skripsi']}}</td>
      </tr>
      <tr class="details">
        <td>Nama Pembimbing II </td>
        <td>:</td>
        <td>{{$data_dosen_pembimbing_2['nama_dosen']}}</td>
      </tr>
    </table>

    <table style="padding-top: 5px;">
      <tr class="heading">
        <td>No</td>
        <td>Tanggal</td>
        <td>Topik Bimbingan</td>
        <td>Status</td>
        <td>Tanda Tangan</td>
      </tr>

      <?php $no = 0; ?>
      @foreach($data_bimbingan_2 as $bimbingan_2)
      <?php $no++; ?>
      <tr class="item">
        <td class="number">{{$no}}</td>
        <td class="number">{{$bimbingan_2['tanggal_pengajuan_bimbingan_proposal']}}</td>
        <td>{{$bimbingan_2['topik_bimbingan_proposal']}}</td>
        <td>{{$bimbingan_2['status_persetujuan_bimbingan_proposal']}}</td>
        <td></td>
      </tr>
      @endforeach
    </table>

    <table>
      <tr>
        <td>
          <div style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
            <br>
            Kaprodi {{$data_program_studi['nama_program_studi']}}<br><br><br><br>
            <b>________________________</b><br>
            NIDN.
          </div>
        </td>
        <td>
          <div style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
            Tuban, <?php echo (new \DateTime())->format('d-m-Y'); ?> <br>
            Pembimbing II <br><br><br><br>
            <b><u>{{$data_dosen_pembimbing_2['nama_dosen']}}</u></b><br>
            NIDN. {{$data_dosen_pembimbing_2['nidn_dosen']}}
          </div>
        </td>
      </tr>
    </table>
    <div class="footer">
      <b>Halaman 2</b> | E-Skripsi Universitas PGRI Ronggolawe Tuban | <?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?>
    </div>
  </div>

  <script language="javascript">
    var today = new Date();
    document.getElementById('time').innerHTML = today;
  </script>
</body>

</html>