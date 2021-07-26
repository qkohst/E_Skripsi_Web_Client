<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>E-Skripsi | Login</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon.png">
  <link href="/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
  <div class="authincation h-100">
    <div class="container h-100">
      <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
          <div class="authincation-content">
            <div class="row no-gutters">
              <div class="col-xl-12">
                <div class="auth-form">
                  <h3 class="text-center mb-2">LOGIN</h3>
                  <h4 class="text-center mb-4">E-Skripsi Unirow Tuban</h4>
                  <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label class="mb-1"><strong>Username</strong></label>
                      <input type="text" class="form-control" name="username" placeholder="username" value="{{ old('username') }}" required>
                    </div>
                    <div class="form-group">
                      <label class="mb-1"><strong>Password</strong></label>
                      <input type="password" class="form-control" name="password" placeholder="password" required>
                    </div>
                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                      <div class="form-group">
                        <div class="custom-control custom-checkbox ml-1">
                          <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                          <label class="custom-control-label" for="basic_checkbox_1">Ingat Saya</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <a data-target="#lupaPassword" data-toggle="modal" href="#lupaPassword">Lupa Password ?</a>
                      </div>
                      <div class="modal fade" id="lupaPassword">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Lupa Password ?</h5>
                              <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>
                                Jika anda login sebagai <b>Mahasiswa atau Dosen</b>, silahkan hubungi <b>admin prodi</b> untuk melakukan reset password.
                              </p>
                              <p>
                                Jika anda login sebagai <b>Admin Prodi</b>, silahkan hubungi <b>admin</b> untuk melakukan reset password.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                  </form>
                  <div class="new-account mt-3">
                    <p>Versi 1.0</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!--**********************************
        Scripts
    ***********************************-->
  <!-- Required vendors -->
  <script src="/vendor/global/global.min.js"></script>
  <!-- <script src="/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script> -->
  <script src="/js/custom.min.js"></script>
  <script src="/js/deznav-init.js"></script>

  @include('sweetalert::alert')
</body>

</html>