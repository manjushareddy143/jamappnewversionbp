@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2 align='center'>Master Service Management</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-success" href= "/create"> Create New Master_services </a>

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

   <th>Icon_image</th>

   <th>Banner_image</th>

   <th>Description</th>

   <th width="280px">Action</th>

 </tr>
@if (isset($data) && !empty($data))
    <?php $i=0; ?>
 @foreach ($data as $key => $masterservice)

  <tr>

    <td>{{ $masterservice->id }}</td>

    <td>{{ $masterservice->name }}</td>

    <td>{{ $masterservice->icon_image }}</td>

    <td>{{ $masterservice->banner_image }}</td>

    <td>{{ $masterservice->description }}</td>

    <td>

       <a class="btn btn-info" href="{{ route(' master_services.show',$master_services->ID) }}">Show</a>

       <a class="btn btn-primary" href="{{ route('master_services.edit',$master_services->ID) }}">Edit</a>

        {!! Form::open(['method' => 'DELETE','route' => [' master_services.destroy', $master_services->ID],'style'=>'display:inline']) !!}

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

