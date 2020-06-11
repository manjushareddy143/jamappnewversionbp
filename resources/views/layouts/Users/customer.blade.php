@extends('layouts.admin')
@section('content')
<div class="container-fluid" id="container-wrapper">
   <div class="row">
      <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header py-3 d-flex">
                    <h6 class="m-0 font-weight-bold text-primary">@lang('customer.label_header')</h6>

                    <div style="padding-left: 68%;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                        id="user_btn"><i class="fa fa-plus" aria-hidden="true"></i> @lang('customer.label_title')</button>
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
                                                    <input type="text" class="form-control" id="mobile"
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
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">@lang('customer.label_country')
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
                                                    <label>@lang('customer.label_services')  <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                                    <p id="serviceError"></p>
                                                    <ul class="tree" id="tree_box" style="overflow: auto;height: 200px;"></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('customer.label_cbtn')</button>
                                    <button type="button" id="button" onclick="create_user()" value="save" class="btn btn-primary">@lang('customer.label_sbtn')</button>
                                    <button type="button" onclick="update_user()" class="btn btn-primary">@lang('customer.label_ubtn')</button>



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

    var editUserid;
    function getcustomerData(customerid)
        {

             document.getElementById('btntext').innerHTML = 'Edit Vendors';
             // document.getElementById('button').innerHTML = 'Update';
             $("#lbl_pass").hide();
             $("#password").hide();
            // alert(id);
            editUserid=customerid;

            $.ajax({
                url:"/user/"+customerid+"/edit",
                method:'get',
                data:{id:customerid},
                dataType:'JSON',
                success:function(data)
                {
                    console.log(data);
                    $('#first_name').val(data.first_name);
                    $('#last_name').val(data.last_name);
                    $('#email').val(data.email);
                    $('#mobile').val(data.mobile);
                    $("#lang-arabic").prop('checked', true);
                    $("#lang-english").prop('checked', true);
                    $("#gender-male ").prop('checked', true);
                    $("#gender-female ").prop('checked', true);
                    $("#gender-other ").prop('checked', true);

                    $('#action').val('Edit');
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
                    var img = (response[i].image == null) ? '{{ URL::asset('/img/boy.png') }}' : response[i].image;
                    trHTML += '<tr><td>' + response[i].first_name +
                    '</td><td>' + response[i].last_name + '</td>' +
        '</td><td>' + response[i].email + '</td>' +
        '</td><td><img src="' + img + '" class="square" width="60" height="50" /></td>' +
        '</td><td>' + response[i].gender + '</td>' +
        '</td><td>' + ' <a href="#" class="btn btn-info" onclick="viewDetail(' + response[i].id + ')"><i class="fas fa-eye"></i></a> <a href="#" onclick="getcustomerData(' + response[i].id + ')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="user_btn"><i class="fas fa-edit"></i></a> <a href="#" class="btn btn-danger" onclick="deleteRecord(' + response[i].id + ')"><i class="fas fa-trash"></i></a>' + '</td></tr>';

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
                    success: function (){
                        console.log("Delete");
                        window.top.location = window.top.location;
                        location.reload();

                    }
                });
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
               success: function(response){
                   console.log("CREATE CREATE REPOSNE == "+response);
                   window.top.location = window.top.location;
                   location.reload();
               },
               fail: function (error) {
                   console.log(error);
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

