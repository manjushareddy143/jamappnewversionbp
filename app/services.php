<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    protected $table = "services";

    protected $fillable = ['name', 'icon_image', 'banner_image', 'description'];
}
