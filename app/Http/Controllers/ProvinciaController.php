<?php

namespace App\Http\Controllers;

use App\provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinciaController extends Controller
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
       $provincias=provincia::all();
       return view('provincia.create',compact('provincias'));
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
        try{

            $provincia = new provincia();
            $provincia->nome =$request['nomeP'];
            $provincia-> criadoPor= auth()->user()->id;
            $provincia->save();


        } catch(Exception $pv){
          DB::rollback();
          return redirect('/provincia/create')->with('danger','  Ocorreu um erro ao gravar'+substr($pv,0,10));
        }

        DB::commit();
        return redirect('/provincia/create')->with('success','  Dados gravados com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function show(provincia $provincia)
    {
        $provincias=provincia::all();
        return view('provincia.show',compact('provincias'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
       $prov= provincia::find($id);
       $prov->nome=$request['nomeP'];
       $prov->update();

       return redirect('/provincia/create')->with('info','  Dados actualizados com sucesso');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, provincia $provincia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function destroy(provincia $provincia, $status)
    {
       $provincia-> estado =$status;

       $provincia->update();

        return redirect('/provincia/create')->with('info','  Remocao feita com sucesso');
    }
    public function destroyshow(provincia $provincia, $status)
    {
       $provincia-> estado =$status;

       $provincia->update();

        return redirect('/provincia/show')->with('info','  Remocao feita com sucesso');
    }
}
