@extends('layouts.admin')
<!-- jQuery Modal -->

@section('content')
         <div class="container-fluid" id="container-wrapper">

<div class="row">
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
                  <h5 class="modal-title" id="exampleModalLabel">@lang('sdetailpage.label_title')</h5>
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
<table class="table align-items-center table-flush">
<thead class="thead-light">
 <tr>
   <!-- <th>id</th> -->
   <th>@lang('sdetailpage.label_tab_name')</th>
   <th>@lang('sdetailpage.label_tab_image')</th>
   <th>@lang('sdetailpage.label_tab_desc')</th>
   <th>@lang('sdetailpage.label_tab_price')</th>
 </tr>
</thead>

 <tbody>

          @if (isset($data) && !empty($data))
           <?php $i=0; ?>
           @foreach ($data as $results)
            <tr>

              <!-- <td>{{ $results->id }}</td> -->
              <td> {{ $results->name }} </td>
              <td><img src="{{ asset($results->image) }}" class="square" width="60" height="50" /></td>
              <td>{{ $results->description }}</td>
              <td>&#xFDFC;{{ $results->price }}</td>
            </tr>
           @endforeach
           @endif
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

