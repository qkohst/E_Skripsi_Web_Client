@extends('layouts.mastermahasiswa')
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
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Sidang Skripsi</h4>
          </div>
        </div>
        <div class="card-body">
          <div class="default-tab mt-0 pt-0">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#pengajuan"><b>1.</b> Pengajuan Sidang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pembimbing"><b>2.</b> Persetujuan Pembimbing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#waktu"><b>3.</b> Waktu Sidang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#hasil"><b>4.</b> Hasil Sidang Skripsi</a>
              </li>
            </ul>
            <div class="tab-content">
              <!-- Status KRS -->
              <div class="tab-pane fade show" id="pembimbing" role="tabpanel">
                <div class="pt-4">
                  <div class="row">
                    <div class="col">
                      <h4>Persetujuan Dosen Pembimbing</h4>
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
                              Jika status persetujuan pembimbing 1 atau pembimbing 2 <b>Ditolak</b> silahkan lakukan pengajuan ulang sidang skripsi.
                            </p>
                            <p>
                              Tab <b>Waktu Sidang</b> akan aktif, ketika waktu sidang skripsi sudah ditentukan oleh admin prodi.
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
                      <span>: {{$data_persetujuan_dosbing['tanggal_pengajuan_sidang_skripsi']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Persetujuan Pembimbing 1</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$data_persetujuan_dosbing['persetujuan_pembimbing1_sidang_skripsi']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Catatan Pembimbing 1</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$data_persetujuan_dosbing['catatan_pembimbing1_sidang_skripsi']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Persetujuan Pembimbing 2</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$data_persetujuan_dosbing['persetujuan_pembimbing2_sidang_skripsi']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Catatan Pembimbing 2</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$data_persetujuan_dosbing['catatan_pembimbing2_sidang_skripsi']}}</span>
                    </div>
                  </div>

                </div>
              </div>

              <!-- Status KRS -->
              <div class="tab-pane fade show active" id="waktu" role="tabpanel">
                <div class="pt-4">
                  <div class="row">
                    <div class="col">
                      <h4>Waktu Sidang Skripsi</h4>
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
                              Tab <b>Hasil Sidang Skripsi</b> akan aktif, ketika sudah dilakukan verifikasi pelaksanaan seminar oleh dosen pembimbing dan penguji.
                            </p>
                            <p>
                              Silahkan siapkan berkas dan segala sesuatu yang dibutuhkan untuk pelaksanaan sidang skripsi.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Dosen Penguji 1</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$data_waktu['dosen_penguji1_sidang_skripsi']['nidn_dosen']}} | {{$data_waktu['dosen_penguji1_sidang_skripsi']['nama_dosen']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Dosen Penguji 2</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$data_waktu['dosen_penguji2_sidang_skripsi']['nidn_dosen']}} | {{$data_waktu['dosen_penguji2_sidang_skripsi']['nama_dosen']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Waktu</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$data_waktu['waktu_sidang_skripsi']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2">
                      <span>Tempat</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$data_waktu['tempat_sidang_skripsi']}}</span>
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
</div>
@endsection