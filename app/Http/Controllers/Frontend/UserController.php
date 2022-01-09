<?php
namespace App\Http\Controllers\Frontend;

use Hash;
use Auth;
use App\Role;
use App\User;
use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Vendor\VendorRegistered;
use Illuminate\Support\Facades\Crypt;
use App\Mail\Vendor\VendorVerification;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{   
    public function customerLogin(Request $request){ 
        if( $request->isMethod('post') && $request->ajax()){
            $fieldType = filter_var( $request->input, FILTER_VALIDATE_EMAIL ) ? 'Email' : 'Phone';
            $messages = [
                'input.required' => (($fieldType == 'Email') ? 'Email' : 'Phone') .' is required.'
            ]; 
            $rule = [
                'input' => ($fieldType == 'Email') ? 'required|email' : 'required',
                'password'=> 'required',
            ];
            $validator = Validator::make($request->all(), $rule ,$messages);
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);            
            } 
            if ($fieldType == 'Phone') {
                $user = User::whereContact($request->conuntry_code.$request->input)->first();  
                if (!empty($user)) {
                    if (!Hash::check($request->password, $user->password)) {
                        return response()->json(['error'=>['invalid_password'=>['Incorrect password']]], 401); 
                    }
                    if (Auth::loginUsingId($user->id)) {
                        if(auth::user()->is_deleted ==1 ){
                            Auth::logout();
                            return response()->json(['error'=>['message'=>'It seems your account is not active']], 403);
                        }   
                        //dd($user->hasRole());                 
                        // Authentication passed...
                        if($user->hasRole('customer') || $user->hasRole('provider')){
                            return response()->json([
                                'success' => 200,
                                'message' =>'Login successfull.'
                            ]);
                        }else{
                            Auth::logout();
                            return response()->json(['error' =>[['You don\'t have enough permission to access.']]],401);
                        }
                    }else{
                        return response()->json(['error' =>[['Invalid credentials, please try again.']]],401);
                    }                   
                }else{
                    return response()->json(['error' =>[['Account not found, please try again.']]],401);  
                }
            }else{
                $user = User::whereEmail($request->input)->first();  
                if (Auth::attempt(['email'=>$request->input,'password'=>$request->password])) {
                    if(auth::user()->is_deleted ==1 ){
                        Auth::logout();
                        return response()->json(['error' =>[['It seems your account is not active']]],403);
                    }  
                    if($user->hasRole('customer')){
                            return response()->json([
                            'success' => 200,
                            'message' =>'Login successfull.'
                        ]);
                    }else{
                        return response()->json(['error' =>[['You don\'t have enough permission to access.']]],401);
                    }
                }else{
                    return response()->json(['error' =>[['Invalid credentials, please try again.']]],401);
                }
            }
        }
        return view('frontend.users.login');
    }

    //Forgot password
    public function customerForgotPassword(Request $request){
        if( $request->isMethod('post') && $request->ajax()){
           
            //Start Validation
            $validator = Validator::make($request->all(), [            
                'email'  => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);            
            } 
            //end Validation

            $user = User::where('email',$request->email)->first();
            if($user){

                /* Send email start */
                $data['user']   = $user;
                $data['link']   = '<a href="'.url('customer/password-change/'.Crypt::encrypt($user->id)).'">Click here</a>';
                $email          = $user->email;
                $message        = 'Forgot password';
                Mail::send('emails.forgetpassword', array('data' => $data), function($message) use($email){
                    $message->to($email)->subject('Forgot password');
                });
                /* Send email end */

                return response()->json([
                    'success'   => true,
                    'data'      => [],
                    'message'   => 'Account has been created.',
                ]);
            }else{
                return response()->json(['error' =>[['Your email is not correct!']]],401);
            }
        }
    }

    //Forgot password
    public function customerPasswordChange(Request $request, $id){
        if( $request->isMethod('post') && $request->ajax()){
           
            //Start Validation
            $messages = [
                'password.required' => 'New password field is required.',
                'password_confirmation.required'    => 'Confirm Password field is required.',
            ];
            $validator = Validator::make($request->all(), [            
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6'
            ],$messages);
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);            
            } 
            //end Validation
            $user_id = Crypt::decrypt($id);
            $user = User::find($user_id);
            if($user){
                $user->password = Hash::make($request->password);
                $user->save();
                
                return response()->json([
                    'success'   => true,
                    'data'      => [],
                    'message'   => 'Password has been changed.',
                ]);
            }else{
                return response()->json(['error' =>[['User not found!']]],401);
            }
        }
        return view('frontend.password-change',compact('id'));
    }

    //Customer register
    public function customerRegister(Request $request){
        if( $request->isMethod('post') && $request->ajax()){
           
            //Start Validation
            $messages = [
                'conuntry_code.required' => 'Country code field is required.',
                'contact.required'    => 'Phone field is required.',
            ];
            $validator = Validator::make($request->all(), [            
                'conuntry_code'  => 'required',
                'contact' => 'required|string|unique:users,contact,',
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6'
            ],$messages);
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);            
            } 
            //end Validation

            $user           = new User();
            $user->contact  = $request->get('conuntry_code').$request->get('contact');
            $user->password = Hash::make($request->get('password'));
            $user->save();
            $user->roles()->attach(Role::where('slug', 'customer')->first());
            Auth::loginUsingId($user->id);

            return response()->json([
                'success'   => true,
                'data'      => [],
                'message'   => 'Account has been created.',
            ]);
        }
    }

    public function customerLogOut(Request $request) {
        Auth::logout();
        return redirect('/');
    }

    public function customerAccount(Request $request) {
        if(Auth::check()){
            $bookings = Booking::where('user_id',Auth::user()->id)->get();
            return view('frontend.myAccount',compact('bookings'));
        }else{
            return redirect('/');
        }
    }

    public function providerRegister(Request $request) {

        
        if( $request->isMethod('post') && $request->ajax()){
            //Start Validation
            $messages = [
                'password.required'         => 'Password field is required.',
                'contact.required'          => 'Phone field is required.',
                'conuntry_code.required'    => 'Country code field is required.',
                'email.required'            => 'Email field is required.',
                'last_name.required'        => 'Last name field is required.',
                'first_name.required'       => 'First name field is required.'
            ];
            $validator = Validator::make($request->all(), [            
                'password_confirmation' => 'min:6',
                'password'          => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'contact'           => 'required|string|unique:users,contact,',
                'conuntry_code'     => 'required',
                'email'             => 'required',
                'last_name'         => 'required',
                'first_name'        => 'required'
            ],$messages);
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);            
            } 
            //end Validation

            $user               = new User();

            if($request->hasfile('image_one'))
            {
                $imageOne = rand().'.'.$request->image_one->extension();  
     
                $request->image_one->move(public_path('provider'), $imageOne);

                $user->image_one=$imageOne;
            }
            if($request->hasfile('image_two'))
            {
                $imageTwo = rand().'.'.$request->image_two->extension();  
     
                $request->image_two->move(public_path('provider'), $imageTwo);

                $user->image_two=$imageTwo;
            }
            if($request->hasfile('image_three'))
            {
                $imageThree = rand().'.'.$request->image_three->extension();  
     
                $request->image_three->move(public_path('provider'), $imageThree);

                $user->image_three=$imageThree;
            }

            
            $user->first_name   = $request->first_name;
            $user->last_name    = $request->last_name;
            $user->email        = $request->email;
            $user->contact      = $request->get('conuntry_code').$request->get('contact');
            $user->password     = Hash::make($request->get('password'));
            $user->save();
            $user->roles()->attach(Role::where('slug', 'provider')->first());
            //Auth::loginUsingId($user->id);

            return response()->json([
                'success'   => true,
                'data'      => [],
                'message'   => 'Account has been created.',
            ]);
        }
        return view('frontend.providerRegister');
    }
}
