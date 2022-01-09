@extends('frontend.default')
@section('content')

<main class="container">
    <div class="provider_register">        
        <h1 class="text-center">Provider Register</h1>
        <form method="POST" id="provider_register" class="mt-5" enctype="multipart/form-data">
            @csrf
            <div class="msg_reg"></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control required">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control required">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control required">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Country Code</label>
                        <select name="conuntry_code" class="form-control required">
                            <option value="">{{ __('frontend.select') }}</option>
                            <option value="+974">+974 العربية</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Contact</label>
                        <input type="text" name="contact" class="form-control required">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control required">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="text" name="password_confirmation" class="form-control required">
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Country</label>
                        <input type="text" name="last_name" class="form-control required">
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Image 1</label>
                        <input type="file" name="image_one" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Image 2</label>
                        <input type="file" name="image_two" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Image 3</label>
                        <input type="file" name="image_three" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="login-link pt-2 pb-4">
                        <input type="checkbox" class="required" id="agree" name="agree"> 
                        <label for="agree">{{ __('frontend.agree_with') }} <a href="javascript:void(0);">{{ __('frontend.terms_and_condition') }}</a></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<style>
.provider_register {
    background: #F9F9F9;
    padding: 23px 40px;
}
.provider_register input {
    border: 1px solid #ccc !important;
    box-shadow: unset !important;
}
button.btn.btn-default {
    background: #fe5722;
    color: #fff;
    font-weight: bold;
    border: #fe5722;
}
</style>
@endsection