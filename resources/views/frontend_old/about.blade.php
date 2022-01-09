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
</style>
<main class="custom_main">
    @if(session()->get('locale') == null || session()->get('locale') == 'en')
        <div class="main_content">        
            <div class="about-syaanh-row-1 ">            
                <div class="col-about-1">
                    <div class="about-header">{{ __('frontend.about_jam') }}</div>
                    <p>Jam is a new home management platform that connects individuals for all service requirements with prompt, exceptional, and dependable services in Qatar. Our 24/7 service platform instantly connects you to certified handyman who can help you with odd tasks and errands so that you may be more productive each day. Jam ensures your improvement chores will be completed to the highest standards, and that you will leave with a grin on your face.</p>
                    <p><strong>Jam. Do more in less time</strong></p>
                    
                    <div class="about-col-image-1-mobile">
                        <img src="{{ asset('images/about__mobile_1.png') }}">
                    </div>                
                </div>
                <div class="about-col-image-1">
                    <img src="{{ asset('images/about_1.png') }} ">
                </div>
            </div>
            <div class="about-syaanh-row">
                <div class="col-about-1">
                    <div class="content">
                        <h2>Vision</h2>
                        <p>To empower people with their skills with the power of technology.</p>
                        <h2>Mission:</h2>
                        <p>To keep changing commerce related experiences through commitment to people system and technology. Lead the way in providing value to our customers and stakeholders by innovative solutions.</p>
                    </div>
                </div>
            </div>
            <div class="about-syaanh-row">
                <div class="col-about-1">
                    <div class="content">
                        <h2>Our Team:</h2>
                        <p>Jam has a superb team of qualified and experienced skilled staff with diverse skill sets that know how to address your maintenance issues. Our specialists get thorough training and are well-equipped to handle any service needs you may have, from basic to complex. Our technology connects consumers with professionals that meet their criteria and are accessible at the chosen time and day.</p>
                    </div>
                </div>
            </div>
            <div class="about-syaanh-row">
                <div class="col-about-1">
                    <div class="content">
                        <h2>Out Vetting Process:</h2>
                        <p>Jam will do all the hard work of researching, vetting, and adding reliable service providers on the platform. It will provide you with a seamless and efficient solutions to get things done quickly and hassle free.</p>
                    </div>
                </div>
            </div>
            <div class="about-syaanh-row">
                <div class="col-about-1">
                    <div class="content">
                        <h2>Services:</h2>
                        <p>Many homeowners complain that they have a difficult time finding a reputable company to help them with their home improvement services.</p>
                        <p>Jam is conceived to precisely solve this pain areas:</p>
                        <ul>
                            <li>Electrical</li>
                            <li>Plumbing</li>
                            <li>Air-conditioning</li>
                            <li>Masonry</li>
                            <li>Carpentry</li>
                            <li>Carpentry</li>
                            <li>Upholstery</li>
                            <li>Painting</li>
                            <li>Home Appliance maintenance</li>
                            <li>Pest Control</li>
                            <li>Cleaning (Home Cleaning and Exterior)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="main_content">        
            <div class="about-syaanh-row-1 ">            
                <div class="col-about-1">
                    <div class="about-header">{{ __('frontend.about_jam') }}</div>
                    <p>Jam is a new home management platform that connects individuals for all service requirements with prompt, exceptional, and dependable services in Qatar. Our 24/7 service platform instantly connects you to certified handyman who can help you with odd tasks and errands so that you may be more productive each day. Jam ensures your improvement chores will be completed to the highest standards, and that you will leave with a grin on your face.</p>
                    <p><strong>Jam. Do more in less time</strong></p>
                    
                    <div class="about-col-image-1-mobile">
                        <img src="{{ asset('images/about__mobile_1.png') }}">
                    </div>                
                </div>
                <div class="about-col-image-1">
                    <img src="{{ asset('images/about_1.png') }} ">
                </div>
            </div>
            <div class="about-syaanh-row">
                <div class="col-about-1">
                    <div class="content">
                        <h2>Vision</h2>
                        <p>To empower people with their skills with the power of technology.</p>
                        <h2>Mission:</h2>
                        <p>To keep changing commerce related experiences through commitment to people system and technology. Lead the way in providing value to our customers and stakeholders by innovative solutions.</p>
                    </div>
                </div>
            </div>
            <div class="about-syaanh-row">
                <div class="col-about-1">
                    <div class="content">
                        <h2>Our Team:</h2>
                        <p>Jam has a superb team of qualified and experienced skilled staff with diverse skill sets that know how to address your maintenance issues. Our specialists get thorough training and are well-equipped to handle any service needs you may have, from basic to complex. Our technology connects consumers with professionals that meet their criteria and are accessible at the chosen time and day.</p>
                    </div>
                </div>
            </div>
            <div class="about-syaanh-row">
                <div class="col-about-1">
                    <div class="content">
                        <h2>Out Vetting Process:</h2>
                        <p>Jam will do all the hard work of researching, vetting, and adding reliable service providers on the platform. It will provide you with a seamless and efficient solutions to get things done quickly and hassle free.</p>
                    </div>
                </div>
            </div>
            <div class="about-syaanh-row">
                <div class="col-about-1">
                    <div class="content">
                        <h2>Services:</h2>
                        <p>Many homeowners complain that they have a difficult time finding a reputable company to help them with their home improvement services.</p>
                        <p>Jam is conceived to precisely solve this pain areas:</p>
                        <ul>
                            <li>Electrical</li>
                            <li>Plumbing</li>
                            <li>Air-conditioning</li>
                            <li>Masonry</li>
                            <li>Carpentry</li>
                            <li>Carpentry</li>
                            <li>Upholstery</li>
                            <li>Painting</li>
                            <li>Home Appliance maintenance</li>
                            <li>Pest Control</li>
                            <li>Cleaning (Home Cleaning and Exterior)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
</main>
<style>
.home-services-header {
    width: 100%;
    text-align: center;
    color: green;
}
</style>
@endsection