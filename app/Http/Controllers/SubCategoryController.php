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

    public function show_all() {
        $listServices = SubCategories::all();
        if($listServices->count() > 0) {
            return response()->json($listServices);
        } else {
            return response()->json(['status'=> 204]);
        }
    }

    // public function get_category(Request $request)
    // {
    //     // echo 'test';
    //     // exit();
    //     $id = $request->input('id');
    //     $host = url('/');
    //     if($id) {
    //         $sub_categories = sub_categories::find($id);
    //         if($sub_categories) {
    //             $sub_categories["image"] =  $host . $sub_categories['image'];

    //             $listMapped = ServiceMapping::where('category_id','=',$sub_categories['id'])->get();
    //             $category = new Collection();
    //             foreach ($listMapped as $mapping) {
    //                 $listCategories = SubCategories::find($mapping['category_id']);

    //                 $category->push($listCategories);
    //             }
    //             $sub_categories["categories"] = $category;
    //             return response()->json($sub_categories);
    //         } else {
    //             return response()->json(null, 204);
    //         }
    //     } else {
    //         $listSubCategories = SubCategories::all();
    //         if($listSubCategories->count() > 0) {
    //             $result = new Collection();
    //             foreach ($listSubCategories as $sub_categories) {
    //                 $data = [];
    //                 $data = $sub_categories;
    //                 $sub_categories["image"] = $host . $sub_categories['image'];

    //                 $listMapped = ServiceMapping::where('category_id','=',$sub_categories['id'])->get();
    //                 $category = new Collection();
    //                 foreach ($listMapped as $mapping) {
    //                     $listCategories = SubCategories::find($mapping['category_id']);
    //                     $listCategories["image"] = $host . $listCategories['image'];
    //                     $category->push($listCategories);
    //                 }
    //                 $data["categories"] = $category;
    //                 $result->push($data);
    //             }
    //             return response()->json($result);
    //         } else {
    //             return response()->json(null, 204);
    //         }
    //     }
    // }

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
