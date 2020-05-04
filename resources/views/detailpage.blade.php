@extends('layouts.admin')
<!-- jQuery Modal -->

@section('content')
         <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sub Categories</h1>
{{--            <ol class="breadcrumb">--}}
{{--              <li class="breadcrumb-item"><a href="/login">Home</a></li>--}}
{{--              <li class="breadcrumb-item">Tables</li>--}}
{{--              <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>--}}
{{--            </ol>--}}
          </div>

<div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Services Management</h6>

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    id="#myBtn"> Create New Category</button>              



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
                  <form>
                     <div class="col-md-12 float-l">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter First Name" required>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                        <label>Image</label>
                          <input id="image" type="file" name="image" class="form-control" required>
                     </div>
                   </div>

                  <div class="col-md-12">
                      <div class="form-group">
                      <label>Description</label>
                     <input id="description" type="text" name="description"  class="form-control" required>
                      </div>
                    </div>

                    <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" onclick="store()" class="btn btn-primary">Save</button>
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

   <th>id</th>
   <th>Name</th>
   <th>Image</th>
   <th>Description</th>
 </tr>
</thead>

 <tbody>

          @if (isset($data) && !empty($data))
           <?php $i=0; ?>
           @foreach ($data as $results)
            <tr>

              <td>{{ $results->id }}</td>
              <td> {{ $results->name }} </td>
              <td><img src="{{ asset($results->image) }}" class="square" width="60" height="50" /></td>
              <td>{{ $results->description }}</td>
            </tr>
           @endforeach
           @endif
 </tbody>
</table>
</div>
</div>
</div>
</div>
    <script>
        window.onload = function() {
            let searchParams = getUrlParameter('id');
            console.log(searchParams);
        };

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

    </script>



    <script>
     function detailpage(id) {
         console.log(id);
         window.location = '/detailpage?id=' + id;
     }

     function store() {
         var form = new FormData();
         var files = $('image')[0].files[0];
         form.append('image',files);
         form.append('name', document.getElementById("name").value);
         form.append('description', document.getElementById("description").value);
         $.ajax({
             url: '/detailpage',
             type: 'POST',
             data: form,
             contentType: false,
             processData: false,
             success: function(response){
                 console.log(response);
                 // $('#mytable').data.reload();
                 window.top.location = window.top.location;
                 // $( "#table align-items-center table-flush" ).load( "your-current-page.html #mytable" );
                 // $('#table align-items-center table-flush').dataTable().ajax.reload();
             },
             fail: function (error) {
                 console.log(error);
             }
         });

         // document.getElementById("popupForm").style.display="block";
     }
 </script>
@endsection

