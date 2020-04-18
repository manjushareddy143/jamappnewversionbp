<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceMapping extends Model
{
    protected $table = "service_mappings";

    protected $fillable = ['service_id', 'category_id'];

}
