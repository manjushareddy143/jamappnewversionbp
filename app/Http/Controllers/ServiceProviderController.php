<?php

namespace App\Http\Controllers;

use App\ServiceProvider;
use App\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceProviderController extends Controller
{

    public function getDistance() {

        $latitudeFrom = 21.0987442;
        $longitudeFrom = 71.7539072;


        $latitudeTo = 21.093098271540605;
        $longitudeTo = 71.76618821918964;

        $theta    = $longitudeFrom - $longitudeTo;
        $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist    = acos($dist);
        $dist    = rad2deg($dist);
        $miles    = $dist * 60 * 1.1515;

        // Convert unit and return distance
        $unit = 'K';
        $unit = strtoupper($unit);
        if($unit == "K"){
            return round($miles * 1.609344, 2).' km';
        }elseif($unit == "M"){
            return round($miles * 1609.344, 2).' meters';
        }else{
            return round($miles, 2).' miles';
        }
    }
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

    public function GetOrganisationVendors($orgId)
    {
        $user = User::with('documents')->with('address')->with('provider')
        ->with('type')->with('services')->with('organisation')->where('org_id', $orgId)->get();
        return response()->json($user, 200);
    }

}
