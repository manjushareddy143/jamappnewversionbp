@extends('layouts.app')
    <!DOCTYPE html>
<html lang="en">
<head>

    <style>
        #spinner {
            display: none;
        }

        body.busy .spinner {
            display: block !important;
        }

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="toast" style="margin-left: auto; margin-right: 5px;
margin-top: 9px; position: absolute; top: 0; right: 0;">
    <div class="toast-header" style="color:red;"> Error </div>
    <div class="toast-body" style="color:red;"> msgStr </div>
 </div>
<body class="bg-gradient-login">

<!-- Login Content -->
<div class="container-login">


    <div class="row justify-content-center">
        <div class="col-xl-11 col-lg-12 col-md-9">

            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                <!--div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    </div>
                </div-->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Language Dropdown -->
{{--                            <div class="dropdown">--}}
{{--                                <button class="dropbtn">Language</button>--}}
{{--                                <div class="dropdown-content">--}}
{{--                                 <option value="english"><a href="locale/en">--}}
{{--                                <img src="{{asset('img/en.png')}}" alt="" style="width: 20px;height: 10px;">English</a></option>--}}
{{--                    <a href="locale/ar"><img src="{{asset('img/ar.png')}}" alt="" style="width: 20px;height: 10px;"> Arabic</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="dropdown custom" style="margin: 25px 0px 0px 40px;">
                                <button class="dropbtn">
                                    <img id="langFlag" alt="" style="width: 30px;height: 20px;">
                                </button>
                                <div class="dropdown-content">
                                    {{--                                 <option value="english"><a href="locale/en">--}}
                                    {{--                                <img src="{{asset('img/en.png')}}" alt="" style="width: 20px;height: 10px;">English</a>--}}
                                    {{--                                 </option>--}}
                                    <a href="locale/en" onclick="langChange('en')"><img src="{{asset('img/en.png')}}" alt="" style="width: 20px;height: 10px;"> English</a>
                                    <a href="locale/ar" onclick="langChange('ar')"><img src="{{asset('img/ar.png')}}" alt="" style="width: 20px;height: 10px;"> Arabic</a>
                                </div>
                            </div>
                            <!-- Language Dropdown -->
                            <div class="login-form">
                                <div class="text-center">
                                    <div class="loginlogo">
                                        <img src="{{ asset('img/logo/jam-logo.png') }}">
                                    </div>


                                    <h1 class="h4 text-gray-900 mb-4">@lang('login.message')</h1>
                                </div>

                                <form id="loginForm" method="POST" action="{{ route('login') }}">

                                    @csrf

                                    <div class="form-group">
                                        <label>@lang('login.label_name')</label>
                                        {{--                                                        <input type="email"--}}
                                        {{--                                                               class="form-control @error('email') is-invalid @enderror"--}}
                                        {{--                                                               id="email" aria-describedby="emailHelp"--}}
                                        {{--                                                               placeholder="Email or Username">--}}
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
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
                                        <label>@lang('login.label_pass')</label>
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 f-left paddingnone">
                                            <div class="custom-control custom-checkbox small"
                                                 style="line-height: 1.5rem;">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label lightlabel" for="customCheck">Remember</label>
                                            </div>
                                        </div>


                                        <div class="col-md-6 f-left paddingnone">
                                            <a href="#" class="forgot-password" style="color: #f79548;" data-toggle="modal" data-target="#exampleModal" id="#myBtn">Forgot
                                                Password?</a>
                                        </div>

                                    </div>
                                    <button id="submit" type="button" onclick="doLogin()"
                                            class="btn btn-primary btn-block btn-box-shadow">
                                        <label>@lang('login.label_btn')</label>
                                    </button>
                                </form>
                                <hr>

                                <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Find Your Account</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- <p>You Content</p> -->
                <form name="fpform" id="fpmain">
                    <div class="form-group" id="femail">
                        <label>Email <strong>*</strong></label>
                        <input id="fpemail" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                  </div>
                    <h6 style="text-align: center;">OR</h6>
                    <div class="form-group" id="fmobile">
                        <label>Mobile <strong>*</strong></label>
                        <input type="text" nam="contact" class="form-control" id="contact" placeholder="Enter Mobile Number">
                    </div>
                </form>

                <form id="newpass" name="cpform">
                    <div class="form-group" id="new_pass">
                        <label id="lbl_pass">New Password <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                        <input type="password" class="form-control" id="forget_pass" aria-describedby="passwordHelp" placeholder="Enter New password" required>
                    </div>
                    <!-- <h6 style="text-align: center;">OR</h6> -->

                    <div class="form-group" id="con_pass">
                        <label id="lbl_pass">Confirm Password <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                        <input type="password" class="form-control" id="confirm_pass" aria-describedby="passwordHelp" placeholder="Enter Confirm password" required>
                    </div>

                </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" id="fpSubmit" class="btn btn-primary" onclick="changePass()">Submit</button>
                </div>
              </div>
            </div>
          </div>

          <!-- password -->
            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Find Your Account</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- <p>You Content</p> -->

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" id="fpSubmit" class="btn btn-primary" onclick="changePass()">Submit</button>
                </div>
              </div>
            </div>
          </div> --}}
          <!-- password -->

                     <!-- Modal -->

                                <div class="text-center login-signin">
                                    Don't have an account? <a class="font-weight-bold small"
                                                                href="/register" style="color: #f79548;">Sign Up</a>
                                </div>

                                <div class="text-center social-btn">
                                    <a href="#" class="btn btn-danger btn-block" onclick="gmailLogin()">
                                        <i class="fa fa-google"></i>
                                        Sign in with <b>Google</b>
                                    </a>

                                    <a href="#" class="btn btn-primary btn-block" onclick="facebookLogin()"
                                       style="background-color: #337ab7;border: none;">
                                        <i class="fa fa-facebook"></i>
                                        Sign in with <b>Facebook</b>
                                    </a>
                                </div>

                                <div id="errorAlert" class="alert alert-danger" role="alert"
                                     style="background-color: #f1110a;">
                                    <p id="errormsg">Unknow Error from Server side!</p>
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



<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-app.js"></script>
<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-analytics.js"></script>
<!-- Add Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-firestore.js"></script>

<script>
    window.addEventListener ?
        window.addEventListener("load", onLoad(), false) :
        window.attachEvent && window.attachEvent("onload", onLoad());
    var selectedLang;
    function langChange(lang) {
        console.log(lang);
        selectedLang = lang;
        if(lang == "en") {
            $('#langFlag').attr("src", '{{ URL::asset('/img/en.png') }}')
            localStorage.setItem('langauge', 'en');
        } else {
            $('#langFlag').attr("src", '{{ URL::asset('/img/ar.png') }}')
            localStorage.setItem('langauge', 'ar');
        }
    }

    function onLoad() {
        $("#newpass").hide();
        localStorage.removeItem('userObject')

        $("#errorAlert").hide();

        var language = localStorage.getItem('langauge');
        if(language == null) {
            $('#langFlag').attr("src", '{{ URL::asset('/img/en.png') }}')
        } else {
            if(language == "en") {
                $('#langFlag').attr("src", '{{ URL::asset('/img/en.png') }}')
            } else {
                $('#langFlag').attr("src", '{{ URL::asset('/img/ar.png') }}')
            }
        }

        var firebaseConfig = {
            apiKey: "AIzaSyACBAWeNcM3zgpPlDbODAH85wWW8uKhcjk",
            authDomain: "jamapp-91b4a.firebaseapp.com",
            databaseURL: "https://jamapp-91b4a.firebaseapp.com",
            projectId: "jamapp-91b4a",
            storageBucket: "jamapp-91b4a.appspot.com",
            messagingSenderId: "260673698724",
            appId: "1:260673698724:web:833043fcc13f954689df31",
            measurementId: "G-XNV3837926"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();

        firebase.auth().useDeviceLanguage();
    };
    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

    function facebookLogin() {
        console.log("FACEBOOK LOGIN");
        var provider = new firebase.auth.FacebookAuthProvider();
        provider.addScope('public_profile');
        provider.addScope('email');
        provider.setCustomParameters({
            'display': 'popup'
        });
        firebase.auth().signInWithPopup(provider).then(function(result) {
            // This gives you a Facebook Access Token. You can use it to access the Facebook API.
            var token = result.credential.accessToken;
            // The signed-in user info.
            var user = result.user.providerData;
            console.log("FB user :: " + JSON.stringify(user));
            // var userName = user.displayName.split(" ");
            var data =
                {
                    email: user[0].email,
                    password: user[0].uid,
                    image: user[0].picture,
                    first_name: user[0].displayName,
                    last_name: user[0].displayName,
                    social_signin: "facebook",
                };
            console.log(data);
            socialSigin(data);
            console.log("FB result :: " + JSON.stringify(result));
            // ...
        }).catch(function(error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            // The email of the user's account used.
            var email = error.email;
            // The firebase.auth.AuthCredential type that was used.
            var credential = error.credential;
            // ...
        });


    }

    function gmailLogin(){
        console.log("GMAIL LOGIN");
        var provider = new firebase.auth.GoogleAuthProvider();
        provider.addScope('profile');
        provider.addScope('email');

        // provider.addScope('https://www.googleapis.com/auth/contacts.readonly');
        // provider.addScope('currentUser');

        firebase.auth().signInWithPopup(provider).then(function(result) {
            // This gives you a Google Access Token. You can use it to access the Google API.
            var token = result.credential.accessToken;
            // The signed-in user info.
            var user = result.additionalUserInfo.profile;
            console.log("user" + JSON.stringify(user));
            var data =
                {
                    email: user.email,
                    password: user.id,
                    image: user.picture,
                    first_name: user.given_name,
                    last_name: user.family_name,
                    social_signin: 'gmail',
                };
            console.log(data);
            socialSigin(data);

        }).catch(function(error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            // The email of the user's account used.
            var email = error.email;
            // The firebase.auth.AuthCredential type that was used.
            var credential = error.credential;
            console.log(errorCode);
        });

    }


    var cPass = 0;
    var forgetPassId;
    function changePass(){


        var forPassvalidate = forgotPass_validate();
        // var forconfirmvalidate = confirmPass_validate();
        console.log(forPassvalidate);
        console.log(cPass);
        if(forPassvalidate != false)
        {
            // ajax
            if(cPass == 0) {
                var data;
                if(forPassvalidate == "email") {
                    data = {
                        "email" : document.forms["fpform"]["email"].value
                    }
                } else {
                    data = {
                        "contact" : document.forms["fpform"]["contact"].value
                    }
                }
                // ajax response user get
                $.ajax({
                    type: 'POST',
                    url: '/resetPassword',
                    data: data,
                    success: function (response) {
                        console.log("SUCCESS" + JSON.stringify(response));
                        forgetPassId = response['id'];
                        // console.log(response);
                        if (forgetPassId != null) {
                            console.log(data);
                            $("#newpass").show();
                            $("#fpmain").hide();
                            cPass = 1;

                        } else {
                            alert("Invalid email Id");
                        }
                    },
                    error: function () {
                        console.log();
                        if(status == 401) {
                            $("#errormsg").text("Invalid Email Id");
                        } else {
                            $("#errormsg").text("success");

                        }
                    },
                });

            } else {
                // change pass ajax

                $.ajax({
                    type: 'POST',
                    url: '/changepassword',
                    data: {
                        id:forgetPassId,
                        password: $('#forget_pass').val()
                    },
                    success: function (response) {
                        console.log("SUCCESS" + JSON.stringify(response));

                        // // console.log(response);
                        if (response != null) {
                            var result = response['status'];
                            console.log(result);
                            if(result == true) {
                                $("#exampleModal").hide();
                            } else {
                                $("#fpmain").show();
                                $("#newpass").hide();
                            }
                        } else {
                            alert("Invalid email Id");
                        }
                        location.reload();
                    },
                    error: function ()
                    {
                        console.log();
                        if(status == 401) {
                            $("#errormsg").text("Invalid Email Id");
                        } else {
                            $("#errormsg").text("success");
                        }
                    },
                });
            }

        }


        }




    // Forgot Password validation Function
    function forgotPass_validate() {
             var txtEmail = document.forms["fpform"]["email"].value;
             console.log(txtEmail);
             var txtContact = document.forms["fpform"]["contact"].value;
             console.log(txtContact);

            if(txtEmail == "" && txtContact == "") {
                // alert("Please Fill One Required Field");
                 $('#fmobile').next('div.red').remove();
                    $('#fmobile').after('<div class="red" style="color:red">Please Fill One Required Field</div>');
              return false;
            } else if(txtEmail != "" && txtContact != "")  {
                // alert("Please Fill Only One Required Field");
                $('#fmobile').next('div.red').remove();
                    $('#fmobile').after('<div class="red" style="color:red">Please Fill Only One Required Field</div>');
              return false;
            } else {
                if(txtEmail != "") {
                    return "email"
                }
                if(txtContact != "") {
                    return "contact"
                }
            }

        }


        //     function confirmPass_validate() {
        //      var txtPass = document.forms["cpform"]["npassword"].value;
        //      console.log(txtPass);
        //      var txtCpass = document.forms["cpform"]["cpassword"].value;
        //      console.log(txtCpass);

        //     if(txtPass == txtCpass) {
        //         // alert("Please Fill One Required Field");
        //          $('#con_pass').next('div.red').remove();
        //             $('#con_pass').after('<div class="red" style="color:red">Password Match</div>');
        //       return false;
        //     } else if(txtPass !=  txtCpass)  {
        //         // alert("Please Fill Only One Required Field");
        //         $('#con_pass').next('div.red').remove();
        //             $('#con_pass').after('<div class="red" style="color:red">Password Does Not Match</div>');
        //       return false;
        //     } else {
        //         if(txtPass != "") {
        //             return "password"
        //         }
        //         if(txtCpass != "") {
        //             return "Confirm Password"
        //         }
        //     }

        // }


    function login_validate() {

        var isValidate = true;

        if (document.getElementById("email").value == "") {
            // EXPAND ADDRESS FORM
            $("#email").focus();
            $("#email").blur(function () {
                if ($('#email').val().length == 0) {
                    $('#email').next('div.red').remove();
                    $('#email').after('<div class="red" style="color:red">Email is Required</div>');
                    isValidate = false;
                } else {
                    if (!email_regex.test($('#email').val())) {
                        $('#email').next('div.red').remove();
                        $('#email').after('<div class="red" style="color:red">Email Format is Wrong</div>');
                        isValidate = false;
                    } else {
                        $(this).next('div.red').remove();
                        isValidate = true;
                    }
                }
            });
        } else {
            if (!email_regex.test($('#email').val())) {
                $('#email').next('div.red').remove();
                $('#email').after('<div class="red" style="color:red">Email Format is Wrong</div>');
                isValidate = false;
            } else {
                $(this).next('div.red').remove();
                isValidate = true;
            }
        }


        if (document.getElementById("password").value == "") {
            $("#password").focus();
            $("#password").blur(function () {
                if ($('#password').val().length == 0) {
                    $('#password').next('div.red').remove();
                    $('#password').after('<div class="red" style="color:red">Password is Required</div>');
                    isValidate = false;
                } else {
                    $(this).next('div.red').remove();
                    isValidate = true;
                }
            });
        }
        return isValidate;
    }

    function socialSigin(data) {


        $.ajax({
            type: 'POST',
            url: '/socialSignin',
            data: data,
            success: function (response) {
                console.log("SUCCESS");
                var data = response['status'];
                console.log(response);
                if (data === true) {
                    console.log("test" + JSON.stringify(response));
                    localStorage.setItem('userObject', JSON.stringify(response));
                    window.location = '/home';
                } else {
                    alert("Invalid email or password");
                }
            },
            error: function (xhr, status, err) {
                console.log(xhr.statusText + "xhr.statusText");
                if(xhr.status == 401) {
                    $("#errormsg").text("Invalid Email or Password");
                } else {
                    $("#errormsg").text(xhr.statusText);
                }

                $("#errorAlert").show();
                setTimeout(function () {
                    $("#errorAlert").hide()
                }, 1000);
            },
        });
    }

    function doLogin() {
        console.log("login_validate");
        var loginvalidate = login_validate();
        console.log("login_validate ::" + loginvalidate);
        if (loginvalidate == true) {
            console.log("CREATE SERVER CALL");
            $('body').addClass('busy');
            var data =
                {
                    email: $("#email").val(),
                    password: $("#password").val(),
                    _token: $("input[name=_token]").val()
                };
            $.ajax({
                type: 'POST',
                url: '/login',
                data: data,
                success: function (response) {
                    console.log("SUCCESS");
                    var data = response['status'];
                    //console.log(data);
                    if (data === true) {
                        console.log("test" + JSON.stringify(response));
                        localStorage.setItem('userObject', JSON.stringify(response));
                        window.location = '/home';
                    } else {
                        alert("Invalid email or password");
                    }
                },
                error: function (xhr){
                    console.log("errp = " + JSON.stringify(xhr));
                    if(xhr['status'] == 401) {
                        var errorArray = xhr['responseJSON'];
                        var msgStr = "Unauthorised user";
                        $.each(errorArray, function (i, err) {
                            $.each(err, function (title, msg) {
                                msgStr += msg.toString() + "\n";
                            });
                        });
                        $('.toast-body').text(msgStr);
                        $('.toast').toast({delay:2000, animation:false});
                        $('.toast').toast('show');

                    }
                },
                // error: function (xhr, status, err) {
                //     console.log(xhr.statusText + "xhr.statusText");
                //     if(xhr.status == 401) {
                //         $("#errormsg").text("Invalid Email or Password");
                //     } else {
                //         $("#errormsg").text(xhr.statusText);
                //     }

                //     $("#errorAlert").show();
                //     setTimeout(function () {
                //         $("#errorAlert").hide()
                //     }, 1000);
                // },
            });
        }
    }

</script>
</body>
</html>


<style>
    .dropbtn {
        background-color: #0aa69800;
        color: white;
        padding: 4px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropdown {
        position: relative;
        display: inline-block;
        margin-right: 100px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
</style>






