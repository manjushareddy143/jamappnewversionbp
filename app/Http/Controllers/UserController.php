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

    public function login(Request $request) {

        try {
            $response = array();
            $username = $request->input('username');
            $password = $request->input('password');

            $checkuser  = User::where('email', '=', $username)->first();


            if (isset($checkuser)) {
//                print_r($checkuser->password . "\n");
                print_r(bcrypt('secret'));
                exit();
                if ($checkuser->password == bcrypt('secret')) {
                    $response['code'] = 200;
                    $response['message'] = "user authenticated";
                } else {
                    $response['code'] = 400;
                    $response['message'] = "user unauthorized";
                }
            }

            return response($response, $response['code'])
                ->header('content-type', 'application/json');
        } catch (\Exception $e) {

            $response['code'] = 400;
            $response['message'] = "There is some error";
        }
    }

}
