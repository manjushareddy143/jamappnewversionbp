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
<div class="container-fluid" id="container-wrapper">
   <div class="row">
      <div class="col-lg-12 margin-tb">
         <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">@lang('services.label_header')</h6>
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                  id="add_btn"><i class="fa fa-plus" aria-hidden="true"></i> @lang('services.label_title')</button>
               <!-- Modal -->
               <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="service_btn"> @lang('services.label_title')</h5>
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
                                    <label>@lang('services.label_name')<strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                    <input id="service_name" type="text" name="name" placeholder="@lang('services.label_plac_name')" class="form-control" required>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>@lang('services.label_Icon')<strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                    <input id="icon_image" type="file" name="image" class="form-control" required>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>@lang('services.label_Banner')<strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                    <input id="banner_image" type="file" name="image" class="form-control" required>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>@lang('services.label_Descriptions')</label>
                                    <input id="service_description" type="text" name="description" placeholder="@lang('services.label_plac_Descriptions')" class="form-control">
                                 </div>
                              </div>
                              <!-- SUB CATEGORIES -->
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="terms" name="terms" onclick="checkClick()">
                                       <label class="custom-control-label" for="terms">@lang('services.label_chebox')</label>
                                    </div>
                                 </div>
                              </div>
                              <!-- CATEGORY LIST -->
                              <div class="col-md-12" id="categorydiv">
                                 <div class="form-group">
                                    <label for="exampleFormControlSelect1">@lang('services.label_Category')</label>
                                    <select class="form-control" id="categorieslist" required>
                                    </select>
                                 </div>
                              </div>
                              <!-- CATEGORY FORM -->
                              <div class="form-group" id="cate_namediv">
                                 <div class="col-md-6 float-l">
                                    <div class="form-group">
                                       <label>@lang('services.label_cat_name')<strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                       <input id="categoy_name" type="text" name="categoy_name"
                                          class="form-control" placeholder="@lang('services.label_plac_name')" required>
                                    </div>
                                 </div>
                                 <div class="col-md-6 float-r" id="cate_imgdiv">
                                    <div class="form-group">
                                       <label>@lang('services.label_cat_image')<strong style="font-size: 14px;color: #e60606;">*</strong></label>
                                       <input id="category_image" type="file" name="category_image" class="form-control">
                                    </div>
                                 </div>
                                 <div class="col-md-6 float-l" id="cate_disdiv">
                                    <div class="form-group">
                                       <label>@lang('services.label_cat_Descriptions')</label>
                                       <input id="category_description" type="text" name="category_description" placeholder="@lang('services.label_plac_Descriptions')"
                                          class="form-control" required>
                                    </div>
                                 </div>
                                 <div class="col-md-6 float-l" id="cate_pridiv">
                                    <div class="form-group">
                                       <div class="input-symbol-euro">
                                          <label>@lang('services.label_cat_Pricing')</label>
                                          <input id="category_price" type="text" name="category_price" placeholder="@lang('services.label_plac_Pricing')"
                                             class="form-control" required>
                                       </div>
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
                              <!-- BUTTONS  -->
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('services.label_cbtn')</button>
                                 <button type="button" onclick="create_service()" id="save_service" class="btn btn-primary">@lang('services.label_sbtn')</button>
                                 <button type="button" onclick="getUpdateService()" id="upd_service" class="btn btn-primary">Update</button>

                              </div>
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
            <table class="table align-items-center table-flush" id="tbl_id">
               <thead class="thead-light">
                  <tr>
                     <!-- <th>id</th> -->
                     <th>@lang('services.label_tab_name')</th>
                     <th>@lang('services.label_tab_icon')</th>
                     <th>@lang('services.label_tab_banner')</th>
                     <th>@lang('services.label_tab_disc')</th>
                     <th>@lang('services.label_cat_Pricing')</th>

                     <th width="280px">@lang('services.label_tab_action')</th>
                  </tr>
               </thead>

 <tbody>

 </tbody>
</table>
</div>
</div>
</div>
</div>

<style>
   div.a {
   text-align: center;
   }
</style>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"> </script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>

    // Button hide/show

   $(document).ready(function(){
        $("#save_service").click(function(){
            $("#upd_service").hide();
        });
    });

        // page redirect
     
        function viewDetail(e){
        console.log(e);
        // alert(e);
        window.location = '/detailpage?id=' + e;
        }


   window.addEventListener ?
       window.addEventListener("load",onLoad(),false) :
   window.attachEvent && window.attachEvent("onload",onLoad());
   
   function onLoad() {
   
       // service_id = getUrlParameter('id');
       console.log("ONLOAD");
       $("#categorydiv").hide();
       $("#alerterror").hide();
   
       getCategories();
       getListOfService();
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

   

    // Display service function

    function getListOfService() {
            $.ajax({
                url: '/api/v1/all_services',
                type: 'GET',
                success: function (response, xhr) {
                    if (xhr['status'] == 204) {
                        console.log(response);
                    } else {
                        console.log(response);
                        if(response != null) {
                            var trCatHTML = '';
                            var i;
                            for(i = 0; i < response.length; i++)
                            {
                                var img = (response[i].icon_image == null) ? '{{ URL::asset('/imges/category/ac-repair.png') }}' : response[i].icon_image; 
                                var bimg = (response[i].banner_image == null) ? '{{ URL::asset('/imges/category/ac-repair.png') }}' : response[i].banner_image;
                                trCatHTML += '<tr><td>' + response[i].name +
                        '</td><td><img src="' + img + '" class="square" width="60" height="50" /></td></td>' +
                        '</td><td><img src="' + bimg + '" class="square" width="60" height="50" /></td></td>' +
                        '</td><td>' + response[i].description  + '</td>' +
                        '</td><td>' + response[i].price  + '</td>' +
                        '</td><td>' + ' <a href="#" class="btn btn-info" onclick="viewDetail(' + response[i].id + ')"><i class="fas fa-eye"></i></a> <a href="#" onclick="getEditService(' + response[i].id + ')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="user_btn"><i class="fas fa-edit"></i></a>'
                            + '</td> </tr>';
                            }
                            trCatHTML += '</ul>';
                            $('#tbl_id').append(trCatHTML);

                        }
                    }
                },
                fail: function (error) {
                    console.log(error);
                }
            });
        }
          
          
        // Edit services
            var editUserid;
            function getEditService(serviceid)
            {
                console.log("hello" + serviceid);
             document.getElementById('service_btn').innerHTML = 'Edit Services';
             // document.getElementById('button').innerHTML = 'Update';
             $("#lbl_pass").hide();
             $("#password").hide();
             $("#btn_save").hide();
            console.log(serviceid);
            editUserid=serviceid;

            $.ajax({
                url:"/service/edit/"+serviceid+"",
                method:'get',
                data:{id:editUserid},
                dataType:'JSON',
                success:function(data)
                {
                    console.log(data);
                    $('#service_name').val(data.name);
                    // $('#icon_image').val(data.icon_image);
                    // $('#banner_image').val(data.banner_image);
                    $('#service_description').val(data.description);
                    
                    // $('#action').val('Edit');    
               
                }
            });

        }

                // Serivces Update

                function getUpdateService() {

                    console.log(document.getElementById("service_name").value);

                    var edit = 'edit_data';
                    
                    let formUpdate = new FormData();
                    formUpdate.append('id', editUserid);
                    formUpdate.append('name', document.getElementById("service_name").value);
                    formUpdate.append('description', document.getElementById("service_description").value);

                    

                    $.ajax({
                        url: '/api/v1/serviceupdate',
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
                      $('.toast-body').text(msgStr);
                      $('.toast').toast({delay:10000, animation:false});
                      $('.toast').toast('show');
                      // $('#showToast').append(trHTML);
                  }
   
              }
                  // fail: function (error) {
                  //  console.log(error);
   
              });
          }  else {
          var x = document.getElementById("snackbar");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
          //  $("#alerterror").text(servicevalite);
          //  $("#alerterror").show();
          //  setTimeout(function() {
          //      $("#alerterror").hide()
          //  }, 1000);
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
       form.append('price', document.getElementById("category_price").value);
   
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
           $("#cate_pridiv").show(1000);
   
   
       } else {
           console.log('click');
           $("#categorydiv").show(1000);
           $("#cate_disdiv").hide(1000);
           $("#cate_imgdiv").hide(1000);
           $("#cate_namediv").hide(1000);
           $("#cate_pridiv").hide(1000);
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
<style>
   .input-symbol-euro {
   position: relative;
   }
   .input-symbol-euro input {
   padding-left:25px;
   }
   .input-symbol-euro:before {
   position: absolute;
   top: 38;
   content:"﷼";
   left: 5px;
   }
</style>

