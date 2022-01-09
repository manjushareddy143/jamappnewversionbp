<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Crypt;
use App\User;
use App\Address;
use App\Booking;
use App\services;
use App\SubCategories;
use App\ServiceMapping;
use App\ProviderServiceMapping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Mail;
use Twilio\Rest\Client;
use App\Mail\BookingMail;
use App\Jobs\NotificationJob;

class HomeController extends Controller
{
	public function __construct()
	{

	}

	public function home(Request $request){
        $services = services::get();
        $pageTitle = 'Home';
		return view('frontend.home',compact('services', 'pageTitle'));
	}

	public function about(Request $request){
        $pageTitle = 'About';
		return view('frontend.about',compact('pageTitle'));
	}

	public function servicesList(Request $request){
        $pageTitle = 'Services';
        $collection = services::select('services.*');

        if($request->keyword !=''){
          	$keyword = request()->keyword;
            $collection->where('services.name','like', "%$keyword%");            
        }
        $services = $collection->orderBy('id','DESC')->get();        

		return view('frontend.service-list',compact('pageTitle','services'));
	}

	public function prices(Request $request){
        $pageTitle = 'Prices';
		return view('frontend.prices', compact('pageTitle'));
	}

	public function providerRegistration(Request $request){
        $pageTitle = 'providerRegistration';
		return view('frontend.providerRegistration', compact('pageTitle'));
	}

	public function contactUs(Request $request){
        $pageTitle = 'Contact Us';
		return view('frontend.contact-us', compact('pageTitle'));
	}

	public function privacyPolicy(Request $request){
        $pageTitle = 'Privacy policy';
		return view('frontend.privacy-policy', compact('pageTitle'));
	}

	public function getTheApp(Request $request){
        $pageTitle = 'Get The App';
		return view('frontend.getTheApp', compact('pageTitle'));
	}

	public function subServices(Request $request, $id){
        $service = services::find($request->id);
        $pageTitle = 'Sub Services';
        $subServices = ServiceMapping::where('service_id', $request->id)->get();
        return view('frontend.subServices',compact('service','subServices', 'pageTitle'));
	}

	public function serviceVendors(Request $request, $service_id, $category_id){
        $service = services::find($service_id);
        $pageTitle = 'Service Vendors';
        $subCategories = SubCategories::find($category_id);
        $serviceVendors = ProviderServiceMapping::where('service_id',$service_id)
			        		->where('category_id',$category_id)
			        		->get();

        return view('frontend.serviceVendors',compact('service','pageTitle','subCategories','serviceVendors'));
	}

	public function serviceVendor(Request $request){
		if(Auth::check()){
			if($request->ajax()){
				if($request->type=='vendorBooking'){
					// $vendor = ProviderServiceMapping::find($request->pcm_id);
					$ServiceMapping = ServiceMapping::where('id', $request->pcm_id)->first();
					$service = services::where('id', $ServiceMapping->service_id)->first();
					$category = SubCategories::where('id', $ServiceMapping->category_id)->first();
				    $customer = Auth::user();
		       		$view = view('frontend.ajax.vendors',compact('service','category','ServiceMapping','customer'))->render();
		       	}elseif($request->type=='vendorDetail'){
		       		$vendor = ProviderServiceMapping::find($request->pcm_id);
		       		$view = view('frontend.ajax.vendorDetail',compact('vendor'))->render();
		       	}

	       		return response()->json([
	                'success' 	=> 200,
	                'html' 		=> $view
	            ]);
	       	}
		}else{
       		return response()->json(['error' =>[['Please first login.']]],401);  
       	}
	}

	public function booking(Request $request){
		$pageTitle = 'Booking';
		if($request->ajax()){
			if(Auth::check()){

				//Start Validation
	            $messages = [
	                'end_time.required' => 'End time field is required.',
	                'start_time.required' => 'Start time field is required.',
	                'booking_date.required' => 'Booking date field is required.',
	            ];
	            $validator = Validator::make($request->all(), [            
	                'end_time'  => 'required',
	                'start_time'  => 'required',
	                'booking_date'  => 'required',
	            ],$messages);
	            if ($validator->fails()) {
	                return response()->json(['error'=>$validator->errors()], 401);            
	            } 
	            //end Validation

				$customer 				= Auth::user();
				$otp 					= rand(1000,9999);

				$booking 				= new Booking();
				$booking->user_id 		= $customer->id;
				$booking->address_id 	= $request->user_id;
				$booking->service_id 	= $request->service_id;
				$booking->category_id 	= $request->category_id;
				$booking->orderer_name 	= $request->orderer_name;
				$booking->email 		= $request->email;
				$booking->contact 		= $request->contact;
				$booking->booking_date 	= $request->booking_date;
				$booking->start_time 	= $request->start_time;
				$booking->end_time 		= $request->end_time;
				$booking->remark 		= $request->remark;
				$booking->provider_id 	= $request->provider_id;
				$booking->status 		= 1;
				$booking->otp 			= $otp;
				$booking->save();

				$addressAlreadyExists 	= Address::where('user_id',$customer->id)->first();
				$address   				= $addressAlreadyExists ? $addressAlreadyExists : new Address;
				$address->address_line1	= $request->address_line1;
				$address->address_line2	= $request->address_line2;
				$address->landmark		= $request->landmark;
				$address->district		= $request->district;
				$address->city			= $request->city;
				$address->postal_code	= $request->postal_code;
				$address->user_id		= $customer->id;
				$address->default_address	= 1;
				$address->save();

				//for user notification

				$body = "Hello, ".$booking->orderer_name." Thanks for booking on jamapp. we will contact with you soon!";
				$details['msg']='Thanks for booking on jamapp. we will contact with you soon!';
				$details['subject']='Booking on jamapp!';
				$details['name']=$booking->orderer_name;
				$details['email']=$booking->email;
				$details['contact']=$booking->contact;
				$details['body']=$body;

                dispatch(new NotificationJob($details));

				//for admin notification

				$body = "Hello Admin, ".$booking->orderer_name." has booked new booking on jamapp!";
				$details['msg']='Thanks for booking on jamapp. we will contact with you soon!';
				$details['subject']='Booking on jamapp!';
				$details['name']='Admin';
				$details['email']=getenv("ADMIN_EMAIL");
				$details['contact']=getenv("ADMIN_CONTACT_NUMBER");
				$details['body']=$body;

                dispatch(new NotificationJob($details));

	       		return response()->json([
	                'success' 		=> 200,
	                'message'   	=> 'Booking has been created.',
	                'redirect_url'  => url('thank-you',Crypt::encrypt($booking->id))
	            ]);

			}else{
				return response()->json(['error' =>[['Please first login your account.']]],401);
			}
		}
	}

	public function thankyou(Request $request, $id){
		$booking = Booking::find(Crypt::decrypt($id));
		$pageTitle = 'Thank you';
		return view('frontend.thankyou',compact('booking','pageTitle'));
	}
}
