@extends('layouts.master')

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Fakultas</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary">Data Master</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary">Fakultas</a></li>
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
            <button type="button" class="btn btn-secondary light sharp" data-toggle="dropdown">
              <i class="las la-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="basic-form">
            <form>
              <fieldset disabled>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Fakultas</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="Kode Fakultas">
                  </div>
                </div>
              </fieldset>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Fakultas</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Nama Fakultas">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Singkatan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Singkatan">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <select id="status" class="form-control">
                    <option selected>-- Pilih Status --</option>
                    <option>Aktif</option>
                    <option>Non Aktif</option>
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