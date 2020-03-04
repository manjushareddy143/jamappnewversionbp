<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use App\Model\serviceModel;
use Illuminate\Support\Facades\App;

class ServiceController extends Controller
{
    //
    public function serviceslist()
    {
        // It retrive all the data from database
        return Services::all();

    }
}
