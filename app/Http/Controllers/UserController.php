<?php

namespace App\Http\Controllers;

use App\IndividualServiceProvider;
use App\Role;
use App\User;
use DB;
use CreateIndividualserviceprovidermasterTable;
use Exception;
use GuzzleHttp\Middleware;
//use Illuminate\Contracts\Validation\Validator;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;
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
        $individualserviceprovidermaster = IndividualServiceProvider::all();
        return view('layouts.Users.index')->with('data',$users)->with('individualserviceprovider', $individualserviceprovidermaster);
       // $users = User::latest()->paginate(5);
        return view('layouts.Users.index',compact('Users'))->with('i',(request()->input('page',1)-1) * 5);

    }
    /** Form for creating a new resource
     *
     *@return \Illuminate\Http\Response
     */
    public function addUser(Request $request)
    {
        $roles = Role::pluck('name','name')->all();

        return view('layouts.Users.create',compact('roles'));

    }

    protected $usermaster, $IndividualServiceProvider;
    public function __construct(User $users, IndividualServiceProvider $IndividualServiceProvider)
    {
        $this->users = new user();
        $this->IndividualServiceProvider = new IndividualServiceProvider();
    }
    /**
     * store newly created resource in storage
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $roles)
    {

//        echo ($request); exit();
        $response = array();
        $initialValidator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'contact' => 'required',
            ]);

        if ($initialValidator->fails())
        {
            return response()->json(['error'=>$initialValidator->errors()], 401);
        }

        $input = $request->all();

        if($input['type'] == "Individual service provider") {

            $detailValidator = Validator::make($request->all(),
                [
                    "gender" => "required",
                    "language" => "required",
                    "start_time" => "required|before:end_time",
                    "end_time" => "required",
                    "experience" => "required"
                ]);

            if($detailValidator->fails())
            {
                return response()->json(['error'=>$detailValidator->errors()], 401);
            }
        }

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        if($input['type'] == "Individual service provider") {
            $user_id=$user->id;
            $dataArray= [
                'user_id' => $user_id,
                'gender' => $input['gender'],
                'languages_known' => $input['language'],
                'start_time' => $input['start_time'],
                'end_time' => $input['end_time'],
                'experience' => $input['experience'],
            ];
            $details = IndividualServiceProvider::create($dataArray);
            $user["details"] = $details;
        }

        if (isset($user)) {
            $response['status']  = "200";
            $response['message']  = $user;
        } else {
            $response['status']  = false;
            $response['message']  = "Please add valid details";
        }

       return response()->json($response);

        //return redirect()->route('user.index')->with('Success','User created successfully.');
    }
    /**Display the specified resource
     *
     * @param \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)//User $users
    {
        $user = User::find($id);
        return view('layouts.Users.show',compact('user'));
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
        // $roles = Role::pluck('name','name')->all();
        // $userRole = $user->roles->pluck('name','name')->all();

         return view('layouts.Users.edit',compact('user'));//,'roles','userRole'));
    }
    /**
     * Update the specified resources in storage
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirm-password',
            'contact' => 'required|digits:10',
            'roles' => 'required',
        ]);

        $input = $request->all();
        if(!empty($input['password']))
        {
            $input['password'] = Hash::make($input['password']);
        }
        else
        {
            $input = array_except($input, array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('users_has_roles')->where('users_id',$id)->delete();
        //$users->update($request->all());
        return redirect()->route('/index')->with('Success','User updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
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
            $username = $request->input('email');
            $password = $request->input('password');
            $checkuser  = User::where('email', '=', $username)->first();
            if (isset($checkuser)) {
                if (Hash::check($password,$checkuser->password)) {
                    $response = $checkuser;
                    $response['code'] = 200;
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


    public function register(Request $request) {

        $response = array();
        $initialValidator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'contact' => 'required',
            ]);

        if ($initialValidator->fails())
        {
            return response()->json(['error'=>$initialValidator->errors()], 401);
        }

        $input = $request->all();

        if($input['type'] == "Individual service provider") {
            $detailValidator = Validator::make($request->all(),
                [
                    "gender" => "required",
                    "language" => "required",
	                "start_time" => "required|before:end_time",
                    "end_time" => "required",
	                "experience" => "required"
                ]);

            if($detailValidator->fails())
            {
                return response()->json(['error'=>$detailValidator->errors()], 401);
            }
        }

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        if($input['type'] == "Individual service provider") {
            $user_id=$user->id;
            $dataArray= [
                'user_id' => $user_id,
                'gender' => $input['gender'],
                'languages_known' => $input['language'],
                'start_time' => $input['start_time'],
                'end_time' => $input['end_time'],
                'experience' => $input['experience'],
            ];
            $details = IndividualServiceProvider::create($dataArray);
            $user["details"] = $details;
        }

        if (isset($user)) {
            $response['status']  = "200";
            $response['message']  = $user;
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
     *   summary="User Profile by ID",
     *     description="User profile",
     *   operationId="userProfile",
     *   consumes={"application/xml","application/json"},
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *      name="user_id",
     *      in="path",
     *      description="Enter required Id for user profile",
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
     *     description="User ID got Successfully!"
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

            $user = User::get();
            $user = User::find($id);
            $user = User::where('id', '=', $id)->first();

            $checkuser  = User::where('id', '=', $id)->first();
            if (isset($checkuser)) {
                if (Hash::check($checkuser->id)) {
                    $response['status']= true;
                    $response['message'] = "user authenticated";
                    $response['data'] = '$dataArray';
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
