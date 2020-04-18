<?php

namespace App\Http\Controllers;
use App\master_services;
use App\Services;
use Illuminate\Http\Request;

class Master_servicesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master_services=master_services::all();

        return view('layouts.Master_services.indexservice',compact('Master_services'))->with('i',(request()->input('page',1)-1) * 5);

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        // print_r("hello");
        // exit;
        return view('layouts.Master_services.createservice');

    }
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        master_services::create($request->all());



    }
    /**
     * Display the specified resource.
     *
     * @param  \App\master_services
     * @return \Illuminate\Http\Response
     */

    public function show(master_services $master_services)
    {


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\master_services
     * @return \Illuminate\Http\Response
     */

    public function edit()
    {
        return view('layouts.Master_services.editservice');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\master_services
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\master_services
     * @return \Illuminate\Http\Response
     */

    public function destroy()
    {


    }
}

