@extends('layouts.masteradminprodi')
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
            <h4 class="card-title">Data Seminar Proposal</h4>
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
                  <th>Tanggal Pengajuan</th>
                  <th>Persetujuan Pembimbing</th>
                  <th>Penguji & Waktu Seminar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0; ?>
                @foreach($data_seminar as $seminar)
                <?php $no++; ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{ $seminar['mahasiswa']['nama_mahasiswa']}}</td>
                  <td>{{ $seminar['judul_skripsi']['nama_judul_skripsi']}}</td>
                  <td>{{ $seminar['tanggal_pengajuan_seminar_proposal']}}</td>
                  <td>
                    <span class="badge light badge-success">{{ $seminar['persetujuan_pembimbing_seminar_proposal']}}</span>
                  </td>
                  <td>
                    @if($seminar['penguji_dan_waktu_seminar_proposal'] == 'Belum Ditentukan')
                    <span class="badge light badge-primary">{{$seminar['penguji_dan_waktu_seminar_proposal']}}</span>
                    @elseif ($seminar['penguji_dan_waktu_seminar_proposal'] == 'Telah Ditentukan')
                    <span class="badge light badge-success">{{$seminar['penguji_dan_waktu_seminar_proposal']}}</span>
                    @elseif ($seminar['penguji_dan_waktu_seminar_proposal'] == 'Menunggu Persetujuan Penguji')
                    <span class="badge light badge-info">{{$seminar['penguji_dan_waktu_seminar_proposal']}}</span>
                    @elseif ($seminar['penguji_dan_waktu_seminar_proposal'] == 'Ditolak Penguji')
                    <span class="badge light badge-danger">{{$seminar['penguji_dan_waktu_seminar_proposal']}}</span>
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
                        <a class="dropdown-item" target="_black" href="http://127.0.0.1:8000/api/v1/{{$seminar['file_seminar_proposal']['url']}}">Lihat File</a>
                        <a class="dropdown-item" href="{{ route('seminarproposal.show', $seminar['id']) }}">Detail</a>
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