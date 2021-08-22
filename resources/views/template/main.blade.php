@php
    use Illuminate\Support\Facades\Route;
@endphp


<!DOCTYPE html>
<html lang="en">

<head>
    {{-- header --}}

    @include('template.header')
    @yield('new-style')

    <title>CoinDash - Cryptocurrency Dashboard Admin Template</title>
</head>

<body class="header-fix fix-sidebar">
    
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a  href="/administrator">
                        <!-- Logo icon -->
                        <b><img src="{{ asset('template-dashboard') }}/images/logo_fotokopi.jpg" alt="homepage" width="50%" /></b>
                        
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link toggle-nav hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggle hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Messages -->
                        
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Comment -->
                        
                        <!-- End Comment -->
                        <!-- Messages -->
                        
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Admin</a>
                            <div class="dropdown-menu dropdown-menu-right animated slideInRight">
                                <ul class="dropdown-user">
                                    <li><a href="#"> Profile</a></li>
                                    
                                    <li><a href="#"> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->


        <!-- Left Sidebar  -->
        @include('template.sidebar')
        <!-- End Left Sidebar  -->
        
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                {{-- <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrator">{{ request()-> is('administrator') ? 'Home' : 'Option' }}</a></li>
                        <li class="breadcrumb-item active">{{ Route::currentRouteName(); }}</li>
                    </ol>
                </div> --}}
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">

                <!-- Start Page Content -->
                @yield('content')
                <!-- End PAge Content -->
                <!-- End Container fluid  -->
            </div>
            <!-- footer -->
            <footer class="footer"> ©2021 Fotokopi De Tjolomadoe. All Right Reserved.</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->




    @include('template.basic-script')
    @yield('basic-script')
    @yield('new-script')

</body>

</html>