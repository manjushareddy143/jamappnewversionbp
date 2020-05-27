<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderServiceMapping extends Model
{
    protected $table = "provider_service_mappings";

    protected $fillable = ['user_id', 'service_id', 'category_id'];

}
