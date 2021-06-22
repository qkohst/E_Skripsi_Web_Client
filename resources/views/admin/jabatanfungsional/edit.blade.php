@extends('layouts.masteradmin')
@section('title')
<title>E-Skripsi | Edit Jabatan Fungsional</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Jabatan Fungsional</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary">Data Master</a></li>
        <li class="breadcrumb-item"><a href="/jabatanfungsional" class="text-primary">Jabatan Fungsional</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Edit Data Jabatan Fungsional</h4>
          </div>
          <div class="mt-3 mt-sm-0">
            <a href="/jabatanfungsional" class="btn btn-sm btn-secondary light"><i class="las la-times"></i></a>
          </div>
        </div>
        <div class="card-body">
          <div class="basic-form">
            <form action="{{ route('jabatanfungsional.update', $data_jabatanfungsional['id']) }}" method="POST">
              {{ method_field('PATCH') }}
              @csrf
              <fieldset disabled>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control light" name="nama_jabatan_fungsional" value="{{$data_jabatanfungsional['nama_jabatan_fungsional']}}">
                  </div>
                </div>
              </fieldset>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="deskripsi_jabatan_fungsional" style="height: 100px" required>{{$data_jabatanfungsional['deskripsi_jabatan_fungsional']}}</textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection