<?php

namespace App\Http\Controllers;

use App\ServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    $validator = Validator::make($request->all(),
    [
        'user_id'  => 'required',
        'resident_country' => 'required',  //|max:2048
        'proof_id' => 'required', //|max:2048
        'verified' => 'required'

    ]);


    if ($validator->fails())
    {
        return response()->json(['error'=>$validator->errors()], 401);
    }

     //for vendor verification
     public function verification($id)
     {
        $verify = ServiceProvider::find($id);
        $verify -> verified == 1;
        $verify = save();
    }

}
