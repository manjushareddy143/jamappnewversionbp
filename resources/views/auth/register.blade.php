@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form>  
                    <!-- method="POST" action="{{ route('register') }}" -->
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

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
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

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
                            <div class="form-group row" >
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                            {{-- <div class="form-group"> --}}
                                <label class="radio-inline">
                                    <!-- <input type="radio" id="gen1" name="gen_radio"> Female </label> -->
                                    <input type="radio" name="gender" value="female"> Female
                                <label class="radio-inline">
                                <input type="radio" name="gender" value="male"> Male
                                    <!-- <input type="radio" id="gen2" name="gen_radio"> Male </label> -->
                            </div>

                            <div class="form-group row" >
                                <label for="language" class="col-md-4 col-form-label text-md-right">{{ __('Languages known') }}</label>

                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <!-- <input type="checkbox" name="language[]" value="arabic"> Arabic -->
                                            <input type="checkbox" name="language" value="arabic"> Arabic
                                        </label>
                                        <label>
                                            <!-- <input type="checkbox" name="english" value="english"> English -->
                                            <input type="checkbox" name="language" value="english"> English
                                        </label>
                                    </div>
                              </div>
                            </div>

                            <div class="form-group row" >
                                <label for="timing" class="col-md-4 col-form-label text-md-right">{{ __('Timing') }}</label>
                                <!-- <select name="time" id="inputMDEx1" class="form-control @error('Selected type') is-invalid @enderror" onchange="myFunction()"> -->
                                <div class="col-md-3">
                                        
                                <input type="time" id="apptstart" name="start_time" class="form-control">            
                             <!-- <input type="time" id="starttime" name="start_time" class="form-control"> -->
                            <label for="inputMDEx1">Start time</label>
                               <!-- </select> -->
                                        
                                </div>
                                <div class="col-md-3">
                                <input type="time" id="apptend" name="end_time" class="form-control"> 
                                <!-- <input type="time" id="endtimr" name="end_time" class="form-control"> -->
                                <label for="inputMDEx1">end time</label>
                                </div>
                                
                            </div>

                            <div class="form-group row" >
                                <label for="experience" class="col-md-4 col-form-label text-md-right">{{ __('Experience') }}</label>

                                <div class="col-md-6" >
                                    <!-- <input id="experience" type="text" class="form-control " name="Experience"> -->
                                    <input type="text" class="form-control" name="experience"/>
                                </div>
                            </div>
                                {{-- testing --}}
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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

    function myFunction() {
  var x = document.getElementById("inputMDEx1").value;
 
}
    </script>

@endsection
