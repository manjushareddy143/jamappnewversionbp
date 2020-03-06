<?php

namespace App\Http\Controllers\Api;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
/**
 * Class ApiController
 *
 * @package App\Http\Controllers\Api\
 *
 * @SWG\Swagger(
 *     @SWG\Info( * title="Jam",
 *     description="This is JAM API Swager Documentation" ,
 *     version="2.0.0"* ),
 *
 *     ),
 *     @SWG\Definition(
 *         definition="Error",
 *         required={"code", "message"},
 *         @SWG\Property(
 *             property="code",
 *             type="integer",
 *             format="int32"
 *         ),
 *         @SWG\Property(
 *             property="message",
 *             type="string"
 *         )
 *     )
 * )
 */

class ApiController extends controller
{


    public function __construct(Guard $auth, ExceptionLogger $exceptionLooger)
    {
        $this->auth = $auth;
        $this->exceptionLogger = $exceptionLooger;
    }


}





