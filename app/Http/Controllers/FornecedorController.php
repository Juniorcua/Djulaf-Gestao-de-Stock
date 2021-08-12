<?php

namespace App\Http\Controllers;

use App\fornecedor;
use App\vasillhame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FornecedorController extends Controller
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
        $fornecedores = fornecedor::all();

        return view('fornecedor.create', compact('fornecedores'));
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

           $fornecedor = new fornecedor();
            $fornecedor->nome = $request->nome;
            $fornecedor->contacto = $request->contacto;
            $fornecedor->email = $request->email;
            $fornecedor->endereco = $request->endereco;
            $fornecedor->descricao = $request->descricao;
            $fornecedor-> criadoPor= auth()->user()->id;


            $fornecedor->save();
        } catch (Exception  $cl) {
            DB::rollback();
            return redirect('/fornecedor/create')->with('danger', '  ocorreu um erro ao gravar' + substr($cl, 0, 10));
        }

        DB::commit();
        return redirect('/fornecedor/create')->with('success', '  gravado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show(fornecedor $fornecedor)
    {
          $fornecedores = fornecedor::all();
          return view('fornecedor.show', compact('fornecedores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,fornecedor $fornecedor)
    {
        $fornecedor->nome = $request->nome;
        $fornecedor->contacto = $request->contacto;
        $fornecedor->email = $request->email;
        $fornecedor->endereco = $request->endereco;
        $fornecedor->descricao = $request->descricao;


        $fornecedor ->update();

        return redirect('/fornecedor/create')->with('info','  Dados actualizados com sucesso');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fornecedor $fornecedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(fornecedor $fornecedor, $status)
    {
        $fornecedor ->estado = $status;

        $fornecedor ->update();

        return redirect('/fornecedor/create/') -> with('info','Remoção feita com sucesso');
    }
    public function destroyshow(fornecedor $fornecedor, $status)
    {
        $fornecedor ->estado = $status;

        $fornecedor ->update();

        return redirect('/fornecedor/show/') -> with('info','Remoção feita com sucesso');
    }
}
