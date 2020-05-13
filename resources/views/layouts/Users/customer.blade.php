@extends('layouts.admin')
@section('content')
<div class="container-fluid" id="container-wrapper">
   <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Simple Tables</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/login">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
      </ol>
      </div> -->
   <div class="row">
      <div class="col-lg-12 margin-tb">
         <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Customers</h6>
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                  id="user_btn"><i class="fa fa-plus" aria-hidden="true"></i> Add Customers</button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
               aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
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
                                    <input type="text" class="form-control" id="first_name" placeholder="Enter Your First Name" required>
                                 </div>
                              </div>
                              <div class="col-md-6 float-l">
                                 <div class="form-group">
                                    <label>Last Name <strong style="font-size: 14px;color: #e60606;">*</strong> </label>
                                    <input type="text" class="form-control"id="last_name" placeholder="Enter Your Last Name" required>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 float-l">
                                 <div class="form-group">
                                    <label>Email Address <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                    <input type="email" class="form-control" id="email"  placeholder="Enter Email Address" required>
                                 </div>
                              </div>
                              <div class="col-md-6 float-l">
                                 <div class="form-group">
                                    <label>Password <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                    <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Enter Your Password" required="">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 float-l">
                                 <div class="form-group">
                                    <label>Image <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                    <input id="category_image" type="file" name="category_image" class="form-control" required>
                                 </div>
                              </div>
                              <div class="col-md-6 float-l">
                                 <div class="form-group">
                                    <label>Mobile Number <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                    <input type="text" class="form-control" id="contact" placeholder="Enter Number" required>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <!--radiobutton -->
                              <div class="col-md-6 float-l">
                                 <div id="gender-group" class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <label>Gender <strong style="font-size: 14px;color: #e60606;">*</strong></label><br>
                                    <input type="radio" name="gender" value="male"> Male
                                    <input type="radio" name="gender" value="female"> Female
                                    <input type="radio" name="gender" value="other"> Other
                                    @if ($errors->has('gender'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-md-6 float-l">
                                 <div class="form-group">
                                    <label for="language">Languages known <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox" name="arabic" value="arabic"> Arabic
                                       </label>
                                       <label>
                                       <input type="checkbox" name="english" value="english"> English
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
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" onclick="create_users()" class="btn btn-primary">Save</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Modal -->
            <!--
               <div class="pull-left">
               
                   <h2 align='center'>Users Management</h2>
               
               </div> -->
            <!--
               <div class="pull-right" style="padding-bottom:7px;">
               
                   <a class="btn btn-success" href= "/addUser"> Create New User</a>
               
               </div> -->
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
               <p>{{ $message }}</p>
            </div>
            @endif
            <div class="table-responsive">
               <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                     <tr>
                        <!-- <th>id</th> -->
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        {{--   
                        <th>Roles</th>
                        --}}
                        <!-- <th width=10%> Image</th> -->
                        <!-- <th>Contact</th> -->
                        <th>Profile</th>
                        <th>Gender</th>
                        <!-- <th>Languages Known</th> -->
                        <th width="280px">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if (isset($data) && !empty($data))
                     <?php $i=0; ?>
                     @foreach ($data as $key => $user)
                     <tr>
                        <!-- <td>{{ ++$i }}</td> -->
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img src="{{ ($user->image == null) ?  asset('img/boy.png') : asset($user->image) }}" class="square" width="60" height="50" /></td>
                        <!-- <td>{{ $user->contact }}</td> -->
                        <td>{{ $user->gender }}</td>
                        <!-- <td>{{ $user->languages_known }}</td> -->
                        <td>
                           <a class="btn btn-info" ><i class="fas fa-eye"></i></a>
                           {{--        href="{{ route('user.show',$user->id) }}"--}}
                           <a class="btn btn-primary" ><i class="fas fa-edit"></i></a>
                           {{--        href="{{ route('user.edit',$user->id) }}"--}}
                           {{--        {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}--}}
                           <!-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} -->
                           <a href="" class="btn btn-danger">
                           <i class="fas fa-trash"></i>
                           </a>
                           {!! Form::close() !!}
                        </td>
                     </tr>
                     @endforeach
                     @endif
                  </tbody>
               </table>
            </div>
         </div>
         @if (isset($data) && !empty($data))
         {{-- {!! $data->render() !!} --}}
         @endif
         <!-- <p class="text-center text-primary"><small>com.jam</small></p> -->
         {{--
         <table class="table table-bordered">
            <tr>
               <th>id</th>
               <th>Name</th>
               <th>email</th>
               <th width="280px">Action</th>
            </tr>
            @foreach ($errors as $user)
            <tr>
               <td>{{ ++$i }}</td>
               <td>{{ $user->name }}</td>
               <td>{{ $user->email }}</td>
               <td>
                  <form action="{{ route('Users.destroy',$user->id) }}" method="POST">
                     <a class="btn btn-info" href="{{ route('Users.show',$user->id) }}">Show</a>
                     <a class="btn btn-primary" href="{{ route('Users.edit',$user->id) }}">Edit</a>
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
               </td>
            </tr>
            @endforeach
         </table>
         {{-- {!! $errors->links() !!} @endsection --}}
      </div>
   </div>
</div>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"> </script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
   // window.addEventListener ?
   //          window.addEventListener("load",onLoad(),false) :
   //      window.attachEvent && window.attachEvent("onload",onLoad());
   
   //      function onLoad() {
   
   //          // service_id = getUrlParameter('id');
   //          console.log("ONLOAD");
   //          $("#categorydiv").hide();
   //          $("#alerterror").hide();
   
   //          getCategories();
   //      };
   
   
   function users_validate() {
            console.log("users_validate");
            if(document.getElementById("first_name").value == "" ) {
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
   
            if(document.getElementById("last_name").value == "" ) {
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
   
            if(document.getElementById("email").value == "" ) {
                // EXPAND ADDRESS FORM
             $("#email").focus();
                $("#email").focus();
                $("#email").blur(function () {
               var name = $('#email').val();
               if (name.length == 0) {
               $('#email').next('div.red').remove();
               $('#email').after('<div class="red" style="color:red">Email is Required</div>');
             } else {
               $(this).next('div.red').remove();
               return true;
             }
                });
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
                return "Missing Users Image";
            }
   
            if(document.getElementById("contact").value == "" ) {
                // EXPAND ADDRESS FORM
                $("#contact").focus();
                $("#contact").focus();
                $("#contact").blur(function () {
               var name = $('#contact').val();
               if (name.length == 0) {
               $('#contact').next('div.red').remove();
               $('#contact').after('<div class="red" style="color:red">Contact is Required</div>');
             } else {
               $(this).next('div.red').remove();
               return true;
             }
                });
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
                // var form = new FormData();
                // var first_name = $('#first_name')[0].files[0];
                // form.append('first_name',first_name);
                // var last_name = $('#last_name')[0].files[0];
                // form.append('last_name',last_name);
                // form.append('email', document.getElementById("users_email").value);
                // if(document.getElementById("password").value != "") {
                //     form.append('password', document.getElementById("users_password").value);
                // }
                // var icon_image = $('#image')[0].files[0];
                // form.append('image',image);
                // form.append('contact', document.getElementById("users_contact").value);
                // form.append('gender', document.getElementById("users_gender").value);
               
   
                
   
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

