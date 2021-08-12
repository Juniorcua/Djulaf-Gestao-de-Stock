<?php

namespace App\Http\Controllers;

use App\horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HorarioController extends Controller
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
        $horarios = horario::all();
        return view('horario.create', compact('horarios'))
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
     * @param  \App\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit(horario $horario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy(horario $horario)
    {
        //
    }
}
