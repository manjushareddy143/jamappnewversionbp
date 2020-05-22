<?php

namespace App\Http\Controllers;

use App\ProviderServiceMapping;
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

    public function get_services_by_user(Request $request) {
        $id = $request->input('id');
        $results = ProviderServiceMapping::where('user_id', '=', $id)
            ->leftJoin('services', 'services.id', '=','provider_service_mappings.service_id')
            ->leftJoin('sub_categories', 'sub_categories.id', '=','provider_service_mappings.category_id')
            ->select('services.id as service_id',
                'services.name as service','services.icon_image as service_icon',
                'services.banner_image as service_banner', 'services.description as service_description' ,
                'sub_categories.name as category', 'sub_categories.id as category_id',
                'sub_categories.image as category_image', 'sub_categories.description as category_description')
            ->get();
        return response()->json($results);
    }

    public function get_providers_by_service(Request $request) {
        $id = $request->input('id');
        $host = url('/');
        $results = ProviderServiceMapping::where('service_id', '=', $id)
            ->leftJoin('users', 'users.id', '=','provider_service_mappings.user_id')
            ->leftJoin('service_providers', 'service_providers.user_id', '=','users.id')
            ->leftJoin('documents', 'documents.user_id', '=','users.id')
            ->leftJoin('experiences', 'experiences.rate_to', '=','users.id')
            ->select('users.*',
                'service_providers.resident_country',
                'documents.type as doc',
                'documents.doc_name as document_image',
                \DB::raw('AVG(experiences.rating) AS rate'),
                \DB::raw('COUNT(experiences.rating) AS reviews'))
            ->groupBy('provider_service_mappings.user_id')
            ->get();
        return response()->json($results);
    }

    public function get_providers_by_category(Request $request) {
        $id = $request->input('id');
        $results = ProviderServiceMapping::where('category_id', '=', $id)
            ->leftJoin('users', 'users.id', '=','provider_service_mappings.user_id')
            ->leftJoin('service_providers', 'service_providers.user_id', '=','users.id')
            ->leftJoin('documents', 'documents.user_id', '=','users.id')
            ->select('users.*',
                'service_providers.resident_country',
                'documents.type as doc',
                'documents.doc_name as document_image')
            ->groupBy('provider_service_mappings.user_id')
            ->get();
        return response()->json($results);
    }

    public function get_providers_by_service_category(Request $request) {
        $service_id = $request->input('service_id');
        $category_id = $request->input('category_id');
        $results = ProviderServiceMapping::where('service_id', '=', $service_id)
            ->where('category_id', '=', $category_id)
            ->leftJoin('users', 'users.id', '=','provider_service_mappings.user_id')
            ->leftJoin('service_providers', 'service_providers.user_id', '=','users.id')
            ->leftJoin('documents', 'documents.user_id', '=','users.id')
            ->select('users.*',
                'service_providers.resident_country',
                'documents.type as doc',
                'documents.doc_name as document_image')
            ->groupBy('provider_service_mappings.user_id')
            ->get();
        return response()->json($results);
    }

    public function get_service_categories(Request $request)
    {
        $service_id = $request->input('id');

        $results = ServiceMapping::where('service_id', '=', $service_id)
            ->leftJoin('sub_categories', 'sub_categories.id', '=','service_mappings.category_id')->get();

        return $results;
    }

    public function get_services(Request $request)
    {
        $id = $request->input('id');
        $host = url('/');
        if($id) {
            $service = services::find($id);
            if($service) {
                $service["icon_image"] =  $host . $service['icon_image'];
                if($service['banner_image']) {
                    $service["banner_image"] = $host . $service['banner_image'];
                }
                $listMapped = ServiceMapping::where('service_id','=',$service['id'])->get();
                $category = new Collection();
                foreach ($listMapped as $mapping) {
                    $listCategories = SubCategories::find($mapping['category_id']);
//                    $listCategories["image"] = $host . "/images/subcategories/" . $listCategories['image'];
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
                    $service["icon_image"] = $host . $service['icon_image'];
                    if($service['banner_image']) {
                        $service["banner_image"] = $host . $service['banner_image'];
                    }
                    $listMapped = ServiceMapping::where('service_id','=',$service['id'])->get();
                    $category = new Collection();
                    foreach ($listMapped as $mapping) {
                        $listCategories = SubCategories::find($mapping['category_id']);
                        $listCategories["image"] = $host . $listCategories['image'];
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
