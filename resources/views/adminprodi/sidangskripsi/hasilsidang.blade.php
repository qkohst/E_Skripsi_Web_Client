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
                <a class="nav-link disabled" data-toggle="tab" href="#tentukan">Tentukan Waktu Sidang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#hasil">Hasil Sidang Skripsi</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="hasil" role="tabpanel">
                <div class="pt-4">
                  <div class="row">
                    <div class="col">
                      <h4>Hasil Sidang Skripsi</h4>
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
                              Anda dapat melakukan verifikasi sidang selesai dan cetak daftar nilai setelah status verifikasi dari dosen pembimbing dan dosen penguji dinyatakn lulus sidang.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="table-responsive">
                    <table class="table table-responsive-sm">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Dosen</th>
                          <th>Status Dosen</th>
                          <th>Status Verifikasi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 0; ?>
                        @foreach($data_hasil as $hasil)
                        <?php $no++; ?>
                        <tr>
                          <td>{{$no}}</td>
                          <td>{{$hasil['nama_dosen_sidang_skripsi']}}</td>
                          <td>{{$hasil['status_dosen_sidang_skripsi']}}</td>
                          <td>{{$hasil['status_verifikasi_dosen_sidang_skripsi']}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="row">
                    <form id="verifikasi-form" action="{{ route('sidangskripsi.verifikasi_selesai', $data_sidang['id']) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-sm btn-primary ml-3" onclick="return confirm('Verifikasi Sidang Skripsi ?')"> Verifikasi Sidang Skripsi Selesai
                      </button>
                    </form>
                    <a href="{{ route('sidangskripsi.cetak_nilai', $data_sidang['id']) }}" target="_black" class="btn btn-sm btn-primary ml-1">Cetak Daftar Nilai</a>
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