@extends('frontend.default')
@section('content')

<main class="custom_main">
    <div id="main_content">
        <div class="home-services">
            <div class="home-services-header">
                
            </div>
            <div class="home-services-icons">
                @if($services->count() > 0)
                    @foreach($services as $service)                     	
                    <?php $subServices = App\ServiceMapping::where('service_id', $service->id)->get(); ?>
                    @if($subServices->count() > 0)
                    		@foreach($subServices as $subService)
                        <a href="{{ url('service/vendors/'.$service->id.'/'.$subService->category_id) }}">
                            <div class="service">
                                <div class="icon">
                                    <img src="{{ $subService->subService ? ($subService->subService->image ? asset($subService->subService->image) : asset('images/placeholder.jpg')) : '' }}">
                                </div>
                                <div class="description">
                                    <span class="help-block">
                                        {{ $subService->subService ? ((session()->get('locale') == null || session()->get('locale') == 'en') ? $subService->subService->name  :  $subService->subService->arabic_name): '' }}
                                    </span>
                                </div>
                            </div>
                        </a>
                         @endforeach
                         @endif
                    @endforeach
                @else
                    <div style="width: 100%;">
                        <p class="text-center text-danger">{{ __('frontend.no_sub_services_found') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>

@endsection