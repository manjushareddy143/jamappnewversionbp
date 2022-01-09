<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceMapping extends Model
{
    protected $table = "service_mappings";

    protected $fillable = ['service_id', 'category_id'];

    public function service(){
        return $this->hasOne('App\services','id','service_id');
    }

    public function subService(){
        return $this->hasOne('App\SubCategories','id','category_id');
    }

}
