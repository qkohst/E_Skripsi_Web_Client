<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'AuthController@index')->name('login');
Route::post('/login', 'AuthController@login')->name('login');

Route::group(['middleware' => 'CekLoginMiddleware'], function () {
  Route::post('/logout', 'AuthController@logout')->name('logout');
  Route::post('/gantipassword', 'AuthController@ganti_password')->name('ganti_password');
  Route::get('/dashboard', 'DashboardController@index');

  // Route Unutuk Ajax 
  Route::get('getProdi/ajax/{id}', 'getAPiController@ajax_prodi');
  Route::get('getKabupaten/ajax/{id}', 'getAPiController@ajax_kabupaten');
  Route::get('getKecamatan/ajax/{id}', 'getAPiController@ajax_kecamatan');
  Route::get('getDesa/ajax/{id}', 'getAPiController@ajax_desa');

  // Route Admin 
  Route::group(['middleware' => 'CekRoleMiddleware:Admin'], function () {
    Route::resource('profileadmin', 'Admin\ProfileController', [
      'only' => ['index', 'store']
    ]);

    Route::resource('fakultas', 'Admin\FakultasController', [
      'except' => ['create', 'show', 'edit']
    ]);

    Route::resource('prodi', 'Admin\ProdiController', [
      'except' => ['create', 'show', 'edit']
    ]);

    Route::resource('jabatanstruktural', 'Admin\JabatanStrukturalController', [
      'except' => ['create', 'show', 'edit']
    ]);

    Route::resource('jabatanfungsional', 'Admin\JabatanFungsionalController', [
      'except' => ['create', 'show', 'edit']
    ]);

    Route::resource('adminprodi', 'Admin\AdminProdiController', [
      'except' => ['create', 'edit']
    ]);
    Route::post('adminprodi/{id}/riset_password', 'Admin\AdminProdiController@riset_password');

    Route::resource('skripsi', 'Admin\SkripsiController', [
      'only' => ['index']
    ]);
    Route::get('/skripsi/{id}/detailseminar', 'Admin\SkripsiController@detail_seminar')->name('detail_seminar');
    Route::get('/skripsi/{id}/detailsidang', 'Admin\SkripsiController@detail_sidang')->name('detail_sidang');
  });

  // Route Admin Prodi
  Route::group(['middleware' => 'CekRoleMiddleware:Admin Prodi'], function () {
    Route::resource('profileadminprodi', 'AdminProdi\ProfileController', [
      'only' => ['index', 'store']
    ]);

    Route::resource('mahasiswa', 'AdminProdi\MahasiswaController', [
      'except' => ['create', 'edit']
    ]);
    Route::post('mahasiswa/{id}/riset_password', 'AdminProdi\MahasiswaController@riset_password');

    Route::resource('dosen', 'AdminProdi\DosenController', [
      'except' => ['create', 'edit']
    ]);
    Route::post('dosen/{id}/riset_password', 'AdminProdi\DosenController@riset_password');

    Route::resource('persetujuankrs', 'AdminProdi\PersetujuanKRSController', [
      'only' => ['index', 'update']
    ]);

    Route::resource('seminarproposal', 'AdminProdi\SeminarProposalController', [
      'only' => ['index', 'show', 'edit', 'update']
    ]);
    Route::get('seminarproposal/{id}/hasil_seminar', 'AdminProdi\SeminarProposalController@hasil_seminar')
      ->name('seminarproposal.hasil_seminar');
    Route::post('seminarproposal/{id}/verifikasi_selesai', 'AdminProdi\SeminarProposalController@verifikasi_selesai')
      ->name('seminarproposal.verifikasi_selesai');
    Route::get('seminarproposal/{id}/cetak_nilai', 'AdminProdi\SeminarProposalController@cetak_nilai')
      ->name('seminarproposal.cetak_nilai');


    Route::resource('sidangskripsi', 'AdminProdi\SidangSkripsiController', [
      'only' => ['index', 'edit', 'update']
    ]);
    Route::get('sidangskripsi/{id}/hasil_sidang', 'AdminProdi\SidangSkripsiController@hasil_sidang')
      ->name('sidangskripsi.hasil_sidang');
    Route::post('sidangskripsi/{id}/verifikasi_selesai', 'AdminProdi\SidangSkripsiController@verifikasi_selesai')
      ->name('sidangskripsi.verifikasi_selesai');
    Route::get('sidangskripsi/{id}/cetak_nilai', 'AdminProdi\SidangSkripsiController@cetak_nilai')
      ->name('sidangskripsi.cetak_nilai');
  });

  // Route Mahasiswa
  Route::group(['middleware' => 'CekRoleMiddleware:Mahasiswa'], function () {
    Route::resource('profilemahasiswa', 'Mahasiswa\ProfileController', [
      'only' => ['index', 'store']
    ]);

    Route::resource('persyaratanskripsi', 'Mahasiswa\PersyaratanSkripsiController', [
      'only' => ['index', 'store']
    ]);
    Route::post('persyaratanskripsi/juduldosbing1', 'Mahasiswa\PersyaratanSkripsiController@juduldosbing1')
      ->name('persyaratanskripsi.juduldosbing1');
    Route::post('persyaratanskripsi/juduldosbing2', 'Mahasiswa\PersyaratanSkripsiController@juduldosbing2')
      ->name('persyaratanskripsi.juduldosbing2');

    Route::resource('pengajuanbimbinganproposal', 'Mahasiswa\PengajuanBimbinganProposalController', [
      'only' => ['index', 'store']
    ]);
    Route::get('pengajuanbimbinganproposal/beritaacara', 'Mahasiswa\PengajuanBimbinganProposalController@beritaacara')
      ->name('pengajuanbimbinganproposal.beritaacara');

    Route::resource('pengajuanseminar', 'Mahasiswa\PengajuanSeminarController', [
      'only' => ['index', 'store']
    ]);
    Route::get('pengajuanseminar/cetaknilai', 'Mahasiswa\PengajuanSeminarController@cetaknilai')
      ->name('pengajuanseminar.cetaknilai');

    Route::resource('pengajuanbimbinganskripsi', 'Mahasiswa\PengajuanBimbinganSkripsiController', [
      'only' => ['index', 'store']
    ]);
    Route::get('pengajuanbimbinganskripsi/beritaacara', 'Mahasiswa\PengajuanBimbinganSkripsiController@beritaacara')
      ->name('pengajuanbimbinganskripsi.beritaacara');

    Route::resource('pengajuansidang', 'Mahasiswa\PengajuanSidangController', [
      'only' => ['index', 'store']
    ]);
    Route::get('pengajuansidang/cetaknilai', 'Mahasiswa\PengajuanSidangController@cetaknilai')
      ->name('pengajuansidang.cetaknilai');
  });

  // Route Dosen
  Route::group(['middleware' => 'CekRoleMiddleware:Dosen'], function () {
    Route::resource('profiledosen', 'Dosen\ProfileController', [
      'only' => ['index', 'store']
    ]);

    Route::resource('persetujuanjudul', 'Dosen\PersetujuanJudulController', [
      'only' => ['index', 'update']
    ]);

    Route::resource('persetujuanpenguji', 'Dosen\PersetujuanPengujiController', [
      'only' => ['index', 'update']
    ]);

    Route::resource('persetujuanseminar', 'Dosen\PersetujuanSeminarController', [
      'only' => ['index', 'update']
    ]);

    Route::resource('persetujuansidang', 'Dosen\PersetujuanSidangController', [
      'only' => ['index', 'update']
    ]);

    Route::resource('bimbinganproposal', 'Dosen\BimbinganProposalController', [
      'only' => ['index', 'update']
    ]);

    Route::resource('bimbinganskripsi', 'Dosen\BimbinganSkripsiController', [
      'only' => ['index', 'update']
    ]);

    Route::resource('verifikasiseminar', 'Dosen\VerifikasiSeminarController', [
      'only' => ['index', 'show', 'update']
    ]);
    Route::patch('verifikasiseminar/{id}/post_nilai', 'Dosen\VerifikasiSeminarController@post_nilai')
      ->name('verifikasiseminar.post_nilai');

    Route::resource('verifikasisidang', 'Dosen\VerifikasiSidangController', [
      'only' => ['index', 'show', 'update']
    ]);
    Route::patch('verifikasisidang/{id}/post_nilai', 'Dosen\VerifikasiSidangController@post_nilai')
      ->name('verifikasisidang.post_nilai');
  });
});
