<!DOCTYPE html>
<html lang="en" class="home-full-page">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="csrf-token" content="">
<title>Home | Jam</title>
<script src="{{ asset('frontend/assets/js/app.js') }}"></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('frontend/assets/css/fonts-family.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/fonts-aws.css') }}" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/EN/aboutEn.css?=1616065267') }}">

<link href="{{ asset('frontend/assets/css/app.css') }}" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('frontend/assets/icons/jam_fav.png') }}">

<!-- Upload css files by localization -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/EN/mainEn.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/EN/reset_passwordEn3.css') }}">
<!-- dynamic css here -->                

<link rel="stylesheet" href="{{ asset('frontend/assets/css/EN/customs/global.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/EN/customs/pages-review.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/custom_home_and_shop.css') }}">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<style>
body {
    font-family: 'Poppins', sans-serif;
    color: #4A4A4A;
    overflow-x: hidden;
    background-color: #F6F6F6;
    background-color: white;
}
#main_content {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px 0;
}
.title {
    font-size: 36px;
}
p {
    font-size: 20px;    
    color: #777;
}
.application {
    padding: 0 0 30px 0;
    text-align: center;
}
.application .content {
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
}
.nav-link li {
    list-style: none;
}

.nav ul.nav-link {
    padding: 0;
    margin: 0;
}

.nav-link li a {
    padding: 10px 10px;
    margin-right: 15px;
}
.works .title {
    margin-bottom: 35px;
    text-align: center;
}
.works {
    margin-bottom: 35px;
}
.work-item img {
    width: 100%;
    max-width: 175px;
    margin-bottom: 20px;
}
.work-item {
    width: 100%;
    margin: 0;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 10px;
    flex: 1;
    text-align: center;
}

.works-box {  
    display: grid;
    grid-auto-flow: column;
    gap: 5%;
}

.login_password_eye, .login_password_close_eye {
    top: 10px !important;
}
.login_password_eye, .login_password_close_eye {
    /* position: relative; */
    bottom: 40px;
    left: 310px;
    cursor: pointer;
    background-position: center;
}
.login {
    margin-top: 30px;
}
#login .modal-content .modal-header .login-closer-button img, 
#forgot_password .modal-content .modal-header .login-closer-button img {
    height: 35px;
    width: 35px;
}
#login button.close.login-closer-button,
#forgot_password button.close.login-closer-button{
    /* float: right; */
    position: absolute;
    right: -20px;
    top: -20px;
    background: #000;
    border-radius: 50px;
    color: #fff;
    width: 40px;
    height: 40px;
    text-align: center;
}
#login .login-button{
    margin-top: 10px;
    margin-bottom: 30px;
}
.login a {
    margin: 10px 0;
    padding: 15px 15px;
}
.text-center{
    text-align: center;
}
.about-header {
    width: 100%;
    font-size: 36px;
    padding-bottom: 20px;
}
.process .works-box {
    display: flex;    
    gap: 1%;
}
.process .work-item {
    width: 100%;    
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 10px;
    flex: 1;
    text-align: center;
}
.process .work-item img {
    width: 100%;
    max-width: 175px;
    margin-bottom: 20px;
    height: 175px;
}
@media (max-width:  768px){
.for_new_pages #login .modal-content,
.for_new_pages #forgot_password .modal-content {
    width: 300px !important;
    height: auto !important;
    max-height: 550px !important;
    margin: 0 auto;
    padding: 20px;
    border-radius: .6em;
}
#login .modal-content .modal-body .login .user-login,
#forgot_password .modal-content .modal-body .login .user-login {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding: 0 45px;
    border-radius: .5em;
}
.topnav-right .nav {
    display: none;
} 
.for_mobile_search_button {
     display: none!important; 
}
.works-box {
    display: flex!important;
    grid-auto-flow: unset!important;
    gap: 1%!important;
    flex-wrap: wrap!important;
}
.process .work-item {    
    border-radius: 10px;
    margin: 10px 10px !important;
    padding: 10px !important;
    flex: unset !important;
    text-align: center;
}
.work-item {
    width: 100%;
    margin: 10px 10px !important;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 10px;
    flex: unset !important;
    text-align: center;
}
.for_language {
    display: block;
    width: 100%;
    max-width: 70px;
}
.for_new_pages .navbar-caret-category {
    height: 28px;
    background-size: unset;
    float: right;
}
.topnav-right {
    width: 100%;
}
.home-back .for_language a {
    margin-left: 0!important;
    position: relative;
}
#nav_lang_link {
    min-width: unset;
    padding: 5px 5px;
    border: none;
    margin-top: 2px;
    width: 82px;
}
.for_new_pages .navbar-caret-category {
    height: 20px;
    background-size: unset;
    float: right;
}
.topnav-right-guest .user-profile-create-order-button,
.topnav-right-guest .categories-dropdown-btn {
    display: block!important;
}
.topnav-left a img {
    margin-top: 5px;
    width: 100%;
    max-width: 100px;
}
}
.privacy-content ul li {
    font-size: 20px;
    color: #777;
}
</style>
<body>
<div class="overlay">
    <img src="{{ asset('frontend/assets/images/loading.svg') }}" id="loading">
</div>
<div id="app" class="for_new_pages home-full-page home-full-page-mobile">
    <div class="home-full-page_header">
        <div class="guarantee-row">
            <div align="center">
                <span>
                    <img src="{{ asset('frontend/assets/images/guarantee@3x.png') }}" width="24px">
                </span>
                <span class="guarantee-text">{{ __('frontend.header_remark') }}</span>
            </div>
        </div>
        <div class="syaanh-home-page-nav home-back">
            <div class="topnav mobile_center_align">
                <div class="topnav-left">
                    <!--a class="syaanh-logo home-xpath-button" data-qa="home-xpath-button" href="{{ route('customer.home') }}">
                        <img src="{{ asset('images/logoNewJAM.png') }}">
                    </a-->
                    <a href="{{ route('customer.home') }}" class="home-link">
                        <img src="{{ asset('images/jamlogo.png') }}" width="60">
                    </a>
                    <div class="create-order-input " id="search_toggle">
                        <div class="inputAndCreateOrder">
                            <div class="search_keyword-block">
                                <form action="{{ url('/service') }}">
                                    @csrf
                                    <input type="text" name="keyword" id="search_keyword" data-id="0"
                                        placeholder="{{ __('frontend.header_search') }}" style="margin-top: 8px;">
                                    <button type="submit" class="btn btn-link search_keyword__button">
                                        <img src="{{ asset('frontend/assets/images/search-small.png') }}" alt="">
                                    </button>
                                </form>
                            </div>
                            <div class="dropdown service-dropdown">
                                <div class="dropdown-menu search-dropdown-menu" id="search-dropdown-menu">
                                    <input type="hidden" name="keyword">
                                    <input type="hidden" id="locale001" name="locale"value="en">
                                    <input type="hidden" name="see_all_search_result_text" value="See all search results">
                                    <span class="search_results_dropdown_no_result ">
                                    No services or products found, please try again</span>
                                    <div class="service-dropdown__item search_categories">
                                        <h5 class="service-dropdown__name">Categories</h5>
                                        <span>searching result</span>
                                    </div>
                                    <div class="service-dropdown__item search_shop_items">
                                        <h5 class="service-dropdown__name">Shop items </h5>
                                        <span>searching result</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="topnav-right  topnav-right-guest ">
                    <div class="nav">
                        <ul class="nav-link">
                            <li>
                                <a href="{{ url('about') }}"><span>{{ __('frontend.about') }}</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="categories-dropdown_block">
                        <a href="#" class="categories-dropdown-btn" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('frontend.categories') }}
                            <span class="navbar-caret navbar-caret-category caret_no"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left  dropdown-primary categories-list categories-list-main" aria-labelledby="navbarDropdownMenuLink1" style="border: none;">
                            <?php  $services = App\services::get(); ?>
                            @foreach($services as $service)
                            <a class="dropdown-item" href="{{ route('customer.sub-services',$service->id) }}">
                                {{ (session()->get('locale') == null || session()->get('locale') == 'en') ? $service->name : $service->arabic_name }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="for_language ">
                        <a class="categories-dropdown-btn" href="#" role="button" id="for_lang_drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">English<span class="navbar-caret navbar-caret-category caret_no"></span></a>
                        <div id="nav_lang_link" class="dropdown-menu">
                            <a class="dropdown-item pb-2" href="{{ url('customer/locale/en') }}">English</a>
                            <a class="dropdown-item pt-2" href="{{ url('customer/locale/ar') }}">العربية</a>
                        </div>
                    </div>
                    <div id="search_toggle" class="for_mobile_search_button" onclick="serach_toggle()">
                        <img src="{{ asset('frontend/assets/images/search_icon_mob.png') }}" height="30px">
                    </div>
                    @if(Auth::check())
                        <span class="nav-link-login">
                            <a href="{{ route('customer.account') }}">
                                <span>{{ __('frontend.my_account') }}</span>
                            </a>
                        </span>
                        <span class="nav-link-login">
                            <a href="{{ route('customer.logout') }}">{{ __('frontend.logout') }}</a>
                        </span>
                    @else
                        <span data-toggle="modal" data-target="#login" class="nav-link-login">
                            {{ __('frontend.login') }}
                        </span>
                        <span data-toggle="modal" data-target="#register" class="nav-link-register">
                        {{ session()->get('locale') == 'en' ? 'Register' : 'register' }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    @yield('content')
    
    <footer class="sub-footer">
        <div class="footer-widget">            
            <div class="download-links-mobile ">
                <div class="app-links-mobile">
                    <div class="download-header-mobile">{{ __('frontend.app_link') }}</div>
                    <div class="client-agent-link-icons-mobile">
                        <div class="client-link-icons-mobile">
                            <div class="client-header-mobile">{{ __('frontend.client_app') }}</div>
                            <a href="#" target="_blank" class="client-ios-link-mobile">
                                <img src="{{ asset('frontend/assets/images/app_store.png') }}">
                            </a>
                            <a href="#" target="_blank" class="client-android-lin-mobile">
                            <img src="{{ asset('frontend/assets/images/gapy.png') }}">
                            </a>
                        </div>
                        <div class="agent-link-icons-mobile">
                            <div class="client-header-mobile">{{ __('frontend.provider_app') }}</div>
                            <a href="#" target="_blank" class="agent-ios-link-mobile">
                                <img src="{{ asset('frontend/assets/images/app_store.png') }}">
                            </a>
                            <a href="#" target="_blank" class="agent-android-link-mobile">
                                <img src="{{ asset('frontend/assets/images/gapy.png') }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="download-links-mobile-320">
                <div class="app-links-mobile-320">
                    <div class="download-header-mobile-320">{{ __('frontend.app_link') }}</div>
                    <div class="client-agent-link-icons-mobile-320">
                        <div class="client-link-icons-mobile-320" align="center">
                            <div class="client-header-mobile-320">{{ __('frontend.client_app') }}</div>
                            <a href="#" target="_blank" class="client-ios-link-mobile-320">
                                <img src="{{ asset('frontend/assets/images/app_store.png') }}">
                            </a>
                            <a href="#" target="_blank" class="client-android-lin-mobile-320">
                                <img src="{{ asset('frontend/assets/images/gapy.png') }}">
                            </a>
                        </div>
                        <div class="agent-link-icons-mobile-320" align="center">
                            <div class="client-header-mobile-320">{{ __('frontend.provider_app') }}</div>
                            <a href="#" target="_blank" class="agent-ios-link-mobile-320">
                                <img src="{{ asset('frontend/assets/images/app_store.png') }}">
                            </a>
                            <a href="#" target="_blank" class="agent-android-link-mobile-320">
                                <img src="{{ asset('frontend/assets/images/gapy.png') }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <footer class="main-footer">
        <div class="footer-widget">
            <div class="footer-categories-and-social-links">
                <div class="footer-categories">
                    <ul>
                        @foreach($services as $service)
                        <li>
                            <a href="{{ route('customer.sub-services',$service->id) }}" style="color: #4A4A4A">
                                {{ (session()->get('locale') == null || session()->get('locale') == 'en') ? $service->name : $service->arabic_name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- mobile -->
                <div class="footer-categories-mobile" style="display: none;">
                    <div class="categories-dropdown-btn" id="navbarDropdownMenuLinkCategoriesMobile">
                        <b>{{ __('frontend.categories') }}</b>
                        <img src="https://syaanh.com/web/icons/caret.png">
                    </div>
                    <div>
                        <ul>
                            @foreach($services as $service)
                            <li>
                                <a href="{{ route('customer.sub-services',$service->id) }}" style="color: #4A4A4A">
                                    {{ (session()->get('locale') == null || session()->get('locale') == 'en') ? $service->name : $service->arabic_name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="social-icons-mobile">
                    <div class="social-icons">
                        <div class="icons">
                            <a class="fb-ic" href="#" target="_blank">
                                <img src="https://syaanh.com/web/icons/facebook.png">
                            </a>
                            <a class="tw-ic" href="#" target="_blank">
                                <img src="https://syaanh.com/web/icons/twitter.png">
                            </a>
                            <a class="yt-ic" href="#" target="_blank">
                                <img src="https://syaanh.com/web/icons/youtube.png">
                            </a>
                            <a class="inst-ic" href="#" target="_blank">
                                <img src="https://syaanh.com/web/icons/instagram.png">
                            </a>
                        </div>
                    </div>
                    <div class="reserved-mobile">
                        <span>{{ __('frontend.copyright') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer-copyright">
        <div class="syaanh-links footer-widget">
            <div class="links">
                <a href="mailto:support@jam-app.com">{{ __('frontend.email_us') }}</a>
                <a href="{{ url('privacy-policy') }}">{{ __('frontend.privacy_policy') }}</a>
                <a href="{{ url('contact-us') }}">{{ __('frontend.contact_us') }}</a>
                @if(Auth::check())
                @else
                <a href="{{ url('provider/register') }}">{{ __('frontend.provider_register') }}</a>
                @endif
                <a href="{{ url('about') }}">{{ __('frontend.about') }}</a>
                <a href="{{ url('prices') }}">{{ __('frontend.our_prices') }}</a>
            </div>
            <div class="social-icons-mobile-320" style="display: none">
                <div class="icons">
                    <a class="fb-ic" href="#" target="_blank">
                        <img src="https://syaanh.com/web/icons/facebook.png">
                    </a>
                    <a class="tw-ic" href="#" target="_blank">
                        <img src="https://syaanh.com/web/icons/twitter.png">
                    </a>
                    <a class="yt-ic" href="#" target="_blank">
                        <img src="https://syaanh.com/web/icons/youtube.png">
                    </a>
                    <a class="inst-ic" href="#" target="_blank">
                        <img src="https://syaanh.com/web/icons/instagram.png">
                    </a>
                </div>
            </div>
            <div class="reserved">
                <span>{{ __('frontend.copyright') }}</span>
            </div>
        </div>
    </div>

    
    <div class="activation_code_mobile_div">
        <div class="modal fade" id="login" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content login-modal-content">
                    <div class="modal-header no-border">
                        <div class="login-header text-center" style="margin-top:0; font-size: 25px;">
                            {{ __('frontend.login') }}
                            <button type="button" class="close login-closer-button" data-dismiss="modal">
                            <img src="{{ asset('frontend/assets/images/close.png') }}">
                        </button>
                        </div>
                        
                    </div>
                    <div class="modal-body">
                        <div class="msg_login"></div>
                        <form id="login_form" method="POST">
                            @csrf 
                            <div class="row">
                                <div class="col-md-12" style="padding-right: 0;">
                                    <div class="form-group">
                                        <select name="conuntry_code" id="conuntry_code" class="form-control required">
                                            <option value="">{{ __('frontend.select') }}</option>
                                            <!-- <option value="+91">+91 India</option> -->
                                            <option value="+974">+974 العربية</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" style="padding-right: 0;">
                                    <div class="form-group">
                                        <input type="text" id="mobile_or_email" name="input" class="form-control required" placeholder="{{ __('frontend.email_or_phone') }}" required >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" style="padding-right: 0;">
                                    <div class="eye_open login_password_eye hidden" onclick="hidePassword('login_password', 'login_password_eye', 'login_password_close_eye')" ></div>
                                    <div class="eye_closed login_password_close_eye" onclick="showPassword('login_password', 'login_password_eye', 'login_password_close_eye')" ></div>
                                    <input type="password" id="login_password" name="password" class="form-control required" placeholder="{{ __('frontend.password') }}" >
                                    <div class="for_login_pass_error"> 
                                        <span class="help-block hidden"> <strong></strong> </span>
                                    </div>
                                </div>
                            </div>

                            <div class="login">
                                <div class="for_register_buttons_mobile">
                                    <div class="login-link" align="center">
                                        <div class="login-link-div"> 
                                            <span class="text-center"> 
                                                <a href="javascript:void(0);" class="nav-link-forgot_password" data-toggle="modal" data-target="#forgot_password" data-dismiss="modal">
                                                    {{ __('frontend.forgot_password') }}
                                                </a>
                                            </span>
                                        </div>
                                        <div class="login-link-div">
                                            <span class="btn text-center">
                                                {{ __('frontend.Dont_have_account') }}
                                            </span>
                                            <a class="home-xpath-register-button" data-toggle="modal" data-target="#register" data-dismiss="modal" style="cursor: pointer">
                                                {{ __('frontend.register') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="login-button home-xpath-log_in-button"data-qa="home-xpath-log_in-button">
                                        <button type="submit" class="user-login">
                                            <span>{{ __('frontend.login') }}</span> <i class="fa fa-spinner fa-spin" style="display: none; color: #fff;"></i>
                                        </button>
                                    </div>

                                    <div class="social-login-link">
                                        <a href="{{url('/redirect')}}" class="btn btn-primary w-100">
                                            {{ __('frontend.login_with_facebook') }}
                                        </a>
                                        <a href="{{route('google.login')}}" class="btn btn-primary w-100">
                                            {{ __('frontend.login_with_google') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="forgot_password" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content login-modal-content">
                    <div class="modal-header no-border">
                        <div class="login-header text-center" style="margin-top:0; font-size: 25px;">
                            Forgot Password
                            <button type="button" class="close login-closer-button" data-dismiss="modal">
                            <img src="{{ asset('frontend/assets/images/close.png') }}">
                        </button>
                        </div>
                        
                    </div>
                    <div class="modal-body">
                        <div class="msg_login"></div>
                        <form id="forgot_password_form" method="POST">
                            @csrf 
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control required" placeholder="{{ __('frontend.email') }}" required >
                                </div>
                            </div>

                            <div class="login">
                                <div class="for_register_buttons_mobile">
                                    <div class="login-button home-xpath-log_in-button">
                                        <button type="submit" class="user-login">
                                            <span>Submit</span> <i class="fa fa-spinner fa-spin" style="display: none; color: #fff;"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="register" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header no-border">
                        <div class="register-header" style="margin-top:0; font-size: 25px;">
                            {{ __('frontend.customer_sign_up') }}
                        </div>
                        <button type="button" class="close register-close-button" data-dismiss="modal">
                            <img src="{{ asset('frontend/assets/images/close.png') }}">
                        </button>
                    </div>
                    <div class="modal-body register-modal-body">
                        <div class="msg_reg"></div>
                        <form method="POST" id="registration">
                            @csrf
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 0;">
                                    <div class="form-group">
                                        <select name="conuntry_code" id="conuntry_code" class="form-control required">
                                            <option value="">{{ __('frontend.select') }}</option>
                                            <!-- <option value="+91">+91 India</option> -->
                                            <option value="+974">+974 العربية</option>
                                        </select>
                                        <small class="error_conuntry_code text-danger"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="contact" class="form-control required" id="contact" placeholder="{{ __('frontend.phone') }}">
                                        <small class="error_contact text-danger"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control required" id="password" placeholder="{{ __('frontend.password') }}">
                                        <small class="error_password text-danger"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control required" id="password_confirmation" placeholder="{{ __('frontend.confirm_password') }}">
                                        <small class="error_password_confirmation text-danger"></small>
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
                                <div class="col-md-12">
                                    <button type="submit" class="btn user-registration text-center">
                                        <span>{{ __('frontend.sign_up') }}</span> <i class="fa fa-spinner fa-spin" style="display: none; color: #fff;"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pt-2 pb-2">
                                    <span>{{ __('frontend.already_have_an_account') }}</span>
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#login" data-dismiss="modal">{{ __('frontend.login') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ajax-loader" style="display:none"></div>
<style>
#registration button.btn.user-registration {
    width: 100% !important;
}
#registration button.btn.user-registration span {
    position: unset !important;
}
#login_form button.user-login,
#forgot_password_form button.user-login {
    width: 100% !important;
}
#login_form button.user-login span,
#forgot_password_form button.user-login span {
    position: unset !important;
} 
#forgot_password .modal-content .modal-body .login .user-login {
    width: 100%;
    margin: 0;
    border: unset;
    border-radius: .25rem;
    outline: unset;
    box-shadow: 0 0 19px rgba(17, 33, 55, 0.1);
    cursor: pointer;
}
label.error{
    color: red;
    font-size: 15px;  
}
.login_password_eye, .login_password_close_eye {
    top: 27px;
}
#registration label#agree-error {
    position: absolute;
    top: 30px;
    left: 15px;
}
.login_password_eye, .login_password_close_eye{
    bottom: 30px;
}
.ajax-loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url({{ asset('images/full_page_load.gif')}}
    ) 50% 50% no-repeat #f5f5f58c;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}" defer></script>    
<script src="{{ asset('frontend/assets/js/bootstrap.js') }}"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-remote-config.js"></script>
<script src="{{ asset('frontend/assets/js/init-firebase.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js" type="text/javascript"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>var ajaxUrl = "{{ url('/') }}"</script>

<script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBNeGSFWxiyiIMzTmW2pXwU_z_1WtttnoU&amp;components=country:QA&sensor=false&amp;libraries=places" type = "text/javascript" ></script> 
 

<script>

$("#provider_register").validate({
    submitHandler: function(form){
        var formData = new FormData($("#provider_register")[0]);
        $.ajax({
            beforeSend: function() {
                $("#provider_register").find('button>i').show();
            },
            url: ajaxUrl+'/provider/register',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.success){
                    var message = '<p class="text-success">'+response.message+'</p>';
                    $(".msg_reg").html(message);
                    $("#provider_register")[0].reset();
                    location.reload();
                }
            },
            complete: function() {
                $("#provider_register").find('button>i').hide();
            },
            error:function(status,error){
                var errors = JSON.parse(status.responseText);
                var msg_error = '';
                if(status.status == 401){
                    $("#provider_register").find('button>i').hide();  
                    $.each(errors.error, function(i,v){ 
                        msg_error += v[0]+'!</br>';
                    });
                    var message = '<p class="text-danger">'+msg_error+'</p>';
                    $(".msg_reg").html(message);
                }               
            }   
        });
        return false;
    }
});

$("#registration").validate({
    submitHandler: function(form){
        var formData = new FormData($("#registration")[0]);
        $.ajax({
            beforeSend: function() {
                $("#registration").find('button>i').show();
            },
            url: ajaxUrl+'/customer/register',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.success){
                    var message = '<p class="text-success">'+response.message+'</p>';
                    $(".msg_reg").html(message);
                    $("#registration")[0].reset();
                    location.reload();
                }
            },
            complete: function() {
                $("#registration").find('button>i').hide();
            },
            error:function(status,error){
                var errors = JSON.parse(status.responseText);
                var msg_error = '';
                if(status.status == 401){
                    $("#registration").find('button>i').hide();  
                    $.each(errors.error, function(i,v){ 
                        msg_error += v[0]+'!</br>';
                    });
                    var message = '<p class="text-danger">'+msg_error+'</p>';
                    $(".msg_reg").html(message);
                }               
            }   
        });
        return false;
    }
});

$("#login_form").validate({
    submitHandler: function(form){
        var formData = new FormData($("#login_form")[0]);
        $.ajax({
            beforeSend: function() {
                $("#login_form").find('button>i').show();
            },
            url: ajaxUrl+'/customer/login',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.success){
                    var message = '<p class="text-success">'+response.message+'</p>';
                    $(".msg_login").html(message);
                    $("#login_form")[0].reset();
                    location.reload();
                }
            },
            complete: function() {
                $("#login_form").find('button>i').hide();
            },
            error:function(status,error){
                var errors = JSON.parse(status.responseText);
                var msg_error = '';
                if(status.status == 401){
                    $("#login_form").find('button>i').hide();  
                    $.each(errors.error, function(i,v){ 
                        msg_error += v[0]+'!</br>';
                    });
                    var message = '<p class="text-danger">'+msg_error+'</p>';
                    $(".msg_login").html(message);
                }               
            }
        });
        return false;
    }
});

$("#forgot_password_form").validate({
    submitHandler: function(form){
        var formData = new FormData($("#forgot_password_form")[0]);
        $.ajax({
            beforeSend: function() {
                $("#forgot_password_form").find('button>i').show();
            },
            url: ajaxUrl+'/customer/forgot-password',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.success){
                    var message = '<p class="text-success">'+response.message+'</p>';
                    $(".msg_login").html(message);
                    $("#forgot_password_form")[0].reset();
                    location.reload();
                }
            },
            complete: function() {
                $("#forgot_password_form").find('button>i').hide();
            },
            error:function(status,error){
                var errors = JSON.parse(status.responseText);
                var msg_error = '';
                if(status.status == 401){
                    $("#forgot_password_form").find('button>i').hide();  
                    $.each(errors.error, function(i,v){ 
                        msg_error += v[0]+'!</br>';
                    });
                    var message = '<p class="text-danger">'+msg_error+'</p>';
                    $(".msg_login").html(message);
                }               
            }
        });
        return false;
    }
});

$("#password-change").validate({
    submitHandler: function(form){
        var formData = new FormData($("#password-change")[0]);
        $.ajax({
            beforeSend: function() {
                $("#password-change").find('button>i').show();
            },
            url: $("#password-change").attr('action'),
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.success){
                    var message = '<p class="text-success">'+response.message+'</p>';
                    $(".message").html(message);
                    $("#password-change")[0].reset();
                    location.reload();
                }
            },
            complete: function() {
                $("#password-change").find('button>i').hide();
            },
            error:function(status,error){
                var errors = JSON.parse(status.responseText);
                var msg_error = '';
                if(status.status == 401){
                    $("#password-change").find('button>i').hide();  
                    $.each(errors.error, function(i,v){ 
                        msg_error += v[0]+'!</br>';
                    });
                    var message = '<p class="text-danger">'+msg_error+'</p>';
                    $(".message").html(message);
                }               
            }
        });
        return false;
    }
});

$("body").on('click','.getServiceVendor', function(){
    var pcm_id  = $(this).data("id");
    var type  = $(this).data("type");
    $('#vendorDetailModal').modal('hide');
    $.ajax({
        beforeSend: function() {
            $(".ajax-loader").show();
        },
        url: ajaxUrl+'/service-vendor',
        method: 'POST',
        data: {
            pcm_id:pcm_id,
            type:type,
        },
        success: function (response) {
            if(response.success){
                if(type=='vendorBooking'){
                    $('#vendor_listing').html(response.html);
                    $('#vendorListModal').modal('show');
                }else if(type=='vendorDetail'){
                    $('#vendor_detail').html(response.html);
                    $('#vendorDetailModal').modal('show');
                }
            }
        },
        complete: function() {
            $(".ajax-loader").hide();
        },
        error:function(status,error){
            var errors = JSON.parse(status.responseText);
            var msg_error = '';
            if(status.status == 401){
                $(".ajax-loader").hide();
                $("#login").modal('show');  
                $.each(errors.error, function(i,v){ 
                    msg_error += v[0]+'!</br>';
                });
                var message = '<p class="text-danger">'+msg_error+'</p>';
                $(".msg_login").html(message);
            }               
        }
    });
    return false;
});

$("body").on('click','#bookingForm',function(){
    $("#bookingForm").validate({
        submitHandler: function(form){
            var formData = new FormData($("#bookingForm")[0]);
            $.ajax({
                beforeSend: function() {
                    $("#bookingForm").find('button>i').show();
                },
                url: ajaxUrl+'/vendor/booking',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.success){
                        var message = '<p class="text-success">'+response.message+'</p>';
                        $(".msg_login").html(message);
                        if (response.redirect_url != '') {
                            setTimeout(function() {
                                location.href = response.redirect_url;
                            }, 2000);
                        }
                    }
                },
                complete: function() {
                    $("#bookingForm").find('button>i').hide();
                },
                error:function(status,error){
                    var errors = JSON.parse(status.responseText);
                    var msg_error = '';
                    if(status.status == 401){
                        $("#bookingForm").find('button>i').hide();  
                        $.each(errors.error, function(i,v){ 
                            msg_error += v[0]+'!</br>';
                        });
                        var message = '<p class="text-danger">'+msg_error+'</p>';
                        $(".msg_login").html(message);
                    }               
                }
            });
            return false;
        }
    });
});
</script>
</body>
</html>