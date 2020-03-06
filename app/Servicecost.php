<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicecost extends Model
{
    //
    protected $table = "tbl_servicecost";

    protected $fillable = [
        'services_id',
        'servicescategories_id',
        'servicecost',

    ];
}
