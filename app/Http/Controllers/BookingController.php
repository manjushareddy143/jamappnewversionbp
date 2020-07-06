<?php

namespace App\Http\Controllers;

use App\Address;
use App\Booking;
use App\Invoice;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

        return response($booking, 200)
            ->header('content-type', 'application/json');

        return response()->json($request);
    }



    public function getOrderByProvider(Request $request) {

        $user_id = $request->input('id');

               $result = Booking::with('users')
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

        $result = Booking::with('users')
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
        $result = Booking::with('users')->with('services')->with('category')->with('provider')->with('address')->with('rating')->where('id', '=', $id)->first();
        return response()->json($result);
    }

    public function getallbooking(Request $request) {

        $result = Booking::with('users')->with('services')->with('category')->with('provider')->get();
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
        $input = $request->all();

        $result = Invoice::create($input);

        // return view('invoice.invoice');
        return response()->json($result);

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

        $total_discount = $sub_total * $result->discount/100;

        $totalWithDiscount = $sub_total - $total_discount;

        $taxCut =  $totalWithDiscount * $result->tax /100;

        $total = $totalWithDiscount - $taxCut;

        // print_r($totalWithDiscount); exit();
        $data = [
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
            'additional_hr' => 0,
            'additional_total' => $additional_total,
            'sub_total' => $sub_total,
            'discount' => $result->discount,
            'tax' => $result->tax,
            'total' => $total

        ];

        // print_r($data); exit();
        PDF::setOptions(['dpi' => 150]);
        $pdf = PDF::loadView('invoice.invoice', $data)->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->download('medium.pdf');
        // return response()->json($result);
    }

    public function downloadPDF()
    {
        // PDF::setOptions(['dpi' => 150]);
        // $pdf = PDF::loadView('invoice.invoice', [])->setPaper('a4', 'portrait')->setWarnings(false);
        // return $pdf->download('medium.pdf');
    }
}
