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
                              <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                              <label>Mobile Number <strong>*</strong></label>
                              <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Number">
                            </div>
                            <div class="form-group">
                              <label>Email Address <strong>*</strong></label>
                              <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Enter Your Email Address">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Resident Status <strong>*</strong></label>
                              <select class="form-control" id="exampleFormControlSelect1">
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
                              <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                            </div>
                          </form>
                        </div>
                        <div class="tab-pane fade" id="organization" role="tabpanel" aria-labelledby="organization-tab">
                          <span>Proprietorship Firm / Partnership Firm / Company / Business Establishment</span>
                          <form>
                            <div class="form-group">
                              <label>Name <strong>*</strong></label>
                              <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                              <label>Mobile Number <strong>*</strong></label>
                              <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Number">
                            </div>
                            <div class="form-group">
                              <label>Email Address <strong>*</strong></label>
                              <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Enter Your Email Address">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Resident Status <strong>*</strong></label>
                              <select class="form-control" id="exampleFormControlSelect1">
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
                              <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
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
    <!-- Service Provider Sign-Up Content -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
  </body>
</html>

