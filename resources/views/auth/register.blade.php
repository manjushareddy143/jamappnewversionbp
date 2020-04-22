@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form>
                    <!-- method="POST" action="{{ route('register') }}" -->
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('choosen file') is-invalid @enderror" name="image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="tel" class="form-control @error('contact number') is-invalid @enderror" name="contact">

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <select name="type" id="category" class="form-control @error('Selected type') is-invalid @enderror" onchange="showfields()">
                                    <option value="Selected">Select</option>
                                    <option value="Corporate service provider">Corporate service provider</option>
                                    <option value="Individual service provider">Individual service provider</option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group" id="info_field" style="display: none">
                            {{-- This fields will show after dropdown selected --}}
                            <div class="form-group row" >
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                            {{-- <div class="form-group"> --}}
                                <label class="radio-inline">
                                    <!-- <input type="radio" id="gen1" name="gen_radio"> Female </label> -->
                                    <input type="radio" name="gender" value="female"> Female
                                <label class="radio-inline">
                                <input type="radio" name="gender" value="male"> Male
                                    <!-- <input type="radio" id="gen2" name="gen_radio"> Male </label> -->
                            </div>

                            <div class="form-group row" >
                                <label for="language" class="col-md-4 col-form-label text-md-right">{{ __('Languages known') }}</label>

                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <!-- <input type="checkbox" name="language[]" value="arabic"> Arabic -->
                                            <input type="checkbox" name="language" value="arabic"> Arabic
                                        </label>
                                        <label>
                                            <!-- <input type="checkbox" name="english" value="english"> English -->
                                            <input type="checkbox" name="language" value="english"> English
                                        </label>
                                    </div>
                              </div>
                            </div>

                            <div class="form-group row" >
                                <label for="timing" class="col-md-4 col-form-label text-md-right">{{ __('Timing') }}</label>
                                <!-- <select name="time" id="inputMDEx1" class="form-control @error('Selected type') is-invalid @enderror" onchange="myFunction()"> -->
                                <div class="col-md-3">

                                <input type="time" id="apptstart" name="start_time" class="form-control">
                             <!-- <input type="time" id="starttime" name="start_time" class="form-control"> -->
                            <label for="inputMDEx1">Start time</label>
                               <!-- </select> -->

                                </div>
                                <div class="col-md-3">
                                <input type="time" id="apptend" name="end_time" class="form-control">
                                <!-- <input type="time" id="endtimr" name="end_time" class="form-control"> -->
                                <label for="inputMDEx1">end time</label>
                                </div>

                            </div>

                            <div class="form-group row" >
                                <label for="experience" class="col-md-4 col-form-label text-md-right">{{ __('Experience') }}</label>

                                <div class="col-md-6" >
                                    <!-- <input id="experience" type="text" class="form-control " name="Experience"> -->
                                    <input type="text" class="form-control" name="experience"/>
                                </div>
                            </div>
                                {{-- testing --}}
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scriptsec')

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

        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('signin', {
            'size': 'invisible',
            'callback': function(response) {
                console.log("response ===" + response);
                // reCAPTCHA solved, allow signInWithPhoneNumber.
            }
        });
    };



    function mobileOTPVerify() {
        var code = document.getElementById("name").value;
        console.log("on submit call" + code);
        confirmationResult.confirm(code).then(function (result) {
            // User signed in successfully.
            console.log("otp result =" + JSON.stringify(result));
            var user = result.user;
            // ...
        }).catch(function (error) {
            console.log("otp err =" + JSON.stringify(error));
            // User couldn't sign in (bad verification code?)
            // ...
        });
    }

    function mobileSignup() {
        // Phone NUMBER
        var phoneNumber = "+91 7874019119";
        var appVerifier = window.recaptchaVerifier;
        firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
            .then(function (confirmationResult) {
                console.log("confirmationResult == " + JSON.stringify(confirmationResult));
                // SMS sent. Prompt user to type the code from the message, then sign the
                // user in with confirmationResult.confirm(code).
                window.confirmationResult = confirmationResult;
            }).catch(function (error) {
            console.log("error  == " + error);
            // Error; SMS not sent
            // ...
        });
    }

    function resendEmail() {
        window.user.sendEmailVerification().then(function (result) {
            console.log("result == " + JSON.stringify(result));
        }).catch(function (error) {
            console.log("result error == " + JSON.stringify(error));
        })
    }


    function emailSignup() {

        // EMAIL LOGIN
        firebase.auth().createUserWithEmailAndPassword("mk@savitriya.com", "password").then(function (response) {
            console.log("res" +  JSON.stringify(response));

            // var actionCodeSettings = {
            //     // URL you want to redirect back to. The domain (www.example.com) for this
            //     // URL must be whitelisted in the Firebase Console.
            //     url: 'http://localhost:8000/register?cartId=1234',
            //     // This must be true.
            //     handleCodeInApp: true,
            //     iOS: {
            //         bundleId: 'com.example.ios'
            //     },
            //     android: {
            //         packageName: 'com.example.android',
            //         installApp: true,
            //         minimumVersion: '12'
            //     },
            //     dynamicLinkDomain: 'layouts.Users.create'
            // };
            // console.log("email == " + firebase.auth().currentUser.email);
            // var actionCodeSettings = {
            //     url: 'http://my.jam.com/?email=' + firebase.auth().currentUser.email,
            //     iOS: {
            //         bundleId: 'com.example.ios'
            //     },
            //     android: {
            //         packageName: 'com.example.android',
            //         installApp: true,
            //         minimumVersion: '12'
            //     },
            //     handleCodeInApp: true,
            //     // When multiple custom dynamic link domains are defined, specify which
            //     // one to use.
            //     dynamicLinkDomain: "http://my.jam.com/register"
            // };
            // firebase.auth().currentUser.sendEmailVerification( )
            //     .then(function(response) {
            //         // Verification email sent.
            //
            //         console.log("response email = " + JSON.stringify(response));
            //     })
            //     .catch(function(error) {
            //         console.log(" error code = " + error.code);
            //         console.log("error  message = " + error.message);
            //         // Error occurred. Inspect error.code.
            //     });


            window.user = firebase.auth().currentUser;
            console.log("result user == " + JSON.stringify(window.user));
            user.sendEmailVerification().then(function (result) {
                console.log("result == " + JSON.stringify(result));
            }).catch(function (error) {
                console.log("result error == " + JSON.stringify(error));
            })
        }).catch(function(error) {
            console.log("code = " + error.code);
            console.log("message = " + error.message);
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            // ...
        });
    }

    function showfields()
    {

        var selectbox = document.getElementById('category').value;
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

    function myFunction() {
  var x = document.getElementById("inputMDEx1").value;

}
    </script>

@endsection
