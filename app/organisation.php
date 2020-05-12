<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class organisation extends Model
{
    //
    protected $table = "organisation";

    protected $fillable = ['name', 'number_of_employee'];
}
