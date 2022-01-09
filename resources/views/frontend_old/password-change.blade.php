@extends('frontend.default')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/EN/aboutEn.css?=1616065267') }}">
<style type="text/css">
.about-syaanh-row-1 {    
    height: auto;   
}
.main_content {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px 0;
}
.about-syaanh-row .col-about-1{
    width: 100%;
}
.content li {
    font-size: 20px;
    color: #777;
    padding: 6px 0;
}
input{
    outline: unset !important;
    border: 1px solid #ddd !important;
    box-shadow: unset !important;
}
.user-login{
    color: #fff;
    font-size: 25px;
}
</style>
<main class="custom_main">
    @if(session()->get('locale') == null || session()->get('locale') == 'en')
        <div class="main_content">        
            <div class="row">            
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="message"></div>
                    <form action="{{ url('customer/password-change/'.$id) }}" id="password-change" method="POST">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>New Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Password Confirm</label>
                                <input type="text" name="password_confirmation" class="form-control" required>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="user-login">Submit <i class="fa fa-spinner fa-spin" style="display: none; color: #fff;"></i></button>
                            </div>
                        </div> 
                    </form>        
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    @else
        
    @endif
</main>
<style>
.user-login {
    width: 100%;
    margin: 0;
    border: unset;
    border-radius: .25rem;
    outline: unset;
    box-shadow: 0 0 19px rgba(17, 33, 55, 0.1);
    cursor: pointer;
}
</style>
@endsection