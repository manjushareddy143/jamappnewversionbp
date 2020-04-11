<?php

namespace App\Http\Controllers;

use App\services;
use Illuminate\Http\Request;
use Validator;

class ServicesController extends Controller
{

    function insert_image(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name'  => 'required',
                'icon_image' => 'required|image',  //|max:2048
//            'banner_image' => 'required|image',  //|max:2048
//            'description' => 'required',
            ]);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $iconImg = $request->file('icon_image');
        $iconName = rand() . '.' . $iconImg->getClientOriginalExtension();
        $iconImg->move(public_path('images'), $iconName);

        $bannerImg = $request->file('banner_image');
        $bannerName = '';
        if($bannerImg) {
            $bannerName = rand() . '.' . $bannerImg->getClientOriginalExtension();
            $bannerImg->move(public_path('images'), $bannerName);
        }

        $input = $request->all();
        $form_data = array(
            'name'  => $input['name'],
            'icon_image' => $iconName,
            'banner_image' => $bannerName,
            'description' => $input['description']
        );

        $myResult = services::create($form_data);
        $host = url('/');
        $myResult["icon_image"] = $host . "/images/" . $iconName;
        if($bannerImg) {
            $myResult["banner_image"] = $host . "/images/" . $bannerName;
        }
        return response()->json($myResult);
    }


}
