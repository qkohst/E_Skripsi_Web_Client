@extends('layouts.masteradminprodi')

@section('title')
<title>E-Skripsi | Detail Mahasiswa</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Mahasiswa</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('mahasiswa.index') }}" class="text-primary">Mahasiswa</a></li>
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
              @if(is_null($data_mahasiswa['foto_mahasiswa']['nama_file']))
              <img src="/images/profile/profile-user.png" width="150" class="rounded-circle img-thumbnail  shadow mb-4" alt="" />
              @else
              <img src="http://127.0.0.1:8000/api/v1/{{$data_mahasiswa['foto_mahasiswa']['url']}}" width="150" class="rounded-circle img-thumbnail  shadow mb-4" alt="" />
              @endif

              <h4 class="mb-1 text-black font-w600">{{$data_mahasiswa['nama_mahasiswa']}}</h4>
              <span>({{$data_mahasiswa['program_studi']['nama_program_studi']}})</span>

              <table class="table mt-4">
                <tbody>
                  <tr class="text-left">
                    <td>NPM</td>
                    <td>: {{$data_mahasiswa['npm_mahasiswa']}}</td>
                  </tr>
                  <tr class="text-left">
                    <td>Semester</td>
                    <td>: {{$data_mahasiswa['semester_mahasiswa']}}</td>
                  </tr>
                  <tr class="text-left">
                    <td>Jenis Kelamin</td>
                    @if($data_mahasiswa['jenis_kelamin_mahasiswa'] == 'L')
                    <td>: Laki-Laki</td>
                    @else
                    <td>: Perempuan</td>
                    @endif
                  </tr>
                  <tr class="text-left">
                    <td>Tempat Lahir</td>
                    <td>: {{$data_mahasiswa['tempat_lahir_mahasiswa']}}</td>
                  </tr>
                  <tr class="text-left">
                    <td>Tanggal Lahir</td>
                    <td>: {{$data_mahasiswa['tanggal_lahir_mahasiswa']}}</td>
                  </tr>
                </tbody>
              </table>
              <div>
                @if($data_mahasiswa['status_mahasiswa'] == 'Drop Out')
                <span class="badge badge-xl light badge-danger">{{$data_mahasiswa['status_mahasiswa']}}</span>
                @elseif ($data_mahasiswa['status_mahasiswa'] == 'Non Aktif')
                <span class="badge badge-xl light badge-warning">{{$data_mahasiswa['status_mahasiswa']}}</span>
                @elseif ($data_mahasiswa['status_mahasiswa'] == 'Aktif')
                <span class="badge badge-xl light badge-primary">{{$data_mahasiswa['status_mahasiswa']}}</span>
                @elseif ($data_mahasiswa['status_mahasiswa'] == 'Lulus')
                <span class="badge badge-xl light badge-success">{{$data_mahasiswa['status_mahasiswa']}}</span>
                @endif
              </div>
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
                            <td>: {{$data_mahasiswa['nama_mahasiswa']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Status Perkawinan</td>
                            <td>: {{$data_mahasiswa['status_perkawinan_mahasiswa']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Agama</td>
                            <td>: {{$data_mahasiswa['agama_mahasiswa']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Nama Ibu</td>
                            <td>: {{$data_mahasiswa['nama_ibu_mahasiswa']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Alamat</td>
                            <td>: {{$data_mahasiswa['alamat_mahasiswa']}} Ds. {{$data_mahasiswa['desa_mahasiswa']['nama']}} Kec. {{$data_mahasiswa['kecamatan_mahasiswa']['nama']}} {{$data_mahasiswa['kabupaten_mahasiswa']['nama']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Email</td>
                            <td>: {{$data_mahasiswa['email_mahasiswa']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Nomor HP</td>
                            <td>: {{$data_mahasiswa['no_hp_mahasiswa']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Pembaruan</td>
                            <td>: {{$data_mahasiswa['tanggal_pembaruan_mahasiswa']}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="editprofile" role="tabpanel">
                    <form action="{{ route('mahasiswa.update', $data_mahasiswa['id']) }}" enctype="multipart/form-data" method="POST">
                      {{ method_field('PATCH') }}
                      @csrf
                      <div class="basic-form pt-4">
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama_mahasiswa" value="{{$data_mahasiswa['nama_mahasiswa']}}" required>
                          </div>
                          <div class="form-group col-md-12">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir_mahasiswa" value="{{$data_mahasiswa['tempat_lahir_mahasiswa']}}">
                          </div>
                          <div class="form-group col-md-12">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir_mahasiswa" value="{{$data_mahasiswa['tanggal_lahir_mahasiswa']}}">
                          </div>
                          <div class="form-group col-md-12">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <select id="status" name="status_mahasiswa" class="form-control" required>
                              <option value="Aktif" @if ($data_mahasiswa['status_mahasiswa']=='Aktif' ) selected @endif>Aktif</option>
                              <option value="Non Aktif" @if ($data_mahasiswa['status_mahasiswa']=='Non Aktif' ) selected @endif>Non Aktif</option>
                              <option value="Drop Out" @if ($data_mahasiswa['status_mahasiswa']=='Drop Out' ) selected @endif>Drop Out</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="gantipassword" role="tabpanel">
                    <div class="basic-form pt-4">
                      <form action="/mahasiswa/{{$data_mahasiswa['id']}}/riset_password" method="POST">
                        @csrf
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label>NPM</label>
                            <input type="number" class="form-control" name="npm_mahasiswa" placeholder="Masukkan NPM Mahasiswa" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" required>
                            <label class="form-check-label">
                              Saya yakin akan meriset password mahasiswa
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