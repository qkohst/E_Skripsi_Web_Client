@extends('layouts.masteradmin')
@section('title')
<title>E-Skripsi | Program Studi</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Program Studi</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary">Data Master</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Program Studi</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Data Program Studi</h4>
          </div>
          <div class="mt-3 mt-sm-0">
            <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modalCreate">Tambah</button>
          </div>
          <!-- Modal -->
          <div class="modal fade bd-example-modal-lg" id="modalCreate">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Program Studi</h5>
                  <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                  </button>
                </div>
                <form action="{{ route('prodi.store') }}" method="POST">
                  @csrf
                  <div class="modal-body">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Fakultas</label>
                      <div class="col-sm-9">
                        <div class="form-group">
                          <select class="form-control" name="kode_fakultas" id="sel1" required>
                            <option value="">-- Pilih Fakultas --</option>
                            @foreach($data_fakultas as $fakultas)
                            <option value="{{ $fakultas['id']}}">{{ $fakultas['kode_fakultas']}} - {{ $fakultas['nama_fakultas']}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Kode Program Studi</label>
                      <div class="col-sm-9">
                        <input type="number" name="kode_program_studi" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Program Studi</label>
                      <div class="col-sm-9">
                        <input type="text" name="nama_program_studi" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Singkatan</label>
                      <div class="col-sm-9">
                        <input type="text" name="singkatan_program_studi" class="form-control" required>
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
                  <th>Fakultas</th>
                  <th>Nama Program Studi</th>
                  <th>Singkatan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0; ?>
                @foreach($data_prodi as $program_studi)
                <?php $no++; ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{ $program_studi['kode_program_studi']}}</td>
                  <td>{{ $program_studi['fakultas']['nama_fakultas']}}</td>
                  <td>{{ $program_studi['nama_program_studi']}}</td>
                  <td>{{ $program_studi['singkatan_program_studi']}}</td>
                  <td>
                    @if($program_studi['status_program_studi'] == 'Aktif')
                    <span class="badge light badge-success">{{$program_studi['status_program_studi']}}</span>
                    @else
                    <span class="badge light badge-danger">{{$program_studi['status_program_studi']}}</span>
                    @endif
                  </td>
                  <td>
                    <div class="d-flex">
                      <button type="button" class="btn btn-primary shadow btn-xs sharp mr-1" data-toggle="modal" data-target="#modalEdit{{$program_studi['id']}}"><i class="fa fa-pencil"></i></button>
                      <form action="{{ route('prodi.destroy', $program_studi['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Hapus Data ?')"><i class="fa fa-trash"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
                <!-- Modal Edit-->
                <div class="modal fade" id="modalEdit{{$program_studi['id']}}">
                  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Data Program Studi</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="basic-form">
                          <form action="{{ route('prodi.update', $program_studi['id']) }}" method="POST">
                            {{ method_field('PATCH') }}
                            @csrf
                            <fieldset disabled>
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Program Studi</label>
                                <div class="col-sm-10">
                                  <input type="number" class="form-control light" name="kode_program_studi" value="{{$program_studi['kode_program_studi']}}">
                                </div>
                              </div>
                            </fieldset>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Nama Program Studi</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_program_studi" value="{{$program_studi['nama_program_studi']}}" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Singkatan</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="singkatan_program_studi" value="{{$program_studi['singkatan_program_studi']}}" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Status</label>
                              <div class="col-sm-10">
                                <select id="status" name="status_program_studi" class="form-control" required>
                                  <option value="">-- Pilih Status --</option>
                                  <option value="Aktif" @if ($program_studi['status_program_studi']=='Aktif' ) selected @endif>Aktif</option>
                                  <option value="Non Aktif" @if ($program_studi['status_program_studi']=='Non Aktif' ) selected @endif>Non Aktif</option>
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