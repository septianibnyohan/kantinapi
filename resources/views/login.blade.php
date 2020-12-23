<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Kantin Mikro | Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('') }}assets/images/logo.png"> 
   
    
    <!-- Bootstrap Css -->
    <link href="{{ asset('') }}assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('') }}assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <style type="text/css">
        #loadingProgress { position: fixed; width: 100%; height: 100%; top: 300px; right: 1%; }
        .ajax-loader { background: #fff; border-radius: 10px; opacity: 0.6; }
    </style>

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="{{ url('/') }}" class="logo logo-admin"><img src="{{ asset('') }}assets/images/logo.png"
                                        height="80" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Welcome Back !</h4>
                                <p class="text-muted text-center">Sign in to continue PayPazz Panel.</p>
                                <form id="frm_login" class="form-horizontal mt-4" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="No HP/Email" maxlength="100"  required>
                                         <span class="help-block with-errors"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword" name="userpassword" placeholder="Enter password" required>
                                         <span class="help-block with-errors"></span>
                                      
                                    </div>
                                    <div class="form-group row mt-4">
                                        <div class="col-6">
                                            <div class="custom-control custom-checkbox">
                                                
                                            </div>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <div id="loadingProgress" style="display: none;">
                                <img src="{{ asset('') }}images/ajax-loader.gif" class="ajax-loader">
                        </div>
                        <p>©2020 PayFazz</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('') }}assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('') }}assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('') }}assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('') }}assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- App js -->
    <script src="{{ asset('') }}assets/js/app.js"></script>

    <script type="text/javascript">
            
            $("#frm_login").submit(function(e){
                e.preventDefault();
                $("#loadingProgress").show();

                $.ajax({
                    url : "{{ url('proses_login') }}",
                    type : "POST",
                    data : new FormData($('form')[0]),
                    contentType:false,
                    processData:false,
                    success:function(data) {
                        $("#loadingProgress").hide();
                        if (data == true) {

                            Swal.fire({
                                type: 'success',
                                title: 'Login Berhasil!',
                                text: 'Anda akan di arahkan dalam 3 Detik',
                                timer: 3000,
                                showCancelButton: false,
                                showConfirmButton: false
                            })
                            .then (function() {
                                window.location.href = "{{ url('dashboard') }}";
                            });

                        } else if(data=='invalid') {

                            Swal.fire({
                                type: 'error',
                                title: 'Login Gagal!',
                                text: 'Invalid No Handphone/Email & Password!'
                            });

                        }
                    }
                });
            }); 

    </script>
</body>

</html>