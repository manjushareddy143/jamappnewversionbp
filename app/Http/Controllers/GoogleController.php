<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
           
            // Check Users Email If Already There
            $is_user = User::where('email', $user->getEmail())->first();
            if(!$is_user){

                $saveUser = User::updateOrCreate([
                    'google_id' => $user->getId(),
                ],[
                    'first_name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id'=> $user->getId(),
                    'password'  => Hash::make($user->getName().'@'.$user->getId())
                ]);

                $customer_role = Role::where('slug', '=', 'customer')->first();
                $saveUser->roles()->attach($customer_role);

            }else{
                $saveUser = User::where('email',  $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }


            Auth::loginUsingId($saveUser->id);

            return redirect('customer/account');
        } catch (\Throwable $th) {
            return redirect()->route('home');
        }
    }
}