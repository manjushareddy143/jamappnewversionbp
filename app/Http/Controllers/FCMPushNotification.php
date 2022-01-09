<?php

namespace App\Http\Controllers;

use App\Booking;
use App\BookingCancellation;
use App\ProviderServiceMapping;
use App\FCMDevices;
use App\Mail\BookingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Scalar\String_;
use Psy\Util\Json;
use Validator;
use Mail;
use Twilio\Rest\Client;
use App\Jobs\NotificationJob;

class FCMPushNotification extends Controller
{

    public function requestVendor(Request $request)
    {
        $input = $request->all();
        $booking = Booking::where('id', '=', $input['booking_id'])->first();

        $vendor = ProviderServiceMapping::where('service_id', '=', $booking->service_id)
                ->where('category_id', '=', $booking->category_id)->first();

        $orderStatus = [
            'status' => 8,
            'provider_id' => $vendor->user_id,
        ];

        $isUpdate = DB::table('bookings')->where('id', $input['booking_id'])->update($orderStatus);

        // $details=array();
        // Mail::to('tpsvishwas78@gmail.com')->send(new BookingMail($details));

        // $body = "Hello, welcome to message from tapas testing.";

        // $this->whatsappNotification($booking->contact, $body);

        echo 1;
    }

    public function orderAccept(Request $request) {

        $response = array();
        $initialValidator = Validator::make($request->all(),
            [
                'status' => 'required',
                'booking_id' => 'required|exists:bookings,id',
            ]
        );

        if ($initialValidator->fails())
        {
            return response()->json(['error'=>$initialValidator->errors()], 406);
        }
        $input = $request->all();

        $booking = Booking::where('id', '=', $input['booking_id'])->first();
        if($input['status'] == 7) {
            $validator = Validator::make($request->all(),
                [
                    'otp' => 'required|exists:bookings,otp',
                ]);

            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()], 406);
            }

            if($booking['otp'] != $input['otp']) {
                return response()->json(['error'=>"Invalid OTP"], 406);
            }
        }
        $orderStatus = [
            'status' => $input['status'],
        ];

        $isUpdate = DB::table('bookings')->where('id', $input['booking_id'])->update($orderStatus);

        if ($isUpdate) {

            //for user notification

                $body = "Hello, ".$booking->orderer_name." Your order status has been changed!";
				$details['msg']='Your order status has been changed!';
				$details['subject']='Order status!';
				$details['name']=$booking->orderer_name;
				$details['email']=$booking->email;
				$details['contact']=$booking->contact;
				$details['body']=$body;

                dispatch(new NotificationJob($details));

            // send notification
            // ACCEPT ORDER
            if ($input['status'] == 2) {
                // Accept order
                $notification =  [
                    "title" => 'JAM',
                    "body" => "Order Accept By JamApp",
                ];
                $dataPayload = [
                    "order" => $booking['id'],
                    "status" => "2",
                ];


                $fcm_customer = FCMDevices::where('user_id', '=', $booking['user_id'])->get();
                foreach ($fcm_customer as $fcm) {
                // $pushnotification = [
                // "f_c_m_device_id" => $fcm->id,
                // "title" =>$notification['title'],
                // "message" =>$notixfication['body '],
                // "data" => $dataPayload->toString(),
                // ];
                // FCMPushNotification::create($pushnotification);
                    $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
                }

                $fcm_customer = FCMDevices::where('user_id', '=', $booking['provider_id'])->get();
                foreach ($fcm_customer as $fcm) {
                    $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
                }
                // return response($fcm_customer, 200)
                //     ->header('content-type', 'application/json');
                    return response()->json(
                        [
                            "message" => "Order Accept By JamApp",
                            "content" => $booking
                        ],
                        201
                    );
            }else if ($input['status'] == 3) {
                // Accept order
                $notification =  [
                    "title" => 'Vendor',
                    "body" => "Order Accept By Vendor",
                ];
                $dataPayload = [
                    "order" => $booking['id'],
                    "status" => "3",
                ];


                $fcm_customer = FCMDevices::where('user_id', '=', $booking['user_id'])->get();
                foreach ($fcm_customer as $fcm) {
                // $pushnotification = [
                // "f_c_m_device_id" => $fcm->id,
                // "title" =>$notification['title'],
                // "message" =>$notixfication['body '],
                // "data" => $dataPayload->toString(),
                // ];
                // FCMPushNotification::create($pushnotification);
                    $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
                }

                $fcm_customer = FCMDevices::where('user_id', '=', $booking['provider_id'])->get();
                foreach ($fcm_customer as $fcm) {
                    $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
                }
                return response()->json(
                    [
                        "message" => "Order Accept By Vendor",
                        "content" => $booking
                    ],
                    201
                );

            }
            // Cancel Order by provider
            else if ($input['status'] == 4) {


                $cancellation =  [
                    "booking_id" => $input['booking_id'],
                    "reason" => $input['reason'],
                    "comment" => array_key_exists('comment', $input) ? $input['comment'] : "",
                ];

                BookingCancellation::create($cancellation);

                $notification =  [
                    "title" => 'JAM',
                    "body" => "Order Cancel by jamapp",
                ];
                $dataPayload = [
                    "order" => $booking['id'],
                    "status" => "4",
                    "reason" => $input['reason'],
                    "comment" => array_key_exists('comment', $input) ? $input['comment'] : "",

                ];
                $fcm_customer = FCMDevices::where('user_id', '=', $booking['user_id'])->get();
                foreach ($fcm_customer as $fcm) {
                    $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
                }
                return response()->json(
                    [
                        "message" => "Order Cancel by jamapp",
                        "content" => $booking
                    ],
                    201
                );
            }else if ($input['status'] == 5) {


                $cancellation =  [
                    "booking_id" => $input['booking_id'],
                    "reason" => $input['reason'],
                    "comment" => array_key_exists('comment', $input) ? $input['comment'] : "",
                ];

                BookingCancellation::create($cancellation);

                $notification =  [
                    "title" => 'JAM',
                    "body" => "Order Cancel by provider",
                ];
                $dataPayload = [
                    "order" => $booking['id'],
                    "status" => "5",
                    "reason" => $input['reason'],
                    "comment" => array_key_exists('comment', $input) ? $input['comment'] : "",

                ];
                $fcm_customer = FCMDevices::where('user_id', '=', $booking['user_id'])->get();
                foreach ($fcm_customer as $fcm) {
                    $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
                }
                return response()->json(
                    [
                        "message" => "Order Cancel by provider",
                        "content" => $booking
                    ],
                    201
                );
            }
            // Cancel Order by user
            else if ($input['status'] == 9) {


                $cancellation =  [
                    "booking_id" => $input['booking_id'],
                    "reason" => $input['reason'],
                    "comment" => array_key_exists('comment', $input) ? $input['comment'] : "",
                ];

                BookingCancellation::create($cancellation);

                $notification =  [
                    "title" => 'JAM',
                    "body" => "Order Cancel by user",
                ];
                $dataPayload = [
                    "order" => $booking['id'],
                    "status" => "9",
                ];
                $fcm_provider = FCMDevices::where('user_id', '=', $booking['provider_id'])->get();
                foreach ($fcm_provider as $fcm) {
                    $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
                }
                return response()->json(
                    [
                        "message" => "Order Cancel by user",
                        "content" => $booking
                    ],
                    201
                );
            }
            // order complete successfully
            else if($input['status'] == 7) {
                $notification =  [
                    "title" => 'JAM',
                    "body" => "Order Complete",
                ];
                $dataPayload = [
                    "order" => $booking['id'],
                    "status" => "5",
                ];

                $fcm_customer = FCMDevices::where('user_id', '=', $booking['user_id'])->get();
                foreach ($fcm_customer as $fcm) {
                    $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
                }
                return response()->json(
                    [
                        "message" => "Order Complete",
                        "content" => $booking
                    ],
                    201
                );
            }
            // SHOW COST
             else if($input['status'] == 6) {
                $notification =  [
                    "title" => 'JAM',
                    "body" => "Invoice Submitted",
                ];
                $dataPayload = [
                    "order" => $booking['id'],
                    "status" => "6",
                ];

                $fcm_customer = FCMDevices::where('user_id', '=', $booking['user_id'])->get();
                foreach ($fcm_customer as $fcm) {
                    $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
                }
                return response()->json(
                    [
                        "message" => "Invoice Submitted",
                        "content" => $booking
                    ],
                    201
                );
            }
             else if($input['status'] == 8) {
                $notification =  [
                    "title" => 'JAM',
                    "body" => "Waiting for vendor",
                ];
                $dataPayload = [
                    "order" => $booking['id'],
                    "status" => "8",
                ];

                $fcm_customer = FCMDevices::where('user_id', '=', $booking['user_id'])->get();
                foreach ($fcm_customer as $fcm) {
                    $this->sendPush($fcm->fcm_device_token, $notification, $dataPayload);
                }
                return response()->json(
                    [
                        "message" => "Waiting for vendor",
                        "content" => $booking
                    ],
                    201
                );
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

        $ch = \curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        curl_exec($ch);
    }
}
