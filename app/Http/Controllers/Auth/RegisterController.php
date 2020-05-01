<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\ServiceProvider;
use App\TermAgreement;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'password' => 'required',
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

        $user_id=$user->id;
        $now = now()->utc();
        $term_agreement= [
            'user_id' => $user_id,
            'term_id' => $input['term_id'],
            'agreed_at' => $now
        ];
        TermAgreement::create($term_agreement);

        $service_provider= [
            'user_id' => $user_id,
            'resident_country' => $input['resident_country']
        ];
        $service_provider_detail = ServiceProvider::create($service_provider);
        $user['resident_country'] = $service_provider_detail['resident_country'];


        if (isset($user)) {
            $response  = $user;
        } else {
            $response['message']  = "Please add valid details";
        }

//        $credentials = ['email' => $input['email'],
//            'password' => $input['password']];
        $credentials = $request->only('email', 'password');
        if( Auth::attempt($credentials)) {
            //dd(\Session::getId());
//            $encryptedCookie = Crypt::encrypt(\Session::getId(), true);
            return response()->json($response, 200);
            // ->withCookie(cookie(\Str::slug(env('APP_NAME', 'laravel'), '_').'_session', $encryptedCookie, 45000));
            //$request->session()->regenerate();
        }
        return response()->json($response, 403);

//        $credentials = $request->only('email', 'password');
//        if (Auth::attempt($credentials)) {
//            return response()->json(['status' => true]);
//        }
    }
}
