<?php

namespace App\Http\Controllers\Frontend;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\SocialFacebookAccountService;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialAuthFacebookController extends Controller
{
    /**
    * Create a redirect method to facebook api.
    *
    * @return void
    */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    
    /**
    * Return a callback method from facebook api.
    *
    * @return callback URL from facebook
    */
    public function callback(SocialFacebookAccountService $service)
    {
       
        try {
             $user = Socialite::driver('facebook')->user();
           
            // Check Users Email If Already There
            $is_user = User::where('email', $user->getEmail())->first();
            if(!$is_user){

                $saveUser = User::updateOrCreate([
                    'facebook_id' => $user->getId(),
                ],[
                    'first_name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'facebook_id'=> $user->getId(),
                    'password'  => Hash::make($user->getName().'@'.$user->getId())
                ]);

                $customer_role = Role::where('slug', '=', 'customer')->first();
                $saveUser->roles()->attach($customer_role);

            }else{
                $saveUser = User::where('email',  $user->getEmail())->update([
                    'facebook_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }


            Auth::loginUsingId($saveUser->id);

            return redirect('customer/account');
        }catch (\Throwable $th) {
            return redirect()->route('home');
        }
    }
}
