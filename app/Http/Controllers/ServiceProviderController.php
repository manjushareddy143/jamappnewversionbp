<?php

namespace App\Http\Controllers;

use App\ServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
     //for vendor verification
     public function verification($id)
     {
        $verify = ServiceProvider::find($id);
        $verify -> verified == 1;
        $verify = save();
    }

}
