<div class="modal-header">
 	<h4 class="modal-title">
 		Book Appointmant
	</h4>
 	<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
	<form id="bookingForm" method="POST">
		@csrf 
		<input type="hidden" name="service_id" value="{{ $ServiceMapping->service_id }}">
		<input type="hidden" name="category_id" value="{{ $ServiceMapping->category_id }}">
		<input type="hidden" name="provider_id" value="0">
		<div class="msg_login"></div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>{{ __('frontend.primay_service') }}</label>
					<input type="text" name="service_id" class="form-control" value="{{ $service ? $service->name : '' }}" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>{{ __('frontend.secondry_service') }}</label>
					<input type="text" name="category_id" class="form-control" value="{{ $category ? $category->name : '' }}" disabled>
				</div>
			</div>
			{{-- <div class="col-md-4">
				<div class="form-group">
					<label>{{ __('frontend.price') }}</label>
					<input type="text" name="price" class="form-control" value="{{ $vendor->price }}" readonly>
				</div>
			</div> --}}
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>{{ __('frontend.name') }}</label>
					<input type="text" name="orderer_name" class="form-control required" value="{{ trim($customer->full_name) }}">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>{{ __('frontend.email') }}</label>
					<input type="text" name="email" class="form-control required" value="{{ $customer->email }}">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>{{ __('frontend.phone') }}</label>
					<input type="text" name="contact" class="form-control required" value="{{ $customer->contact }}">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>{{ __('frontend.date') }}</label>
					<input type="date" name="booking_date" class="form-control required" value="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>{{ __('frontend.start_time') }}</label>
					<input type="time" name="start_time" class="form-control required" value="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>{{ __('frontend.end_time') }}</label>
					<input type="time" name="end_time" class="form-control required" value="">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>{{ __('frontend.address_line') }} 1</label>
					<input type="text" name="address_line1" class="form-control required" value="{{ $customer->customerAddress ? $customer->customerAddress->address_line1 : '' }}">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>{{ __('frontend.address_line') }} 2</label>
					<input type="text" name="address_line2" class="form-control required" value="{{ $customer->customerAddress ? $customer->customerAddress->address_line2 : '' }}">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>{{ __('frontend.landmark') }}</label>
					<input type="text" name="landmark" class="form-control required" value="{{ $customer->customerAddress ? $customer->customerAddress->landmark : '' }}">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>{{ __('frontend.district') }}</label>
					<input type="text" name="district" class="form-control required" value="{{ $customer->customerAddress ? $customer->customerAddress->district : '' }}">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>{{ __('frontend.city') }}</label>
					<input type="text" name="city" class="form-control required" value="{{ $customer->customerAddress ? $customer->customerAddress->city : '' }}">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>{{ __('frontend.postal_code') }}</label>
					<input type="text" name="postal_code" class="form-control required" value="{{ $customer->customerAddress ? $customer->customerAddress->postal_code : '' }}">
				</div>
			</div>
		</div>
		<!--div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Location</label>
					<input type="text" name="location" class="form-control required" value="" id="location">
				</div>
			</div>
		</div-->
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>{{ __('frontend.remark') }}</label>
					<textarea name="remark" class="form-control"></textarea>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-danger">{{ __('frontend.book_appointmant') }} <i class="fa fa-spinner fa-spin" style="display: none;"></i></button>
	</form>
</div>

<script type="text/javascript">
function initialize() {
    var input = document.getElementById('location');
    var options = {
        componentRestrictions: {
            country: "sg"
        }
    };
    new google.maps.places.Autocomplete(input, options);
}
initialize();
</script>
<style>
#app input, #app textarea, .modal input, .modal textarea, #app input:focus, #app textarea:focus, .modal input:focus, .modal textarea:focus {
     outline: unset!important; 
     border: 1px solid #ccc; 
     box-shadow: 0px 6px 19px rgba(17, 33, 55, 0.06); 
}
</style>