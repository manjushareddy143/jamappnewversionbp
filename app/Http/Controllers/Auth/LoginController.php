<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\ServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    public function customLogin(Request $request) {


        $credentials = $request->only('email', 'password');
//        dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            $response = array();
            $response = Auth::user();
            $roles = Auth::user()->roles;
//            $permission = Auth::user()->permissions;
//            echo $response; exit();
            //->roles

//            $username = $request->input('email');
//            $checkuser  = User::where('email', '=', $username)->first();

            if($response->type_id == 1){
                $response['status'] = true;
                return response($response, 200)
                    ->header('content-type', 'application/json');
            }

            if($response->type_id == 3)
            {
//                        dd(\Session::getId());
                $service_provider = ServiceProvider::where('user_id', '=', $response->id)->first();
                $response['resident_country'] = $service_provider['resident_country'];

            }
//            $response = $checkuser;
//            echo ($checkuser['id']); exit();
            $address = Address::where('user_id', '=', $response->id)->first();

//            echo ($address); exit();
            $response['address'] = $address;
            $response['status'] = true;
            return response($response, 200)
                ->header('content-type', 'application/json');
//            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false], 401);
        }
    }

    public function customLogOut(Request $request) {
        Auth::logout();
        return redirect('login');
    }
}
