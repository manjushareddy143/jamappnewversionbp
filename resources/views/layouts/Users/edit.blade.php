@extends('layouts.app')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2 align='center'>Edit New User</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="/index"> Back</a>

            </div>

        </div>

    </div>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <br />
    @endif
    <form method="POST" action="{ { route('Users.update', $user->id) } }">
        @method('PATCH')
        @csrf


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

    @if(isset($user) && !empty($user))

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>
                    <input type="text" name="name" id="name" class="form-control" required value="{{$user->name}}">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Email:</strong>

                    {{-- {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!} --}}
                    <input type="text" name="email" id="email" class="form-control" required value="{{$user->email}}">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Password:</strong>

                    {{-- {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!} --}}
                    <input type="password" name="password" id="password" class="form-control" required value="{{$user->password}}">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Confirm Password:</strong>

                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Role:</strong>

                    {!! Form::select('roles[]', $errors,$user, array('class' => 'form-control','multiple')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Image:</strong>

                    {!! Form::text('image', null, array('placeholder' => 'Image','class' => 'form-control')) !!}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Contact:</strong>

                    {{-- {!! Form::text('contact', null, array('placeholder' => 'Contact','class' => 'form-control')) !!} --}}
                    <input type="text" name="contact" id="contact" class="form-control" required value="{{$user->contact}}">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

        {!! Form::close() !!}
    @endif
    <p class="text-center text-primary"><small>com.jam</small></p>
@endsection
