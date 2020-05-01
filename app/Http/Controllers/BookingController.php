<?php

namespace App\Http\Controllers;

use App\Booking;
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
                "start_time" => "required|before:end_time",
                'contact' => 'required',
                "start_time" => "required|before:end_time",
                "end_time" => "required",
            ]);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()], 401);
        }


        $input = $request->all();

        $booking = Booking::create($input);

        return response($booking, 200)
            ->header('content-type', 'application/json');

        return response()->json($request);
    }

    public  function getorderbyuser(Request $request) {
        $user_id = $request->input('id');
        $result = Booking::where('user_id', '=', $user_id)->get();
        return response()->json($result);
    }

    public  function getorder($id) {
        $result = Booking::where('id', '=', $id)->first();
        return response()->json($result);
    }

}
