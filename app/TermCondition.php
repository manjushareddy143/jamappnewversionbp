<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermCondition extends Model
{
    protected $table = "term_conditions";

    protected $fillable = ['user_id', 'term_code', 'type', 'is_latest'];
}
