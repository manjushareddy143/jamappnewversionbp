@extends('layouts.app')
<!DOCTYPE html>
    <html lang="en">
        <head>

            <style>
                #spinner { display:none; }
                body.busy .spinner { display:block !important; }

            </style>
            <meta charset="utf-8">

            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <link href="{{ asset('img/logo/logo.png') }}" rel="icon">
            <title>JAM - Login</title>
            <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('css/ruang-admin.css') }}" rel="stylesheet">
        </head>

        <body class="bg-gradient-login">
            <!-- Login Content -->
            <div class="container-login">
                <div class="row justify-content-center">
                    <div class="col-xl-11 col-lg-12 col-md-9">
                        <div class="card shadow-sm my-5">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="login-form">
                                            <div class="text-center">
                                                <div class="loginlogo">
                                                    <img src="{{ asset('img/logo/jam-logo.png') }}">
                                                </div>
                                                <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                                            </div>

                                            <form id="loginForm" method="POST" action="{{ route('login') }}">

                                                @csrf

                                                <div class="form-group">
                                                    <label>Email or Username</label>
{{--                                                        <input type="email"--}}
{{--                                                               class="form-control @error('email') is-invalid @enderror"--}}
{{--                                                               id="email" aria-describedby="emailHelp"--}}
{{--                                                               placeholder="Email or Username">--}}
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                                           placeholder="Email or Username"
                                                           autofocus>

                                                    @error('email')

                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
{{--                                                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password">--}}
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                                           required autocomplete="current-password" placeholder="Password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 f-left paddingnone">
                                                        <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                                                <label class="custom-control-label lightlabel" for="customCheck">Remember</label>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 f-left paddingnone">
                                                        <a href="#" class="forgot-password" style="color: #f79548;">Forgot Password?</a>
                                                    </div>
                                                </div>

{{--                                                <div class="form-group row mb-0">--}}
{{--                                                    <div class="col-md-8 offset-md-4">--}}
                                                        <button id="submit" type="button" onclick="doLogin()" class="btn btn-primary btn-block btn-box-shadow">
                                                            {{ __('Login') }}
                                                        </button>

{{--                                                        @if (Route::has('password.request'))--}}
{{--                                                            <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                                                {{ __('Forgot Your Password?') }}--}}
{{--                                                            </a>--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="form-group">--}}
{{--                                                    <a class="btn btn-primary btn-block btn-box-shadow">Login</a>--}}
{{--                                                </div>--}}

                                            </form>
                                            <hr>
                                            <div class="text-center login-signin">
                                                Already have an account? <a class="font-weight-bold small"
                                                                            href="/register" style="color: #f79548;">Sign Up</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login Content -->
            <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
            <script src="{{ asset('js/ruang-admin.min.js') }}"></script>
            <script>
                function doLogin() {
                    $('body').addClass('busy');
                    var data = {
                        email: $("#email").val(),
                        password: $("#password").val(),
                        _token: $("input[name=_token]").val()
                    };
                    $.ajax({
                        type: 'POST',
                        url: '/login',
                        data:data,
                        success: function(response) {
                            console.log(response);
                            var test = response->status;
                            console.log(test);
                            if(response['status'] == true) {
                                window.location = '/home';
                            } else {


                            }
                          //
                        }
                    });
                }
            </script>
        </body>
    </html>
</html>




