@extends('layouts.admin')
@section('content')
<div class="container-fluid" id="container-wrapper">

  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">@lang('organisation.label_header')</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    id="user_btn"><i class="fa fa-plus" aria-hidden="true"></i> @lang('organisation.label_title')</button>
                </div>


          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="btntext">@lang('organisation.label_title')</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <form>
                    <div class="row">
                    <div class="col-md-6 float-l">
                     <div class="form-group">
                       <label>@lang('organisation.label_cname') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                       <input type="text" class="form-control" id="org_company_name" placeholder="@lang('organisation.label_place_cname')" required="">
                    </div>
                    </div>
                    <div class="col-md-6 float-l">
                    <div class="form-group">
                      <label>@lang('organisation.label_aname') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                      <input type="text" class="form-control" id="org_aname" placeholder="@lang('organisation.label_place_aname')" required="">
                    </div>
                    </div>
                  </div>

                  <div class="row">
                <div class="col-md-6 float-l">
                  <div class="form-group">
                  <label>@lang('organisation.label_mobile') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                  <input type="text" class="form-control" id="contact" placeholder="@lang('organisation.label_place_mobile')" required>
                  </div>
                </div>


               <div class="col-md-6 float-l">
                 <div class="form-group">
                  <label>@lang('organisation.label_email') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                  <input type="email" class="form-control" id="email"  placeholder="@lang('organisation.label_place_email')" required>
                  </div>
                </div>
              </div>

              <div class="row">
              <div class="col-md-6 float-l">
                  <div class="form-group">
                  <label>@lang('organisation.label_password') <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                  <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="@lang('organisation.label_place_pass')" required="">
                </div>
              </div>

                    <div class="col-md-6 float-l">
                      <div class="form-group">
                                <label>@lang('organisation.label_logo')</label>
                                <input id="logo" type="file" name="logo" class="form-control" required>
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
                <div id="snackbar">Something went wrong</div>
                  <div class="modal-footer">
                            <button type="button" id="btn_close" class="btn btn-secondary" data-dismiss="modal">@lang('organisation.label_place_cbtn')</button>
                            <button type="button" id="btn_save" onclick="create_users()" class="btn btn-primary">@lang('organisation.label_place_sbtn')</button>
                            <button type="button" id="btn_update" onclick="update_org()" class="btn btn-primary">@lang('organisation.label_place_ubtn')</button>
                  </div>

                    </form>
                    </div>

              </div>
            </div>
          </div>
          <!-- Modal -->

           @if ($message = Session::get('success'))

              <div class="alert alert-success">

                  <p>{{ $message }}</p>

              </div>

          @endif
 <div class="table-responsive">
     <table class="table align-items-center table-flush" id="tbl_id">
         <thead class="thead-light">
         <tr>
             <th>@lang('organisation.label_tab_company')</th>
             <th>@lang('organisation.label_tab_admin')</th>
             <th>@lang('organisation.label_tab_mobile')</th>
             <th>@lang('organisation.label_tab_email')</th>
             <th>@lang('organisation.label_tab_logo')</th>
             <th width="280px">@lang('organisation.label_tab_action')</th>
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


<script>
    window.addEventListener ?
        window.addEventListener("load",onLoad(),false) :
        window.attachEvent && window.attachEvent("onload",onLoad());

    function onLoad() {
        console.log("ON LOAD  tbl_id")
        getResult();
    }

    function getResult() {

        $.ajax({
            url: '/api/v1/getuser/2',
            type: 'GET',
            data: null,
            success: function(response){
                console.log("CREATE CREATE REPOSNE == "+ JSON.stringify(response));
                var trHTML = '';

                $.each(response, function (i, item) {
                    var img = (response[i]['organisation'].logo == null) ? '{{ URL::asset('/img/boy.png') }}' : response[i]['organisation'].logo;
                    // var gender = (response[i].gender == null) ? '-' : response[i].gender;
                    trHTML += '<tr><td>' + response[i]['organisation'].name +
                        '</td><td>' + response[i].first_name  + '</td>' +
                        '</td><td>' + response[i].contact  + '</td>' +
                        '</td><td>' + response[i].email  + '</td>' +
                        '</td><td><img src="' + img + '" class="square" width="60" height="50" /></td>' +
                        '</td><td>' + ' <a href="#" class="btn btn-info" onclick="viewDetail(' + response[i].id
                            + ')"><i class="fas fa-eye"></i></a> <a href="#" onclick="getorgdata(' + response[i].id + ')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="user_btn"><i class="fas fa-edit"></i></a> <a href="#" class="btn btn-danger" onclick="deleteRecord('
                            + response[i].id + ')"><i class="fas fa-trash"></i></a> '
                            + '</td> </tr>';
                });
                $('#tbl_id').append(trHTML);
            },
            fail: function (error) {
                console.log(error);
            }
        });
    };


    function viewDetail(e){
        console.log(e);
        // alert(e);
        window.location = '/detail?id=' + e;
    }

    // $(document).ready(function(){
    //     $("#user_btn").click(function(){
    //         $("#btn_update").hide();
    //     });
    // });

    var editUserid;
    function getorgdata(orgid){
        console.log("hello" + orgid);
             document.getElementById('btntext').innerHTML = 'Edit Organisation';
            // document.getElementById('button').innerHTML = 'Update';
            $("#lbl_pass").hide();
            $("#password").hide();
            $("#btn_save").hide();
        // alert(id);
        editUserid=orgid;

        $.ajax({
            url:"/user/"+orgid+"/edit",
            method:'get',
            data:{id:editUserid},
            dataType:'JSON',
            success:function(data)
            {
                console.log(data);
                console.log(JSON.stringify(data['organisation']));
                editUser = data;
                $('#org_company_name').val(data.organisation.name);
                $('#org_aname').val(data.first_name);
                $('#contact').val(data.contact);
                $('#email').val(data.email);

                $('#action').val('Edit');
            }
        });
    }
    var editUser;

    function update_org(){
        console.log("Update");
        console.log(editUser.org_id);
        console.log(document.getElementById("org_company_name").value);
        //var edit = 'edit_data';

        let formUpdate = new FormData();
        formUpdate.append('id', editUser.org_id);
        formUpdate.append('name', document.getElementById("org_company_name").value);
        formUpdate.append('first_name', document.getElementById("org_aname").value);
        formUpdate.append('contact', document.getElementById("contact").value);
        formUpdate.append('email', document.getElementById("email").value);
        var image = $('#logo')[0].files[0];
            if(image != null) {
                formUpdate.append('logo', image);
            }

        $.ajax({
            url: '/api/v1/org_update/' + editUserid,
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
                }
            // type: 'POST',
            // data: {
            //     'id' : editUserid,
            //     'org_id' : editUser.org_id,
            //     'org_company_name' : document.getElementById("org_company_name").value,
            //     'org_aname' : document.getElementById("org_aname").value,
            //     //'contact' : document.getElementById("contact").value
                
            //     },
            
            // success: function (data) {
            //     if(data == 1) {
            //         console.log("SUCCESS");
            //         window.top.location = window.top.location;
            //         location.reload();
            //     } else {
            //         console.log("FAIL");
            //         // $('#btn_verify').show();
            //     }
            // },
            // fail: function (error) {
            //     console.log(error);
            // }
        });
    }

    function deleteRecord(e) {
        $.ajax({
            url: "/users/"+e,
            type: 'POST',
            data: null,
            success: function () {
                console.log("Delete");
                window.top.location = window.top.location;
                location.reload();
            }
        });
    }

    function create_users() {
        var servicevalite = users_validate();
        console.log("users_validate ::" + servicevalite);
        if(servicevalite == null)
        {
            console.log("CREATE SERVER CALL");
            var form = new FormData();
            form.append('company', document.getElementById("org_company_name").value);
            form.append('first_name', document.getElementById("org_aname").value);
            form.append('contact', document.getElementById("contact").value);
            form.append('email', document.getElementById("email").value);
            form.append('password', document.getElementById("password").value);
            var logo = $('#logo')[0].files[0];
            if(logo) {
                form.append('profile_photo',logo);
            }



            $.ajax({
                url: '/api/v1/add_organisation',
                type: 'POST',
                data: form,
                contentType: false,
                processData: false,
                success: function(response){
                    console.log("CREATE CREATE REPOSNE == "+response);
                    window.top.location = window.top.location;
                    location.reload();
                },error: function (xhr){
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
                // fail: function (error) {
                //     console.log(error);

            });
        } else {
            
            $("#alerterror").text(servicevalite);
            $("#alerterror").show();
            setTimeout(function() {
                $("#alerterror").hide()
            }, 1000);
        }
    }

    var phone_regex = /^(\+\d)\d*[0-9-+](|.\d*[0-9]|,\d*[0-9])?$/
    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
    function users_validate() {
         console.log("users_validate");
         if(document.getElementById("org_company_name").value == "" ) {
             // EXPAND ADDRESS FORM
             $("#org_company_name").focus();
           $("#org_company_name").focus();
           $("#org_company_name").blur(function () {
               var name = $('#org_company_name').val();
               if (name.length == 0) {
                   $('#org_company_name').next('div.red').remove();
                   $('#org_company_name').after('<div class="red" style="color:red">Company Name is Required</div>');
               } else {
                   $(this).next('div.red').remove();
                   return true;
               }
           });
         }

         if(document.getElementById("org_aname").value == "" ) {
             // EXPAND ADDRESS FORM
              $("#org_aname").focus();
           $("#org_aname").focus();
           $("#org_aname").blur(function () {
               var name = $('#org_aname').val();
               if (name.length == 0) {
                   $('#org_aname').next('div.red').remove();
                   $('#org_aname').after('<div class="red" style="color:red">Admin Name is Required</div>');
               } else {
                   $(this).next('div.red').remove();
                   return true;
               }
           });
         }


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



         if(document.getElementById("password").value == "" ) {
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

         var logo = $('#logo')[0].files[0];
         if (!logo) {
              $("#logo").focus();
           $("#logo").focus();
           $("#logo").blur(function () {
               var name = $('#logo').val();
               if (name.length == 0) {
                   $('#logo').next('div.red').remove();
                   $('#logo').after('<div class="red" style="color:red">logo is Required</div>');
               } else {
                   $(this).next('div.red').remove();
                   return true;
               }
           });
         }

    }


    $(function(){

    // handle delete button click
    $('body').on('click', '.todo-delete-btn', function(e) {
        e.preventDefault();

        // get the id of the todo task
        var id = $(this).attr('id');

        // get csrf token value
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        // now make the ajax request
        $.ajax({
        'url': '/user/destroy/' + id,
        'type': 'POST',
        headers: { 'X-CSRF-TOKEN': csrf_token }
        }).done(function() {
        console.log('User  deleted: ' + id);
        window.location = window.location.href;
        }).fail(function() {
        alert('something went wrong!');
        });

    });

    });



</script>

@endsection



