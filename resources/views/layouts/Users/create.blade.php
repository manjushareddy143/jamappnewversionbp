@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create User') }}</div>

                <div class="card-body">
                    <form method="GET" action="/index">
                        {{-- {{ route('user.store') }} --}}
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" required>{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" required>{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('choosen file') is-invalid @enderror" name="image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right" required>{{ __('Contact') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="tel" class="form-control @error('contact number') is-invalid @enderror" name="contact">

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <select name="type" id="category" class="form-control @error('Selected type') is-invalid @enderror" onchange="showfields()">
                                    <option value="Selected">Select</option>
                                    <option value="Corporate service provider">Corporate service provider</option>
                                    <option value="Individual service provider">Individual service provider</option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group" id="info_field" style="display: none">
                            {{-- This fields will show after dropdown selected --}}

                                  <!--radiobutton -->
                                    <div id="gender-group" class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">

                                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                                        {{-- <div class="container">
                                            <div class="form-group"> --}}
                                                <input type="radio" name="gender" value="male"> Male
                                                <input type="radio" name="gender" value="female"> Female
                                                <input type="radio" name="gender" value="other"> Other
                                                @if ($errors->has('gender'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('gender') }}</strong>
                                                    </span>
                                                @endif
                                            {{-- </div>
                                        </div> --}}
                                    </div>

                            <div class="form-group row" >
                                <label for="language" class="col-md-4 col-form-label text-md-right">{{ __('Languages known') }}</label>

                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="arabic" value="arabic"> Arabic
                                        </label>
                                        <label>
                                            <input type="checkbox" name="english" value="english"> English
                                        </label>
                                 @error('language')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                              </div>
                            </div>

                            <div class="form-group row" >
                                <label for="timing" class="col-md-4 col-form-label text-md-right">{{ __('Timing') }}</label>

                                <div class="col-md-3">

                                        <input type="time" id="start_time" class="form-control">
                                        <label for="start_time">Start time</label>

                                        {{-- <input id="timing" type="text" class="form-control " name="Timing"> --}}
                                </div>
                                <div class="col-md-3">
                                <input type="time" id="end_time" class="form-control">
                                        <label for="end_time">End time</label>
                                </div>
                            </div>

                            <div class="form-group row" >
                                <label for="experience" class="col-md-4 col-form-label text-md-right">{{ __('Experience') }}</label>

                                <div class="col-md-6" >

                                    {!! Form::selectYear('year', 0, 20) !!}
                                    <label for="experience"> Years </label>
                                    {!! Form::selectRange('number', 0, 12); !!}
                                    <label for="experience"> Months</label>
                                    {{-- <input id="experience" type="text" class="form-control " name="Experience"> --}}
                                </div>
                            </div>
                                {{-- testing --}}
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" onclick="responsecall">
                                    {{ __('Create User') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
$.ajax({
    type:"POST",
    url:"/index/"+id,
    success : function(results)
    {
        var $table = $('<table></table>');
        $('#destination').html('');

        for(var i=0;i<=results.length;i++)
        {
            $table.append('<tr><td>name</td><td>'+results[i].design_name+'</td></tr>)
            $table.append('<tr><td>email</td><td>'+results[i].design_email+'</td></tr>)
            $table.append('<tr><td>password</td><td>'+results[i].design_password+'</td></tr>)
            $table.append('<tr><td>contact</td><td>'+results[i].design_contact+'</td></tr>)
            $table.append('<tr><td>type</td><td>'+results[i].design_type+'</td></tr>)
        }
        $('#destination').append($table);
    }
})
{{-- <script>

    function responsecall() {
        console.log("test1");
        // $design = design::select('name','email','password','contact','type');
        // return Response::json($design);
        return response()
                ->json(['name','email','contact','type'])
                ->withCallback($request->input('responsecall'));
        print("hello");
        exit;
        if (Request::format() == 'json')
        {
            //when condition is true then below statement will excute
            return view('layouts.Users.index');
        }
    }
  </script> --}}
@endsection
