@extends('frontend.default')
@section('content')

<main class="custom_main">
    <div id="main_content">
        <div class="home-services">
            <div class="home-services-header">
            	<h1>{{ __('frontend.my_account') }}</h1>
            </div>
    	 	<div  class="col-md-12">
		        <hr/>
		        <div class="col-md-2"> 
					<ul class="nav nav-tabs tabs-left sideways">
						<li class="active"><a href="#profile" data-toggle="tab">{{ __('frontend.profile') }}</a></li>
						<li><a href="#booking" data-toggle="tab">{{ __('frontend.booking') }}</a></li>
						<!-- <li><a href="#password_change" data-toggle="tab">Password Change</a></li> -->
					</ul>
		        </div>

		        <div class="col-md-10" style="border-left: 1px solid #ddd;">
		          	<div class="tab-content">
			            <div class="tab-pane active" id="profile">
			            	<div class="row pb-4">
			            		<div class="col-md-3">
			            			<label>{{ __('frontend.name') }}</label>
			            			<input type="text" class="form-control" value="{{ Auth::user()->full_name }}" disabled>
			            		</div>
			            		<div class="col-md-3">
			            			<label>{{ __('frontend.email') }}</label>
			            			<input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
			            		</div>
			            		<div class="col-md-3">
			            			<label>{{ __('frontend.phone') }}</label>
			            			<input type="text" class="form-control" value="{{ Auth::user()->contact }}" disabled>
			            		</div>
			            		<div class="col-md-3">
			            			<label>{{ __('frontend.gender') }}</label>
			            			<input type="text" class="form-control" value="{{ Auth::user()->gender }}" disabled>
			            		</div>
			            	</div>

			            	<div class="row pb-4">
			            		<div class="col-md-3">
			            			<label>{{ __('frontend.address_line') }} 1</label>
			            			<input type="text" class="form-control" value="{{ Auth::user()->customerAddress ? Auth::user()->customerAddress->address_line1 : '' }}" disabled>
			            		</div>
			            		<div class="col-md-3">
			            			<label>{{ __('frontend.address_line') }} 2</label>
			            			<input type="text" class="form-control" value="{{ Auth::user()->customerAddress ? Auth::user()->customerAddress->address_line2 : '' }}" disabled>
			            		</div>
			            		<div class="col-md-3">
			            			<label>{{ __('frontend.landmark') }}</label>
			            			<input type="text" class="form-control" value="{{ Auth::user()->customerAddress ? Auth::user()->customerAddress->landmark : '' }}" disabled>
			            		</div>
			            		<div class="col-md-3">
			            			<label>{{ __('frontend.district') }}</label>
			            			<input type="text" class="form-control" value="{{ Auth::user()->customerAddress ? Auth::user()->customerAddress->district : '' }}" disabled>
			            		</div>
			            	</div>

			            	<div class="row pb-4">
			            		<div class="col-md-3">
			            			<label>{{ __('frontend.city') }}</label>
			            			<input type="text" class="form-control" value="{{ Auth::user()->customerAddress ? Auth::user()->customerAddress->city : '' }}" disabled>
			            		</div>
			            		<div class="col-md-3">
			            			<label>{{ __('frontend.postal_code') }}</label>
			            			<input type="text" class="form-control" value="{{ Auth::user()->customerAddress ? Auth::user()->customerAddress->postal_code : '' }}" disabled>
			            		</div>
			            	</div>
			            	<div class="row pb-4">
			            		<div class="col-md-12">
			            			<label>{{ __('frontend.address') }}</label>
			            			<input type="text" class="form-control" value="{{ Auth::user()->customerAddress ? Auth::user()->customerAddress->full_address : '' }}" disabled>
			            		</div>
			            	</div>
			            </div>
			            <div class="tab-pane" id="booking">
			            	<div id="exTab2">	
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#previous" data-toggle="tab">{{ __('frontend.previous') }}</a>
									</li>
									<li>
							        	<a  href="#current" data-toggle="tab">{{ __('frontend.completed') }}</a>
									</li>
								</ul>

								<div class="tab-content">
								  	<div class="tab-pane active" id="previous">
					          			<!-- <h3>Completed Booking</h3> -->
					          			<div class="table-responsive pt-5">
					          				<table class="table">
					          					<thead>
					          						<tr>
					          							<th>{{ __('frontend.name') }}</th>
					          							<th>{{ __('frontend.booking_date') }}</th>
					          							<th>{{ __('frontend.start_time') }}</th>
					          							<th>{{ __('frontend.end_time') }}</th>
					          							<th>{{ __('frontend.provider') }}</th>
					          							<th>{{ __('frontend.status') }}</th>
					          							<th>Action</th>
					          						</tr>
					          					</thead>
					          					<tbody>
					          						@foreach($bookings as $booking)
													  
					          							@if($booking->status!=7)
							          						<tr>
							          							<td>{{ $booking->orderer_name }}</td>
							          							<td>{{ $booking->booking_date }}</td>
							          							<td>{{ $booking->start_time }}</td>
							          							<td>{{ $booking->end_time }}</td>
							          							<td>{{ $booking->provider ? $booking->provider->full_name  : 'Waiting for vendor'}}</td>
							          							<td>
							          								<?php 
							          								$status = '';
							          								if($booking->status==1) {
							          									$status = 'Pending';
							          								}elseif($booking->status==2) {
							          									$status = 'Accepted by JamApp';
							          								}elseif($booking->status==3) {
							          									$status = 'Accepted by vendor';
							          								}elseif($booking->status==4) {
							          									$status = 'Cancel by JamApp';
							          								}elseif($booking->status==5) {
							          									$status = 'Cancel by Vendor';
							          								}elseif($booking->status==6) {
							          									$status = 'Invoice Submitted';
							          								}elseif($booking->status==7) {
							          									$status = 'Completed';
							          								}elseif($booking->status==8) {
							          									$status = 'Waiting for vendor';
							          								}elseif($booking->status==9) {
							          									$status = 'Rejected by you';
							          								}
							          								?>
							          								{{ $status }}
							          							</td>
																  <td>
																	  @if ($booking->status==6)
																	  	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#paynow{{ $booking->id }}">Pay Now</button>

																		  																	  <!--vendor list Modal -->
<div class="modal" id="paynow{{ $booking->id }}">
    <div class="modal-dialog">
            <!-- Modal content-->
    <div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Quotation</h4>
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			<form>
				
				<div class="row">
				<div class="col-md-4 float-l">
				<div class="form-group">
				<label for="quantity">Service Price:</label><br>
				<p>{{ $booking->invoice->service_price }}</p>
				</div>
				</div>
				<div class="col-md-4 float-l">
				<div class="form-group">
				<label for="quantity">Working Hours:</label><br>
				<p>{{ $booking->invoice->working_hr }}</p>
				</div>
				</div>
				<div class="col-md-4 float-l">
				<div class="form-group">
				<label for="quantity">Material Quantity:</label><br>
				<p>{{ $booking->invoice->material_quantity }}</p>
				</div>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 float-l">
				<div class="form-group">
				<label for="quantity">Material Cost:</label><br>
				<p>{{ $booking->invoice->material_price }}</p>
				</div>
				</div>
				<div class="col-md-6 float-l">
				<div class="form-group">
				<label for="quantity">Discount:</label><br>
				<p>{{ $booking->invoice->discount }}%</p> 
				</div>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 float-l">
				<div class="form-group">
				<label for="quantity">TAX:</label><br>
				<p>{{ $booking->invoice->tax }}</p>
				</div>
				</div>
				<div class="col-md-6 float-l">
				<div class="form-group">
				<label for="quantity">Additional Charge:</label><br>
				<p>{{ $booking->invoice->additional_charges }}</p>
				</div>
				</div>
				<div class="col-md-12 float-l">
				<div class="form-group">
				<label for="quantity">$Total Cost:</label><br>
				@php
					$serviceAmount = $booking->invoice->working_hr * $booking->invoice->service_price; // 5

					$meterialAmount = $booking->invoice->material_quantity * $booking->invoice->material_price; // 10

					$additional_total = $booking->invoice->additional_charges * $booking->invoice->working_hr; // 10

					$sub_total = $serviceAmount + $additional_total + $meterialAmount;  // 70

					$total_discount = $sub_total - (($booking->invoice->discount * 100 )/100); // 60

					$taxCut =  ($total_discount * $booking->invoice->tax)/100;

					$total = $total_discount + $taxCut;
				@endphp
				<p>{{ $total }}</p>
				</div>
				</div>
				</div>

		</form>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-danger cancelByUser" bookingId="{{ $booking->id }}">Reject</button>
		  <button type="button" class="btn btn-info acceptandpay" bookingId="{{ $booking->id }}">Accept And Pay</button>
		</div>
	  </div>
    </div>
</div>
																	  @endif

																	  

																  </td>
							          						</tr>
						          						@endif
					          						@endforeach
					          					</tbody>
					          				</table>
					          			</div>
									</div>
									<div class="tab-pane" id="current">
					          			<!-- <h3>Previous Booking</h3> -->
					          			<div class="table-responsive pt-5">
					          				<table class="table">
					          					<thead>
					          						<tr>
					          							<th>{{ __('frontend.name') }}</th>
					          							<th>{{ __('frontend.booking_date') }}</th>
					          							<th>{{ __('frontend.start_time') }}</th>
					          							<th>{{ __('frontend.end_time') }}</th>
					          							<th>{{ __('frontend.provider') }}</th>
					          							<th>{{ __('frontend.status') }}</th>
					          						</tr>
					          					</thead>
					          					<tbody>
					          						@foreach($bookings as $booking)
					          							@if($booking->status==7)
							          						<tr>
							          							<td>{{ $booking->orderer_name }}</td>
							          							<td>{{ $booking->booking_date }}</td>
							          							<td>{{ $booking->start_time }}</td>
							          							<td>{{ $booking->end_time }}</td>
							          							<td>{{ $booking->provider ? $booking->provider->full_name  : ''}}</td>
							          							<td>{{ $booking->status==7 ? 'Completed'  : '' }}</td>
							          						</tr>
						          						@endif
					          						@endforeach
					          					</tbody>
					          				</table>
					          			</div>
									</div>
								</div>
						  	</div>
			            </div>
			            <!-- <div class="tab-pane" id="password_change"></div> -->
		          	</div>
		        </div>
	      	</div>
        </div>
    </div>
</main>

{{-- #acceptandpay --}}

<script>
	$('.acceptandpay').click(function(){
		$(this).text('Loading...');
		var bookingId=$(this).attr('bookingId');
		$.ajax({
                url: '/api/v1/acceptandpay',
                type: 'POST',
                    data: {booking_id:bookingId},
                    success: function (response) {
                        location.reload();
                    },
                    fail: function (error) {
                        console.log(error);
                    }
            });
	});

	$('.cancelByUser').click(function(){

		if (confirm('Are you sure!')) {
			$(this).text('Loading...');
			var bookingId=$(this).attr('bookingId');
			$.ajax({
					url: '/api/v1/cancelByUser',
					type: 'POST',
						data: {booking_id:bookingId},
						success: function (response) {
							location.reload();
						},
						fail: function (error) {
							console.log(error);
						}
				});
		}
	});
</script>

<style>
.nav-tabs>li>a {
	color: #000;
}
.home-services-header {
    width: 100%;
    text-align: center;
    color: green;
}
.tabs-left {
	border-bottom: none;
	/*border-right: 1px solid #ddd;*/
}
.tabs-left>li {
	float: none;
	margin:0px;
	width: 100%;
}
.tabs-left>li.active>a,
.tabs-left>li.active>a:hover,
.tabs-left>li.active>a:focus {
	border-bottom-color: #ddd;
	border-right-color: transparent;
	background:#fe5722;
	border:none;
	border-radius:0px;
	margin:0px;
	color: #fff;
    /*font-weight: bold;*/
}
.nav-tabs>li>a:hover {
	/* margin-right: 2px; */
	line-height: 1.42857143;
	border: 1px solid transparent;
	/* border-radius: 4px 4px 0 0; */
}
.tabs-left>li.active>a::after{content: "";
	position: absolute;
	top: 10px;
	right: -10px;
	border-top: 10px solid transparent;
	border-bottom: 10px solid transparent;
	border-left: 10px solid #fe5722;
	display: block;
	width: 0;
	}
</style>
@endsection