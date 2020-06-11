@extends('layouts.admin')
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">@lang('vendor.label_header')</h6>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                id="user_btn"><i class="fa fa-plus" aria-hidden="true"></i> @lang('vendor.label_title')
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
                                                           placeholder="@lang('vendor.label_place_pass')" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>@lang('vendor.label_mobile') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="text" class="form-control" id="contact"
                                                           placeholder="@lang('vendor.label_place_mobile')">
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
                                       <strong>{{ $message }}</strong>
                                       </span>
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
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">@lang('vendor.label_Country')
                                                <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                            <select class="form-control" id="select_country" required>
                                                <option>Select Country</option>
                                                <option>India</option>
                                                <option>Bangladesh</option>
                                                <option>Australia</option>
                                                <option>USA</option>
                                                <option>Afghanistan</option>
                                            </select>
                                            <p id="countryError"></p>
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
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('vendor.label_cbtn')</button>
                                    <button type="button" id="button" onclick="create_user()" value="save" class="btn btn-primary">@lang('vendor.label_sbtn')</button>
                                    <button type="button" onclick="update_vendor()" class="btn btn-primary">@lang('vendor.label_ubtn')</button>



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="tbl_id">
                            <thead class="thead-light">
                            <tr>
                                <th>@lang('vendor.label_tab_fname')</th>
                                <th>@lang('vendor.label_tab_lname')</th>
                                <th>@lang('vendor.label_tab_email')</th>
                                <th>@lang('vendor.label_tab_profile')</th>
                                <th>@lang('vendor.label_tab_gender')</th>
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

        function getListOfService() {
            $.ajax({
                url: '/api/v1/all_services',
                type: 'GET',
                success: function (response, xhr) {
                    if (xhr['status'] == 204) {
                        console.log(response);
                    } else {
                        if(response != null) {
                            var trHTML = '';
                            var i;
                            for(i = 0; i < response.length; i++)
                            {
                                var img = (response[i].icon_image == null) ? '{{ URL::asset('/img/boy.png') }}' : response[i].icon_image;
                                trHTML += '<li class=""> <input type="checkbox" ' +
                                    'onclick="clickMe(' + response[i].id + ')"' + 'id="' + response[i].id +
                                    '" name="' + response[i].id +
                                    '" value="' + response[i].id + '">' +
                                    '<img src="' + img + '" class="square" width="50" height="40" />' +
                                    '<label style="margin: 10px;"> ' + response[i].name +
                                    '</label> ' +  '<input type="text" ' +
                                'onclick="clickMe(' + response[i].id + ')"' + 'id="' + response[i].id +
                                '" name="' + response[i].id +
                                '" value="' + response[i].id + '"></li>';
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

        function clickMe(id) {
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

        function getResult() {

            $.ajax({
                url: '/api/v1/getuser/3',
                type: 'GET',
                data: null,
                success: function (response) {
                    console.log("CREATE CREATE REPOSNE == " + JSON.stringify(response));
                    var trHTML = '';

                    $.each(response, function (i, item) {
                        var img = (response[i].image == null) ? '{{ URL::asset('/img/boy.png') }}' : response[i].image;
                        trHTML += '<tr><td>' + response[i].first_name +
                            '</td><td>' + response[i].last_name + '</td>' +
                            '</td><td>' + response[i].email + '</td>' +
                            '</td><td><img src="' + img + '" class="square" width="60" height="50" /></td>' +
                            '</td><td>' + response[i].gender + '</td>' +
                            '</td><td>' + ' <a href="#" class="btn btn-info" onclick="viewDetail(' + response[i].id + ')"><i class="fas fa-eye"></i></a> ' +
                            '<a href="#" onclick="getVendorData(' + response[i].id + ')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="user_btn"><i class="fas fa-edit"></i></a> ' +
                            '<a href="#" class="btn btn-danger" onclick="deleteRecord(' + response[i].id + ')"><i class="fas fa-trash"></i></a> ' +
                            '<a href="#" class="btn btn-success" name="verifyvendor" onclick="getColumnValue(' + response[i].id + ')" ' +
                            '> Verified ' +
                            '</a>' + '</td></tr>';
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
            console.log(retrievedObject)
            currentuser = JSON.parse(retrievedObject);
            console.log(currentuser.roles[0].name)


            if(currentuser.roles[0].name == 'Admin') {
                getResult();
            } else if (currentuser.roles[0].name == 'Corporate Service Provider') {
                getOrgVendors();
            }
            getListOfService();
        }

        function getOrgVendors()
        {
            $.ajax({
                url: '/api/v1/organisation/vendors/' + currentuser.org_id,
                type: 'GET',
                data: null,
                success: function (response) {
                    // console.log("CREATE CREATE REPOSNE == " + JSON.stringify(response));
                    var trHTML = '';

                    $.each(response, function (i, item) {
                        console.log("PR== " + response[i]['provider']);
                        var img = (response[i].image == null) ? '{{ URL::asset('/img/boy.png') }}' : response[i].image;
                        var icon;
                        if(response[i]['provider'] == null) {
                            icon = "fa fa-thumbs-up";

                        } else {
                            icon = (response[i]['provider'].verified == 0) ? 'fa fa-thumbs-down' : "fa fa-thumbs-up";
                        }

                        trHTML += '<tr><td>' + response[i].first_name +
                            '</td><td>' + response[i].last_name + '</td>' +
                            '</td><td>' + response[i].email + '</td>' +
                            '</td><td><img src="' + img + '" class="square" width="60" height="50" /></td>' +
                            '</td><td>' + response[i].gender + '</td>' +
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
            
            var edit = 'edit_data';
            $.ajax({
                url: '/api/v1/vendorupdate/' + editUserid,
                type: 'PUT',
                data: {
                    'id' : editUserid, 
                    'first_name' : document.getElementById("first_name").value, 
                    'last_name' : document.getElementById("last_name").value,
                    'contact' : document.getElementById("contact").value
                    },

                success: function (data) {
                    if(data == 1) {
                        console.log("SUCCESS");
                        window.top.location = window.top.location;
                        location.reload();
                    } else {
                        console.log("FAIL");
                        // $('#btn_verify').show();
                    }
                },
                fail: function (error) {
                    console.log(error);
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

        function create_user()  {
            var servicevalite = users_validate();
            if (servicevalite == true) {
                var country = document.getElementById("select_country").selectedIndex;
                var form = new FormData();
                if (currentuser.roles[0].name == 'Corporate Service Provider') {
                    form.append('org_id', currentuser.org_id);
                }

                form.append('first_name', document.getElementById("first_name").value);
                form.append('last_name', document.getElementById("last_name").value);
                form.append('email', document.getElementById("email").value);
                form.append('password', document.getElementById("password").value);
                form.append('contact', document.getElementById("contact").value);
                form.append('gender', selectGender);
                form.append('languages', selectedLang.toString());
                form.append('resident_country', document.getElementsByTagName("option")[country].value);
                // form.append('category', document.getElementById("category").value);
                var image = $('#image')[0].files[0];
                form.append('profile_photo', image);

                // var checkedCheckboxes = $('#tree_box input[type="checkbox"]:checked');
                form.append('services', selectedService.toString());


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
                    fail: function (error) {
                        console.log(error);
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
                    $("#lang-arabic").prop('checked', true);
                    $("#lang-english").prop('checked', true);
                    $("#gender-male ").prop('checked', true);
                    $("#gender-female ").prop('checked', true);
                    $("#gender-other ").prop('checked', true);

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
                $('#imageError').css('color', 'red');
                $('#imageError').text('Please select Image')
                isValidate = false;
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

            if(selectedService.length <= 0) {
                $('#serviceError').css('color', 'red');
                $('#serviceError').text('Please select Services')
                isValidate = false;
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

        </script>


            <style>
            .update, .cancel {
            display:none;
            };
            </style>

@endsection
