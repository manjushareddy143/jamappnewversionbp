<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    protected $table = "service_providers";

    protected $fillable = ['user_id', 'resident_country', 'proof_id'];
}
