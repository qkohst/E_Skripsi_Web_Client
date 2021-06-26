@extends('layouts.masterdosen')
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
        <li class="breadcrumb-item"><a href="/verifikasisidang" class="text-primary">Sidang Skripsi</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Verifikasi</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Verifikasi Hasil Sidang Skripsi</h4>
          </div>
        </div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-lg-2">
              <span>Nama</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_sidang['mahasiswa']['nama_mahasiswa']}}</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-2">
              <span>NPM</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_sidang['mahasiswa']['npm_mahasiswa']}}</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-2 ">
              <span>Judul Skripsi</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_sidang['judul_skripsi']['nama_judul_skripsi']}}</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-2 ">
              <span>Jabatan Dosen</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_sidang['jabatan_dosen_sidang_skripsi']}}</span>
            </div>
          </div>
          <div class="default-tab mt-2">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#verifikasi">Verifikasi Hasil Sidang</a>
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
                      <h4>Verifikasi Hasil Sidang</h4>
                    </div>
                    <div class="col">
                      <button class="btn btn-info shadow btn-sm sharp float-right" data-toggle="modal" data-target="#infoModal"><i class="fa fa-question"></i></button>
                    </div>
                    <!-- Modal Info-->
                    <div class="modal fade" id="infoModal">
                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Informasi Verifikasi</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>
                              Silahkan melakukan verifikasi hasil sidang skripsi.
                            </p>
                            <p>
                              Jika anda memilih status verifikasi <b>"Revisi"</b>, anda dapat menuliskan point revisi pada kolom <b>Catatan</b> yang telah disediakan.
                            </p>
                            <p>
                              Anda baru bisa melalukan input nilai ketika anda memilih status verifikasi <b>"Lulus Sidang"</b>.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form class="mt-3" action="{{ route('verifikasisidang.update', $data_sidang['id']) }}" method="post">
                    {{ method_field('PATCH') }}
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>Status Verifikasi</label>
                        <select id="status_verifikasi_hasil_sidang_skripsi" name="status_verifikasi_hasil_sidang_skripsi" class="form-control" required>
                          <option value="" @if ($data_sidang['status_verifikasi_hasil_sidang_skripsi']=='Belum Verifikasi' ) selected @endif>-- Pilih Status Verifikasi --</option>
                          <option value="Lulus Sidang" @if ($data_sidang['status_verifikasi_hasil_sidang_skripsi']=='Lulus Sidang' ) selected @endif>Lulus Sidang</option>
                          <option value="Revisi" @if ($data_sidang['status_verifikasi_hasil_sidang_skripsi']=='Revisi' ) selected @endif>Revisi</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>Catatan</label>
                        <textarea class="summernote" name="catatan_hasil_sidang_skripsi" rows="3">{{$data_sidang['catatan_hasil_sidang_skripsi']}}</textarea>
                      </div>
                    </div>
                    <div class="form-row float-right">
                      <a href="{{ route('verifikasisidang.index') }}" class="btn btn-sm btn-danger light">Batal</a>
                      <button type="submit" class="btn btn-sm btn-primary ml-2">Simpan</button>
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