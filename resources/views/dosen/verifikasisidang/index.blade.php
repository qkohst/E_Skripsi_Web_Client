@extends('layouts.masterdosen')
@section('title')
<title>E-Skripsi | Sidang Skripsi</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Sidang Skripsi</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Sidang Skripsi</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Sidang Skripsi</h4>
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
                @foreach($verifikasisidang as $sidang)
                <?php $no++; ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{ $sidang['mahasiswa']['nama_mahasiswa']}}</td>
                  <td>{{ $sidang['judul_skripsi']['nama_judul_skripsi']}}</td>
                  <td>{{ $sidang['jabatan_dosen_sidang_skripsi']}}</td>
                  <td>{{ $sidang['waktu_sidang_skripsi']}}</td>
                  <td>{{ $sidang['tempat_sidang_skripsi']}}</td>
                  <td>
                    @if($sidang['status_sidang_skripsi'] == 'Belum Mulai')
                    <span class="badge light badge-danger">{{$sidang['status_sidang_skripsi']}}</span>
                    @elseif ($sidang['status_sidang_skripsi'] == 'Sedang Berlangsung')
                    <span class="badge light badge-primary">{{$sidang['status_sidang_skripsi']}}</span>
                    @elseif ($sidang['status_sidang_skripsi'] == 'Selesai')
                    <span class="badge light badge-success">{{$sidang['status_sidang_skripsi']}}</span>
                    @endif
                  </td>
                  <td>
                    @if($sidang['status_verifikasi_sidang_skripsi'] == 'Belum Verifikasi')
                    <span class="badge light badge-danger">{{$sidang['status_verifikasi_sidang_skripsi']}}</span>
                    @elseif ($sidang['status_verifikasi_sidang_skripsi'] == 'Revisi')
                    <span class="badge light badge-warning">{{$sidang['status_verifikasi_sidang_skripsi']}}</span>
                    @elseif ($sidang['status_verifikasi_sidang_skripsi'] == 'Lulus Sidang')
                    <span class="badge light badge-success">{{$sidang['status_verifikasi_sidang_skripsi']}}</span>
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
                        <a href="http://127.0.0.1:8000/api/v1/{{$sidang['file_sidang_skripsi']['url']}}" target="_black" class="dropdown-item">Lihat File Sidang</a>
                        @if($sidang['status_sidang_skripsi'] == 'Sedang Berlangsung')
                        <a href="{{ route('verifikasisidang.show', $sidang['id']) }}" class="dropdown-item">Verifikasi Hasil Sidang</a>
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