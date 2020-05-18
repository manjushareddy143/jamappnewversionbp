<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>JAM</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 95vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>


    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/index') }}">@lang('home.home_menu')</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                            <a href="{{ url('/register') }}">Register</a>
                    @endauth


        
<div class="dropdown">
  <button class="dropbtn">Language<i class="fal fa-angle-down"></i> </button>
  <div class="dropdown-content">
  <a href="locale/en"><img src="{{asset('img/en.png')}}" alt="" style="width: 20px;height: 10px;"> English</a>
  <a href="locale/ar"><img src="{{asset('img/ar.png')}}" alt="" style="width: 20px;height: 10px;"> Arabic</a>
  </div>
</div>

                </div>
            @endif

            <div class="content">
              <!--   <div class="title m-b-md">
                    JAM
                </div> -->
                <div>
                    <img src="{{ URL::to('/') }}/img/logo/logo2.png" style="width: 50%;height: 50%;">
                <h1>@lang('home.message')</h1>
                </div>
            </div>
        </div>


 <footer class="row">
  <div id="copyright" class="flex-center">© Copyright 2020 JAM</div>
    </footer>
    </body>

</html>



<style>
.dropbtn {
  background-color: #0aa698;;
  color: white;
  padding: 4px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
  margin-right: 100px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>


