@extends('frontend.default')
@section('content')

<main class="custom_main">
    <div id="main_content">
        <div class="home-services">
            <div class="home-services-header">
            	{{ (session()->get('locale') == null || session()->get('locale') == 'en') ? $service->name : $service->arabic_name }} / {{ (session()->get('locale') == null || session()->get('locale') == 'en') ? $subCategories->name : $subCategories->arabic_name }}
            </div>
            <div class="w-100">
            	@if($serviceVendors->count() > 0)
            		@foreach($serviceVendors as $vendor)
	                    <div class="row pb-4" style="border-bottom: 1px solid gray;">
							<div class="col-md-4">
								<h3>
									{{ $vendor->vendor ? $vendor->vendor->first_name.' '.$vendor->vendor->last_name : '' }}
								</h3>
							</div>
							<div class="col-md-5">
								<h5>Mosaic Contracting</h5>
								<p>Experience 2 years</p>
							</div>
							<div class="col-md-3 text-right">
								<div>
									<a data-id="{{ $vendor->id }}" data-type="vendorDetail" class="getServiceVendor" href="javascript:void(0);">
										<i class="fa fa-star"></i> 
										<span class="text-danger" style="margin-left: 23px;">0/5</span>
									</a>
								</div>
								<div>
									<a href="tel:{{ $vendor->vendor ? $vendor->vendor->contact : '' }}">
										<i class="fa fa-phone"></i> 
										<span class="text-danger" style="margin-left: 20px;">{{ __('frontend.call') }}</span>
									</a>
								</div>
								<div>
									<a data-id="{{ $vendor->id }}" data-type="vendorBooking" class="getServiceVendor" href="javascript:void(0);">
										<i class="fa fa-calendar"></i> 
										<span class="text-danger" style="margin-left: 10px;">{{ __('frontend.book') }}</span>
									</a>
								</div>
							</div>
						</div>
					@endforeach
                @else
                	<div style="width: 100%;">
                		<p class="text-center text-danger">{{ __('frontend.no_service_venodr_found') }}</p>
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