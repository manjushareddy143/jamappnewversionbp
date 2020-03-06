<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //CRUD Operation for Users
    /**Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('Users.index',compact('Users'))->with('i',(request()->input('page',1)-1) * 5);
    }
    /** Form for creating a new resource
     *
     *@return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Users.create');
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
        return redirect()->route('Users.index')->with('Success','User created successfully.');
    }
    /**Display the specified resource
     *
     * @param \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        return view('Users.show',compact('Users'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function edit(User $users)
    {
        return view('Users.edit',compact('Users'));
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
        return redirect()->route('Users.index')->with('Success','User updated successfully');
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
        return redirect()->route('Users.index')->with('Success','User deleted successfully');
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
                    $response['code'] = 200;
                    $response['message'] = "user authenticated";
                } else {
                    $response['code'] = 400;
                    $response['message'] = "user unauthorized";
                }

            } else {
                $response['code'] = 400;
                $response['message'] = "user unauthorized";
            }

            return response($response, $response['code'])
                ->header('content-type', 'application/json');
        } catch (\Exception $e) {
            $response['code'] = 400;
            $response['message'] = "There is some error";
        }
    }
    // User Login API


    // User Register API
    /**
     * @SWG\Get(
     *   path="/register",
     *   summary="User Register",
     *     description="User will be logged in",
     *   operationId="userLogin",
     *   consumes={"application/xml","application/json"},
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *      in="body",
     *      name="body",
     *      description="Enter username, first_name, last_name, email address, mobile number and password for user Register",
     *      required=true,
     *     @SWG\Definition(
     *         definition="users",
     *         required={"name","email","password",confirm_password},
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
     *     @SWG\Property(
     *             description="Enter User Password",
     *             property="confirm_password",
     *             type="string"
     *         ),
     *       )
     *      ),
     *   @SWG\Response(
     *     response=200,
     *     description="User Register  Successfully!"
     *   ),
     *   @SWG\Response(response=404, description="Page not Found"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     *
     */


    public function register(Request $request){
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]);
        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('AppName')->accessToken;
        return response()->json(['success'=>$success], $this->successStatus);

        }
}
