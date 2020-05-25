<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "bookings";

    protected $fillable = ['user_id', 'service_id', 'category_id', 'orderer_name'	,'email', 'contact', 'start_time',
        'end_time' ,'remark', 'booking_date', 'provider_id', 'status', 'otp'];
}
