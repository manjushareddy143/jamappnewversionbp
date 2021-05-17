<?php

namespace App\Http\Controllers;

use App\SubCategories;
use Illuminate\Http\Request;
use Validator;
use App\services;
use DB;
use App\ServiceMapping;

class SubCategoryController extends Controller
{
    public function store(Request $request)
    {
        $response = array();
        try {
            $validator = Validator::make($request->all(),
                [
                    'name'  => 'required',
                    'image' => 'required|image',  //|max:2048
//            'banner_image' => 'required|image',  //|max:2048
//            'description' => 'required',
                    'price' => 'required',
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
                'description' => array_key_exists('description', $input) ? $input['description'] : "",
                'price'  => $input['price'],
            );

            $myResult = SubCategories::create($form_data);

            return response()->json($myResult);
        } catch (\Exception $e) {

            $response['code'] = 400;
            $response['message'] = $e->getMessage();
            return response($response, 400)
                ->header('content-type', 'application/json');
        }
    }

    // public function service_subcat(Request $request)
    // {
    //     // echo($request->all()); exit;
    // }

    public function show_all(Request $request) {

        $listMappedCat = ServiceMapping::where('service_id', '=', $request->input('id'))->get();

        $data = [];
        $i = 0;
        foreach ($listMappedCat as $cat) {
            $category = SubCategories::find($cat->category_id);
            $data[$i] = $category;
            $i++;
        }
        if(isset($data)) {
            return response()->json($data);
        } else {
            return response()->json(['status'=> 204]);
        }
    }

    public function get_category(Request $request)
    {
        $listCat = SubCategories::select('*')->get();
        // print_r($listCat); exit;
        if(isset($listCat)) {
            return response()->json($listCat);
        } else {
            return response()->json(['status'=> 204]);
        }

    }

    public function edit_category($id)
    {
    $category = subcategories::where('id', '=', (int)$id)->first();
        return response()->json($category, 200);

    }

    // update category


    public function updatecategory(Request $request)
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
        if(array_key_exists('price', $input)) {
            $updatedata += [
                'price' => $input['price'],
            ];

        }

        $temp= DB::table('sub_categories')->where('id', (int)$input['id'])->update($updatedata);
        return $temp;

    }

}
