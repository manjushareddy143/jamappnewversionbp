<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    protected $table = "services";

    protected $fillable = ['name', 'icon_image', 'banner_image', 'description', 'price'];
    public function serviceusers() {
        return $this->hasManyThrough(\App\User::class, ProviderServiceMapping::class, 'service_id' , 'id');
    }
//    public function users() {
//        return $this->hasMany('provider_service_mappings', 'service_id', 'id');
//    }
//
//    public function user() {
//        return $this->hasManyThrough(\App\User::class, ProviderServiceMapping::class, 'user_id' , 'id');
//    }
}
