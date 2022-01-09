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
                        <!--button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> @lang('cus_orders.label_filter')
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                <li><a style="padding-left: 20%;">Rating</a></li>
                                <li><a style="padding-left: 20%;">Price</a></li>
                                <li><a href="#" style="padding-left: 20%;">Availability</a></li>
                                <li><a href="#" style="padding-left: 20%;">Distance</a></li>
                            </ul-->
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
                        <button class="btn btn-primary dropdown-toggle" onclick="openFilter()" type="button" data-toggle="dropdown"> @lang('orders.label_tab_filter')
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" id="dropdown-filter">
                                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                <li><a href="#" style="padding-left: 20%;">All</a></li>
                                <li><a href="#" style="padding-left: 20%;">Pending</a></li>
                                <li><a href="#" style="padding-left: 20%;">Accepted</a></li>
                                <li><a href="#" style="padding-left: 20%;">Invoice Submitted</a></li>
                                <li><a href="#" style="padding-left: 20%;">Cancel by Vendor</a></li>
                                <li><a href="#" style="padding-left: 20%;">Cancel by User</a></li>
                                <li><a href="#" style="padding-left: 20%;">Completed</a></li>
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
                        <!--button class="btn btn-primary dropdown-toggle" onclick="openFilter()" type="button" data-toggle="dropdown"> @lang('orders.label_tab_filter')
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                <li><a href="#" style="padding-left: 20%;">Rating</a></li>
                                <li><a href="#" style="padding-left: 20%;">Price</a></li>
                                <li><a href="#" style="padding-left: 20%;">Availability</a></li>
                                <li><a href="#" style="padding-left: 20%;">Distance</a></li>
                            </ul-->
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
            // createExcelFromGrid("YO");
            if(currentuser.roles[0].name == 'Admin') {
                console.log("CALL");
                getAllOrders('/api/v1/booking/getallbooking');
            } else if (currentuser.roles[0].name == 'Individual Service Provider') {
                placedorder();
            } else if (currentuser.roles[0].slug = "organisation-admin") {
                console.log("ORG ADMIN");
                getOrgOrders('/api/v1/booking/get_org_bookings?id=' + currentuser.org_id);
            }
            // getResult(obj.id);

        }


        function openFilter() {
            console.log("SHOW");
            $('#dropdown-filter').toggle();
        }

        function getOrgOrders(Url) {
            $.ajax({
                url: Url,
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
                            status = "Accepted by JamApp";
                        } else if(response[i].status == 3) {
                            status = "Accepted by vendor";
                        } else if(response[i].status == 4) {
                            status = "Cancel by JamApp";
                        } else if(response[i].status == 5) {
                            status = "Cancel by Vendor";
                        } else if(response[i].status == 6) {
                            status = "Invoice Submitted";
                        } else if(response[i].status == 7) {
                            status = "Completed";
                        } else if(response[i].status == 8) {
                            status = "Waiting for vendor";
                        }else if(response[i].status == 9) {
                            status = "Cancel by User";
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



        function getAllOrders(Url) {
            $.ajax({
                url: Url,
                type: 'GET',
                data: null,
                success: function(response){
                    $('#tbl_id').empty();
                    // console.log("CREATE CREATE REPOSNE == "+ JSON.stringify(response));
                    var trHTML = '';


                    $.each(response, function (i, item) {
                        var category = (response[i].category == null) ? "" : response[i].category.name;
                        var status = "";
                        if(response[i].status == 1) {
                            status = "Pending";
                        } else if(response[i].status == 2) {
                            status = "Accepted by JamApp";
                        } else if(response[i].status == 3) {
                            status = "Accepted by vendor";
                        } else if(response[i].status == 4) {
                            status = "Cancel by JamApp";
                        } else if(response[i].status == 5) {
                            status = "Cancel by Vendor";
                        } else if(response[i].status == 6) {
                            status = "Invoice Submitted";
                        } else if(response[i].status == 7) {
                            status = "Completed";
                        } else if(response[i].status == 8) {
                            status = "Waiting for vendor";
                        }else if(response[i].status == 9) {
                            status = "Cancel by User";
                        }

                        var serviceName = response[i].services.name;
                        var category = (response[i].category == null) ? "" : response[i].category.name;
                        if(category != null) {
                            serviceName += " ("+ category +")";
                        }

                        var providerName = "";
                        if(response[i].provider != null) {
                            providerName = response[i].provider.first_name;
                        }

                        trHTML += '<tr><td>' + response[i].orderer_name +
                            '</td><td>' + serviceName  + '</td>' +
                            '</td><td>' + providerName  + '</td>' +
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
                            status = "Pending";
                        } else if(response[i].status == 2) {
                            status = "Accepted by JamApp";
                        } else if(response[i].status == 3) {
                            status = "Accepted by vendor";
                        } else if(response[i].status == 4) {
                            status = "Cancel by JamApp";
                        } else if(response[i].status == 5) {
                            status = "Cancel by Vendor";
                        } else if(response[i].status == 6) {
                            status = "Invoice Submitted";
                        } else if(response[i].status == 7) {
                            status = "Completed";
                        } else if(response[i].status == 8) {
                            status = "Waiting for vendor";
                        }else if(response[i].status == 9) {
                            status = "Cancel by User";
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
                            status = "Pending";
                        } else if(response[i].status == 2) {
                            status = "Accepted by JamApp";
                        } else if(response[i].status == 3) {
                            status = "Accepted by vendor";
                        } else if(response[i].status == 4) {
                            status = "Cancel by JamApp";
                        } else if(response[i].status == 5) {
                            status = "Cancel by Vendor";
                        } else if(response[i].status == 6) {
                            status = "Invoice Submitted";
                        } else if(response[i].status == 7) {
                            status = "Completed";
                        } else if(response[i].status == 8) {
                            status = "Waiting for vendor";
                        }else if(response[i].status == 9) {
                            status = "Cancel by User";
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
            $('#dropdown-filter').hide();
            console.log("test ==== ",element.innerText);
            switch (element.innerText) {
                case 'Pending':
                getAllOrders('/api/v1/booking/get_bookings_filter?status=' + 1);
                    break;

                case 'Accepted by JamApp' :
                getAllOrders('/api/v1/booking/get_bookings_filter?status=' + 2);
                    break;

                case 'Invoice Submitted' :
                getAllOrders('/api/v1/booking/get_bookings_filter?status=' + 6);
                    break;
                case 'Accepted by vendor' :
                getAllOrders('/api/v1/booking/get_bookings_filter?status=' + 3);

                    break;
                case 'Cancel by JamApp' :
                getAllOrders('/api/v1/booking/get_bookings_filter?status=' + 4);
                    break;
                case 'Cancel by Vendor' :
                getAllOrders('/api/v1/booking/get_bookings_filter?status=' + 5);
                    break;
                case 'Completed' :
                getAllOrders('/api/v1/booking/get_bookings_filter?status=' + 7);
                    break;
                case 'Waiting for vendor' :
                getAllOrders('/api/v1/booking/get_bookings_filter?status=' + 8);
                    break;
                case 'Cancel by User' :
                getAllOrders('/api/v1/booking/get_bookings_filter?status=' + 9);
                    break;
                case 'All' :
                getAllOrders('/api/v1/booking/getallbooking');
                    break;


                default:
                    break;
            }
            // if(element.innerText == ) {

            // } else if(element.innerText == ) {

            // } else if(element.innerText == '') {

            // } else if(element.innerText == '') {

            // }


            //
            // location.reload();
        }
        document.querySelectorAll("li").forEach(li => li.addEventListener("click", () => showText(li)));



        function createExcelFromGrid (filename) {
            console.log("EXPORT");
            var html = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
            html = html + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

            html = html + '<x:Name>Warranty Inventory</x:Name>';

            html = html + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
            html = html + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

            html = html + "<table border='1px'>";
            var colnames = ["test", "test2"]; //$("#" + gridid).jqGrid('getGridParam', 'colNames');
            var headerow = "<thead><tr>";
            $.each(colnames, function (index, value) {
                // if (index == 0)
                //     value = "ItmId";
                headerow = headerow + "<th>" + value + "</th>";
            });
            headerow = headerow + "</tr></thead>";
            html = html + headerow;
            // html = html + $('#' + gridid).html();

            /*VALUES*/
            var datarow = "<tbody><tr>";
            var dataVal = ["test4", "test5"];
            $.each(dataVal, function (index, value) {
                // if (index == 0)
                //     value = "ItmId";
                datarow = datarow + "<td>" + value + "</td>";
            });
            datarow = datarow + "</tr></tbody>";
            html = html + datarow;




            html = html + '</table></body></html>';
            html = html.replace(/'/g, '&apos;');
            console.log(html);
            var a = document.createElement('a');
            a.id = 'ExcelDL';
            a.href = 'data:application/vnd.ms-excel,' + encodeURIComponent(html);
            a.download = filename ? filename + ".xls" : 'Warranty Inventory.xls';
            document.body.appendChild(a);
            a.click(); // Downloads the excel document
            document.getElementById('ExcelDL').remove();
        }

    </script>
@endsection
