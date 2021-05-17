<?php

namespace App\Http\Controllers;

use App\ServiceMapping;
use App\services;
use Illuminate\Http\Request;
use Validator;
use DB;

class ServicesController extends Controller
{

    public function store(Request $request)
    {
            // return response()->json($request->get('name'));
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
    //        $host = url('/');
        $form_data = array(
            'name'  => $input['name'],
            'arabic_name'  => $input['arabic_name'],
            'price'  => $input['price'],
            'icon_image' =>  "/images/category/" . $iconName,
            'banner_image' => "/images/category/" . $bannerName,
            'description' => array_key_exists('description', $input) ? $input['description'] : "",

        );
    //        return response()->json($form_data);
        $myResult = services::create($form_data);
        return response()->json($myResult);
        //return response()->json($myResult);
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

   public function service_status(Request $request)
   {
       $id = $request->input('id');

       $ser = services::find($id);
       if($ser->is_enable == 1) {
        $ser->is_enable = 0;
       } else {
        $ser->is_enable = 1;
       }
       $ser->save();
       return response()->json($ser, 200);

   }

    public function get_service_categories(Request $request)
      {
          $service_id = $request->input('id');
          $results = ServiceMapping::where('service_id', '=', $service_id)
              ->leftJoin('sub_categories', 'sub_categories.id', '=','service_mappings.category_id')->get();
          return response()->json($results, 200);
    //          return view('detailpage')->with('data',$results);
      }

    public function category_detail(Request $request)
    {

        $service_id = $request->input('id');

        $results = ServiceMapping::where('service_id', '=', $service_id)
            ->leftJoin('sub_categories', 'sub_categories.id', '=','service_mappings.category_id')->get()  ;
        //    return response()->json($results, 200);
          return view('detailpage')->with('data',$results);
    }


    public function edit_services($id)
    {
    $service = services::with('subcategories')->where('id', '=', (int)$id)->first();
        return response()->json($service, 200);

    }

    public function updateservices(Request $request)
    {

        $input = $request->all();
        $updatedata = [];
        if(array_key_exists('name', $input)) {
            $updatedata += [
                'name' => $input['name'],
            ];

        }
        if(array_key_exists('description', $input)) {
            $updatedata += [
                'description' => $input['description'],
            ];

        }

        if(array_key_exists('arabic_name', $input)) {
            $updatedata += [
                'arabic_name' => $input['arabic_name'],
            ];

        }
        if(array_key_exists('price', $input)) {
            $updatedata += [
                'price' => $input['price'],
            ];

        }

        $temp= DB::table('services')->where('id', (int)$input['id'])->update($updatedata);
        return $temp;

    }

}
