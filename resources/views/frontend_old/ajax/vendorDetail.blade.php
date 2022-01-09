<div class="modal-header">
 	<h4 class="modal-title">Vendor Profile</h4>
 	<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-3 text-center">
			<a class="red" href="tel:{{ $vendor->vendor ? $vendor->vendor->contact : '' }}">
				<i class="fa fa-phone red"></i>  Call
			</a>
		</div>
		<div class="col-md-6 text-center">
			<h3 style="margin:0;"><b>{{ $vendor->vendor ? $vendor->vendor->full_name : '' }}</b></h3>
		</div>
		<div class="col-md-3 text-center">
			<a data-id="{{ $vendor->id }}" data-type="vendorBooking" class="getServiceVendor red" href="javascript:void(0);">
				<i class="fa fa-calendar red"></i>  Book
			</a>
		</div>
	</div>
	<div class="row pt-4">
		<div class="col-md-12 text-center"><h4 style="margin:0;"><b>Mosaic Contracting</b></h4></div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-3 text-center">
			8 <br>Job Done
		</div>
		<div class="col-md-6 text-center">
			0 <i class="fa fa-star orange"></i> <br>Rating
		</div>
		<div class="col-md-3 text-center">
			2 Yr. Experience
		</div>
	</div>
	<hr>
	<div class="row">
		<ul>
			<li><i class="fa fa-user"></i> Male</li>
			<li><i class="fa fa-map-marker"></i> Doha Qatar</li>
			<li><i class="fa fa-book"></i> Arbic. English</li>
			<li><i class="fa fa-user"></i> Monday - Friday | 9:30AM - 6:30PM</li>
			<li><i class="fa fa-envelope"></i> customercare@jam-app.com</li>
			<li><i class="fa fa-cog"></i> Electrical Works - New Installation - Modafication - Maintenance, Air conditioner - New Installation</li>
		</ul>
	</div>
	<div class="text-center">
		<button type="button" data-id="{{ $vendor->id }}" data-type="vendorBooking" class="getServiceVendor btn btn-danger">{{ __('frontend.book_appointmant') }}</button>
	</div>
</div>

<style>
.orange{
	color: orange;
}
.red{
	color: red;
}
ul{
	padding-left: 28px;
}
li{
	list-style: none;
}
li i{
	margin-right: 15px;
}
</style>