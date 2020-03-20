<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Individualsp extends Model
{
    //It will add data into individualserviceprovidermaster table
    protected $table = "individualserviceprovidermaster";

    protected $fillable = [
        'usermaster_id',
        'gender',
        'languages known',
        'timing',
        'experience',

    ];

}
