<?php

namespace App\Http\Controllers;

use App\ProviderServiceMapping;
use App\ServiceMapping;
use App\services;
use App\SubCategories;
use App\User;
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



        $lat = $request->input('lat');
        $long = $request->input('long');
        $service_id = $request->input('service_id');
        $category_id = $request->input('category_id');
        // return $category_id;

        $host = url('/');

        $result = ProviderServiceMapping::with('service')->with('user')->where('service_id', '=', $service_id)->where('user_id', '=' ,'3');

        if($category_id != 0 && $category_id != '') {

            $result = $result->where('category_id', '=', $category_id);

        }

        $result = $result->groupBy('user_id');


        $result = $result->get();
        $users = [];
        foreach ($result as $service) {
            // return $service;
            foreach ($service->user as $user) {
                if($user->org_id != null) {
                    $org_admin = User::where('org_id', $user->org_id)->where('type_id', 2)->first();
                    $user['organisation']['admin'] = $org_admin;
                    // echo($user); exit();
                }
                foreach ($user->address as $address) {
                    if($address->location != "") {
                        $location = explode(",",$address->location);

                        $distance = $this->getDistance($lat, $long, $location[0], $location[1]);
                        if($distance >= $user->provider->service_radius) {
                        } else {
                            if(array_search($user->id, array_column($users, 'id'))) {
                            } else {

                                $user['price'] = $service->price;


                                if (in_array($user, $users))
                                {
                                } else {
                                    array_push($users, $user);
                                }

                            }
                        }
                    }
                }

            }
        }
        return response()->json($users);
    }

    public function getDistance($userLat, $userLong, $vendorLat, $vendorLong) {

        $latitudeFrom = $userLat;//21.0987442;
        $longitudeFrom = $userLong;//71.7539072;


        $latitudeTo = $vendorLat;// 21.093098271540605;
        $longitudeTo = $vendorLong;//71.76618821918964;

        $theta    = $longitudeFrom - $longitudeTo;
        $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist    = acos($dist);
        $dist    = rad2deg($dist);
        $miles    = $dist * 60 * 1.1515;

        // Convert unit and return distance
        // $unit = 'K';
        // $unit = strtoupper($unit);
        // if($unit == "K"){
        return round($miles * 1.609344, 2);//.' km';
        // }elseif($unit == "M"){
        //     return round($miles * 1609.344, 2).' meters';
        // }else{
        //     return round($miles, 2).' miles';
        // }
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
        // return "test";
        $id = $request->input('id');
        // $host = url('/');
        if($id) {
            $service = services::find($id);
            if($service) {
                $service["icon_image"] = $service['icon_image'];
                if($service['banner_image']) {
                    $service["banner_image"] = $service['banner_image'];
                }
                $listMapped = ServiceMapping::where('service_id','=',$service['id'])->get();
                $category = new Collection();
                foreach ($listMapped as $mapping) {
                    $listCategories = SubCategories::find($mapping['category_id']);
                    // $listCategories["image"] = $host . "/images/subcategories/" . $listCategories['image'];
                    $category->push($listCategories);
                }
                $service["categories"] = $category;
                return response()->json($service, 200, [], JSON_UNESCAPED_UNICODE);
            } else {
                return response()->json(null, 204);
            }
        } else {
            $type = $request->input('type');
            if($type == 'web') {
                $listService = services::all();
            } else {
                $listService = services::where('is_enable', '=', '1')->get();
            }

            if($listService->count() > 0) {
                $result = new Collection();
                foreach ($listService as $service) {
                    $data = [];
                    $data = $service;
                    $service["icon_image"] =  $service['icon_image'];
                    if($service['banner_image']) {
                        $service["banner_image"] =  $service['banner_image'];
                    }
                    $listMapped = ServiceMapping::where('service_id','=',$service['id'])->get();
                    $category = new Collection();
                    foreach ($listMapped as $mapping) {
                        $listCategories = SubCategories::find($mapping['category_id']);
                        $listCategories["image"] =  $listCategories['image'];
                        $category->push($listCategories);
                    }
                    $data["categories"] = $category;
                    $result->push($data);
                }
                return response()->json($result, 200, [], JSON_UNESCAPED_UNICODE);
            } else {
                return response()->json(null, 204);
            }
        }
    }

}
