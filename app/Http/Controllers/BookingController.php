<?php

namespace App\Http\Controllers;

use App\Booking;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class BookingController extends Controller
{
    public function booking(Request $request) {

        $response = array();
        $validator = Validator::make($request->all(),
            [
                'user_id' => 'required|exists:users,id',
                'service_id'  => 'required|exists:services,id',
                'category_id' => 'required|exists:sub_categories,id',
                "booking_date" => "required|date",
                'contact' => 'required',
                "start_time" => "required|before:end_time",
                "end_time" => "required",
                "provider_id" => "required|exists:service_providers,user_id"
            ]);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()], 401);
        }


        $input = $request->all();

        $startTime = new \DateTime($input['booking_date']);
        $dd = $startTime->format('d-m-Y');


        $dateTime = Carbon::parse($dd);//->format('d-m-Y');
//        echo $dateTime; exit();
        $input['booking_date'] = $dateTime;
        $input['status'] = 1;

        $booking = Booking::create($input);

        return response($booking, 200)
            ->header('content-type', 'application/json');

        return response()->json($request);
    }

    public  function getorderbyuser(Request $request) {
        $user_id = $request->input('id');
        $result = Booking::where('user_id', '=', $user_id)
            ->leftJoin('users', 'users.id', '=','bookings.provider_id')
            ->leftJoin('services', 'services.id', '=','bookings.service_id')
            ->leftJoin('sub_categories', 'sub_categories.id', '=','bookings.category_id')
            ->select('bookings.*',
                'users.first_name as provider_first_name', 'users.last_name as provider_last_name',
                'users.image as provider_image',
                'services.name as service',
                'sub_categories.name as category')
            ->get();
        return response()->json($result);
    }

    public  function getorder($id) {
        $result = Booking::where('id', '=', $id)->first();
        return response()->json($result);
    }

}
