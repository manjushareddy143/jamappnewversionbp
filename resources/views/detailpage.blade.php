@extends('layouts.admin')


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
                </div>

        </div>
           @if ($message = Session::get('success'))

              <div class="alert alert-success">

                  <p>{{ $message }}</p>

              </div>

          @endif
 <div class="table-responsive">
<table class="table align-items-center table-flush">
<thead class="thead-light">
 <tr>

   <th>id</th>
   <th>Name</th>
   <th>Icon_image</th>
   <th>Banner_image</th>
   <th>Description</th>
 </tr>
</thead>

 <tbody>

          @if (isset($data) && !empty($data))
           <?php $i=0; ?>
           @foreach ($data as $validator)

            <tr>

              <td>{{ $validator->id }}</td>
              <td> {{ $validator->name }} </td>
{{--              <td><img src="{{ asset('images/category/' . $validator->icon_image) }}" class="square" width="60" height="50" /></td>--}}
{{--              <td><img src="{{ asset('images/category/' . $validator->banner_image) }}" class="square" width="60" height="50" /></td>--}}
{{--              <td>{{ $validator->description }}</td>--}}
            </tr>
           @endforeach
           @endif
 </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection
