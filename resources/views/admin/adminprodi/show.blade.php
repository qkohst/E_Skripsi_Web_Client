@extends('layouts.masteradmin')

@section('title')
<title>E-Skripsi | Detail Admin Prodi</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Admin Program Studi</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary">Data Master</a></li>
        <li class="breadcrumb-item"><a href="/adminprodi" class="text-primary">Admin Program Studi</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
      <div class="row">
        <div class="col-xl-12 col-lg-6 ">
          <div class="card h-auto">
            <div class="card-body text-center">
              @if(is_null($data_adminprodi['foto_admin_prodi']['nama_file']))
              <img src="/images/profile/profile-user.png" width="150" class="rounded-circle img-thumbnail  shadow mb-4" alt="" />
              @else
              <img src="http://127.0.0.1:8000/api/v1/{{$data_adminprodi['foto_admin_prodi']['url']}}" width="150" class="rounded-circle img-thumbnail  shadow mb-4" alt="" />
              @endif

              <h4 class="mb-1 text-black font-w600">{{$data_adminprodi['nama_admin_prodi']}}</h4>
              <span>({{$data_adminprodi['program_studi']['nama_program_studi']}})</span>

              <table class="table mt-4">
                <tbody>
                  <tr class="text-left">
                    <td>NIDN</td>
                    <td>: {{$data_adminprodi['nidn_admin_prodi']}}</td>
                  </tr>
                  <tr class="text-left">
                    <td>NIP</td>
                    <td>: {{$data_adminprodi['nip_admin_prodi']}}</td>
                  </tr>
                  <tr class="text-left">
                    <td>Jenis Kelamin</td>
                    @if($data_adminprodi['jenis_kelamin_admin_prodi'] == 'L')
                    <td>: Laki-Laki</td>
                    @else
                    <td>: Perempuan</td>
                    @endif
                  </tr>
                  <tr class="text-left">
                    <td>Tempat Lahir</td>
                    <td>: {{$data_adminprodi['tempat_lahir_admin_prodi']}}</td>
                  </tr>
                  <tr class="text-left">
                    <td>Tanggal Lahir</td>
                    <td>: {{$data_adminprodi['tanggal_lahir_admin_prodi']}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8 col-xxl-8 col-lg-12 col-md-12">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body pt-2">
              <div class="custom-tab-1">
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#profile"><i class="la la-user mr-2"></i> Data Pribadi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#editprofile"><i class="la la-user-edit mr-2"></i> Edit Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#gantipassword"><i class="las la-key mr-2"></i> Riset Password</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="profile" role="tabpanel">
                    <div class="pt-4">
                      <table class="table table-borderless">
                        <tbody>
                          <tr class="text-left">
                            <td>Nama</td>
                            <td>: {{$data_adminprodi['nama_admin_prodi']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Program Studi</td>
                            <td>: {{$data_adminprodi['program_studi']['nama_program_studi']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Nomor Surat Tugas</td>
                            <td>: {{$data_adminprodi['no_surat_tugas_admin_prodi']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Email</td>
                            <td>: {{$data_adminprodi['email_admin_prodi']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Nomor HP</td>
                            <td>: {{$data_adminprodi['no_hp_admin_prodi']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Pembaruan</td>
                            <td>: {{$data_adminprodi['tanggal_pembaruan_admin_prodi']}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="editprofile">
                    <div class="basic-form pt-4">
                      <form action="{{ route('adminprodi.update', $data_adminprodi['id']) }}" enctype="multipart/form-data" method="POST">
                        {{ method_field('PATCH') }}
                        @csrf
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama_admin_prodi" value="{{$data_adminprodi['nama_admin_prodi']}}" required>
                          </div>
                          <div class="form-group col-md-12">
                            <label>NIP <small><i>(opsional)</i></small></label>
                            <input type="number" class="form-control" name="nip_admin_prodi" value="{{$data_adminprodi['nip_admin_prodi']}}">
                          </div>
                          <div class="form-group col-md-12">
                            <label>NIK</label>
                            <input type="number" class="form-control" name="nik_admin_prodi" value="{{$data_adminprodi['nik_admin_prodi']}}" required>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                      </form>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="gantipassword">
                    <div class="pt-4">
                      <div class="basic-form">
                        <form action="/adminprodi/{{$data_adminprodi['id']}}/riset_password" method="POST">
                          @csrf
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label>NIDN</label>
                              <input type="number" class="form-control" name="nidn_admin_prodi" placeholder="Masukkan NIDN Admin Prodi" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" required>
                              <label class="form-check-label">
                                Saya yakin akan meriset password admin prodi
                              </label>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary btn-block">RISET PASSWORD</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection