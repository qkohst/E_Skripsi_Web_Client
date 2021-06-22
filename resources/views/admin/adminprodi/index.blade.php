@extends('layouts.masteradmin')
@section('title')
<title>E-Skripsi | Admin Prodi</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Admin Program Studi</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary">Data Master</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Admin Program Studi</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Data Admin Program Studi</h4>
          </div>
          <div class="mt-3 mt-sm-0">
            <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modalCreate">Tambah</button>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="modalCreate">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Admin Program Studi</h5>
                  <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                  </button>
                </div>
                <form action="{{ route('adminprodi.store') }}" method="POST">
                  @csrf
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Fakultas</label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <select class="form-control" name="kode_fakultas" id="sel1" required>
                                <option value="">-- Pilih Fakultas --</option>
                                <option value="#">data</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Program Studi</label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <select class="form-control" name="kode_fakultas" id="sel1" required>
                                <option value="">-- Pilih Prodi --</option>
                                <option value="#">data</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama</label>
                          <div class="col-sm-9">
                            <input type="text" name="nama_admin_prodi" class="form-control" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">NIK</label>
                          <div class="col-sm-9">
                            <input type="number" name="nik_admin_prodi" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">NIDN</label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <input type="number" name="nidn_admin_prodi" class="form-control" required>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">NIP <small><i>(opsional)</i></small></label>
                          <div class="col-sm-9">
                            <input type="number" name="nip_admin_prodi" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <select class="form-control" name="jenis_kelamin_admin_prodi" id="sel1" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="#">Laki-Laki</option>
                                <option value="#">Perempuan</option>
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
                            <input type="text" name="tempat_lahir_admin_prodi" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <input type="date" name="tanggal_lahir_admin_prodi" class="form-control" required>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Surat Tugas</label>
                          <div class="col-sm-9">
                            <input type="text" name="no_surat_tugas_admin_prodi" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <input type="email" name="email_admin_prodi" class="form-control" required>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nomor HP</label>
                          <div class="col-sm-9">
                            <input type="number" name="no_hp_admin_prodi" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Foto <small><i>(opsional)</i></small></label>
                          <div class="col-sm-9">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="foto_admin_prodi" id="customFile" accept="image/*">
                              <label class="custom-file-label" for="customFile">Belum ada file dipilih</label>
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
                  <th>Program Studi</th>
                  <th>Nama Admin</th>
                  <th>L/P</th>
                  <th>NIDN</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0; ?>
                @foreach($data_adminprodi as $admin_prodi)
                <?php $no++; ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{ $admin_prodi['program_studi']['nama_program_studi']}}</td>
                  <td>{{ $admin_prodi['nama_admin_prodi']}}</td>
                  <td>{{ $admin_prodi['jenis_kelamin_admin_prodi']}}</td>
                  <td>{{ $admin_prodi['nidn_admin_prodi']}}</td>
                  <td>
                    <div class="d-flex">
                      <a href="{{ route('adminprodi.show', $admin_prodi['id']) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                      <form action="{{ route('adminprodi.destroy', $admin_prodi['id']) }}" method="POST">
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