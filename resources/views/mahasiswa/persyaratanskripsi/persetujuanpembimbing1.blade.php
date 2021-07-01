@extends('layouts.mastermahasiswa')
@section('title')
<title>E-Skripsi | Persyaratan Skripsi</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Persyaratan Skripsi</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Persyaratan Skripsi</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Persyaratan Skripsi</h4>
          </div>
        </div>
        <div class="card-body">
          <div class="default-tab mt-0 pt-0">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#upload"><b>1.</b> Upload KRS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#verifikasi"><b>2.</b> Status Verifikasi KRS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#persetujuan1"><b>3.</b> Persetujuan Pembimbing 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#persetujuan2"><b>4.</b> Persetujuan Pembimbing 2</a>
              </li>
            </ul>
            <div class="tab-content">
              <!-- Status KRS -->
              <div class="tab-pane fade" id="verifikasi" role="tabpanel">
                <div class="pt-4">
                  <div class="row">
                    <div class="col">
                      <h4>Verifikasi KRS Oleh Admin Prodi</h4>
                    </div>
                    <div class="col">
                      <button class="btn btn-info shadow btn-sm sharp float-right" data-toggle="modal" data-target="#infoModal2"><i class="fa fa-question"></i></button>
                    </div>
                    <!-- Modal Info-->
                    <div class="modal fade" id="infoModal2">
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Informasi</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>
                              Jika status verifikasi KRS telah <b>Disetujui</b> anda dapat melanjutkan pada pengajuan judul dan dosen pembimbing 1.
                            </p>
                            <p>
                              Tetapi jika status <b>Ditolak</b>, silahkan lakukan upload ulang file KRS.
                            </p>
                            <p>
                              Form <b>Pengajuan Judul Skripsi</b> akan aktif jika status verifikasi KRS telah <b>Disetujui</b>.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Tanggal Pengajuan</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$status_krs['tanggal_pengajuan_file_krs']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Status</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$status_krs['status_persetujuan_admin_prodi_file_krs']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Catatan</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$status_krs['catatan_file_krs']}}</span>
                    </div>
                  </div>

                  <div class="form-row pt-2">
                    <div class="col">
                      <h4>Pengajuan Judul Skripsi</h4>
                    </div>
                  </div>
                  <form class="mt-3" action="{{ route('persyaratanskripsi.juduldosbing1')}}" method="post">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-lg-2">
                        <span>Judul Skripsi</span>
                      </div>
                      <div class="form-group col-lg-10">
                        <textarea class="form-control" name="nama_judul_skripsi" rows="3" required @if ($persetujuan_pembimbing1['persetujuan_dosen_pembimbing1'] !='Ditolak' ) disabled @endif></textarea>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-lg-2">
                        <span>Dosen Pembimbing 1</span>
                      </div>
                      <div class="form-group col-lg-10">
                        <select name="dosen_id_dosen" class="form-control" required @if ($persetujuan_pembimbing1['persetujuan_dosen_pembimbing1'] !='Ditolak' ) disabled @endif>
                          <option value="">-- Pilih Dosen Pembimbing 1 --</option>
                          @foreach($dosen_aktif as $dosen)
                          <option value="{{ $dosen['id']}}">{{ $dosen['nidn_dosen']}} | {{ $dosen['nama_dosen']}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-row float-left">
                      <button type="submit" class="btn btn-sm btn-primary ml-2" @if ($persetujuan_pembimbing1['persetujuan_dosen_pembimbing1'] !='Ditolak' ) disabled @endif>Simpan</button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Persetujuan Pembimbing 1 -->
              <div class="tab-pane fade show show active" id="persetujuan1" role="tabpanel">
                <div class="pt-4">
                  <div class="row">
                    <div class="col">
                      <h4>Persetujuan Dosen Pembimbing 1</h4>
                    </div>
                    <div class="col">
                      <button class="btn btn-info shadow btn-sm sharp float-right" data-toggle="modal" data-target="#infoModal"><i class="fa fa-question"></i></button>
                    </div>
                    <!-- Modal Info-->
                    <div class="modal fade" id="infoModal">
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Informasi</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>
                              Jika status persetujuan dosen pembimbing 1 telah <b>Disetujui</b> anda dapat melanjutkan pada pengajuan dosen pembimbing 2.
                            </p>
                            <p>
                              Tetapi jika status <b>Ditolak</b>, silahkan lakukan pengajuan ulang.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Tanggal Pengajuan</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$persetujuan_pembimbing1['tanggal_pengajuan_dosen_pembimbing1']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Judul Skripsi</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$persetujuan_pembimbing1['judul_skripsi']['nama_judul_skripsi']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Nama Dosen Pembimbing 1</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$persetujuan_pembimbing1['nidn_dosen_pembimbing1']}} | {{$persetujuan_pembimbing1['nama_dosen_pembimbing1']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Status</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$persetujuan_pembimbing1['persetujuan_dosen_pembimbing1']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Catatan</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$persetujuan_pembimbing1['catatan_dosen_pembimbing1']}}</span>
                    </div>
                  </div>

                  <form class="mt-3" action="{{ route('persyaratanskripsi.juduldosbing2')}}" method="post">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-lg-2">
                        <span>Dosen Pembimbing 2</span>
                      </div>
                      <div class="form-group col-lg-10">
                        <select id="status_verifikasi_hasil_seminar_proposal" name="dosen_id_dosen" class="form-control" required @if ($persetujuan_pembimbing1['persetujuan_dosen_pembimbing1'] !='Disetujui' ) disabled @endif>
                          <option value="">-- Pilih Dosen Pembimbing 2 --</option>
                          @foreach($dosen_aktif as $dosen)
                          <option value="{{ $dosen['id']}}" @if ($dosen['nama_dosen']==$persetujuan_pembimbing1['nama_dosen_pembimbing1'] ) disabled class="bg-light" @endif>{{ $dosen['nidn_dosen']}} | {{ $dosen['nama_dosen']}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-row float-left">
                      <button type="submit" class="btn btn-sm btn-primary ml-2" @if ($persetujuan_pembimbing1['persetujuan_dosen_pembimbing1'] !='Disetujui' ) disabled @endif>Simpan</button>
                    </div>
                  </form>
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