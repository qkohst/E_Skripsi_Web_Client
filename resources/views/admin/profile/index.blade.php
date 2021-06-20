@extends('layouts.masteradmin')

@section('title')
<title>E-Skripsi | Profile</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Profile</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
      <div class="row">
        <div class="col-xl-12 col-lg-6 ">
          <div class="card h-auto">
            <div class="card-body text-center">
              <img src="http://127.0.0.1:8000/api/v1/{{Session::get('avatar_user')}}" width="150" class="rounded-circle img-thumbnail  shadow mb-4" alt="" />
              <h4 class="mb-3 text-black font-w600">{{$profile['nama_admin']}}</h4>

              <table class="table">
                <tbody>
                  <tr class="text-left">
                    <td>NIDN</td>
                    <td>: {{$profile['nidn_admin']}}</td>
                  </tr>
                  <tr class="text-left">
                    <td>NIP</td>
                    <td>: {{$profile['nip_admin']}}</td>
                  </tr>
                  <tr class="text-left">
                    <td>Jenis Kelamin</td>
                    @if($profile['jenis_kelamin_admin'] == 'L')
                    <td>: Laki-Laki</td>
                    @else
                    <td>: Perempuan</td>
                    @endif
                  </tr>
                  <tr class="text-left">
                    <td>Tempat Lahir</td>
                    <td>: {{$profile['tempat_lahir_admin']}}</td>
                  </tr>
                  <tr class="text-left">
                    <td>Tanggal Lahir</td>
                    <td>: {{$profile['tanggal_lahir_admin']}}</td>
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
                    <a class="nav-link" data-toggle="tab" href="#gantipassword"><i class="las la-key mr-2"></i> Ganti Password</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="profile" role="tabpanel">
                    <div class="pt-4">
                      <table class="table table-borderless">
                        <tbody>
                          <tr class="text-left">
                            <td>Nama</td>
                            <td>: {{$profile['nama_admin']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>NIK</td>
                            <td>: {{$profile['nik_admin']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Email</td>
                            <td>: {{$profile['email_admin']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Nomor HP</td>
                            <td>: {{$profile['no_hp_admin']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Pembaruan</td>
                            <td>: {{$profile['tanggal_pembaruan_admin']}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="editprofile">
                    <div class="basic-form pt-4">
                      <form action="{{ route('profile.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama_admin" value="{{$profile['nama_admin']}}" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label>NIDN</label>
                            <input type="number" class="form-control" name="nidn_admin" value="{{$profile['nidn_admin']}}" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label>NIP <small><i>(opsional)</i></small></label>
                            <input type="number" class="form-control" name="nip_admin" value="{{$profile['nip_admin']}}">
                          </div>
                          <div class="form-group col-md-6">
                            <label>NIK</label>
                            <input type="number" class="form-control" name="nik_admin" value="{{$profile['nik_admin']}}" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir_admin" value="{{$profile['tempat_lahir_admin']}}" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir_admin" value="{{$profile['tanggal_lahir_admin']}}" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin_admin" class="form-control" required>
                              <option value="">-- Pilih Data --</option>
                              <option value="L" @if ($profile['jenis_kelamin_admin']=='L' ) selected @endif>Laki-Laki</option>
                              <option value="P" @if ($profile['jenis_kelamin_admin']=='P' ) selected @endif>Perempuan</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email_admin" value="{{$profile['email_admin']}}" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label>No HP</label>
                            <input type="number" class="form-control" name="no_hp_admin" value="{{$profile['no_hp_admin']}}" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Foto</label>
                            <div class="input-group">
                              <input type="file" name="foto_admin" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" accept="image/*" aria-label="Upload">
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                      </form>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="gantipassword">
                    <div class="pt-4">
                      <div class="basic-form">
                        <form action="{{ route('ganti_password') }}" method="POST">
                          @csrf
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label>NIDN</label>
                              <input type="number" class="form-control" name="username" required>
                            </div>
                            <div class="form-group col-md-12">
                              <label>Password Lama</label>
                              <input type="password" class="form-control" name="password_lama" required>
                            </div>
                            <div class="form-group col-md-12">
                              <label>Password Baru</label>
                              <input type="password" class="form-control" name="password_baru" required>
                            </div>
                            <div class="form-group col-md-12">
                              <label>Ulangi Password</label>
                              <input type="password" class="form-control" name="confirm_password">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" required>
                              <label class="form-check-label">
                                Saya yakin akan ganti password
                              </label>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary">Ganti Password</button>
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