<?php

namespace App\Http\Controllers;

use App\TermAgreement;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Validator;
use function GuzzleHttp\_current_time;

class TermAgreementController extends Controller
{
    public function add_term_agreement(Request $request)
    {

        $initialValidator = Validator::make($request->all(),
            [
                'user_id' => 'required',
                'term_id' => 'required|exists:term_conditions,id',
            ]);

        if ($initialValidator->fails())
        {
            return response()->json(['error'=>$initialValidator->errors()], 406);
        }

        $now = now()->utc();

        $input = $request->all();
        $input['agreed_at'] = $now;
        $type = TermAgreement::create($input);
        return response()->json($type);
    }

    public function show_all(Request $request)
    {
        $types = TermAgreement::all();
        return response()->json($types);
    }
}
