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
                <a class="nav-link disabled" data-toggle="tab" href="#pengajuan"><b>1.</b> Pengajuan Seminar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#pembimbing"><b>2.</b> Persetujuan Pembimbing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#penguji"><b>3.</b> Penguji & Waktu Seminar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#hasil"><b>4.</b> Hasil Seminar Proposal</a>
              </li>
            </ul>
            <div class="tab-content">
              <!-- Hasil Seminar -->
              <div class="tab-pane fade show active" id="hasil" role="tabpanel">
                <div class="pt-4">
                  <div class="row">
                    <div class="col">
                      <h4>Hasil Seminar Proposal</h4>
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
                              Sebelum anda mencetak nilai pastikan semua status verifikasi dinyatakan <b>Lulus Seminar</b>.
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
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 0; ?>
                        @foreach($data_hasil_seminar as $hasil_seminar)
                        <?php $no++; ?>
                        <tr>
                          <td>{{$no}}</td>
                          <td>{{$hasil_seminar['dosen']['nama_dosen']}}</td>
                          <td>{{$hasil_seminar['dosen']['status_dosen']}}</td>
                          <td>{{$hasil_seminar['status_verifikasi_hasil_seminar_proposal']}}</td>
                          <td>
                            @if($hasil_seminar['status_verifikasi_hasil_seminar_proposal'] == 'Revisi')
                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalDetail{{$hasil_seminar['id']}}">Detail Revisi</button>
                            @endif
                          </td>
                        </tr>
                        <!-- Modal Detail-->
                        <div class="modal fade" id="modalDetail{{$hasil_seminar['id']}}">
                          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Detail Revisi</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-row">
                                  <div class="form-group col-2">
                                    <span>Nama Dosen</span>
                                  </div>
                                  <div class="form-group col-10">
                                    <span>: {{$hasil_seminar['dosen']['nama_dosen']}}</span>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-2">
                                    <span>Status Dosen</span>
                                  </div>
                                  <div class="form-group col-10">
                                    <span>: {{$hasil_seminar['dosen']['status_dosen']}}</span>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-2">
                                    <span>Status Verifikasi</span>
                                  </div>
                                  <div class="form-group col-10">
                                    <span>: {{$hasil_seminar['status_verifikasi_hasil_seminar_proposal']}}</span>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-12">
                                    <span><b>Catatan :</b></span>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-12">
                                    <span>{!!$hasil_seminar['catatan_hasil_seminar_proposal']!!}</span>
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

                  <div class="row">
                    <a href="{{ route('pengajuanseminar.cetaknilai') }}" target="_black" class="btn btn-sm btn-primary ml-1">Cetak Daftar Nilai</a>
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