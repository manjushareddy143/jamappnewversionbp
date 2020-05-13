<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;
use Validator;

class ExperienceController extends Controller
{
    public function add_experience(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'rating'  => 'required',
                'rate_by' => 'required|exists:users,id',
                'rate_to' => 'required|exists:users,id',
                'booking_id'=>'required|exists:bookings,id',
            ]);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $form_data = array(
            'rating'  => $input['rating'],
            'rate_by' => $input['rate_by'],
            'rate_to' => $input['rate_to'],
            'booking_id' => $input['booking_id'],
            'comment' => array_key_exists('comment', $input) ? $input['comment'] : ""
        );
        $myResult = Experience::create($form_data);
        return response()->json($myResult);
    }

}
