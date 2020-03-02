<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use App\Model\serviceModel;

class ServiceController extends Controller
{
    //
    public function service()
    {
        return response()->json(services::get(), 200);
    }
}
