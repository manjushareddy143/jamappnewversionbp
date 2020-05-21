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
                                                    <label>First Name <strong
                                                            style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="text" class="form-control" id="first_name"
                                                           placeholder="Enter Your First Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>Last Name <strong
                                                            style="font-size: 14px;color: #e60606;">*</strong> </label>
                                                    <input type="text" class="form-control" id="last_name"
                                                           placeholder="Enter Your Last Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>Email Address <strong
                                                            style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="email" class="form-control" id="email"
                                                           placeholder="Enter Email Address">
                                                </div>
                                            </div>
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>Password <strong
                                                            style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="password" class="form-control" id="password"
                                                           aria-describedby="passwordHelp"
                                                           placeholder="Enter Your Password" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>Mobile Number <strong
                                                            style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="text" class="form-control" id="mobile"
                                                           placeholder="Enter Number">
                                                </div>
                                            </div>
                                            <!--radiobutton -->
                                            <div class="col-md-6 float-l">
                                                <div id="gender-group"
                                                     class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                                    <label>Gender <strong
                                                            style="font-size: 14px;color: #e60606;">*</strong></label><br>
                                                    <input type="radio" name="gender" id="gender" value="male"> Male
                                                    <input type="radio" name="gender" id="gender" value="female"> Female
                                                    <input type="radio" name="gender" id="gender" value="other"> Other
                                                    @if ($errors->has('gender'))
                                                        <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label for="language">Languages known <strong
                                                            style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="arabic" id="languages"
                                                                   value="arabic"> Arabic
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" name="english" id="languages"
                                                                   value="english"> English
                                                        </label>
                                                        @error('language')
                                                        <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                       </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>Services <strong
                                                            style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <select name="type" id="service_provider"
                                                            class="form-control @error('Selected type') is-invalid @enderror">
                                                        <option value="Selected">Select</option>
                                                        <option value="Corporate service provider">Corporate service
                                                            provider
                                                        </option>
                                                        <option value="Individual service provider">Individual service
                                                            provider
                                                        </option>
                                                    </select>
                                                    @error('type')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 float-l">

                                                <div class="form-group">
                                                    <label>Multi Dropdown Checkbox</label>


                                                    <ul class="tree">
                                                        <li class="has">
                                                            <input type="checkbox" name="domain[]"
                                                                   value="Agricultural Sciences">
                                                            <label>Agricultural Sciences <span class="total">(3)</span></label>
                                                            <ul>
                                                                <li class="">
                                                                    <input type="checkbox" name="subdomain[]"
                                                                           value="Agriculture, Dairy &amp; Animal Science">
                                                                    <label>Agriculture, Dairy &amp; Animal
                                                                        Science </label>
                                                                </li>
                                                                <li class="">
                                                                    <input type="checkbox" name="subdomain[]"
                                                                           value="Agricultural Engineering">
                                                                    <label>Agricultural Engineering </label>
                                                                </li>
                                                                <li class="">
                                                                    <input type="checkbox" name="subdomain[]"
                                                                           value="Agricultural Economics &amp; Policy">
                                                                    <label>Agricultural Economics &amp; Policy </label>
                                                                </li>

                                                            </ul>
                                                        </li>


                                                        <li class="has">
                                                            <input type="checkbox" name="domain[]"
                                                                   value="Chemical Sciences">
                                                            <label>Chemical Sciences <span
                                                                    class="total">(3)</span></label>
                                                            <ul>
                                                                <li class="">
                                                                    <input type="checkbox" name="subdomain[]"
                                                                           value="Chemistry, Applied">
                                                                    <label>Chemistry, Applied </label>
                                                                </li>
                                                                <li class="">
                                                                    <input type="checkbox" name="subdomain[]"
                                                                           value="Chemistry, Multidisciplinary">
                                                                    <label>Chemistry, Multidisciplinary </label>
                                                                </li>
                                                                <li class="">
                                                                    <input type="checkbox" name="subdomain[]"
                                                                           value="Chemistry, Analytical">
                                                                    <label>Chemistry, Analytical </label>
                                                                </li>

                                                            </ul>
                                                        </li>
                                                    </ul>


                                                </div>

                                            </div>
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>Image <strong
                                                            style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input id="image" type="file" name="image" class="form-control"
                                                           required>
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
        window.addEventListener ?
            window.addEventListener("load", onLoad(), false) :
            window.attachEvent && window.attachEvent("onload", onLoad());


        function onLoad() {
            console.log("ON LOAD  tbl_id")
            getResult();

        }

        $(document).on('click', '.tree label', function (e) {
            $(this).next('ul').fadeToggle();
            e.stopPropagation();
        });

        $(document).on('change', '.tree input[type=checkbox]',
            function (e) {
                $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
                $(this).parentsUntil('.tree').children("input[type='checkbox']").prop('checked', this.checked);
                e.stopPropagation();
            });


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
                            '</td><td>' + ' <a href="#" class="btn btn-info" ><i class="fas fa-eye"></i></a> ' +
                            '<a href="#" class="btn btn-primary" ><i class="fas fa-edit"></i></a> ' +
                            '<a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> ' +
                            '<a href="#" class="btn btn-success" name="verifyvendor" value="$service_provider->id"> Verified ' +
                            '</a>' + '</td></tr>';
                    });
                    $('#tbl_id').append(trHTML);
                },
                fail: function (error) {
                    console.log(error);
                }
            });
        };


        function create_user()
        {

            console.log("create_service");
            var servicevalite = users_validate();
            console.log("users_validate ::" + servicevalite);
            if (servicevalite == null) {
                console.log("CREATE SERVER CALL");

                var form = new FormData();
                form.append('first_name', document.getElementById("first_name").value);
                form.append('last_name', document.getElementById("last_name").value);
                form.append('email', document.getElementById("email").value);
                form.append('password', document.getElementById("password").value);
                form.append('contact', document.getElementById("mobile").value);
                form.append('gender', document.getElementById("gender").value);
                form.append('language', document.getElementById("languages").value);
                form.append('service_provider', document.getElementById("service_provider").value);
                form.append('category', document.getElementById("category").value);
                var image = $('#image')[0].files[0];
                form.append('profile_photo', image);


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


        var phone_regex = /^(\+\d)\d*[0-9-+](|.\d*[0-9]|,\d*[0-9])?$/
        var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

        function users_validate() {

            console.log("users_validate");
            if (document.getElementById("first_name").value == "") {
                // EXPAND ADDRESS FORM
                $("#first_name").focus();
                $("#first_name").focus();
                $("#first_name").blur(function () {
                    var name = $('#first_name').val();
                    if (name.length == 0) {
                        $('#first_name').next('div.red').remove();
                        $('#first_name').after('<div class="red" style="color:red">First Name is Required</div>');
                    } else {
                        $(this).next('div.red').remove();
                        return true;
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
                    } else {
                        $(this).next('div.red').remove();
                        return true;
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
                        //return "false";
                    } else {
                        if (!email_regex.test($('#email').val())) {
                            console.log("ERROR");
                            $('#email').next('div.red').remove();
                            $('#email').after('<div class="red" style="color:red">Email is Invalid</div>');
                            //return "false";
                        } else {
                            console.log("NOT WORL");
                            $(this).next('div.red').remove();
                            //return true;
                        }
                    }
                });
            } else {
                if (!email_regex.test($('#email').val())) {
                    console.log("ERROR");
                    $('#email').next('div.red').remove();
                    $('#email').after('<div class="red" style="color:red">Email is Invalid</div>');
                    //return "false";
                } else {
                    console.log("NOT WORL");
                    $(this).next('div.red').remove();
                    //return true;
                }

                // $('#email').next('div.red').remove();
                // $('#email').after('<div class="red" style="color:red">Email is Invalid</div>');
                // return "false";
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
                    } else {
                        $(this).next('div.red').remove();
                        return true;
                    }
                });
            }


            //Image

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
            }


            //contact
            if (document.getElementById("mobile").value == "") {
                $("#mobile").focus();
                $("#mobile").focus();
                $("#mobile").blur(function () {
                    var name = $('#mobile').val();
                    if (name.length == 0) {
                        $('#mobile').next('div.red').remove();
                        $('#mobile').after('<div class="red" style="color:red">Mobile number is Required</div>');
                        return false;
                    } else {
                        if (!phone_regex.test($('#mobile').val())) {
                            console.log("ERRPR");
                            $('#mobile').next('div.red').remove();
                            $('#mobile').after('<div class="red" style="color:red">Mobile number is Invalid</div>');
                            return "false";
                        } else {
                            console.log("NOT WORL");
                            $(this).next('div.red').remove();
                            //return true;
                        }
                    }
                });
            } else {
                if (!phone_regex.test($('#mobile').val())) {
                    console.log("ERRPR");
                    $('#mobile').next('div.red').remove();
                    $('#mobile').after('<div class="red" style="color:red">Mobile number is Invalid</div>');
                    return "false";
                } else {
                    console.log("NOT WORL");
                    $(this).next('div.red').remove();
                    //return true;
                }
            }


            // Gender Radiobutton

            // var checkRadio = document.querySelector(
            // 'input[name="gender"]:checked');

            // if (checkRadio != null) {
            // document.getElementById("gender").innerHTML
            //   = checkRadio.value
            //   + " radio button checked";
            // } else {
            // document.getElementById("gender").innerHTML
            //   = "No one selected";
            // }

        }


    </script>
@endsection

