@extends('layouts.master')

@section('content')
<div class="container-fluid">
  <div class="form-head d-flex mb-3 align-items-start">
    <div class="mr-auto d-none d-lg-block">
      <h2 class="text-black font-w600 mb-0">Profile</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary">Dashboard</a></li>
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
              <img src="images/avatar/1.jpg" width="150" class="rounded-circle mb-4" alt="" />
              <h4 class="mb-3 text-black font-w600">James Witwitcky</h4>

              <table class="table">
                <tbody>
                  <tr class="text-left">
                    <td>NIDN</td>
                    <td>: 0323503268</td>
                  </tr>
                  <tr class="text-left">
                    <td>NIP</td>
                    <td>: 0323503268032036</td>
                  </tr>
                  <tr class="text-left">
                    <td>Jenis Kelamin</td>
                    <td>: Laki-Laki</td>
                  </tr>
                  <tr class="text-left">
                    <td>Tempat Lahir</td>
                    <td>: Tuban</td>
                  </tr>
                  <tr class="text-left">
                    <td>Tanggal Lahir</td>
                    <td>: 30 Mei 1998</td>
                  </tr>
                </tbody>
              </table>
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
                            <td>: Kukoh Santoso</td>
                          </tr>
                          <tr class="text-left">
                            <td>NIK</td>
                            <td>: 3523063005980003</td>
                          </tr>
                          <tr class="text-left">
                            <td>Email</td>
                            <td>: kukohsantoso013@gmail.com</td>
                          </tr>
                          <tr class="text-left">
                            <td>Nomor HP</td>
                            <td>: 085232077932</td>
                          </tr>
                          <tr class="text-left">
                            <td>Pembaruan</td>
                            <td>: 2021-04-06 14:06:00</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="editprofile">
                    <div class="basic-form pt-4">
                      <form>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap">
                          </div>
                          <div class="form-group col-md-6">
                            <label>NIDN</label>
                            <input type="number" class="form-control" placeholder="NIDN">
                          </div>
                          <div class="form-group col-md-6">
                            <label>NIP <small><i>(opsional)</i></small></label>
                            <input type="number" class="form-control" placeholder="NIP">
                          </div>
                          <div class="form-group col-md-6">
                            <label>NIK</label>
                            <input type="number" class="form-control" placeholder="NIK">
                          </div>
                          <div class="form-group col-md-6">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" placeholder="Tempat Lahir">
                          </div>
                          <div class="form-group col-md-6">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" placeholder="Tanggal Lahir">
                          </div>
                          <div class="form-group col-md-6">
                            <label>Jenis Kelamin</label>
                            <select id="jenis_kelamin" class="form-control">
                              <option selected>-- Pilih Data --</option>
                              <option>Laki-Laki</option>
                              <option>Perempuan</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email">
                          </div>
                          <div class="form-group col-md-6">
                            <label>No HP</label>
                            <input type="number" class="form-control" placeholder="No HP">
                          </div>
                          <div class="form-group col-md-6">
                            <label>Foto</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input">
                              <label class="custom-file-label">Pilih file foto</label>
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
                        <form>

                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label>NIDN</label>
                              <input type="number" class="form-control" placeholder="NIDN">
                            </div>
                            <div class="form-group col-md-12">
                              <label>Password Lama</label>
                              <input type="password" class="form-control" placeholder="Password Lama">
                            </div>
                            <div class="form-group col-md-12">
                              <label>Password Baru</label>
                              <input type="password" class="form-control" placeholder="Password Baru">
                            </div>
                            <div class="form-group col-md-12">
                              <label>Ulangi Password</label>
                              <input type="password" class="form-control" placeholder="Ulangi Password">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox">
                              <label class="form-check-label">
                                Saya yakin akan ganti password
                              </label>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary">Ganti Password</button>
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