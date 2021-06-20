@extends('layouts.masteradminprodi')

@section('title')
<title>E-Skripsi | AdPro Dashboard</title>
@endsection
@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Dashboard</h2>
      <p class="mb-0">Dashboard</p>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-9">
              <div>
                <h2 class="text-black mb-1">Selamat Datang</h2>
                <h1 class="text-black mb-1">{{Session::get('nama_user')}}</h1>
                <h5 class="card-title mb-1"><small class="mb-0">Anda Login Sebagai {{Session::get('role_user')}}</small></h5>
                <h4 class="card-title mb-1"><small class="mb-0">Di Sistem E-Skripsi Universitas PGRI Ronggolawe Tuban</small></h4>
              </div>
              <button type="button" class="btn btn-outline-light btn-sm mt-2"><span class="left"><i class="la la-play"></i>
                </span>PANDUAN</button>
            </div>
            <div class="col-md-3 hide-on-desktop">
              <div class="card-action card-tabs mt-3 mt-sm-0">
                <img src="/images/logo.png" class="img-fluid mx-auto d-block" alt="image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection