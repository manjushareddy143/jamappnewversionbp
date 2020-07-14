@extends('layouts.admin')
<!-- jQuery Modal -->

@section('content')
         <div class="container-fluid" id="container-wrapper">
         
<div class="row">
                       
                        <div class="custom-buttons" style="margin-left: 93%;">
                           <button type="button" id="back_btn" class="btn btn-secondary mb-1">Back</button>
                        </div>            
    <div class="col-lg-12 margin-tb">
    
      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">@lang('sdetailpage.label_header')</h6>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                     id="category_btn"> <i class="fa fa-plus" aria-hidden="true"></i> @lang('sdetailpage.label_header_btn')</button>

                
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="service_btn">@lang('sdetailpage.label_title')</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="addform">

                      <div class="col-md-12">
                          <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input"
                                     id="terms" name="terms" onclick="checkClick()">
                              <label class="custom-control-label" for="terms">
                                  @lang('sdetailpage.label_title2')
                              </label>
                          </div>
                      </div>

                  <div class="col-md-12" id="namediv">
                    <div class="form-group">
                      <label>@lang('sdetailpage.label_name')</label>
                          <input id="name" type="text" name="name"  class="form-control"
                                 placeholder="@lang('sdetailpage.label_plac_name')" required>
                    </div>
                  </div>

                  <div class="col-md-12" id="categorydiv">
                          <div class="form-group">
                              <label for="exampleFormControlSelect1">@lang('sdetailpage.label_type')</label>
                              <select class="form-control" id="categorieslist">
                              </select>
                          </div>
                      </div>

                  <div class="col-md-12" id="imagediv">
                    <div class="form-group">
                        <label>@lang('sdetailpage.label_image')</label>
                        <input id="image" type="file" name="image" class="form-control ">

                     </div>
                   </div>


                  <div class="col-md-12" id="descriptiondiv">
                      <div class="form-group">
                      <label>@lang('sdetailpage.label_plac_desc')</label>
                     <input id="description" type="text" name="description" placeholder="@lang('sdetailpage.label_plac_desc')"  class="form-control" required>
                      </div>
                    </div>

                    <div class="col-md-12" id="pricediv">
                      <div class="form-group">
                      <label>@lang('sdetailpage.label_price')</label>
                      <div class="input-symbol-euro">
                     <input id="price" type="text" name="price" placeholder="@lang('sdetailpage.label_plac_price')"  class="form-control" required>
                      </div>
                      </div>
                    </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('sdetailpage.label_cbtn')</button>
                  <button type="button" onclick="store()" class="btn btn-primary">@lang('sdetailpage.label_sbtn')</button>
                  <button type="button" onclick="getUpdateCategory()" id="upd_service" class="btn btn-primary">Update</button>
                </div>

                      <div class="alert alert-danger alert-dismissible" role="alert" id="alerterror">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          <h6><i class="fas fa-ban"></i><b> Error!</b></h6>
                          <p id="errormsg"> Unknow Error from Server side!</p>
                      </div>

                </form>

                </div>

              </div>
            </div>
          </div>
          <!-- Modal -->
</div>
</div>



 <div class="table-responsive">
<table class="table align-items-center table-flush" id="tbl_id">
<thead class="thead-light">
 <tr>
   <!-- <th>id</th> -->
   <th>@lang('sdetailpage.label_tab_name')</th>
   <th>@lang('sdetailpage.label_tab_image')</th>
   <th>@lang('sdetailpage.label_tab_desc')</th>
   <th>@lang('sdetailpage.label_tab_price')</th>
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
         <script src="{{ asset('vendor/jquery/jquery.min.js') }}"> </script>
         <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        window.addEventListener ?
            window.addEventListener("load",onLoad(),false) :
            window.attachEvent && window.attachEvent("onload",onLoad());

        var service_id;
        function onLoad() {
            getListOfSubCategory();
            service_id = getUrlParameter('id');
            console.log(service_id);
            $("#categorydiv").hide();
            $("#alerterror").hide();

            getCategories();
        };

        function checkClick() {
            if(!addform.terms.checked) {
                addform.terms.focus();
                console.log('cancel');
                $("#categorydiv").hide(1000);
                $("#namediv").show(1000);
                $("#imagediv").show(1000);
                $("#descriptiondiv").show(1000);
                $("#pricediv").show(1000);


            } else {
                console.log('click');
                $("#categorydiv").show(1000);
                $("#namediv").hide(1000);
                $("#imagediv").hide(1000);
                $("#descriptiondiv").hide(1000);
                $("#pricediv").hide(1000);
            }
        }

        // Display subcategory list

        function getListOfSubCategory() {
            $.ajax({
                url: '/api/v1/sub_category',
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
                                var img = (response[i].image == null) ? '{{ URL::asset('/imges/subcategories/Repair.jpg') }}' : response[i].image; 
                                trCatHTML += '<tr><td>' + response[i].name +
                        '</td><td><img src="' + img + '" class="square" width="60" height="50" /></td></td>' +
                        '</td><td>' + response[i].description  + '</td>' +
                        '</td><td>' + response[i].price  + '</td>' +
                        '</td><td>' + ' <a href="#" class="btn btn-info" onclick="#"><i class="fas fa-eye"></i></a> <a href="#" onclick="getEditCategory(' + response[i].id + ')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="user_btn"><i class="fas fa-edit"></i></a>'
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

        // Edit SubCategory

        var editUserid;
            function getEditCategory(catid)
            {
                console.log("hello" + catid);
             document.getElementById('service_btn').innerHTML = 'Edit SubCategory';
             
             $("#lbl_pass").hide();
             $("#password").hide();
             $("#btn_save").hide();
            console.log(catid);
            editUserid=catid;

            $.ajax({
                url:"/subcategory/edit/"+catid+"",
                method:'get',
                data:{id:editUserid},
                dataType:'JSON',
                success:function(data)
                {
                    console.log(data);
                    $('#name').val(data.name);
                    // $('#icon_image').val(data.icon_image);
                    // $('#banner_image').val(data.banner_image);
                    $('#description').val(data.description);
                    $('#price').val(data.price);
                    
                    // $('#action').val('Edit');    
               
                }
            });

        }

        //  Update Category

            function getUpdateCategory() {

                console.log(document.getElementById("name").value);

                var edit = 'edit_data';

                let formUpdate = new FormData();
                formUpdate.append('id', editUserid);
                formUpdate.append('name', document.getElementById("name").value);
                formUpdate.append('description', document.getElementById("description").value);
                formUpdate.append('price', document.getElementById("price").value);



                $.ajax({
                    url: '/api/v1/categoryupdate',
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

        function getUrlParameter(sParam) {
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

        function store() {
            var selected_id = $('#categorieslist').children("option:selected").val();
            console.log(selected_id);
            if(!addform.terms.checked) {
                addform.terms.focus();
                console.log('cancel');
                var form = new FormData();
                var files = $('#image')[0].files[0];
                form.append('image',files);
                form.append('name', document.getElementById("name").value);
                form.append('description', document.getElementById("description").value);
                form.append('price', document.getElementById("price").value);
                $.ajax({
                    url: '/subcategories',
                    type: 'POST',
                    data: form,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        console.log(response['id']);
                        mappingService(response['id']);
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
            else {
                mappingService(selected_id);
            }
        }

        function mappingService(category_id) {
            $.ajax({
                url: '/service_mapping',
                type: 'POST',
                data: {
                    service_id: service_id,
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

        // Back Button
        $("#back_btn").click(function (){
           window.history.back();
        });


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
     top: 10;
     content:"﷼";
     left: 5px;
 }

</style>

