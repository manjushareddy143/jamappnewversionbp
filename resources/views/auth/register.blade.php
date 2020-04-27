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
                          <a class="nav-link active" id="individual-tab" data-toggle="tab" href="#individual" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-user"></i> For Individual</a>
                        </li>
                        <li class="nav-item second-tab">
                          <a class="nav-link" id="organization-tab" data-toggle="tab" href="#organization" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-users"></i> For Organization <br/></a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="individual" role="tabpanel" aria-labelledby="individual-tab">
                          <form methpd="post" action="">
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
                              <button type="submit" class="btn btn-primary btn-block" onclick="openForm()">Sign Up</button>
                            </div>
                          </form>

                         <!-- OTP FOrm -->

                                                    <div class="login-popup">
                                                    <div class="form-popup" id="popupForm">
                                                      <form action="#" class="form-container">
                                                    <div class="form-group">
                                                    <label>Mobile Number <strong>*</strong></label>
                                                    <input type="text" class="form-control" id="mobile" placeholder="Enter Number">
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
                                                
                                                <!-- OTP FOrm -->
                        </div>
                        <div class="tab-pane fade" id="organization" role="tabpanel" aria-labelledby="organization-tab">
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
                             <button type="submit" class="btn btn-primary btn-block" onclick="openForm()">Sign Up</button>
                            </div>
                         </form>

                         <!-- OTP FOrm -->

                                                    <div class="login-popup">
                                                    <div class="form-popup" id="popupForm">
                                                      <form action="#" class="form-container">
                                                    <div class="form-group">
                                                    <label>Mobile Number <strong>*</strong></label>
                                                    <input type="text" class="form-control" id="mobile" placeholder="Enter Number">
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

                                                <!-- OTP FOrm -->
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


<!-- css for otp popup form -->
<style>
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
      background-color: #8ebf42;
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
    </style>