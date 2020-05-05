<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";

    protected $fillable = ['name', 'address_line1', 'address_line2', 'landmark', 'district',
        'city',	'postal_code', 'location', 'user_id',	];
}
