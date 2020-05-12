@extends('layouts.admin')


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
                  <h6 class="m-0 font-weight-bold text-primary">Orders Management</h6>
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    id="user_btn"><i class="fa fa-plus" aria-hidden="true"></i> Add Customer</button> --}}
                </div>

<div class="table-responsive">
<table class="table align-items-center table-flush">
<thead class="thead-light">
<tr>

<!-- <th>id</th> -->

<th>Name</th>

<th>Email</th>

{{--   <th>Roles</th>--}}

<!-- <th width=10%> Image</th> -->

<!-- <th>Contact</th> -->

  <th>Profile</th>
{{-- <th>Type</th> --}}

<th>Gender</th>

<!-- <th>Languages Known</th> -->

{{--   <th>Start_time</th>--}}

<!-- <th>End_time</th> -->

<!-- <th>Experience</th> -->

<th width="280px">Action</th>

</tr>
</thead>

<tbody>
@if (isset($data) && !empty($data))
 <?php $i=0; ?>
@foreach ($data as $key => $user)

<tr>

 <!-- <td>{{ ++$i }}</td> -->

 <td>{{ $user->name }}</td>

 <td>{{ $user->email }}</td>

{{--   <td>--}}

{{--      --}}{{-- @if(!empty($user->getRoleNames()))--}}

{{--        @foreach($user->getRoleNames() as $v)--}}

{{--           <label class="badge badge-success">{{ $v }}</label>--}}

{{--        @endforeach--}}

{{--      @endif --}}

{{--    </td>--}}

{{--     <td><img src="{{ URL::to('/') }}/images/{{ $user->image }}" class="square" width="60" height="50" /></td>--}}

   <td><img src="{{ asset($user->image) }}" class="square" width="60" height="50" /></td>
 <!-- <td>{{ $user->contact }}</td> -->

 {{-- <td>{{ $user->type }}</td> --}}

 <td>{{ $user->gender }}</td>

 <!-- <td>{{ $user->languages_known }}</td> -->

{{--    <td>{{ $user->start_time }}</td>--}}

 <!-- <td>{{ $user->end_time }}</td> -->

 <!-- <td>{{ $user->experience }}</td> -->

 <td>

    <a class="btn btn-info" ><i class="fas fa-eye"></i></a>
{{--        href="{{ route('user.show',$user->id) }}"--}}


    <a class="btn btn-primary" ><i class="fas fa-edit"></i></a>
{{--        href="{{ route('user.edit',$user->id) }}"--}}

{{--        {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}--}}

         <!-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} -->
         <a href="" class="btn btn-danger">
                 <i class="fas fa-trash"></i>
               </a>

     {!! Form::close() !!}

 </td>
</tr>
@endforeach
@endif
</tbody>
</table>
</div>
</div>
@if (isset($data) && !empty($data))
{{-- {!! $data->render() !!} --}}
@endif
</div>
</div>
</div>

@endsection
