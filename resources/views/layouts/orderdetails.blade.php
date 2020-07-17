@extends('layouts.admin')

@section('content')

        <div id="wrapper">
            <!-- Sidebar -->

        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
            <!-- TopBar -->
            <div class="custome_model">
                </div>
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                      <h1 class="h3 mb-0 text-gray-800">Order Details</h1>
                      <div class="custom-buttons">
                           <button type="button" id="back_btn" class="btn btn-secondary mb-1">Back</button>
                        </div>
                        @if (Auth::user()->roles[0]->slug == 'provider')
                            <div class="custom-buttons">
                                <button type="button" onclick="acceptOrder()" class="btn btn-primary mb-1" id="accept" data-text="Accepted">Accept</button>

                                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#exampleModal"
                            id="user_btn"> Cancel
                    </button>
                            </div>
                        @endif
                    </div>


                   <!-- modal  -->

                    <div class="card">

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Order Cancellation Reason</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <select class="form-control" id="reasons" required>
                                            <option>Select Reason for Cancel </option>
                                            <option>Too far</option>
                                            <option>Busy</option>
                                            <option>Not Available at that time</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Comment</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea3" rows="7" style="height: 100px;"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" onclick="cancelorder()" class="btn btn-primary">Save</button>

                                </div>
                            </div>
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
                                <div class="order-info-block">
                                    <i class="fas fa-user"></i>
                                    <span>Orderer Name</span>
                                    <p class="orderername" id="orderer_name">Afrar Sheikh</p>
                                </div>
                              </div>
                              <div class="order-info">
                                <div class="order-info-block">
                                  <span>Service</span>
                                  <p id="serviceName">Home Cleaning and Home Maids</p>
                                </div>
                              </div>
                              <div class="order-info">
                                <div class="order-info-block">
                                  <span>Service</span>
                                  <p id="serviceName">Home Cleaning and Home Maids</p>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 order-details-block">
                          <div class="card mb-4">
                            <div class="card-body">
                              <div class="order-info">
                                <div class="order-info-block">
                                <i class="fas fa-address-book"></i>

                                  <span>Address</span>
                                  <p id="addressname">11th/B Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet</p>
                                </div>
                              </div>
                              <div class="order-info">
                                <div class="order-info-block">
                                    <i class="fas fa-envelope"></i>
                                    <span>Email</span>
                                    <p id="email">info@partservice.com</p>
                                </div>
                              </div>
                              <div class="order-info">
                                <div class="order-info-block">
                                    <i class="fas fa-phone"></i>
                                    <span>Number</span>
                                    <p id="contact">+91 1234567890</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 order-details-block" id="invoice_detail">
                            <div class="card mb-4">
                                <div class="card-body">
                                  <div class="order-info">
                                    <div class="order-info-block">

                                        <span style="font-size: large;">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                            Invoice Details</span>


                                        {{-- <span class="float-right" style="font-size: large;">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                            Invoice Details</span> --}}
                                    </div>
                                  </div>
                                  <br>


                                    <div class="row order-info" style="padding-left: 15px;">
                                        <div class="col-4 order-info-block">
                                          <span>
                                            <i class="fas fa-hourglass-half"></i>
                                              Working Hours</span>
                                          <p style="padding-left: 15px;" id="work_hr">5</p>
                                        </div>

                                        <div class="col-4 order-info-block">
                                            <span>
                                                <i class="fas fa-balance-scale"></i>
                                                Material Quantity
                                            </span>
                                            <p style="padding-left: 15px;" id="mate_qty"> 5 </p>
                                        </div>

                                        <div class="col-4 order-info-block">
                                            <span>
                                                <i class="far fa-money-bill-alt"></i>
                                                Material Cost
                                            </span>
                                            <p style="padding-left: 15px;" id="mate_cost"> 5 </p>
                                        </div>

                                        <div class="col-4 order-info-block">
                                            <span>
                                                <i class="fas fa-hand-holding-usd"></i>
                                                Discount
                                            </span>
                                            <p style="padding-left: 15px;" id="discount"> 5 </p>
                                        </div>

                                        <div class="col-4 order-info-block">
                                            <span>
                                                <i class="fas fa-tenge"></i>
                                                TAX
                                            </span>
                                            <p style="padding-left: 15px;" id="tax"> 5 </p>
                                        </div>


                                        <div class="col-4 order-info-block">
                                            <span>
                                                <i class="far fa-money-bill-alt"></i>
                                                Additional Charge
                                            </span>
                                            <p style="padding-left: 15px;" id="add_charg"> 5 </p>
                                        </div>

                                      </div>

                                      <div class="d-flex justify-content-center">
                                        <div class="order-info-block">

                                            <span style="font-size: large;">
                                                <i class="fas fa-dollar-sign"></i>
                                                Total Cost</span>

                                                <p style="padding-left: 15px;" id="total_cost"> 5 </p>
                                        </div>
                                      </div>

                                </div>
                              </div>
                        </div>
                        <div class="col-md-12">
                          <div class="custom-buttons download-invoice-btn">
                            <button type="button" class="btn btn-primary mb-1" id="down_invoice" onclick="DownLoad_Invoice()">Download Invoice</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!---Container Fluid-->
                </div>
              </div>
            </div>
            <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
        </a>


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

        function acceptOrder() {
            console.log("accept" + document.getElementById('accept').innerHTML);
            var btnText = document.getElementById('accept').innerHTML;//$('#accept').text();
            var data =
                {
                    status: 2,
                    booking_id: Booking_id,
                };
              if(btnText == 'Accept')
              {
                data = {
                    status: 2,
                    booking_id: Booking_id,
                };
                  $('#accept').text('Complete');
                  //$('#Cancel').show();
              }
              else{
                data = {
                    status: 1,
                    booking_id: Booking_id,

                };
                $('#accept').text('Pending');
              }
            // var data =
            //     {
            //         status: 2,
            //         booking_id: Booking_id,
            //     };
            $.ajax({
                url: '/api/v1/booking_status',
                type: 'POST',
                data: data,
                success: function (response) {
                    console.log(response);
                    $('#status').text("Accepted");

                },
                fail: function (error) {
                    console.log(error);
                }
            });
        }

        function cancelorder() {

            console.log("are sure to cancel?");
            $.ajax({
                url: '/api/v1/booking_status',
                type: 'POST',
                data:Booking_id,
                success: function(response) {
                    console.log(Booking_id);
                    var status = "Pending";
                    if(response['status']  == 1) {
                        status = "Pending";
                    } else if(response['status']  == 2) {
                        status = "Accepted";
                    } else if(response['status']  == 3) {
                        status = "Cancel by Vendor";
                    } else if(response['status']  == 4) {
                        status = "Cancel by User";
                    } else if(response['status']  == 5) {
                        status = "Completed";
                    }
                    $('#status').text(status)
                    // "status" = 2,
                    // "booking_id" = 1,
                    // "reason" = "Too Slow",
                    // "comment" = "Its good but too slow",

                },fail: function (error) {
                  console.log(error);
                }
            });
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
                    var status = "Pending";
                    if(response['status']  == 1) {
                        status = "Pending";
                        $("#down_invoice").hide();
                        $("#invoice_detail").hide();

                    } else if(response['status']  == 2) {
                        status = "Accepted";
                        $("#down_invoice").hide();
                        $("#invoice_detail").hide();
                    } else if(response['status']  == 3) {
                        status = "Cancel by Vendor";
                        $("#down_invoice").hide();
                        $("#invoice_detail").hide();
                    } else if(response['status']  == 4) {
                        status = "Cancel by User";
                        $("#down_invoice").hide();
                        $("#invoice_detail").hide();
                    } else if(response['status']  == 5) {
                        status = "Completed";
                        $("#down_invoice").show();
                        $("#invoice_detail").show();
                        setInvoiceDetail(response);
                    } else if(response['status']  == 6) {
                        status = "Invoice Submitted";
                        $("#down_invoice").hide();
                        $("#invoice_detail").show();
                        setInvoiceDetail(response);



                        //
                    }

                    $('#status').text(status);
                    $('#orderer_name').text(response['orderer_name']);
                    $('#serviceName').text(response['services']['name']);
                    $('#contact').text(response['contact']);
                    $('#email').text(response['email']);
                    var addressLine = response['address']['name'] +response['address']['address_line1'] + " " +
                        response['address']['address_line2'] + response['address']['landmark'] +
                        response['address']['city'] + response['address']['district'] + response['address']['postal_code'];
                    $('#addressname').text(addressLine);
                    $('#address_line1').text(response['address_line1']);
                    $('#address_line2').text(response['address_line2']);

                },
                fail: function (error) {
                    console.log(error);
                }
            });
        }


        function setInvoiceDetail(response) {
            $('#work_hr').text(response.invoice.working_hr);
                        $('#mate_qty').text(response.invoice.material_quantity);
                        $('#mate_cost').text(response.invoice.material_price);
                        $('#discount').text(response.invoice.discount);
                        $('#tax').text(response.invoice.tax);
                        $('#add_charg').text(response.invoice.additional_charges);


                        var cost = response.provider.service_price.price;

                        var serviceAmount = response.invoice.working_hr * cost;

                        var meterialAmount = response.invoice.material_quantity * response.invoice.material_price;
                        var additional_total = response.invoice.additional_charges * response.invoice.working_hr;
                        var sub_total = serviceAmount + additional_total + meterialAmount;

                        var total_discount = sub_total * response.invoice.discount/100;

                        var totalWithDiscount = sub_total - total_discount;

                        var taxCut =  totalWithDiscount * response.invoice.tax /100;

                        var total = totalWithDiscount - taxCut;
                        $('#total_cost').text(total + "  QAR");
        }

        function DownLoad_Invoice(){
          $.ajax({
            url: 'api/v1/invoice?id=' + Booking_id,
              type: 'POST',
              success: function() {
                  window.location = 'api/v1/invoice?id=' + Booking_id;
              }
          });
        }


        // Back Button
        $("#back_btn").click(function (){
           window.history.back();
        });


        </script>
@endsection
