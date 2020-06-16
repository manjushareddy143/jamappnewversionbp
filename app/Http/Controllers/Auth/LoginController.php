<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Role;
use App\ServiceProvider;
use App\TermAgreement;
use App\TermCondition;
use App\User;
use App\UserTypes;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function socialSignin(Request $request) {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $response = array();
            $response = Auth::user();
            $roles = Auth::user()->roles;

            if($response->type_id == 1){
                $response['status'] = true;
                return response($response, 200)
                    ->header('content-type', 'application/json');
            }

            if($response->type_id == 3)
            {
                $service_provider = ServiceProvider::where('user_id', '=', $response->id)->first();
                $response['resident_country'] = $service_provider['resident_country'];
            }

            $address = Address::where('user_id', '=', $response->id)->first();

            $response['address'] = $address;
            $response['status'] = true;
            return response($response, 200)
                ->header('content-type', 'application/json');
        } else {
            $input = $request->all();

            $type = UserTypes::where('type', '=', 'Individual Service Provider')->first();

            $input +=  [
                'type_id' => $type->id,
            ];

            $term = TermCondition::where('type', '=', 'Provider Terms')->where('is_latest', '=', 1)->first();
            $input +=  [
                'term_id' => $term->id,
            ];

            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            $customer_role = Role::where('slug','=', 'provider')->first();
            $user->roles()->attach($customer_role);

            $credentials = $request->only('email', 'password');
            if( Auth::attempt($credentials)) {

                $response = Auth::user();
                $roles = Auth::user()->roles;

                $address = Address::where('user_id', '=', $user->id)->first();
                $response['address'] = $address;

            //            $response  = $user;

                $now = now()->utc();
                $term_agreement= [
                    'user_id' => $user->id,
                    'term_id' => $input['term_id'],
                    'agreed_at' => $now
                ];
                TermAgreement::create($term_agreement);

                $service_provider= [
                    'user_id' => $user->id,
                ];
                ServiceProvider::create($service_provider);


                $address = Address::where('user_id', '=', $response->id)->first();

                $response['address'] = $address;
                $response['status'] = true;

                return response()->json($response, 200);
            }
        }


    }

    public function customLogin(Request $request) {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $response = array();
            $response = Auth::user();
            $roles = Auth::user()->roles;

            if($response->type_id == 1){
                $response['status'] = true;
                return response($response, 200)
                    ->header('content-type', 'application/json');
            }

            if($response->type_id == 3)
            {
                $service_provider = ServiceProvider::where('user_id', '=', $response->id)->first();
                $response['resident_country'] = $service_provider['resident_country'];
            }

            $address = Address::where('user_id', '=', $response->id)->first();

            $response['address'] = $address;
            $response['status'] = true;
            return response($response, 200)
                ->header('content-type', 'application/json');
        } else {
            return response()->json(['status' => false], 401);
        }
    }

    public function customLogOut(Request $request) {
        Auth::logout();
        return redirect('login');
    }
}
