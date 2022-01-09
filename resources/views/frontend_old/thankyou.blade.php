@extends('frontend.default')
@section('content')

<main class="custom_main">
    <div id="main_content">
        <div class="home-services">
            <div class="home-services-header">
                <h1>{{ __('frontend.thank_you') }}</h1>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>{{ __('frontend.primay_service') }}</th>
                        <td>{{ $booking->services ? $booking->services->name : '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('frontend.secondry_service') }}</th>
                        <td>{{ $booking->category ? $booking->category->name : '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('frontend.name') }}</th>
                        <td>{{ $booking->orderer_name }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('frontend.email') }}</th>
                        <td>{{ $booking->email }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('frontend.phone') }}</th>
                        <td>{{ $booking->contact }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('frontend.booking_date') }}</th>
                        <td>{{ $booking->booking_date }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('frontend.start_time') }}</th>
                        <td>{{ $booking->start_time }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('frontend.end_time') }}</th>
                        <td>{{ $booking->end_time }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('frontend.provider') }}</th>
                        <td>{{ $booking->provider ? $booking->provider->full_name : '' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('frontend.remark') }}</th>
                        <td width="1000">{{ $booking->remark }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>
<style>
.home-services-header {
    width: 100%;
    text-align: center;
    color: green;
}
</style>
@endsection