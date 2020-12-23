<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Kantin Mikro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('') }}assets/images/logo.png">
    

    <!-- Bootstrap Css -->
    <link href="{{ asset('') }}assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('') }}assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('') }}assets/libs/chartist/chartist.min.css" rel="stylesheet">
    <link href="{{asset('') }}assets/multiselect/css/multi-select.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.bootstrap4.min.css" rel="stylesheet"> 
     
    <style type="text/css">
        #loadingProgress { position: fixed; width: 100%; height: 100%; top: 300px; left: 50%; z-index: 9999; }
        .ajax-loader { background: #fff; border-radius: 10px; opacity: 0.6; }

        .warna {
            background-color: #F0F8FF ;
        }

        .help-block {
            color:red;
        }

        input:invalid {
            border-color: red;
            color:red;
        }

        input, 
        input:valid {
            border-color: #ccc;
        }


        #content_table .fix-col {
            border-left: solid 1px rgb(75, 90, 102);
            border-right: solid 1px rgb(75, 90, 102);
            left: 0;
            position: absolute;
            top: auto;
            width: 110px;
        }

    </style>

</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{'dashboard'}}" class="logo logo-dark">
                            <span class="logo-sm">
                               <span style="color:#fff">KANTIN MIKRO</span>
                            </span>
                            <span class="logo-lg">
                                <span style="color:#fff">KANTIN MIKRO</span>
                            </span>
                        </a>

                        <a href="{{'dashboard'}}" class="logo logo-light">
                            <span class="logo-sm">
                               <span style="color:#fff">KANTIN MIKRO</span>
                            </span>
                            <span class="logo-lg">
                               <span style="color:#fff">KANTIN MIKRO</span>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                   
                </div>

                <div class="d-flex">

                     

                    <div class="dropdown d-inline-block d-lg-none ml-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-search-dropdown">
                    
                           
                        </div>
                    </div>

            

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>{{ Session::get('shop_name') }}&nbsp;&nbsp;&nbsp;</strong>
                            <img class="rounded-circle header-profile-user" src="{{ asset('') }}assets/images/users/user-4.jpg"
                                alt="Header Avatar">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a class="dropdown-item text-danger" href="{{ url('logout') }}"><i class="mdi mdi-power font-size-17 text-muted align-middle mr-1 text-danger"></i> Logout</a>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="mdi mdi-spin mdi-settings"></i>
                        </button>
                    </div>
            
                </div>
            </div>
        </header>
        
        @yield('sidemenu')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="main-content">
        @yield('content')
        <div id="loadingProgress" style="display: none">
                <img src="{{ asset('') }}images/ajax-loader.gif" class="ajax-loader">
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        © 2019 - <script>document.write(new Date().getFullYear())</script> Kantin Mikro <span class="d-none d-sm-inline-block"></span>
                    </div>
                </div>
            </div>
        </footer>
        <div class="rightbar-overlay"></div> 

</body>

</html>