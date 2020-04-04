@extends('layouts.app')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2 align='center'>Users Management</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-success" href= "/addUser"> Create New User</a>

        </div>

    </div>

</div>


 @if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif

<table class="table table-bordered">

 <tr>

   <th>id</th>

   <th>Name</th>

   <th>Email</th>

   <th>Roles</th>

   <th width=10%> Image</th>

   <th>Contact</th>

   <th>Type</th>

   <th>Gender</th>

   <th>Languages Known</th>

   <th>Start_time</th>

   <th>End_time</th>

   <th>Experience</th>

   <th width="280px">Action</th>

 </tr>
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

    <td><img src="{{ URL::to('/') }}/images/{{ $user->image }}" class="square" width="60" height="50" /></td>

    <td>{{ $user->contact }}</td>

    <td>{{ $user->type }}</td>

    <td>{{ $user->gender }}</td>

    <td>{{ $user->languages_known }}</td>

    <td>{{ $user->start_time }}</td>

    <td>{{ $user->end_time }}</td>

    <td>{{ $user->experience }}</td>

    <td>

       <a class="btn btn-info" href="{{ route('user.show',$user->id) }}">Show</a>

       <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>

        {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}

    </td>

  </tr>

 @endforeach
 @endif

</table>

@if (isset($data) && !empty($data))
{{-- {!! $data->render() !!} --}}
@endif

<p class="text-center text-primary"><small>com.jam</small></p>

@endsection



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


