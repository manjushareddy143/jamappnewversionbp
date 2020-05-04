@extends('layouts.admin')
<!-- jQuery Modal -->

@section('content')
         <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Simple Tables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/login">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
            </ol>
          </div>

<div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Services Management</h6>
  
    <!-- <div class="open-btn">
      <button class="btn btn-sm btn-primary" onclick="openForm()"><strong>Open Form</strong></button>
    </div> -->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
     <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create User</h1>
            <div class="custom-buttons">
              <button type="button" class="btn btn-primary mb-1">Create</button>
              <button type="button" class="btn btn-secondary mb-1" onclick="service()">Back</button>
            </div>
          </div>

          <div class="row sectionrow">
            <div class="col-lg-12">              
              <!-- Horizontal Form -->
              <div class="card mb-4">
                
              
                <div class="card-body">
                  <div class="login-form create-user">
                  <form>
                    <div class="col-md-6 float-l">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter First Name">
                    </div>
                  </div>
                  <div class="col-md-6 float-l">
                    <div class="form-group">
                        <label>Icon_Image</label>
                          <input id="icon_image" type="file" name="image" class="form-control ">
                     </div>
                   </div>
                    <div class="col-md-6 float-l">
                     <div class="form-group">
                        <label>Banner_Image</label>
                          <input id="banner_image" type="file" name="image" class="form-control ">
                     </div>
                      </div>
                      <div class="col-md-6 float-l">
                      <div class="form-group">
                      <label>description</label>
                     <input id="description" type="text" name="description"  class="form-control" required>
                      </div>
                    </div>
                  <div class="col-md-6 float-l">
                    <div class="form-group">
                      <button type="button" class="btn btn-primary btn-block" onclick="store()">Save</button>
                    </div>
                  </div>
                  </form>
                </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->
        
</div>


<span type="button"  class="btn btn-sm btn-primary" onclick="openNav()">Open Form</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "83%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
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

   <th>id</th>
   <th>Name</th>
   <th>Icon_image</th>
   <th>Banner_image</th>
   <th>Description</th>
   <th width="280px">Action</th>
 </tr>
</thead>

 <tbody>

          @if (isset($data) && !empty($data))
           <?php $i=0; ?>
           @foreach ($data as $validator)
            <tr>

              <td>{{ $validator->id }}</td>
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


<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 175;
  left: 227;
  background-color: #eaecf4;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  text-align:center;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;

}

.sidenav a:hover{
  color: #04bfac;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>