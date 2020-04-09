<?php

namespace App\Http\Controllers;
use App\master_services;
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


    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {



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

