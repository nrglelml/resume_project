<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Z5B5Oz9v46j8CkT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    <link rel="stylesheet" href="{{asset('assets/sweet-alert/sweetalert2.css')}}"/>
    @yield('css')
</head>
<body>
<div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="" style="text-decoration: none; color: gray" >ADMİN PANEL</a>
            <a class="sidebar-brand brand-logo-mini" href="" style="text-decoration: none; color: gray">A</a>
        </div>
        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <div class="count-indicator">
                            <img class="img-xs rounded-circle " src="{{asset('assets/images/faces-clipart/pic-1.png')}}" alt="">
                            <span class="count bg-success"></span>
                        </div>
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal">{{auth()->user()->name}}</h5>
                            <span>Gold Member</span>
                        </div>
                    </div>
                    <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                        <a href="{{route('admin.personal_info')}}" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-primary"></i>
                                </div>
                            </div>

                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small"> Hesap Ayarları</p>
                            </div>
                        </a>
                </div>
                </div>
            </li>
            <li class="nav-item nav-category">
                <span class="nav-link"></span>
            </li>
            <li class="nav-item menu-items {{ Route::is('admin.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.index')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                    <span class="menu-title" >Admin Paneli</span>
                </a>
            </li>

            <li class="nav-item menu-items {{ Route::is('admin.education-list') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.education-list')}}">
              <span class="menu-icon">
                <i class="mdi mdi-book"></i>
              </span>
                    <span class="menu-title">Eğitim Bilgileri</span>
                </a>
            </li>

            <li class="nav-item menu-items {{ Route::is('admin.experience-list') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.experience-list')}}">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
                    <span class="menu-title">Deneyim Bilgileri</span>
                </a>
            </li>
            <li class="nav-item menu-items {{ Route::is('admin.personal_info') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.personal_info')}}">
              <span class="menu-icon">
                <i class="mdi mdi-account-heart"></i>
              </span>
                    <span class="menu-title">Kişisel Bilgiler</span>
                </a>
            </li>
            <li class="nav-item menu-items {{ Route::is('admin.social_media-list') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.social_media-list')}}">
              <span class="menu-icon">
                <i class="mdi mdi-account-network"></i>
              </span>
                    <span class="menu-title">Sosyal Medya Bilgileri</span>
                </a>
            </li>
            <li class="nav-item menu-items {{ Route::is('portfolio.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('portfolio.index') }}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                    <span class="menu-title">Portfolio Yönetimi</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                            <div class="navbar-profile">
                                <img class="img-xs rounded-circle" src="{{asset('assets/images/faces-clipart/pic-1.png')}}" alt="">
                                <p class="mb-0 d-none d-sm-block navbar-profile-name">{{auth()->user()->name}}</p>
                                <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                            <h6 class="p-3 mb-0">Profil</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item" href="{{route('home')}}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-home text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Ana Sayfa</p>
                                </div>
                            </a>

                            <div class="dropdown-divider"></div>
                            <form id="logout-form-profile" action="{{ route('login') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a class="dropdown-item preview-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                             document.getElementById('logout-form-logout').submit();">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-logout text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Çıkış Yap</p>
                                </div>
                            </a>
                              <form id="logout-form-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </a>

                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-format-line-spacing"></span>
                </button>
            </div>
        </nav>

        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>

         <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
                </div>
            </footer>
        </div>
    </div>

</div>

<script src="{{'assets/vendors/js/vendor.bundle.base.js'}}"></script>

<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('assets/js/misc.js')}}"></script>
<script src="{{asset('assets/js/settings.js')}}"></script>
<script src="{{asset('assets/js/todolist.js')}}"></script>
<script src="{{asset('assets/sweet-alert/sweetalert2.all.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@include('sweetalert::alert')
@yield('js')

</body>
</html>

