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
        <h1 class="h3 mb-0 text-gray-800">@lang('dashboard.label_header')</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">@lang('dashboard.label_home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.label_nmenu')</li>
        </ol>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
                                <img id="profileImage" src="{{ asset('img/boy.png') }}"
                                       style="width: 100px; height: 100px; border-radius: 100%;"/>
                                <input id="imageUpload" type="file"
                                       name="profile_photo" placeholder="Photo" required="" capture>
                            </div>
                        </div>
                        <div class="row">
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
                        </div>

                        <div class="row">
                            <div class="col-md-6 float-r">
                                <div class="form-group" id="languages">
                                    <label>Language  <strong
                                            style="font-size: 14px;color: #e60606;">*</strong></label><br>
                                    <label for="english">English</label>
                                    <input type="checkbox" name="languages" id="lang-english" value="English" />

                                    <label for="arabic">Arabic</label>
                                    <input type="checkbox" name="languages" id="lang-arabic" value="arabic" />
                                </div>
                                <p id="langError"></p>
                            </div>

                            <div class="col-md-6 float-l" id="serviceRadiudiv">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Service Radius</label>
                                    <input id="address_line1" type="text" name=""
                                           placeholder="Service Radius in KM"
                                           class="form-control" required>
                                </div>

                            </div>
                        </div>





                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Services <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                    <p id="serviceError"></p>
                                    <ul class="tree" id="tree_box" style="overflow: auto;height: 200px;">
                                        

                                    </ul>
                                </div>
                            </div>
                        </div>


                        {{--                        ADDRESSS                        --}}

                        <a class="nav-link collapsed" href="#" data-toggle="collapse"
                           data-target="#collapseTable"
                           aria-expanded="true"
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
                                        <input id="address_name" type="text" name="address_name"
                                               placeholder="Office Address"
                                               class="form-control" required>
                                    </div>
                                </div>


                                <div class="col-md-6 float-l">
                                    <div class="form-group">
                                        <label>Address line 1</label>
                                        <input id="address_line1" type="text" name="address_line1"
                                               placeholder="Address line 1"
                                               class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6 float-r">
                                    <div class="form-group">
                                        <label>Address line 2</label>
                                        <input id="address_line2" type="text" name="address_line2"
                                               placeholder="Address line 2"
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
                                        <input id="postal_code" type="text" name="postal_code"
                                               placeholder="Enter Postal Code"
                                               class="form-control" required>
                                    </div>
                                </div>


                            </div>
                        </div>


                            <!-- <div class="col-md-12 float-l">
                               <div class="form-group">
                                <label>Language</label>
                                  <input type="checkbox" id="languages" name="english" checked>
                                  <label for="english">English</label>
                              </div>
                              <div class="form-group">
                                  <input type="checkbox" id="languages" name="arabic">
                                  <label for="arabic">Arabic</label>
                                </div>
                            </div> -->


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" onclick="saveProfile()" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="org_Modal" tabindex="-1" role="dialog"
         aria-labelledby="org_ModalLabel"
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
                    <form id="org_addform">


                        <div class="panel panel-default">
                            <div class="panel-body text-center">
                                <img id="org_profileImage" src="{{ asset('img/boy.png') }}"
                                       style="width: 100px; height: 100px; border-radius: 100%;"/>
                                <input id="org_imageUpload" type="file"
                                       name="org_profile_photo" placeholder="Photo" required="" capture>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Number of Employee</label>
                            <select class="form-control" id="numofemp">
                                <option selected>Select</option>
                                <option>1-100</option>
                                <option>101-500</option>
                                <option>501-1000</option>
                            </select>
                        </div>

                        {{--                        ADDRESSS                        --}}

                        <a class="nav-link collapsed" href="#" data-toggle="collapse"
                           data-target="#collapseTable" aria-expanded="true"
                           aria-controls="collapseTable">
                            <i class="fas fa-address-card"></i>
                            <span>Address</span>
                        </a>

                        <div class="col-md-12 collapse" id="collapseTable">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address Name</label>
                                        <input id="org_address_name" type="text"
                                               name="org_address_name" placeholder="Company Address"
                                               class="form-control" required>
                                    </div>
                                </div>


                                <div class="col-md-6 float-l">
                                    <div class="form-group">
                                        <label>Address line 1</label>
                                        <input id="org_address_line1" type="text"
                                               name="org_address_line1" placeholder="Address line 1"
                                               class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6 float-r">
                                    <div class="form-group">
                                        <label>Address line 2</label>
                                        <input id="org_address_line2" type="text"
                                               name="org_address_line2" placeholder="Address line 2"
                                               class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6 float-l">
                                    <div class="form-group">
                                        <label>Landmark</label>
                                        <input id="org_landmark" type="text" name="org_landmark"
                                               placeholder="Enter Landmark"
                                               class="form-control" required>
                                    </div>
                                </div>


                                <div class="col-md-6 float-r">
                                    <div class="form-group">
                                        <label>District</label>
                                        <input id="org_district" type="text" name="org_district"
                                               placeholder="Enter District"
                                               class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6 float-l">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input id="org_city" type="text" name="org_city"
                                               placeholder="Enter City"
                                               class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6 float-r">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input id="org_postal_code" type="text"
                                               name="org_postal_code"
                                               placeholder="Enter Postal Code"
                                               class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                            <button type="button" onclick="org_apiCall()" class="btn btn-primary">
                                Save
                            </button>
                        </div>


                    </form>

                </div>

                <style>

                    #org_imageUpload {
                        display: none;
                    }
                    #org_profileImage {
                        cursor: pointer;
                    }

                    #imageUpload {
                        display: none;
                    }
                    #profileImage {
                        cursor: pointer;
                    }
                </style>

            </div>
        </div>
    </div>
    <!-- Modal -->


    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <script type="text/javascript">


        $(document).on('change', '.tree input[type=checkbox]',
            function (e) {
                $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
                $(this).parentsUntil('.tree').children("input[type='checkbox']").prop('checked', this.checked);
                e.stopPropagation();
            });

        var selectedLang = [];
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

        window.addEventListener ?
            window.addEventListener("load", onLoad(), false) :
            window.attachEvent && window.attachEvent("onload", onLoad());

        function addServices() {
            $.ajax({
                url: '/api/v1/all_services',
                type: 'GET',
                success: function (response, xhr) {
                    console.log(JSON.stringify(xhr));
                    console.log("DATA::: "+response);
                    if (xhr['status'] == 204) {
                        console.log(response);
                    } else {
                        if(response != null) {
                            var trHTML = '';
                            var i;
                            for(i = 0; i < response.length; i++)
                            {
                                console.log(response[i].name);
                                var img = (response[i].icon_image == null) ? '{{ URL::asset('/img/boy.png') }}' : response[i].icon_image;
                                trHTML += '<li class=""> <input type="checkbox" id="scheckbox" ' +
                                    'onclick="serviceClick(' + response[i].id + ')"' + 'id="' + response[i].id +
                                    '" name="' + response[i].id +
                                    '" value="' + response[i].id + '">' +
                                    '<img src="' + img + '" class="square" width="50" height="40" />' +
                                    '<label style="margin: 10px;width: 260px!important;"> ' + response[i].name  + ' </label> ' +
                                    '<input type="number" id="'+response[i].id+'price" name="someid" onkeypress="return isNumberKey(event)"  size="4" style="margin-left: 10px;"> </li>'+
                                    '<label id="alertmessage" style="color:red"> </label> ';
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

        function onLoad() {
            console.log("asdasdas");
            var retrievedObject = localStorage.getItem('userObject');
            console.log(retrievedObject)
            var obj = JSON.parse(retrievedObject);

            if (obj.address === null) {
                addServices();
                // getServices();
                console.log("ADMINUSER =====" + obj.roles[0].slug);
                if (obj.roles[0].slug == "organisation-admin") {
                    console.log("ADMINUSER");
                    $('#org_Modal').modal({
                        backdrop: 'static',
                        keyboard: false
                    })
                } else {
                    // VENDRO
                    $('#exampleModal').modal({
                        backdrop: 'static',
                        keyboard: false
                    })
                }
            }

        }

        function previewProfileImage(uploader) {
            if (uploader.files && uploader.files[0]) {
                var imageFile = uploader.files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#profileImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(imageFile);
            }
        }


        function orgPreviewProfileImage(uploader) {
            if (uploader.files && uploader.files[0]) {
                var imageFile = uploader.files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#org_profileImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(imageFile);
            }
        }

        $("#imageUpload").change(function () {
            previewProfileImage(this);
        });

        $("#profileImage").click(function (e) {
            $("#imageUpload").click();
        });

        $("#org_imageUpload").change(function () {
            orgPreviewProfileImage(this);
        });

        $("#org_profileImage").click(function (e) {
            $("#org_imageUpload").click();
        });


        // function getServices() {
        //     $.ajax({
        //         url: '/api/v1/all_services',
        //         type: 'GET',
        //         success: function (response, xhr) {
        //             console.log(JSON.stringify(xhr));
        //             console.log("DATA::: "+response);
        //             if (xhr['status'] == 204) {
        //                 console.log(response);
        //             } else {
        //                 if(response != null) {
        //                     for (var i = 0; i < response.length; i++) {
        //                         console.log(response[i].name);
        //                         $('#servicelist').append(`<option value="${response[i].id}">
        //                            ${response[i].name}
        //                       </option>`);
        //                     }
        //                     var selected_id = $('#servicelist').children("option:selected").val();
        //                     console.log(selected_id);
        //                     setCategories(selected_id);
        //                 }
        //
        //             }
        //         },
        //         fail: function (error) {
        //             console.log(error);
        //         }
        //     });
        // }

        // $("#servicelist").change(function () {
        //     var selected_id = $('#servicelist').children("option:selected").val();
        //     // $('#categorylist').empty();
        //     setCategories(selected_id);
        // });
        var selectedService = [];
        function serviceClick(id) {
            console.log("CLIKC ::" + id);

            $('#serviceError').text('')
            if(jQuery.inArray(id, selectedService) != -1) {
                console.log("is in array");
                selectedService = $.grep(selectedService, function(value) {
                    return value != id;
                });

            } else {
                console.log("is NOT in array");

                selectedService.push(id);
            }
            console.log(selectedService);
        }


        // function setCategories(selected_id) {
        //     console.log(selected_id);
        //     $.ajax({
        //         url: '/api/v1/services/category?id=' + selected_id,
        //         type: 'GET',
        //         success: function (response, xhr) {
        //             console.log(response)   ;
        //             console.log(JSON.stringify(xhr));
        //             if (response['status'] == 204) {
        //                 console.log(response);
        //             } else {
        //                 for (var i = 0; i < response.length; i++) {
        //                     $('#categorylist').append(`<option value="${response[i].id}">
        //                            ${response[i].name}
        //                       </option>`);
        //                 }
        //             }
        //         },
        //         fail: function (error) {
        //             console.log(error);
        //         }
        //     });
        // }


        function validateForm() {
            var isValidate = true;
            var errormessage = "";
            var profilePhoto = $('#imageUpload')[0].files[0];
            if (!profilePhoto) {
                isValidate = false;
            }

            var docupload = $('#docupload')[0].files[0];
            if (!docupload) {
                isValidate = false;
            }

            if(selectedLang.length <= 0) {
                $('#langError').css('color', 'red');
                $('#langError').text('Please select Language')
                isValidate = false;
            }

            if(selectedService.length <= 0) {
                alert('if');
                $('#serviceError').css('color', 'red');
                $('#serviceError').text('Please select Services')
                isValidate = false;
            }else{
                // alert('else');
                    console.log("start");
                    console.log(selectedService);
                    // $.each(selectedService , function( index, value ) {
                    // // alert( index + ": " + value );
                    // // alert($("#"+value+"price").val());
                    // });
                    errormessage = "Please add price in  PriceBox"
                    $("#alertmessage").text(errormessage);
                    console.log("end");
                     $('.selectedService').each(function (val) {
                        // alert('hello');
                     if(document.getElementById('"'+value+'price"').value == "") {

                     $('#selectedService').text('Please select PriceBox');    
                     }else{
                        $('#selectedService').text('');
                     }
                    });

                    }


            if ($('#collapseTable').is(':visible')) {
                console.log("TOTOTO");
            } else {
                console.log("YPPPPP");
                $('#collapseTable').modal('show');
            }

            if (document.getElementById("address_name").value == "") {
                // EXPAND ADDRESS FORM
                isValidate = false;
            }

            if (document.getElementById("address_line1").value == "") {
                isValidate = false;
            }

            if (document.getElementById("district").value == "") {
                isValidate = false;
            }

            if (document.getElementById("city").value == "") {
                // EXPAND ADDRESS FORM
                isValidate = false;
            }

            if (document.getElementById("postal_code").value == "") {
                // EXPAND ADDRESS FORM
                isValidate = false;
            }
            return isValidate;
        }

        //textbox validation

           function validatebox() {
        if (document.getElementById('scheckbox').checked) {
            $("[name='someid']").prop("required", true);
        } else {
            alert("You didn't check it!.");
        }
             }

        // it return true if form is validdated @please test it before proceed
        function org_validateForm()
        {
            var isValidate = false;
            console.log("organisation_validate");
            let optionsLength = document.getElementById("numofemp").length;

            if ($("#numofemp").val() === "Select Number of Employee") {
                $('#numofemp').next('div.red').remove();
                $('#numofemp').after('<div class="red" style="color:red">Choose number of employee is Required</div>');
                isValidate = false;
            } else {
                $(this).next('div.red').remove();
                isValidate = true;
            }
            if (document.getElementById("org_imageUpload").value == "") {
                $("#org_imageUpload").focus();
                $("#org_imageUpload").focus();
                $("#org_imageUpload").blur(function ()
                {
                    var name = $('#org_imageUpload').val();
                    if (name.length == 0)
                    {
                        $('#org_imageUpload').next('div.red').remove();
                        $('#org_imageUpload').after('<div class="red" style="color:red">Company Image is Required</div>');
                        isValidate = false;
                    }
                    else
                    {
                        $(this).next('div.red').remove();
                        isValidate = true;
                    }
                });

            }

            if (document.getElementById("org_address_name").value == "") {
                $("#org_address_name").focus();
                $("#org_address_name").focus();
                $("#org_address_name").blur(function ()
                {
                    var name = $('#org_address_name').val();
                    if (name.length == 0)
                    {
                        $('#org_address_name').next('div.red').remove();
                        $('#org_address_name').after('<div class="red" style="color:red">Address Name is Required</div>');
                        isValidate = false;
                    }
                    else
                    {
                        $(this).next('div.red').remove();
                        isValidate = true;
                    }
                });
            }

            if (document.getElementById("org_address_line1").value == "") {
                $("#org_address_line1").focus();
                $("#org_address_line1").focus();
                $("#org_address_line1").blur(function ()
                {
                    var name = $('#org_address_line1').val();
                    if (name.length == 0)
                    {
                        $('#org_address_line1').next('div.red').remove();
                        $('#org_address_line1').after('<div class="red" style="color:red">Address line1 is Required</div>');
                        isValidate = false;
                    }
                    else
                    {
                        $(this).next('div.red').remove();
                        isValidate = true;
                    }
                });
            }

            if (document.getElementById("org_address_line2").value == "") {
                $("#org_address_line2").focus();
                $("#org_address_line2").focus();
                $("#org_address_line2").blur(function ()
                {
                    var name = $('#org_address_line2').val();
                    if (name.length == 0)
                    {
                        $('#org_address_line2').next('div.red').remove();
                        $('#org_address_line2').after('<div class="red" style="color:red">Address line2 is Required</div>');
                        isValidate = false;
                    }
                    else
                    {
                        $(this).next('div.red').remove();
                        isValidate = true;
                    }
                });
            }

            if (document.getElementById("org_landmark").value == "") {
                $("#org_landmark").focus();
                $("#org_landmark").focus();
                $("#org_landmark").blur(function ()
                {
                    var name = $('#org_landmark').val();
                    if (name.length == 0)
                    {
                        $('#org_landmark').next('div.red').remove();
                        $('#org_landmark').after('<div class="red" style="color:red">Address line2 is Required</div>');
                        isValidate = false;
                    }
                    else
                    {
                        $(this).next('div.red').remove();
                        isValidate = true;
                    }
                });

            }
            if (document.getElementById("org_district").value == "") {
                $("#org_district").focus();
                $("#org_district").focus();
                $("#org_district").blur(function ()
                {
                    var name = $('#org_district').val();
                    if (name.length == 0)
                    {
                        $('#org_district').next('div.red').remove();
                        $('#org_district').after('<div class="red" style="color:red">District is Required</div>');
                        isValidate = false;
                    }
                    else
                    {
                        $(this).next('div.red').remove();
                        isValidate = true;
                    }
                });

            }
            if (document.getElementById("org_city").value == "") {
                $("#org_city").focus();
                $("#org_city").focus();
                $("#org_city").blur(function ()
                {
                    var name = $('#org_city').val();
                    if (name.length == 0)
                    {
                        $('#org_city').next('div.red').remove();
                        $('#org_city').after('<div class="red" style="color:red">City is Required</div>');
                        isValidate = false;
                    }
                    else
                    {
                        $(this).next('div.red').remove();
                        isValidate = true;
                    }
                });

            }
            if (document.getElementById("org_postal_code").value == "") {
                $("#org_postal_code").focus();
                $("#org_postal_code").focus();
                $("#org_postal_code").blur(function ()
                {
                    var name = $('#org_postal_code').val();
                    if (name.length == 0)
                    {
                        $('#org_postal_code').next('div.red').remove();
                        $('#org_postal_code').after('<div class="red" style="color:red">Postal Code is Required</div>');
                        isValidate = false;
                    }
                    else
                    {
                        $(this).next('div.red').remove();
                        isValidate = true;
                    }
                });
            }

            return isValidate;
        }



    function saveProfile() {
            validatebox();
        if (validateForm() == true) {
            console.log("VALIDATE FORM");
            apiCall();
        } else {
            console.log("INVALIDATE FORM");
        }
    }

        function apiCall() {    
            var form = new FormData();
            var files = $('#imageUpload')[0].files[0];
            form.append('profile_photo', files);
            var doc_files = $('#docupload')[0].files[0];
            form.append('identity_proof', doc_files);
            var retrievedObject = localStorage.getItem('userObject');
            var obj = JSON.parse(retrievedObject);
            // var languagesarray=[];
            // console.log("IDDD==" + obj.id);
            // $("input:checkbox[name=languages]:checked").each(function(){
            //     languagesarray.push($(this).val());
            //     });
            //
            // form.append('languages', languagesarray.toString());
            form.append('languages', selectedLang.toString());
            $addressdata = {
                name: document.getElementById("address_name").value,
                address_line1: document.getElementById("address_line1").value,
                address_line2: document.getElementById("address_line2").value,
                landmark: document.getElementById("landmark").value,
                district: document.getElementById("district").value,
                city: document.getElementsByTagName("city").value,
                postal_code: document.getElementsByTagName("postal_code").value,
                user_id: obj.id,
                location: "",
            };


            //     var myObject = {price, service_id};

            //     for(var i = 0; i < 2; i++) {
            //        myObject.property = 'newValue';
            //        myObject.anotherProp = [];
            //        for(...) {
            //            myObject.anotherProp.push('price');
            //         }
            //     }

            //     var json = JSON.stringify(myObject);

                var services = {price:"50", service_id:"2"};
                document.getElementById("price").innerHTML = "The services price is " + services.price;

                // $selectedService = {
            //     price: document.getElementById('"'+value+'price"').value,
            // };

            // console.log($addressdata)
            form.append('address', JSON.stringify($addressdata));

            // var services = [];
            // var selected_id = $('#servicelist').children("option:selected").val();
            // var selectedCategories = $('#categorylist').children("option:selected");
            // selectedCategories.each(function () {
            //     console.log($(this).val());
            //     var data = {};
            //     data.service_id = parseInt(selected_id),
            //         data.category_id = parseInt($(this).val());
            //     services.push(data);
            // })

            // console.log(services)
            form.append('services', selectedService.toString());


            

            form.append('doc_type', $('#doctypelist').children("option:selected").val());
            console.log($('#doctypelist').children("option:selected").val());


            form.append('id', obj.id);
            console.log('testprofile');
            console.log(form)


            $.ajax({
                url: '/api/v1/profile',
                type: 'POST',
                data: form,
                contentType: false,
                processData: false,
                success: function (response) {
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

        function org_apiCall() {
            var profilevalidate = org_validateForm();
            console.log("org_validateForm AUR::"+ profilevalidate);
            if(profilevalidate == true)
            {
                var numOfEmp = document.getElementById("numofemp").selectedIndex;
            var form = new FormData();
            var files = $('#org_imageUpload')[0].files[0];
            form.append('profile_photo', files);
            //var doc_files = $('#docupload')[0].files[0];
            //form.append('identity_proof', doc_files);
            var retrievedObject = localStorage.getItem('userObject');
            var obj = JSON.parse(retrievedObject);
            console.log("IDDD==" + obj.id);
            $addressdata = {
                name: document.getElementById("org_address_name").value,
                address_line1: document.getElementById("org_address_line1").value,
                address_line2: document.getElementById("org_address_line2").value,
                landmark: document.getElementById("org_landmark").value,
                district: document.getElementById("org_district").value,
                city: document.getElementsByTagName("org_city").value,
                postal_code: document.getElementsByTagName("org_postal_code").value,
                user_id: obj.id,
                location: "",
            };
            console.log($addressdata)
            form.append('address', JSON.stringify($addressdata));
            form.append('number_of_employee', document.getElementsByTagName("option")[numOfEmp].value);
            form.append('id', obj.id);

            $.ajax({
                url: '/api/v1/org_profile',
                type: 'POST',
                data: form,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    $('#org_Modal').modal('hide')
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
            } else {
                $("#alerterror").text(profilevalidate);
                $("#alerterror").show();
                setTimeout(function(){
                    $("#alerterror").hide()
                },1000);
            }
        }


            function isNumberKey(evt){

                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }  

    </script>
    </body>


@endsection
