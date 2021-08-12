<?php

namespace App\Http\Controllers;
use App\User;
use App\perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
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
        $usuarios = user::all();

        return view('perfil.create', compact('usuarios'));
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
     * @param  \App\perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(perfil $perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(perfil $perfil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, perfil $perfil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(perfil $perfil)
    {
        //
    }
}
