<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('page_title', 'Dashboard') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend_assests') }}/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('backend_assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{ asset('backend_assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend_assets') }}/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('backend_assets') }}/images/flags/us.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">English <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('backend_assets') }}/images/flags/germany.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('backend_assets') }}/images/flags/italy.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('backend_assets') }}/images/flags/spain.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('backend_assets') }}/images/flags/russia.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Russian</span>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown notification-list d-none d-md-inline-block">
                        <a href="#" id="btn-fullscreen" class="nav-link waves-effect waves-light">
                            <i class="mdi mdi-crop-free noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list d-none d-md-inline-block">
                        <a href="#" id="btn-fullscreen" class="nav-link waves-effect waves-light">
                            {{ Auth::user()->name }}
                        </a>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('uploads/profile_photos')}}/{{ Auth::user()->profile_image }}" alt="user-image" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="{{ route('profile.index') }}" class="dropdown-item notify-item">
                                <i class="mdi mdi-face-profile"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-settings"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-lock"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="{{ route('logout') }} javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sl-menu-link dropdown-item notify-item">
                                <div class="sl-menu-item">
                                  <i class="mdi mdi-power"></i>
                                  <span class="menu-item-label">Logout</span>
                                </div><!-- menu-item -->
                            </a><!-- sl-menu-link -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                        <a href="{{ route('home') }}" class="logo text-center logo-light">
                            <span class="logo-lg">
                                <img src="{{ asset('backend_assets') }}/images/logo-light.png" alt="" height="16">
                                <!-- <span class="logo-lg-text-dark">Moltran</span> -->
                             
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-lg-text-dark">M</span> -->
                                <img src="{{ asset('backend_assets') }}/images/logo-sm.png" alt="" height="25">
                            </span>
                        </a>
                    </div>
                <!-- LOGO -->

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>

                    <li class="d-none d-sm-block">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                    <div class="slimscroll-menu">

                        <!--- Sidemenu -->
                        <div id="sidebar-menu">

                            <div class="user-box">

                                <div class="float-left">
                                    <img src="{{ asset('uploads/profile_photos')}}/{{ Auth::user()->profile_image }}" alt="" class="avatar-md rounded-circle">
                                </div>
                                <div class="user-info">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                                                        </a>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <li><a href="{{ route('profile.index') }}" class="dropdown-item"><i class="mdi mdi-face-profile mr-2"></i> Profile<div class="ripple-wrapper"></div></a></li>

                                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-settings mr-2"></i> Settings</a></li>

                                            <li>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sl-menu-link dropdown-item">
                                                    <div class="sl-menu-item">
                                                      <i class="mdi mdi-power"></i>
                                                      <span class="menu-item-label">Logout</span>
                                                    </div><!-- menu-item -->
                                                  </a><!-- sl-menu-link -->
                                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                  </form>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="font-13 text-muted m-0">Administrator</p>
                                </div>
                            </div>

                            <ul class="metismenu" id="side-menu">

                                <li>
                                    <a href="{{ url('/') }}" class="waves-effect" target="_blank">
                                        <i class="mdi mdi-web"></i>
                                        <span> Front-End </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('home') }}" class="waves-effect">
                                        <i class="mdi mdi-alpha-d-circle"></i>
                                        <span> Dashboard </span>
                                    </a>
                                </li>

                        @if (Auth::user()->role == 1)
                        <li>
                            <a href="{{ route('order.index') }}" class="waves-effect">
                                <i class="mdi mdi-cart-arrow-right"></i>
                                <span> Order</span>
                            </a>
                        </li>

                        {{-- <li>
                            <a href="{{ route('category.index') }}" class="waves-effect">
                                <i class="mdi mdi-alpha-c-circle-outline"></i>
                                <span> Category </span>
                            </a>
                        </li> --}}

                         <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="mdi mdi-alpha-p-circle"></i>
                                <span> Product </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('product.index') }}">Product Insert</a></li>
                                <li><a href="{{ route('product.viewall') }}">Product View</a></li>
                                <li><a href="{{ route('product.trashall') }}">Product Trash</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="mdi mdi-layers-triple-outline"></i>
                                <span> Banner </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('banner.index') }}">Banner Insert</a></li>
                                <li><a href="{{ route('banner.viewall') }}">Banner View</a></li>
                                <li><a href="{{ route('banner.trashall') }}">Banner Trash</a></li>
                            </ul>
                        </li>

                        {{-- <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="mdi mdi-email-multiple"></i>
                                <span> Testmonial </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('testmonial.index') }}">Testmonial Insert</a></li>
                                <li><a href="{{ route('testmonial.viewall') }}">Testmonial View</a></li>
                                <li><a href="{{ route('testmonial.trashall') }}">Testmonial Trash</a></li>
                            </ul>
                        </li> --}}

                        {{-- <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="mdi mdi-chat-outline"></i>
                                <span> Faq </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('faq.index') }}">Faq Insert</a></li>
                                <li><a href="{{ route('faq.viewall') }}">Faq View</a></li>
                                <li><a href="{{ route('faq.trashall') }}">Faq Trash</a></li>
                            </ul>
                        </li> --}}

                        {{-- <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="mdi mdi-email-multiple"></i>
                                <span> Discount (%) </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('discount.index') }}">Discount Insert</a></li>
                                <li><a href="{{ route('discount.viewall') }}">Discount View</a></li>
                                <li><a href="{{ route('discount.trashall') }}">Discount Trash</a></li>
                            </ul>
                        </li> --}}

                        {{-- <li>
                            <a href="{{ route('coupon.index') }}" class="waves-effect">
                                <i class="mdi mdi-ticket "></i>
                                <span> Coupon </span>
                            </a>
                        </li> --}}

                        {{-- <li>
                            <a href="#" class="waves-effect">
                                <i class="mdi mdi-alpha-d-circle"></i>
                                <span> Deal Of the day </span>
                            </a>
                        </li> --}}

                        {{-- <li>
                            <a href="{{ route('customerEmail.index') }}" class="waves-effect">
                                <i class="mdi mdi-email-receive"></i>
                                <span> Visitor Email </span>
                            </a>
                        </li> --}}

                        {{-- <li>
                            <a href="{{ route('blog.index') }}" class="waves-effect">
                                <i class="mdi mdi-blogger"></i>
                                <span> Blog </span>
                            </a>
                        </li> --}}

                        {{-- <li>
                            <a href="{{ url('about') }}" class="waves-effect">
                                <i class="mdi mdi-worker"></i>
                                <span> About </span>
                            </a>
                        </li> --}}

                        {{-- <li>
                            <a href="{{ url('') }}" class="waves-effect">
                                <i class="mdi mdi-worker"></i>
                                <span> Social Information </span>
                            </a>
                        </li> --}}

                        {{-- <li>
                            <a href="{{ url('') }}" class="waves-effect">
                                <i class="mdi mdi-worker"></i>
                                <span> Contact Information </span>
                            </a>
                        </li> --}}
                        @endif





                                <li>
                                    <a href="{{ route('customerinfo.index') }}" class="waves-effect">
                                        <i class="mdi mdi-account-supervisor"></i>
                                        <span> Customer </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('profile.index') }}" class="waves-effect">
                                        <i class="mdi mdi-account-key"></i>
                                        <span> Profile </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sl-menu-link">
                                        <div class="sl-menu-item">
                                          <i class="mdi mdi-power"></i>
                                          <span class="menu-item-label">Logout</span>
                                        </div><!-- menu-item -->
                                      </a><!-- sl-menu-link -->
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                      </form>
                                </li>


                                {{-- <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="mdi mdi-palette"></i>
                                        <span> Elements </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="ui-typography.html">Typography</a></li>
                                    </ul>
                                </li> --}}

                            </ul>

                        </div>
                        <!-- End Sidebar -->

                        <div class="clearfix"></div>

                    </div>
                    <!-- Sidebar -left -->

                </div>
                <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    @yield('dashboard_content')

                </div>
                <!-- end content -->
                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                2020 - 2021 &copy; Dynamic By <a href="#">Zij</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->


        <!-- Vendor js -->
        <script src="{{ asset('backend_assets') }}/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="{{ asset('backend_assets') }}/js/app.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

        @yield('footer_scripts')

    </body>


<!-- Mirrored from coderthemes.com/moltran/layouts/blue-vertical/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Jul 2020 06:48:33 GMT -->
</html>
