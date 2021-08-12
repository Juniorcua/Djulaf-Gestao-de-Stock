<?php

namespace App\Http\Controllers;

use App\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class CategoriaController extends Controller
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
        $categorias = categoria::all();
        return view ('categoria.create', compact ('categorias'));

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
            //code...

            $categoria= new categoria();
            $categoria-> nome= $request['nomec'];
            $categoria-> CriadoPor= auth()->user()->id;
            $categoria->save();


        } catch(Exception $ct){
            DB::rollback();
            return redirect('/categoria/create')->with('danger','  Ocorreu um erro ao gravar'+substr($ct,0,10));
          }

          DB::commit();
          return redirect('/categoria/create')->with('success','  Dados gravados com sucesso');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        $categorias=categoria::all();
        return view('categoria.show',compact('categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $cat =categoria::all();


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categoria $categoria)
    {

        // print_r($categoria);
        $categoria ->nome = $request['nomec'];
        $categoria ->update();

        return redirect('/categoria/create')->with('info','  Dados actualizados com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoria $categoria, $status)
    {

        $categoria ->estado=$status;

        $categoria -> update();

        return redirect('/categoria/create/')->with('info','  Remoção feita com sucesso');

    }
    public function destroyshow(categoria $categoria, $status)
    {

        $categoria ->estado=$status;

        $categoria -> update();

        return redirect('/categoria/show/')->with('info','  Remoção feita com sucesso');

    }
}
