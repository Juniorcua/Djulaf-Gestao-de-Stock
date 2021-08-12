<?php

namespace App\Http\Controllers;

use App\FHome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Fhome.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FHome  $fHome
     * @return \Illuminate\Http\Response
     */
    public function show(FHome $fHome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FHome  $fHome
     * @return \Illuminate\Http\Response
     */
    public function edit(FHome $fHome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FHome  $fHome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FHome $fHome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FHome  $fHome
     * @return \Illuminate\Http\Response
     */
    public function destroy(FHome $fHome)
    {
        //
    }
}
