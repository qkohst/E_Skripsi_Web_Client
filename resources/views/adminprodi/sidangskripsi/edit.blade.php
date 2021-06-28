@extends('layouts.masteradminprodi')
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
        <li class="breadcrumb-item"><a href="/sidangskripsi" class="text-primary">Sidang Skripsi</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Detail Sidang Skripsi</h4>
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
            <div class="form-group col-lg-2 ">
              <span>Judul Skripsi</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_sidang['judul_skripsi']['nama_judul_skripsi']}}</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-2 ">
              <span>Pembimbing 1</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_sidang['pembimbing1_sidang_skripsi']}}</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-2 ">
              <span>Pembimbing 2</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_sidang['pembimbing2_sidang_skripsi']}}</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-2 ">
              <span>Penguji 1</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_sidang['penguji1_sidang_skripsi']}}</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-2 ">
              <span>Penguji 2</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_sidang['penguji2_sidang_skripsi']}}</span>
            </div>
          </div>
          <div class="default-tab mt-2">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tentukan">Tentukan Waktu Sidang Skripsi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#hasil">Hasil Sidang Skripsi</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tentukan" role="tabpanel">
                <div class="pt-4">
                  <div class="row">
                    <div class="col">
                      <h4>Tentukan Waktu Sidang Skripsi</h4>
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
                              Silahkan tentukan waktu dan tempat sidang skripsi. <b>Proses ini hanya dapat dilakukan 1 kali, </b> artinya anda tidak dapat merubah waktu dan tempat yang telah ditentukan.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form class="mt-3" action="{{ route('sidangskripsi.update', $data_sidang['id']) }}" method="post">
                    {{ method_field('PATCH') }}
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label col-form-label">Waktu Sidang</label>
                          <div class="col-sm-9">
                            <input type="datetime-local" class="form-control" name="waktu_sidang_skripsi" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label col-form-label">Tempat</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="tempat_sidang_skripsi" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row float-right">
                      <a href="{{ route('sidangskripsi.index') }}" class="btn btn-sm btn-danger light">Batal</a>
                      <button type="submit" class="btn btn-sm btn-primary ml-2">Simpan</button>
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