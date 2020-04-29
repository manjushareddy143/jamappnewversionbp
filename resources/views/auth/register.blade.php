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
                                            <a class="nav-link active" id="individual-tab" data-toggle="tab" href="#individual" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-user"></i> For Individual</a>
                                        </li>
                                        <li class="nav-item second-tab">
                                            <a class="nav-link" id="organization-tab" data-toggle="tab" href="#organization" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-users"></i> For Organization <br/></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="individual" role="tabpanel" aria-labelledby="individual-tab">

                                            <form>
                                                <div class="form-group">
                                                    <label>Name <strong>*</strong></label>
                                                    <input type="text" class="form-control" id="first_name" placeholder="Enter Your Name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mobile Number <strong>*</strong></label>
                                                    <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile Number">
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
                                                    <button type="button"
                                                            class="btn btn-primary btn-block"
                                                            id="singupbtn"
                                                            onclick="mobileSignup()">Sign Up</button>
                                                </div>
                                            </form>
                                        </div>

                                        @if(Session::has('laravel_session'))
                                            <div class="inspire">
                                                { { session('laravel_session', '') } }
                                            </div>
                                        @endif

                                        <div class="login-popup">
                                            <div class="form-popup" id="popupFormotp">
                                                <form action="#" class="form-container">
                                                    <div class="form-group">
                                                        <label>Mobile Number <strong>*</strong></label>
                                                        <input type="text" class="form-control" id="mobileotp" placeholder="Enter OTP">
                                                    </div>
                                                    <button type="button" name="sendotp" class="btn btn-sm btn-primary"
                                                            onclick="mobileOTPVerify()">Send OTP</button>
                                                    <button type="button" class="btn btn-sm btn-primary" onclick="closeForm()">Close</button>
                                                </form>
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="organization" role="tabpanel" aria-labelledby="organization-tab">
                                            <span>Proprietorship Firm / Partnership Firm / Company / Business Establishment</span>
                                            <form method="POST" action="{{ route('register') }}">
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
                                                    <button type="button" class="btn btn-primary btn-block"
                                                            onclick="registerOrganisation()">Sign Up</button>
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
        console.log("ONLOAD");
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
        // Phone NUMBER
        var phoneNumber = document.getElementById("mobile").value;
        var appVerifier = window.recaptchaVerifier;
        firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
            .then(function (confirmationResult) {
                console.log("confirmationResult == " + JSON.stringify(confirmationResult));
                // SMS sent. Prompt user to type the code from the message, then sign the
                // user in with confirmationResult.confirm(code).
                window.confirmationResult = confirmationResult;
                document.getElementById("popupFormotp").style.display="block";

            }).catch(function (error) {
            console.log("error  == " + error);
            // Error; SMS not sent
            // ...
        });
    }

    function mobileOTPVerify() {
        var code = document.getElementById("mobileotp").value;
        console.log("on submit call" + code);
        confirmationResult.confirm(code).then(function (result) {
            // User signed in successfully.
            console.log("otp result =" + JSON.stringify(result));
            // var user = result.user;
            registerIndividuals();
            // document.getElementById("popupFormotp").style.display="none";
            // ...
        }).catch(function (error) {
            console.log("otp err =" + JSON.stringify(error));
            // User couldn't sign in (bad verification code?)
            // ...
        });
    }

    function registerIndividuals() {
        closeForm();
        var x = document.getElementById("select1").selectedIndex;
        // alert(document.getElementsByTagName("option")[x].value);
        console.log("Individuals = " + document.getElementById("first_name").value);
        $.ajax({
            type: "POST",
            url: '/register',
            data: {
                first_name: document.getElementById("first_name").value,
                last_name: document.getElementById("last_name").value,
                contact: document.getElementById("mobile").value,
                email: document.getElementById("email").value,
                resident_country: document.getElementsByTagName("option")[x].value,
                type_id : 2,
                term_id : 2
            }
        }).done(function( response ) {
            console.log(response);
            //
            // document.getElementById("popupForm").style.display="none";
            window.location = '/home';
            //
        });

        // document.getElementById("popupForm").style.display="block";
    }

    function registerOrganisation() {
        console.log("789");
    }

    function closeForm() {
        document.getElementById("popupFormotp").style.display="none";
    }
</script>

<!-- css for otp popup form -->
/*<style>
    * {
        box-sizing: border-box;
    }
    body {
        font-family: Roboto, Helvetica, sans-serif;
    }
    /* Fix the button on the left side of the page */
    .open-btn {
        display: flex;
        justify-content: left;
    }
    /* Style and fix the button on the page */
    .open-button {
        background-color: #1c87c9;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        opacity: 0.8;
        /*position: fixed;*/
    }
    /* Position the Popup form */
    .login-popup {
        position: relative;
        text-align: center;
        width: 100%;
    }
    /* Hide the Popup form */
    .form-popup {
        display: none;
        position: fixed;
        left: 45%;
        top:5%;
        background: #3abaf4; /*add color-----------------*/
        border: 2px solid #666;
        z-index: 9;
    }
    /* Styles for the form container */
    .form-container {
        max-width: 300px;
        padding: 20px;
        background-color: #fff;
    }
    /* Full-width for input fields */
    .form-container input[type=text], .form-container input[type=password] {
        width: 100%;
        padding: 10px;
        margin: 5px 0 22px 0;
        border: none;
        background: #eee;
    }
    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }
    /* Style submit/login button */
    .form-container .btn {
        background-color: #04bfac;
        color: #fff;
        padding: 12px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
        opacity: 0.8;
    }
    /* Style cancel button */
    .form-container .cancel {
        background-color: #cc0000;
    }
    /* Hover effects for buttons */
    .form-container .btn:hover, .open-button:hover {
        opacity: 1;
    }
</style>*/





<!-- OTP FOrm -->

<!--                                                     <div class="login-popup">
                                                    <div class="form-popup" id="popupForm">
                                                      <form action="#" class="form-container">
                                                    <div class="form-group">
                                                    <label>Mobile Number <strong>*</strong></label>
                                                    <input type="text" class="form-control" id="mobile" placeholder="Enter Number" required>
                                                  </div>
                                                  <button type="submit" name="sendotp" class="btn btn-sm btn-primary">Send OTP</button>
                                                  <button type="button" class="btn btn-sm btn-primary" onclick="closeForm()">Close</button>
                                                    </form>
                                                 </div>
                                                  <script>
                                                    function openForm() {
                                                      document.getElementById("popupForm").style.display="block";
                                                    }

                                                    function closeForm() {
                                                      document.getElementById("popupForm").style.display="none";
                                                    }
                                                  </script>
                                                </div>
 -->
<!-- OTP FOrm -->



<!-- OTP FOrm -->
<!--
                                                    <div class="login-popup">
                                                    <div class="form-popup" id="popupForm">
                                                      <form action="#" class="form-container">
                                                    <div class="form-group">
                                                   <label>Mobile Number <strong>*</strong></label>
                                                    <input type="text" name="mobile" class="form-control" id="mobile" maxlength="11" placeholder="Enter Number" required>
                                                  </div>
                                                  <button type="submit" name="sendotp" class="btn btn-sm btn-primary">Send OTP</button>
                                                  <button type="button" class="btn btn-sm btn-primary" onclick="closeForm()">Close</button>
                                                    </form>
                                                 </div>
                                                  <script>
                                                    function openForm() {
                                                      document.getElementById("popupForm").style.display="block";
                                                    }

                                                    function closeForm() {
                                                      document.getElementById("popupForm").style.display="none";
                                                    }
                                                  </script>
                                                </div>
                                                 -->
<!-- OTP FOrm -->



<!-- register form css -->                                              -->
<style type="text/css">

    .container-login.service-provider-sign-up {
        margin-left: 17rem;
        margin-right: 17rem;
    }
    .container, .container-fluid, .container-login {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }
    .nav-tabs .nav-item {
        width: 50%;
    }
    .login-form {
        padding: 3rem !important;
    }

    .nav-item.first-tab a {
        border-radius: .375rem 0 0 0;
    }
    .nav-item.second-tab a {
        border-radius: 0 .375rem 0 0;
    }
    .nav-tabs {
        border-radius: .375rem .375rem 0 0;
        background: #fff;
        border-bottom: 1px solid #04bfac;
    }
    .nav-tabs .nav-link {
        text-transform: uppercase;
        letter-spacing: 0.7px;
        color: #777;
        font-family: 'Manrope3-Medium';
        font-size: 15px;
        padding: 16px 15px;
        display: inline-block;
        width: 100%;
        text-align: center;
    }
    .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
        color: #fff;
        background-color: #04bfac;
        border-color: transparent;
        font-family: 'Manrope3-Semibold';
    }
    .nav-tabs .nav-link:hover, .nav-tabs .nav-link:focus {
        border-color: transparent;
    }
    .service-provider-tab .tab-content {
        display: inline-block;
        width: 100%;
        padding: 30px;
    }
    .login-form h1 {
        font-size: 22px;
        font-family: 'Manrope3-Medium';
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }
    .login-form .form-group {
        float: left;
        width: 100%;
    }
    .service-provider-tab {
        float: none;
        width: 100%;
        margin: 20px 0 0 0;
        display: inline-block;
        border: none;
        border-radius: .375rem;
        border: 1px solid #04bfac;
    }

    .tab-content span {
        float: left;
        width: 100%;
        font-family: 'Manrope3-Bold';
        font-size: 14px;
        line-height: 22px;
        margin-bottom: 20px;
        color: #04bfac;
    }
    .register-rc-button .custom-control {
        float: left;
        width: auto;
        margin-right: 30px;
    }
    .custom-control {
        position: relative;
        display: block;
        min-height: 1.5rem;
        padding-left: 1.5rem;
    }
    .upload-photo {
        float: left;
        width: 100%;
        margin: 10px 0 0 0;
    }
    .upload-photo span {
        float: left;
        background: #04bfac;
        margin: 0;
        width: 35px;
        height: 35px;
        border-radius: 100px;
        text-align: center;
        line-height: 35px;
        margin-right: 10px;
    }
    .nav-tabs .nav-item .fas{
        margin-right: 5px;
        font-size: 17px;
    }
    .nav-tabs .nav-item.second-tab .fas{
        font-size: 19px;
    }
    .login-form .form-group label strong {
        font-size: 14px;
        color: #e60606;
    }

    .upload-photo span .fas {
        color: #fff;
        font-size: 16px;
    }
    .nav-tabs .nav-item {
        margin-bottom: -1px;
    }
    .login-form .btn {
        border-radius: 5px;
        margin-top: 25px;
        padding: 0.575rem 0.75rem;
        font-size: 18px;
        letter-spacing: 0.8px;
        font-family: 'Manrope3-Regular';
    }
    .upload-photo a {
        float: left;
    }
    a {
        color: #04bfac;
    }
    .upload-photo span .fas {
        color: #fff;
        font-size: 16px;
    }
    .upload-photo p {
        float: left;
        font-family: 'Manrope3-Regular';
        margin: 7px 0 0 0;
        color: #757575;
    }

    /*Service Provider Sign Up*/

    .btn { font-size: 14px; }

    .user-profile-popup .modal-header h5 {
        color: #04bfac;
        padding-bottom: 8px;
        font-size: 20px;
        letter-spacing: 0.5px;
        position: relative;
    }
    .user-profile-popup .modal-header h5::after {
        position: absolute;
        border-bottom: 3px solid #04bfac;
        content: "";
        display: inline-block;
        left: 0;
        bottom: 0;
        width: 50px;
        border-radius: 10px;
    }
    .user-profile-popup .modal-header {
        border-bottom: none;
        padding: 25px;
    }
    .user-profile-popup .close span img {
        width: 16px;

    }

    .user-profile-popup .close{
        opacity: 1;
    }
    .user-profile-popup .modal-footer {
        border-top: none;
        padding: 25px;
    }

    .user-profile-popup .modal-body {
        padding: 0 25px 25px 25px;
    }
</style>
<!-- register form css -->                                              -->
