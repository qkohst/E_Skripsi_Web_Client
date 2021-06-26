@extends('layouts.masterdosen')
@section('title')
<title>E-Skripsi | Persetujuan Dosen Penguji</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Persetujuan Dosen Penguji</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Persetujuan Dosen Penguji</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Persetujuan Dosen Penguji</h4>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="min-width: 845px">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Mahasiswa</th>
                  <th>Judul Skripsi</th>
                  <th>Sebagai</th>
                  <th>Tgl Pengajuan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0; ?>
                @foreach($persetujuanpenguji as $penguji)
                <?php $no++; ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{ $penguji['mahasiswa']['nama_mahasiswa']}}</td>
                  <td>{{ $penguji['judul_skripsi']['nama_judul_skripsi']}}</td>
                  <td>{{ $penguji['jabatan_dosen_penguji']}}</td>
                  <td>{{ $penguji['tanggal_pengajuan_dosen_penguji']}}</td>
                  <td>
                    @if($penguji['status_persetujuan_dosen_penguji'] == 'Antrian')
                    <span class="badge light badge-primary">{{$penguji['status_persetujuan_dosen_penguji']}}</span>
                    @elseif ($penguji['status_persetujuan_dosen_penguji'] == 'Disetujui')
                    <span class="badge light badge-success">{{$penguji['status_persetujuan_dosen_penguji']}}</span>
                    @elseif ($penguji['status_persetujuan_dosen_penguji'] == 'Ditolak')
                    <span class="badge light badge-danger">{{$penguji['status_persetujuan_dosen_penguji']}}</span>
                    @endif
                  </td>
                  <td>
                    @if($penguji['status_persetujuan_dosen_penguji'] != 'Disetujui')
                    <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalVerifikasi{{$penguji['id']}}">Verifikasi</button>
                    @endif
                  </td>
                </tr>
                <!-- Modal Verifikasi-->
                <div class="modal fade" id="modalVerifikasi{{$penguji['id']}}">
                  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Verifikasi Persetujuan Dosen Penguji</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('persetujuanpenguji.update', $penguji['id']) }}" method="POST">
                        {{ method_field('PATCH') }}
                        @csrf
                        <div class="modal-body">
                          <div class="form-row">
                            <div class="form-group col-2">
                              <span>NPM</span>
                            </div>
                            <div class="form-group col-10">
                              <span>: {{$penguji['mahasiswa']['npm_mahasiswa']}}</span>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-2">
                              <span>Nama</span>
                            </div>
                            <div class="form-group col-10">
                              <span>: {{$penguji['mahasiswa']['nama_mahasiswa']}}</span>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-2">
                              <span>Judul Skripsi</span>
                            </div>
                            <div class="form-group col-10">
                              <span>: {{$penguji['judul_skripsi']['nama_judul_skripsi']}}</span>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-2">
                              <span>Sebagai</span>
                            </div>
                            <div class="form-group col-10">
                              <span>: Dosen {{$penguji['jabatan_dosen_penguji']}}</span>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-2">
                              <span>Waktu Seminar</span>
                            </div>
                            <div class="form-group col-10">
                              <span>: {{$penguji['seminar_proposal']['waktu_seminar_proposal']}}</span>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-2">
                              <span>Tempat</span>
                            </div>
                            <div class="form-group col-10">
                              <span>: {{$penguji['seminar_proposal']['tempat_seminar_proposal']}}</span>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label>Status</label>
                              <select id="status" name="status_persetujuan_dosen_penguji" class="form-control" required>
                                <option value="Antrian" @if ($penguji['status_persetujuan_dosen_penguji']=='Antrian' ) selected @endif>Antrian</option>
                                <option value="Disetujui" @if ($penguji['status_persetujuan_dosen_penguji']=='Disetujui' ) selected @endif>Disetujui</option>
                                <option value="Ditolak" @if ($penguji['status_persetujuan_dosen_penguji']=='Ditolak' ) selected @endif>Ditolak</option>
                              </select>
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