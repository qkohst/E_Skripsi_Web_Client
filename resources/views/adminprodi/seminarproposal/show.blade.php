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
        <li class="breadcrumb-item"><a href="/seminarproposal" class="text-primary">Seminar Proposal</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Detail Seminar Proposal</h4>
          </div>
        </div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-lg-2">
              <span>Nama</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_seminar['mahasiswa']['nama_mahasiswa']}}</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-2 ">
              <span>Judul Skripsi</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_seminar['judul_skripsi']['nama_judul_skripsi']}}</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-2 ">
              <span>Pembimbing 1</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_seminar['dosen_pembimbing1']['nama_dosen_pembimbing1']}}</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-2 ">
              <span>Pembimbing 2</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_seminar['dosen_pembimbing2']['nama_dosen_pembimbing2']}}</span>
            </div>
          </div>
          <div class="default-tab mt-2">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#tentukan">Tentukan Penguji dan Waktu Seminar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#persetujuan">Persetujuan Dosen Penguji</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#hasil">Hasil Seminar Proposal</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="persetujuan" role="tabpanel">
                <div class="pt-4">
                  <div class="row">
                    <div class="col">
                      <h4>Persetujuan Dosen Penguji</h4>
                    </div>
                    <div class="col">
                      <button class="btn btn-info shadow btn-sm sharp float-right" data-toggle="modal" data-target="#infoModal"><i class="fa fa-question"></i></button>
                    </div>
                    <!-- Modal Info-->
                    <div class="modal fade" id="infoModal">
                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Informasi</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>
                              Silahkan tunggu verifikasi dari kedua dosen penguji.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-lg-2 ">
                      <span>Penguji 1</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$data_seminar['dosen_penguji1']['nama_dosen_penguji1']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2 ">
                      <span>Persetujuan Penguji 1</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$data_seminar['dosen_penguji1']['persetujuan_dosen_penguji1']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2 ">
                      <span>Penguji 2</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$data_seminar['dosen_penguji2']['nama_dosen_penguji2']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2 ">
                      <span>Persetujuan Penguji 2</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$data_seminar['dosen_penguji2']['persetujuan_dosen_penguji2']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2 ">
                      <span>Waktu Seminar</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$data_seminar['waktu_seminar_proposal']}}</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-2 ">
                      <span>Tempat</span>
                    </div>
                    <div class="form-group col-lg-10">
                      <span>: {{$data_seminar['tempat_seminar_proposal']}}</span>
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