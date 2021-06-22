@extends('layouts.masteradmin')

@section('title')
<title>E-Skripsi | Skripsi</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Skripsi</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Skripsi</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-2">
          <div class="custom-tab-1">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#profile">Seminar Proposal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#editprofile">Sidang Skripsi</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="profile" role="tabpanel">
                <div class="pt-4">
                  <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Program Studi</th>
                          <th>NPM</th>
                          <th>Nama Mahasiswa</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 0; ?>
                        @foreach($data_seminar as $seminar)
                        <?php $no++; ?>
                        <tr>
                          <td>{{$no}}</td>
                          <td>{{ $seminar['program_studi']['nama_program_studi']}}</td>
                          <td>{{ $seminar['mahasiswa']['npm_mahasiswa']}}</td>
                          <td>{{ $seminar['mahasiswa']['nama_mahasiswa']}}</td>
                          <td>
                            @if($seminar['status_seminar_proposal'] == 'Pengajuan')
                            <span class="badge light badge-warning">{{$seminar['status_seminar_proposal']}}<i class="ml-1 flaticon-381-send-2"></i></span>
                            @elseif($seminar['status_seminar_proposal'] == 'Selesai')
                            <span class="badge light badge-success">{{$seminar['status_seminar_proposal']}}<span class="ml-1 fa fa-check"></span></span>
                            @else
                            <span class="badge light badge-primary">{{$seminar['status_seminar_proposal']}}<span class="ml-1 fa fa-spinner"></span></span>
                            @endif
                          </td>
                          <td>
                            <div class="d-flex">
                              @if($seminar['status_seminar_proposal'] == 'Selesai')
                              <a href="/skripsi/{{$seminar['id']}}/detailseminar" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                              @endif
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade show" id="editprofile" role="tabpanel">
                <div class="pt-4">
                  <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Program Studi</th>
                          <th>NPM</th>
                          <th>Nama Mahasiswa</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 0; ?>
                        @foreach($data_sidang as $sidang)
                        <?php $no++; ?>
                        <tr>
                          <td>{{$no}}</td>
                          <td>{{ $sidang['program_studi']['nama_program_studi']}}</td>
                          <td>{{ $sidang['mahasiswa']['npm_mahasiswa']}}</td>
                          <td>{{ $sidang['mahasiswa']['nama_mahasiswa']}}</td>
                          <td>
                            @if($sidang['status_sidang_skripsi'] == 'Pengajuan')
                            <span class="badge light badge-warning">{{$sidang['status_sidang_skripsi']}}<i class="ml-1 flaticon-381-send-2"></i></span>
                            @elseif($sidang['status_sidang_skripsi'] == 'Selesai')
                            <span class="badge light badge-success">{{$sidang['status_sidang_skripsi']}}<span class="ml-1 fa fa-check"></span></span>
                            @else
                            <span class="badge light badge-primary">{{$sidang['status_sidang_skripsi']}}<span class="ml-1 fa fa-spinner"></span></span>
                            @endif
                          </td>
                          <td>
                            <div class="d-flex">
                              @if($sidang['status_sidang_skripsi'] == 'Selesai')
                              <a href="/skripsi/{{$sidang['id']}}/detailsidang" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                              @endif
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
      </div>
    </div>
  </div>
</div>
@endsection