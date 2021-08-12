<?php

namespace App\Http\Controllers;

use App\distrito;
use App\provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistritoController extends Controller
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
        $provincias = provincia::all();

        $distritos = DB::table('distritos')
        ->join('provincias','provincias.id','=','distritos.provinciaId')
        ->select('distritos.*','provincias.nome as c_prov')
        ->get();

        return view('distrito.create', compact('distritos', 'provincias'));
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

            $distrito= new distrito();
            $distrito-> nome= $request-> nomeD ;
            $distrito-> criadoPor= auth()->user()->id;
            $distrito -> provinciaId = $request['provD'];

            $distrito->save();


        } catch(Exception $md){
            DB::rollback();
            return redirect('/distrito/create')->with('danger','  Ocorreu um erro ao gravar'+substr($md,0,10));
          }

          DB::commit();
          return redirect('/distrito/create')->with('success','  Dados gravados com sucesso');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\distrito  $distrito
     * @return \Illuminate\Http\Response
     */
    public function show(distrito $distrito)
    {
        $provincias = provincia::all();

        $distritos = DB::table('distritos')
        ->join('provincias','provincias.id','=','distritos.provinciaId')
        ->select('distritos.*','provincias.nome as c_prov')
        ->get();

        return view('distrito.show', compact('distritos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\distrito  $distrito
     * @return \Illuminate\Http\Response
     */
    public function edit(distrito $distrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\distrito  $distrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, distrito $distrito)
    {
        $distrito ->nome = $request['nomeD'];
        $distrito ->provinciaId = $request['provD'];

        $distrito ->update();

        return redirect('/distrito/create')->with('info','  Dados actualizados com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\distrito  $distrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(distrito $distrito,$status)
    {
        $distrito -> estado =$status;

        $distrito->update();

        return redirect('/distrito/create')->with('info','  Remoção feita com sucesso');
    }

    public function destroyshow(distrito $distrito,$status)
    {
        $distrito -> estado =$status;

        $distrito->update();

        return redirect('/distrito/show')->with('info','  Remoção feita com sucesso');
    }
}
