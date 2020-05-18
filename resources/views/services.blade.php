@extends('layouts.admin')
<!-- jQuery Modal -->

@section('content')
         <div class="container-fluid" id="container-wrapper">
          

<div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Services Management</h6>
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    id="add_btn"><i class="fa fa-plus" aria-hidden="true"></i> Add Services</button>


 <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="service_btn">Add Services</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>


                  <div class="modal-body">

                      <div class="alert alert-danger alert-dismissible" role="alert" id="alerterror">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          <h6><i class="fas fa-ban"></i><b> Error!</b></h6>
                          <p id="errormsg">Unknow Error from Server side!</p>
                      </div>

                      <form id="addform">



                              <div class="col-md-12" >
                                  <div class="form-group">
                                      <label>Name <strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                      <input id="service_name" type="text" name="name" placeholder="Enter Name" class="form-control" required>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Icon<strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                      <input id="icon_image" type="file" name="image" class="form-control" required>
                                  </div>
                              </div>

                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Banner<strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                      <input id="banner_image" type="file" name="image" class="form-control" required>
                                  </div>
                              </div>


                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Descriptions</label>
                                      <input id="service_description" type="text" name="description" placeholder="Enter Description" class="form-control">
                                  </div>
                              </div>






{{--                      SUB CATEGORIES--}}


                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="terms" name="terms" onclick="checkClick()">
                                  <label class="custom-control-label" for="terms">Click to select category from existing list</label>
                              </div>
                          </div>
                      </div>


{{--                      CATEGORY LIST--}}
                      <div class="col-md-12" id="categorydiv">
                          <div class="form-group">
                              <label for="exampleFormControlSelect1">Category</label>
                              <select class="form-control" id="categorieslist" required>
                              </select>
                          </div>
                      </div>

{{--                      CATEGORY FORM--}}


                      <div class="form-group" id="cate_namediv">
                          <div class="col-md-6 float-l">
                              <div class="form-group">
                                  <label>Name<strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                  <input id="categoy_name" type="text" name="categoy_name"
                                         class="form-control" placeholder="Enter Name" required>
                              </div>
                          </div>



                          <div class="col-md-6 float-r" id="cate_imgdiv">
                            <div class="form-group">
                                <label>Image<strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                <input id="category_image" type="file" name="category_image" class="form-control">
                            </div>
                          </div>


                          <div class="col-md-6 float-l" id="cate_disdiv">
                            <div class="form-group">
                                <label>Description</label>
                                <input id="category_description" type="text" name="category_description" placeholder="Enter Description"
                                       class="form-control" required>
                            </div>
                          </div>

                          <div class="col-md-6 float-l" id="cate_disdiv">
                            <div class="form-group">
                                <label>Pricing</label>
                                <input id="category_pricing" type="text" name="category_pricing" placeholder="Enter Pricing"
                                       class="form-control" required>
                            </div>
                          </div>

                      </div>

{{--                      BUTTONS --}}
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" onclick="create_service()" class="btn btn-primary">Save</button>
                      </div>


{{--                      <div class="">--}}

{{--                      </div>--}}


                 </form>


                </div>

              </div>
            </div>
          </div>
          <!-- Modal -->
</div>
</div>
           @if ($message = Session::get('success'))
         <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>

               @endif
 <div class="table-responsive">
<table class="table align-items-center table-flush" id="mytable">
<thead class="thead-light">
 <tr>

   <!-- <th>id</th> -->
   <th>Name</th>
   <th>Icon</th>
   <th>Banner</th>
   <th>Description</th>
   <th width="280px">Action</th>
 </tr>
</thead>

 <tbody>

          @if (isset($data) && !empty($data))
           <?php $i=0; ?>
           @foreach ($data as $validator)
            <tr>

              <!-- <td>{{ $validator->id }}</td> -->
              <td> {{ $validator->name }} </td>
              <td><img src="{{ asset($validator->icon_image) }}" class="square" width="60" height="50" /></td>
              <td><img src="{{ asset($validator->banner_image) }}" class="square" width="60" height="50" /></td>
              <td>{{ $validator->description }}</td>
                <td>
                    <button class = "btn btn-sm btn-primary" onclick="detailpage({{ $validator->id }})"> Detail </button>
                </td>
{{--              <td><a href="{{route('detailpage',['id'=>$validator->id])}}" class = "btn btn-sm btn-primary">Detail</a></td>--}}
            </tr>
           @endforeach
           @endif
 </tbody>
</table>
</div>
</div>
</div>
</div>
{{--</div>--}}
{{--</div>--}}
         <style>
             div.a {
                 text-align: center;
             }
         </style>


 <script src="{{ asset('vendor/jquery/jquery.min.js') }}"> </script>
 <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script>

     window.addEventListener ?
         window.addEventListener("load",onLoad(),false) :
     window.attachEvent && window.attachEvent("onload",onLoad());

     function onLoad() {

         // service_id = getUrlParameter('id');
         console.log("ONLOAD");
         $("#categorydiv").hide();
         $("#alerterror").hide();

         getCategories();
     };

     function getCategories() {
         $.ajax({
             url: '/subcategories',
             type: 'GET',
             success: function(response){
                 console.log(response);
                 if(response['status'] == 204) {
                     console.log(response);
                 } else {
                     for(var i = 0; i < response.length; i ++) {
                         console.log(response[i].name);
                         $('#categorieslist').append(`<option value="${response[i].id}">
                                       ${response[i].name}
                                  </option>`);
                     }


                 }
                 // $('#mytable').data.reload();
                 // window.top.location = window.top.location;
                 // $( "#table align-items-center table-flush" ).load( "your-current-page.html #mytable" );
                 // $('#table align-items-center table-flush').dataTable().ajax.reload();
             },
             fail: function (error) {
                 console.log(error);
             }
         });
     }

     function service_validate() {
         console.log("service_validate");
         if(document.getElementById("service_name").value == "" ) {
             // EXPAND ADDRESS FORM
             return "Missing Service Name";
         }
         var icon_image = $('#icon_image')[0].files[0];
         if (!icon_image) {
             return "Missing Service Icon";
         }
         var banner_image = $('#banner_image')[0].files[0];
         if (!banner_image) {
             return "Missing Service Banner";
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

     var create_service_id;
     function create_service() {
         console.log("create_service");
         var servicevalite = service_validate();
         console.log("service_validate ::" + servicevalite);
         if(servicevalite == null) {
             console.log("CREATE SERVER CALL");
             var form = new FormData();
             var icon_image = $('#icon_image')[0].files[0];
             form.append('icon_image',icon_image);
             var banner_image = $('#banner_image')[0].files[0];
             form.append('banner_image',banner_image);
             form.append('name', document.getElementById("service_name").value);
             if(document.getElementById("service_description").value != "") {
                 form.append('description', document.getElementById("service_description").value);
             }

             $.ajax({
                 url: '/services',
                 type: 'POST',
                 data: form,
                 contentType: false,
                 processData: false,
                 success: function(response){
                     console.log("CREATE CREATE REPOSNE == "+response);
                     create_service_id = response['id'];
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

     function createCategories() {
         console.log("createCategories");
         var form = new FormData();
         var category_image = $('#category_image')[0].files[0];
         form.append('image',category_image);
         form.append('name', document.getElementById("categoy_name").value);
         if(document.getElementById("category_description").value != "" ) {
             form.append('description', document.getElementById("category_description").value);
         }

         $.ajax({
             url: '/subcategories',
             type: 'POST',
             data: form,
             contentType: false,
             processData: false,
             success: function(response){
                 console.log(response['id']);
                 mappingService(response['id']);
             },
             error: function (error) {
                 $("#alerterror").text(error['statusText']);
                 $("#alerterror").show();
                 setTimeout(function() {
                     $("#alerterror").hide()
                 }, 1000);
                 console.log("ERR ====="+JSON.stringify(error));
             }
         });
     }

     function mappingService(category_id) {
         console.log("mappingService" + category_id);
         $.ajax({
             url: '/service_mapping',
             type: 'POST',
             data: {
                 service_id: create_service_id,
                 category_id: category_id, //document.getElementById("last_name").value,
             },

             success: function(response){
                 console.log(response);
                 // $('#mytable').data.reload();
                 window.top.location = window.top.location;
                 // $( "#table align-items-center table-flush" ).load( "your-current-page.html #mytable" );
                 // $('#table align-items-center table-flush').dataTable().ajax.reload();
             },

             error: function (error) {
                 $("#alerterror").text(error['statusText']);
                 $("#alerterror").show();
                 setTimeout(function() {
                     $("#alerterror").hide()
                 }, 1000);
                 console.log("ERR ====="+JSON.stringify(error));
             }
         });
     }

     function detailpage(id) {
         console.log(id);
         window.location = '/services?id=' + id;
     }


     function checkClick() {
         if(!addform.terms.checked) {
             addform.terms.focus();
             console.log('cancel');
             $("#categorydiv").hide(1000);
             $("#cate_disdiv").show(1000);
             $("#cate_imgdiv").show(1000);
             $("#cate_namediv").show(1000);

         } else {
             console.log('click');
             $("#categorydiv").show(1000);
             $("#cate_disdiv").hide(1000);
             $("#cate_imgdiv").hide(1000);
             $("#cate_namediv").hide(1000);
         }
     }



     var getUrlParameter = function getUrlParameter(sParam) {
         var sPageURL = window.location.search.substring(1),
             sURLVariables = sPageURL.split('&'),
             sParameterName,
             i;

         for (i = 0; i < sURLVariables.length; i++) {
             sParameterName = sURLVariables[i].split('=');

             if (sParameterName[0] === sParam) {
                 return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
             }
         }
     };

     function detailpage(id) {
         console.log(id);
         window.location = '/detailpage?id=' + id;
     }
 </script>
@endsection

