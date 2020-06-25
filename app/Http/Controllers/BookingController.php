<?php

namespace App\Http\Controllers;

use App\Address;
use App\Booking;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use PDF;

class BookingController extends Controller
{



    public function booking(Request $request) {

        $response = array();
        $validator = Validator::make($request->all(),
            [
                'user_id' => 'required|exists:users,id',
                'service_id'  => 'required|exists:services,id',
        //                'category_id' => 'required|exists:sub_categories,id',
                "booking_date" => "required|date",
                'contact' => 'required',
                "start_time" => "required|before:end_time",
                "end_time" => "required",
                "provider_id" => "required|exists:service_providers,user_id"
            ]);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()], 406);
        }


        $input = $request->all();

        $startTime = new \DateTime($input['booking_date']);
        $dd = $startTime->format('d-m-Y');


        $dateTime = Carbon::parse($dd);//->format('d-m-Y');
        $input['booking_date'] = $dateTime;
        $input['status'] = 1;
        $input['otp'] = rand(1000,9999);


        $booking = Booking::create($input);

        return response($booking, 200)
            ->header('content-type', 'application/json');

        return response()->json($request);
    }



    public function getOrderByProvider(Request $request) {

        $user_id = $request->input('id');

               $result = Booking::with('users')
                   ->with('services')
                   ->with('category')
                   ->with('provider')
                   ->with('address')
                   ->with('rating')
                   ->where('provider_id', '=', $user_id)->get();

        // $result = Booking::where('provider_id', '=', $user_id)
        //     ->leftJoin('users', 'users.id', '=','bookings.provider_id')
        //     ->leftJoin('services', 'services.id', '=','bookings.service_id')
        //     ->leftJoin('sub_categories', 'sub_categories.id', '=','bookings.category_id')
        //     ->leftJoin('experiences', 'experiences.booking_id', '=','bookings.id')
        //     ->select('bookings.*',
        //         'users.first_name as provider_first_name', 'users.last_name as provider_last_name',
        //         'users.image as provider_image',
        //         'services.name as service',
        //         'sub_categories.name as category',
        //         'experiences.rating as rating', 'experiences.comment as comment')
        //     ->groupBy('bookings.id')
        //     ->get();

        // $response = array();
        // foreach ($result as $obj) {
        //     $data = array();
        //     $data = $obj;
        //    // $user = User::where('id','=',$obj->user_id)->first();
        //     $address = Address::where('user_id', '=', $obj->user_id)->first();
        //    // $data['order_user'] = $user;
        //     $data['address'] = $address;
        //     array_push($response, $data);
        // }


        return response()->json($result);
    }

    public  function getorderbyuser(Request $request) {

        $user_id = $request->input('id');

        $result = Booking::with('users')
            ->with('services')
            ->with('category')
            ->with('provider')
            ->with('address')
            ->with('rating')
            ->where('user_id','=', $user_id)->get();
        // $result = Booking::where('user_id', '=', $user_id)
        //     ->leftJoin('users', 'users.id', '=','bookings.provider_id')
        //     ->leftJoin('services', 'services.id', '=','bookings.service_id')
        //     ->leftJoin('sub_categories', 'sub_categories.id', '=','bookings.category_id')
        //     ->leftJoin('experiences', 'experiences.booking_id', '=','bookings.id')
        //     ->select('bookings.*',
        //         'users.first_name as provider_first_name', 'users.last_name as provider_last_name',
        //         'users.image as provider_image',
        //         'services.name as service',
        //         'sub_categories.name as category',
        //         'experiences.rating as rating', 'experiences.comment as comment')
        //     ->groupBy('bookings.id')
        //     ->get();

        // $response = array();
        // foreach ($result as $obj) {
        //     $data = array();
        //     $data = $obj;
        //     $address = Address::where('user_id', '=', $obj->user_id)->first();
        //     $data['address'] = $address;
        //     array_push($response, $data);
        // }

        return response()->json($result);
    }

    public  function getorder($id) {
        $result = Booking::with('users')->with('services')->with('category')->with('provider')->with('address')->with('rating')->where('id', '=', $id)->first();
        return response()->json($result);
    }

    public function getallbooking(Request $request) {

        $result = Booking::with('users')->with('services')->with('category')->with('provider')->get();
        return response()->json($result);
    }

    public function orderbyid($id)
    {
        $booking=Booking::where('bookings.id', '=', $id)
            ->leftjoin('services', 'bookings.service_id', '=', 'services.id')
            ->leftjoin('addresses', 'addresses.user_id', '=', 'users.id')
            ->select('bookings.*',
                'services.name as servicename',
                'addresses.name as addressname',
                'addresses.address_line1 as address_line1',
                'addresses.address_line2 as address_line2')
            ->get();


        return response()->json($booking, 200);
    }

    public function invoice(Request $request) {
        return view('invoice.invoice');
    }

    public function printPDF()
    {
       // This  $data array will be passed to our PDF blade      
        $data = [   
                  
            ];
        
        $pdf = PDF::loadView('pdf_view', $data);  
        return $pdf->download('medium.pdf');
    }
}
