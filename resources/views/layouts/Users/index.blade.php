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
                     <div class="col-md-6 float-l">
                     <div class="form-group">
                     <label>First Name </label>
                     <input type="text" class="form-control"id="first_name" placeholder="Enter Your First Name" required>
                      </div>
                      </div>
                      <div class="col-md-6 float-l">
                      <div class="form-group">
                    <label>Last Name </label>
                    <input type="text" class="form-control"id="last_name" placeholder="Enter Your Last Name" required>
                      </div>
                      </div>


                   <div class="col-md-6 float-l">
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="email" class="form-control" id="email"  placeholder="Enter Email Address" required>
                  </div>
                </div>

              <div class="col-md-6 float-l">
                  <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Enter Your Password" required="">
                </div>
              </div>

                    <div class="col-md-6 float-l">
                      <div class="form-group">
                                <label>Image</label>
                                <input id="image" type="file" name="image" class="form-control" required>
                       </div>
                     </div>


                <div class="col-md-6 float-l">
                  <div class="form-group">
                  <label>Mobile Number</label>
                  <input type="text" class="form-control" id="contact" placeholder="Enter Number" required>
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
             <th>First Name</th>
             <th>Last Name</th>
             <th>Email</th>
             <th>Profile</th>
             <th>Gender</th>
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
                    trHTML += '<tr><td>' + response[i].first_name +
                        '</td><td>' + response[i].last_name  + '</td>' +
                        '</td><td>' + response[i].email  + '</td>' +
                        '</td><td><img src="' + img + '" class="square" width="60" height="50" /></td>' +
                        '</td><td>' + gender  + '</td>' +
                        '</td><td>' + ' <a class="btn btn-info" ><i class="fas fa-eye"></i></a> <a class="btn btn-primary" ><i class="fas fa-edit"></i></a> <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>' + '</td></tr>';

                });
                $('#tbl_id').append(trHTML);
            },
            fail: function (error) {
                console.log(error);
            }
        });
    };


function users_validate() {
         console.log("users_validate");
         if(document.getElementById("first_name").value == "" ) {
             // EXPAND ADDRESS FORM
             return "Missing Users First Name";
         }

         if(document.getElementById("last_name").value == "" ) {
             // EXPAND ADDRESS FORM
             return "Missing Users Last Name";
         }

         if(document.getElementById("email").value == "" ) {
             // EXPAND ADDRESS FORM
             return "Missing Users EmailId";
         }

         if(document.getElementById("password").value == "" ) {
             // EXPAND ADDRESS FORM
             return "Missing Users Password";
         }

         var image = $('#image')[0].files[0];
         if (!image) {
             return "Missing Users Image";
         }

         if(document.getElementById("contact").value == "" ) {
             // EXPAND ADDRESS FORM
             return "Missing Users Contact";
         }

          // Radiobutton

            var checkRadio = document.querySelector(
                'input[name="gender"]:checked');

            if(checkRadio != null) {
                document.getElementById("gender").innerHTML
                    = checkRadio.value
                    + " radio button checked";
            }
            else {
                document.getElementById("gender").innerHTML
                    = "No one selected";
            }

            // Checkbox

          if (theForm.MyCheckbox.checked == false)
          {
            alert ('No one choose the checkboxes!');
              return false;
              }
              else {
              return true;
          }

         if(!addform.terms.checked) {
             addform.terms.focus();
             console.log('cancel');
             if(document.getElementById("categoy_name").value == "" ) {
                 // EXPAND ADDRESS FORM
                 return "Missing Category Name";
             }
             var category_image = $('#category_image')[0].files[0];
             if (!category_image) {
                 return "Missing Category Icon";
             }
         }
         return null;
     }




     function create_users() {
         console.log("create_service");
         var servicevalite = users_validate();
         console.log("users_validate ::" + servicevalite);
         if(servicevalite == null) {
             console.log("CREATE SERVER CALL");
             

             $.ajax({
                 url: '/users',
                 type: 'POST',
                 data: form,
                 contentType: false,
                 processData: false,
                 success: function(response){
                     console.log("CREATE CREATE REPOSNE == "+response);
                     create_users_id = response['id'];
                     if(!addform.terms.checked) {
                         addform.terms.focus();
                         console.log('cancel');
                         createCategories();
                     } else {
                         var category_id = $('#categorieslist').children("option:selected").val();
                         mappingService(category_id);

                     }

                     // window.top.location = window.top.location;

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
</script>

@endsection



