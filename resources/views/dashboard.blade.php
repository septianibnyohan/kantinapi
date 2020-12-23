@extends('sidemenu')

@section('content')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4>Dashboard</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="state-information d-none d-sm-block">
                    <div class="state-graph">
                        <div id="header-chart-1"></div>
                        <div class="info"></div>
                    </div>
                    <div class="state-graph">
                        <div id="header-chart-2"></div>
                        <div class="info"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-info">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-storefront   float-right"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16">New Stand</h6>
                            <h2 class="mb-4">10</h2>
                            <span class="badge badge-info"></span> <span class="ml-2">Data Stand Baru</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-success">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-store float-right"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16">Total Stand</h6>
                            <h2 class="mb-4">20</h2>
                            <span class="badge badge-danger"></span> <span class="ml-2">Data Semua Stand</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-account-plus-outline   float-right"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16">New User</h6>
                            <h2 class="mb-4">43</h2>
                            <span class="badge badge-warning"></span> <span class="ml-2">Data User Baru</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-warning">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-account-multiple-plus-outline  float-right"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16">Total User</h6>
                            <h2 class="mb-4">6</h2>
                            <span class="badge badge-info"></span> <span class="ml-2">Data Total User</span>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <!-- end row -->

      
      
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->

<!-- /Right-bar -->

<!-- Right bar overlay-->

<!-- JAVASCRIPT -->
<script src="{{ asset('') }}assets/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('') }}assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('') }}assets/libs/node-waves/waves.min.js"></script>
<script src="{{ asset('') }}assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

<!--Morris Chart-->
<script src="{{ asset('') }}assets/libs/morris.js/morris.min.js"></script>
<script src="{{ asset('') }}assets/libs/raphael/raphael.min.js"></script>

<script src="{{ asset('') }}assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="{{ asset('') }}assets/js/app.js"></script>

@endsection