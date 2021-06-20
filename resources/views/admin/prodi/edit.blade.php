@extends('layouts.masteradmin')
@section('title')
<title>E-Skripsi | Edit Program Studi</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Program Studi</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary">Data Master</a></li>
        <li class="breadcrumb-item"><a href="/prodi" class="text-primary">Program Studi</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Edit Data Program Studi</h4>
          </div>
          <div class="mt-3 mt-sm-0">
            <a href="/prodi" class="btn btn-sm btn-secondary light"><i class="las la-times"></i></a>
          </div>
        </div>
        <div class="card-body">
          <div class="basic-form">
            <form action="{{ route('prodi.update', $data_prodi['id']) }}" method="POST">
              {{ method_field('PATCH') }}
              @csrf
              <fieldset disabled>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Program Studi</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control light" name="kode_program_studi" value="{{$data_prodi['kode_program_studi']}}">
                  </div>
                </div>
              </fieldset>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Program Studi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_program_studi" value="{{$data_prodi['nama_program_studi']}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Singkatan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="singkatan_program_studi" value="{{$data_prodi['singkatan_program_studi']}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <select id="status" name="status_program_studi" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Aktif" @if ($data_prodi['status_program_studi']=='Aktif' ) selected @endif>Aktif</option>
                    <option value="Non Aktif" @if ($data_prodi['status_program_studi']=='Non Aktif' ) selected @endif>Non Aktif</option>
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