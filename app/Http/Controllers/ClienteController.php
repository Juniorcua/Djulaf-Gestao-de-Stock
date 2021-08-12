<?php

namespace App\Http\Controllers;

use App\cliente;
use App\provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
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
        $clientes = DB::table('clientes')
            ->join('provincias', 'provincias.id', '=', 'clientes.provinciaId')
            ->select('clientes.*', 'provincias.nome as Nprov')
            ->get();
        $provincias = provincia::all();
        return view('cliente.create', compact('clientes', 'provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        DB::beginTransaction();

        try {
            // cliente::create($request->all());

            $cliente = new cliente();
            $cliente->name = $request->nome;
            $cliente->contacto = $request->contacto;
            $cliente->email = $request->email;
            $cliente->nuit = $request->nuit;
            $cliente->BI = $request->bi;
            $cliente->endereco = $request->endereco;
            $cliente->provinciaId = $request->provincia;
            $cliente-> criadoPor= auth()->user()->id;

            $cliente->save();
        } catch (Exception  $cl) {
            DB::rollback();
            return redirect('/cliente/create')->with('danger', '  ocorreu um erro ao gravar' + substr($cl, 0, 10));
        }

        DB::commit();
        return redirect('/cliente/create')->with('success', '  gravado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, cliente $cliente)
    {

        $clientes = DB::table('clientes')
            ->join('provincias', 'provincias.id', '=', 'clientes.provinciaId')
            ->select('clientes.*', 'provincias.id as Nprov')
            ->get();

        $provincias = provincia::all();
        return view('cliente.show', compact('clientes', 'provincias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cliente $cliente)
    {

        $cliente->name = $request->nome;
        $cliente->contacto = $request->contacto;
        $cliente->email = $request->email;
        $cliente->nuit = $request->nuit;
        $cliente->BI = $request->bi;
        $cliente->endereco = $request->endereco;
        $cliente->provinciaId = $request->provincia;

        $cliente ->update();

        return redirect('/cliente/create')->with('info','  Dados actualizados com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cliente $cliente, $status)
    {
        $cliente-> estado=$status;

        $cliente->update();

        return redirect('/cliente/create/') -> with('info','Remoção feita com sucesso');
    }
    public function destroyshow(cliente $cliente, $status)
    {
        $cliente-> estado=$status;

        $cliente->update();

        return redirect('/cliente/show/') -> with('info','Remoção feita com sucesso');
    }
}
