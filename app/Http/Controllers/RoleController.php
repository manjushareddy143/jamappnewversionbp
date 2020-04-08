<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    function __construct()

    {

         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);

         $this->middleware('permission:role-create', ['only' => ['create','store']]);

         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:role-delete', ['only' => ['destroy']]);

    }
     //CRUD Operation for Roles
    /**Display a listing of the resource.
     *z
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::latest()->paginate(5);
        return view('roles.index',compact('roles'))->with('i',(request()->input('page',1)-1) * 5);
    }
    /** Form for creating a new resource
    *
    *@return \Illuminate\Http\Response
    */
    public function create()
    {
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
    }
    /**
     * store newly created resource in storage
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = Role::create($request->all());
        return redirect()->route('roles.index')->with('Success','User created successfully.');
    }
    /**Display the specified resource
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show',compact('roles'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit',compact('roles'));
    }
    /**
     * Update the specified resources in storage
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $role->update($request->all());
        return redirect()->route('role.index')->with('Success','User updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('Success','User deleted successfully');
    }

}
