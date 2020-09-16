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

                        @if (Auth::user()->roles[0]->slug == 'provider')
                            <div class="custom-buttons" style="padding-left: 60%;">
                                <button type="button" onclick="acceptOrder()" class="btn btn-primary mb-1" id="accept" data-text="Accepted">Accept</button>

                                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#exampleModal"
                                id="cancel_btn"> Cancel
                                </button>
                            </div>
                        @endif
                        <div class="custom-buttons">


                            <button type="button" class="btn btn-primary mb-1" id="down_invoice" onclick="DownLoad_Invoice()">Download Invoice</button>

                            <button type="button" onclick="acceptOrder()" class="btn btn-primary mb-1" id="accept" data-text="Accepted">Accept</button>
                            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#exampleModal"
                                id="cancel_btn"> Cancel
                                </button>
                           <button type="button" id="back_btn" class="btn btn-secondary mb-1">Back</button>



                        </div>
                    </div>


                   <!-- modal  -->

                    <div class="card">

                        <div class="modal fade" id="otpModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Complete Order</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <style>
                                            #partitioned {
                                                    padding-left: 15px;
                                                    letter-spacing: 42px;
                                                    border: 0;
                                                    background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
                                                    background-position: bottom;
                                                    background-size: 50px 1px;
                                                    background-repeat: repeat-x;
                                                    background-position-x: 35px;
                                                    width: 220px;
                                                    }
                                            </style>

                                        <div class="form-group">
                                            <div>
                                                <label>Enter OTP</label>
                                            </div>
                                            <input id="partitioned" type="text" maxlength="4" minlength="4"/>
                                            <div>
                                                <label id="otpError" style="color: red"></label>
                                            </div>
                                        </div>
                                        <!--div class="form-group">

                                            <textarea class="form-control" id="exampleFormControlTextarea3" rows="7" style="height: 100px;"></textarea>
                                        </div-->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" onclick="submitOTP()" class="btn btn-primary">Save</button>

                                    </div>
                                </div>
                            </div>
                        </div>




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
                              <div class="order-info" id="cateId">
                                <div class="order-info-block">
                                  <span>Category</span>
                                  <p id="categoryName">Home Cleaning and Home Maids</p>
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

                                <!-- edit button -->
                                  <span style="float: right;">
                                  <a href="#" onclick="Edit_InvoiceDetail()" class="btn btn-primary" data-toggle="modal" data-target="#InvoiceModalLabel" id="invoice_id">
                                  <i class="fas fa-edit"></i></a>
                                  </span>

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

                        </div>
                      </div>
                    </div>
                  </div>
                  <!---Container Fluid-->
                </div>
              </div>
            </div>
            <!-- Scroll to top -->

                               <!-- modal  -->

                      <div class="card">
                        <div class="modal fade" id="InvoiceModalLabel" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="InvoiceModalText">Edit Invoice</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form>
                                            <div class="row">
                                            <div class="col-md-6 float-l">
                                            <div class="form-group">
                                            <label for="quantity">Working Hours:</label><br>
                                            <input type="number" id="work_hrs" name="hours" min="1" max="500"value="0">
                                            </div>
                                            </div>
                                            <div class="col-md-6 float-l">
                                            <div class="form-group">
                                            <label for="quantity">Material Quantity:</label><br>
                                            <input type="number" id="mat_quantity" name="quantity" min="1" max="500"value="0">
                                            </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6 float-l">
                                            <div class="form-group">
                                            <label for="quantity">Material Cost:</label><br>
                                            <input type="number" id="mat_cost" name="cost" min="1" max="500" value="0">
                                            </div>
                                            </div>
                                            <div class="col-md-6 float-l">
                                            <div class="form-group">
                                            <label for="quantity">Discount:</label><br>
                                            <input type="number" id="mat_dis" name="discount" min="1" max="500" value="0">
                                            </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6 float-l">
                                            <div class="form-group">
                                            <label for="quantity">TAX:</label><br>
                                            <input type="number" id="mat_tax" name="tax" min="1" max="500"value="0">
                                            </div>
                                            </div>
                                            <div class="col-md-6 float-l">
                                            <div class="form-group">
                                            <label for="quantity">Additional Charge:</label><br>
                                            <input type="number" id="add_charge" name="charge" min="1" max="500" value="0">
                                            </div>
                                            </div>
                                            </div>

                                    </form>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button id="btnUpdateInvoice" type="button" onclick="Update_InvoiceDetail()" class="btn btn-primary">Update</button>
                                        <button id="btnAddInvoice" type="button" onclick="Update_InvoiceDetail()" class="btn btn-primary">Submit</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- model -->

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
            viewDetail();
        }

        function submitOTP() {

            if($("#partitioned").val().length < 4) {
                $("#otpError").text("Please enter OTP");
            } else {
                $("#otpError").text("");
                data = {
                    status: 5,
                    booking_id: Booking_id,
                    otp: $("#partitioned").val(),
                };

                $.ajax({
                    url: '/api/v1/booking_status',
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        console.log(response);
                        window.top.location = window.top.location;
                        location.reload();
                        $('#accept').text('Completed');

                    },
                    error: function (error) {
                        console.log(error.responseJSON.error);
                        var msgStr = "";
                        $.each(error.responseJSON.error, function (i, err) {
                            $.each(err, function (title, msg) {
                                msgStr += msg.toString() + "\n";
                            });
                            $("#otpError").text(msgStr);

                        });
                    }
                });
            }
        }

        function acceptOrder() {
            console.log("accept" + document.getElementById('accept').innerHTML);
            var btnText = document.getElementById('accept').innerHTML;//$('#accept').text();
            var data = {};
              if(btnText == 'Accept')
              {
                data = {
                    status: 2,
                    booking_id: Booking_id,
                };
                $.ajax({
                    url: '/api/v1/booking_status',
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        console.log(response);
                        $('#accept').text('Submit Invoice');
                    },
                    fail: function (error) {
                        console.log(error);
                    }
                });

                  //$('#Cancel').show();
              } else if(btnText == 'Submit Invoice') {
                data = {
                    status: 6,
                    booking_id: Booking_id,
                };
                $('#btnUpdateInvoice').hide();
                $('#InvoiceModalLabel').modal();
                $('#InvoiceModalText').text("Add Invoice");
              } else if(btnText == 'Complete') {

                $('#otpModal').modal();

                console.log("data ===", data);

                //   $('#accept').text('Finished');
                  //$('#Cancel').show();
              } else{
                data = {
                    status: 1,
                    booking_id: Booking_id,

                };
                $('#accept').text('Pending');
              }

              console.log("data ===", data);


        }

        function cancelorder() {

            data = {
                status: 3,
                booking_id: Booking_id,
                reason: $('#reasons').children("option:selected").val(),

            };


            if(($('#exampleFormControlTextarea3').val() != "")) {
                data = {
                    status: 3,
                    booking_id: Booking_id,
                    reason: $('#reasons').children("option:selected").val(),
                    comment : $('#exampleFormControlTextarea3').val()
                };
            }
            $.ajax({
                url: '/api/v1/booking_status',
                type: 'POST',
                data:data,
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
                    window.top.location = window.top.location;
                    location.reload();

                },fail: function (error) {
                  console.log(error);
                }
            });
        }

        function getUrlParameter(sParam) {
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

        var invoiceDetail;
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
                        $('#accept').text("Accept");
                        $("#down_invoice").hide();
                        $("#invoice_detail").hide();
                        $("#invoice_id").hide();
                    } else if(response['status']  == 2) {
                        status = "Accepted";
                        $('#accept').text("Submit Invoice");
                        $("#down_invoice").hide();
                        $("#invoice_detail").hide();
                        $("#invoice_id").hide();
                    } else if(response['status']  == 3) {
                        status = "Cancel by Vendor";
                        $('#accept').hide();
                        $("#down_invoice").hide();
                        $("#invoice_detail").hide();
                        $("#invoice_id").hide();
                        $("#cancel_btn").hide();
                    } else if(response['status']  == 4) {
                        status = "Cancel by User";
                        $('#accept').hide();
                        $("#down_invoice").hide();
                        $("#invoice_detail").hide();
                        $("#invoice_id").hide();
                        $("#cancel_btn").hide();
                    } else if(response['status']  == 5) {
                        status = "Completed";
                        $('#accept').hide();
                        $("#down_invoice").show();
                        $("#invoice_detail").show();
                        $("#invoice_id").hide();
                        $("#cancel_btn").hide();
                        setInvoiceDetail(response);
                    } else if(response['status']  == 6) {
                        status = "Invoice Submitted";
                        btnStatus = "Complete";
                        $("#down_invoice").hide();
                        $("#invoice_detail").show();
                        $("#invoice_id").show();
                        $("#cancel_btn").hide();

                        setInvoiceDetail(response);
                        $('#accept').text(btnStatus);

                    }
                    $('#status').text(status);



                    $('#orderer_name').text(response['orderer_name']);
                    $('#serviceName').text(response['services']['name']);
                    if(response['category'] == null) {

                        $('#cateId').hide();


                    } else {
                        $('#categoryName').text(response['category']['name']);
                    }

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

            invoiceDetail = response.invoice;
            $('#work_hr').text(response.invoice.working_hr);
            $('#mate_qty').text(response.invoice.material_quantity);
            $('#mate_cost').text(response.invoice.material_price);
            $('#discount').text(response.invoice.discount);
            $('#tax').text(response.invoice.tax);
            $('#add_charg').text(response.invoice.additional_charges);

            var cost = response.provider.service_price.price;

            var serviceAmount = response.invoice.working_hr * cost; // 5

            var meterialAmount = response.invoice.material_quantity * response.invoice.material_price; // 10

            var additional_total = response.invoice.additional_charges * response.invoice.working_hr; // 10

            var sub_total = serviceAmount + additional_total + meterialAmount;  // 70

            var total_discount = sub_total - ((response.invoice.discount * 100 )/100); // 60

            var taxCut =  (total_discount * response.invoice.tax)/100;

            var total = total_discount + taxCut;

            $('#total_cost').text(total + "  QAR");
        }

        function DownLoad_Invoice() {
            window.location = 'api/v1/invoice_download?id=' + Booking_id;
        }

        function Edit_InvoiceDetail() {
            $('#work_hrs').val(invoiceDetail.working_hr);
            $('#mat_quantity').val(invoiceDetail.material_quantity);
            $('#mat_cost').val(invoiceDetail.material_price);
            $('#mat_dis').val(invoiceDetail.discount);
            $('#mat_tax').val(invoiceDetail.tax);
            $('#add_charge').val(invoiceDetail.additional_charges);
            $('#btnAddInvoice').hide();
        }

        function Update_InvoiceDetail() {
            // console.log(document.getElementById("work_hrs").value);

            var data = {
                order_id : Booking_id,
                working_hr : document.getElementById("work_hrs").value,
                material_quantity : document.getElementById("mat_quantity").value,
                material_price : document.getElementById("mat_cost").value,
                discount : document.getElementById("mat_dis").value,
                tax : document.getElementById("mat_tax").value,
                additional_charges : document.getElementById("add_charge").value,
            };
            console.log(data);
            // let formUpdate = new FormData();
            // formUpdate.append('id', invoiceDetail.order_id);
            // formUpdate.append('working_hr', document.getElementById("work_hrs").value);
            // formUpdate.append('material_quantity', document.getElementById("mat_quantity").value);
            // formUpdate.append('material_price', document.getElementById("mat_cost").value);
            // formUpdate.append('discount', document.getElementById("mat_dis").value);
            // formUpdate.append('tax', document.getElementById("mat_tax").value);
            // formUpdate.append('additional_charges', document.getElementById("add_charge").value);

            // invoiceDetail=order_id;
            $.ajax({
                url: '/api/v1/inv_update',
                type: 'POST',
                    data: data,
                    success: function (response) {
                        console.log("response ==", response);
                        window.top.location = window.top.location;
                        location.reload();
                    },
                    fail: function (error) {
                        console.log(error);
                    }
            });
        }

        $("#back_btn").click(function () {
           window.history.back();
        });


        </script>
@endsection
