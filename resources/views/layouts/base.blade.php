
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">
        <!-- App title -->
        <title>test</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="/plugins/morris/morris.css">
        @yield('up')
        <!-- App css -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href=".plugins/switchery/switchery.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="/assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                  <div class="spinner-wrapper">
                    <div class="rotator">
                      <div class="inner-spin"></div>
                      <div class="inner-spin"></div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo"><span>{{Auth::user()->name}}</span><i class="mdi mdi-cube"></i></a>
                    <!-- Image logo -->
                    <!--<a href="index.html" class="logo">-->
                        <!--<span>-->
                            <!--<img src="assets/images/logo.png" alt="" height="30">-->
                        <!--</span>-->
                        <!--<i>-->
                            <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
                        <!--</i>-->
                    <!--</a>-->
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            
                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                            
                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect waves-light user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5>Hi, {{Auth::user()->name}}</h5>
                                    </li>
                                    <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                                     ><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
                {{Auth::user()}}
                @if(Auth::user()->roles[0]->name=="admin")
                     @include('admin.leftmenu')
                @endif
                
                @if(Auth::user()->roles[0]->name=="karyawan")
                     @include('karyawan.leftmenu')
                @endif

                



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                
                @yield('dashboard')

                <footer class="footer text-right">
                    2016 - 2018 © Zircos.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
             @yield('modal')


            <!-- Right Sidebar -->
         
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/detect.js"></script>
        <script src="/assets/js/fastclick.js"></script>
        <script src="/assets/js/jquery.blockUI.js"></script>
        <script src="/assets/js/waves.js"></script>
        <script src="/assets/js/jquery.slimscroll.js"></script>
        <script src="/assets/js/jquery.scrollTo.min.js"></script>
        <script src="/plugins/switchery/switchery.min.js"></script>

        <!-- Counter js  -->
        <script src="/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="/plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
		<script src="/plugins/morris/morris.min.js"></script>
		<script src="/plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="/assets/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="/assets/js/jquery.core.js"></script>
        <script src="/assets/js/jquery.app.js"></script>
        @yield('down')

    </body>
</html>