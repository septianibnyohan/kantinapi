@extends('master')

@section('sidemenu')
<!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Main</li>

                        <li>
                            <a href="{{ url('dashboard') }}" class="waves-effect">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-account-group"></i>
                                <span>Member</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ url('standlist') }}">Stand List</a></li>
                                <li><a href="{{ url('userlist') }}">User List</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-pinterest-box "></i>
                                <span>Product</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ url('customer') }}">Product List</a></li>
                                
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-bell "></i>
                                <span>Notification</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ url('wdata') }}">BroadCast</a></li>
                                <li><a href="{{ url('history') }}">Article</a></li>
                                <li><a href="{{ url('refund') }}">Inbox</a></li>
                                
                            </ul>
                        </li>

                         <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-check-box-multiple-outline  "></i>
                                <span>Active order</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ url('product') }}">Order List</a></li>
                               
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-shield-key  "></i>
                                <span>Verification</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ url('banner') }}">Extension Of The Rental Period</a></li>
                                <li><a href="{{ url('afiliasi') }}">Top Up Request</a></li>
                                <li><a href="{{ url('berita') }}">New Stand</a></li>
                               
                            </ul>
                        </li>

                         <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-folder-settings-variant "></i>
                                <span>Setting</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ url('product') }}">Setting</a></li>
                                
                            </ul>
                        </li>
                         <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-arrange-bring-forward  "></i>
                                <span>Report</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ url('product') }}">Sales Report</a></li>
                                <li><a href="{{ url('detail') }}">Rental History</a></li>
                            </ul>
                        </li>

                    
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
@endsection
