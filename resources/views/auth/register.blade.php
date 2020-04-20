@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>JAM - Register</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Register Content -->
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
                    <h1 class="h4 text-gray-900 mb-4">REGISTER</h1>
                  </div>
                  <form>
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter First Name">
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" class="form-control" id="exampleInputPasswordRepeat"
                        placeholder="Repeat Password">
                    </div>

                    <div class="form-group">
                      <label>Contact</label>
                      <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter First Name">
                    </div>

                     <div class="form-group">
                      <label for="exampleFormControlSelect1">Type</label>
                      <select class="form-control" id="exampleFormControlSelect1"  onchange="showfields()">
                        <option>Corporate Service Provider</option>
                        <option>Individual Service Provider</option>
                        <option>Admin</option>
                        <option>Individual Service Provider1</option>
                        <option>Individual Service Provider2</option>
                      </select>
                    </div>

                    <div class="form-group register-rc-button">
                      <label>Gender</label>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio3">Female</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio4">Male</label>
                      </div>

                    </div>

                      <div class="form-group register-rc-button">
                      <label>Languages Known</label>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">Arabic</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                        <label class="custom-control-label" for="customCheck3">English</label>
                      </div>

                    </div>
                      {{-- @v code for timing --}}
                    <div class="form-group" >
                      <label for="timing" >{{ __('Timing') }}</label>

                              <label for="inputMDEx1">Start time</label>
                              <input type="time" id="inputMDEx1" class="col-md-4 col-form-label text-md-right">
                              <br>
                              <label for="inputMDEx1">End time</label>
                              <input type="time" id="inputMDEx1" class="col-md-4 col-form-label text-md-right">

                    </div>


                    {{-- <div class="form-group">
                      <label>Timing</label>
                      <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter First Name">
                    </div> --}}

                        {{-- @v code dropdown lists of years & months for experience  --}}
                    <div class="form-group" >
                        <label >Experience</label>

                        <div class="col-md-6" >
                            <label for="experience"> Years </label>
                            {!! Form::selectYear('year', 0, 20) !!}
                            <br>
                            <label for="experience"> Months</label>
                            {!! Form::selectRange('number', 0, 12); !!}

                            {{-- <input id="experience" type="text" class="form-control " name="Experience"> --}}
                        </div>
                    </div>

                    {{-- <div class="form-group">
                      <label>Experience</label>
                      <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter First Name">
                    </div> --}}

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>

                  </form>
                  <hr>
                  <div class="text-center login-signin">
                    Already have an account? <a class="font-weight-bold small" href="login.html">Login</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>



@section('scriptsec')

<script>
    function showfields()
    {

        var selectbox = document.getElementById('exampleFormControlSelect1').value;
        // alert(selectbox);
        if (selectbox == "Individual service provider")
        {
           document.getElementById('info_field').style.display='block';
        }
        else
        {
            document.getElementById('info_field').style.display='none';
        }
        return ;
    }
    </script>

@endsection
