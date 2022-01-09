<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="https://staging.jam-app.com/demo/public/frontend/assets/icons/jam_fav.png">
    <title>{{ __('frontend.get_the_app_title') }}</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <meta name="description " content="Repair your home in Qatar easily, Jam-app.com is your mobile app for home maintenance services, cleaning, Plumbing, AC maintenance, painting, decor, Pest control, Electricity and more," >

    <meta name="keywords" content = "home, house, home care, Qatar, plumber service, commercial electrical services, electrical services, service center,Repair, fix, maintenance, cleaning company, cleaning, painting, decor, in Doha, maintenance+Qatar, pest control, transfer, ac maintenance, furniture, Furniture+transfer, laundry, Air condition, carpenter,  repairing, app, satellite, dish, service+Qatar,  gardening, garden, home décor,">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    


    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontello-embedded.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    
    <link href="{{ asset('frontend/assets/css/style1.css') }}" rel="stylesheet">

    <!-- Facebook Pixel Code -->
       
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->
</head>
<body>
    <!-- <script type="text/javascript" language="javascript">
  // function myIP() {
    if (window.XMLHttpRequest)
   xmlhttp = new XMLHttpRequest();
    else
   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.open("GET","http://jsonip.appspot.com/",false);
    xmlhttp.send();

    hostipInfo = xmlhttp.responseText;
    obj = JSON.parse(hostipInfo);
    alert(obj)
    // document.getElementById("IP").value=obj.ip;
    // document.getElementById("ADDRESS").value=obj.address;
// }
</script> -->
    <header>
        <nav class="navbar-default no_background_color">
            <div class="container">
                <div class="navbar-header no_margin">
                    <button aria-expanded="false" class="navbar-toggle collapsed top_change" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" type="button">
                        <span class="sr-only">{{ __('frontend.toggle_navigation') }}</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="https://staging.jam-app.com/demo/public/getTheApp">
                        <img alt="Jam LOGO" src="https://staging.jam-app.com/demo/public/images/jamlogo.png" class="syaanh-logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse navbar_header pull-right" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right padding_25">
                        <!-- <li class="cl-effect-13">
                            <a href="#" class="nav_li font_changes company_register">Service provider register</a>
                        </li> -->
                        <li class="get_the_app" style="margin-right: 5px;">
                            <a href="#" class="nav_li font_changes nav_active">{{ __('frontend.download_app') }}</a>
                        </li>
                        <li class="get_the_app" >
                            <a  href="#" class="nav_li font_changes nav_active">{{ __('frontend.companies_app') }}</a>
                        </li>
                        <li>
                            <!-- <div class="dropdown transition"> -->

                            <!--    <button aria-expanded="false" aria-haspopup="true" class="btn dropdown-toggle" data-toggle="dropdown" id="dropdownMenu1" type="button">EN</button> -->
                                <!-- <div aria-labelledby="dropdownMenu1" class="dropdown-menu"> -->
                                    <a class="down dropdown-item lang_change" href="#">عربي</a>
                                <!-- </div> -->
                            <!-- </div> -->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="background-img">
            <div class="container margin_t_60">
                <div class="header-content row">
                    <div class="col-md-5 col-sm-12 col-xs-12 left_content txt_color padding_t_30 slideanim first_block auto_slide">
                        <div class="first_title">
                            <span class="title header_txt_color">{{ __('frontend.the_convenient_fast_way') }}</span>
                        </div>
                        <div class="padding-b-20">
                            <span class="small-title txt_color">{{ __('frontend.to_get_things_done_around_the_house') }}</span>
                        </div>
                        <div class="padding-b-30">
                            <span class="under-title txt_color_grey">
                                {{ __('frontend.hundreds_are_submitting_daily') }}
                            </span>
                        </div>
                        <a class="company txt_color" href="#get-app">{{ __('frontend.Get_App') }}</a>
                    </div>
                    <div class="col-md-7 col-sm-12 header_image">
                        <img alt="mobile photo" class="img-responsive img-mobile" src="{{ asset('/images/header_screens_en_new.png') }}">
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </header>
    <section class="save">
        <div class="container size_change">
            <div class="row">
                <div class="col-sm-3 slideanim auto_slide">
                    <div class="text-center p_20 transition">
                        <span>
                            <img src="{{ asset('/images/ic_1.png') }}" class="ic_0">
                        </span>
                        <p class="small-title">{{ __('frontend.trusted_services') }}</p>
                        <p class="under-title">{{ __('frontend.all_of_technicians') }}</p>
                    </div>
                </div>
                <div class="col-sm-3 slideanim auto_slide">
                    <div class="text-center p_20 transition">
                        <span>
                            <img src="{{ asset('/images/ic_2.png') }}" class="ic_0">
                        </span>
                        <p class="small-title">{{ __('frontend.save_time_and_money') }}</p>
                        <p class="under-title">{{ __('frontend.compare_tens_of_offers') }}</p>
                    </div>
                </div>
                <div class="col-sm-3 slideanim auto_slide">
                    <div class="text-center p_20 transition">
                        <span>
                            <img src="{{ asset('/images/ic_3.png') }}" class="ic_0">
                        </span>
                        <p class="small-title">{{ __('frontend.client_and_agent_chat') }}</p>
                        <p class="under-title">{{ __('frontend.chat_with_companies_about') }}</p>
                    </div>
                </div>
                <div class="col-sm-3 mt_md_30 slideanim auto_slide">
                    <div class="text-center p_20 transition">
                        <span>
                            <img src="{{ asset('/images/ic_4.png') }}" class="ic_0">
                        </span>
                        <p class="small-title">{{ __('frontend.rate_your_experience') }}</p>
                        <p class="under-title">{{ __('frontend.we_care_about_your_ratings') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="how-work">
        <div class="container size_change display">
            <div class="row padding_15">
                <div class="services serv slideanim">
                    <div class="width-100 steps">
                        <div class="step text-center line-hover" data-step="1">{{ __('frontend.step') }} 1</div>
                        <div class="step text-center line-hover" data-step="2">{{ __('frontend.step') }} 2</div>
                        <div class="step text-center line-hover" data-step="3">{{ __('frontend.step') }} 3</div>
                        <div class="step text-center line-hover" data-step="4">{{ __('frontend.step') }} 4</div>
                    </div>
                    <div class="width-33 steps">
                        <span class="half"></span>
                        <div class="line-hover hover-dot" data-step="1" data-id="1">
                            <img src="{{ asset('/images/normal_dot.png') }}" class="normal_dot">
                            <img src="{{ asset('/images/Hover_dot.png') }}" class="hover_dot">
                        </div>
                        <span class="half"></span>
                        <span class="half"></span>
                        <div class="line-hover hover-dot" data-step="2" data-id="2">
                            <img src="{{ asset('/images/normal_dot.png') }}" class="normal_dot">
                            <img src="{{ asset('/images/Hover_dot.png') }}" class="hover_dot">
                        </div>
                        <span class="half"></span>
                        <span class="half"></span>
                        <div class="line-hover hover-dot" data-step="3" data-id="3">
                            <img src="{{ asset('/images/normal_dot.png') }}" class="normal_dot">
                            <img src="{{ asset('/images/Hover_dot.png') }}" class="hover_dot">
                        </div>
                        <span class="half"></span>
                        <span class="half"></span>
                        <div class="line-hover hover-dot" data-step="4" data-id="4">
                            <img src="{{ asset('/images/normal_dot.png') }}" class="normal_dot">
                            <img src="{{ asset('/images/Hover_dot.png') }}" class="hover_dot">
                        </div>
                        <span class="half"></span>
                    </div>
                    <div class="steps-text steps">
                        <div class="graph-text line-hover" data-step="1">
                            <span class="graph-text-header">{{ __('frontend.add_order') }}</span><br>
                            <span class="font-size-16">{{ __('frontend.fill_order_details_and_send') }}</span>
                        </div>
                        <div class="graph-text line-hover" data-step="2">
                            <span class="graph-text-header">{{ __('frontend.receive_offer') }}s</span><br>
                            <span class="font-size-16">{{ __('frontend.offers_including_time_price_warranty') }}</span>
                        </div>
                        <div class="graph-text line-hover" data-step="3">
                            <span class="graph-text-header">{{ __('frontend.choose_best_offer') }}</span><br>
                            <span class="font-size-16">{{ __('frontend.your_number_will_be_displayed_to_service') }}</span>
                        </div>
                        <div class="graph-text line-hover" data-step="4">
                            <span class="graph-text-header">{{ __('frontend.service_completed') }}</span><br>
                            <span class="font-size-16">{{ __('frontend.rate_service_provider_based_on_his_price') }}</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="services height-444 slideanim">
                    <img src="{{ asset('/images/image2.jpg') }}" class="screen_animation">
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
    <section class="how-work">
        <div class="container our_services">
            <h1 class="services_we_provide text-center"> <span class="arabic"></span> {{ __('frontend.home_maintenance_services') }}</h1>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 slideanim">
                    <div class="p_10 transition">
                    <img src="{{ asset('/images/repair@2x.png') }}" class="img-responsive images_padding">
                    <div class="repair text-center">{{ __('frontend.home_repair_services') }}</div>
                    <div class="maintenance text-center">{{ __('frontend.a_smarter_way_to_keep_up_with_home_maintenance') }}</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 slideanim">
                    <div class="p_10 transition">
                    <img src="{{ asset('/images/pest_control@2x.png') }}" class="img-responsive images_padding">
                    <div class="repair text-center">{{ __('frontend.pest_control_services') }}</div>
                    <div class="maintenance text-center">{{ __('frontend.we_provide_professional_pest_control_services_for') }}</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 slideanim">
                    <div class="p_10 transition">
                    <img src="{{ asset('/images/maintenance@2x.png') }}" class="img-responsive images_padding">
                    <div class="repair text-center">{{ __('frontend.ac_maintenance_services') }}</div>
                    <div class="maintenance text-center">{{ __('frontend.offers_flexible_solutions_for_installation') }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 slideanim">
                    <div class="p_10 transition">
                    <img src="{{ asset('/images/carpenter@2x.png') }}" class="img-responsive images_padding">
                    <div class="repair text-center">{{ __('frontend.carpentry_services') }}</div>
                    <div class="maintenance text-center">{{ __('frontend.our_professional_carpenters_will_redesign_your_home') }}</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 slideanim">
                    <div class="p_10 transition">
                    <img src="{{ asset('/images/plumber@2x.png') }}" class="img-responsive images_padding">
                    <div class="repair text-center">{{ __('frontend.plumbing_services') }}</div>
                    <div class="maintenance text-center">{{ __('frontend.are_you_having_issues_with_your_faucets_and_sinks') }}
                    </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 slideanim">
                    <div class="p_10 transition">
                    <img src="{{ asset('/images/electrical@2x.png') }}" class="img-responsive images_padding">
                    <div class="repair text-center">{{ __('frontend.electrical_services') }}</div>
                    <div class="maintenance text-center">{{ __('frontend.we_provide_the_best_residential_and_commercial_electrical_services') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="get-app" id="get-app">
        <div class="container">
            <p class="small-title text-center download-app slideanim">
                {{ __('frontend.download') }} App
            </p>
            
            <div class="get-content">
                <div class="row no_margin">
                    <div class="col-sm-12 app_box margin_b_20 slideanim">
                        <div class="client_border">
                            <span class="person">
                                <img src="{{ asset('/images/client_app_ico.png') }}" class="apps">
                            </span>
                            <div class="client_border_content">
                                <span>
                                    {{ __('frontend.from_home_repairs_cleaning_to_errands_delivering') }} 
                                </span>
                                <div class="button_block">
                                    <a href="#" target="_blank">
                                        <img  src="{{ asset('/images/app-store.png') }}">
                                    </a>
                                    <a href="#" target="_blank">
                                        <img  src="{{ asset('/images/google-play.png') }}">
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container padding-b-30">
            <!-- <div class="row">
                <ul style="  margin-left: 50px;   margin-right: 50px !important;" class="nav navbar-nav navbar-right padding_25">
                    <li class="get_the_app" >
                        <a  href="apps/agent" class="nav_li font_changes nav_active">
                            {{ __('frontend.download_companies_app') }}
                        </a>
                    </li>
                    <li>

                    </li>
                </ul>
            </div> -->
            <!--div class="row">
                <div class="col-md-6 slideanim rights">
                    <div class="logo">
                        <div class="pull-left float_none">
                            <a href="#" class="transition_none">
                                <img src="{{ asset('/images/footer-logoen.png') }}" class="footer_logo">
                            </a>
                        </div>
                        <div class="pull-left float_none">
                            <p class="under-title pl_40 font-size-13">
                                {{ __('frontend.copyright2') }}
                            </p>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-md-6 slideanim div_center pull-right">
                    <div class="pull-left float_none under_text line_height">
                        <span class="margin_none">{{ __('frontend.a_product_by') }}</span>
                    </div>
                    <div class="pull-left line_height">
                        <a href="#" target="_blank" class="transition_none" target="_blank"><img src="{{ asset('/images/ebdaa_logo.png') }}" class="ebdaa_logo"></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div-->
        </div>
        <div class="container how-work content_width">
            <div class="col-sm-6 col-xs-12 sitemap slideanim">
                <div class="padding-b-10 footer-header-div">
                    <span class="footer-header p-left-10">{{ __('frontend.sitemap') }}</span>
                </div>
                <ul class="col-sm-4 col-xs-12 no_padding list_style">
                    <li><a href="#" target="_blank">{{ __('frontend.android_app') }}</a></li>
                    <li><a href="#" target="_blank">{{ __('frontend.iOS_app') }}</a></li>
                    <li><a href="{{ url('/privacy-policy') }}" >{{ __('frontend.privacy_policy') }}</a></li>
                    <li><a href="{{ url('#/privacy-terms') }}" >{{ __('frontend.terms_and_condition') }}</a></li>
                    <li><a href="{{ url('/contact-us') }}" >{{ __('frontend.contact_us') }}</a></li>
                </ul>
                <!-- full footer sitemap URL's
                <ul class="col-xs-4 font-size-14 no_padding list_style">
                    <li><a href="https://play.google.com/store/apps/details?id=com.ebdaadt.syaanhclient">Android app</a></li>
                    <li><a href="https://itunes.apple.com/us/app/syaanh-%D8%B5%D9%8A%D8%A7%D9%86%D9%87/id1105102444?mt=8">iOS app</a></li>
                </ul>
                <ul class="col-xs-4 font-size-14 no_padding list_style">
                    <li><a href="#">Privacy policy</a></li>
                    <li><a href="#">Terms of use</a></li>
                    <li><a href="#">Copyrights</a></li>
                </ul>
                <ul class="col-xs-4 font-size-14 no_padding list_style">
                    <li><a href="#">Agent register</a></li>
                    <li><a href="#">How to use</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul> -->
            </div>
            <!-- <div class="col-sm-2 col-xs-12 slideanim" style="text-align: center;">
                <a href="#"><img src="http://www.theqa.qa/badge/c6057354-7da3-43f1-9a29-9f317b70f01b.svg" alt="trustmark-badge" width="200"></a>
            </div> -->
            <div class="col-sm-6 col-xs-12 slideanim">
                <div class="pull-right stay-connected text-center">
                    <div class="margin_l_13">
                        <span class="footer-header">{{ __('frontend.stay_connected') }}</span>
                    </div>
                        <ul class="footer-icons margin_t_50">
                            <li>
                                <a href="#" target="_blank"><i class="icon-facebook footer-icon"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="icon-twitter footer-icon"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="icon-youtube footer-icon"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="icon-instagram footer-icon"></i></a>
                            </li>
                            <div class="clearfix"></div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- <a href="http://www.theqa.qa/certificates/details/c6057354-7da3-43f1-9a29-9f317b70f01b"><img src="http://www.theqa.qa/badge/c6057354-7da3-43f1-9a29-9f317b70f01b.svg" alt="trustmark-badge" width="200"></a> -->
    </footer>
    <style type="text/css">
        @media  only screen and (max-width: 705px){
            footer .get_the_app{
                display: none!important;
            }

            footer .logo .pull-left:first-child{
                display: none!important;
            }
        }
        @media  only screen and (max-width: 640px){
            .person{
                display: none!important;
            }
            .client_border_content{
                width: 100%;
            }
            .client_border_content span{
                display: none!important;
            }
            .button_block{
                    width: 100%;
                    padding: 0;
                    justify-content: center;
            }
            .client_border{
                padding: 30px 0;
                justify-content: center;
            }
            .button_block a:first-child{
                margin-left: 0;
            }
        }
        @media  only screen and (max-width:360px){
            .button_block{
                flex-direction: column;
            }
            .button_block a{
                margin-left: 0;
            }
            .button_block a:first-child{
                margin-bottom: 15px;
            }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    

</body>
</html>
