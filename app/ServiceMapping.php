<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceMapping extends Model
{
    protected $table = "service_mappings";

    protected $fillable = ['service_id', 'category_id'];


    public function getData($service_id,$category_id) {
     return [
         "service" => services::find($service_id);
     ];
    }


}
