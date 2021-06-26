@extends('layouts.masterdosen')
@section('title')
<title>E-Skripsi | Sidang Skripsi</title>
@endsection

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Sidang Skripsi</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/verifikasisidang" class="text-primary">Sidang Skripsi</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Input Nilai</a></li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h4 class="card-title">Verifikasi Hasil Sidang Skripsi</h4>
          </div>
        </div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-lg-2">
              <span>Nama</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_sidang['mahasiswa']['nama_mahasiswa']}}</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-2">
              <span>NPM</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_sidang['mahasiswa']['npm_mahasiswa']}}</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-2 ">
              <span>Judul Skripsi</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_sidang['judul_skripsi']['nama_judul_skripsi']}}</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-2 ">
              <span>Jabatan Dosen</span>
            </div>
            <div class="form-group col-lg-10">
              <span>: {{$data_sidang['jabatan_dosen_sidang_skripsi']}}</span>
            </div>
          </div>
          <div class="default-tab mt-2">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#verifikasi">Verifikasi Sidang Skripsi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#inputNilai">Input Nilai</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show" id="verifikasi" role="tabpanel">
                <div class="pt-4">
                  <h4>Verifikasi Sidang Skripsi</h4>
                  <form class="mt-3" action="#" method="post">
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>Status Verifikasi</label>
                        <fieldset disabled>
                          <select id="status_verifikasi_hasil_sidang_skripsi" name="status_verifikasi_hasil_sidang_skripsi" class="form-control" required>
                            <option value="" @if ($data_sidang['status_verifikasi_hasil_sidang_skripsi']=='Belum Verifikasi' ) selected @endif>-- Pilih Status Verifikasi --</option>
                            <option value="Lulus Sidang" @if ($data_sidang['status_verifikasi_hasil_sidang_skripsi']=='Lulus Sidang' ) selected @endif>Lulus Sidang</option>
                            <option value="Revisi" @if ($data_sidang['status_verifikasi_hasil_sidang_skripsi']=='Revisi' ) selected @endif>Revisi</option>
                          </select>
                        </fieldset>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>Catatan</label>
                        <p>{!!$data_sidang['catatan_hasil_sidang_skripsi']!!}</p>
                      </div>
                    </div>
                    <div class="form-row float-right">
                      <a href="{{ route('verifikasisidang.index') }}" class="btn btn-sm btn-danger light">Batal</a>
                      <button type="submit" class="btn btn-sm btn-primary ml-2">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="tab-pane fade show active" id="inputNilai">
                <div class="pt-4">
                  <div class="row">
                    <div class="col">
                      <h4 class="float-left">Input Nilai</h4>
                    </div>
                    <div class="col">
                      <button class="btn btn-info shadow btn-sm sharp float-right" data-toggle="modal" data-target="#infoModal"><i class="fa fa-question"></i></button>
                    </div>
                    <!-- Modal Info-->
                    <div class="modal fade" id="infoModal">
                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Informasi Penilaian</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>- Berilah skor pada butir Aspek Penilaian dengan cara mengisi angka pada skor dengan skala 0 - 100.</p>
                            <p>- Proses penilaian <b>hanya dapat dilakukan 1 kali</b>, artinya anda tidak dapat mengubah nilai yang sudah diinputkan.</p>
                            <h5>A. Proses Bimbingan <small><i>(Khusus Dosen Pembimbing)</i></small></h5>
                            <div class="form-row">
                              <div class="form-group col-3">
                                <span>1. Ketekunan</span>
                              </div>
                              <div class="form-group col-9">
                                : Ketepatan waktu dalam pembimbingan
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-3">
                                <span>2. Adab</span>
                              </div>
                              <div class="form-group col-9">
                                : Kesopanan dan kejujuran selama proses bimbingan
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-3">
                                <span>3. Kemadirian</span>
                              </div>
                              <div class="form-group col-9">
                                : Kemandirian dalam mengerjakan skripsi
                              </div>
                            </div>

                            <h5>B. Naskah Skripsi</h5>
                            <div class="form-row">
                              <div class="form-group col-3">
                                <span>1. Teknik Penulisan (15%)</span>
                              </div>
                              <div class="form-group col-9">
                                : Meliputi sistematika penulisan dan kontribusi keilmuan, keterpaduan antar kalimat dan paragraf, tanda baca sesuai, cara mengkutip pendapat ahli benar, kalimat mudah dipahami.
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-3">
                                <span>2. Konsep Pemikiran (15%)</span>
                              </div>
                              <div class="form-group col-9">
                                : Meliputi original, kejelasan masalah/ rumusan masalah, tujuan penelitian, definisi operasional, hipotesis (jika ada)
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-3">
                                <span>3. Kajian Pustaka (15%)</span>
                              </div>
                              <div class="form-group col-9">
                                : Meliputi kesesuaian kajian pustaka/landasan teori dengan rumusan masalah dan tujuan penelitian.
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-3">
                                <span>4. Metode Penelitian (15%)</span>
                              </div>
                              <div class="form-group col-9">
                                : Meliputi desain dan rancangan penelitian, kelengkapan instrumen, teknik analisis data, prosedur penelitian.
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-3">
                                <span>5. Hasil dan Pembahasan (20%)</span>
                              </div>
                              <div class="form-group col-9">
                                : Meliputi keakuratan data, deskripsi jelas dan sistematis, kesesuaian dan kecermatan analisis data, pembahas-an penelitian sistematis dan relevan, mencakup keterkaitan hasil dan analisis data penelitian dengan rumusan masalah, kajian pustaka (posisi temuan/teori terhadap teori dan temuan sebelumnya serta penjelasan dari temuan yang diungkap dari lapangan), dan kelemahan penelitian (bila ada).
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-3">
                                <span>6. Kesimpulan Penelitian (10%)</span>
                              </div>
                              <div class="form-group col-9">
                                : Meliputi kesimpulan jelas, sistematis dan cermat, menjawab rumusan masalah/tujuan penelitian, saran teoritis dan aplikatif.
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-3">
                                <span>7. Kepustakaan (10%)</span>
                              </div>
                              <div class="form-group col-9">
                                : Meliputi relevansi dengan penelitian, keterkinian pustaka yang digunakan, jumlah referensi.
                              </div>
                            </div>

                            <h5>C. Pelaksanaan Sidang</h5>
                            <div class="form-row">
                              <div class="form-group col-12">
                                <span>1. Presentasi dan Singkronisasi (20%)</span>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-12">
                                <span>2. Penguasaan Materi (50%)</span>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-12">
                                <span>3. Kemampuan Berargumentasi (30%)</span>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form class="mt-3" action="{{ route('verifikasisidang.post_nilai', $data_sidang['id']) }}" method="post">
                    {{ method_field('PATCH') }}
                    @csrf
                    <h5>A. Proses Bimbingan <small><i>(Khusus Dosen Pembimbing)</i></small></h5>
                    @if($data_nilai['jabatan_dosen_sidang_skripsi'] == 'Pembimbing 1' || $data_nilai['jabatan_dosen_sidang_skripsi'] == 'Pembimbing 2')
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label col-form-label">Ketekunan</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="nilai_a1_hasil_sidang_skripsi" value="{{$data_nilai['nilai_a1_hasil_sidang_skripsi']}}" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label col-form-label">Adab</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="nilai_a2_hasil_sidang_skripsi" value="{{$data_nilai['nilai_a2_hasil_sidang_skripsi']}}" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label col-form-label">Kemandirian</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="nilai_a3_hasil_sidang_skripsi" value="{{$data_nilai['nilai_a3_hasil_sidang_skripsi']}}" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    @elseif($data_nilai['jabatan_dosen_sidang_skripsi'] == 'Penguji 1' || $data_nilai['jabatan_dosen_sidang_skripsi'] == 'Penguji 2')
                    <fieldset disabled>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label col-form-label">Ketekunan</label>
                            <div class="col-sm-5">
                              <input type="number" class="form-control" name="nilai_a1_hasil_sidang_skripsi" value="{{$data_nilai['nilai_a1_hasil_sidang_skripsi']}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label col-form-label">Adab</label>
                            <div class="col-sm-5">
                              <input type="number" class="form-control" name="nilai_a2_hasil_sidang_skripsi" value="{{$data_nilai['nilai_a2_hasil_sidang_skripsi']}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-7 col-form-label col-form-label">Kemandirian</label>
                            <div class="col-sm-5">
                              <input type="number" class="form-control" name="nilai_a3_hasil_sidang_skripsi" value="{{$data_nilai['nilai_a3_hasil_sidang_skripsi']}}">
                            </div>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    @endif
                    <h5>B. Naskah Skripsi</h5>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label col-form-label">Teknik Penulisan</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="nilai_b1_hasil_sidang_skripsi" value="{{$data_nilai['nilai_b1_hasil_sidang_skripsi']}}" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label col-form-label">Konsep Pemikiran</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="nilai_b2_hasil_sidang_skripsi" value="{{$data_nilai['nilai_b2_hasil_sidang_skripsi']}}" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label col-form-label">Kajian Pustaka</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="nilai_b3_hasil_sidang_skripsi" value="{{$data_nilai['nilai_b3_hasil_sidang_skripsi']}}" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label col-form-label">Metode Penelitian</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="nilai_b4_hasil_sidang_skripsi" value="{{$data_nilai['nilai_b4_hasil_sidang_skripsi']}}" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label col-form-label">Hasil dan Pembahasan</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="nilai_b5_hasil_sidang_skripsi" value="{{$data_nilai['nilai_b5_hasil_sidang_skripsi']}}" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label col-form-label">Kesimpulan Penelitian</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="nilai_b6_hasil_sidang_skripsi" value="{{$data_nilai['nilai_b6_hasil_sidang_skripsi']}}" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label col-form-label">Kepustakaan</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="nilai_b7_hasil_sidang_skripsi" value="{{$data_nilai['nilai_b7_hasil_sidang_skripsi']}}" required>
                          </div>
                        </div>
                      </div>
                    </div>

                    <h5>C. Pelaksanaan Sidang</h5>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label col-form-label">Presentasi dan Singkronisasi</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="nilai_c1_hasil_sidang_skripsi" value="{{$data_nilai['nilai_c1_hasil_sidang_skripsi']}}" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label col-form-label">Penguasaan Materi</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="nilai_c2_hasil_sidang_skripsi" value="{{$data_nilai['nilai_c2_hasil_sidang_skripsi']}}" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-7 col-form-label col-form-label">Kemampuan Berargumentasi</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control" name="nilai_c3_hasil_sidang_skripsi" value="{{$data_nilai['nilai_c3_hasil_sidang_skripsi']}}" required>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-row float-right">
                      <a href="{{ route('verifikasisidang.index') }}" class="btn btn-sm btn-danger light">Batal</a>
                      <button type="submit" class="btn btn-sm btn-primary ml-2">Simpan</button>
                    </div>
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
@endsection