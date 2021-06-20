@extends('layouts.masteradmin')
@section('title')
<title>E-Skripsi | Edit Fakultas</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Fakultas</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary">Data Master</a></li>
        <li class="breadcrumb-item"><a href="/fakultas" class="text-primary">Fakultas</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Edit Data Fakultas</h4>
          </div>
          <div class="mt-3 mt-sm-0">
            <a href="/fakultas" class="btn btn-sm btn-secondary light"><i class="las la-times"></i></a>
          </div>
        </div>
        <div class="card-body">
          <div class="basic-form">
            <form action="{{ route('fakultas.update', $data_fakultas['id']) }}" method="POST">
              {{ method_field('PATCH') }}
              @csrf
              <fieldset disabled>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Fakultas</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control light" name="kode_fakultas" value="{{$data_fakultas['kode_fakultas']}}">
                  </div>
                </div>
              </fieldset>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Fakultas</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_fakultas" value="{{$data_fakultas['nama_fakultas']}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Singkatan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="singkatan_fakultas" value="{{$data_fakultas['singkatan_fakultas']}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <select id="status" name="status_fakultas" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Aktif" @if ($data_fakultas['status_fakultas']=='Aktif' ) selected @endif>Aktif</option>
                    <option value="Non Aktif" @if ($data_fakultas['status_fakultas']=='Non Aktif' ) selected @endif>Non Aktif</option>
                  </select> </div>
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