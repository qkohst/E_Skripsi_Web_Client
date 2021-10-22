@extends('layouts.masterdosen')
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
        <li class="breadcrumb-item"><a href="/verifikasiseminar" class="text-primary">Seminar Proposal</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Verifikasi</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Verifikasi Hasil Seminar Proposal</h4>
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
            <div class="form-group col-lg-2">
              <span>NPM</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_seminar['mahasiswa']['npm_mahasiswa']}}</span>
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
              <span>Jabatan Dosen</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_seminar['jabatan_dosen_seminar_proposal']}}</span>
            </div>
          </div>
          <div class="default-tab mt-2">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#verifikasi">Verifikasi Hasil Seminar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#inputNilai">Input Nilai</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="verifikasi" role="tabpanel">
                <div class="pt-4">
                  <div class="row">
                    <div class="col">
                      <h4>Verifikasi Hasil Seminar</h4>
                    </div>
                    <div class="col">
                      <button class="btn btn-info shadow btn-sm sharp float-right" data-toggle="modal" data-target="#infoModal"><i class="fa fa-question"></i></button>
                    </div>
                    <!-- Modal Info-->
                    <div class="modal fade" id="infoModal">
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Informasi Verifikasi</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>
                              Silahkan lakukan verifikasi hasil seminar proposal.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form class="mt-3" action="{{ route('verifikasiseminar.update', $data_seminar['id']) }}" method="post">
                    {{ method_field('PATCH') }}
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>Status Verifikasi</label>
                        <select id="status_verifikasi_hasil_seminar_proposal" name="status_verifikasi_hasil_seminar_proposal" class="form-control" required>
                          <option value="" @if ($data_seminar['status_verifikasi_hasil_seminar_proposal']=='Belum Verifikasi' ) selected @endif>-- Pilih Status Verifikasi --</option>
                          <option value="Lulus Seminar" @if ($data_seminar['status_verifikasi_hasil_seminar_proposal']=='Lulus Seminar' ) selected @endif>Lulus Seminar</option>
                          <option value="Revisi" @if ($data_seminar['status_verifikasi_hasil_seminar_proposal']=='Revisi' ) selected @endif>Revisi</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>Catatan</label>
                        <textarea class="summernote" name="catatan_hasil_seminar_proposal" rows="3">{{$data_seminar['catatan_hasil_seminar_proposal']}}</textarea>
                      </div>
                    </div>
                    <div class="form-row float-right">
                      <a href="{{ route('verifikasiseminar.index') }}" class="btn btn-sm btn-danger light">Batal</a>
                      <button type="submit" class="btn btn-sm btn-primary ml-2">Selanjutnya</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="tab-pane fade show" id="inputNilai">
                <div class="pt-4">
                  <div class="row">
                    <div class="col">
                      <h4 class="float-left">Input Nilai</h4>
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