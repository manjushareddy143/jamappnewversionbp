<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingCancellation extends Model
{
    protected $table = "booking_cancellations";

    protected $fillable = ['booking_id', 'reason', 'comment'];
}
