<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FCMPushNotification extends Model
{
    protected $table = "f_c_m_push_notifications";

    protected $fillable = ['user_id', 'fcm_device_id', 'title', 'message' , 'data' ];
}
