<?php

namespace App\Http\Controllers;

use App\UserTypes;
use Illuminate\Http\Request;

use Validator;

class UserTypeController extends Controller
{
    public function add_type(Request $request)
    {
        $response = array();
        $initialValidator = Validator::make($request->all(),
            [
                'type' => 'required',
            ]);

        if ($initialValidator->fails())
        {
            return response()->json(['error'=>$initialValidator->errors()], 401);
        }

        $input = $request->all();
        $type = UserTypes::create($input);
        return response()->json($type);
    }

    public function show_all(Request $request)
    {
        $types = UserTypes::all();
        return response()->json($types);
    }


}
