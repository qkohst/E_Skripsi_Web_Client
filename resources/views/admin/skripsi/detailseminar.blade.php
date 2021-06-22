@extends('layouts.masteradmin')

@section('title')
<title>E-Skripsi | Detail Seminar</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Skripsi</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/skripsi" class="text-primary">Skripsi</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Seminar Proposal</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Detail Seminar Proposal</h5>
          <a class="btn btn-sm btn-light" href="/skripsi"><span>&times;</span></a>
        </div>
        <div class="card-body pt-2">
          <table class="table table-borderless">
            <tbody>
              <tr class="text-left">
                <td>Nama Mahasiswa</td>
                <td>:</td>
                <td>{{$data_seminar['mahasiswa']['nama_mahasiswa']}}</td>
              </tr>
              <tr class="text-left">
                <td>Program Studi</td>
                <td>:</td>
                <td>{{$data_seminar['program_studi']['nama_program_studi']}}</td>
              </tr>
              <tr class="text-left">
                <td>NPM</td>
                <td>:</td>
                <td>{{$data_seminar['mahasiswa']['npm_mahasiswa']}}</td>
              </tr>
              <tr class="text-left">
                <td>Judul Skripsi</td>
                <td>:</td>
                <td>{{$data_seminar['judul_skripsi']['nama_judul_skripsi']}}</td>
              </tr>
              <tr class="text-left">
                <td>Pembimbing 1</td>
                <td>:</td>
                <td>{{$data_seminar['dosen_pembimbing_1']['nama_dosen_pembimbing_1']}}</td>
              </tr>
              <tr class="text-left">
                <td>Pembimbing 2</td>
                <td>:</td>
                <td>{{$data_seminar['dosen_pembimbing_2']['nama_dosen_pembimbing_2']}}</td>
              </tr>
              <tr class="text-left">
                <td>Penguji 1</td>
                <td>:</td>
                <td>{{$data_seminar['dosen_penguji_1']['nama_dosen_penguji_1']}}</td>
              </tr>
              <tr class="text-left">
                <td>Penguji 2</td>
                <td>:</td>
                <td>{{$data_seminar['dosen_penguji_2']['nama_dosen_penguji_2']}}</td>
              </tr>
              <tr class="text-left">
                <td>Tanggal Seminar</td>
                <td>:</td>
                <td>{{date('d-M-Y', strtotime($data_seminar['tanggal_seminar_proposal']))}}</td>
              </tr>
              <tr class="text-left">
                <td>Status</td>
                <td>:</td>
                <td>{{$data_seminar['status_seminar_proposal']}}</td>
              </tr>
              <tr class="text-left">
                <td>Nilai Akhir Seminar</td>
                <td>:</td>
                <td>{{$data_seminar['nilai_akhir_seminar_proposal']}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection