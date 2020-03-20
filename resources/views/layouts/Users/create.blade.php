@extends('layouts.app')


 @section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2 align='center'>Create New User</h2>

        </div>

      <div class="pull-right">

            <a class="btn btn-primary" href="/index"> Back</a>

        </div>

    </div>

</div>


  @if (count($errors) > 0)

  <div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

       @foreach ($errors->all() as $error)

         <li>{{ $error }}</li>

       @endforeach

    </ul>

  </div>

@endif


{!! Form::open(array('route' => 'user.store','method'=>'POST')) !!}

<div class="row">

    <div class="col-xs-10 col-sm-10 col-md-10">

        <div class="form-group">

            <strong>Name:</strong>

            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

        </div>

    </div>

   <div class="col-xs-10 col-sm-10 col-md-10">

        <div class="form-group">

            <strong>Email:</strong>

            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-10 col-sm-10 col-md-10">

        <div class="form-group">

            <strong>Password:</strong>

            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-10 col-sm-10 col-md-10">

        <div class="form-group">

            <strong>Confirm Password:</strong>

            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-10 col-sm-10 col-md-10">

        <div class="form-group">

            <strong>Image:</strong>

            {!! Form::file('image', array('class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-10 col-sm-10 col-md-10">

        <div class="form-group">

            <strong>Contact:</strong>

            {!! Form::text('contact',"",array('placeholder' => 'Contact number','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-10 col-sm-10 col-md-10" id="category" onchange="showfields()">

        <div class="form-group">

            <strong>Type:</strong>

            {!! Form::select('type[]',  array('class' => 'Select','Individual service provider','Corporate Service provider')) !!}

     {{-- <div class="form-group"> --}}
        <label class="radio-inline">
            <input type="radio" id="gen1" name="gen_radio"> Female </label>
        <label class="radio-inline">
            <input type="radio" id="gen2" name="gen_radio"> Male </label>
    </div>

    <div class="form-group row" >
        <label for="language" class="col-md-4 col-form-label text-md-right">{{ __('Languages known') }}</label>

        <div class="col-md-6">
            <input id="language" type="text" class="form-control " name="language">
      </div>
    </div>

    <div class="form-group row" >
        <label for="timing" class="col-md-4 col-form-label text-md-right">{{ __('Timing') }}</label>

        <div class="col-md-6">
            <input id="timing" type="text" class="form-control " name="Timing">
        </div>
    </div>

    <div class="form-group row" >
        <label for="experience" class="col-md-4 col-form-label text-md-right">{{ __('Experience') }}</label>

        <div class="col-md-6" >
            <input id="experience" type="text" class="form-control " name="Experience">
        </div>
    </div>
        {{-- testing --}}
        </div>

    </div>


    <div class="col-xs-10 col-sm-10 col-md-10">

        <div class="form-group">

            <strong>Role:</strong>

            {!! Form::select('roles[]',  array('class' => 'form-control','multiple')) !!}

        </div>

    </div>

    <div class="col-xs-10 col-sm-10 col-md-10 text-center">

        <button type="submit" class="btn btn-primary">Submit</button>

    </div>

</div>

{!! Form::close() !!}


<p class="text-center text-primary"><small>com.jam</small></p>

@endsection
@section('scriptsec')
<script>
    function showfields()
    {

        var selectbox = document.getElementById('category').value;
        // alert(selectbox);
        if (selectbox == "Individual service provider")
        {
           document.getElementById('info_field').style.display='block';
        }
        else
        {
            document.getElementById('info_field').style.display='none';
        }
        return ;
    }
    </script>

@endsection


