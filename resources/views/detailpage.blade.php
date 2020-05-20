@extends('layouts.admin')
<!-- jQuery Modal -->

@section('content')
         <div class="container-fluid" id="container-wrapper">
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sub Categories</h1>
{{--            <ol class="breadcrumb">--}}
{{--              <li class="breadcrumb-item"><a href="/login">Home</a></li>--}}
{{--              <li class="breadcrumb-item">Tables</li>--}}
{{--              <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>--}}
{{--            </ol>--}}
          </div> -->

<div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Services Management</h6>

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    id="category_btn"> <i class="fa fa-plus" aria-hidden="true"></i> Create New Category</button>



          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
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
                                  Select category from existing list
                              </label>
                          </div>
                      </div>

                  <div class="col-md-12" id="namediv">
                    <div class="form-group">
                      <label>Name</label>
                          <input id="name" type="text" name="name"  class="form-control"
                                 placeholder="Enter Name" required>
                    </div>
                  </div>

                  <div class="col-md-12" id="categorydiv">
                          <div class="form-group">
                              <label for="exampleFormControlSelect1">Type</label>
                              <select class="form-control" id="categorieslist">
                              </select>
                          </div>
                      </div>

                  <div class="col-md-12" id="imagediv">
                    <div class="form-group">
                        <label>Image</label>
                        <input id="image" type="file" name="image" class="form-control ">

                     </div>
                   </div>


                  <div class="col-md-12" id="descriptiondiv">
                      <div class="form-group">
                      <label>Description</label>
                     <input id="description" type="text" name="description" placeholder="Enter Description"  class="form-control" required>
                      </div>
                    </div>

                    <div class="col-md-12" id="pricediv">
                      <div class="form-group">
                      <label>Price</label>
                      <div class="input-symbol-euro">
                     <input id="price" type="text" name="price" placeholder="Enter Price"  class="form-control" required>
                      </div>
                      </div>
                    </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" onclick="store()" class="btn btn-primary">Save</button>
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




{{--           @if ($message = Session::get('success'))--}}

{{--              <div class="alert alert-success">--}}

{{--                  <p>{{ $message }}</p>--}}

{{--              </div>--}}

{{--          @endif--}}
 <div class="table-responsive">
<table class="table align-items-center table-flush">
<thead class="thead-light">
 <tr>
   <!-- <th>id</th> -->
   <th>Name</th>
   <th>Image</th>
   <th>Description</th>
   <th>Price</th>
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
              <td>{{ $results->price }}</td>
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

            } else {
                console.log('click');
                $("#categorydiv").show(1000);
                $("#namediv").hide(1000);
                $("#imagediv").hide(1000);
                $("#descriptiondiv").hide(1000);
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

