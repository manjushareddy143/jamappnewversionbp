<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use App\Model\serviceModel;
use Illuminate\Support\Facades\App;

class ServiceController extends Controller
{
    //
    public function services()
    {
        return Services::all();
        //return response()->json(services::get(), 200);
    }
}
