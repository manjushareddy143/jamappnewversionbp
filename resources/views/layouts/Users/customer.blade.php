@extends('layouts.admin')
<head>

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
<div class="toast" style="margin-left: auto; margin-right: 5px;
margin-top: 9px; position: absolute; top: 0; right: 0;">
    <div class="toast-header"> Error </div>
    <div class="toast-body"> msgStr </div>
 </div>
<div class="container-fluid" id="container-wrapper">
   <div class="row">
      <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header py-3 d-flex">
                    <h6 class="m-0 font-weight-bold text-primary">@lang('customer.label_header')</h6>

                    <div style="padding-left: 68%;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                        id="user_addbtn"><i class="fa fa-plus" aria-hidden="true"></i> @lang('customer.label_title')</button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="btntext"> @lang('customer.label_title')</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>@lang('customer.label_fname')<strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="text" class="form-control" id="first_name"
                                                           placeholder="@lang('customer.label_place_fname')">
                                                </div>
                                            </div>
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>@lang('customer.label_lname') <strong style="font-size: 14px;color: #e60606;">*</strong> </label>
                                                    <input type="text" class="form-control" id="last_name"
                                                           placeholder="@lang('customer.label_place_lname')">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>@lang('customer.label_email') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="email" class="form-control" id="email"
                                                           placeholder="@lang('customer.label_place_email')">
                                                </div>
                                            </div>
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label id="lbl_pass">@lang('customer.label_password') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="password" class="form-control" id="password"
                                                           aria-describedby="passwordHelp"
                                                           placeholder="@lang('customer.label_place_pass')" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 float-l">
                                                <div class="form-group">
                                                    <label>@lang('customer.label_mobile') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input type="text" class="form-control" id="contact" onkeypress="return isNumberKey(event)"
                                                           placeholder="@lang('customer.label_place_mobile')">
                                                </div>
                                            </div>
                                            <!--radiobutton -->
                                            <div class="col-md-6 float-l">
                                                <div id="gender-group"
                                                     class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                                    <label>@lang('customer.label_gender') <strong style="font-size: 14px;color: #e60606;">*</strong></label><br>
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
                                                    <label for="language">@lang('customer.label_language')  <strong style="font-size: 14px;color: #e60606;">*</strong></label>
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
                                                    <label>@lang('customer.label_Image')  <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <input id="image" type="file" name="image" class="form-control"
                                                           required>
                                                </div>
                                                <p id="imageError"></p>
                                            </div>
                                        </div>

                                        {{-- <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>@lang('customer.label_services')  <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <p id="serviceError"></p>
                                                    <ul class="tree" id="tree_box" style="overflow: auto;height: 200px;"></ul>
                                                </div>
                                            </div>
                                        </div> --}}
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('customer.label_cbtn')</button>
                                    <button type="button" id="btn_save" onclick="create_user()" value="save" class="btn btn-primary">@lang('customer.label_sbtn')</button>
                                    <button type="button" id="btn_update" onclick="update_customer()" class="btn btn-primary">@lang('customer.label_ubtn')</button>
                                    {{-- <a class="btn btn-info btn-lg" id="alert-target" onclick="clickme()">Click me!</a> --}}


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    {{-- filter dropdown --}}
                    <div class="col-md-1">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: #46a396 !important;border: none;"  required>
                          @lang('orders.label_tab_filter')
                            {{-- <span class="caret"></span> --}}
                            <ul class="dropdown-menu">
                                <input class="form-control" id="filter_option" type="text" placeholder="Search.."  >
                                <li><a href="#rating" style="padding-left: 20%;">Rating</a></li>
                                <li><a href="#price" style="padding-left: 20%;">Price</a></li>
                                <li><a href="#" style="padding-left: 20%;">Availability</a></li>
                                <li><a href="#" style="padding-left: 20%;">Distance</a></li>
                            </ul>
                        </button>
                    </div>
                    {{-- filter dropdown --}}
                    {{-- <div class="col-md-6">
                        <button class="btn btn-primary" type="button"> Filter
                        <select class="form-control" id="filter_option" style="background-color: #46a396 !important;border: none;" onclick="Filters()" required>
                        <option>Rating</option>
                        <option>Price</option>
                        <option>Distance</option>
                        <option>Availability</option>
                        </select>
                        </button>
                    </div> --}}
                </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
               aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('customer.label_title')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <form id="usr_crt">
                           <div class="row">
                              <div class="col-md-6 float-l">
                                 <div class="form-group">
                                    <label>@lang('customer.label_fname') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                    <input type="text" class="form-control" id="first_name" placeholder="@lang('customer.label_place_fname')" required>
                                 </div>
                              </div>
                              <div class="col-md-6 float-l">
                                 <div class="form-group">
                                    <label>@lang('customer.label_lname') </label>
                                    <input type="text" class="form-control"id="last_name" placeholder="@lang('customer.label_place_lname')" required>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 float-l">
                                 <div class="form-group">
                                    <label>@lang('customer.label_email') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                    <input type="email" class="form-control" id="email"  placeholder="@lang('customer.label_place_email')" required>
                                 </div>
                              </div>
                              <div class="col-md-6 float-l">
                                 <div class="form-group">
                                    <label>@lang('customer.label_password') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                    <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="@lang('customer.label_place_pass')" required="">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 float-l">
                                 <div class="form-group">
                                    <label>@lang('customer.label_Image') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                    <input id="image" type="file" name="image" class="form-control" required>
                                 </div>
                              </div>
                              <div class="col-md-6 float-l">
                                 <div class="form-group">
                                    <label>@lang('customer.label_mobile') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                    <input type="text" class="form-control" id="contact" placeholder="@lang('customer.label_place_mobile')" required>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <!--radiobutton -->
                              <div class="col-md-6 float-l">
                                 <div id="gender-group" class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <label>@lang('customer.label_gender') <strong style="font-size: 14px;color: #e60606;">*</strong></label><br>
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
                              <div class="col-md-6 float-l">
                                 <div class="form-group">
                                    <label for="language">@lang('customer.label_language') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox" name="arabic" id="languages" value="arabic"> Arabic
                                       </label>
                                       <label>
                                       <input type="checkbox" name="english" id="languages" value="english"> English
                                       </label>
                                       @error('language')
                                       <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('customer.label_cbtn')</button>
                              <button type="button" onclick="create_user()" class="btn btn-primary">@lang('customer.label_sbtn')</button>
                              {{-- <button type="button" onclick="update_customer()" class="btn btn-primary">@lang('customer.label_ubtn')</button> --}}
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Modal -->
            <div class="table-responsive">
               <table class="table align-items-center table-flush" id="tbl_id">
                  <thead class="thead-light">
                     <tr>
                        <!-- <th>id</th> -->
                        <th>@lang('customer.label_tab_fname')</th>
                        <th>@lang('customer.label_tab_lname')</th>
                        <th>@lang('customer.label_tab_email')</th>
                        <th>@lang('customer.label_tab_profile')</th>
                        <th>@lang('customer.label_tab_gender')</th>
                        <!-- <th>Languages Known</th> -->
                        <th width="280px">@lang('customer.label_tab_action')</th>
                     </tr>
                  </thead>
                  <tbody>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"> </script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/js/src/dropdown.js') }}"></script>
<script>


    window.addEventListener ?
        window.addEventListener("load",onLoad(),false) :
        window.attachEvent && window.attachEvent("onload",onLoad());

    function onLoad() {
        console.log("ON LOAD  tbl_id")
        getResult();

    }

    $(document).ready(function(){
        $("#user_addbtn").click(function(){
            document.getElementById('btntext').innerHTML = 'Add Customer';
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

    var editUserid;
    function getcustomerData(customerid)
    {
        console.log("hello" + customerid);
            document.getElementById('btntext').innerHTML = 'Edit Customer';
            // document.getElementById('button').innerHTML = 'Update';
            $("#lbl_pass").hide();
            $("#password").hide();
            $("#btn_save").hide();
            $("#btn_update").show();
        // alert(id);
        editUserid=customerid;

        $.ajax({
            url:"/user/"+customerid+"/edit",
            method:'get',
            data:{id:editUserid},
            dataType:'JSON',
            success:function(data)
            {
                console.log(data);
                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('#email').val(data.email);
                $('#contact').val(data.contact);
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
                // $("#lang-arabic").prop('checked', true);
                // $("#lang-english").prop('checked', true);
                // $("#gender-male ").prop('checked', true);
                // $("#gender-female ").prop('checked', true);
                // $("#gender-other ").prop('checked', true);

                $('#action').val('Edit');
            }
        });

    }

    //update customer record
    function update_customer() {

        var edit = 'edit_data';
        if (document.getElementById('gender-male').checked) {
                    selectGender = "Male";
                } else if(document.getElementById('gender-female').checked) {
                    selectGender = "Female";
                }else if(document.getElementById('gender-other').checked) {
                    selectGender = "Other";
                }

        $.ajax({
            url: '/api/v1/customerupdate/' + editUserid,
            type: 'PUT',
            data: {
                'id' : editUserid,
                'first_name' : document.getElementById("first_name").value,
                'last_name' : document.getElementById("last_name").value,
                'contact' : document.getElementById("contact").value,
                'email' : document.getElementById("email").value,
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

    function getResult() {

        $.ajax({
            url: '/api/v1/getuser/4',
            type: 'GET',
            data: null,
            success: function(response){
                console.log("CREATE CREATE REPOSNE == "+ JSON.stringify(response));
                var trHTML = '';

                

                $.each(response, function (i, item) {
                    var firstName = (item.first_name == null || item.first_name == "")? "-" : item.first_name;
                    var lastName = (item.last_name == null || item.last_name == "")? "-" : item.last_name;
                    var email = (item.email == null || item.email == "")? "-" : item.email;
                    var img = (item.image == null) ? '{{ URL::asset('/img/boy.png') }}' : item.image;
                    var gender = (item.gender == null || item.gender == "")? "-" : item.gender;
                    trHTML += '<tr><td>' + firstName +
                    '</td><td>' + lastName + '</td>' +
        '</td><td>' + email + '</td>' +
        '</td><td><img src="' + img + '" class="square" width="60" height="50" /></td>' +
        '</td><td>' + gender + '</td>' +
        '</td><td>' + ' <a href="#" class="btn btn-info" onclick="viewDetail(' + response[i].id + ')"><i class="fas fa-eye"></i></a> <a href="#" onclick="getcustomerData(' + response[i].id + ')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="user_btn"><i id="btn_edit" class="fas fa-edit"></i></a> <a href="#" class="btn btn-danger" onclick="deleteRecord(' + response[i].id + ')"><i class="fas fa-trash"></i></a>' + '</td></tr>';

                });
                $('#tbl_id').append(trHTML);
            },
            fail: function (error) {
                console.log(error);
            }
        });
    };


        function deleteRecord(e){
            console.log(e);

            $.ajax(
                {
                    url: "/users/"+e,
                    type: 'DELETE',
                    data: null,
                    success: function (response){
                        console.log("Delete" + response);
                        window.top.location = window.top.location;
                        location.reload();

                    }
                });
        }

        function genderClick() {
            $('#genderError').text('')
        }


      function viewDetail(e){
            console.log(e);
            //alert(e);
            window.location = '/detail?id=' + e;
        }

    function create_user() {

       console.log("create_service");
       var servicevalite = users_validate();
       console.log("users_validate ::" + servicevalite);
       if(servicevalite == null)
       {
           console.log("CREATE SERVER CALL");

           var form = new FormData();
           form.append('first_name', document.getElementById("first_name").value);
           form.append('last_name', document.getElementById("last_name").value);
           form.append('email', document.getElementById("email").value);
           form.append('password', document.getElementById("password").value);
           var image = $('#image')[0].files[0];
           form.append('profile_photo',image);
           form.append('contact', document.getElementById("contact").value);
           form.append('gender', document.getElementById("gender").value);
           form.append('language', document.getElementById("languages").value);

           $.ajax({
               url: '/api/v1/add_customer',
               type: 'POST',
               data: form,
               contentType: false,
               processData: false,
               success: function(response)
               {
                   console.log("CREATE CREATE REPOSNE == "+response);
                   window.top.location = window.top.location;
                   location.reload();
               },error: function (xhr){
                    console.log("errp = " + JSON.stringify(xhr));
                    if(xhr['status'] == 401) {
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
                        // $('#showToast').append(trHTML);
                    }
                    //    fail: function (error) {
                    //        console.log(error);
                    //    }
                }
            });
        }
       else
       {
           $("#alerterror").text(servicevalite);
           $("#alerterror").show();
           setTimeout(function() {
               $("#alerterror").hide()
           }, 1000);
        }
    }

    // var errorArray = xhr['responseJSON'];
    // $.each(errorArray, function (i, err) {
    //     $.each(err, function (j, msg) {
    //         console.log(j);
    //         console.log(msg);
    //     });
    // });
    // if(xhr['status'] == 406) {
    //     var errorArray = xhr['responseJSON'];
    //     $.each(errorArray, function (i, err) {
    //         $.each(err, function (j, msg) {
    //             console.log(j);
    //             console.log(msg.toString());
    //         });
    //     });
    // }

    var phone_regex = /^(\+\d)\d*[0-9-+](|.\d*[0-9]|,\d*[0-9])?$/
    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
    function users_validate()
    {
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

        if(document.getElementById("email").value == "") {
            $("#email").focus();
            $("#email").focus();
            $("#email").blur(function ()
            {
                var name = $('#email').val();
                if (name.length == 0)
                {
                        console.log("ERRPR");
                        $('#email').next('div.red').remove();
                        $('#email').after('<div class="red" style="color:red">Email is Required</div>');
                        //return "false";
                }
                else
                {
                    if(!email_regex.test($('#email').val()))
                    {
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
        }else {
             if(!email_regex.test($('#email').val()))
             {
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

            if (document.getElementById("contact").value == "") {
            $("#contact").focus();
            $("#contact").focus();
            $("#contact").blur(function ()
            {
                var name = $('#contact').val();
                if (name.length == 0)
                {
                    $('#contact').next('div.red').remove();
                    $('#contact').after('<div class="red" style="color:red">Mobile number is Required</div>');
                    return false;
                }
                else
                {
                    if(!phone_regex.test( $('#contact').val()))
                    {
                        console.log("ERRPR");
                        $('#contact').next('div.red').remove();
                        $('#contact').after('<div class="red" style="color:red">Mobile number is Invalid</div>');
                        return "false";
                    } else {
                        console.log("NOT WORL");
                        $(this).next('div.red').remove();
                        //return true;
                    }
                }
            });
         } else {
             if(!phone_regex.test( $('#contact').val()))
             {
                 console.log("ERRPR");
                 $('#contact').next('div.red').remove();
                 $('#contact').after('<div class="red" style="color:red">Mobile number is Invalid</div>');
                 return "false";
             } else {
                 console.log("NOT WORL");
                 $(this).next('div.red').remove();
                 //return true;
             }
         }



         if(document.getElementById("email").value == "") {
            $("#email").focus();
            $("#email").focus();
            $("#email").blur(function ()
            {
                var name = $('#email').val();
                if (name.length == 0)
                {
                        console.log("ERRPR");
                        $('#email').next('div.red').remove();
                        $('#email').after('<div class="red" style="color:red">Email is Required</div>');
                        //return "false";
                }
                else
                {
                    if(!email_regex.test($('#email').val()))
                    {
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
         }else {
             if(!email_regex.test($('#email').val()))
             {
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
             function isNumberKey(evt){

                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
                }
        }

       // Gender Radiobutton

       var checkRadio = document.querySelector(
           'input[name="gender"]:checked');

       if (checkRadio != null) {
           document.getElementById("gender").innerHTML
               = checkRadio.value
               + " radio button checked";
       } else {
           document.getElementById("gender").innerHTML
               = "No one selected";
       }
    }
       //filteration
    //    $(document).ready(function(){
    //            var divListChildren = "";
    //             $("div.col-md-1").find("li").each(function(index,ele){
    //               divListChildren += ele.innerHTML + " ";
    //            })
    //             console.log(divListChildren);
    //        })
    function showText(element)
    {
        console.log(element.innerText);
    }
    document.querySelectorAll("li").forEach(li => li.addEventListener("click", () => showText(li)));
    // function Filters()
    //    {
    //        console.log("hello");
        //    var links = document.querySelectorAll("myInput a");
        //    console.log(links[i].href);
        //    var links = document.querySelectorAll("#filter_option a");
        //    for(var i = 0; i < links.text; i++)
        //    {
        //        console.log(links[i].href);
        //    };
            // filter normal dropdown
        //    console.log("hello");
        //    var a = document.getElementById("filter_option");
        //    var b = a.options[a.selectedIndex].text;
        //    console.log(b);
      // }

</script>
@endsection

