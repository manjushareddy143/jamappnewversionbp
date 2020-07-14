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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<div class="toast" style="margin-left: auto; margin-right: 5px;
margin-top: 9px; position: absolute; top: 0; right: 0;">
    <div class="toast-header"> Error </div>
    <div class="toast-body"> msgStr </div>
 </div>
<body class="bg-gradient-login">

<!-- Service Provider Sign-Up Content -->
<div class="container-login service-provider-sign-up">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                             <!-- Language Dropdown -->
                            <div class="dropdown custom" style="margin: 25px 0px 0px 40px;">
                                <button class="dropbtn">
                                    <img id="langFlag" alt="" style="width: 30px;height: 20px;">
                                </button>
                                <div class="dropdown-content">
                                    <a href="locale/en" onclick="langChange('en')"><img src="{{asset('img/en.png')}}" alt="" style="width: 20px;height: 10px;"> English</a>
                                    <a href="locale/ar" onclick="langChange('ar')"><img src="{{asset('img/ar.png')}}" alt="" style="width: 20px;height: 10px;"> Arabic</a>
                                </div>
                            </div>
                            <!-- Language Dropdown -->
                            <div class="login-form">
                                <div class="text-center">
                                    <div class="loginlogo">
                                        <img src="img/logo/jam-logo.png">
                                    </div>
                                    <h1 class="h4 text-gray-900 mb-4">@lang('register.message')</h1>
                                </div>
                                <div class="service-provider-tab">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item first-tab">
                                            <a class="nav-link active" id="individual-tab" data-toggle="tab"
                                               href="#individual" role="tab"
                                               aria-controls="home" aria-selected="true">
                                                <i class="fas fa-user"></i> @lang('register.label_title')</a>
                                        </li>
                                        <li class="nav-item second-tab">
                                            <a class="nav-link" id="organization-tab" data-toggle="tab"
                                               href="#organization" role="tab"
                                               aria-controls="profile" aria-selected="false">
                                                <i class="fas fa-users"></i> @lang('register.label_title2') <br/></a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">

                                        <div class="tab-pane fade show active" id="individual" role="tabpanel"
                                             aria-labelledby="individual-tab">
                                            <form id="form">
                                                <div class="form-group">
                                                    <label>@lang('register.label_fname') <strong>*</strong></label>
                                                    <input type="text" class="form-control"
                                                           id="first_name" placeholder="Enter Your First Name" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>@lang('register.label_lname')<strong>*</strong></label>
                                                    <input type="text" class="form-control"
                                                           id="last_name" placeholder="Enter Your Last Name" required>
                                                </div>

                                                <div class="row form-group">
                                                    <label>@lang('register.label_mobile') <strong>*</strong></label>
                                                    <div class="col-5">
                                                        <select class="form-control" id="codeLst">
                                                        </select>
                                                    </div>
                                                    <div class="col-7">
                                                        <input type="text" pattern="\d*" maxlength="12" minlength="7" class="form-control" onkeypress="return isNumberKey(event)"
                                                        id="mobile" placeholder="Enter Mobile Number" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>@lang('register.label_email')<strong>*</strong></label>
                                                    <input type="email" class="form-control"
                                                           id="email" aria-describedby="emailHelp"
                                                           placeholder="Enter Your Email Address" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>@lang('register.label_password')<strong>*</strong></label>
                                                    <input type="password" class="form-control"
                                                           id="password" aria-describedby="passwordHelp"
                                                           placeholder="Enter Your Password" required>
                                                </div>


                                                <div class="form-group">

                                                    <label for="exampleFormControlSelect1">@lang('register.label_rstatus')
                                                        <strong>*</strong></label>
                                                    <select class="form-control" id="countryLst">
                                                        <option value="Select Country">Select Country</option>
                                                    </select>
                                                </div>



                                                <div class="row form-group register-rc-button">
                                                    <div class="custom-control custom-checkbox" style="left: 15px;">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="terms" name="terms" required>
                                                        <label class="custom-control-label" for="terms">
                                                            Vendor Consent to <a
                                                                href="http://www.savitriya.com/privacy-policy/"
                                                                target="_blank">
                                                                Terms & Conditions</a>
                                                        </label>
                                                    </div>
                                                    <p id="myError" style="color: red; margin-left: 15px;"></p>
                                                </div>

                                                <br>

                                                <div class="form-group">
                                                    <button type="button"
                                                            class="btn btn-primary btn-block"
                                                            id="singupbtn"
                                                            onclick="registerIndividuals()">@lang('register.label_btn')
                                                    </button>
                                                    {{--                                                    mobileSignup--}}

                                                </div>


                                            </form>


                                            <div class="text-center login-signin">
                                                Already have an account? <a class="font-weight-bold small"
                                                                            href="/login"
                                                                            style="color: #f79548;">Login</a>
                                            </div>

{{--                                            <div class="text-center social-btn">--}}
{{--                                                <a href="#" class="btn btn-danger btn-block" onclick="gmailLogin()">--}}
{{--                                                    <i class="fa fa-google"></i>--}}
{{--                                                    Sign in with <b>Google</b>--}}
{{--                                                </a>--}}

{{--                                                <a href="#" class="btn btn-primary btn-block" onclick="facebookLogin()"--}}
{{--                                                   style="background-color: #337ab7;border: none;">--}}
{{--                                                    <i class="fa fa-facebook"></i>--}}
{{--                                                    Sign in with <b>Facebook</b>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
                                        </div>



                                        @if(Session::has('laravel_session'))
                                            <div class="inspire">
                                                { { session('laravel_session', '') } }
                                            </div>
                                        @endif


                                        <div class="tab-pane fade" id="organization" role="tabpanel"
                                             aria-labelledby="organization-tab">
                                            <span>@lang('register.label_titlename')</span>
                                            <form id="org_form">
                                                <div class="form-group">
                                                    <label>@lang('register.label_cname') <strong>*</strong></label>
                                                    <input type="text" class="form-control" id="org_company_name"
                                                           placeholder="Enter Your Company Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>@lang('register.label_adname')<strong>*</strong></label>
                                                    <input type="text" class="form-control" id="org_name"
                                                           placeholder="Enter Your Name" required>
                                                </div>
                                                <div class="row form-group">
                                                    <label>@lang('register.label_mobile') <strong>*</strong></label>
                                                    <div class="col-5">
                                                        <select class="form-control" id="org_codeLst">
                                                        </select>
                                                    </div>
                                                    <div class="col-7">
                                                        <input type="text" pattern="\d*" maxlength="12" minlength="7" class="form-control" onkeypress="return isNumberKey(event)"
                                                        id="org_mobile" placeholder="Enter Mobile Number" required>
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label>@lang('register.label_mnumber') <strong>*</strong></label>
                                                    <input type="text" class="form-control" id="org_mobile" onkeypress="return isNumberKey(event)"
                                                           placeholder="Enter Number" required>
                                                </div> --}}
                                                <div class="form-group">
                                                    <label>@lang('register.label_eaddress')<strong>*</strong></label>
                                                    <input type="email" class="form-control" id="org_email"
                                                           aria-describedby="emailHelp"
                                                           placeholder="Enter Your Email Address" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>@lang('register.label_password2')<strong>*</strong></label>
                                                    <input type="password" class="form-control"
                                                           id="org_password" aria-describedby="passwordHelp"
                                                           placeholder="Enter Your Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">@lang('register.label_Country2')
                                                        <strong>*</strong></label>
                                                    <select class="form-control" id="org_select_country" required>
                                                        <option>Select Country</option>
                                                    </select>
                                                </div>
                                                <div class="form-group register-rc-button">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="org_checkbox" required>
                                                        <label class="custom-control-label" for="org_checkbox">Vendor
                                                            Consent to <a
                                                                href="http://www.savitriya.com/privacy-policy/"
                                                                target="_blank">Terms & Conditions</a></label>
                                                    </div>

                                                </div>
                                                <p id="mytermError"></p>

                                                <div class="form-group">
                                                    <button type="button" class="btn btn-primary btn-block"
                                                            data-toggle="modal" id="#myBtn"
                                                            onclick="registerOrganisation()">
                                                        @lang('register.label_btn')
                                                    </button>
                                                </div>
                                            </form>
                                            <div class="text-center login-signin">
                                                Already have an account? <a class="font-weight-bold small"
                                                                            href="/login"
                                                                            style="color: #f79548;">Login</a>
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
                                                        <h5 class="modal-title" id="exampleModalLabel">OTP
                                                            Verification</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">X</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="#" class="form-container">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="otpinput"
                                                                       placeholder="Enter OTP">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="button" class="btn btn-primary"
                                                                        onclick="mobileOTPVerify()">Send OTP
                                                                </button>
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

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/ruang-admin.min.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>

<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-app.js"></script>

<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-analytics.js"></script>

<!-- Add Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-firestore.js"></script>



<script>
$(document).ready(function () {
    $.getJSON("../../country.json", function (data) {
            $.each(data, function (index, value) {
                $('#countryLst').append(`<option value="${value['country_name']}">
                                        ${value['country_name']}
                                    </option>`);
                $('#codeLst').append(`<option value="${value['dialling_code']}">
                                        ${value['dialling_code']} ${value['country_name']}
                                    </option>`);

        });
    });
});

$(document).ready(function () {
    $.getJSON("../../country.json", function (data) {
            $.each(data, function (index, value) {
                $('#org_select_country').append(`<option value="${value['country_name']}">
                                        ${value['country_name']}
                                    </option>`);
                $('#org_codeLst').append(`<option value="${value['dialling_code']}">
                                        ${value['dialling_code']} ${value['country_name']}
                                    </option>`);

        });
    });
});

    var selectedLang;
    function langChange(lang) {
        console.log(lang);
        selectedLang = lang;
        if(lang == "en") {
            $('#langFlag').attr("src", '{{ URL::asset('/img/en.png') }}');
            localStorage.setItem('langauge', 'en');
        } else {
            $('#langFlag').attr("src", '{{ URL::asset('/img/ar.png') }}');
            localStorage.setItem('langauge', 'ar');
        }
    }



    window.onload = function () {
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
            'callback': function (response) {
                console.log("response ===" + response);
            }
        });
    };

    function mobileSignup() {
        console.log("mobileSignup");
        if (!form.terms.checked) {
            form.terms.focus();
            document.getElementById("myError").innerHTML = "Please accept terms conditions";
        } else {
            document.getElementById("myError").innerHTML = "";
            // Phone NUMBER
            var phoneNumber = document.getElementById("mobile").value;
            var appVerifier = window.recaptchaVerifier;
            firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                .then(function (confirmationResult) {
                    console.log("confirmationResult == " + JSON.stringify(confirmationResult));
                    window.confirmationResult = confirmationResult;
                    $("#exampleModal").modal()
                }).catch(function (error) {
                console.log("error  == " + error);
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

    // var phone_regex = /^(\+\d)\d*[0-9-+](|.\d*[0-9]|,\d*[0-9])?$/
    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

    $("#countryLst").change(function () {
        if ($("#countryLst").val() === "Select Country") {
            $('#countryLst').next('div.red').remove();
            $('#countryLst').after('<div class="red" style="color:red">Country is Required</div>');
            //return false;
        } else {
            $(this).next('div.red').remove();
            return true;
        }
    });

    function individual_validate() {
        var isValidate = true;
        console.log("individual_validate");
        if (document.getElementById("first_name").value == "") {
            // EXPAND ADDRESS FORM
            $("#first_name").focus();
            $("#first_name").focus();
            $("#first_name").blur(function () {
                var name = $('#first_name').val();
                if (name.length == 0) {
                    $('#first_name').next('div.red').remove();
                    $('#first_name').after('<div class="red" style="color:red">First Name is Required</div>');
                    isValidate = false;
                } else {
                    $(this).next('div.red').remove();
                    isValidate = true;
                }
            });
        }

        if (document.getElementById("last_name").value == "") {
            $("#last_name").focus();
            $("#last_name").focus();
            $("#last_name").blur(function () {
                var name = $('#last_name').val();
                if (name.length == 0) {
                    $('#last_name').next('div.red').remove();
                    $('#last_name').after('<div class="red" style="color:red">Last Name is Required</div>');
                    isValidate = false;
                } else {
                    $(this).next('div.red').remove();
                    isValidate = true;
                }
            });
        }

        if (document.getElementById("mobile").value == "") {
            $("#mobile").focus();
            $("#mobile").focus();
            $("#mobile").blur(function () {
                var name = $('#mobile').val();
                if (name.length == 0) {
                    $('#mobile').next('div.red').remove();
                    $('#mobile').after('<div class="red" style="color:red">Mobile number is Required</div>');
                    isValidate = false;
                } else {
                    if ($('#mobile').val().length > 6 && $('#mobile').val().length < 13) {
                        console.log("NOT WORL");
                        $(this).next('div.red').remove();
                        isValidate = true;
                    } else {
                        console.log("ERRPR");
                        $('#mobile').next('div.red').remove();
                        $('#mobile').after('<div class="red" style="color:red">Mobile number is Invalid</div>');
                        isValidate = false;
                    }
                }
            });
        } else {
            if ($('#mobile').val().length > 6 && $('#mobile').val().length < 13) {
                console.log("wqewe NOT WORL");
                $('#mobile').next('div.red').remove();
                isValidate = true;
            } else {
                console.log("ERRPR");
                $('#mobile').next('div.red').remove();
                $('#mobile').after('<div class="red" style="color:red">Mobile number is Invalid</div>');
                isValidate = false;
            }
        }

        if (document.getElementById("email").value == "") {
            $("#email").focus();
            $("#email").focus();
            $("#email").blur(function () {
                var name = $('#email').val();
                if (name.length == 0) {
                    $('#email').next('div.red').remove();
                    $('#email').after('<div class="red" style="color:red">Email is Required</div>');
                    isValidate = false;
                } else {
                    if (!email_regex.test(name)) {
                        $('#email').next('div.red').remove();
                        $('#email').after('<div class="red" style="color:red">Email Format is Wrong</div>');
                        isValidate = false;
                    } else {
                        $(this).next('div.red').remove();
                        isValidate = true;
                    }
                }
            });
        }
        else
        {
            if (!email_regex.test($('#email').val())) {
                $('#email').next('div.red').remove();
                $('#email').after('<div class="red" style="color:red">Email Format is Wrong</div>');
                isValidate = false;
            }
            else
            {
                $(this).next('div.red').remove();
                isValidate = true;
            }
        }

        if (document.getElementById("password").value == "") {
            $("#password").focus();
            $("#password").focus();
            $("#password").blur(function () {
                var name = $('#password').val();
                if (name.length == 0) {
                    $('#password').next('div.red').remove();
                    $('#password').after('<div class="red" style="color:red">Password is Required</div>');
                    isValidate = false;
                } else {
                    $(this).next('div.red').remove();
                    isValidate = true;
                }
            });
        }
        //var Country = $('#select1')[0].files[0];
        // let optionsLength = document.getElementById("countryLst").length;


        if ($("#countryLst").val() === "Select Country") {
            $('#countryLst').next('div.red').remove();
            $('#countryLst').after('<div class="red" style="color:red">Country is Required</div>');
            isValidate = false;
        } else {
            $(this).next('div.red').remove();
            isValidate = true;
        }
        if (!form.terms.checked) {
            form.terms.focus();
            console.log('cancel BOX');
            $('#myError').css('color', 'red');
            $('#myError').text('Please select terms and conditions')
            isValidate = false;
        }
        return isValidate;
    }

    function isNumberKey(evt){

        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    $('#terms').change(function () {
        if (this.checked) {
            $('#myError').css('color', 'red');
            $('#myError').text('')
        } else {
            $('#myError').css('color', 'red');
            $('#myError').text('Please select terms and conditions')
        }

    });

    function registerIndividuals() {
        console.log("individual_validate");
        var individualformvalidate = individual_validate();
        console.log("individual_validate ::" + individualformvalidate);
        if (individualformvalidate == true) {
            console.log("CREATE SERVER CALL");
            $.ajax({
                type: "POST",
                url: '/register',
                data: {
                    first_name: document.getElementById("first_name").value,
                    last_name: document.getElementById("last_name").value,
                    contact: $( "#codeLst option:selected" ).val()+document.getElementById("mobile").value,
                    password: document.getElementById("password").value,
                    email: document.getElementById("email").value,
                    resident_country: $( "#countryLst option:selected" ).val(),
                    type_id: 3,
                    term_id: 2
                }
            }).done(function (response, xhr) {
                $("#exampleModal").modal("hide");
                console.log(response);
                // Put the object into storage
                localStorage.setItem('userObject', JSON.stringify(response));
                window.location = '/home';
            }).fail(function(xhr) {
                console.log("errp = " + JSON.stringify(xhr));
                if(xhr['status'] == 406) {
                    var errorArray = xhr['responseJSON'];
                    var msgStr = "";
                    $.each(errorArray, function (i, err) {
                        $.each(err, function (title, msg) {
                            msgStr += msg.toString() + "\n";
                        });

                    });
                    // var trHTML = '<div class="toast" style="margin-left: auto; margin-right: 15px; margin-top: 9px; position: absolute; top: 0; right: 0;">' +
                    //             '<div class="toast-header">'  + 'Error' + '</div> <div class="toast-body">' +
                    //             msgStr + '</div> </div>';
                    $('.toast-body').text(msgStr);
                    $('.toast').toast({delay:10000, animation:false});
                    $('.toast').toast('show');
                    // $('#showToast').append(trHTML);
                }
            });
        }
    }

    function organisation_validate() {
        var isValidate = false;
        console.log("organisation_validate");
        if (document.getElementById("org_company_name").value == "") {
            // EXPAND ADDRESS FORM
            $("#org_company_name").focus();
            $("#org_company_name").focus();
            $("#org_company_name").blur(function () {
                var name = $('#org_company_name').val();
                if (name.length == 0) {
                    $('#org_company_name').next('div.red').remove();
                    $('#org_company_name').after('<div class="red" style="color:red">Company Name is Required</div>');
                    isValidate = false;
                } else {
                    $(this).next('div.red').remove();
                    isValidate = true;
                }
            });
        }
        //var admin_name = $('#admin_name')[0].files[0];
        if (document.getElementById("org_name").value == "") {
            $("#org_name").focus();
            $("#org_name").focus();
            $("#org_name").blur(function () {
                var name = $('#org_name').val();
                if (name.length == 0) {
                    $('#org_name').next('div.red').remove();
                    $('#org_name').after('<div class="red" style="color:red">Admin Name is Required</div>');
                    isValidate = false;
                } else {
                    $(this).next('div.red').remove();
                    isValidate = true;
                }
            });
        }
        //var mobilenum = $('#mobile')[0].files[0];
        if (document.getElementById("org_mobile").value == "") {
            $("#org_mobile").focus();
            $("#org_mobile").focus();
            $("#org_mobile").blur(function () {
                var name = $('#org_mobile').val();
                if (name.length == 0) {
                    $('#org_mobile').next('div.red').remove();
                    $('#org_mobile').after('<div class="red" style="color:red">Mobile number is Required</div>');
                    isValidate = false;
                } else {
                    if ($('#org_mobile').val().length > 6 && $('#org_mobile').val().length < 13) {
                        console.log("NOT WORL");
                        $(this).next('div.red').remove();
                        isValidate = true;
                    } else {
                        console.log("ERRPR");
                        $('#org_mobile').next('div.red').remove();
                        $('#org_mobile').after('<div class="red" style="color:red">Mobile number is Invalid</div>');
                        isValidate = false;
                    }
                }
            });
        } else {
            if ($('#org_mobile').val().length > 6 && $('#org_mobile').val().length < 13) {
                console.log("NOT WORL");
                $(this).next('div.red').remove();
                isValidate = true;
            } else {
                console.log("ERRPR");
                $('#org_mobile').next('div.red').remove();
                $('#org_mobile').after('<div class="red" style="color:red">Mobile number is Invalid</div>');
                isValidate = false;
            }
        }
        //  var email = $('#email')[0].files[0];
        if (document.getElementById("org_email").value == "") {
            $("#org_email").focus();
            $("#org_email").focus();
            $("#org_email").blur(function () {
                var name = $('#org_email').val();
                if (name.length == 0) {
                    console.log("ERRPR");
                    $('#org_email').next('div.red').remove();
                    $('#org_email').after('<div class="red" style="color:red">Email is Required</div>');
                    isValidate = false;
                } else {
                    if (!email_regex.test($('#org_email').val())) {
                        console.log("ERROR");
                        $('#org_email').next('div.red').remove();
                        $('#org_email').after('<div class="red" style="color:red">Email is Invalid</div>');
                        isValidate = false;
                    } else {
                        console.log("NOT WORL");
                        $(this).next('div.red').remove();
                        isValidate = true;
                    }
                }
            });
        } else {
            if (!email_regex.test($('#org_email').val())) {
                console.log("ERROR");
                $('#org_email').next('div.red').remove();
                $('#org_email').after('<div class="red" style="color:red">Email is Invalid</div>');
                isValidate = false;
            } else {
                console.log("NOT WORLD");
                $(this).next('div.red').remove();
                isValidate = true;
            }
        }

        if (document.getElementById("org_password").value == "") {
            $("#org_password").focus();
            $("#org_password").focus();
            $("#org_password").blur(function () {
                var name = $('#org_password').val();
                if (name.length == 0) {
                    $('#org_password').next('div.red').remove();
                    $('#org_password').after('<div class="red" style="color:red">Password is Required</div>');
                    isValidate = false;
                } else {
                    $(this).next('div.red').remove();
                    isValidate = true;
                }
            });
        }

        let optionsLength = document.getElementById("org_select_country").length;
        if ($('#org_select_country').val() === "Select Country") {
            $('#org_select_country').next('div.red').remove();
            $('#org_select_country').after('<div class="red" style="color:red">Country is Required</div>');
            isValidate = false;
        } else {
            $(this).next('div.red').remove();
            isValidate = true;
        }


        if (!org_form.org_checkbox.checked) {
            org_form.org_checkbox.focus();
            console.log('cancel BOX');
            $('#mytermError').css('color', 'red');
            $('#mytermError').text('Please select terms and conditions')
            isValidate = false;
        }
        return isValidate;
        function isNumberKey(evt){

            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    }

    $("#org_select_country").change(function () {
        if ($("#org_select_country").val() === "Select Country") {
            $('#org_select_country').next('div.red').remove();
            $('#org_select_country').after('<div class="red" style="color:red">Country is Required</div>');
        } else {
            $(this).next('div.red').remove();
        }
    });

    $('#org_checkbox').change(function () {
        if (this.checked) {
            $('#mytermError').css('color', 'red');
            $('#mytermError').text('')
        } else {
                $('#mytermError').css('color', 'red');
            $('#mytermError').text('Please select terms and conditions')
        }

    });

    function registerOrganisation() {
        console.log("organisation_validate");
        var formvalidate = organisation_validate();
        console.log("organisation_validate ::" + formvalidate);
        if (formvalidate == true) {
            console.log("CREATE SERVER CALL");
            //ajax call for organisation
            var x = document.getElementById("countryLst").selectedIndex;
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
                    type_id: 2,
                    term_id: 3
                }
            }).done(function (response) {
                $("#exampleModal").modal("hide");
                console.log(response);
                // Put the object into storage
                localStorage.setItem('userObject', JSON.stringify(response));
                window.location = '/home';
            }).fail(function(xhr) {
                console.log("errp = " + JSON.stringify(xhr));
                if(xhr['status'] == 401) {
                    var errorArray = xhr['responseJSON'];
                    var msgStr = "";
                    $.each(errorArray, function (i, err) {
                        $.each(err, function (title, msg) {
                            msgStr += msg.toString() + "\n";
                        });

                    });
                    // var trHTML = '<div class="toast" style="margin-left: auto; margin-right: 15px; margin-top: 9px; position: absolute; top: 0; right: 0;">' +
                    //             '<div class="toast-header">'  + 'Error' + '</div> <div class="toast-body">' +
                    //             msgStr + '</div> </div>';
                    $('.toast-body').text(msgStr);
                    $('.toast').toast({delay:10000, animation:false});
                    $('.toast').toast('show');
                    // $('#showToast').append(trHTML);
                }
            });
        } else {
            $("#alerterror").text(formvalidate);
            $("#alerterror").show();
            setTimeout(function () {
                $("#alerterror").hide()
            }, 1000);
        }
    }

</script>

<style>
    .dropbtn {
        background-color: #0aa69800;;
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
