<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FCMDevices extends Model
{
    protected $table = "f_c_m_devices";

    protected $fillable = ['user_id', 'fcm_device_token', 'device_type' ];
}
