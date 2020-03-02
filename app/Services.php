<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    //
    protected $table = "services_table";

    protected $fillable = [
        'servicename',
        'cost',
    ];
}
