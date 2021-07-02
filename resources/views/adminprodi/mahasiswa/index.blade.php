@extends('layouts.masteradminprodi')
@section('title')
<title>E-Skripsi | Mahasiswa</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Mahasiswa</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Mahasiswa</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Data Mahasiswa</h4>
          </div>
          <div class="mt-3 mt-sm-0">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalCreate">Tambah</button>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="modalCreate">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Data Mahasiswa</h5>
                  <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                  </button>
                </div>
                <form action="{{ route('mahasiswa.store') }}" method="POST">
                  @csrf
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama</label>
                          <div class="col-sm-9">
                            <input type="text" name="nama_mahasiswa" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">NPM</label>
                          <div class="col-sm-9">
                            <input type="number" name="npm_mahasiswa" class="form-control" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Semester</label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <select class="form-control" name="semester_mahasiswa" id="sel1" required>
                                <option value="">-- Pilih Semester --</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <select class="form-control" name="jenis_kelamin_mahasiswa" id="sel1" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                          <div class="col-sm-9">
                            <input type="text" name="tempat_lahir_mahasiswa" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <input type="date" name="tanggal_lahir_mahasiswa" class="form-control" required>
                            </div>
                          </div>
                        </div>
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
                  <th>Nama Mahasiswa</th>
                  <th>NPM</th>
                  <th>L/P</th>
                  <th>Tanggal Lahir</th>
                  <th>Semester</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0; ?>
                @foreach($data_mahasiswa as $mahasiswa)
                <?php $no++; ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{ $mahasiswa['nama_mahasiswa']}}</td>
                  <td>{{ $mahasiswa['npm_mahasiswa']}}</td>
                  <td>{{ $mahasiswa['jenis_kelamin_mahasiswa']}}</td>
                  <td>{{ $mahasiswa['tanggal_lahir_mahasiswa']}}</td>
                  <td>{{ $mahasiswa['semester_mahasiswa']}}</td>
                  <td>
                    @if($mahasiswa['status_mahasiswa'] == 'Drop Out')
                    <span class="badge light badge-danger">{{$mahasiswa['status_mahasiswa']}}</span>
                    @elseif ($mahasiswa['status_mahasiswa'] == 'Non Aktif')
                    <span class="badge light badge-warning">{{$mahasiswa['status_mahasiswa']}}</span>
                    @elseif ($mahasiswa['status_mahasiswa'] == 'Aktif')
                    <span class="badge light badge-primary">{{$mahasiswa['status_mahasiswa']}}</span>
                    @elseif ($mahasiswa['status_mahasiswa'] == 'Lulus')
                    <span class="badge light badge-success">{{$mahasiswa['status_mahasiswa']}}</span>
                    @endif
                  </td>
                  <td>
                    <div class="d-flex">
                      <a href="{{ route('mahasiswa.show', $mahasiswa['id']) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                      <form action="{{ route('mahasiswa.destroy', $mahasiswa['id']) }}" method="POST">
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