@extends('layouts.admin')


@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="card">

                    @if (Auth::user()->roles[0]->slug == 'provider')
                    <div class="order-listing">
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="border: 0px!important">
                            <li class="nav-item first-tab">
                                <a class="nav-link active" id="orderplaced-tab" data-toggle="tab"
                                    href="#" role="tab"
                                    aria-controls="home" aria-selected="true" onclick="placedorder()" >
                                    <i class="fas fa-user"></i>@lang('cus_orders.label_header')</a>
                            </li>
                            <li class="nav-item second-tab">
                                <a class="nav-link" id="orderreceive-tab" data-toggle="tab"
                                    href="#" role="tab"
                                    aria-controls="profile" aria-selected="false" onclick="receivedorder()">
                                    <i class="fas fa-users"></i> @lang('cus_orders.label_header_user') <br/></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">@lang('cus_orders.label_title')</h6>
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            id="user_btn"><i class="fa fa-plus" aria-hidden="true"></i> Add Customer</button> --}}

                               {{-- filter dropdown --}}
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> @lang('cus_orders.label_filter')
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                <li><a href="#" style="padding-left: 20%;">Rating</a></li>
                                <li><a href="#" style="padding-left: 20%;">Price</a></li>
                                <li><a href="#" style="padding-left: 20%;">Availability</a></li>
                                <li><a href="#" style="padding-left: 20%;">Distance</a></li>
                            </ul>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="tbl_id">
                            <thead class="thead-light">
                            <tr>
                                <th>Booking User</th>
                                <th>Service</th>
                                <th>Category</th>
                                <th>Booking Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th width="280px">Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    @elseif (Auth::user()->roles[0]->slug == 'admin-admin')

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">@lang('orders.label_tab_title')</h6>
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            id="user_btn"><i class="fa fa-plus" aria-hidden="true"></i> Add Customer</button> --}}

                               {{-- filter dropdown --}}
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> @lang('orders.label_tab_filter')
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                <li><a href="#" style="padding-left: 20%;">Rating</a></li>
                                <li><a href="#" style="padding-left: 20%;">Price</a></li>
                                <li><a href="#" style="padding-left: 20%;">Availability</a></li>
                                <li><a href="#" style="padding-left: 20%;">Distance</a></li>
                            </ul>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="tbl_id">
                            <thead class="thead-light">
                            <tr>
                                <th>@lang('orders.label_tab_buser')</th>
                                <th>@lang('orders.label_tab_services')</th>
                                <th>@lang('orders.label_tab_provider')</th>
                                <th>@lang('orders.label_tab_bdate')</th>
                                <th>@lang('orders.label_tab_time')</th>
                                <th>@lang('orders.label_tab_status')</th>
                                <th width="280px">@lang('orders.label_tab_action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    @elseif (Auth::user()->roles[0]->slug == 'organisation-admin')

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">@lang('orders.label_tab_title')</h6>
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            id="user_btn"><i class="fa fa-plus" aria-hidden="true"></i> Add Customer</button> --}}

                               {{-- filter dropdown --}}
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> @lang('orders.label_tab_filter')
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                <li><a href="#" style="padding-left: 20%;">Rating</a></li>
                                <li><a href="#" style="padding-left: 20%;">Price</a></li>
                                <li><a href="#" style="padding-left: 20%;">Availability</a></li>
                                <li><a href="#" style="padding-left: 20%;">Distance</a></li>
                            </ul>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="tbl_id">
                            <thead class="thead-light">
                            <tr>
                                <th>@lang('orders.label_tab_buser')</th>
                                <th>@lang('orders.label_tab_services')</th>
                                <th>@lang('orders.label_tab_provider')</th>
                                <th>@lang('orders.label_tab_bdate')</th>
                                <th>@lang('orders.label_tab_time')</th>
                                <th>@lang('orders.label_tab_status')</th>
                                <th width="280px">@lang('orders.label_tab_action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        window.addEventListener ?
            window.addEventListener("load",onLoad(),false) :
            window.attachEvent && window.attachEvent("onload",onLoad());

        var currentuser;
        function onLoad() {
            console.log("ON LOAD  tbl_id")
            var retrievedObject = localStorage.getItem('userObject');
            console.log(retrievedObject)
            currentuser = JSON.parse(retrievedObject);
            console.log(currentuser.roles[0].name)
            if(currentuser.roles[0].name == 'Admin') {
                console.log("CALL");
                getAllOrders();
            } else if (currentuser.roles[0].name == 'Individual Service Provider') {
                placedorder();
            } else if (currentuser.roles[0].slug = "organisation-admin") {
                console.log("ORG ADMIN");
                getOrgOrders();
            }
            // getResult(obj.id);

        }



        function getOrgOrders() {
            $.ajax({
                url: '/api/v1/booking/get_org_bookings?id=' + currentuser.org_id,
                type: 'GET',
                data: null,
                success: function(response){
                    console.log("CREA = "+ JSON.stringify(response));
                    var trHTML = '';

                    $.each(response, function (i, item) {

                        var status = "";

                        if(response[i].status == 1) {
                            status = "Pending";
                        } else if(response[i].status == 2) {
                            status = "Accept";
                        } else if(response[i].status == 3) {
                            status = "Cancel by Vendor";
                        } else if(response[i].status == 4) {
                            status = "Cancel by User";
                        } else if(response[i].status == 5) {
                            status = "Completed";
                        } else if(response[i].status == 6) {
                            status = "Invoice Submitted";
                        }
                        console.log(status);
                        var serviceName = response[i].services.name;
                        var category = (response[i].category == null) ? "" : response[i].category.name;
                        if(category != null) {
                            serviceName += " ("+ category +")";
                        }
                        trHTML += '<tr><td>' + response[i].orderer_name +
                            '</td><td>' +  serviceName + '</td>' +
                            '</td><td>' + response[i].provider.first_name  + '</td>' +
                            '</td><td>' + response[i].booking_date  + '</td>' +
                            '</td><td>' + response[i].start_time + " to " +  response[i].end_time +
                            '</td><td>' + status +
                            '</td><td>' + ' <a href="#" class="btn btn-info" onclick="viewDetail(' + response[i].id + ')"><i class="fas fa-eye"></i></a> ' +

                            '</td></tr>';

                    });
                    $('#tbl_id').append(trHTML);
                },
                fail: function (error) {
                    console.log(error);
                }
            });
        }

        function getAllOrders() {
            console.log("MAYUR");
            $.ajax({
                url: '/api/v1/booking/getallbooking',
                type: 'GET',
                data: null,
                success: function(response){
                    // console.log("CREATE CREATE REPOSNE == "+ JSON.stringify(response));
                    var trHTML = '';

                    $.each(response, function (i, item) {
                        var category = (response[i].category == null) ? "" : response[i].category.name;
                        var status = "yo";
                        if(response[i].status == 1) {
                            status = "Pending";
                        } else if(response[i].status == 2) {
                            status = "Accept";
                        } else if(response[i].status == 3) {
                            status = "Cancel by Vendor";
                        } else if(response[i].status == 4) {
                            status = "Cancel by User";
                        } else if(response[i].status == 5) {
                            status = "Completed";
                        } else if(response[i].status == 6) {
                            status = "Invoice Submitted";
                        }

                        var serviceName = response[i].services.name;
                        var category = (response[i].category == null) ? "" : response[i].category.name;
                        if(category != null) {
                            serviceName += " ("+ category +")";
                        }

                        trHTML += '<tr><td>' + response[i].orderer_name +
                            '</td><td>' + serviceName  + '</td>' +
                            '</td><td>' + (response[i].provider == null) ? "" : response[i].provider.first_name  + '</td>' +
                            '</td><td>' + response[i].booking_date  + '</td>' +
                            '</td><td>' + response[i].start_time + " to " +  response[i].end_time +
                            '</td><td>' + status +
                            '</td><td>' + ' <a href="#" class="btn btn-info" onclick="viewDetail(' + response[i].id + ')"><i class="fas fa-eye"></i></a> ' +
                            '<a href="#" class="btn btn-primary" ><i class="fas fa-edit"></i></a> ' +
                            '<a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> ' +
                            '</td></tr>';

                    });
                    $('#tbl_id').append(trHTML);
                },
                fail: function (error) {
                    console.log(error);
                }
            });
        }

        function getResult(id) {
            $.ajax({
                url: '/api/v1/booking/provider?id='+id,
                type: 'GET',
                data: null,
                success: function(response){
                    // console.log("CREATE CREATE REPOSNE == "+ JSON.stringify(response));
                    var trHTML = '';

                    $.each(response, function (i, item) {
                        trHTML += '<tr><td>' + response[i].order_user.first_name +
                            '</td><td>' + response[i].service  + '</td>' +
                            '</td><td>' + response[i].provider.first_name  + '</td>' +
                            '</td><td>' + response[i].booking_date  + '</td>' +
                            '</td><td>' + response[i].start_time + " to " +  response[i].end_time +
                            '</td><td>' + ' <a href="#" class="btn btn-info" onclick="viewDetail(' + response[i].id + ')"><i class="fas fa-eye"></i></a> ' +
                            '<a href="#" class="btn btn-primary" ><i class="fas fa-edit"></i></a> ' +
                            '<a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> ' +
                            '</td></tr>';

                    });
                    $('#tbl_id').append(trHTML);
                },
                fail: function (error) {
                    console.log(error);
                }
            });
        };

        function receivedorder() {
            console.log("order by user" + currentuser.id);
            $.ajax({
                url: '/api/v1/booking/provider?id=' + currentuser.id,
                type: 'GET',
                data: null,
                success: function(response){

                    $("#tbl_id").empty();


                    console.log("order by user:::" +JSON.stringify(response));

                    var trHTML = '';
                    $.each(response, function (i, item) {
                        var category = (response[i].category == null) ? "" : response[i].category.name;
                        var status = "";
                        if(response[i].status == 1) {
                            status = "Pending"
                        } else if(response[i].status == 2) {
                            status = "Accept"
                        } else if(response[i].status == 3) {
                            status = "Cancel by Vendor"
                        } else if(response[i].status == 4) {
                            status = "Cancel by User"
                        }

                        var serviceName = response[i].services.name;
                        var category = (response[i].category == null) ? "" : response[i].category.name;
                        if(category != null) {
                            serviceName += " ("+ category +")";
                        }
                        console.log("1");
                        trHTML += '<tr id="r1"><td>' + response[i].orderer_name +
                            '</td><td style="width: 29%;">' + serviceName  + '</td>' +
                            '</td><td>' + response[i].provider.first_name  + '</td>' +
                            '</td><td>' + response[i].booking_date  + '</td>' +
                            '</td><td>' + response[i].start_time + " to " +  response[i].end_time +
                            '</td><td>' + status +
                            '</td><td>' + ' <a href="#" class="btn btn-info" onclick="viewDetail(' + response[i].id + ')"><i class="fas fa-eye"></i></a> ' +
                            '<a href="#" class="btn btn-primary" ><i class="fas fa-edit"></i></a> ' +
                            '<a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> ' +
                            '</td></tr>';

                    });
                    $('#tbl_id').append(trHTML);
                },
                fail: function (error) {
                    console.log(error);
                }
            });
        }

        function placedorder() {

            console.log("order by You");
            $.ajax({
                url: '/api/v1/booking?id=' + currentuser.id,
                type: 'GET',
                data: null,
                success: function(response){
                    $("#tbl_id").empty();

                    var trHTML = '';

                    $.each(response, function (i, item) {
                        var category = (response[i].category == null) ? "" : response[i].category.name;
                        var status = "";
                        if(response[i].status == 1) {
                            status = "Pending"
                        } else if(response[i].status == 2) {
                            status = "Accept"
                        } else if(response[i].status == 3) {
                            status = "Cancel by Vendor"
                        } else if(response[i].status == 4) {
                            status = "Cancel by User"
                        }
                        console.log("1");
                        var serviceName = response[i].services.name;
                        var category = (response[i].category == null) ? "" : response[i].category.name;
                        if(category != null) {
                            serviceName += " ("+ category +")";
                        }

                        trHTML += '<tr id="r1"><td>' + response[i].orderer_name +
                            '</td><td style="width: 22%;">' + serviceName  + '</td>' +
                            '</td><td>' + response[i].provider.first_name  + '</td>' +
                            '</td><td>' + response[i].booking_date  + '</td>' +
                            '</td><td>' + response[i].start_time + " to " +  response[i].end_time +
                            '</td><td>' + status +
                            '</td><td>' + ' <a href="#" class="btn btn-info" onclick="viewDetail(' + response[i].id + ')"><i class="fas fa-eye"></i></a> ' +
                            '<a href="#" class="btn btn-primary" ><i class="fas fa-edit"></i></a> ' +
                            '<a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> ' +
                            '</td></tr>';

                    });
                    $('#tbl_id').append(trHTML);
                    console.log("2")
                },
                fail: function (error) {
                    console.log(error);
                }
            });
        }

        function viewDetail(e){
            console.log(e);
            //alert(e);
            window.location = '/orderdetails?id=' + e;
        }

        function showText(element)
        {
            console.log(element.innerText);
        }
        document.querySelectorAll("li").forEach(li => li.addEventListener("click", () => showText(li)));
    </script>
@endsection
