<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderServiceMapping extends Model
{
    protected $table = "provider_service_mappings";

    protected $fillable = ['user_id', 'service_id', 'category_id'];

    public function user() {
        return $this->hasMany(User::class, 'id' , 'user_id')->with('provider')->with('rate')
        ->with('organisation');
    }

    public function service() {
        return $this->hasOne(services::class, 'id' , 'service_id');
    }

}
