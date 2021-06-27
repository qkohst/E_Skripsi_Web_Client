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
              <span>: {{$data_seminar['pembimbing1_seminar_proposal']}}</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-2 ">
              <span>Pembimbing 2</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_seminar['pembimbing2_seminar_proposal']}}</span>
            </div>
          </div>
          <div class="default-tab mt-2">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tentukan">Tentukan Penguji dan Waktu Seminar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#persetujuan">Persetujuan Dosen Penguji</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" data-toggle="tab" href="#hasil">Hasil Seminar Proposal</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tentukan" role="tabpanel">
                <div class="pt-4">
                  <div class="row">
                    <div class="col">
                      <h4>Tentukan Penguji dan Waktu Seminar</h4>
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
                              Silahkan tentukan dosen penguji, waktu seminar dan tempat pelaksanaan seminar.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form class="mt-3" action="{{ route('seminarproposal.update', $data_seminar['id']) }}" method="post">
                    {{ method_field('PATCH') }}
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label col-form-label">Penguji 1</label>
                          <div class="col-sm-9">
                            <select name="id_dosen_penguji1_seminar_proposal" class="form-control" required>
                              <option value="">-- Pilih Dosen Penguji 1 --</option>
                              @foreach($data_dosen as $dosen)
                              <option value="{{$dosen['id']}}" @if ($dosen['nama_dosen']==$data_seminar['pembimbing1_seminar_proposal'] || $dosen['nama_dosen']==$data_seminar['pembimbing2_seminar_proposal'] ) disabled class="bg-light" @endif>{{$dosen['nidn_dosen']}} | {{$dosen['nama_dosen']}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label col-form-label">Penguji 2</label>
                          <div class="col-sm-9">
                            <select name="id_dosen_penguji2_seminar_proposal" class="form-control" required>
                              <option value="">-- Pilih Dosen Penguji 2 --</option>
                              @foreach($data_dosen as $dosen)
                              <option value="{{$dosen['id']}}" @if ($dosen['nama_dosen']==$data_seminar['pembimbing1_seminar_proposal'] || $dosen['nama_dosen']==$data_seminar['pembimbing2_seminar_proposal'] ) disabled class="bg-light" @endif>{{$dosen['nidn_dosen']}} | {{$dosen['nama_dosen']}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label col-form-label">Waktu Seminar</label>
                          <div class="col-sm-9">
                            <input type="datetime-local" class="form-control" name="waktu_seminar_proposal" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label col-form-label">Tempat</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="tempat_seminar_proposal" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row float-right">
                      <a href="{{ route('seminarproposal.index') }}" class="btn btn-sm btn-danger light">Batal</a>
                      <button type="submit" class="btn btn-sm btn-primary ml-2">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="tab-pane fade show" id="persetujuan">
                <div class="pt-4">
                  <div class="row">
                    <div class="col">
                      <h4 class="float-left">Persetujuan Dosen Penguji</h4>
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