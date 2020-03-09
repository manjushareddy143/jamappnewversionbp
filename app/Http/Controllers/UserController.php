<?php

namespace App\Http\Controllers;

use App\User;
//use Illuminate\Contracts\Validation\Validator;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        User::create($request->all());
        return redirect()->route('user.index')->with('Success','User created successfully.');
    }
    /**Display the specified resource
     *
     * @param \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        return view('layouts.Users.show',compact('Users'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function edit(User $users)
    {
        return view('layouts.Users.edit',compact('Users'));
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
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required',
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



    //reset Password sent mail
    /**
     * @SWG\Post(
     *   path="/resetpassword",
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

    public function resetpassword(Request $request) {
        try {
            $request = $request->input::json()->all();
            $email = $request->input::json('email');


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";

                return Response::json(array(
                    'message' => $emailErr,
                    'statuscode' => 0,
                ),
                    200);
            } else {

                $user = User::where('email',$email)->first();

                if(isset($user) && !empty($user)) {

                    $response = $this->broker()->sendResetLink(['email'=>$email]);

                    return Response::json(array(
                        'response' => $response,
                        'message' => "Mail sent successfully.",
                        'statuscode' => 1,
                    ),
                        200);
                } else {
                    return Response::json(array(
                        'message' => "No user with this email id available. Please Sign up.",
                        'statuscode' => 0,
                    ),
                        200);

                }

            }
        } catch (\Exception $e) {
            return Response(array(
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'statuscode' => 0,
            ),
                400);
        }
    }

    public function broker()
    {
        return Password::broker();
    }



}
