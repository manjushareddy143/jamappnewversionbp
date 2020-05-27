<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "bookings";

    protected $fillable = ['user_id', 'service_id', 'category_id', 'orderer_name'	,'email', 'contact', 'start_time',
        'end_time' ,'remark', 'booking_date', 'provider_id', 'status', 'otp'];

    public function users() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function address() {
        return $this->hasOne(Address::class, 'user_id', 'user_id');
    }

    public function provider() {
        return $this->hasOne(User::class, 'id', 'provider_id');
    }

    public function services() {
        return $this->hasOne(services::class, 'id', 'service_id');
    }
    public function category() {
        return $this->hasOne(SubCategories::class, 'id', 'category_id');
    }
}
