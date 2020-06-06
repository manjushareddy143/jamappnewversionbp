<?php

namespace App\Http\Controllers;

use App\ServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceProviderController extends Controller
{

     //for vendor verification
     public function verification($id)
     {
        $updatedata = [
            'verified' => 1,
        ];
        $temp= DB::table('service_providers')
            ->where('user_id', $id)
            ->update($updatedata);

        return $temp;
    }

}
