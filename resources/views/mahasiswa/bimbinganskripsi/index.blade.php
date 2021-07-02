@extends('layouts.mastermahasiswa')
@section('title')
<title>E-Skripsi | Bimbingan Skripsi</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Bimbingan Skripsi</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Bimbingan Skripsi</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Bimbingan Skripsi</h4>
          </div>
          <div class="mt-3 mt-sm-0">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#pengajuan">Ajukan Bimbingan</button>
            <a href="{{ route('pengajuanbimbinganskripsi.beritaacara') }}" target="_black" class="btn btn-sm btn-primary">Cetak Berita Acara</a>
          </div>
        </div>

        <!-- Modal Pengajuan Bimbingan-->
        <div class="modal fade" id="pengajuan">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Pengajuan Bimbingan Skripsi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
              </div>
              <form action="{{ route('pengajuanbimbinganskripsi.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Topik Bimbingan</label>
                      <input type="text" name="topik_bimbingan_skripsi" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>File Skripsi</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="nama_file_bimbingan_skripsi" id="customFile" accept="application/pdf" required>
                        <label class="custom-file-label" for="customFile">Belum ada file yang dipilih</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Diajukan Kepada</label>
                      <select name="dosen_pembimbing_id_dosen_pembimbing" class="form-control" required>
                        <option value="">-- Pilih Dosen Pembimbing --</option>
                        @foreach($dosen_pembimbing as $pembimbing)
                        <option value="{{$pembimbing['id']}}">{{$pembimbing['jabatan_dosen_pembimbing']}} | {{$pembimbing['dosen']['nama_dosen']}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="min-width: 845px">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Dosen Pembimbing</th>
                  <th>Topik Bimbingan</th>
                  <th>Tgl Pengajuan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0; ?>
                @foreach($bimbinganskripsi as $skripsi)
                <?php $no++; ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{ $skripsi['dosen_pembimbing']['nama_dosen']}}</td>
                  <td>{{ $skripsi['topik_bimbingan_skripsi']}}</td>
                  <td>{{ $skripsi['tanggal_pengajuan_bimbingan_skripsi']}}</td>
                  <td>
                    @if($skripsi['status_persetujuan_bimbingan_skripsi'] == 'Antrian')
                    <span class="badge light badge-primary">{{$skripsi['status_persetujuan_bimbingan_skripsi']}}</span>
                    @elseif ($skripsi['status_persetujuan_bimbingan_skripsi'] == 'Disetujui')
                    <span class="badge light badge-success">{{$skripsi['status_persetujuan_bimbingan_skripsi']}}</span>
                    @elseif ($skripsi['status_persetujuan_bimbingan_skripsi'] == 'Revisi')
                    <span class="badge light badge-warning">{{$skripsi['status_persetujuan_bimbingan_skripsi']}}</span>
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
                        <a href="http://127.0.0.1:8000/api/v1/{{$skripsi['file_bimbingan_skripsi']['url']}}" target="_black" class="dropdown-item">File Skripsi</a>
                        <button class="dropdown-item" data-toggle="modal" data-target="#modalDetail{{$skripsi['id']}}">Detail</button>
                      </div>
                    </div>
                  </td>
                </tr>
                <!-- Modal Detail-->
                <div class="modal fade" id="modalDetail{{$skripsi['id']}}">
                  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Detail Bimbingan Skripsi</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-row">
                          <div class="form-group col-2">
                            <span>Topik Bimbingan</span>
                          </div>
                          <div class="form-group col-10">
                            <span>: {{$skripsi['topik_bimbingan_skripsi']}}</span>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-2">
                            <span>Tgl Pengajuan</span>
                          </div>
                          <div class="form-group col-10">
                            <span>: {{$skripsi['tanggal_pengajuan_bimbingan_skripsi']}}</span>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-2">
                            <span>Dosen Pembimbing</span>
                          </div>
                          <div class="form-group col-10">
                            <span>: {{$skripsi['dosen_pembimbing']['nama_dosen']}}</span>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-2">
                            <span>Status</span>
                          </div>
                          <div class="form-group col-10">
                            <span>: {{$skripsi['status_persetujuan_bimbingan_skripsi']}}</span>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-12">
                            <span><b>Catatan :</b></span>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-12">
                            <span>{!!$skripsi['catatan_bimbingan_skripsi']!!}</span>
                          </div>
                        </div>
                      </div>
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