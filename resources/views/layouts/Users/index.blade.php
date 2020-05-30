@extends('layouts.admin')
@section('content')
<div class="container-fluid" id="container-wrapper">

  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Organisations</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    id="user_btn"><i class="fa fa-plus" aria-hidden="true"></i> Add Organisations</button>
                </div>


          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Organisations</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <form>
                    <div class="row">
                    <div class="col-md-6 float-l">
                     <div class="form-group">
                       <label>Company Name <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                       <input type="text" class="form-control" id="org_company_name" placeholder="Enter Your Company Name" required="">
                    </div>
                    </div>
                    <div class="col-md-6 float-l">
                    <div class="form-group">
                      <label>Admin Name <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                      <input type="text" class="form-control" id="org_name" placeholder="Enter Your Name" required="">
                    </div>
                    </div>
                  </div>

                  <div class="row">
                <div class="col-md-6 float-l">
                  <div class="form-group">
                  <label>Mobile Number <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                  <input type="text" class="form-control" id="contact" placeholder="Enter Number" required>
                  </div>
                </div>


               <div class="col-md-6 float-l">
                 <div class="form-group">
                  <label>Email Address <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                  <input type="email" class="form-control" id="email"  placeholder="Enter Email Address" required>
                  </div>
                </div>
              </div>

              <div class="row">
              <div class="col-md-6 float-l">
                  <div class="form-group">
                  <label>Password <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                  <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Enter Your Password" required="">
                </div>
              </div>

                    <div class="col-md-6 float-l">
                      <div class="form-group">
                                <label>Image</label>
                                <input id="image" type="file" name="image" class="form-control" required>
                       </div>
                     </div>
               </div>      

                  <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" onclick="create_users()" class="btn btn-primary">Save</button>
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
             <th>Company Name</th>
             <th>Admin Name</th>
             <th>Mobile</th>
             <th>Email</th>
             <th>Profile</th>
             <th width="280px">Action
             </th>
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

                    var img = (response[i].image == null) ? '{{ URL::asset('/img/boy.png') }}' : response[i].image;
                    var gender = (response[i].gender == null) ? '-' : response[i].gender;
                    trHTML += '<tr><td>' + response[i].name +
                        '</td><td>' + response[i].first_name  + '</td>' +
                        '</td><td>' + response[i].contact  + '</td>' +
                        '</td><td>' + response[i].email  + '</td>' +
                        '</td><td><img src="' + img + '" class="square" width="60" height="50" /></td>' +
                        '</td><td>' + ' <a href="#" class="btn btn-info" onclick="viewDetail(' + response[i].id + ')"><i class="fas fa-eye"></i></a> <a href="#" class="btn btn-primary" ><i class="fas fa-edit"></i></a> <a href="#" class="btn btn-danger" onclick="deleteRecord(' + response[i].id + ')"><i class="fas fa-trash"></i></a> ' + '</td> </tr>';

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




     function create_users() {
         console.log("create_service");
         var servicevalite = users_validate();
         console.log("users_validate ::" + servicevalite);
         if(servicevalite == null) {
             console.log("CREATE SERVER CALL");

             var form = new FormData();
           form.append('company', document.getElementById("org_company_name").value);
           form.append('first_name', document.getElementById("org_name").value);
           form.append('contact', document.getElementById("contact").value);
           form.append('email', document.getElementById("email").value);
           form.append('password', document.getElementById("password").value);
           var image = $('#image')[0].files[0];
           if(image) {
               form.append('profile_photo',image);
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
                 },
                 fail: function (error) {
                     console.log(error);
                 }
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

         if(document.getElementById("org_name").value == "" ) {
             // EXPAND ADDRESS FORM
              $("#org_name").focus();
           $("#org_name").focus();
           $("#org_name").blur(function () {
               var name = $('#org_name').val();
               if (name.length == 0) {
                   $('#org_name').next('div.red').remove();
                   $('#org_name').after('<div class="red" style="color:red">Admin Name is Required</div>');
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



