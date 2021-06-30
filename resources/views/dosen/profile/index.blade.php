@extends('layouts.masterdosen')

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
              @if(is_null($profile['foto_dosen']['nama_file']))
              <img src="/images/profile/profile-user.png" width="150" class="rounded-circle img-thumbnail  shadow mb-4" alt="" />
              @else
              <img src="http://127.0.0.1:8000/api/v1/{{$profile['foto_dosen']['url']}}" width="150" class="rounded-circle img-thumbnail  shadow mb-4" alt="" />
              @endif <h4 class="text-black font-w600">{{$profile['nama_dosen']}}</h4>
              <span>({{$profile['program_studi']['nama_program_studi']}})</span>

              <table class="table mt-3">
                <tbody>
                  <tr class="text-left">
                    <td>NIDN</td>
                    <td>: {{$profile['nidn_dosen']}}</td>
                  </tr>
                  <tr class="text-left">
                    <td>NIP</td>
                    <td>: {{$profile['nip_dosen']}}</td>
                  </tr>
                  <tr class="text-left">
                    <td>Jenis Kelamin</td>
                    @if($profile['jenis_kelamin_dosen'] == 'L')
                    <td>: Laki-Laki</td>
                    @else
                    <td>: Perempuan</td>
                    @endif
                  </tr>
                  <tr class="text-left">
                    <td>Tempat Lahir</td>
                    <td>: {{$profile['tempat_lahir_dosen']}}</td>
                  </tr>
                  <tr class="text-left">
                    <td>Tanggal Lahir</td>
                    <td>: {{$profile['tanggal_lahir_dosen']}}</td>
                  </tr>
                </tbody>
              </table>
              <div>
                @if($profile['status_dosen'] == 'Aktif')
                <span class="badge badge-xl light badge-primary">{{$profile['status_dosen']}}</span>
                @else
                <span class="badge badge-xl light badge-warning">{{$profile['status_dosen']}}</span>
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
                            <td>: {{$profile['nama_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Pendidikan Terakhir</td>
                            <td>: {{$profile['pendidikan_terakhir_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>NIK</td>
                            <td>: {{$profile['nik_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Status Perkawinan</td>
                            <td>: {{$profile['status_perkawinan_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Agama</td>
                            <td>: {{$profile['agama_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Nama Ibu</td>
                            <td>: {{$profile['nama_ibu_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Alamat</td>
                            <td>: {{$profile['alamat_dosen']}} Ds. {{$profile['desa_dosen']['nama']}} Kec. {{$profile['kecamatan_dosen']['nama']}} {{$profile['kabupaten_dosen']['nama']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Email</td>
                            <td>: {{$profile['email_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Nomor HP</td>
                            <td>: {{$profile['no_hp_dosen']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Jabatan Fungsional</td>
                            <td>: {{$profile['jabatan_fungsional']['nama_jabatan_fungsional']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Jabatan Struktural</td>
                            <td>: {{$profile['jabatan_struktural']['nama_jabatan_struktural']}}</td>
                          </tr>
                          <tr class="text-left">
                            <td>Pembaruan</td>
                            <td>: {{$profile['tanggal_pembaruan_dosen']}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="editprofile">
                    <div class="basic-form pt-4">
                      <form action="{{ route('profiledosen.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <fieldset disabled>
                              <label>Nama</label>
                              <input type="text" class="form-control" name="nama_dosen" value="{{$profile['nama_dosen']}}" required>
                            </fieldset>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Status Perkawinan</label>
                            <select id="jenis_kelamin" name="status_perkawinan_dosen" class="form-control" required>
                              <option value="">-- Pilih Status Perkawinan --</option>
                              <option value="Belum Kawin" @if ($profile['status_perkawinan_dosen']=='Belum Kawin' ) selected @endif>Belum Kawin</option>
                              <option value="Kawin" @if ($profile['status_perkawinan_dosen']=='Kawin' ) selected @endif>Kawin</option>
                              <option value="Cerai Hidup" @if ($profile['status_perkawinan_dosen']=='Cerai Hidup' ) selected @endif>Cerai Hidup</option>
                              <option value="Cerai Mati" @if ($profile['status_perkawinan_dosen']=='Cerai Mati' ) selected @endif>Cerai Mati</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin_dosen" class="form-control" required>
                              <option value="">-- Pilih Data --</option>
                              <option value="L" @if ($profile['jenis_kelamin_dosen']=='L' ) selected @endif>Laki-Laki</option>
                              <option value="P" @if ($profile['jenis_kelamin_dosen']=='P' ) selected @endif>Perempuan</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu_dosen" value="{{$profile['nama_ibu_dosen']}}" required>
                          </div>
                          <div class="form-group col-md-12">
                            <label>Alamat <small><i>(opsional)</i></small></label>
                            <input type="text" class="form-control" name="alamat_dosen" value="{{$profile['alamat_dosen']}}">
                          </div>
                          <div class="form-group col-md-6">
                            <label>Provinsi</label>
                            <select name="provinsi_dosen" class="form-control" required>
                              <option value="" @if (is_null($profile['provinsi_dosen']['id'])) selected @endif>-- Pilih Provinsi --</option>
                              <option value="{{$profile['provinsi_dosen']['id']}}" @if (!is_null($profile['provinsi_dosen']['id'])) selected @endif>{{$profile['provinsi_dosen']['nama']}}</option>
                              @foreach($data_provinsi as $provinsi)
                              <option value="{{$provinsi['id']}}">{{$provinsi['nama']}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Kabupaten / Kota</label>
                            <select name="kabupaten_dosen" class="form-control" required>
                              <option value="" @if (is_null($profile['kabupaten_dosen']['id'])) selected @endif>-- Pilih Kabupaten / Kota --</option>
                              <option value="{{$profile['kabupaten_dosen']['id']}}" @if (!is_null($profile['kabupaten_dosen']['id'])) selected @endif>{{$profile['kabupaten_dosen']['nama']}}</option>
                              @foreach($data_kabupaten as $kabupaten)
                              <option value="{{$kabupaten['id']}}">{{$kabupaten['nama']}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Kecamatan</label>
                            <select name="kecamatan_dosen" class="form-control" required>
                              <option value="" @if (is_null($profile['kecamatan_dosen']['id'])) selected @endif>-- Pilih Kecamatan --</option>
                              <option value="{{$profile['kecamatan_dosen']['id']}}" @if (!is_null($profile['kecamatan_dosen']['id'])) selected @endif>{{$profile['kecamatan_dosen']['nama']}}</option>
                              @foreach($data_kecamatan as $kecamatan)
                              <option value="{{$kecamatan['id']}}">{{$kecamatan['nama']}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Desa / Kelurahan</label>
                            <select name="desa_dosen" class="form-control" required>
                              <option value="" @if (is_null($profile['desa_dosen']['id'])) selected @endif>-- Pilih Desa / Kelurahan --</option>
                              <option value="{{$profile['desa_dosen']['id']}}" @if (!is_null($profile['desa_dosen']['id'])) selected @endif>{{$profile['desa_dosen']['nama']}}</option>
                              @foreach($data_desa as $desa)
                              <option value="{{$desa['id']}}">{{$desa['nama']}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label>No HP</label>
                            <input type="number" class="form-control" name="no_hp_dosen" value="{{$profile['no_hp_dosen']}}" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email_dosen" value="{{$profile['email_dosen']}}" required>
                          </div>
                          <div class="form-group col-md-12">
                            <label>Foto</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="foto_dosen" id="customFile" accept="image/*">
                              <label class="custom-file-label" for="customFile">{{$profile['foto_dosen']['nama_file']}}</label>
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
                              <label>NPM</label>
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
                          <button type="submit" class="btn btn-sm btn-primary btn-block">GANTI PASSWORD</button>
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


@section('ajax')
<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="provinsi_dosen"]').on('change', function() {
      var provinsi_id = $(this).val();
      if (provinsi_id) {
        $.ajax({
          url: 'getKabupaten/ajax/' + provinsi_id,
          type: "GET",
          dataType: "json",
          success: function(data) {
            $('select[name="kabupaten_dosen"]').empty();
            $.each(data, function(i, data) {
              $('select[name="kabupaten_dosen"]').append(
                '<option value="' +
                data.id + '">' + data.nama + '</option>');
            });
          }
        });
      } else {
        $('select[name="kabupaten_dosen"').empty();
      }
    });

    $('select[name="kabupaten_dosen"]').on('change', function() {
      var kabupaten_id = $(this).val();
      if (kabupaten_id) {
        $.ajax({
          url: 'getKecamatan/ajax/' + kabupaten_id,
          type: "GET",
          dataType: "json",
          success: function(data) {
            $('select[name="kecamatan_dosen"]').empty();
            $.each(data, function(i, data) {
              $('select[name="kecamatan_dosen"]').append(
                '<option value="' +
                data.id + '">' + data.nama + '</option>');
            });
          }
        });
      } else {
        $('select[name="kecamatan_dosen"').empty();
      }
    });

    $('select[name="kecamatan_dosen"]').on('change', function() {
      var kecamatan_id = $(this).val();
      if (kecamatan_id) {
        $.ajax({
          url: 'getDesa/ajax/' + kecamatan_id,
          type: "GET",
          dataType: "json",
          success: function(data) {
            $('select[name="desa_dosen"]').empty();
            $.each(data, function(i, data) {
              $('select[name="desa_dosen"]').append(
                '<option value="' +
                data.id + '">' + data.nama + '</option>');
            });
          }
        });
      } else {
        $('select[name="desa_dosen"').empty();
      }
    });
  });
</script>

@endsection