@extends('layouts.admin')
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Vendors</h6>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                id="user_btn"><i class="fa fa-plus" aria-hidden="true"></i> Add Vendors
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Vendors</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>First Name <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="text" class="form-control" id="first_name"
                                                           placeholder="Enter Your First Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>Last Name <strong style="font-size: 14px;color: #e60606;">*</strong> </label>
                                                    <input type="text" class="form-control" id="last_name"
                                                           placeholder="Enter Your Last Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>Email Address <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="email" class="form-control" id="email"
                                                           placeholder="Enter Email Address">
                                                </div>
                                            </div>
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>Password <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="password" class="form-control" id="password"
                                                           aria-describedby="passwordHelp"
                                                           placeholder="Enter Your Password" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>Mobile Number <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="text" class="form-control" id="mobile"
                                                           placeholder="Enter Number">
                                                </div>
                                            </div>
                                            <!--radiobutton -->
                                            <div class="col-md-6 float-l">
                                                <div id="gender-group"
                                                     class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                                    <label>Gender <strong style="font-size: 14px;color: #e60606;">*</strong></label><br>
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
                                                    <label for="language">Languages known <strong style="font-size: 14px;color: #e60606;">*</strong></label>
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
                                                    <label>Image <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input id="image" type="file" name="image" class="form-control"
                                                           required>
                                                </div>
                                                <p id="imageError"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Country
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
                                                    <label>Services <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <p id="serviceError"></p>
                                                    <ul class="tree" id="tree_box"
                                                        style="overflow: auto;height: 200px;"></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" onclick="create_user()" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="tbl_id">
                            <thead class="thead-light">
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Profile</th>
                                <th>Gender</th>
                                <th width="280px">Action
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
                            '<a href="#" class="btn btn-primary" ><i class="fas fa-edit"></i></a> ' +
                            '<a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> ' +
                            '<a href="/vendorsdetail" class="btn btn-success" name="verifyvendor" onclick="getColumnValue(' + response[i].id + ')" ' +
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


        function onLoad() {
            console.log("ON LOAD  tbl_id")
            getResult();
            addServices();

        }

        // $(document).on('click', '.tree label', function (e) {
        //     $(this).next('ul').fadeToggle();
        //     e.stopPropagation();
        // });

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
            console.log("create_serviceusers_validate ");
            var servicevalite = users_validate();
            console.log("users_validate ::" + servicevalite);
            if (servicevalite == true) {
                console.log("CREATE SERVER CALL");
                var country = document.getElementById("select_country").selectedIndex;
                var form = new FormData();
                form.append('first_name', document.getElementById("first_name").value);
                form.append('last_name', document.getElementById("last_name").value);
                form.append('email', document.getElementById("email").value);
                form.append('password', document.getElementById("password").value);
                form.append('contact', document.getElementById("mobile").value);
                form.append('gender', selectGender);
                form.append('language', selectedLang.toString());
                form.append('resident_country', document.getElementsByTagName("option")[country].value);
                // form.append('category', document.getElementById("category").value);
                var image = $('#image')[0].files[0];
                form.append('profile_photo', image);

                // var checkedCheckboxes = $('#tree_box input[type="checkbox"]:checked');
                console.log(selectedService.toString());
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
                selectGender = document.getElementById('gender-male').value;
            } else if(document.getElementById('gender-female').checked) {
                selectGender = document.getElementById('gender-male').value;
            }else if(document.getElementById('gender-other').checked) {
                selectGender = document.getElementById('gender-male').value;
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

            if (document.getElementById("mobile").value == "") {
                $("#mobile").focus();
                $("#mobile").focus();
                $("#mobile").blur(function () {
                    var name = $('#mobile').val();
                    if (name.length == 0) {
                        $('#mobile').next('div.red').remove();
                        $('#mobile').after('<div class="red" style="color:red">Mobile number is Required</div>');
                        isValidate = false;
                    } else {
                        if (!phone_regex.test($('#mobile').val())) {
                            console.log("ERRPR");
                            $('#mobile').next('div.red').remove();
                            $('#mobile').after('<div class="red" style="color:red">Mobile number is Invalid</div>');
                            isValidate = false;
                        } else {
                            console.log("NOT WORL");
                            $(this).next('div.red').remove();
                        }
                    }
                });
            } else {
                if (!phone_regex.test($('#mobile').val())) {
                    console.log("ERRPR");
                    $('#mobile').next('div.red').remove();
                    $('#mobile').after('<div class="red" style="color:red">Mobile number is Invalid</div>');
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


    </script>

@endsection

