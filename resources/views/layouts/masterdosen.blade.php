<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  @yield('title')

  <!-- Datatable -->
  <link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon.png">
  <link href="/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
  <link href="/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/vendor/chartist/css/chartist.min.css">
  <link href="/css/style.css" rel="stylesheet">
  <!-- Summernote -->
  <link href="/vendor/summernote/summernote.css" rel="stylesheet">

</head>

<body>

  <!--*******************
        Preloader start
    ********************-->
  <div id="preloader">
    <div class="sk-three-bounce">
      <div class="sk-child sk-bounce1"></div>
      <div class="sk-child sk-bounce2"></div>
      <div class="sk-child sk-bounce3"></div>
    </div>
  </div>
  <!--*******************
        Preloader end
    ********************-->

  <!--**********************************
        Main wrapper start
    ***********************************-->
  <div id="main-wrapper">

    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header">
      <a href="/dashboard" class="brand-logo">
        <img class="logo-abbr" src="/images/logo.png" alt="">
        <img class="logo-compact" src="/images/logo-text.png" alt="">
        <img class="brand-title" src="/images/logo-text.png" alt="">
      </a>

      <div class="nav-control">
        <div class="hamburger">
          <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
      </div>
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->


    <!--**********************************
            Header start
        ***********************************-->
    <div class="header">
      <div class="header-content">
        <nav class="navbar navbar-expand">
          <div class="collapse navbar-collapse justify-content-between">
            <div class="header-left">
              <div class="search_bar dropdown show">
                <div class="dropdown-menu p-0 m-0 show">
                  <!-- <form>
                    <input class="form-control" type="search" placeholder="Search Here" aria-label="Search">
                  </form> -->
                </div>
                <!-- <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.7871 22.7761L17.9548 16.9437C19.5193 15.145 20.4665 12.7982 20.4665 10.2333C20.4665 4.58714 15.8741 0 10.2333 0C4.58714 0 0 4.59246 0 10.2333C0 15.8741 4.59246 20.4665 10.2333 20.4665C12.7982 20.4665 15.145 19.5193 16.9437 17.9548L22.7761 23.7871C22.9144 23.9255 23.1007 24 23.2816 24C23.4625 24 23.6488 23.9308 23.7871 23.7871C24.0639 23.5104 24.0639 23.0528 23.7871 22.7761ZM1.43149 10.2333C1.43149 5.38004 5.38004 1.43681 10.2279 1.43681C15.0812 1.43681 19.0244 5.38537 19.0244 10.2333C19.0244 15.0812 15.0812 19.035 10.2279 19.035C5.38004 19.035 1.43149 15.0865 1.43149 10.2333Z" fill="#A4A4A4" /></svg>
                </span> -->
              </div>
            </div>

            <ul class="navbar-nav header-right">
              <li class="nav-item dropdown notification_dropdown">
                <a class="nav-link dz-fullscreen primary" href="#">
                  <svg id="Capa_1" enable-background="new 0 0 482.239 482.239" height="22" viewBox="0 0 482.239 482.239" width="22" xmlns="http://www.w3.org/2000/svg">
                    <path d="m0 17.223v120.56h34.446v-103.337h103.337v-34.446h-120.56c-9.52 0-17.223 7.703-17.223 17.223z" fill="" />
                    <path d="m465.016 0h-120.56v34.446h103.337v103.337h34.446v-120.56c0-9.52-7.703-17.223-17.223-17.223z" fill="" />
                    <path d="m447.793 447.793h-103.337v34.446h120.56c9.52 0 17.223-7.703 17.223-17.223v-120.56h-34.446z" fill="" />
                    <path d="m34.446 344.456h-34.446v120.56c0 9.52 7.703 17.223 17.223 17.223h120.56v-34.446h-103.337z" fill="" /></svg>
                </a>
              </li>
              <!-- <li class="nav-item dropdown notification_dropdown">
                <a class="nav-link  ai-icon warning" href="#" role="button" data-toggle="dropdown">
                  <svg width="24" height="24" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.75 14.8385V12.0463C21.7471 9.88552 20.9385 7.80353 19.4821 6.20735C18.0258 4.61116 16.0264 3.61555 13.875 3.41516V1.625C13.875 1.39294 13.7828 1.17038 13.6187 1.00628C13.4546 0.842187 13.2321 0.75 13 0.75C12.7679 0.75 12.5454 0.842187 12.3813 1.00628C12.2172 1.17038 12.125 1.39294 12.125 1.625V3.41534C9.97361 3.61572 7.97429 4.61131 6.51794 6.20746C5.06159 7.80361 4.25291 9.88555 4.25 12.0463V14.8383C3.26257 15.0412 2.37529 15.5784 1.73774 16.3593C1.10019 17.1401 0.751339 18.1169 0.75 19.125C0.750764 19.821 1.02757 20.4882 1.51969 20.9803C2.01181 21.4724 2.67904 21.7492 3.375 21.75H8.71346C8.91521 22.738 9.45205 23.6259 10.2331 24.2636C11.0142 24.9013 11.9916 25.2497 13 25.2497C14.0084 25.2497 14.9858 24.9013 15.7669 24.2636C16.548 23.6259 17.0848 22.738 17.2865 21.75H22.625C23.321 21.7492 23.9882 21.4724 24.4803 20.9803C24.9724 20.4882 25.2492 19.821 25.25 19.125C25.2486 18.117 24.8998 17.1402 24.2622 16.3594C23.6247 15.5786 22.7374 15.0414 21.75 14.8385ZM6 12.0463C6.00232 10.2113 6.73226 8.45223 8.02974 7.15474C9.32723 5.85726 11.0863 5.12732 12.9212 5.125H13.0788C14.9137 5.12732 16.6728 5.85726 17.9703 7.15474C19.2677 8.45223 19.9977 10.2113 20 12.0463V14.75H6V12.0463ZM13 23.5C12.4589 23.4983 11.9316 23.3292 11.4905 23.0159C11.0493 22.7026 10.716 22.2604 10.5363 21.75H15.4637C15.284 22.2604 14.9507 22.7026 14.5095 23.0159C14.0684 23.3292 13.5411 23.4983 13 23.5ZM22.625 20H3.375C3.14298 19.9999 2.9205 19.9076 2.75644 19.7436C2.59237 19.5795 2.50014 19.357 2.5 19.125C2.50076 18.429 2.77757 17.7618 3.26969 17.2697C3.76181 16.7776 4.42904 16.5008 5.125 16.5H20.875C21.571 16.5008 22.2382 16.7776 22.7303 17.2697C23.2224 17.7618 23.4992 18.429 23.5 19.125C23.4999 19.357 23.4076 19.5795 23.2436 19.7436C23.0795 19.9076 22.857 19.9999 22.625 20Z" fill="#000" /></svg>
                  <div class="pulse-css"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3" style="height:380px;">
                    <ul class="timeline">
                      <li>
                        <div class="timeline-panel">
                          <div class="media mr-2">
                            <img alt="image" width="50" src="/images/avatar/1.jpg">
                          </div>
                          <div class="media-body">
                            <h6 class="mb-1">Dr sultads Send you Photo</h6>
                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="timeline-panel">
                          <div class="media mr-2 media-info">
                            KG
                          </div>
                          <div class="media-body">
                            <h6 class="mb-1">Resport created successfully</h6>
                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="timeline-panel">
                          <div class="media mr-2 media-success">
                            <i class="fa fa-home"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="mb-1">Reminder : Treatment Time!</h6>
                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="timeline-panel">
                          <div class="media mr-2">
                            <img alt="image" width="50" src="/images/avatar/1.jpg">
                          </div>
                          <div class="media-body">
                            <h6 class="mb-1">Dr sultads Send you Photo</h6>
                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="timeline-panel">
                          <div class="media mr-2 media-danger">
                            KG
                          </div>
                          <div class="media-body">
                            <h6 class="mb-1">Resport created successfully</h6>
                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="timeline-panel">
                          <div class="media mr-2 media-primary">
                            <i class="fa fa-home"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="mb-1">Reminder : Treatment Time!</h6>
                            <small class="d-block">29 July 2020 - 02:26 PM</small>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <a class="all-notification" href="#">See all notifications <i class="ti-arrow-right"></i></a>
                </div>
              </li> -->
              <li class="nav-item dropdown header-profile">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                  <div class="header-info">
                    <span><strong>{{Session::get('nama_user')}}</strong></span>
                  </div>
                  @if(is_null(Session::get('avatar_name')))
                  <img src="/images/profile/profile-user.png" width="20" alt="" class="bg-white" />
                  @else
                  <img src="http://103.179.57.109/api/v1/{{Session::get('avatar_user')}}" width="20" alt="" />
                  @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="{{ route('profiledosen.index') }}" class="dropdown-item ai-icon">
                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                      <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="ml-2">Profile </span>
                  </a>
                  <a href="{{ route('logout') }}" class="dropdown-item ai-icon" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                      <polyline points="16 17 21 12 16 7"></polyline>
                      <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span class="ml-2">Logout </span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    <div class="deznav">
      @include('layouts.sidebardosen')
    </div>
    <!--**********************************
            Sidebar end
        ***********************************-->

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
      <!-- row -->
      @yield('content')
    </div>
    <!--**********************************
            Content body end
        ***********************************-->


  </div>
  <!--**********************************
        Main wrapper end
    ***********************************-->

  <!--**********************************
        Scripts
    ***********************************-->
  <!-- Required vendors -->
  <script src="/vendor/global/global.min.js"></script>
  <script src="/vendor/chart.js/Chart.bundle.min.js"></script>
  <script src="/js/custom.min.js"></script>
  <script src="/js/deznav-init.js"></script>

  <!-- Counter Up -->
  <script src="/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="/vendor/jquery.counterup/jquery.counterup.min.js"></script>

  <!-- Apex Chart -->
  <script src="/vendor/apexchart/apexchart.js"></script>

  <!-- Chart piety plugin files -->
  <script src="/vendor/peity/jquery.peity.min.js"></script>

  <!-- Dashboard 1 -->
  <script src="/js/dashboard/dashboard-1.js"></script>

  <!-- Datatable -->
  <script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="/js/plugins-init/datatables.init.js"></script>
  <!-- Summernote -->
  <script src="/vendor/summernote/js/summernote.min.js"></script>
  <!-- Summernote init -->
  <script src="/js/plugins-init/summernote-init.js"></script>

  @include('sweetalert::alert')

  @yield('ajax')

</body>

</html>