@extends('frontend.default')
@section('content')

<!-- Slider Home-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <!-- <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol> -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="https://staging.jam-app.com/demo/public/frontend/assets/banners/app_download_1440.jpg" alt="Los Angeles" style="width:100%;">
            <div class="carousel-caption">
                <h1>JAM</h1>
                <h3>WELCOME TO JAM APP</h3>
                <p>Offer of the Month</p>
            </div>
        </div>

        <div class="item">
            <img src="https://staging.jam-app.com/demo/public/frontend/assets/banners/app_download_1440.png" alt="Chicago" style="width:100%;">
            <div class="carousel-caption">
                <h1>JAM</h1>
                <h3>FREE CONSULTATION</h3>
                <p>Book us Today</p>
            </div>
        </div>
    
        <div class="item">
            <img src="https://staging.jam-app.com/demo/public/frontend/assets/banners/app_download_1440.jpg" alt="New York" style="width:100%;">
            <div class="carousel-caption">              
                <h1>JAM</h1>
                <h3>STAY SAFE CALL OR BOOK US FOR FREE VISIT</h3>
                <p>Book us today on App from our list of services.</p>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- End Slider Home-->

<main class="custom_main">
    <div id="main_content">
        <div class="home-services">
            <div class="home-services-header">
                {{ __('frontend.select_maintenance_service') }}
            </div>
            <div class="best-price">
                {{ __('frontend.then_receive_offers_include_price_from_our_service_providers') }}
            </div>
            <div class="home-services-icons">
                @foreach($services as $service)
                    <a href="{{ route('customer.sub-services',$service->id) }}">
                        <div class="service">
                            <div class="icon">
                                <img src="{{ isset($service->icon_image) ? asset($service->icon_image) : asset('images/placeholder.jpg') }}" alt="">
                            </div>
                            <div class="description">
                                <span class="help-block">
                                    {{ (session()->get('locale') == null || session()->get('locale') == 'en') ? $service->name : $service->arabic_name }}
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <!--application sec-->
        <div class="application">
            <h2 class="title">What will Jam Application Do: </h2>
            <div class="content">
                <p>Jam Application will do all the hard work of researching, vetting, and adding reliable service providers on the platform. It will provide you with a seamless and efficient solutions to get things done quickly and hassle free.</p>
                <p>The best play for people and businesses to outsource any task, any time.</p>
            </div>
        </div>
        <!--//application sec-->
        <!--How it Works-->
        <div class="works">
            <h2 class="title">How it Works?</h2>
            <div class="content">
                <div class="works-box">
                    <div class="work-item">
                        <img src="https://staging.jam-app.com/demo/public/images/category/garden.png" alt=""><br>
                        <p>Choose a service that you require or need it done.</p>
                    </div>
                    <div class="work-item">
                        <img src="https://staging.jam-app.com/demo/public/images/category/garden.png" alt=""><br>
                        <p>Choose the best person for your task. Look at profiles, reviews, and offers. Once booked, call, or message our tasker through our in-built chat or call service.</p>
                    </div>
                    <div class="work-item">
                        <img src="https://staging.jam-app.com/demo/public/images/category/garden.png" alt=""><br>
                        <p>With your task completed, you just need to release the payment. Then you’re free to leave a review so everyone can know what a great job they’ve done.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--//How it Works-->
        <div class="works process">
            <h2 class="title text-center">Our Process is Simplified?</h2>
            <div class="content">
                <div class="works-box">
                    <div class="work-item">
                        <img src="{{ asset('/frontend/assets/images/download.jpg')}}" alt=""><br>
                        <p>Download Application or Visit Website and Create a Profile.</p>
                    </div>
                    <div class="work-item">
                        <img src="{{ asset('/frontend/assets/images/search.jpg')}}" alt=""><br>
                        <p>Search the task that you want to get it done.</p>
                    </div>
                    <div class="work-item">
                        <img src="{{ asset('/frontend/assets/images/phone-in-hand.png')}}" alt=""><br>
                        <p>Select the tasker you want.</p>
                    </div>
                    <div class="work-item">
                        <img src="{{ asset('/frontend/assets/images/Prioritisation-by-Freepik.png')}}" alt=""><br>
                        <p>Get your job done.</p>
                    </div>
                    <div class="work-item">
                        <img src="{{ asset('/frontend/assets/images/feedback.jpg')}}" alt=""><br>
                        <p>Get your job done and leave feedback for your tasker.</p>
                    </div>
                </div>
            </div>
        </div>

        <!--//How it Works-->

        <div class="download-links ">
            <div class="app-links">
                <div class="download-header">{{ __('frontend.app_link') }}</div>
                <div class="client-agent-link-icons">
                    <div class="client-link-icons">
                        <div class="client-header">{{ __('frontend.client_app') }}</div>
                        <a href="#" target="_blank" class="client-ios-link app-links-img">
                            <img src="{{ asset('frontend/assets/images/app_store.png') }}">
                            <!-- <img src="{{ asset('frontend/assets/images/apple_store.png') }}"> -->
                        </a>
                        <a href="#" target="_blank" class="client-android-link app-links-img">
                            <img src="{{ asset('frontend/assets/images/gapy.png') }}">
                            <!-- <img src="{{ asset('frontend/assets/images/google_play.png') }}"> -->
                        </a>
                    </div>
                    <div class="agent-link-icons">
                        <div class="client-header">{{ __('frontend.provider_app') }}</div>
                        <a href="#" target="_blank" class="agent-ios-link app-links-img">
                            <img src="{{ asset('frontend/assets/images/app_store.png') }}">
                        </a>
                        <a href="#" target="_blank" class="agent-android-link app-links-img">
                            <img src="{{ asset('frontend/assets/images/gapy.png') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--//downloads-->
    </div>
</main>
@endsection