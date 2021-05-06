<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Login</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('admin')}}/assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> -->
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('admin')}}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="{{asset('admin')}}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/assets/css/argon.css?v=1.2.0" type="text/css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/toastr/toastr.min.css">

</head>

<body class="bg-default">

    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-8">

            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header bg-transparent pb-0">
                            <div class="text-muted text-center mt-0 mb-0">
                                <h3>Selamat Datang</h3>
                            </div>
                            <!-- <div class="btn-wrapper text-center">
                        <a href="#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon"><img src="{{asset('admin')}}/assets/img/icons/common/github.svg"></span>
                            <span class="btn-inner--text">Github</span>
                        </a>
                        <a href="#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon"><img src="{{asset('admin')}}/assets/img/icons/common/google.svg"></span>
                            <span class="btn-inner--text">Google</span>
                        </a>
                    </div> -->
                        </div>

                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form" method="POST" action="{{url('post/login')}}">
                                {{ csrf_field() }}
                                <div class="form-group mb-2">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                        </div>
                                        <input name="username" class="form-control" autocomplete="" required placeholder="Username" type="text" value="{{ old('username') }}">
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input id="password" type="password" placeholder="Password" required class="form-control password" name="password" value="{{ old('password') }}">
                                        <!-- required autocomplete="new-password" -->

                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <select name="masuk_sebagai" class="form-control" id="masuk_sebagai" required>
                                            <option value="">-Login Sebagai-</option>
                                            <option value="admin">Admin</option>
                                            <option value="guru">Guru</option>
                                            <option value="siswa">Siswa</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                    <label class="custom-control-label" for=" customCheckLogin">
                                        <span class="text-muted">Tampilkan Password</span>
                                    </label>
                                </div>

                                <!-- /.col -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4"> Masuk <i class="fas fa-sign-in-alt"></i></button>
                                </div>
                                <!-- /.col -->

                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <!-- @if (Route::has('password.request'))
                        <div class="col-6">
                            <a href="{{ route('password.request') }}" class="text-light"><small>Lupa Password?</small></a>
                        </div>
                        @endif -->
                        <!-- <div class="col-6 text-right">
                    <a href="{{ url('/register') }}" class="text-light"><small>Registrasi Akun Baru</small></a>
                </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="py-5" id="footer-main">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">

                        &copy; 2021 <a href="" class="font-weight-bold ml-1" target="_blank">SW Developer</a>

                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">

                        <li class="nav-item">

                            <a href="" class="nav-link" target="_blank">Blog</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank">Version 1</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{asset('admin')}}/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{asset('admin')}}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('admin')}}/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{asset('admin')}}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="{{asset('admin')}}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="{{asset('admin')}}/assets/js/argon.js?v=1.2.0"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.custom-control-input').click(function() {
                if ($(this).is(':checked')) {
                    $('.password').attr('type', 'text');
                } else {
                    $('.password').attr('type', 'password');
                }
            });
        });
        $(document).ready(function() {
            $("#search").keyup(function() {
                var str = $("#search").val();
                if (str == "") {
                    $("#mydata").html("<b> search again..</b>");
                } else {
                    $.get("{{ url('/buku/search?id=') }}" + str, function(data) {
                        $("#mydata").html(data);
                    });
                }
            });
        });
        $(function() {

            $(document).ready(function() {
                var flash = "{{ Session::has('sukses') }}";
                if (flash) {
                    var pesan = "{{ Session::get('sukses') }}"
                    swal("Sukses", pesan, "success");
                }

                var gagal = "{{ Session::has('gagal') }}";
                if (gagal) {
                    var pesan = "{{ Session::get('gagal') }}"
                    swal("Error", pesan, "error");
                }

                var peringatan = "{{ Session::has('peringatan') }}";
                if (peringatan) {
                    var pesan = "{{ Session::get('peringatan') }}"
                    swal("Warning", pesan, "warning");
                }
                var info = "{{ Session::has('info') }}";
                if (info) {
                    var pesan = "{{ Session::get('info') }}"
                    swal("Info", pesan, "info");
                }
            });
        })
    </script>
</body>

</html>