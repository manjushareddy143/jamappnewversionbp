<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>JAM - Login</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
<!-- Login Content -->
<div class="container-login">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <div class="loginlogo">
                                        <img src="img/logo/jam-logo.png">
                                    </div>
                                    <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                                </div>
                                <form class="user" id="loginForm" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email or Username</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp"
                                               placeholder="Email or Username">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password"  class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">

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
                                            <a href="#" class="forgot-password">Forgot Password?</a>
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <a  class="btn btn-primary btn-block btn-box-shadow">Login</a>
                                    </div>

                                </form>
                                <hr>
                                <div class="text-center login-signin">
                                    Already have an account? <a class="font-weight-bold small" href="register.html">Sign In</a>
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
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/ruang-admin.min.js"></script>
</body>

</html>
