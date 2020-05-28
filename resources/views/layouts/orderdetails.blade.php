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
                                  <label class="text-xs font-weight-bold text-uppercase mb-1">Order Number</label>
                                  <br>
                                  <span class="h5 mb-0 font-weight-bold text-gray-800" id="Booking_id">#A5990245</span>
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
                                  <label class="text-xs font-weight-bold text-uppercase mb-1">Date</label>
                                  <br>
                                  <span class="h5 mb-0 font-weight-bold text-gray-800" id="booking_date">10-Mar-2020</span>
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
                                  <label class="text-xs font-weight-bold text-uppercase mb-1">Time</label>
                                  <br>
                                  <span class="h5 mb-0 font-weight-bold text-gray-800" id="start_time">1:00 PM</span>
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
                                  <label class="text-xs font-weight-bold text-uppercase mb-1">Status</label>
                                  <br>
                                  <span class="h5 mb-0 font-weight-bold text-gray-800" id="status">Complete</span>
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
                                  <span>Orderer Name</span>
                                  <p class="orderername" id="orderer_name">Afrar Sheikh</p>
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
                                  <p id=addressname>11th/B Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet</p>
                                  <p id=address_line1>11th/B Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet</p>
                                  <p id=address_line2>11th/B Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet</p>
                                </div>
                              </div>
                              <div class="order-info">
                                <i class="fas fa-envelope"></i>
                                <div class="order-info-block">
                                  <span>Email</span>
                                  <p id="email">info@partservice.com</p>
                                </div>
                              </div>
                              <div class="order-info">
                                <i class="fas fa-phone"></i>
                                <div class="order-info-block">
                                  <span>Number</span>
                                  <p id="contact">+91 1234567890</p>
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

        window.addEventListener ?
            window.addEventListener("load",onLoad(),false) :
            window.attachEvent && window.attachEvent("onload",onLoad());
        var Booking_id;
        function onLoad() {
            Booking_id = getUrlParameter('id');
            console.log(Booking_id);
            // alert(user_id);
            viewDetail();
        }

        function getUrlParameter(sParam)
        {
            var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++)
            {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam)
                {
                    return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
        }

        function viewDetail() {
            console.log("helo");
            $.ajax({
                url: '/api/v1/booking/' + Booking_id,
                type: 'GET',
                data: null,
                success: function (response) {

                    console.log(response);
                    $('#Booking_id').text(response['id']);
                    $('#booking_date').text(response['booking_date']);
                    $('#start_time').text(response['start_time']);
                    $('#status').text(response['status']);
                    $('#orderer_name').text(response['orderer_name']);
                    $('#service').text(response['service_id']);
                    $('#contact').text(response['contact']);
                    $('#email').text(response['email']);
                    $('#address').text(response['address']);
                    $('#address_line1').text(response['address_line1']);
                    $('#address_line2').text(response['address_line2']);

                },
                fail: function (error) {
                    console.log(error);
                }
            });
        }


        </script>
      </body>
    </html>
@endsection
