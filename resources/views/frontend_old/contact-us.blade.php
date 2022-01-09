@extends('frontend.default')
@section('content')

<main class="custom_main">
    <div id="main_content">        
        <div class="about-syaanh-row-1 ">            
            <div class="col-about-1">
                <div class="about-header">{{ __('frontend.about_jam') }}</div>
                <div class="about-content">
                    {{ __('frontend.contact_first_content') }} <span class="font-weight-bold">{{ __('frontend.contact_second_content') }} </span> {{ __('frontend.in_qatar') }}  
                </div>
                <div class="about-col-image-1-mobile">
                    <img src="https://syaanh.com/web/about-syaanh/about__mobile_1.png">
                </div>
                
            </div>
            <div class="about-col-image-1">
                <img src="https://syaanh.com/web/about-syaanh/about_1.png">
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