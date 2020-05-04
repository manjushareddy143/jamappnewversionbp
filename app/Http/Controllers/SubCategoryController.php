<?php

namespace App\Http\Controllers;

use App\SubCategories;
use Illuminate\Http\Request;
use Validator;

class SubCategoryController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name'  => 'required',
                'image' => 'required|image',  //|max:2048
//            'banner_image' => 'required|image',  //|max:2048
//            'description' => 'required',
            ]);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $iconImg = $request->file('image');
        $iconName = rand() . '.' . $iconImg->getClientOriginalExtension();
        $iconImg->move(public_path('images/subcategories'), $iconName);

        $host = url('/');
        $input = $request->all();
        $form_data = array(
            'name'  => $input['name'],
            'image' =>  $host . "/images/subcategories/" . $iconName,
            'description' => $input['description']
        );

        $myResult = SubCategories::create($form_data);

        return response()->json($myResult);
    }

    public function show_all() {
        $listServices = SubCategories::all();
        if($listServices->count() > 0) {
            return response()->json($listServices);
        } else {
            return response()->json(['status'=> 204]);
        }
    }


}
