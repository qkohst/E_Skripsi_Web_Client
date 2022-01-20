@extends('layouts.masterdosen')
@section('title')
<title>E-Skripsi | Persetujuan Seminar Proposal</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Persetujuan Seminar Proposal</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Persetujuan Seminar Proposal</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Persetujuan Seminar Proposal</h4>
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
                  <th>Tgl Pengajuan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0; ?>
                @foreach($persetujuanseminar as $seminar)
                <?php $no++; ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{ $seminar['mahasiswa']['nama_mahasiswa']}}</td>
                  <td>{{ $seminar['judul_skripsi']['nama_judul_skripsi']}}</td>
                  <td>{{ $seminar['tanggal_pengajuan_persetujuan_seminar']}}</td>
                  <td>
                    @if($seminar['status_persetujuan_seminar'] == 'Antrian')
                    <span class="badge light badge-primary">{{$seminar['status_persetujuan_seminar']}}</span>
                    @elseif ($seminar['status_persetujuan_seminar'] == 'Disetujui')
                    <span class="badge light badge-success">{{$seminar['status_persetujuan_seminar']}}</span>
                    @elseif ($seminar['status_persetujuan_seminar'] == 'Ditolak')
                    <span class="badge light badge-danger">{{$seminar['status_persetujuan_seminar']}}</span>
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
                        <a href="http://103.179.57.109/api/v1/{{$seminar['file_persetujuan_seminar']['url']}}" target="_black" class="dropdown-item">Lihat File</a>
                        @if($seminar['status_persetujuan_seminar'] == 'Disetujui')
                        <button class="dropdown-item" data-toggle="modal" data-target="#modalDetail{{$seminar['id']}}">Lihat Detail</button>
                        @else
                        <button class="dropdown-item" data-toggle="modal" data-target="#modalVerifikasi{{$seminar['id']}}">Verifikasi</button>
                        @endif
                      </div>
                    </div>
                  </td>
                </tr>
                <!-- Modal Detail-->
                <div class="modal fade" id="modalDetail{{$seminar['id']}}">
                  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Detail Verifikasi Seminar Proposal</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-row">
                          <div class="form-group col-2">
                            <span>Nama Mahasiswa</span>
                          </div>
                          <div class="form-group col-10">
                            <span>: {{$seminar['mahasiswa']['npm_mahasiswa']}}</span>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-2">
                            <span>Judul Skripsi</span>
                          </div>
                          <div class="form-group col-10">
                            <span>: {{$seminar['judul_skripsi']['nama_judul_skripsi']}}</span>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-2">
                            <span>Status</span>
                          </div>
                          <div class="form-group col-10">
                            <span>: {{$seminar['status_persetujuan_seminar']}}</span>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-2">
                            <span>Catatan</span>
                          </div>
                          <div class="form-group col-10">
                            <span>: {{$seminar['catatan_persetujuan_seminar']}}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal Verifikasi-->
                <div class="modal fade" id="modalVerifikasi{{$seminar['id']}}">
                  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Verifikasi Seminar Proposal</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('persetujuanseminar.update', $seminar['id']) }}" method="POST">
                        {{ method_field('PATCH') }}
                        @csrf
                        <div class="modal-body">
                          <div class="form-row">
                            <div class="form-group col-2">
                              <span>Nama Mahasiswa</span>
                            </div>
                            <div class="form-group col-10">
                              <span>: {{$seminar['mahasiswa']['nama_mahasiswa']}}</span>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-2">
                              <span>Judul Skripsi</span>
                            </div>
                            <div class="form-group col-10">
                              <span>: {{$seminar['judul_skripsi']['nama_judul_skripsi']}}</span>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-2">
                              <span>Tgl Pengajuan</span>
                            </div>
                            <div class="form-group col-10">
                              <span>: {{$seminar['tanggal_pengajuan_persetujuan_seminar']}}</span>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label>Status</label>
                              <select id="status" name="status_persetujuan_seminar" class="form-control" required>
                                <option value="Antrian" @if ($seminar['status_persetujuan_seminar']=='Antrian' ) selected @endif>Antrian</option>
                                <option value="Disetujui" @if ($seminar['status_persetujuan_seminar']=='Disetujui' ) selected @endif>Disetujui</option>
                                <option value="Ditolak" @if ($seminar['status_persetujuan_seminar']=='Ditolak' ) selected @endif>Ditolak</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label>Catatan</label>
                              <textarea class="form-control" name="catatan_persetujuan_seminar" rows="3">{{$seminar['catatan_persetujuan_seminar']}}</textarea>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
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