@extends('layouts.masteradminprodi')
@section('title')
<title>E-Skripsi | Dosen</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Dosen</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Dosen</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Data Dosen</h4>
          </div>
          <div class="mt-3 mt-sm-0">
            <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modalCreate">Tambah</button>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="modalCreate">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Data Dosen</h5>
                  <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                  </button>
                </div>
                <form action="{{ route('dosen.store') }}" method="POST">
                  @csrf
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama <small><i>(tanpa gelar)</i></small></label>
                          <div class="col-sm-9">
                            <input type="text" name="nama_dosen" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">NIK</label>
                          <div class="col-sm-9">
                            <input type="number" name="nik_dosen" class="form-control" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">NIDN</label>
                          <div class="col-sm-9">
                            <input type="number" name="nidn_dosen" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">NIP <small><i>(opsional)</i></small></label>
                          <div class="col-sm-9">
                            <input type="number" name="nip_dosen" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                          <div class="col-sm-9">
                            <input type="text" name="tempat_lahir_dosen" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-9">
                            <input type="date" name="tanggal_lahir_dosen" class="form-control" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <select class="form-control" name="jenis_kelamin_dosen" id="sel1" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Agama</label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <select class="form-control" name="agama_dosen" id="sel1" required>
                                <option value="">-- Pilih Agama --</option>
                                <option value="Islam">Islam</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Khonghucu">Khonghucu</option>
                                <option value="Kepercayaan">Kepercayaan</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <select class="form-control" name="pendidikan_terakhir_dosen" id="sel1" required>
                                <option value="">-- Pilih Pendidikan --</option>
                                <option value="S1">Strata 1 (S1)</option>
                                <option value="S2">Strata 2 (S2)</option>
                                <option value="S3">Strata 3 (S3)</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gelar Pendidikan</label>
                          <div class="col-sm-9">
                            <input type="text" name="gelar_dosen" class="form-control" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jabatan Fungsional <small><i>(opsional)</i></small></label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <select class="form-control" name="jabatan_fungsional_id_jabatan_fungsional" id="sel1">
                                <option value="">-- Pilih Jabatan Fungsional --</option>
                                @foreach($data_jabatan_fungsional as $jabatan_fungsional)
                                <option value="{{$jabatan_fungsional['id']}}">{{$jabatan_fungsional['nama_jabatan_fungsional']}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jabatan Struktural <small><i>(opsional)</i></small></label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <select class="form-control" name="jabatan_struktural_id_jabatan_struktural" id="sel1">
                                <option value="">-- Pilih Jabatan Struktural --</option>
                                @foreach($data_jabatan_struktural as $jabatan_struktural)
                                <option value="{{$jabatan_struktural['id']}}">{{$jabatan_struktural['nama_jabatan_struktural']}}</option>
                                @endforeach
                              </select>
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
                  <th>Nama Dosen</th>
                  <th>NIDN</th>
                  <th>L/P</th>
                  <th>Tanggal Lahir</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0; ?>
                @foreach($data_dosen as $dosen)
                <?php $no++; ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{ $dosen['nama_dosen']}}</td>
                  <td>{{ $dosen['nidn_dosen']}}</td>
                  <td>{{ $dosen['jenis_kelamin_dosen']}}</td>
                  <td>{{ $dosen['tanggal_lahir_dosen']}}</td>
                  <td>
                    @if($dosen['status_dosen'] == 'Aktif')
                    <span class="badge light badge-success">{{$dosen['status_dosen']}}</span>
                    @else
                    <span class="badge light badge-warning">{{$dosen['status_dosen']}}</span>
                    @endif
                  </td>
                  <td>
                    <div class="d-flex">
                      <a href="{{ route('dosen.show', $dosen['id']) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                      <form action="{{ route('dosen.destroy', $dosen['id']) }}" method="POST">
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