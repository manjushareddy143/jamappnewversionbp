<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PermissionController;
use App\Providers\RouteServiceProvider;
use App\Role;
use App\ServiceProvider;
use App\TermAgreement;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
//        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'contact' => $data['contact'],
            'password' => Hash::make($data['password']),
            'type_id' => $data['type_id'],
            'term_id' => $data['term_id'],
        ]);
    }


    public function customRegister(Request $request) {
        $initialValidator = Validator::make($request->all(),
        [
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact' => 'required|unique:users,contact',
            'type_id' => 'required|exists:user_types,id',
            'term_id' => 'required|exists:term_conditions,id',
            'resident_country' => 'required',
        ]);
        if ($initialValidator->fails())
        {
            return response()->json(['error'=>$initialValidator->errors()], 401);
        }

        $input = $request->all();


        if(array_key_exists('email', $input))
        {
            $emailValidator = Validator::make($request->all(),
                [
                    'email' => '|unique:users,email',
                ]);
            if ($emailValidator->fails())
            {
                return response()->json(['error'=>$emailValidator->errors()], 401);
            }
        }

        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $customer_role = Role::where('slug','=', 'provider')->first();
        $user->roles()->attach($customer_role);

//        if (isset($user)) {


//
//        } else {
//            $response['message']  = "Please add valid details";
//        }

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
                'resident_country' => $input['resident_country']
            ];
            $service_provider_detail = ServiceProvider::create($service_provider);
            $response['resident_country'] = $service_provider_detail['resident_country'];


            return response()->json($response, 200);
        }
//        return response()->json($response, 403);
    }
}
