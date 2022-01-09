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
					          						</tr>
					          					</thead>
					          					<tbody>
					          						@foreach($bookings as $booking)
					          							@if($booking->status!=5)
							          						<tr>
							          							<td>{{ $booking->orderer_name }}</td>
							          							<td>{{ $booking->booking_date }}</td>
							          							<td>{{ $booking->start_time }}</td>
							          							<td>{{ $booking->end_time }}</td>
							          							<td>{{ $booking->provider ? $booking->provider->full_name  : ''}}</td>
							          							<td>
							          								<?php 
							          								$status = '';
							          								if($booking->status==1) {
							          									$status = 'Pending';
							          								}elseif($booking->status==2) {
							          									$status = 'Accept';
							          								}elseif($booking->status==3) {
							          									$status = 'Cancel by Vendor';
							          								}elseif($booking->status==4) {
							          									$status = 'Cancel by Vendor';
							          								}elseif($booking->status==6) {
							          									$status = 'Invoice Submitted';
							          								}
							          								?>
							          								{{ $status }}
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
					          							@if($booking->status==5)
							          						<tr>
							          							<td>{{ $booking->orderer_name }}</td>
							          							<td>{{ $booking->booking_date }}</td>
							          							<td>{{ $booking->start_time }}</td>
							          							<td>{{ $booking->end_time }}</td>
							          							<td>{{ $booking->provider ? $booking->provider->full_name  : ''}}</td>
							          							<td>{{ $booking->status==5 ? 'Completed'  : '' }}</td>
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