<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FCMPushNotification extends Controller
{
    public function sendPush(Request $request)
    {
//        $user = User::find($request->id);
        $data = [
            "to" => 'fl1V_Prc1hk:APA91bGwgerTFf0R0VhqJHZW9PxSDk75_YvdKf6bxyz28htVaaD1dqVOKTqGHjD2wa6rf1J456B10z4ibtIS4lTZQmM5lZuytM87IDsnlBGGQ2ie3bm1rh7m-uycLeHnMo9j-AZBafgy',
            "notification" =>
                [
                    "title" => 'Web Push',
                    "body" => "Sample Notification",
//                    "icon" => 'https://staging.jam-app.com/img/logo/jam-logo.png',
                    //url('/logo.png')
                ],
            "data" => [
                "mayur" => "khuman",
                "yo" => "no",
                "hmm" => "glld",
            ]
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

        echo $ch; exit();
        return  response()->json(['Message'=> $ch], 200);
    }
}
