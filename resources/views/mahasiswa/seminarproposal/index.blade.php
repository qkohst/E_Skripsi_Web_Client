@extends('layouts.mastermahasiswa')
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
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Seminar Proposal</h4>
          </div>
        </div>
        <div class="card-body">
          <div class="default-tab mt-0 pt-0">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#pengajuan"><b>1.</b> Pengajuan Seminar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#pembimbing"><b>2.</b> Persetujuan Pembimbing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#penguji"><b>3.</b> Penguji & Waktu Seminar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#hasil"><b>4.</b> Hasil Seminar Proposal</a>
              </li>
            </ul>
            <div class="tab-content">
              <!-- Pengajuan Seminar -->
              <div class="tab-pane fade show active" id="pengajuan" role="tabpanel">
                <div class="pt-4">
                  <div class="row">
                    <div class="col">
                      <h4>Pengajuan Seminar Proposal</h4>
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
                              Untuk mengajukan seminar proposal, silahkan upload file proposal skripsi anda.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <form class="mt-3" action="{{ route('pengajuanseminar.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>File Proposal</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="file_seminar_proposal" id="customFile" accept="application/pdf" required>
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