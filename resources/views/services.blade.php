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
     <!DOCTYPE html>
  <html>
  <head>
    <title>Title of the document</title>
  </head>
  <body>
    <div class="open-btn">
      <button class="btn btn-sm btn-primary" onclick="openForm()"><strong>Open Form</strong></button>
    </div>
    <div class="login-popup">
      <div class="form-popup" id="popupForm">
        <form class="form-container">
          <label for="name">
          <strong>Name</strong>
          </label>
           <input type="text" id="name"  name="name" placeholder="Your Name"required>
            <div class="form-group row">
                        <label for="image">
                          Icon_Image
                        </label>
                         <div class="col-md-6">
                          <input id="icon_image" type="file" name="image" class="form-control ">
                       </div>
                     </div>
                     <div class="form-group row">
                        <label for="image">
                          Banner_Image
                        </label>
                         <div class="col-md-6">
                          <input id="banner_image" type="file" name="image" class="form-control ">
                       </div>
                     </div>
                     <label for="description">
          <strong>description</strong>
          </label>
           <input id="description" type="text" name="description" value="" placeholder="Your Description" required>
          <button type="button" name="savebtn" class="btn" onclick="store()">Save</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
      </div>
    </div>
    <script>
      function openForm() {
        document.getElementById("popupForm").style.display="block";
      }

      function closeForm() {
        document.getElementById("popupForm").style.display="none";
      }
    </script>
  </body>

</html>
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
              <td><a href="{{route('detailpage',['id'=>$validator->id])}}" class = "btn btn-sm btn-primary">Detail</a></td>
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
      * {
      box-sizing: border-box;
      }
      body {
      font-family: Roboto, Helvetica, sans-serif;
      }
      /* Fix the button on the left side of the page */
      .open-btn {
      display: flex;
      justify-content: left;
      }
      /* Style and fix the button on the page */
      .open-button {
      background-color: #1c87c9;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      opacity: 0.8;
      /*position: fixed;*/
      }
      /* Position the Popup form */
      .login-popup {
      position: relative;
      text-align: center;
      width: 100%;
      }
      /* Hide the Popup form */
      .form-popup {
      display: none;
      position: fixed;
      left: 45%;
      top:5%;
      transform: translate(-45%,5%);
      border: 2px solid #666;
      z-index: 9;
      }
      /* Styles for the form container */
      .form-container {
      max-width: 300px;
      padding: 20px;
      background-color: #fff;
      }
      /* Full-width for input fields */
      .form-container input[type=text], .form-container input[type=password] {
      width: 100%;
      padding: 10px;
      margin: 5px 0 22px 0;
      border: none;
      background: #eee;
      }
      /* When the inputs get focus, do something */
      .form-container input[type=text]:focus, .form-container input[type=password]:focus {
      background-color: #ddd;
      outline: none;
      }
      /* Style submit/login button */
      .form-container .btn {
      background-color: #0aa698;;
      color: #fff;
      padding: 12px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      opacity: 0.8;
      }
      /* Style cancel button */
      .form-container .cancel {
      background-color: #cc0000;
      }
      /* Hover effects for buttons */
      .form-container .btn:hover, .open-button:hover {
      opacity: 1;
      }
    </style>
