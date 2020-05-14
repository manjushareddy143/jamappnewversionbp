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
                                            <div class="text-center login-signin">
                                                Already have an account? <a class="font-weight-bold small"
                                                                            href="/login" style="color: #f79548;">Login</a>
                                            </div>
                                        </div>

                                        @if(Session::has('laravel_session'))
                                            <div class="inspire">
                                                { { session('laravel_session', '') } }
                                            </div>
                                        @endif


                                        <div class="tab-pane fade" id="organization" role="tabpanel"
                                             aria-labelledby="organization-tab">
                                            <span>Proprietorship Firm / Partnership Firm / Company / Business Establishment</span>
                                            <form id="org_form">
                                                <div class="form-group">
                                                    <label>Company Name <strong>*</strong></label>
                                                    <input type="text" class="form-control" id="org_company_name" placeholder="Enter Your Company Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Admin Name <strong>*</strong></label>
                                                    <input type="text" class="form-control" id="org_name" placeholder="Enter Your Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Mobile Number <strong>*</strong></label>
                                                    <input type="text" class="form-control" id="org_mobile" placeholder="Enter Number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email Address <strong>*</strong></label>
                                                    <input type="email" class="form-control" id="org_email" aria-describedby="emailHelp"
                                                           placeholder="Enter Your Email Address" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password<strong>*</strong></label>
                                                    <input type="password" class="form-control"
                                                           id="org_password" aria-describedby="passwordHelp"
                                                           placeholder="Enter Your Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Country <strong>*</strong></label>
                                                    <select class="form-control" id="org_select_country" required>
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
                                                        <input type="checkbox" class="custom-control-input" id="org_checkbox" required>
                                                        <label class="custom-control-label" for="org_checkbox">Vendor Consent to <a href="http://www.savitriya.com/privacy-policy/"
                                                            target="_blank">Terms & Conditions</a></label>
                                                    </div>

                                                </div>
                                                <p id="myError"></p>

                                                <div class="form-group">
                                                    <button type="button" class="btn btn-primary btn-block"
                                                            data-toggle="modal" id="#myBtn" onclick="registerOrganisation()">
                                                        Sign Up</button>
                                                </div>
                                            </form>
                                            <div class="text-center login-signin">
                                                Already have an account? <a class="font-weight-bold small"
                                                                            href="/login" style="color: #f79548;">Login</a>
                                            </div>
                                        </div>

                                        <div>

                                        </div>

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
                type_id : 3,
                term_id : 2
            }
        }).done(function( response ) {
            $("#exampleModal").modal("hide");
            console.log(response);
            // Put the object into storage
            localStorage.setItem('userObject', JSON.stringify(response));
            window.location = '/home';
        });
    }

    function organisation_validate() {
         console.log("organisation_validate");
         if(document.getElementById("org_company_name").value == "" ) {
             // EXPAND ADDRESS FORM
            $("#org_company_name").focus();
            $("#org_company_name").focus();
            $("#org_company_name").blur(function ()
            {
                var name = $('#org_company_name').val();
                if (name.length == 0)
                {
                    $('#org_company_name').next('div.red').remove();
                    $('#org_company_name').after('<div class="red" style="color:red">Company Name is Required</div>');
                }
                else
                {
                    $(this).next('div.red').remove();
                    return true;
                }
            });
         }
         //var admin_name = $('#admin_name')[0].files[0];
         if (document.getElementById("org_name").value == "") {
            $("#org_name").focus();
            $("#org_name").focus();
            $("#org_name").blur(function ()
            {
                var name = $('#org_name').val();
                if (name.length == 0)
                {
                    $('#org_name').next('div.red').remove();
                    $('#org_name').after('<div class="red" style="color:red">Admin Name is Required</div>');
                }
                else
                {
                    $(this).next('div.red').remove();
                    return true;
                }
            });
         }
         //var mobilenum = $('#mobile')[0].files[0];
         if (document.getElementById("org_mobile").value == "") {
            $("#org_mobile").focus();
            $("#org_mobile").focus();
            $("#org_mobile").blur(function ()
            {
                var name = $('#org_mobile').val();
                if (name.length == 0)
                {
                    $('#org_mobile').next('div.red').remove();
                    $('#org_mobile').after('<div class="red" style="color:red">Mobile number is Required</div>');
                }
                else
                {
                    $(this).next('div.red').remove();
                    return true;
                }
            });
         }
        //  var email = $('#email')[0].files[0];
         if(document.getElementById("org_email").value == "") {
            $("#org_email").focus();
            $("#org_email").focus();
            $("#org_email").blur(function ()
            {
                var name = $('#org_email').val();
                if (name.length == 0)
                {
                    $('#org_email').next('div.red').remove();
                    $('#org_email').after('<div class="red" style="color:red">Email is Required</div>');
                }
                else
                {
                    $(this).next('div.red').remove();
                    return true;
                }
            });
         }

         if(document.getElementById("org_password").value == "") {
            $("#org_password").focus();
            $("#org_password").focus();
            $("#org_password").blur(function ()
            {
                var name = $('#org_password').val();
                if (name.length == 0)
                {
                    $('#org_password').next('div.red').remove();
                    $('#org_password').after('<div class="red" style="color:red">Password is Required</div>');
                }
                else
                {
                    $(this).next('div.red').remove();
                    return true;
                }
            });
         }
         //var Country = $('#select1')[0].files[0];
         if(document.getElementById("org_select_country").value == "") {
            $("#org_select_country").focus();
            $("#org_select_country").focus();
            $("#org_select_country").blur(function ()
            {
                var name = $('#org_select_country').val();
                if (name.length == 0)
                {
                    $('#org_select_country').next('div.red').remove();
                    $('#org_select_country').after('<div class="red" style="color:red">Country is Required</div>');
                }
                else
                {
                    $(this).next('div.red').remove();
                    return true;
                }
            });
         }

         if(!org_form.org_checkbox.checked) {
             org_form.org_checkbox.focus();
             console.log('cancel');
             $('#myError').css('color','red');
             $('#myError').text('Please select terms and conditions')
             return "Missing terms";

         }
         return null;
    }

    function registerOrganisation() {
        console.log("organisation_validate");
        var formvalidate = organisation_validate();
        console.log("organisation_validate ::"+ formvalidate);
        if(formvalidate == null){
            console.log("CREATE SERVER CALL");
            //ajax call for organisation
            var x = document.getElementById("select1").selectedIndex;
            $.ajax({
                type: "POST",
                url: '/org_register',
                data: {
                    company: document.getElementById("org_company_name").value,
                    first_name: document.getElementById("org_name").value,
                    contact: document.getElementById("org_mobile").value,
                    password: document.getElementById("org_password").value,
                    email: document.getElementById("org_email").value,
                    resident_country: document.getElementsByTagName("option")[x].value,
                    type_id : 2,
                    term_id : 3
                }
            }).done(function( response ) {
                $("#exampleModal").modal("hide");
                console.log(response);
                // Put the object into storage
                localStorage.setItem('userObject', JSON.stringify(response));
                window.location = '/home';
            });
        }
        else{
            $("#alerterror").text(formvalidate);
            $("#alerterror").show();
            setTimeout(function(){
                $("#alerterror").hide()
            },1000);
        }
    }

    function closeForm() {
        document.getElementById("popupForm").style.display="none";
    }
</script>
