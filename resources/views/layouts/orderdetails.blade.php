@extends('layouts.admin')

@section('content')

    <body id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->

        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
            <!-- TopBar -->
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                      <h1 class="h3 mb-0 text-gray-800">Order Details</h1>
                      <div class="custom-buttons">
                        <button type="button" class="btn btn-primary mb-1">Create</button>
                        <button type="button" class="btn btn-secondary mb-1">Back</button>
                      </div>
                    </div>
                    <div class="order-details-container">
                      <div class="row mb-3">
                        <!-- Order Number -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card">
                            <div class="card-body">
                              <div class="row align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Order Number</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">#A5990245</div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-shopping-cart fa-2x text-primary"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Order Date -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Date</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">10-Mar-2020</div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-calendar-alt fa-2x text-success"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Order Time -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Time</div>
                                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">1:00 PM</div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-clock fa-2x text-info"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Order Status -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Status</div>
                                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Complete</div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-smile fa-2x text-warning"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 order-details-block">
                          <div class="card mb-4">
                            <div class="card-body">
                              <div class="order-info">
                                <i class="fas fa-user"></i>
                                <div class="order-info-block">
                                  <span>Vendor Name</span>
                                  <p class="vendorname">Afrar Sheikh</p>
                                </div>
                              </div>
                              <div class="order-info">
                                <div class="order-info-block">
                                  <span>Service</span>
                                  <p>Home Cleaning and Home Maids</p>
                                </div>
                              </div>
                              <div class="order-info">
                                <div class="order-info-block">
                                  <span>Sub Category</span>
                                  <p>Sofa Cleaning</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 order-details-block">
                          <div class="card mb-4">
                            <div class="card-body">
                              <div class="order-info">
                                <i class="fas fa-address-book"></i>
                                <div class="order-info-block">
                                  <span>Address</span>
                                  <p>11th/B Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet</p>
                                </div>
                              </div>
                              <div class="order-info">
                                <i class="fas fa-envelope"></i>
                                <div class="order-info-block">
                                  <span>Email</span>
                                  <p>info@partservice.com</p>
                                </div>
                              </div>
                              <div class="order-info">
                                <i class="fas fa-phone"></i>
                                <div class="order-info-block">
                                  <span>Number</span>
                                  <p>+91 1234567890</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="custom-buttons download-invoice-btn">
                            <button type="button" class="btn btn-primary mb-1">Download Invoice</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!---Container Fluid-->
                </div>
                <!-- Footer -->
                                    {{-- <footer class="sticky-footer bg-white">
                                    <div class="container my-auto">
                                        <div class="copyright text-center my-auto">
                                        <span>© 2020 JAM.
                                        </span>
                                        </div>
                                    </div>
                                    </footer> --}}
                <!-- Footer -->
              </div>
            </div>
            <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
        </a>
        {{-- <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/ruang-admin.min.js"></script> --}}
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"> </script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript">

            function onLoad() {
                Booking_id = getUrlParameter('id');
                console.log(Booking_id);
            }



        </script>
      </body>
    </html>
@endsection
