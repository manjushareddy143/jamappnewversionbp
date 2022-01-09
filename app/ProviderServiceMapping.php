<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderServiceMapping extends Model
{
    protected $table = "provider_service_mappings";

    protected $fillable = ['user_id', 'service_id', 'category_id', 'price'];

    public function user() {
        // return $this->hasMany(User::class, 'id' , 'user_id')->with('addressWithServiceRadius');
       return $this->hasMany(User::class, 'id' , 'user_id')->with('provider')->with('rate')
        ->with('organisation')->with('address')->with('reviews')->withCount('jobs')->with('services');
    }

    public function service() {
        return $this->hasOne(services::class, 'id' , 'service_id');
    }

    public function categories() {
        return $this->hasOne(SubCategories::class, 'id' , 'category_id');
    }

    public function vendor(){
        return $this->hasOne('App\User','id','user_id');
    }

}
