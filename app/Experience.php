<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = "experiences";

    protected $fillable = ['rating', 'comment', 'rate_by', 'rate_to','booking_id'];
}
