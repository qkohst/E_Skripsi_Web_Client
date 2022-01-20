@extends('layouts.masterdosen')
@section('title')
<title>E-Skripsi | Seminar Proposal</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Seminar Proposal</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Seminar Proposal</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Seminar Proposal</h4>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="min-width: 845px">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Mahasiswa</th>
                  <th>Judul Skripsi</th>
                  <th>Sebagai</th>
                  <th>Waktu</th>
                  <th>Tempat</th>
                  <th>Status</th>
                  <th>Verifikasi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0; ?>
                @foreach($verifikasiseminar as $seminar)
                <?php $no++; ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{ $seminar['mahasiswa']['nama_mahasiswa']}}</td>
                  <td>{{ $seminar['judul_skripsi']['nama_judul_skripsi']}}</td>
                  <td>{{ $seminar['jabatan_dosen_seminar_proposal']}}</td>
                  <td>{{ $seminar['waktu_seminar_proposal']}}</td>
                  <td>{{ $seminar['tempat_seminar_proposal']}}</td>
                  <td>
                    @if($seminar['status_seminar_proposal'] == 'Belum Mulai')
                    <span class="badge light badge-danger">{{$seminar['status_seminar_proposal']}}</span>
                    @elseif ($seminar['status_seminar_proposal'] == 'Sedang Berlangsung')
                    <span class="badge light badge-primary">{{$seminar['status_seminar_proposal']}}</span>
                    @elseif ($seminar['status_seminar_proposal'] == 'Selesai')
                    <span class="badge light badge-success">{{$seminar['status_seminar_proposal']}}</span>
                    @endif
                  </td>
                  <td>
                    @if($seminar['status_verifikasi_seminar_proposal'] == 'Belum Verifikasi')
                    <span class="badge light badge-danger">{{$seminar['status_verifikasi_seminar_proposal']}}</span>
                    @elseif ($seminar['status_verifikasi_seminar_proposal'] == 'Revisi')
                    <span class="badge light badge-warning">{{$seminar['status_verifikasi_seminar_proposal']}}</span>
                    @elseif ($seminar['status_verifikasi_seminar_proposal'] == 'Lulus Seminar')
                    <span class="badge light badge-success">{{$seminar['status_verifikasi_seminar_proposal']}}</span>
                    @endif
                  </td>
                  <td>
                    <div class="dropdown ml-3 ">
                      <button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                          </g>
                        </svg>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="http://103.179.57.109/api/v1/{{$seminar['file_seminar_proposal']['url']}}" target="_black" class="dropdown-item">Lihat File Proposal</a>
                        @if($seminar['status_seminar_proposal'] == 'Sedang Berlangsung')
                        <a href="{{ route('verifikasiseminar.show', $seminar['id']) }}" class="dropdown-item">Verifikasi Hasil Seminar</a>
                        @endif
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection