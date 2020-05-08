<?php

namespace App\Http\Controllers;

use App\ServiceMapping;
use App\services;
use Illuminate\Http\Request;
use Validator;

class ServicesController extends Controller
{

    public function store(Request $request)
    {
//        return response()->json($request->get('name'));
        $validator = Validator::make($request->all(),
            [
                'name'  => 'required',
                'icon_image' => 'required|image',  //|max:2048
                'banner_image' => 'required|image', //|max:2048
            ]);


        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $iconImg = $request->file('icon_image');
        $iconName = rand() . '.' . $iconImg->getClientOriginalExtension();
        $iconImg->move(public_path('images/category'), $iconName);

        $bannerImg = $request->file('banner_image');
        $bannerName = '';
        if($bannerImg) {
            $bannerName = rand() . '.' . $bannerImg->getClientOriginalExtension();
            $bannerImg->move(public_path('images/category'), $bannerName);
        }

        $input = $request->all();
        $host = url('/');
        $form_data = array(
            'name'  => $input['name'],
            'icon_image' => $host . "/images/category/" . $iconName,
            'banner_image' => $host . "/images/category/" . $bannerName,
            'description' => array_key_exists('description', $input) ? $input['description'] : ""
        );
//        return response()->json($form_data);
        $myResult = services::create($form_data);
        return response()->json($myResult);
        return response()->json($myResult);
    }

    public function show_all(Request $request) {
       $access_type = $request->input('access_type');
       $listServices = services::all();

       if($access_type == null) {
           return view('services')->with('data',$listServices);
       } else {

           if($listServices->count() > 0) {
                return response()->json($listServices);
           } else {
               return response()->json(null, 204);
           }
       }

   }

    public function get_service_categories(Request $request)
      {
          $service_id = $request->input('id');
          $results = ServiceMapping::where('service_id', '=', $service_id)
              ->leftJoin('sub_categories', 'sub_categories.id', '=','service_mappings.category_id')->get()  ;
          return response()->json($results, 200);
//          return view('detailpage')->with('data',$results);
      }


}
