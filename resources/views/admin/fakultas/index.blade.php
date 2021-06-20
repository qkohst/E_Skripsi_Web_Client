@extends('layouts.masteradmin')
@section('title')
<title>E-Skripsi | Fakultas</title>
@endsection

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
            <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modalCreate">Tambah</button>
          </div>
          <!-- Modal -->
          <div class="modal fade bd-example-modal-lg" id="modalCreate">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Fakultas</h5>
                  <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                  </button>
                </div>
                <form action="{{ route('fakultas.store') }}" method="POST">
                  @csrf
                  <div class="modal-body">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Kode Fakultas</label>
                      <div class="col-sm-9">
                        <input type="number" name="kode_fakultas" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Fakultas</label>
                      <div class="col-sm-9">
                        <input type="text" name="nama_fakultas" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Singkatan</label>
                      <div class="col-sm-9">
                        <input type="text" name="singkatan_fakultas" class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
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
                      <a href="{{ route('fakultas.edit', $fakultas['id']) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                      <form action="{{ route('fakultas.destroy', $fakultas['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Hapus Data ?')"><i class="fa fa-trash"></i></button>
                      </form>
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