<?php

namespace App\Http\Controllers;

use App\Address;
use App\Booking;
use App\FCMDevices;
use App\Invoice;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use PDF;
use Symfony\Component\Console\Input\Input;


class BookingController extends Controller
{

    public function booking(Request $request) {

        $response = array();
        $validator = Validator::make($request->all(),
            [
                'user_id' => 'required|exists:users,id',
                'service_id'  => 'required|exists:services,id',
        //                'category_id' => 'required|exists:sub_categories,id',
                "booking_date" => "required|date",
                'contact' => 'required',
                "start_time" => "required|before:end_time",
                "end_time" => "required",
                "provider_id" => "required|exists:service_providers,user_id"
            ]);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()], 406);
        }


        $input = $request->all();

        $startTime = new \DateTime($input['booking_date']);
        $dd = $startTime->format('d-m-Y');


        $dateTime = Carbon::parse($dd);//->format('d-m-Y');
        $input['booking_date'] = $dateTime;
        $input['status'] = 1;
        $input['otp'] = rand(1000,9999);


        $booking = Booking::create($input);


        //////// BOOKING
        $notification =  [
            "title" => 'JAM',
            "body" => "Booking Placed",
        ];


        $dataPayload = [
            "order" => $booking['id'],
        ];


        $fcm_customer = FCMDevices::where('user_id', '=', $input['provider_id'])->get();
        foreach ($fcm_customer as $fcm) {
            $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
        }
        ////////////

        return response($booking, 200)
            ->header('content-type', 'application/json');

        return response()->json($request);
    }


    public function getOrganisationOrders(Request $request) {

        $org_id = $request->input('id');
        $result = Booking::with('invoice')->with('users')
                   ->with('services')
                   ->with('category')
                   ->with('provider')
                   ->whereHas('provider', function($q) use($org_id){
                    $q->where('org_id', '=', $org_id);
                })->with('address')->with('rating')->get();

                return response()->json($result);
    }


    public function getOrderByProvider(Request $request) {

        $user_id = $request->input('id');

               $result = Booking::with('invoice')->with('users')
                   ->with('services')
                   ->with('category')
                   ->with('provider')
                   ->with('address')
                   ->with('rating')
                   ->where('provider_id', '=', $user_id)->get();

        // $result = Booking::where('provider_id', '=', $user_id)
        //     ->leftJoin('users', 'users.id', '=','bookings.provider_id')
        //     ->leftJoin('services', 'services.id', '=','bookings.service_id')
        //     ->leftJoin('sub_categories', 'sub_categories.id', '=','bookings.category_id')
        //     ->leftJoin('experiences', 'experiences.booking_id', '=','bookings.id')
        //     ->select('bookings.*',
        //         'users.first_name as provider_first_name', 'users.last_name as provider_last_name',
        //         'users.image as provider_image',
        //         'services.name as service',
        //         'sub_categories.name as category',
        //         'experiences.rating as rating', 'experiences.comment as comment')
        //     ->groupBy('bookings.id')
        //     ->get();

        // $response = array();
        // foreach ($result as $obj) {
        //     $data = array();
        //     $data = $obj;
        //    // $user = User::where('id','=',$obj->user_id)->first();
        //     $address = Address::where('user_id', '=', $obj->user_id)->first();
        //    // $data['order_user'] = $user;
        //     $data['address'] = $address;
        //     array_push($response, $data);
        // }


        return response()->json($result);
    }

    public  function getorderbyuser(Request $request) {

        $user_id = $request->input('id');

        $result = Booking::with('invoice')->with('users')
            ->with('services')
            ->with('category')
            ->with('provider')
            ->with('address')
            ->with('rating')
            ->where('user_id','=', $user_id)->get();
        // $result = Booking::where('user_id', '=', $user_id)
        //     ->leftJoin('users', 'users.id', '=','bookings.provider_id')
        //     ->leftJoin('services', 'services.id', '=','bookings.service_id')
        //     ->leftJoin('sub_categories', 'sub_categories.id', '=','bookings.category_id')
        //     ->leftJoin('experiences', 'experiences.booking_id', '=','bookings.id')
        //     ->select('bookings.*',
        //         'users.first_name as provider_first_name', 'users.last_name as provider_last_name',
        //         'users.image as provider_image',
        //         'services.name as service',
        //         'sub_categories.name as category',
        //         'experiences.rating as rating', 'experiences.comment as comment')
        //     ->groupBy('bookings.id')
        //     ->get();

        // $response = array();
        // foreach ($result as $obj) {
        //     $data = array();
        //     $data = $obj;
        //     $address = Address::where('user_id', '=', $obj->user_id)->first();
        //     $data['address'] = $address;
        //     array_push($response, $data);
        // }

        return response()->json($result);
    }

    public  function getorder($id) {
        $result = Booking::with('invoice')->with('users')->with('services')->with('category')->with('provider')->with('address')->with('rating')->where('id', '=', $id)->first();
        return response()->json($result);
    }

    public function getallbooking(Request $request) {

        $result = Booking::with('invoice')->with('users')->with('services')->with('category')
        ->with('provider')->get();
        return response()->json($result);
    }

    public function orderbyid($id)
    {
        $booking=Booking::where('bookings.id', '=', $id)
            ->leftjoin('services', 'bookings.service_id', '=', 'services.id')
            ->leftjoin('addresses', 'addresses.user_id', '=', 'users.id')
            ->select('bookings.*',
                'services.name as servicename',
                'addresses.name as addressname',
                'addresses.address_line1 as address_line1',
                'addresses.address_line2 as address_line2')
            ->get();


        return response()->json($booking, 200);
    }

    public function invoice(Request $request) {


        $initialValidator = Validator::make($request->all(),
        [
            'order_id' => 'required|exists:bookings,id',
            'working_hr' => 'required',
            'tax_rate' => 'required',
            'tax' => 'required',
        ]);

        if ($initialValidator->fails())
        {
            return response()->json(['error'=>$initialValidator->errors()], 406);
        }

        $input = $request->all();
        $result = Invoice::create($input);

        $booking = Booking::where('id', '=', $input['order_id'])->first();
        $notification =  [
            "title" => 'JAM',
            "body" => "Check Total Cost",
        ];

        $result = Invoice::where('order_id', '=', $input['order_id'])->first();
        $dataPayload = [
            "order" => $booking['id'],
            "status" => "6",
            "invoice" => $result
        ];

        $orderStatus = [
            'status' => "6",
        ];

        $isUpdate = DB::table('bookings')->where('id', $input['order_id'])->update($orderStatus);

        $fcm_customer = FCMDevices::where('user_id', '=', $booking['user_id'])->get();
        foreach ($fcm_customer as $fcm) {
            $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
        }

        return response()->json($result);
    }

    public function sendPush(string $token, array $notification, array $data_payload)
    {

        $data = [
            "to" => $token,
            "notification" => $notification,
            "data" => $data_payload
        ];
        $dataString = json_encode($data);

        //'AIzaSyAByZ6mHqPhd1Pl3KHcUiXJSQ-8EGOW-6s',
        $headers = [
            'Authorization: key=' . config('app.firebase_server_key'),
            'Content-Type: application/json',
        ];

        $ch = \curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        curl_exec($ch);
    }

    public function showInvoice()
    {


       // This  $data array will be passed to our PDF blade
        $data = [];

        // PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')
        $result = Invoice::with('order')->where('order_id', '=', 7)->first();
        // return $result;
        $cost = 0;
        foreach ($result->order->provider->providerDetail as $services) {
            if($result->order->services->id == $services->service_id && $result->order->category->id == $services->category_id) {
                $cost = $services->price;
            }
        }

        $serviceAmount = $result->working_hr * $cost;

        $meterialAmount = $result->material_quantity * $result->material_price;
        $additional_total = $result->additional_charges * $result->working_hr;
        $sub_total = $serviceAmount + $additional_total + $meterialAmount;

        $total_discount = $sub_total - $result->discount; ///100;

        // $totalWithDiscount = $sub_total - $total_discount;

        $taxCut =  $total_discount * $result->tax /100;

        $total = $total_discount - $taxCut;


        $client_street = "";
        $client_city_state_country = "";
        $client_zip = "";

        foreach($result->order->users->address as $address) {

            $client_street = $address->address_line1 . " " .$address->address_line2;
            $client_city_state_country = $address->district . " " . $address->city;
            $client_zip = $address->postal_code;
        }

        // return response()->json($client_zip);
        // print_r($result); exit();

        $data = [
            'client_name' => $result->order->users->first_name,
            'client_street' => $client_street,
            'client_city_state_country' => $client_city_state_country,
            'client_zip' => $client_zip,
            'order_id' => $result->order_id,
            'order_date' => $result->order->booking_date,
            'service_name' => $result->order->services->name . " - " . $result->order->category->name,
            'service_cost' => $cost,
            'working_hr' => $result->working_hr,
            'service_amount' => $serviceAmount,
            'material_name' => $result->material_names,
            'material_qty' => $result->material_quantity,
            'material_cost' => $result->material_price,
            'material_amout' => $meterialAmount,
            'additional_cost' => $result->additional_charges,
            'additional_hr' => $result->working_hr,
            'additional_total' => $additional_total,
            'sub_total' => $sub_total,
            'discount' => $result->discount,
            'tax' => $result->tax,
            'total' => $total

        ];


        return view('invoice.invoice')->with('data', $data);
    }

    public function printPDF(Request $request)
    {

        $id = $request->input('id');
       // This  $data array will be passed to our PDF blade
        $data = [];

        // PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')
        $result = Invoice::with('order')->where('order_id', '=', $id)->first();

        $cost = 0;
        foreach ($result->order->provider->providerDetail as $services) {
            if($result->order->services->id == $services->service_id && $result->order->category->id == $services->category_id) {
                $cost = $services->price;
            }
        }

        $serviceAmount = $result->working_hr * $cost;

        $meterialAmount = $result->material_quantity * $result->material_price;
        $additional_total = $result->additional_charges * $result->working_hr;
        $sub_total = $serviceAmount + $additional_total + $meterialAmount;

        $total_discount = $sub_total - $result->discount; ///100;

        // $totalWithDiscount = $sub_total - $total_discount;

        $taxCut =  $total_discount * $result->tax /100;

        $total = $total_discount - $taxCut;


        $client_street = "";
        $client_city_state_country = "";
        $client_zip = "";

        foreach($result->order->users->address as $address) {

            $client_street = $address->address_line1 . " " .$address->address_line2;
            $client_city_state_country = $address->district . " " . $address->city;
            $client_zip = $address->postal_code;
        }

        // return response()->json($client_zip);
        // print_r($result); exit();

        $data = [
            'client_name' => $result->order->users->first_name,
            'client_street' => $client_street,
            'client_city_state_country' => $client_city_state_country,
            'client_zip' => $client_zip,
            'order_id' => $result->order_id,
            'order_date' => $result->order->booking_date,
            'service_name' => $result->order->services->name . " - " . $result->order->category->name,
            'service_cost' => $cost,
            'working_hr' => $result->working_hr,
            'service_amount' => $serviceAmount,
            'material_name' => $result->material_names,
            'material_qty' => $result->material_quantity,
            'material_cost' => $result->material_price,
            'material_amout' => $meterialAmount,
            'additional_cost' => $result->additional_charges,
            'additional_hr' => $result->working_hr,
            'additional_total' => $additional_total,
            'sub_total' => $sub_total,
            'discount' => $result->discount,
            'tax' => $result->tax,
            'total' => $total

        ];


        PDF::setOptions(['dpi' => 150]);

        $pdf = PDF::loadView('invoice.invoice', $data)->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->download('invoice.pdf');

    }

    public function getInvoice(Request $request) {
        $initialValidator = Validator::make($request->all(),
        [
            'order' => 'required|exists:bookings,id',
        ]);

        if ($initialValidator->fails())
        {
            return response()->json(['error'=>$initialValidator->errors()], 406);
        }
        $id = $request->input('order');
        $result = Invoice::where('order_id', $id)->first();
        return response()->json($result);
    }

    public function downloadPDF()
    {
        // PDF::setOptions(['dpi' => 150]);
        // $pdf = PDF::loadView('invoice.invoice', [])->setPaper('a4', 'portrait')->setWarnings(false);
        // return $pdf->download('medium.pdf');
    }


    public function updateinvoicedetail(Request $request)
    {


        $input = $request->all();

        $updatedata = [];
        if(array_key_exists('order_id', $input)) {
            $updatedata += [
                'order_id' => $input['order_id'],
            ];
        }

        if(array_key_exists('working_hr', $input)) {
            $updatedata += [
                'working_hr' => $input['working_hr'],
            ];
        }
        if(array_key_exists('material_quantity', $input)) {
            $updatedata += [
                'material_quantity' => $input['material_quantity'],
            ];

        }
        if(array_key_exists('material_price', $input)) {
            $updatedata += [
                'material_price' => $input['material_price'],
            ];

        }
        if(array_key_exists('discount', $input)) {
            $updatedata += [
                'discount' => $input['discount'],
            ];

        }
        if(array_key_exists('tax', $input)) {
            $updatedata += [
                'tax' => $input['tax'],
            ];

        }
        if(array_key_exists('additional_charges', $input)) {
            $updatedata += [
                'additional_charges' => $input['additional_charges'],
            ];
        }

        $isUpdate = DB::table('invoice')->where('order_id', (int)$input['order_id'])->update($updatedata);
        if($isUpdate) {

            $dataPayload = [
                "order" => $input['order_id'],
                "status" => "6",
                "invoice" => $updatedata
            ];

            $notification =  [
                "title" => 'JAM',
                "body" => "Check Total Cost",
            ];

            $booking = Booking::where('id', '=', $input['order_id'])->first();
            $fcm_customer = FCMDevices::where('user_id', '=', $booking['user_id'])->get();
            foreach ($fcm_customer as $fcm) {
                $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
            }

            $fcm_customer = FCMDevices::where('user_id', '=', $booking['provider_id'])->get();
            foreach ($fcm_customer as $fcm) {
                $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
            }
        }
        return response()->json($isUpdate, 200);
    }

}
