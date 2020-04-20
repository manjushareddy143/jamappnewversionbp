<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermAgreement extends Model
{
    protected $table = "term_agreements";

    protected $fillable = ['user_id', 'term_id', 'agreed_at'];
}
