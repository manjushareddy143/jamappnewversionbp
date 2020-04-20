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
                  <h6 class="m-0 font-weight-bold text-primary">Users Management</h6>
                </div>

<!--
        <div class="pull-left">

            <h2 align='center'>Users Management</h2>

        </div> -->
<!--
        <div class="pull-right" style="padding-bottom:7px;">

            <a class="btn btn-success" href= "/addUser"> Create New User</a>

        </div> -->
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

   <th>Email</th>

   <th>Roles</th>

   <!-- <th width=10%> Image</th> -->

   <!-- <th>Contact</th> -->

     <th>Image</th>
   <th>Type</th>

   <th>Gender</th>

   <!-- <th>Languages Known</th> -->

   <th>Start_time</th>

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

    <td>{{ ++$i }}</td>

    <td>{{ $user->name }}</td>

    <td>{{ $user->email }}</td>

   <td>

      {{-- @if(!empty($user->getRoleNames()))

        @foreach($user->getRoleNames() as $v)

           <label class="badge badge-success">{{ $v }}</label>

        @endforeach

      @endif --}}

    </td>

{{--     <td><img src="{{ URL::to('/') }}/images/{{ $user->image }}" class="square" width="60" height="50" /></td>--}}

      <td><img src="{{ asset($user->image) }}" class="square" width="60" height="50" /></td>
    <!-- <td>{{ $user->contact }}</td> -->

    <td>{{ $user->type }}</td>

    <td>{{ $user->gender }}</td>

    <!-- <td>{{ $user->languages_known }}</td> -->

    <td>{{ $user->start_time }}</td>

    <!-- <td>{{ $user->end_time }}</td> -->

    <!-- <td>{{ $user->experience }}</td> -->

    <td>

       <a class="btn btn-info" href="{{ route('user.show',$user->id) }}"><i class="fas fa-eye"></i></a>


       <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}"><i class="fas fa-edit"></i></a>


        {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}

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

<!-- <p class="text-center text-primary"><small>com.jam</small></p> -->

{{--
    <table class="table table-bordered">

        <tr>

            <th>id</th>

            <th>Name</th>

            <th>email</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($errors as $user)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $user->name }}</td>

            <td>{{ $user->email }}</td>

            <td>

                <form action="{{ route('Users.destroy',$user->id) }}" method="POST">



                    <a class="btn btn-info" href="{{ route('Users.show',$user->id) }}">Show</a>



                    <a class="btn btn-primary" href="{{ route('Users.edit',$user->id) }}">Edit</a>



                    @csrf

                    @method('DELETE')



                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>


    {{-- {!! $errors->links() !!} @endsection --}}

</div>
</div>
</div>

@endsection
