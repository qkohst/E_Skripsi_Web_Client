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
                <a class="nav-link active" data-toggle="tab" href="#upload"><b>1.</b> Upload KRS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#verifikasi"><b>2.</b> Status Verifikasi KRS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#persetujuan1"><b>3.</b> Persetujuan Pembimbing 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#persetujuan2"><b>4.</b> Persetujuan Pembimbing 2</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="upload" role="tabpanel">
                <div class="pt-4">
                  <div class="row">
                    <div class="col">
                      <h4>Upload KRS</h4>
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
                              Silahkan upload file KRS dengan mata kuliah Tugas Akhir (Skripsi).
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form class="mt-3" action="{{ route('persyaratanskripsi.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>File KRS</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="file_krs" id="customFile" accept="image/*" required>
                          <label class="custom-file-label" for="customFile">Belum ada file yang dipilih</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <button type="submit" class="btn btn-sm btn-primary ml-2">Upload</button>
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