@extends('layouts.master')

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Fakultas</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary">Data Master</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Fakultas</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Data Fakultas</h4>
          </div>
          <div class="mt-3 mt-sm-0">
            <button type="button" class="btn btn-sm btn-primary fs-14" data-toggle="dropdown" aria-expanded="false">
              Tambah
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="min-width: 845px">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Nama Fakultas</th>
                  <th>Singkatan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0; ?>
                @foreach($data_fakultas as $fakultas)
                <?php $no++; ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{ $fakultas['kode_fakultas']}}</td>
                  <td>{{ $fakultas['nama_fakultas']}}</td>
                  <td>{{ $fakultas['singkatan_fakultas']}}</td>
                  <td>
                    @if($fakultas['status_fakultas'] == 'Aktif')
                    <span class="badge light badge-success">{{$fakultas['status_fakultas']}}</span>
                    @else
                    <span class="badge light badge-danger">{{$fakultas['status_fakultas']}}</span>
                    @endif
                  </td>
                  <td>
                    <div class="d-flex">
                      <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                      <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection