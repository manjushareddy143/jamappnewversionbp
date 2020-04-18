<?php

namespace App\Http\Controllers;

use App\ServiceMapping;
use App\services;
use App\SubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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
        $id = $request->input('id');
        $host = url('/');
        if($id) {
            $service = services::find($id);
            if($service) {
                $service["icon_image"] = $host . "/images/category/" . $service['icon_image'];
                if($service['banner_image']) {
                    $service["banner_image"] = $host . "/images/category/" . $service['banner_image'];
                }
                $listMapped = ServiceMapping::where('service_id','=',$service['id'])->get();
                $category = new Collection();
                foreach ($listMapped as $mapping) {
                    $listCategories = SubCategories::find($mapping['category_id']);
                    $listCategories["image"] = $host . "/images/subcategories/" . $listCategories['image'];
                    $category->push($listCategories);
                }
                $service["categories"] = $category;
                return response()->json($service);
            } else {
                return response()->json(null, 204);
            }
        } else {
            $listService = services::all();
            if($listService->count() > 0) {
                $result = new Collection();
                foreach ($listService as $service) {
                    $data = [];
                    $data = $service;
                    $service["icon_image"] = $host . "/images/category/" . $service['icon_image'];
                    if($service['banner_image']) {
                        $service["banner_image"] = $host . "/images/category/" . $service['banner_image'];
                    }
                    $listMapped = ServiceMapping::where('service_id','=',$service['id'])->get();
                    $category = new Collection();
                    foreach ($listMapped as $mapping) {
                        $listCategories = SubCategories::find($mapping['category_id']);
                        $listCategories["image"] = $host . "/images/subcategories/" . $listCategories['image'];
                        $category->push($listCategories);
                    }
                    $data["categories"] = $category;
                    $result->push($data);
                }
                return response()->json($result);
            } else {
                return response()->json(null, 204);
            }
        }
    }
}
