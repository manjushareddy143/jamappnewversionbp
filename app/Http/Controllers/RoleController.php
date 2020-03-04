<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
     //CRUD Operation for Roles
    /**Display a listing of the resource.
     *z
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::latest()->paginate(5);
        return view('role.index',compact('role'))->with('i',(request()->input('page',1)-1) * 5);
    }
    /** Form for creating a new resource
    *
    *@return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('role.create');
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
        ]);
        Role::create($request->all());
        return redirect()->route('role.index')->with('Success','User created successfully.');
    }
    /**Display the specified resource
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('role.show',compact('role'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('role.edit',compact('role'));
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
