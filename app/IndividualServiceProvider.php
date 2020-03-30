<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualServiceProvider extends Model
{
     //It will add data into individualserviceprovidermaster table
     protected $table = "individualserviceprovidermaster";

     protected $fillable = [
         'user_id',
         'gender',
         'languages_known',
         'timing',
         'experience',

     ];
}
