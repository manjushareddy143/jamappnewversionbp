<?php

namespace App\Http\Controllers;

use App\Individualsp;
use App\User;
use DB;
use CreateIndividualserviceprovidermasterTable;
use Exception;
use GuzzleHttp\Middleware;
//use Illuminate\Contracts\Validation\Validator;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Swagger\Annotations\Post;
use Swagger\Annotations\Response;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpKernel\EventListener\SaveSessionListener;
use Validator;

class UserController extends Controller
{
    //CRUD Operation for Users
    /**Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('layouts.Users.index')->with('data',$users);
       // $users = User::latest()->paginate(5);
        return view('layouts.Users.index',compact('Users'))->with('i',(request()->input('page',1)-1) * 5);

    }
    /** Form for creating a new resource
     *
     *@return \Illuminate\Http\Response
     */
    public function addUser()
    {
        return view('layouts.Users.create');

    }

    protected $usermaster, $individualsp;
    public function __construct(User $usermaster, Individualsp $individualsp)
    {
        $this->usermaster = new user();
        $this->individualsp = new individualsp();
    }
    /**
     * store newly created resource in storage
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        //set image path into database
        // $users=0;
        // if($request->hasFile('image'))
        // {
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension(); //getting image extension
        //     $filename = time() . '.' . $extension;
        //     $file->move('/uploads/users/',$filename);
        //     $users->image = $filename;
        // }
        // else
        // {
        //     return $request;
        //     $users->image = '';
        // }
        // $users->save();

        $user=User::create($request->all());

        $user_id=$user->id;
        $dataArray=[
                'user_id' => $user_id,
                'gender' => 'Female',
                'languages_known' => 'English',
                'timing' => '10',
                'experience' => '10',
            ];

        Individualsp::create($dataArray);
        
        return redirect()->route('user.index')->with('Success','User created successfully.');

    
    }
    /**Display the specified resource
     *
     * @param \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)//User $users
    {
        $user = User::find($id);
        return view('layouts.Users.show',compact('id'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
         return view('layouts.Users.edit',compact('id'));
    }
    /**
     * Update the specified resources in storage
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $users)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $users->update($request->all());
        return redirect()->route('user.index')->with('Success','User updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users)
    {
        $users->delete();
        return redirect()->route('user.index')->with('Success','User deleted successfully');
    }

    // User Login API

    /**
     * @SWG\Post(
     *   path="/login",
     *   summary="User Login",
     *     description="User will be logged in",
     *   operationId="userLogin",
     *   consumes={"application/xml","application/json"},
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *      in="body",
     *      name="body",
     *      description="Enter email address and password for user login",
     *      required=true,
     *     @SWG\Definition(
     *         definition="users",
     *         required={"username","passwrod"},
     *         @SWG\Property(
     *             description="Enter Email id",
     *             property="username",
     *             type="string"
     *         ),
     *         @SWG\Property(
     *             description="Enter User Password",
     *             property="password",
     *             type="string"
     *         ),
     *       )
     *      ),
     *   @SWG\Response(
     *     response=200,
     *     description="User logged in Successfully!"
     *   ),
     *   @SWG\Response(response=404, description="Page not Found"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     *
     */
    public function login(Request $request) {
        try {
            $response = array();
            $username = $request->input('username');
            $password = $request->input('password');

            $checkuser  = User::where('email', '=', $username)->first();
            if (isset($checkuser)) {
                if (Hash::check($password,$checkuser->password)) {
                    $response['code'] = true;
                    $response['message'] = "user authenticated";
                } else {
                    $response['code'] = false;
                    $response['message'] = "user unauthorized";
                }

            } else {
                $response['code'] = false;
                $response['message'] = "user unauthorized";
            }
            return response($response, 200)
                ->header('content-type', 'application/json');
        } catch (\Exception $e) {
            $response['code'] = 400;
            $response['message'] = "There is some error";
        }
    }

    // User Register API
    /**
     * @SWG\Post(
     *   path="/register",
     *   summary="User Register",
     *     description="User will be logged in",
     *   operationId="userRegister",
     *   consumes={"application/xml","application/json"},
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *      in="body",
     *      name="body",
     *      description="Enter username, email address and password for user Register",
     *      required=true,
     *     @SWG\Definition(
     *         definition="users",
     *         required={"username","email","password"},
     *     @SWG\Property(
     *             description="Enter name",
     *             property="username",
     *             type="string"
     *         ),
     *         @SWG\Property(
     *             description="Enter name",
     *             property="name",
     *             type="string"
     *         ),
     *
     *     @SWG\Property(
     *             description="Enter email address",
     *             property="email",
     *             type="string"
     *         ),
     *         @SWG\Property(
     *             description="Enter User Password",
     *             property="password",
     *             type="string"
     *         ),
     *       )
     *      ),
     *   @SWG\Response(
     *     response=200,
     *     description="User Register successfully!"
     *   ),
     *   @SWG\Response(response=404, description="Page not Found"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     *
     */


    public function register(Request $request){
        $response = array();
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
               // 'username' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'contact' => 'required',
            ]);
        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        if (isset($user)) {
            $response['status']  = true;
            $response['message']  = "User Register successfully!";
        } else {
            $response['status']  = false;
            $response['message']  = "Please add valid details";
        }
        return response()->json($response);

        }


        //Change password api
    /**
     * @SWG\Post(
     *   path="/changepassword",
     *   summary="User can change password.",
     *     description="User can change current password",
     *   operationId="userPasswordChange",
     *   consumes={"application/xml","application/json"},
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *      in="body",
     *      name="body",
     *      description="Enter email and new password for change current user password.",
     *      required=true,
     *     @SWG\Definition(
     *         definition="password_change",
     *         required={"email","password"},
     *         @SWG\Property(
     *             description="Enter email",
     *             property="email",
     *             type="string"
     *         ),
     *          @SWG\Property(
     *             description="Enter Password",
     *             property="password",
     *             type="string"
     *         )
     *       )
     *      ),
     *   @SWG\Response(
     *     response=200,
     *     description="User password change successfully!"
     *   ),
     *   @SWG\Response(response=404, description="Page not Found"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     *
     */

    public function changepassword(Request $request) {

        try {
            $response = array();
            $email = $request->input("email");
            $password = $request->input("password");

            if(trim($email) == "" || trim($password) == "") {
                return response(array(
                    'message' => "Invalid parameters.",
                    'statuscode' => 0,
                ),
                    200);
            }


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                return response(array(
                    'message' => $emailErr,
                    'statuscode' => 0,
                ),
                    200);
            }

            $user = User::where('email',$email)->first();

            if(isset($user) && !empty($user)) {

                $user->password = Hash::make($password);
                $user->save();

                return response(array(
                    'statuscode' => true,
                    'message' => "Password updated successfully.",

                ),
                    200);

            } else {

                return response(array(
                    'statuscode' => false,
                    'message' => "No user with this email id available.",

                ),
                    200);

            }
        } catch (\Exception $e) {
            $this->$response($request, "There is some error in change password");
            $this->$response($request, $e->getMessage() . " " . $e->getLine());
        }
    }



    //reset Password
    /**
     * @SWG\Post(
     *   path="/resetPassword",
     *   summary="User will get reset password link.",
     *     description="User will get reset password link",
     *   operationId="userPasswordReset",
     *   consumes={"application/xml","application/json"},
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *      in="body",
     *      name="body",
     *      description="Enter email for user password reset",
     *      required=true,
     *     @SWG\Definition(
     *         definition="password_reset",
     *         required={"email"},
     *         @SWG\Property(
     *             description="Enter email",
     *             property="email",
     *             type="string"
     *         )
     *          @SWG\Property(
     *             description="Enter Password",
     *             property="password",
     *             type="string"
     *         )
     *       )
     *      ),
     *   @SWG\Response(
     *     response=200,
     *     description="User password reset link sent successfully!"
     *   ),
     *   @SWG\Response(response=404, description="Page not Found"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     *
     */

    public function resetPassword(Request $request)
    {
        //Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'password' => 'required|confirmed'
        ]);

        //check if input is valid before moving on
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['email' => 'Please complete the form']);
        }

        $password = $request->password;
// Validate the token
        $tokenData = DB::table('password_resets')
            ->where('token', $request->token)->first();
// Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return view('auth.passwords.email');

        $user = User::where('email', $tokenData->email)->first();
// Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
//Hash and update the new password
        $user->password = \Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
            ->delete();

        //Send Email Reset Success Email
        if ($this->sendSuccessEmail($tokenData->email)) {
            return view('index');
        } else {
            return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
        }

    }
//User profile API
    /**
     * @SWG\Get(
     *   path="/profile",
     *   summary="User Profile",
     *     description="User profile",
     *   operationId="userProfile",
     *   consumes={"application/xml","application/json"},
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *      in="body",
     *      name="body",
     *      description="Enter required fields details to show user profile",
     *      required=true,
     *     @SWG\Definition(
     *         definition="users",
     *         required={"id"},
     *         @SWG\Property(
     *             description="Enter user id",
     *             property="id",
     *             type="integer"
     *         ),
     *       )
     *      ),
     *   @SWG\Response(
     *     response=200,
     *     description="User Profile register Successfully!"
     *   ),
     *   @SWG\Response(response=404, description="Page not Found"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     *
     */

    //User profile
    public function profile(Request $request)
    {
        try {
            $response = array();
            $id = $request->input('id');

            $checkuser  = User::where('id', '=', $id)->first();
            if (isset($checkuser)) {
                if (Hash::check($checkuser->id)) {
                    $response['code'] = true;
                    $response['message'] = "user authenticated";
                } else {
                    $response['code'] = false;
                    $response['message'] = "user unauthorized";
                }

            } else {
                $response['code'] = false;
                $response['message'] = "user unauthorized";
            }
            return response($response, 200)
                ->header('content-type', 'application/json');
        } catch (\Exception $e) {
            $response['code'] = 400;
            $response['message'] = "There is some error";
        }
    }

}
