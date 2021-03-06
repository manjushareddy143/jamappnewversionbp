@extends('layouts.app')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2 align='center'> Show User</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>

            </div>

        </div>

    </div>


    {{-- {!! Form::open(array('route' => 'user.store','method'=>'GET')) !!} --}}

    @if (isset($user) && !empty($user))
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                     {{ $user->name }}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Email:</strong>

                    {{ $user->email }}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Roles:</strong>

                    {{-- @if(!empty($user->getRoleNames()))

                        @foreach($user->getRoleNames() as $v)

                            <label class="badge badge-success">{{ $v }}</label>

                        @endforeach

                    @endif --}}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Image:</strong>

                    {{ $user->email }}

                 </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Contact:</strong>

                      {{ $user->email }}

                </div>

            </div>

        </div>

    </div>

@endif
<p class="text-center text-primary"><small>com.jam</small></p>
@endsection
