<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForgetPasswordVerification extends Model
{
    protected $table = "forgetpassword_verification";

    protected $fillable = ['user_id', 'otp', 'is_verified'];
}
