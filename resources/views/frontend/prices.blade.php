@extends('frontend.default')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/EN/aboutEn.css?=1616065267') }}">
<main class="custom_main">
    <div id="main_content">        
        <div class="about-syaanh-row-1 ">            
            <div class="col-about-1">
                <div class="about-header">{{ __('frontend.our_prices') }}</div>
                <div class="about-content">
                    {{ __('frontend.first_prices_content') }}
                </div>
                <div class="about-col-image-1-mobile">
                    <img src="{{ asset('/images/prices_11.png') }}">
                </div>
                
            </div>
            <div class="about-col-image-1">
                <img src="{{ asset('/images/prices_1.png') }}">
            </div>
        </div>
        <div class="about-syaanh-row-2">
            <div class="about-col-image-2">
                <div class="about-image-2">
                    <img src="https://staging.jam-app.com/demo/public/images/about_2.png">
                </div>
            </div>
            <div class="col-about-2">
                <div class="col-about-2-top">
                    {{ __('frontend.second_prices_content') }}
                </div>
                <br>
                <div class="about-col-image-2-mobile">
                    <img src="https://syaanh.com/web/about-syaanh/about_mobile_2.png">
                </div>
                <div class="col-about-2-bottom">
                    {{ __('frontend.third_prices_content') }}
                </div>
            </div>
        </div>
        <div class="prices-banner-row">
            <div class="prices-banner-text">
                {{ __('frontend.fourth_prices_content') }}
            </div>
        </div>
    </div>
</main>
<style>
.home-services-header {
    width: 100%;
    text-align: center;
    color: green;
}
</style>
@endsection