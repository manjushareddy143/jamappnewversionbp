@extends('layouts.admin')

@section('content')
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="img/logo/logo.png" rel="icon">
        <title>JAM - Dashboard</title>
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/ruang-admin.css') }}" rel="stylesheet">

{{--        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>--}}
{{--        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}

{{--        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">--}}

    </head>
    <body>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard MMM</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="service_btn">Complete your Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="addform">

                        <div class="panel panel-default">
                            <div class="panel-body text-center">
                                <image id="profileImage" src="{{ asset('img/boy.png') }}"
                                       style="width: 100px; height: 100px; border-radius: 100%;"/>
                                <input id="imageUpload" type="file"
                                       name="profile_photo" placeholder="Photo" required="" capture>
                            </div>
                        </div>

                        <div class="col-md-6 float-l" id="doctypelistdiv">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Document</label>
                                <select class="form-control" id="doctypelist">
                                    <option>Passport</option>
                                    <option>Resident</option>
                                    <option>Permit/Govt ID</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 float-r">
                            <div class="form-group">
                                <label>Document</label>
                                <input id="docupload" type="file" name="docupload" class="form-control ">
                            </div>
                        </div>



                        <div class="row-cols-md-6" id="servicediv">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Service</label>
                                <select class="form-control" id="servicelist">
                                </select>
                            </div>
                        </div>


                        <div class="col" id="categorydiv">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Category</label>
                                <select class="form-control" id="categorylist" multiple="multiple">
                                </select>
                            </div>
                        </div>


{{--                        ADDRESSS                        --}}

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
                           aria-controls="collapseTable">
{{--                            <i class="fas fa-fw fa-table"></i>--}}
                            <i class="fas fa-address-card"></i>
                            <span>Address</span>
                        </a>

                        <div class="col-md-12 collapse" id="collapseTable">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address Name</label>
                                        <input id="address_name" type="text" name="address_name" placeholder="Office Address"
                                               class="form-control" required>
                                    </div>
                                </div>


                                <div class="col-md-6 float-l">
                                    <div class="form-group">
                                        <label>Address line 1</label>
                                        <input id="address_line1" type="text" name="address_line1" placeholder="Address line 1"
                                               class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6 float-r">
                                    <div class="form-group">
                                        <label>Address line 2</label>
                                        <input id="address_line2" type="text" name="address_line2" placeholder="Address line 2"
                                               class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6 float-l">
                                    <div class="form-group">
                                        <label>Landmark</label>
                                        <input id="landmark" type="text" name="landmark" placeholder="Enter Landmark"
                                               class="form-control" required>
                                    </div>
                                </div>


                                <div class="col-md-6 float-r">
                                    <div class="form-group">
                                        <label>District</label>
                                        <input id="district" type="text" name="district" placeholder="Enter District"
                                               class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6 float-l">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input id="city" type="text" name="city" placeholder="Enter City"
                                               class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6 float-r">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input id="postal_code" type="text" name="postal_code" placeholder="Enter Postal Code"
                                               class="form-control" required>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" onclick="saveProfile()" class="btn btn-primary">Save</button>
                        </div>



                    </form>

                </div>

                <style>
                    hr.solid {
                        border-top: 3px solid #bbb;
                    }
                    #imageUpload
                    {
                        display: none;
                    }

                    #profileImage
                    {
                        cursor: pointer;
                    }
                </style>

            </div>
        </div>
    </div>
    <!-- Modal -->


    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{--    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>--}}
{{--    <script src="{{ asset('js/ruang-admin.min.js') }}"></script>--}}
{{--    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>--}}
{{--    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>--}}
<script type="text/javascript">

    function previewProfileImage( uploader ) {
            if (uploader.files && uploader.files[0]) {
                var imageFile = uploader.files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#profileImage').attr('src', e.target.result);
                }
                reader.readAsDataURL( imageFile );
            }
        }

    $("#imageUpload").change(function(){
            previewProfileImage( this );
        });

    $("#profileImage").click(function(e) {
            $("#imageUpload").click();
        });

    window.addEventListener ?
    window.addEventListener("load",onLoad(),false) :
    window.attachEvent && window.attachEvent("onload",onLoad());

    function onLoad() {
            console.log("asdasdas");

        var retrievedObject = localStorage.getItem('userObject');
        console.log(retrievedObject)
        var obj = JSON.parse(retrievedObject);

        if(obj.address === null) {
            getServices();

            $('#exampleModal').modal({
                backdrop: 'static',
                keyboard: false
            })
        }

        }



    function getServices() {
        $.ajax({
            url: '/api/v1/all_services',
            type: 'GET',
            success: function(response){
                console.log(response);
                if(response['status'] == 204) {
                    console.log(response);
                } else {
                    for(var i = 0; i < response.length; i ++) {
                        console.log(response[i].name);
                        $('#servicelist').append(`<option value="${response[i].id}">
                                   ${response[i].name}
                              </option>`);
                    }
                    var selected_id = $('#servicelist').children("option:selected").val();
                    console.log(selected_id);
                    setCategories(selected_id);
                }
            },
            fail: function (error) {
                console.log(error);
            }
        });
    }

    $("#servicelist").change(function(){
            var selected_id = $('#servicelist').children("option:selected").val();
            $('#categorylist').empty();
            setCategories( selected_id );
        });



    function setCategories(selected_id) {
        console.log(selected_id);
        $.ajax({
            url: '/api/v1/services/category?id=' + selected_id,
            type: 'GET',
            success: function(response){
                console.log(response);
                if(response['status'] == 204) {
                    console.log(response);
                } else {
                    for(var i = 0; i < response.length; i ++) {
                        $('#categorylist').append(`<option value="${response[i].id}">
                                   ${response[i].name}
                              </option>`);
                    }
                }
            },
            fail: function (error) {
                console.log(error);
            }
        });
    }

    function validateForm() {
        var profilePhoto = $('#imageUpload')[0].files[0];
        if (!profilePhoto) {
            return false;
        }

        var docupload = $('#docupload')[0].files[0];
        if (!docupload) {
            return false;
        }

        var selectedCategories  = $('#categorylist').children("option:selected");

        if (selectedCategories.length <= 0) {
            return false;
        }

        if($('#collapseTable').is(':visible')) {
            console.log("TOTOTO");
        } else {
            $('#collapseTable').modal('show');
        }

        if(document.getElementById("address_name").value == "" ) {
            // EXPAND ADDRESS FORM
            return false;
        }

        if(document.getElementById("address_line1").value == "" ) {
            return false;
        }

        if(document.getElementById("district").value == "" ) {
            return false;
        }

        if(document.getElementById("city").value == "" ) {
            // EXPAND ADDRESS FORM
            return false;
        }

        if(document.getElementById("postal_code").value == "" ) {
            // EXPAND ADDRESS FORM
            return false;
        }
        return true;
    }

    function saveProfile() {
        if(validateForm()) {
            console.log("VALIDATE FORM");
            apiCall();
        } else {
            console.log("INVALIDATE FORM");
        }

    }

    function apiCall() {
        var form = new FormData();
        var files = $('#imageUpload')[0].files[0];
        form.append('profile_photo',files);
        var doc_files = $('#docupload')[0].files[0];
        form.append('identity_proof',doc_files);
        var retrievedObject = localStorage.getItem('userObject');
        var obj = JSON.parse(retrievedObject);
        console.log("IDDD==" + obj.id);
        $addressdata = {
            name: document.getElementById("address_name").value,
            address_line1: document.getElementById("address_line1").value,
            address_line2: document.getElementById("address_line2").value,
            landmark: document.getElementById("landmark").value,
            district: document.getElementById("district").value,
            city: document.getElementsByTagName("city").value,
            postal_code : document.getElementsByTagName("postal_code").value,
            user_id : obj.id,
            location : "",
        };
        console.log($addressdata)
        form.append('address', JSON.stringify($addressdata));

        var services = [];
        var selected_id = $('#servicelist').children("option:selected").val();
        var selectedCategories  = $('#categorylist').children("option:selected");
        selectedCategories.each(function () {
            console.log($(this).val());
            var data = {};
            data.service_id = parseInt(selected_id),
            data.category_id = parseInt($(this).val());
            services.push(data);
        })

        console.log(services)
        form.append('services', JSON.stringify(services));

        form.append('doc_type', $('#doctypelist').children("option:selected").val());
        console.log($('#doctypelist').children("option:selected").val());



        form.append('id', obj.id);




        $.ajax({
            url: '/api/v1/profile',
            type: 'POST',
            data: form,
            contentType: false,
            processData: false,
            success: function(response){
                console.log(response);
                $('#exampleModal').modal('hide')
                localStorage.setItem('userObject', JSON.stringify(response));
                // $('#mytable').data.reload();
                window.top.location = window.top.location;
                // $( "#table align-items-center table-flush" ).load( "your-current-page.html #mytable" );
                // $('#table align-items-center table-flush').dataTable().ajax.reload();
            },
            fail: function (error) {
                console.log(error);
            }
        });
    }

    </script>
    </body>


{{--          <div class="row mb-3">--}}
{{--            <!-- Earnings (Monthly) Card Example -->--}}
{{--            <div class="col-xl-3 col-md-6 mb-4">--}}
{{--              <div class="card h-100">--}}
{{--                <div class="card-body">--}}
{{--                  <div class="row align-items-center">--}}
{{--                    <div class="col mr-2">--}}
{{--                      <div class="text-xs font-weight-bold text-uppercase mb-1">Earnings (Monthly)</div>--}}
{{--                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>--}}
{{--                      <div class="mt-2 mb-0 text-muted text-xs">--}}
{{--                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>--}}
{{--                        <span>Since last month</span>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-auto">--}}
{{--                      <i class="fas fa-calendar fa-2x text-primary"></i>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <!-- Earnings (Annual) Card Example -->--}}
{{--            <div class="col-xl-3 col-md-6 mb-4">--}}
{{--              <div class="card h-100">--}}
{{--                <div class="card-body">--}}
{{--                  <div class="row no-gutters align-items-center">--}}
{{--                    <div class="col mr-2">--}}
{{--                      <div class="text-xs font-weight-bold text-uppercase mb-1">Sales</div>--}}
{{--                      <div class="h5 mb-0 font-weight-bold text-gray-800">650</div>--}}
{{--                      <div class="mt-2 mb-0 text-muted text-xs">--}}
{{--                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>--}}
{{--                        <span>Since last years</span>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-auto">--}}
{{--                      <i class="fas fa-shopping-cart fa-2x text-success"></i>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <!-- New User Card Example -->--}}
{{--            <div class="col-xl-3 col-md-6 mb-4">--}}
{{--              <div class="card h-100">--}}
{{--                <div class="card-body">--}}
{{--                  <div class="row no-gutters align-items-center">--}}
{{--                    <div class="col mr-2">--}}
{{--                      <div class="text-xs font-weight-bold text-uppercase mb-1">New User</div>--}}
{{--                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">366</div>--}}
{{--                      <div class="mt-2 mb-0 text-muted text-xs">--}}
{{--                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>--}}
{{--                        <span>Since last month</span>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-auto">--}}
{{--                      <i class="fas fa-users fa-2x text-info"></i>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <!-- Pending Requests Card Example -->--}}
{{--            <div class="col-xl-3 col-md-6 mb-4">--}}
{{--              <div class="card h-100">--}}
{{--                <div class="card-body">--}}
{{--                  <div class="row no-gutters align-items-center">--}}
{{--                    <div class="col mr-2">--}}
{{--                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Requests</div>--}}
{{--                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>--}}
{{--                      <div class="mt-2 mb-0 text-muted text-xs">--}}
{{--                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>--}}
{{--                        <span>Since yesterday</span>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-auto">--}}
{{--                      <i class="fas fa-comments fa-2x text-warning"></i>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}

{{--            <!-- Area Chart -->--}}
{{--            <div class="col-xl-8 col-lg-7">--}}
{{--              <div class="card mb-4">--}}
{{--                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">--}}
{{--                  <h6 class="m-0 font-weight-bold text-primary">Monthly Recap Report</h6>--}}
{{--                  <div class="dropdown no-arrow">--}}
{{--                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"--}}
{{--                      aria-haspopup="true" aria-expanded="false">--}}
{{--                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"--}}
{{--                      aria-labelledby="dropdownMenuLink">--}}
{{--                      <div class="dropdown-header">Dropdown Header:</div>--}}
{{--                      <a class="dropdown-item" href="#">Action</a>--}}
{{--                      <a class="dropdown-item" href="#">Another action</a>--}}
{{--                      <div class="dropdown-divider"></div>--}}
{{--                      <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                  <div class="chart-area">--}}
{{--                    <canvas id="myAreaChart"></canvas>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <!-- Pie Chart -->--}}
{{--            <div class="col-xl-4 col-lg-5">--}}
{{--              <div class="card mb-4">--}}
{{--                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">--}}
{{--                  <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>--}}
{{--                  <div class="dropdown no-arrow">--}}
{{--                    <a class="dropdown-toggle btn btn-primary btn-sm" href="#" role="button" id="dropdownMenuLink"--}}
{{--                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                      Month <i class="fas fa-chevron-down"></i>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"--}}
{{--                      aria-labelledby="dropdownMenuLink">--}}
{{--                      <div class="dropdown-header">Select Periode</div>--}}
{{--                      <a class="dropdown-item" href="#">Today</a>--}}
{{--                      <a class="dropdown-item" href="#">Week</a>--}}
{{--                      <a class="dropdown-item active" href="#">Month</a>--}}
{{--                      <a class="dropdown-item" href="#">This Year</a>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                  <div class="mb-3">--}}
{{--                    <div class="small text-gray-500">Oblong T-Shirt--}}
{{--                      <div class="small float-right"><b>600 of 800 Items</b></div>--}}
{{--                    </div>--}}
{{--                    <div class="progress" style="height: 12px;">--}}
{{--                      <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80"--}}
{{--                        aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                  <div class="mb-3">--}}
{{--                    <div class="small text-gray-500">Gundam 90'Editions--}}
{{--                      <div class="small float-right"><b>500 of 800 Items</b></div>--}}
{{--                    </div>--}}
{{--                    <div class="progress" style="height: 12px;">--}}
{{--                      <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70"--}}
{{--                        aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                  <div class="mb-3">--}}
{{--                    <div class="small text-gray-500">Rounded Hat--}}
{{--                      <div class="small float-right"><b>455 of 800 Items</b></div>--}}
{{--                    </div>--}}
{{--                    <div class="progress" style="height: 12px;">--}}
{{--                      <div class="progress-bar bg-danger" role="progressbar" style="width: 55%" aria-valuenow="55"--}}
{{--                        aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                  <div class="mb-3">--}}
{{--                    <div class="small text-gray-500">Indomie Goreng--}}
{{--                      <div class="small float-right"><b>400 of 800 Items</b></div>--}}
{{--                    </div>--}}
{{--                    <div class="progress" style="height: 12px;">--}}
{{--                      <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"--}}
{{--                        aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                  <div class="mb-3">--}}
{{--                    <div class="small text-gray-500">Remote Control Car Racing--}}
{{--                      <div class="small float-right"><b>200 of 800 Items</b></div>--}}
{{--                    </div>--}}
{{--                    <div class="progress" style="height: 12px;">--}}
{{--                      <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30"--}}
{{--                        aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--                <div class="card-footer text-center">--}}
{{--                  <a class="m-0 small text-primary card-link" href="#">View More <i--}}
{{--                      class="fas fa-chevron-right"></i></a>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <!-- Invoice Example -->--}}
{{--            <div class="col-xl-8 col-lg-7 mb-4">--}}
{{--              <div class="card">--}}
{{--                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">--}}
{{--                  <h6 class="m-0 font-weight-bold text-primary">Invoice</h6>--}}
{{--                  <a class="m-0 float-right btn btn-danger btn-sm" href="#">View More <i--}}
{{--                      class="fas fa-chevron-right"></i></a>--}}
{{--                </div>--}}
{{--                <div class="table-responsive">--}}
{{--                  <table class="table align-items-center table-flush">--}}
{{--                    <thead class="thead-light">--}}
{{--                      <tr>--}}
{{--                        <th>Order ID</th>--}}
{{--                        <th>Customer</th>--}}
{{--                        <th>Item</th>--}}
{{--                        <th>Status</th>--}}
{{--                        <th>Action</th>--}}
{{--                      </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                      <tr>--}}
{{--                        <td><a href="#">RA0449</a></td>--}}
{{--                        <td>Udin Wayang</td>--}}
{{--                        <td>Nasi Padang</td>--}}
{{--                        <td><span class="badge badge-success">Delivered</span></td>--}}
{{--                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>--}}
{{--                      </tr>--}}
{{--                      <tr>--}}
{{--                        <td><a href="#">RA5324</a></td>--}}
{{--                        <td>Jaenab Bajigur</td>--}}
{{--                        <td>Gundam 90' Edition</td>--}}
{{--                        <td><span class="badge badge-warning">Shipping</span></td>--}}
{{--                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>--}}
{{--                      </tr>--}}
{{--                      <tr>--}}
{{--                        <td><a href="#">RA8568</a></td>--}}
{{--                        <td>Rivat Mahesa</td>--}}
{{--                        <td>Oblong T-Shirt</td>--}}
{{--                        <td><span class="badge badge-danger">Pending</span></td>--}}
{{--                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>--}}
{{--                      </tr>--}}
{{--                      <tr>--}}
{{--                        <td><a href="#">RA1453</a></td>--}}
{{--                        <td>Indri Junanda</td>--}}
{{--                        <td>Hat Rounded</td>--}}
{{--                        <td><span class="badge badge-info">Processing</span></td>--}}
{{--                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>--}}
{{--                      </tr>--}}
{{--                      <tr>--}}
{{--                        <td><a href="#">RA1998</a></td>--}}
{{--                        <td>Udin Cilok</td>--}}
{{--                        <td>Baby Powder</td>--}}
{{--                        <td><span class="badge badge-success">Delivered</span></td>--}}
{{--                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>--}}
{{--                      </tr>--}}
{{--                    </tbody>--}}
{{--                  </table>--}}
{{--                </div>--}}
{{--                <div class="card-footer"></div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <!-- Message From Customer-->--}}
{{--            <div class="col-xl-4 col-lg-5 ">--}}
{{--              <div class="card">--}}
{{--                <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">--}}
{{--                  <h6 class="m-0 font-weight-bold text-light">Message From Customer</h6>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                  <div class="customer-message align-items-center">--}}
{{--                    <a class="font-weight-bold" href="#">--}}
{{--                      <div class="text-truncate message-title">Hi there! I am wondering if you can help me with a--}}
{{--                        problem I've been having.</div>--}}
{{--                      <div class="small text-gray-500 message-time font-weight-bold">Udin Cilok · 58m</div>--}}
{{--                    </a>--}}
{{--                  </div>--}}
{{--                  <div class="customer-message align-items-center">--}}
{{--                    <a href="#">--}}
{{--                      <div class="text-truncate message-title">But I must explain to you how all this mistaken idea--}}
{{--                      </div>--}}
{{--                      <div class="small text-gray-500 message-time">Nana Haminah · 58m</div>--}}
{{--                    </a>--}}
{{--                  </div>--}}
{{--                  <div class="customer-message align-items-center">--}}
{{--                    <a class="font-weight-bold" href="#">--}}
{{--                      <div class="text-truncate message-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit--}}
{{--                      </div>--}}
{{--                      <div class="small text-gray-500 message-time font-weight-bold">Jajang Cincau · 25m</div>--}}
{{--                    </a>--}}
{{--                  </div>--}}
{{--                  <div class="customer-message align-items-center">--}}
{{--                    <a class="font-weight-bold" href="#">--}}
{{--                      <div class="text-truncate message-title">At vero eos et accusamus et iusto odio dignissimos--}}
{{--                        ducimus qui blanditiis--}}
{{--                      </div>--}}
{{--                      <div class="small text-gray-500 message-time font-weight-bold">Udin Wayang · 54m</div>--}}
{{--                    </a>--}}
{{--                  </div>--}}
{{--                  <div class="card-footer text-center">--}}
{{--                    <a class="m-0 small text-primary card-link" href="#">View More <i--}}
{{--                        class="fas fa-chevron-right"></i></a>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
          <!--Row-->

@endsection
