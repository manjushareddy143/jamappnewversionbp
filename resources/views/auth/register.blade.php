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
    <link href="css/ruang-admin.css" rel="stylesheet" type="text/css">

</head>
<body class="bg-gradient-login">
<!-- Service Provider Sign-Up Content -->
<div class="container-login service-provider-sign-up">
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
                                    <h1 class="h4 text-gray-900 mb-4">Service Provider Sign-Up</h1>
                                </div>
                                <div class="service-provider-tab">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item first-tab">
                                            <a class="nav-link active" id="individual-tab" data-toggle="tab" href="#individual" role="tab"
                                               aria-controls="home" aria-selected="true">
                                                <i class="fas fa-user"></i> For Individual</a>
                                        </li>
                                        <li class="nav-item second-tab">
                                            <a class="nav-link" id="organization-tab" data-toggle="tab" href="#organization" role="tab"
                                               aria-controls="profile" aria-selected="false">
                                                <i class="fas fa-users"></i> For Organization <br/></a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">

                                        <div class="tab-pane fade show active" id="individual" role="tabpanel"
                                             aria-labelledby="individual-tab">
                                            <form id="form">
                                                <div class="form-group">
                                                    <label>First Name <strong>*</strong></label>
                                                    <input type="text" class="form-control"
                                                           id="first_name" placeholder="Enter Your First Name" required>
                                                </div>  
                                                <div class="form-group">
                                                    <label>Last Name <strong>*</strong></label>
                                                    <input type="text" class="form-control"
                                                           id="last_name" placeholder="Enter Your Last Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Mobile Number <strong>*</strong></label>
                                                    <input type="text" class="form-control"
                                                           id="mobile" placeholder="Enter Mobile Number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email Address <strong>*</strong></label>
                                                    <input type="email" class="form-control"
                                                           id="email" aria-describedby="emailHelp"
                                                           placeholder="Enter Your Email Address" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password<strong>*</strong></label>
                                                    <input type="password" class="form-control"
                                                           id="password" aria-describedby="passwordHelp"
                                                           placeholder="Enter Your Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Resident Status <strong>*</strong></label>
                                                    <select class="form-control" id="select1">
                                                        <option>Select Country</option>
                                                        <option>India</option>
                                                        <option>Bangladesh</option>
                                                        <option>Australia</option>
                                                        <option>USA</option>
                                                        <option>Afghanistan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group register-rc-button">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="terms" name="terms">
                                                        <label class="custom-control-label" for="terms">
                                                            Vendor Consent to <a href="http://www.savitriya.com/privacy-policy/"
                                                                                 target="_blank">
                                                                Terms & Conditions</a>
                                                        </label>
                                                    </div>
                                                </div>
                                                <br>
                                                <p id="termErr" style="color: red"></p>
{{--                                                <div class="form-group">--}}
{{--                                                    <div class="upload-photo">--}}
{{--                                                        <a href="#">--}}
{{--                                                            <span><i class="fas fa-camera"></i></span>--}}
{{--                                                            <p>Upload A Photo</p>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                                <div class="form-group">
                                                    <button type="button"
                                                            class="btn btn-primary btn-block"
                                                            id="singupbtn"
                                                            onclick="registerIndividuals()">Sign Up</button>
{{--                                                    mobileSignup--}}

                                                </div>
                                            </form>

                <!-- OTP FORM -->



                                        </div>
                                        @if(Session::has('laravel_session'))
                                            <div class="inspire">
                                                { { session('laravel_session', '') } }
                                            </div>
                                        @endif

                                        <div class="tab-pane fade" id="organization" role="tabpanel"
                                             aria-labelledby="organization-tab">
                                            <span>Proprietorship Firm / Partnership Firm / Company / Business Establishment</span>
                                            <form action="#">
                                                <div class="form-group">
                                                    <label>Name <strong>*</strong></label>
                                                    <input type="text" class="form-control" id="first_name" placeholder="Enter Your Name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mobile Number <strong>*</strong></label>
                                                    <input type="text" class="form-control" id="mobile" placeholder="Enter Number">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email Address <strong>*</strong></label>
                                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                                           placeholder="Enter Your Email Address">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Resident Status <strong>*</strong></label>
                                                    <select class="form-control" id="select1">
                                                        <option>Select Country</option>
                                                        <option>India</option>
                                                        <option>Bangladesh</option>
                                                        <option>Australia</option>
                                                        <option>USA</option>
                                                        <option>Afghanistan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group register-rc-button">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                        <label class="custom-control-label" for="customCheck2">Vendor Consent to Terms & Conditions</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="upload-photo">
                                                        <a href="#">
                                                            <span><i class="fas fa-camera"></i></span>
                                                            <p>Upload A Photo</p>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block"
                                                            data-toggle="modal" id="#myBtn" data-target="#exampleModal">
                                                        Sign Up</button>
                                                </div>
                                            </form>
                                        </div>

                                        <p data-toggle="modal" id="#showdailog" data-target="#exampleModal"></p>

                                        <!-- OTP FORM -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">OTP Verification</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">X</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="#" class="form-container">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="otpinput" placeholder="Enter OTP">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary" onclick="mobileOTPVerify()">Send OTP</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Provider Sign-Up Content -->

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/ruang-admin.min.js') }}"></script>
</body>
</html>

<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-app.js"></script>

<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-analytics.js"></script>

<!-- Add Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-firestore.js"></script>
<script>
    window.onload = function() {
        var firebaseConfig = {
            apiKey: "AIzaSyAByZ6mHqPhd1Pl3KHcUiXJSQ-8EGOW-6s",
            authDomain: "jamqatar-bf1c1.firebaseapp.com",
            databaseURL: "https://jamqatar-bf1c1.firebaseio.com",
            projectId: "jamqatar-bf1c1",
            storageBucket: "jamqatar-bf1c1.appspot.com",
            messagingSenderId: "    ",
            appId: "1:429814769026:web:5790f80f8fb2a30a675b9b",
            measurementId: "G-CJ5BZCGH6X"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();

        firebase.auth().useDeviceLanguage();

        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('singupbtn', {
            'size': 'invisible',
            'callback': function(response) {
                console.log("response ===" + response);
            }
        });
    };

    function mobileSignup() {
        console.log("mobileSignup");
        if(!form.terms.checked) {
            form.terms.focus();
            document.getElementById("termErr").innerHTML = "Please accept terms conditions";
        } else {
            document.getElementById("termErr").innerHTML = "";
            // Phone NUMBER
            var phoneNumber = document.getElementById("mobile").value;
            var appVerifier = window.recaptchaVerifier;
            firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                .then(function (confirmationResult) {
                    console.log("confirmationResult == " + JSON.stringify(confirmationResult));
                    // SMS sent. Prompt user to type the code from the message, then sign the
                    // user in with confirmationResult.confirm(code).
                    window.confirmationResult = confirmationResult;
                    $("#exampleModal").modal()

                }).catch(function (error) {
                console.log("error  == " + error);
                // Error; SMS not sent
                // ...
            });
        }
    }

    function mobileOTPVerify() {
        var code = document.getElementById("otpinput").value;
        console.log("on submit call" + code);
        confirmationResult.confirm(code).then(function (result) {
            // User signed in successfully.
            console.log("otp result =" + JSON.stringify(result));
            var user = result.user;
            registerIndividuals();
            // ...
        }).catch(function (error) {
            console.log("otp err =" + JSON.stringify(error));
            // User couldn't sign in (bad verification code?)
            // ...
        });
    }

    function registerIndividuals() {

        var x = document.getElementById("select1").selectedIndex;
        $.ajax({
            type: "POST",
            url: '/register',
            data: {
                first_name: document.getElementById("first_name").value,
                last_name: document.getElementById("last_name").value,
                contact: document.getElementById("mobile").value,
                password: document.getElementById("password").value,
                email: document.getElementById("email").value,
                resident_country: document.getElementsByTagName("option")[x].value,
                type_id : 2,
                term_id : 2
            }
        }).done(function( response ) {
            $("#exampleModal").modal("hide");
            console.log(response);


// Put the object into storage
            localStorage.setItem('userObject', JSON.stringify(response));

// Retrieve the object from storage
//             var retrievedObject = localStorage.getItem('userObject');


            window.location = '/home';
        });
    }

    function registerOrganisation() {
        console.log("789");
    }

    function closeForm() {
        document.getElementById("popupForm").style.display="none";
    }
</script>

