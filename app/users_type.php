<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users_type extends Model
{
    //It will add data into users_type table
     protected $table = "users_type";

     protected $fillable = [
         'id',
         'types',
         'details',
     ];
}
