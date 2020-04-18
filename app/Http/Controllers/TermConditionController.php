<?php

namespace App\Http\Controllers;

use App\TermCondition;
use Illuminate\Http\Request;
use Validator;

class TermConditionController extends Controller
{
    public function add_term(Request $request)
    {
        $response = array();
        $initialValidator = Validator::make($request->all(),
            [
                'type' => 'required',
                'term_code' => 'required',
            ]);

        if ($initialValidator->fails())
        {
            return response()->json(['error'=>$initialValidator->errors()], 401);
        }

        $input = $request->all();
        $type = TermCondition::create($input);
        return response()->json($type);
    }


    public function show_all(Request $request)
    {
        $types = TermCondition::all();
        return response()->json($types);
    }
}
