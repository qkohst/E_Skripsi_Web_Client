@extends('layouts.masteradminprodi')

@section('title')
<title>E-Skripsi | Detail Dosen</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Dosen</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dosen.index') }}" class="text-primary">Dosen</a></li>
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
              @if(is_null($data_dosen['foto_dosen']['nama_file']))
              <img src="/images/profile/profile-user.png" width="150" class="rounded-circle img-thumbnail  shadow mb-4" alt="" />
              @else
              <img src="http://127.0.0.1:8000/api/v1/{{$data_dosen['foto_dosen']['url']}}" width="150" class="rounded-circle img-thumbnail  shadow mb-4" alt="" />
              @endif

              <h4 class="mb-1 text-black font-w600">{{$data_dosen['nama_dosen']}}, {{$data_dosen['gelar_dosen']}}</h4>
              <span>({{$data_dosen['program_studi']['nama_program_studi']}})</span>

              <table class="table mt-4">
                <tbody>
                  <tr class="text-left">
                    <td>NIDN</td>
                    <td>: {{$data_dosen['nidn_dosen']}}</td>
                  </tr>
                  <tr class="text-left">
                    <td>NIP</td>
                    <td>: {{$data_dosen['nip_dosen']}}</td>
                  </tr>
                  <tr class="text-left">
                    <td>Jenis Kelamin</td>
                    @if($data_dosen['jenis_kelamin_dosen'] == 'L')
                    <td>: Laki-Laki</td>
                    @else
                    <td>: Perempuan</td>
                    @endif
                  </tr>
                  <tr class="text-left">
                    <td>Tempat Lahir</td>
                    <td>: {{$data_dosen['tempat_lahir_dosen']}}</td>
                  </tr>
                  <tr class="text-left">
                    <td>Tanggal Lahir</td>
                    <td>: {{$data_dosen['tanggal_lahir_dosen']}}</td>
                  </tr>
                </tbody>
              </table>
              <div>
                @if($data_dosen['status_dosen'] == 'Aktif')
                <span class="badge badge-xl light badge-primary">{{$data_dosen['status_dosen']}}</span>
                @else
                <span class="badge badge-xl light badge-warning">{{$data_dosen['status_dosen']}}</span>
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
                            <td>: {{$data_dosen['nama_dosen']}}, {{$data_dosen['gelar_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Pendidikan Terakhir</td>
                            <td>: {{$data_dosen['pendidikan_terakhir_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>NIK</td>
                            <td>: {{$data_dosen['nik_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Status Perkawinan</td>
                            <td>: {{$data_dosen['status_perkawinan_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Agama</td>
                            <td>: {{$data_dosen['agama_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Nama Ibu</td>
                            <td>: {{$data_dosen['nama_ibu_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Alamat</td>
                            <td>: {{$data_dosen['alamat_dosen']}} Ds. {{$data_dosen['desa_dosen']}} Kec. {{$data_dosen['kecamatan_dosen']}} Kab. {{$data_dosen['kabupaten_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Email</td>
                            <td>: {{$data_dosen['email_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Nomor HP</td>
                            <td>: {{$data_dosen['no_hp_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Jabatan Fungsional</td>
                            <td>: {{$data_dosen['jabatan_fungsional']['nama_jabatan_fungsional']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Jabatan Struktural</td>
                            <td>: {{$data_dosen['jabatan_struktural']['nama_jabatan_struktural']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Pembaruan</td>
                            <td>: {{$data_dosen['tanggal_pembaruan_dosen']}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="editprofile" role="tabpanel">
                    <form action="{{ route('dosen.update', $data_dosen['id']) }}" method="POST">
                      {{ method_field('PATCH') }}
                      @csrf
                      <div class="basic-form pt-4">
                        <div class="form-row">
                          <div class="form-group col-md-12 col-lg-6">
                            <label>Nama <small><i>(tanpa gelar)</i></small></label>
                            <input type="text" class="form-control" name="nama_dosen" value="{{$data_dosen['nama_dosen']}}" required>
                          </div>
                          <div class="form-group col-md-12 col-lg-6">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir_dosen" value="{{$data_dosen['tempat_lahir_dosen']}}">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12 col-lg-6">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir_dosen" value="{{$data_dosen['tanggal_lahir_dosen']}}">
                          </div>
                          <div class="form-group col-md-12 col-lg-6">
                            <label>NIP <small><i>(opsional)</i></small></label>
                            <input type="number" class="form-control" name="nip_dosen" value="{{$data_dosen['nip_dosen']}}">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12 col-lg-6">
                            <label>NIK</label>
                            <input type="number" class="form-control" name="nik_dosen" value="{{$data_dosen['nik_dosen']}}">
                          </div>
                          <div class="form-group col-md-12 col-lg-6">
                            <label>Jabatan Fungsional <small><i>(opsional)</i></small></label>
                            <select id="status" name="jabatan_fungsional_id_jabatan_fungsional" class="form-control">
                              <option value="" @if (is_null($data_dosen['jabatan_fungsional']['id'])) selected @endif>-- Pilih Jabatan Fungsional--</option>
                              <option value="{{$data_dosen['jabatan_fungsional']['id']}}" @if (!is_null($data_dosen['jabatan_fungsional']['id'])) selected @endif>{{$data_dosen['jabatan_fungsional']['nama_jabatan_fungsional']}}</option>
                              @foreach($data_jabatan_fungsional as $jabatan_fungsional)
                              <option value="{{$jabatan_fungsional['id']}}">{{$jabatan_fungsional['nama_jabatan_fungsional']}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12 col-lg-6">
                            <label>Jabatan Struktural <small><i>(opsional)</i></small></label>
                            <select id="status" name="jabatan_struktural_id_jabatan_struktural" class="form-control">
                              <option value="" @if (is_null($data_dosen['jabatan_struktural']['id'])) selected @endif>-- Pilih Jabatan Struktural --</option>
                              <option value="{{$data_dosen['jabatan_struktural']['id']}}" @if (!is_null($data_dosen['jabatan_struktural']['id'])) selected @endif>{{$data_dosen['jabatan_struktural']['nama_jabatan_struktural']}}</option>
                              @foreach($data_jabatan_struktural as $jabatan_struktural)
                              <option value="{{$jabatan_struktural['id']}}">{{$jabatan_struktural['nama_jabatan_struktural']}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group col-md-12 col-lg-6">
                            <label>Gelar Pendidikan</label>
                            <input type="text" class="form-control" name="gelar_dosen" value="{{$data_dosen['gelar_dosen']}}">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12 col-lg-6">
                            <label>Pendidikan Terakhir</label>
                            <select id="status" name="pendidikan_terakhir_dosen" class="form-control">
                              <option value="">-- Pilih Pendidikan --</option>
                              <option value="S1" @if ($data_dosen['pendidikan_terakhir_dosen']=='S1' ) selected @endif>Strata 1 (S1)</option>
                              <option value="S2" @if ($data_dosen['pendidikan_terakhir_dosen']=='S2' ) selected @endif>Strata 2 (S2)</option>
                              <option value="S3" @if ($data_dosen['pendidikan_terakhir_dosen']=='S3' ) selected @endif>Strata 3 (S3)</option>
                            </select>
                          </div>
                          <div class="form-group col-md-12 col-lg-6">
                            <label>Status</label>
                            <select id="status" name="status_dosen" class="form-control" required>
                              <option value="">-- Pilih Status --</option>
                              <option value="Aktif" @if ($data_dosen['status_dosen']=='Aktif' ) selected @endif>Aktif</option>
                              <option value="Non Aktif" @if ($data_dosen['status_dosen']=='Non Aktif' ) selected @endif>Non Aktif</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="gantipassword" role="tabpanel">
                    <div class="basic-form pt-4">
                      <form action="/dosen/{{$data_dosen['id']}}/riset_password" method="POST">
                        @csrf
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label>NIDN</label>
                            <input type="number" class="form-control" name="nidn_dosen" placeholder="Masukkan NIDN Dosen" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" required>
                            <label class="form-check-label">
                              Saya yakin akan meriset password dosen
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