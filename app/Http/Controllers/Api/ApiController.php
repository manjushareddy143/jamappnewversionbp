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

    //Login Api

/**
* @SWG\Post(
* path="/api/v1/user-login",
* summary="User Login",
* description="User will be logged in",
* operationId="userLogin",
* consumes={"application/xml","application/json"},
* produces={"application/json"},
* @SWG\Parameter(
* in="body",
* name="body",
* description="Enter email address and password for user login",
* required=true,
* @SWG\Definition(
* definition="users",
* required={"username","passwrod"},
* @SWG\Property(
* description="Enter Email id",
* property="username",
* type="string"
* ),
* @SWG\Property(
* description="Enter User Password",
* property="password",
* type="string"
* ),
* @SWG\Property(
* description="Enter Device Token",
* property="device_token",
* type="string"
* ),
* )
* ),
* @SWG\Response(
* response=200,
* description="User logged in Successfully!"
* ),
* @SWG\Response(response=404, description="Page not Found"),
* @SWG\Response(response=500, description="internal server error"),
* )
*
*/

}