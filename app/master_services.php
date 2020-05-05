<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_services extends Model
{
    //It fill up the data into master_services table
    protected $table = "master_services";

    protected $fillable = [
       'id',
       'name',
       'icon_image',
       'banner_image',
       'description',
    ];
}
