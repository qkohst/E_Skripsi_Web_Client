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


// Route::get('/', function () {
//     return view('auth/login');
//     return view('dashboard/index');
//     return view('admin/profile/index');
//     return view('admin/fakultas/index');
//     return view('admin/fakultas/create');
//     return view('admin/fakultas/edit');
// });

Route::get('/', 'AuthController@index')->name('login');
Route::post('/login', 'AuthController@login')->name('login');

Route::group(['middleware' => 'CekLoginMiddleware'], function () {
  Route::post('/logout', 'AuthController@logout')->name('logout');
  Route::post('/gantipassword', 'AuthController@ganti_password')->name('ganti_password');
  Route::get('/dashboard', 'DashboardController@index');


  // Route Admin 
  Route::group(['middleware' => 'CekRoleMiddleware:Admin'], function () {
    Route::resource('profile', 'Admin\ProfileController', [
      'only' => ['index', 'update', 'store']
    ]);
    Route::resource('fakultas', 'Admin\FakultasController', [
      'except' => ['create', 'show']
    ]);
    Route::resource('prodi', 'Admin\ProdiController', [
      'except' => ['create', 'show']
    ]);
    Route::resource('jabatanstruktural', 'Admin\JabatanStrukturalController', [
      'except' => ['create', 'show']
    ]);
    Route::resource('jabatanfungsional', 'Admin\JabatanFungsionalController', [
      'except' => ['create', 'show']
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
    //
  });

  // Route Mahasiswa
  Route::group(['middleware' => 'CekRoleMiddleware:Mahasiswa'], function () {
    //
  });

  // Route Dosen
  Route::group(['middleware' => 'CekRoleMiddleware:Dosen'], function () {
    //
  });
});
