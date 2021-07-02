@extends('layouts.masteradmin')
@section('title')
<title>E-Skripsi | Jabatan Fungsional</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Jabatan Fungsional</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary">Data Master</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Jabatan Fungsional</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Data Jabatan Fungsional</h4>
          </div>
          <div class="mt-3 mt-sm-0">
            <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modalCreate">Tambah</button>
          </div>
          <!-- Modal -->
          <div class="modal fade bd-example-modal-lg" id="modalCreate">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Jabatan Fungsional</h5>
                  <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                  </button>
                </div>
                <form action="{{ route('jabatanfungsional.store') }}" method="POST">
                  @csrf
                  <div class="modal-body">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Jabatan</label>
                      <div class="col-sm-9">
                        <input type="text" name="nama_jabatan_fungsional" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Deskripsi</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name="deskripsi_jabatan_fungsional" style="height: 100px" required></textarea>
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
                  <th>Nama Jabatan</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0; ?>
                @foreach($data_jabatanfungsional as $jabatanfungsional)
                <?php $no++; ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{ $jabatanfungsional['nama_jabatan_fungsional']}}</td>
                  <td>{{ $jabatanfungsional['deskripsi_jabatan_fungsional']}}</td>
                  <td>
                    <div class="d-flex">
                      <button type="button" class="btn btn-primary shadow btn-xs sharp mr-1" data-toggle="modal" data-target="#modalEdit{{$jabatanfungsional['id']}}"><i class="fa fa-pencil"></i></button>
                      <form action="{{ route('jabatanfungsional.destroy', $jabatanfungsional['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Hapus Data ?')"><i class="fa fa-trash"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
                <!-- Modal Edit-->
                <div class="modal fade" id="modalEdit{{$jabatanfungsional['id']}}">
                  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Data Jabatan Fungsional</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="basic-form">
                          <form action="{{ route('jabatanfungsional.update', $jabatanfungsional['id']) }}" method="POST">
                            {{ method_field('PATCH') }}
                            @csrf
                            <fieldset disabled>
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Jabatan</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control light" name="nama_jabatan_fungsional" value="{{$jabatanfungsional['nama_jabatan_fungsional']}}">
                                </div>
                              </div>
                            </fieldset>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Deskripsi</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" name="deskripsi_jabatan_fungsional" style="height: 100px" required>{{$jabatanfungsional['deskripsi_jabatan_fungsional']}}</textarea>
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