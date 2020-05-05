@extends('layouts.admin')
<!-- jQuery Modal -->

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
                  <h6 class="m-0 font-weight-bold text-primary">Services Management</h6>
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    id="add_btn"><i class="fa fa-plus" aria-hidden="true"></i> Add Services</button>
</div>

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
                  <form>
                     <div class="col-md-6 float-l">
                        <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter First Name">
                        </div>
                      </div>

                      <div class="col-md-6 float-l">
                         <div class="form-group">
                        <label>Icon</label>
                          <input id="icon_image" type="file" name="image" class="form-control ">
                       </div>
                      </div>

                      <div class="col-md-6 float-l">
                        <div class="form-group">
                            <label>Banner</label>
                            <input id="banner_image" type="file" name="image" class="form-control ">
                        </div>
                    </div>

                      <div class="col-md-6 float-l">
                      <div class="form-group">
                      <label>Description</label>
                     <input id="description" type="text" name="description" placeholder="Enter Description"  class="form-control" required>
                      </div>
                    </div>

                    </form>  
                    </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" onclick="store()" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
 
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

 <script>
     function detailpage(id) {
         console.log(id);
         window.location = '/detailpage?id=' + id;
     }

     function store() {
         var form = new FormData();
         var files = $('#icon_image')[0].files[0];
         form.append('icon_image',files);
         var banner_files = $('#banner_image')[0].files[0];
         form.append('banner_image',banner_files);
         form.append('name', document.getElementById("name").value);
         form.append('description', document.getElementById("description").value);
         $.ajax({
             url: '/services',
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


