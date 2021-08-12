<?php

namespace App\Http\Controllers;

use App\tipoPagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoPagamentoController extends Controller
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
         $tipopagamentos = tipoPagamento::all();
        return view('tipoPagamanto.create', compact('tipopagamentos'));
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

            $tipopagamento = new tipopagamento();
            $tipopagamento->descricao = $request->tipoP;
            $tipopagamento-> criadoPor= auth()->user()->id;

            $tipopagamento->save();

        } catch (Exception  $cl) {
            DB::rollback();
            return redirect('/tipoPagamento/create')->with('danger', '  ocorreu um erro ao gravar' + substr($cl, 0, 10));
        }

        DB::commit();
        return redirect('/tipoPagamento/create')->with('success', '  gravado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tipoPagamento  $tipoPagamento
     * @return \Illuminate\Http\Response
     */
    public function show(tipoPagamento $tipoPagamento)
    {
        $tipopagamentos = tipoPagamento::all();
        return view('tipoPagamanto.show', compact('tipopagamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipoPagamento  $tipoPagamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,tipoPagamento $tipoPagamento)
    {

        $tipoPagamento->descricao = $request->tipoP;

        $tipoPagamento->update();

        return redirect('/tipoPagamento/create')->with('info','  Dados actualizados com sucesso');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipoPagamento  $tipoPagamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tipoPagamento $tipoPagamento)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipoPagamento  $tipoPagamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipopagamento = tipopagamento::find($id);
        $tipopagamento->delete();
        return redirect('/tipoPagamento/create')->with('info','  Remoção feita com sucesso');
    }
}
