<?php

namespace App\Http\Controllers;

use App\ServiceMapping;
use Illuminate\Http\Request;
use Validator;

class ServiceMappingController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'service_id'  => 'required|exists:services,id',
                'category_id' => 'required|exists:sub_categories,id',
            ]);


        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();

        $returnValue = ServiceMapping::where('service_id','=',$input['service_id'])->where('category_id','=',$input['category_id'])->get();
        if($returnValue->count() == 0) {
            $form_data = array(
                'service_id'  => $input['service_id'],
                'category_id' => $input['category_id']
            );
            $result = ServiceMapping::create($form_data);
            return response()->json($result);
        } else {
            return response()->json(null, 409);
        }
    }

    public function get_services(Request $request)
    {
        $listofmapping = ServiceMapping::all();

        if($listofmapping->count() > 0) {
            return response()->json($listofmapping);
        } else {
            return response()->json(null, 204);
        }

    }


}
