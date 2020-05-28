<?php

namespace App\Http\Controllers;

use App\Booking;
use App\BookingCancellation;
use App\FCMDevices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Scalar\String_;
use Psy\Util\Json;
use Validator;

class FCMPushNotification extends Controller
{
    public function orderAccept(Request $request) {
        $response = array();
        $initialValidator = Validator::make($request->all(),
            [
                'status' => 'required',
                'booking_id' => 'required|exists:bookings,id',
//                'provider_id' => 'required|exists:service_providers,user_id',
//                'user_id' => 'required|exists:bookings,user_id'
            ]
        );

        if ($initialValidator->fails())
        {
            return response()->json(['error'=>$initialValidator->errors()], 401);
        }
        $input = $request->all();

        $booking = Booking::where('id', '=', $input['booking_id'])->first();

        $orderStatus = [
            'status' => $input['status'],
        ];

        $isUpdate = DB::table('bookings')->where('id', $input['booking_id'])->update($orderStatus);

        if ($isUpdate) {
            // send notification



            if ($input['status'] == 2) {
                // Accept order
                $notification =  [
                    "title" => 'JAM',
                    "body" => "Order Accept",
                ];
                $dataPayload = [
                    "order" => "2",
                ];


                $fcm_customer = FCMDevices::where('user_id', '=', $booking['user_id'])->get();
                foreach ($fcm_customer as $fcm) {
//                    $pushnotification = [
//                        "f_c_m_device_id" => $fcm->id,
//                        "title" =>$notification['title'],
//                        "message" =>$notixfication['body '],
//                        "data" => $dataPayload->toString(),
//                    ];
//                    FCMPushNotification::create($pushnotification);
                    $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
                }
                return response($fcm_customer, 200)
                    ->header('content-type', 'application/json');

            }
            else if ($input['status'] == 3) {
                // Cancel Order by provider

                $cancellation =  [
                    "booking_id" => $input['booking_id'],
                    "reason" => $input['reason'],
                    "comment" => $input['comment'],
                ];

                BookingCancellation::create($cancellation);

                $notification =  [
                    "title" => 'JAM',
                    "body" => "Order Cancel by provider",
                ];
                $dataPayload = [
                    "order" => "3",
                ];
                $fcm_customer = FCMDevices::where('user_id', '=', $booking['user_id'])->get();
                foreach ($fcm_customer as $fcm) {
                    $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
                }
                return response($fcm_customer, 200)
                    ->header('content-type', 'application/json');
            }
            else if ($input['status'] == 4) {
                // Cancel Order by user
                $notification =  [
                    "title" => 'JAM',
                    "body" => "Order Cancel by user",
                ];
                $dataPayload = [
                    "order" => "4",
                ];
                $fcm_provider = FCMDevices::where('user_id', '=', $booking['provider_id'])->get();
                foreach ($fcm_provider as $fcm) {
                    $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
                }
                return response($fcm_provider, 200)
                    ->header('content-type', 'application/json');
            }
            else if($input['status'] == 5) {
                // order complete successfully
                $notification =  [
                    "title" => 'JAM',
                    "body" => "Order Complete",
                ];
                $dataPayload = [
                    "order" => "5",
                ];

                $fcm_customer = FCMDevices::where('user_id', '=', $booking['user_id'])->get();
                foreach ($fcm_customer as $fcm) {
//                    $pushnotification = [
//                        "f_c_m_device_id" => $fcm->id,
//                        "title" =>$notification['title'],
//                        "message" =>$notixfication['body '],
//                        "data" => $dataPayload->toString(),
//                    ];
//                    FCMPushNotification::create($pushnotification);
                    $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
                }
                return response($fcm_customer, 200)
                    ->header('content-type', 'application/json');
            }
        }

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

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        curl_exec($ch);

//        echo $ch; exit();
//        return  response()->json(['Message'=> $ch], 200);
    }
}
