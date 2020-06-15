<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\organisation;

class OrganisationController extends Controller
{
    public function getAll(Request $request)
    {
        $result = organisation::all();
        return response()->json($result, 200);
    }
}
