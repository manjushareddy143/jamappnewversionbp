@extends('layouts.admin')

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/ruang-admin.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

    <style>
        .bs-example{
            margin: 20px;
        }
    </style>


</head>

@section('content')
    <div class="container-fluid" id="container-wrapper">


        <div class="toast" style="margin-left: auto; margin-right: 5px;
        margin-top: 9px; position: absolute; top: 0; right: 0;">
            <div class="toast-header"> Error </div>
            <div class="toast-body"> msgStr </div>
         </div>


        <div class="row">



            <div class="col-lg-12 margin-tb">



                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">@lang('vendor.label_header')</h6>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                id="user_addbtn"><i class="fa fa-plus" aria-hidden="true"></i> @lang('vendor.label_title')
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="btntext"> @lang('vendor.label_title')</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>@lang('vendor.label_fname')<strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="text" class="form-control" id="first_name"
                                                           placeholder="@lang('vendor.label_place_fname')">
                                                </div>
                                            </div>
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>@lang('vendor.label_lname') <strong style="font-size: 14px;color: #e60606;">*</strong> </label>
                                                    <input type="text" class="form-control" id="last_name"
                                                           placeholder="@lang('vendor.label_place_lname')">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>@lang('vendor.label_email') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="email" class="form-control" id="email"
                                                           placeholder="@lang('vendor.label_place_email')">
                                                </div>
                                            </div>
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label id="lbl_pass">@lang('vendor.label_password') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="password" class="form-control" id="password"
                                                           aria-describedby="passwordHelp"
                                                           placeholder="@lang('vendor.label_place_pass')" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>@lang('vendor.label_mobile') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="text" class="form-control" id="contact" onkeypress="return isNumber(event)" placeholder="@lang('vendor.label_place_mobile')" maxlength="20">
                                                </div>
                                            </div>
                                            <!--radiobutton -->
                                            <div class="col-md-6 float-l">
                                                <div id="gender-group"
                                                     class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                                    <label>@lang('vendor.label_gender') <strong style="font-size: 14px;color: #e60606;">*</strong></label><br>
                                                    <input type="radio" name="gender" onclick="genderClick()" id="gender-male" value="male"> Male
                                                    <input type="radio" name="gender" onclick="genderClick()" id="gender-female" value="female"> Female
                                                    <input type="radio" name="gender" onclick="genderClick()" id="gender-other" value="other"> Other
                                                    @if ($errors->has('gender'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('gender') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <p id="genderError"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label for="language">@lang('vendor.label_language')  <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="arabic" id="lang-arabic"
                                                                   value="arabic"> Arabic
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" name="english" id="lang-english"
                                                                   value="english"> English
                                                        </label>
                                                        @error('language')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>

                                                    <p id="langError"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>@lang('vendor.label_Image')  <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input id="image" type="file" name="image" class="form-control"
                                                           required>
                                                </div>
                                                <p id="imageError"></p>
                                            </div>
                                        </div>

                                        <div class="row">


                                         @if (Auth::user()->roles[0]->slug == 'organisation-admin')
                                         <div class="col-md-12 float-l">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">@lang('vendor.label_Country')
                                                    <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                <select class="form-control" id="select_country" required>
                                                    <option value="Select Country">Select Country</option>
                                                </select>
                                                <p id="countryError"></p>
                                            </div>
                                         </div>
                                        @else
                                        <div class="col-md-6 float-l">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">@lang('vendor.label_Country')
                                                    <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                <select class="form-control" id="select_country" required>
                                                    <option value="Select Country">Select Country</option>
                                                </select>
                                                <p id="countryError"></p>
                                            </div>
                                         </div>
                                            <div class="col-md-6 float-l" id="org_selectId">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">@lang('vendor.label_organisation')</label>
                                                    <select class="form-control" id="orglist" required>
                                                        <option value="select_org">Select Organisation</option>
                                                    </select>
                                                </div>
                                            </div>
                                        @endif



                                        </div>




                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>@lang('vendor.label_Services')  <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <p id="serviceError"></p>
                                                    <ul class="tree" id="tree_box"
                                                        style="overflow: auto;height: 200px;"></ul>
                                                </div>
                                            </div>
                                        </div>
                                        <style>
                                            #snackbar {
                                                visibility: hidden;
                                                min-width: 250px;
                                                margin-left: -125px;
                                                background-color: #333;
                                                color: #fff;
                                                text-align: center;
                                                border-radius: 2px;
                                                padding: 16px;
                                                position: fixed;
                                                z-index: 1;
                                                left: 50%;
                                                bottom: 30px;
                                                font-size: 17px;
                                            }

                                            #snackbar.show {
                                                visibility: visible;
                                                -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
                                                animation: fadein 0.5s, fadeout 0.5s 2.5s;
                                            }
                                            @-webkit-keyframes fadein {
                                            from {bottom: 0; opacity: 0;}
                                            to {bottom: 30px; opacity: 1;}
                                            }

                                            @keyframes fadein {
                                            from {bottom: 0; opacity: 0;}
                                            to {bottom: 30px; opacity: 1;}
                                            }

                                            @-webkit-keyframes fadeout {
                                            from {bottom: 30px; opacity: 1;}
                                            to {bottom: 0; opacity: 0;}
                                            }

                                            @keyframes fadeout {
                                            from {bottom: 30px; opacity: 1;}
                                            to {bottom: 0; opacity: 0;}
                                            }
                                            </style>
                                            <div id="snackbar">Unauthorized user</div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('vendor.label_cbtn')</button>
                                    <button type="button" id="btn_save" onclick="create_user()" value="save" class="btn btn-primary">@lang('vendor.label_sbtn')</button>
                                    <button type="button" id="btn_update" onclick="update_vendor()" class="btn btn-primary">@lang('vendor.label_ubtn')</button>
                                    {{-- <a class="btn btn-info btn-lg" id="alert-target">Click me!</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="tbl_id">
                            <thead class="thead-light">
                            <tr>
                                <th>@lang('vendor.label_tab_profile')</th>
                                <th>@lang('vendor.label_tab_organisation')</th>
                                <th>@lang('vendor.label_tab_fname')</th>
                                <th>@lang('vendor.label_tab_email')</th>
                                @if (Auth::user()->roles[0]->slug == 'organisation-admin')
                                    <th>@lang('vendor.label_tab_role')</th>
                                @else
                                    <th>@lang('vendor.label_tab_gender')</th>
                                @endif
                                <th>@lang('vendor.label_tab_services')</th>
                                <th width="280px">@lang('vendor.label_tab_action')
                                </th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>

    $(document).ready(function(){
        $("#user_addbtn").click(function(){
            document.getElementById('btntext').innerHTML = 'Add Vendors';
            ClearInputField();
            $("#btn_update").hide();
            $("#btn_save").show();
        });
    });

    function ClearInputField() {
        $('#first_name').val("");
        $('#last_name').val("");
        $('#email').val("");
        $('#password').val("");
        $('#contact').val("");
        $("#lbl_pass").show();
        $("#password").show();
        $("#btn_save").show();
        $('#gender-male').prop("checked", false);
        $("#gender-female").prop("checked", false);
        $('#gender-other').prop("checked", false);
        $('#lang-arabic').prop("checked", false);
        $('#lang-english').prop("checked", false);
        $('#select_country').val('Select Country');
        $('#tree_box').val("");
        $('#service').val("");



    }

    var allServices;

        function getListOfService() {
            $.ajax({
                url: '/api/v1/all_services?type=web',
                type: 'GET',
                success: function (response, xhr) {
                    if (xhr['status'] == 204) {
                        console.log(response);
                    } else {
                        if(response != null) {
                            var trHTML = '';
                            var i;
                            allServices = response;
                            console.log(allServices);
                            for(i = 0; i < response.length; i++)
                            {
                                var img = (response[i].icon_image == null) ? '{{ URL::asset('/img/boy.png') }}' : response[i].icon_image;
                                trHTML += '<li class="has"> <input type="checkbox" id="service' + + response[i].id +
                                    '" onclick="serviceClick(' + response[i].id + ')"' +
                                    '" name="domain[]' +
                                    '" value="' + response[i].id + '">' +
                                    '<img src="' + img + '" class="square" width="50" height="40" />' +
                                    '<label> ' + response[i].name  + ' </label> ';
                                    if(response[i]['categories'].length > 0) {
                                        var trCatHTML = '<ul style="display: block;">';
                                        var catCount;
                                        for(catCount = 0; catCount < response[i]['categories'].length; catCount++)
                                        {
                                            trCatHTML += '<li class="">' +
                                                '<input type="checkbox" name="subdomain[]"' +'id="category' +
                                                response[i].id + response[i]['categories'][catCount].id
                                                + '"value="' +
                                                response[i]['categories'][catCount].id + '" onclick="serviceClick(' +
                                                response[i].id + "," +  response[i]['categories'][catCount].id  + ')"'
                                                +'>' +
                                                '<label>'+ response[i]['categories'][catCount].name +'</label>' +
                                                '<input type="number" id="'+ response[i]['categories'][catCount].id +
                                                'category" name="someid" onkeypress="return isNumberKey(event)"  size="4" style="margin-left: 10px !important">'
                                                + '<label id="catemessage' +response[i]['categories'][catCount].id+'" style="color:red"></label>'+ '</li>';
                                        }
                                        trCatHTML += '</ul>';

                                        trHTML += trCatHTML;
                                    } else {
                                        trHTML += '<input type="number" id="'+response[i].id+
                                    'price" name="someid" onkeypress="return isNumberKey(event)"  size="4" style="margin-left: 10px !important;">';
                                    }

                                    trHTML += '<label id="alertmessage' +response[i].id+'"style="color:red"></label></li>';
                            }
                            $('#tree_box').append(trHTML);
                        }
                    }
                },
                fail: function (error) {
                    console.log(error);
                }
            });
        }

        var selectedService = [];

        function serviceClick(id, cat)  {
            console.log("id =" + id + " cat =" +cat + " allServices = " + allServices );
            // if(cat == null) {
            //     var categories = allServices.find(obj => obj.id === id).categories;
            //     console.log(categories.length);

            // }
            if(cat == null) {
                console.log("inside");
                var categories = allServices.find(obj => obj.id === id).categories;
                if(categories.length > 0) {
                    $.each(categories, function (j, item) {
                        var srvcObj = {
                            service_id : id,
                            category_id : item.id,
                            price : $("#"+item.id+"category").val(),
                        };
                        $('#serviceError').text('')
                        console.log(srvcObj);
                        if(selectedService.some(obj => JSON.stringify(obj) === JSON.stringify(srvcObj))){
                            selectedService = $.grep(selectedService, function(value) {
                                return JSON.stringify(value) != JSON.stringify(srvcObj);
                            });
                        } else{
                            selectedService.push(srvcObj);
                        }
                    });
                } else {
                    console.log("iddd")
                    var srvcObj = {
                        service_id : id,
                        category_id : cat,
                        price : $("#"+cat+"category").val(),
                    };
                    $('#serviceError').text('')
                    if(selectedService.some(obj => JSON.stringify(obj) === JSON.stringify(srvcObj))){
                        selectedService = $.grep(selectedService, function(value) {
                            return JSON.stringify(value) != JSON.stringify(srvcObj);
                        });
                    } else{
                        selectedService.push(srvcObj);
                    }
                }

            } else {
                console.log("iddd")
                var srvcObj = {
                    service_id : id,
                    category_id : cat,
                    price : $("#"+cat+"category").val(),
                };
                $('#serviceError').text('')
                if(selectedService.some(obj => JSON.stringify(obj) === JSON.stringify(srvcObj))){
                    selectedService = $.grep(selectedService, function(value) {
                        return JSON.stringify(value) != JSON.stringify(srvcObj);
                    });
                } else{
                    selectedService.push(srvcObj);
                }
            }
            console.log("final == ",selectedService);
        }

        function isNumberKey(evt){

            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        function getAllVendors() {

            $.ajax({
                url: '/api/v1/getuser/3',
                type: 'GET',
                data: null,
                success: function (response) {
                    console.log("CREATE CREATE REPOSNE == " + JSON.stringify(response));
                    var trHTML = '';

                    $.each(response, function (i, item) {
                        var img = (response[i].image == null) ? '{{ URL::asset('/img/boy.png') }}' : response[i].image;
                        var icon;
                        if(response[i]['provider'] == null) {
                            icon = "fa fa-thumbs-up";

                        } else {
                            icon = (response[i]['provider'].verified == 0) ? 'fa fa-thumbs-down' : "fa fa-thumbs-up";
                        }

                        var last_name = (response[i].last_name == null)? "-" : response[i].last_name;

                        var servicesString = "-";

                        $.each(response[i]['services'], function (j, item)
                        {
                            if(servicesString == "-") {
                                servicesString =  item.service.name;
                            } else {
                                if(servicesString.indexOf(item.service.name) == -1){
                                    servicesString += ", " + item.service.name;
                                }
                            }
                            if(item.categories != null) {
                                servicesString += "\n - " + item.categories.name;
                            }
                        });
                        var org_name = (response[i]['organisation'] == null)? "Individual" : response[i]['organisation'].name;

                        trHTML += '<tr><td><img src="' + img + '" class="square" width="60" height="50" /></td>' +
                        '   </td><td>' + org_name +
                            '</td><td>' + response[i].first_name + " " + last_name + '</td>' +
                            '</td><td>' + response[i].email + '</td>' +
                            '</td><td>' + response[i].gender + '</td>' +
                            '</td><td>' + servicesString + '</td>' +
                            '</td><td style="padding: 6px 0 0 10px;">' + ' <a href="#" class="btn btn-info" onclick="viewDetail(' + response[i].id + ')"><i class="fas fa-eye"></i></a> ' +
                            '<a href="#" onclick="getVendorData(' + response[i].id + ')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="user_btn"><i class="fas fa-edit"></i></a> ' +
                            '<a href="#" class="btn btn-danger" onclick="deleteRecord(' + response[i].id + ')">'+
                            '<i class="fas fa-trash"></i></a> ' +
                            '<a href="#" class="btn btn-success" > <i class="'+ icon +'"></i></a>'
                            + '</td></tr>';
                    });
                    $('#tbl_id').append(trHTML);

                },
                fail: function (error) {
                    console.log(error);
                }
            });
            };


        window.addEventListener ?
            window.addEventListener("load", onLoad(), false) :
            window.attachEvent && window.attachEvent("onload", onLoad());

        var currentuser;
        function onLoad() {
            console.log("ON LOAD  tbl_id")
            var retrievedObject = localStorage.getItem('userObject');
            console.log("retrievedObject" + retrievedObject)
            currentuser = JSON.parse(retrievedObject);
            console.log(JSON.stringify(currentuser))


            if(currentuser.roles[0].name == 'Admin') {
                getAllVendors();
                getListOfOrganisation();
            } else if (currentuser.roles[0].name == 'Corporate Service Provider') {
                getOrgVendors();
            }
            getListOfService();
        }

        function getListOfOrganisation() {
            $.ajax({
                url: '/api/v1/organisation',
                type: 'GET',
                data: null,
                success: function (response) {
                    console.log("Get organisation == " + JSON.stringify(response));
                    for(var i = 0; i < response.length; i ++) {
                        //  console.log(response[i].name);
                         $('#orglist').append(`<option value="${response[i].id}">
                                       ${response[i].name}
                                  </option>`);
                     }
                },
                fail: function (error) {
                    console.log(error);
                }
            });
        }

        function getOrgVendors()
        {
            $.ajax({
                url: '/api/v1/organisation/vendors/' + currentuser.org_id,
                type: 'GET',
                data: null,
                success: function (response) {
                    console.log("CREATE CREATE REPOSNE == " + JSON.stringify(response));
                    var trHTML = '';

                    $.each(response, function (i, item) {
                        // console.log("PR== " + response[i]['provider']);
                        var img = (response[i].image == null) ? '{{ URL::asset('/img/boy.png') }}' : response[i].image;
                        var icon;
                        if(response[i]['provider'] == null) {
                            icon = "fa fa-thumbs-up";

                        } else {
                            icon = (response[i]['provider'].verified == 0) ? 'fa fa-thumbs-down' : "fa fa-thumbs-up";
                        }

                        var role ;
                        console.log(currentuser.type_id);
                        console.log(response[i]['type'].id);
                        if(currentuser.type_id == 2) {
                            role = (response[i]['type'].id == 2) ? "Admin" : response[i]['type'].type;
                        } else {
                            role = response[i].gender;
                        }
                        console.log(role);

                        var last_name = (response[i].last_name == null)? "" : response[i].last_name;

                        var servicesString = "-";

                        $.each(response[i]['services'], function (j, item) {

                            console.log(j);
                            if(servicesString == "-") {
                                servicesString =  item['service'].name;
                            } else {
                                servicesString += ", " + item['service'].name;
                            }
                            console.log(item);

                        });


                        var org_name = (response[i]['organisation'] == null)? "Individual" : response[i]['organisation'].name;


                        trHTML += '<tr><td><img src="' + img + '" class="square" width="60" height="50" /></td>' +
                        '   </td><td>' + org_name +
                            '</td><td>' + response[i].first_name + " " + last_name + '</td>' +
                            '</td><td>' + response[i].email + '</td>' +
                            '</td><td>' + role + '</td>' +
                            '</td><td>' + servicesString + '</td>' +
                            '</td><td>' + ' <a href="#" class="btn btn-info" onclick="viewDetail(' + response[i].id + ')"><i class="fas fa-eye"></i></a> ' +
                            '<a href="#" onclick="getVendorData(' + response[i].id + ')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="user_btn"><i class="fas fa-edit"></i></a> ' +
                            '<a href="#" class="btn btn-danger" onclick="deleteRecord(' + response[i].id + ')">'+
                            '<i class="fas fa-trash"></i></a> ' +
                            '<a href="#" class="btn btn-success" > <i class="'+ icon +'"></i></a>'
                             + '</td></tr>';
                    });
                    $('#tbl_id').append(trHTML);

                },
                fail: function (error) {
                    console.log(error);
                }
            });
        }




        $(document).on('change', '.tree input[type=checkbox]',
            function (e) {
                $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
                $(this).parentsUntil('.tree').children("input[type='checkbox']").prop('checked', this.checked);
                e.stopPropagation();
            });





        function getColumnValue(e){
            console.log(e);
            // alert(e);
        }

        function viewDetail(e){
            console.log(e);
            // alert(e);
            window.location = '/detail?id=' + e;
        }

        //update vendor record
        function update_vendor() {

            console.log("UPDATE CLICK");

            var edit = 'edit_data';
            if (document.getElementById('gender-male').checked) {
                selectGender = "Male";
            } else if(document.getElementById('gender-female').checked) {
                selectGender = "Female";
            }else if(document.getElementById('gender-other').checked) {
                selectGender = "Other";
            }

            let formUpdate = new FormData();
            formUpdate.append('id', editUserid);
            formUpdate.append('first_name', document.getElementById("first_name").value);
            formUpdate.append('last_name', document.getElementById("last_name").value);
            formUpdate.append('contact', document.getElementById("contact").value);
            formUpdate.append('email', document.getElementById("email").value);
            formUpdate.append('gender', selectGender);
            formUpdate.append('languages', selectedLang.toString());

            var image = $('#image')[0].files[0];
            if(image != null) {
                formUpdate.append('profile_photo', image);
            }

            if (currentuser.roles[0].name == 'Corporate Service Provider') {
                formUpdate.append('org_id', currentuser.org_id);
            } else {
                var org_id_select = $('#orglist').children("option:selected").val();
                console.log("category_id = " + org_id_select);
                if(org_id_select != 'select_org') {
                    formUpdate.append('org_id', org_id_select);
                }
            }



            // formUpdate.append('services', JSON.stringify(selectedService));
            // console.log(JSON.stringify(selectedService));
            var servicesVal = Array();
                var srvcCount;
                for(srvcCount = 0; srvcCount <selectedService.length; srvcCount++){
                    var srvc = selectedService[srvcCount];
                    // console.log("srvc === " + JSON.stringify(srvc));
                    // $obj = {};
                    if(srvc['category_id']) {
                        $obj = {
                            price : $("#"+srvc['category_id']+"category").val(),
                            service_id : srvc['service_id'],
                            category_id : srvc['category_id']
                        };
                    } else {
                        $obj = {
                            price : $("#"+srvc['service_id']+"price").val(),
                            service_id : srvc['service_id'],
                        };
                    }
                    // console.log("final ==" + JSON.stringify($obj));
                    // console.log("final ==" + $obj);
                    servicesVal.push($obj);
                }
                formUpdate.append('services', JSON.stringify(servicesVal));
                console.log("UPDATE ==== ",JSON.stringify(servicesVal));

            $.ajax({
                url: '/api/v1/vendorupdate',
                type: 'POST',
                data: formUpdate,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log("CREATE UPDATE REPOSNE == " + response);
                    window.top.location = window.top.location;
                    location.reload();
                },
                fail: function (error) {
                    console.log(error);
                    var x = document.getElementById("snackbar");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
            });
        }

        // Delete Record

        function deleteRecord(e){
            console.log(e);
            $.ajax(
                {
                    url: "/users/"+e,
                    type: 'DELETE',
                    data: null,
                    success: function (){
                        console.log("Delete");
                        window.top.location = window.top.location;
                        location.reload();
                    }
                })  .done(function() {
                 ajaxFunction();
                 });
        }

        var selectedLang = new Array();
        $('#lang-english').change(function () {
            $('#langError').text('')
            if (this.checked) {
                console.log('ENLISH YES')
                selectedLang.push("English");

            } else {
                console.log('ENGLISH NOT')
                selectedLang = $.grep(selectedLang, function (value) {
                    return value != "English";
                });
            }
        });

        $('#lang-arabic').change(function () {
            $('#langError').text('')
            if (this.checked) {
                selectedLang.push("Arabic");

            } else {
                console.log('ARABIC NOT')
                selectedLang = $.grep(selectedLang, function (value) {
                    return value != "Arabic";
                });
            }
        });

        function create_user()  {
            var servicevalite = users_validate();
            //
            if (servicevalite == true) {
                // var country = document.getElementById("select_country").selectedIndex;
                var form = new FormData();
                if (currentuser.roles[0].name == 'Corporate Service Provider') {
                    form.append('org_id', currentuser.org_id);
                } else {
                    var org_id_select = $('#orglist').children("option:selected").val();
                    console.log("category_id = " + org_id_select);
                    if(org_id_select != 'select_org') {
                        form.append('org_id', org_id_select);
                    }
                }

                form.append('first_name', document.getElementById("first_name").value);
                form.append('last_name', document.getElementById("last_name").value);
                form.append('email', document.getElementById("email").value);
                form.append('password', document.getElementById("password").value);
                form.append('contact', document.getElementById("contact").value);
                if (document.getElementById('gender-male').checked) {
                    selectGender = "Male";
                } else if(document.getElementById('gender-female').checked) {
                    selectGender = "Female";
                }else if(document.getElementById('gender-other').checked) {
                    selectGender = "Other";
                }

                form.append('gender', selectGender);
                form.append('languages', selectedLang.toString());
                form.append('resident_country', $( "#select_country option:selected" ).val());
                // form.append('category', document.getElementById("category").value);
                var image = $('#image')[0].files[0];
                form.append('profile_photo', image);

                // var checkedCheckboxes = $('#tree_box input[type="checkbox"]:checked');
                // form.append('services', selectedService.toString());
                var servicesVal = Array();
                var srvcCount;
                for(srvcCount = 0; srvcCount <selectedService.length; srvcCount++){
                    var srvc = selectedService[srvcCount];
                    console.log("srvc === " + JSON.stringify(srvc));
                    // $obj = {};
                    if(srvc['category_id']) {
                        $obj = {
                            price : $("#"+srvc['category_id']+"category").val(),
                            service_id : srvc['service_id'],
                            category_id : srvc['category_id']
                        };
                    } else {
                        $obj = {
                            price : $("#"+srvc['service_id']+"price").val(),
                            service_id : srvc['service_id'],
                        };
                    }
                    console.log("final ==" + JSON.stringify($obj));
                    console.log("final ==" + $obj);
                    servicesVal.push($obj);
                }
                form.append('services', JSON.stringify(servicesVal));


                $.ajax({
                    url: '/api/v1/add_vendors',
                    type: 'POST',
                    data: form,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log("CREATE CREATE REPOSNE == " + response);
                        window.top.location = window.top.location;
                        location.reload();
                    },
                    error: function (xhr){
                        console.log("errp = " + JSON.stringify(xhr));
                        if(xhr['status'] == 406) {
                            var errorArray = xhr['responseJSON'];
                            var msgStr = "";
                            $.each(errorArray, function (i, err) {
                                $.each(err, function (title, msg) {
                                    msgStr += msg.toString() + "\n";
                                });
                            });
                             var x = document.getElementById("snackbar");
                            x.className = "show";
                            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                            // $('.toast-body').text(msgStr);
                            // $('.toast').toast({delay:10000, animation:false});
                            // $('.toast').toast('show');

                        }
                    }
                });
            } else {

                $("#alerterror").text(servicevalite);
                $("#alerterror").show();
                setTimeout(function () {
                    $("#alerterror").hide()
                }, 1000);
            }

        }

        function genderClick() {
            $('#genderError').text('')
        }

        $(document).ready(function () {
            $.getJSON("../../country.json", function (data) {
                    $.each(data, function (index, value) {
                        $('#select_country').append(`<option value="${value['country_name']}">
                                                ${value['country_name']}
                                            </option>`);
                        // $('#codeLst').append(`<option value="${value['dialling_code']}">
                        //                         ${value['dialling_code']} ${value['country_name']}
                        //                     </option>`);

                });
            });
        });

        $("#select_country").change(function () {
            if ($("#select_country").val() === "Select Country") {
                $('#select_country').next('div.red').remove();
                $('#select_country').after('<div class="red" style="color:red">Country is Required</div>');
            } else {
                $(this).next('div.red').remove();
            }
        });

        //edit Record
        var editUserid;
        function getVendorData(vendorid)
        {
            console.log("vendorid:::::::::::::::"+ vendorid)
             document.getElementById('btntext').innerHTML = 'Edit Vendors';
             // document.getElementById('button').innerHTML = 'Update';
             $("#lbl_pass").hide();
             $("#password").hide();
             $("#btn_save").hide();
             $("#btn_update").show();

            // alert(id);
            editUserid=vendorid;

            $.ajax({
                url:"/user/"+vendorid+"/edit",
                method:'get',
                data:{id:vendorid},
                dataType:'JSON',
                success:function(data)
                {
                    console.log(data);
                    $('#first_name').val(data.first_name);
                    $('#last_name').val(data.last_name);
                    $('#email').val(data.email);
                    $('#contact').val(data.contact);


                    // var srvCount;
                    // for(srvCount = 0; srvCount< data['services'].length; srvCount++) {
                    //     selectedService.push(data['services'][srvCount].service_id);
                    //     $("#"+ data['services'][srvCount].service_id +"").prop('checked', true);
                    // }
                    var srvCount;
                    for(srvCount = 0; srvCount< data['services'].length; srvCount++) {
                        // console.log(loggedInUser['services'][srvCount]);
                        var srvcObj = {
                            service_id : data['services'][srvCount].service_id,
                            category_id : data['services'][srvCount].category_id,
                            price : data['services'][srvCount].price
                        };
                        // console.log(JSON.stringify(srvcObj));
                        selectedService.push(srvcObj);
                        $("#service" + data['services'][srvCount].service_id).prop('checked', true);
                        $("#category" + data['services'][srvCount].service_id + data['services'][srvCount].category_id).prop('checked', true);
                        if(data['services'][srvCount].category_id != null) {
                            $("#" + data['services'][srvCount].category_id + "category").val(data['services'][srvCount].price);
                        } else {
                            $("#" + data['services'][srvCount].service_id + "price").val(data['services'][srvCount].price);
                        }

                        // console.log("PRICE ===" + JSON.stringify(data['services'][srvCount]));
                    }



                    // $("#2").prop('checked', true);

                    selectedLang = data.languages.split(",");


                    console.log(selectedLang);

                    if(data.languages == 'Arabic')
                    {
                        $("#lang-arabic").prop('checked', true);
                    }
                    else if(data.languages == 'English')
                    {
                        $("#lang-english").prop('checked', true);
                    }
                    else
                    {
                        $("#lang-arabic").prop('checked', true);
                        $("#lang-english").prop('checked', true);
                    }
                    //for Gender
                    selectGender = data.gender
                    if(data.gender == 'Male')
                    {
                        $("#gender-male").prop("checked", true);
                    } else if(data.gender == 'Female') {

                        $("#gender-female").prop("checked", true);
                    } else {
                        $("#gender-other").prop("checked", true);
                    }

                    console.log(data['provider'].resident_country);
                    $('#select_country').val(data['provider'].resident_country);


                    $('#action').val('Edit');
                }
            });

        }
        // Form Validation

        var phone_regex = /^(\+\d)\d*[0-9-+](|.\d*[0-9]|,\d*[0-9])?$/
        var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
        var selectGender = "";
        function users_validate() {
            console.log("users_validate");
            var isValidate = true;

            var image = $('#image')[0].files[0];
         if (!image) {
              $("#image").focus();
           $("#image").focus();
           $("#image").blur(function () {
               var name = $('#image').val();
               if (name.length == 0) {
                   $('#image').next('div.red').remove();
                   $('#image').after('<div class="red" style="color:red">Image is Required</div>');
               } else {
                   $(this).next('div.red').remove();
                   return true;
               }
           });
         }else{

             var fileInput = document.getElementById('image');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.svg)$/i;
    if(!allowedExtensions.exec(filePath)){
         // alert('Please select a valid image file');
         console.log("ERROR");
                 $('#image').next('div.red').remove();
                 $('#image').after('<div class="red" style="color:red">Please select a valid image file</div>');
                document.getElementById("image").value = '';
                return false;
    }
         else {
                console.log("NOT WORL");
                $(this).next('div.red').remove();
                return true;
            }
         }

            if ($('#select_country').val() === "Select Country") {
                $('#select_country').next('div.red').remove();
                $('#select_country').after('<div class="red" style="color:red">Country is Required</div>');
                isValidate = false;
            }

            // var gender = document.getElementById('gender-group').value;

            if (document.getElementById('gender-male').checked) {
                selectGender = "Male";
            } else if(document.getElementById('gender-female').checked) {
                selectGender = "Female";
            }else if(document.getElementById('gender-other').checked) {
                selectGender = "Other";
            } else {
                $('#genderError').css('color', 'red');
                $('#genderError').text('Please select Gender')
                isValidate = false;
            }
            if (document.getElementById("first_name").value == "") {
                // EXPAND ADDRESS FORM
                $("#first_name").focus();
                $("#first_name").focus();
                $("#first_name").blur(function () {
                    var name = $('#first_name').val();
                    if (name.length == 0) {
                        $('#first_name').next('div.red').remove();
                        $('#first_name').after('<div class="red" style="color:red">First Name is Required</div>');
                        isValidate = false;
                    } else {
                        $(this).next('div.red').remove();
                    }
                });

            }

            if (document.getElementById("last_name").value == "") {
                // EXPAND ADDRESS FORM
                $("#last_name").focus();
                $("#last_name").focus();
                $("#last_name").blur(function () {
                    var name = $('#last_name').val();
                    if (name.length == 0) {
                        $('#last_name').next('div.red').remove();
                        $('#last_name').after('<div class="red" style="color:red">Last Name is Required</div>');
                        isValidate = false;
                    } else {
                        $(this).next('div.red').remove();
                    }
                });
            }

            if (document.getElementById("email").value == "") {
                $("#email").focus();
                $("#email").focus();
                $("#email").blur(function () {
                    var name = $('#email').val();
                    if (name.length == 0) {
                        console.log("ERRPR");
                        $('#email').next('div.red').remove();
                        $('#email').after('<div class="red" style="color:red">Email is Required</div>');
                        isValidate = false;
                    } else {
                        if (!email_regex.test($('#email').val())) {
                            console.log("ERROR");
                            $('#email').next('div.red').remove();
                            $('#email').after('<div class="red" style="color:red">Email is Invalid</div>');
                            isValidate = false;
                        } else {
                            $(this).next('div.red').remove();
                        }
                    }
                });
            } else {
                if (!email_regex.test($('#email').val())) {
                    console.log("ERROR");
                    $('#email').next('div.red').remove();
                    $('#email').after('<div class="red" style="color:red">Email is Invalid</div>');
                    isValidate = false;
                } else {
                    console.log("NOT WORL");
                    $(this).next('div.red').remove();
                }
            }

            //Password
            if (document.getElementById("password").value == "") {
                // EXPAND ADDRESS FORM
                $("#password").focus();
                $("#password").focus();
                $("#password").blur(function () {
                    var name = $('#password').val();
                    if (name.length == 0) {
                        $('#password').next('div.red').remove();
                        $('#password').after('<div class="red" style="color:red">Password is Required</div>');
                        isValidate = false;
                    } else {
                        $(this).next('div.red').remove();
                    }
                });
            }

            if (document.getElementById("contact").value == "") {
                $("#contact").focus();
                $("#contact").focus();
                $("#contact").blur(function () {
                    var name = $('#contact').val();
                    if (name.length == 0) {
                        $('#contact').next('div.red').remove();
                        $('#contact').after('<div class="red" style="color:red">Mobile number is Required</div>');
                        isValidate = false;
                    } else {
                        if (!phone_regex.test($('#contact').val())) {
                            console.log("ERRPR");
                            $('#contact').next('div.red').remove();
                            $('#contact').after('<div class="red" style="color:red">Mobile number is Invalid</div>');
                            isValidate = false;
                        } else {
                            console.log("NOT WORL");
                            $(this).next('div.red').remove();
                        }
                    }
                });
            } else {
                if (!phone_regex.test($('#contact').val())) {
                    console.log("ERRPR");
                    $('#contact').next('div.red').remove();
                    $('#contact').after('<div class="red" style="color:red">Mobile number is Invalid</div>');
                    isValidate = false;
                } else {
                    console.log("NOT WORL");
                    $(this).next('div.red').remove();
                }
            }

            if(selectedLang.length <= 0) {
                $('#langError').css('color', 'red');
                $('#langError').text('Please select Language')
                isValidate = false;
            }

            if(selectedService.length == 0) {
                $('#serviceError').css('color', 'red');
                $('#serviceError').text('Please select Services')
                $("#alertmessage").text("");
                isValidate = false;
            }
            else
            {
                var srvcCount;
                var checkVal = true;

                for(srvcCount = 0; srvcCount <selectedService.length; srvcCount++){
                    var srvc = selectedService[srvcCount];
                    if(srvc['category_id']) {
                        if($("#"+srvc['category_id']+"category").val() == "") {
                            checkVal = false;
                            $("#catemessage"+srvc['category_id']).text("Please select PriceBox");
                        } else {
                            $("#catemessage"+srvc['category_id']).text("");
                        }
                    } else {
                        if($("#"+srvc['service_id']+"price").val() == "") {
                            checkVal = false;
                            $("#alertmessage"+srvc['service_id']).text("Please select PriceBox");
                        } else {
                            $("#alertmessage"+srvc['service_id']).text("");
                        }
                    }

                }
                isValidate = checkVal;
            }

            console.log("LANG:: "+selectedLang.toString());
            return isValidate;
        }

        $("#image").change(function(){
            $('#imageError').text('')
            console.log("A file has been selected.");
        });



                //change save Button

                $('.btn btn-primary').click(function() {
                    $(this).hide();
                    $(this).siblings('.update, .cancel').show();
                });
                $('.cancel').click(function() {
                    $(this).siblings('.btn btn-primary').show();
                    $(this).siblings('.update').hide();
                    $(this).hide();
                });
                $('.update').click(function() {
                    $(this).siblings('.btn btn-primary').show();
                    $(this).siblings('.cancel').hide();
                    $(this).hide();
                });


                $('#button').click(function() {
                    $(this).val('update');
                });





                // This function for enter only number in services price field
                        function isNumber(evt) {
                            evt = (evt) ? evt : window.event;
                            var pattern = /^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*$/
                            var charCode = (evt.which) ? evt.which : evt.keyCode;
                            if ((charCode < 48 || charCode > 57) && charCode != 45) {
                        evt.preventDefault();
                            }
                            return true;
                            }

        </script>


            <style>
            .update, .cancel {
            display:none;
            };
            </style>

@endsection
