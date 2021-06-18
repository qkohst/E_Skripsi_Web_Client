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
  Route::get('/dashboard', function () {
    return view('dashboard/index');
  });

  // Route Admin 
  Route::group(['middleware' => 'CekRoleMiddleware:Admin'], function () {
    Route::resource('fakultas', 'Admin\FakultasController');
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
