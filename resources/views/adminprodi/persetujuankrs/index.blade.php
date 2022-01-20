@extends('layouts.masteradminprodi')
@section('title')
<title>E-Skripsi | Persetujuan KRS</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Persetujuan KRS</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Persetujuan KRS</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Persetujuan KRS</h4>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="min-width: 845px">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NPM</th>
                  <th>Nama</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Status</th>
                  <th>Catatan Persetujuan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0; ?>
                @foreach($data_persetujuan_krs as $persetujuan_krs)
                <?php $no++; ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{ $persetujuan_krs['mahasiswa']['npm_mahasiswa']}}</td>
                  <td>{{ $persetujuan_krs['mahasiswa']['nama_mahasiswa']}}</td>
                  <td>{{ $persetujuan_krs['tanggal_pengajuan_file_krs']}}</td>
                  <td>
                    @if($persetujuan_krs['status_persetujuan_admin_prodi_file_krs'] == 'Antrian')
                    <span class="badge light badge-primary">{{$persetujuan_krs['status_persetujuan_admin_prodi_file_krs']}}</span>
                    @elseif($persetujuan_krs['status_persetujuan_admin_prodi_file_krs'] == 'Ditolak')
                    <span class="badge light badge-danger">{{$persetujuan_krs['status_persetujuan_admin_prodi_file_krs']}}</span>
                    @else
                    <span class="badge light badge-success">{{$persetujuan_krs['status_persetujuan_admin_prodi_file_krs']}}</span>
                    @endif
                  </td>
                  <td>{{ $persetujuan_krs['catatan_file_krs']}}</td>
                  <td>
                    <div class="d-flex">
                      <button type="button" class="btn btn-primary shadow btn-xs sharp mr-1" data-toggle="modal" data-target="#modalView{{$persetujuan_krs['id']}}"><i class="fa fa-eye"></i></button>
                      <button type="button" class="btn btn-info shadow btn-xs sharp mr-1" data-toggle="modal" data-target="#modalCheck{{$persetujuan_krs['id']}}"><i class="fa fa-check"></i></button>
                    </div>
                  </td>
                </tr>
                <!-- Modal View-->
                <div class="modal fade" id="modalView{{$persetujuan_krs['id']}}">
                  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">File KRS {{ $persetujuan_krs['mahasiswa']['npm_mahasiswa']}}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
                        <img src="http://103.179.57.109/api/v1/{{ $persetujuan_krs['file_krs']['url']}}" class="img-fluid" alt="File KRS">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal Check-->
                <div class="modal fade" id="modalCheck{{$persetujuan_krs['id']}}">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Verifikasi KRS</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('persetujuankrs.update', $persetujuan_krs['id']) }}" method="POST">
                        {{ method_field('PATCH') }}
                        @csrf
                        <div class="modal-body">
                          <div class="form-row">
                            <div class="form-group col-2">
                              <span>Nama</span>
                            </div>
                            <div class="form-group col-10">
                              <span>: {{$persetujuan_krs['mahasiswa']['nama_mahasiswa']}}</span>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-2">
                              <span>NPM</span>
                            </div>
                            <div class="form-group col-10">
                              <span>: {{$persetujuan_krs['mahasiswa']['npm_mahasiswa']}}</span>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label>Status</label>
                              <select id="status" name="status_persetujuan_admin_prodi_file_krs" class="form-control" required>
                                <option value="Antrian" @if ($persetujuan_krs['status_persetujuan_admin_prodi_file_krs']=='Antrian' ) selected @endif>Antrian</option>
                                <option value="Disetujui" @if ($persetujuan_krs['status_persetujuan_admin_prodi_file_krs']=='Disetujui' ) selected @endif>Disetujui</option>
                                <option value="Ditolak" @if ($persetujuan_krs['status_persetujuan_admin_prodi_file_krs']=='Ditolak' ) selected @endif>Ditolak</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label>Catatan</label>
                              <textarea class="form-control" name="catatan_file_krs" rows="4">{{$persetujuan_krs['catatan_file_krs']}}</textarea>
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