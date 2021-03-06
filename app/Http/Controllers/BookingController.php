<?php

namespace App\Http\Controllers;

use App\Address;
use App\Booking;
use App\FCMDevices;
use App\Invoice;
use App\ProviderServiceMapping;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use PDF;
use Symfony\Component\Console\Input\Input;
use Mail;
use Twilio\Rest\Client;
use App\Mail\BookingMail;
use App\Jobs\NotificationJob;

class BookingController extends Controller
{
    public function booking(Request $request) {

        $response = array();
        $validator = Validator::make($request->all(),[
            'user_id'       => 'required|exists:users,id',
            'service_id'    => 'required|exists:services,id',
            //'category_id' => 'required|exists:sub_categories,id',
            "booking_date"  => "required|date",
            'contact'       => 'required',
            "start_time"    => "required|before:end_time",
            "end_time"      => "required",
            "provider_id"   => "required|exists:service_providers,user_id"
        ]);

        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()], 406);
        }

        $input = $request->all();

        $startTime = new \DateTime($input['booking_date']);
        $dd = $startTime->format('d-m-Y');


        $dateTime = Carbon::parse($dd);//->format('d-m-Y');
        $input['booking_date'] = $dateTime;
        $input['status'] = 1;
        $input['otp'] = rand(1000,9999);
        // $input['address_id'] = 1;
        // return $input;

        $booking = Booking::create($input);

        $notification =  [
            "title" => 'JAM',
            "body" => "Booking Placed",
        ];

        $dataPayload = [
            "order" => $booking['id'],
            "status" => "1",
        ];

        $fcm_customer = FCMDevices::where('user_id', '=', $input['provider_id'])->get();
        foreach ($fcm_customer as $fcm) {
            $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
        }

        return response($booking, 200)->header('content-type', 'application/json');

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

    public function getOrderByFilter(Request $request) {
        $status = $request->input('status');
        // return $status;
        $result = Booking::with('invoice')->with('users')
                   ->with('services')
                   ->with('category')
                   ->with('provider')
                   ->with('address')->with('rating')
                   ->where('status' , '=' ,$status)->get();
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
            ->with('cancelled')
            ->where('user_id','=', $user_id)->get();

            $obj = [];
            $i = 0;

        foreach ($result as $data) {



            if($data->category_id != 0 && $data->category_id != null) {

                $price = ProviderServiceMapping::where('service_id', '=', $data->service_id)
                ->where('category_id', '=', $data->category_id)
                ->where('user_id', '=', $data->provider->id)->first();

                $data->service_price = $price;
            } else {

                $price = ProviderServiceMapping::where('service_id', '=', $data->service_id)
                ->where('user_id', '=', $data->provider->id)->first();

                // return $price;
                $data->service_price = $price;

            }

            $obj[$i] = $data;
            $i++;
            // return $obj;
        }
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

        return response()->json($obj);
    }

    public  function getorder($id) {
        $result = Booking::with('invoice')->with('cancelled')->with('users')->with('services')->with('category')->with('provider')->with('address')->with('rating')->where('id', '=', $id)->first();

        if($result->category_id != 0 && $result->category_id != null) {

            $price = ProviderServiceMapping::where('service_id', '=', $result->service_id)
            ->where('category_id', '=', $result->category_id)
            ->where('user_id', '=', @$result->provider->id)->first();

            $result->service_price = $price;
        } else {

            $price = ProviderServiceMapping::where('service_id', '=', $result->service_id)
            ->where('user_id', '=', $result->provider->id)->first();

            // return $price;
            $result->service_price = $price;

        }


        // return $result->services->id;

        return response()->json($result);
    }

    public function getallbooking(Request $request) {

        $result = Booking::with('invoice')->with('users')->with('services')->with('category')
        ->with('provider')->orderBy('id', 'desc')->get();
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
            // 'tax_rate' => 'required',
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

        $fcm_customer = FCMDevices::where('user_id', '=', $booking['provider_id'])->get();
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
            'client_name' => "JACKOB",
            'client_street' => "Ceprotec",
            'client_city_state_country' => "Qatar ??????????????????????6150",
            'client_zip' => "Qatar ??????????????????????6150",
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

        // PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')
        $result = Invoice::with('order')->where('order_id', '=', $id)->first();

        if($result->order->category_id != 0 && $result->order->category_id != null) {

            $price = ProviderServiceMapping::where('service_id', '=', $result->order->service_id)
            ->where('category_id', '=', $result->order->category_id)
            ->where('user_id', '=', $result->order->provider->id)->first();

            $result->order->service_price = $price;
        } else {

            $price = ProviderServiceMapping::where('service_id', '=', $result->order->service_id)
            ->where('user_id', '=', $result->order->provider->id)->first();

            // return $price;
            $result->order->service_price = $price;

        }

        // return $result;
        // $result = Booking::with('invoice')->with('users')
        //     ->with('services')
        //     ->with('category')
        //     ->with('provider')
        //     ->with('address')
        //     ->with('rating')
        //     ->where('id','=', $id)->get();



        $cost = $result->order->service_price->price;
        // return ;
        // foreach ($result->order->provider->providerDetail as $services) {

        //     if($result->order->category != null) {

        //         if($result->order->services->id == $services->service_id && $result->order->category->id == $services->category_id) {
        //             $cost = $services->price;
        //         }

        //     } else {
        //         if($result->order->services->id == $services->service_id) {
        //             $cost = $services->price;
        //         }
        //     }
        // }



        $serviceAmount = $result->working_hr * $cost;

        $meterialAmount = $result->material_quantity * $result->material_price;
        $additional_total = $result->additional_charges * $result->working_hr;
        $sub_total = $serviceAmount + $additional_total + $meterialAmount;

        $total_discount = $sub_total - (($result->discount * 100 )/100); ///100;

        // $totalWithDiscount = $sub_total - $total_discount;

        $taxCut =  ($total_discount * $result->tax) /100;

        $total = $total_discount + $taxCut;


        $client_street = "";
        $client_city_state_country = "";
        $client_zip = "";

        // return $result;


        if($result->order->address != null) {
            $client_street = $result->order->address->address_line1 . " " .$result->order->address->address_line2;
            $client_city_state_country = $result->order->address->district . " " . $result->order->address->city;
            $client_zip = $result->order->address->postal_code;
        }


        $name = $result->order->services->name;
        $name = ($result->order->category != null) ? $name. " - " . $result->order->category->name : $name;

        $data = [
            'client_name' => $result->order->users->first_name,
            'client_street' => $client_street,
            'client_city_state_country' => $client_city_state_country,
            'client_zip' => $client_zip,
            'order_id' => $result->order_id,
            'order_date' => $result->order->booking_date,
            'service_name' =>  $name ,
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
        // return $data;

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

    public function updateinvoicedetail(Request $request)
    {


        $input = $request->all();

        $updatedata = [];
        if(array_key_exists('order_id', $input)) {
            $updatedata += [
                'order_id' => $input['order_id'],
            ];
        }

        if(array_key_exists('service_price', $input)) {
            $updatedata += [
                'service_price' => $input['service_price'],
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

        $inv = DB::table('invoice')->where('order_id', (int)$input['order_id'])->first();
        if($inv != null) {
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
        } else {

            $booking = Booking::where('id', '=', $input['order_id'])->first();

            //for user notification

            $body = "Hello, ".$booking->orderer_name." Your booking Invoice Submitted";
            $details['msg']='Your booking Invoice Submitted';
            $details['subject']='Invoice Submitted on jamapp!';
            $details['name']=$booking->orderer_name;
            $details['email']=$booking->email;
            $details['contact']=$booking->contact;
            $details['body']=$body;

            dispatch(new NotificationJob($details));

            $isUpdate = $this->invoice($request);
            return $isUpdate;
            // $isUpdate = Invoice::create($input);
        }

        $booking = Booking::where('id', '=', $input['order_id'])->first();
        
        //for user notification

        $body = "Hello, ".$booking->orderer_name." Your booking Invoice Submitted";
        $details['msg']='Your booking Invoice Submitted';
        $details['subject']='Invoice Submitted on jamapp!';
        $details['name']=$booking->orderer_name;
        $details['email']=$booking->email;
        $details['contact']=$booking->contact;
        $details['body']=$body;

        dispatch(new NotificationJob($details));

        // return response()->json($isUpdate, 200);

        return response()->json(
            [
                "message" => "Invoice Submitted on jamapp",
                "content" => $booking
            ],
            201
        );
    }

    public function acceptandpay(Request $request)
    {
        $input = $request->all();
        $booking = Booking::where('id', '=', $input['booking_id'])->first();

        $orderStatus = [
            'status' => 7,
        ];

        $isUpdate = DB::table('bookings')->where('id', $input['booking_id'])->update($orderStatus);

        //for user notification

        $body = "Hello, ".$booking->orderer_name." Thanks for accept and pay our Quotation on jamapp!";
        $details['msg']='Thanks for accept and pay our Quotation on jamapp!';
        $details['subject']='Quotation accepted on jamapp!';
        $details['name']=$booking->orderer_name;
        $details['email']=$booking->email;
        $details['contact']=$booking->contact;
        $details['body']=$body;

        dispatch(new NotificationJob($details));

        //for admin notification

        $body = "Hello Admin, ".$booking->orderer_name." has accepted Quotation!";
        $details['msg']=$booking->orderer_name.' has accepted Quotation!';
        $details['subject']='Quotation accepted!';
        $details['name']='Admin';
        $details['email']=getenv("ADMIN_EMAIL");
        $details['contact']=getenv("ADMIN_CONTACT_NUMBER");
        $details['body']=$body;

        dispatch(new NotificationJob($details));

        // return response()->json($isUpdate, 200);
        return response()->json(
            [
                "message" => "Quotation accepted By user",
                "content" => $booking
            ],
            201
        );
    }

    public function cancelByUser(Request $request)
    {
        $input = $request->all();
        $booking = Booking::where('id', '=', $input['booking_id'])->first();


        $orderStatus = [
            'status' => 9,
        ];

        $isUpdate = DB::table('bookings')->where('id', $input['booking_id'])->update($orderStatus);

        //for admin notification

        $body = "Hello Admin, ".$booking->orderer_name." has rejected Quotation!";
        $details['msg']='Rejected booking by user!';
        $details['subject']=$booking->orderer_name." has rejected Quotation!";
        $details['name']='Admin';
        $details['email']=getenv("ADMIN_EMAIL");
        $details['contact']=getenv("ADMIN_CONTACT_NUMBER");
        $details['body']=$body;

        dispatch(new NotificationJob($details));

        return response()->json(
            [
                "message" => "Rejected booking by user",
                "content" => $booking
            ],
            201
        );
    }


}
