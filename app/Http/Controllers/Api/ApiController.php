<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;


class ApiController extends controller
{

    public function __construct(Guard $auth, ExceptionLogger $exceptionLooger)
    {
        $this->auth = $auth;
        $this->exceptionLogger = $exceptionLooger;

    }


}
