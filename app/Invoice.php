<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = "invoice";

    protected $fillable = ['order_id', 'working_hr', 'material_names', 'material_quantity',
     'material_price', 'additional_charges', 'discount', 'tax','service_price'];

     public function order() {
        return $this->hasOne(Booking::class, 'id', 'order_id')->with('address')->with('users')
        ->with('provider')->with('services')->with('category');
    }
}
