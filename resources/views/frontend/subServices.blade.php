@extends('frontend.default')
@section('content')

<main class="custom_main">
    <div id="main_content">
        <div class="home-services">
            <div class="home-services-header">
                {{ (session()->get('locale') == null || session()->get('locale') == 'en') ? $service->name : $service->arabic_name }}
            </div>
            <div class="home-services-icons">
                @if($subServices->count() > 0)
                    @foreach($subServices as $subService)
                        <a href="javascript:void(0);" data-id="{{ $subService->id }}" data-type="vendorBooking" class="getServiceVendor">
                            <div class="service">
                                <div class="icon">
                                    <img src="{{ $subService->subService ? ($subService->subService->image ? asset($subService->subService->image) : asset('images/placeholder.jpg')) : '' }}">
                                </div>
                                <div class="description">
                                    <span class="help-block">
                                        {{ $subService->subService ? ((session()->get('locale') == null || session()->get('locale') == 'en') ? $subService->subService->name  :  $subService->subService->arabic_name): '' }}
                                    </span>
                                </div>
                                <div>
                                    <i class="fa fa-calendar"></i> 
                                    <span class="text-danger" style="margin-left: 10px;">{{ __('frontend.book') }}</span>
                                </div>
                                    
                            </div>
                        </a>
                            
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

<!--vendor list Modal -->
<div class="modal fade" id="vendorListModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="vendor_listing">
            
        </div>
    </div>
</div>

<!--vendor detail Modal -->
<div class="modal fade" id="vendorDetailModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" id="vendor_detail">
            
        </div>
    </div>
</div>


@endsection