<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    // It define the database table name to fetch the data
    protected $table = "services";

    protected $fillable = [
        'servicename',
        'cost',
    ];
}
