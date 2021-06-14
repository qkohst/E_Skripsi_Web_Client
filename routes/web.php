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

Route::get('/', function () {
    return view('auth/login');
    // return view('dashboard/index');
    // return view('admin/profile/index');
    // return view('admin/fakultas/index');
    // return view('admin/fakultas/create');
    // return view('admin/fakultas/edit');
});
