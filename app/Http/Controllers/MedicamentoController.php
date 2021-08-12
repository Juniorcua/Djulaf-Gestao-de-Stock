<?php

namespace App\Http\Controllers;

use App\categoria;
use App\medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicamentoController extends Controller
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
        $medicamentos = DB::table('medicamentos')
        ->join('categorias','categorias.id','=','medicamentos.categoriaId')
        ->select('medicamentos.*','categorias.nome as c_nome')
        ->get();

        $categorias = categoria::all();

        return view('medicamento.create', compact('medicamentos','categorias'));


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

            $medicamento= new medicamento();
            $medicamento-> nome= $request-> nomeM ;
            $medicamento -> categoriaId = $request['categoriaM'];
            $medicamento -> criadoPor= auth()->user()->id;


            if ($request->hasfile('file')) {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename = 'medicamentoft_' . time() . '.' . $extension;
                $file->move('upload/medicamento/', $filename);
                $medicamento->foto = $filename;
            }

            $medicamento->save();


        } catch(Exception $md){
            DB::rollback();
            return redirect('/medicamento/create')->with('danger','  Ocorreu um erro ao gravar'+substr($md,0,10));
          }

          DB::commit();
          return redirect('/medicamento/create')->with('success','  Dados gravados com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, medicamento $medicamento)
    {

        if($request['categoriaM']){
            $medicamentos = DB::table('medicamentos')
            ->join('categorias','categorias.id','=','medicamentos.categoriaId')
            -> where ('medicamentos.categoriaId',$request['categoriaM'])
            -> select('medicamentos.*','categorias.nome as c_nome')
            -> get();
        }else{

        $medicamentos =DB::table('medicamentos')
        ->join('categorias','categorias.id','=','medicamentos.categoriaId')
        ->select('medicamentos.*','categorias.nome as c_nome')
        ->get();
        }



        $categorias = categoria::all();
        return view('medicamento.show',compact('medicamentos','categorias'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function edit(medicamento $medicamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, medicamento $medicamento)
    {
        $medicamento ->nome = $request['nomeM'];
        $medicamento ->nome = $request['categoriaM'];

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = 'medicamentoft_' . time() . '.' . $extension;
            $file->move('upload/medicamento/', $filename);
            $medicamento->foto = $filename;
        }

        $medicamento ->update();

        return redirect('/medicamento/create')->with('info','  Dados actualizados com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(medicamento $medicamento, $status)
    {

        $medicamento -> estado =$status;

        $medicamento->update();

        return redirect('/medicamento/show/')->with('info','  Remoção feita com sucesso');

    }
    public function destroycreate(medicamento $medicamento, $status)
    {

        $medicamento -> estado =$status;

        $medicamento->update();

        return redirect('/medicamento/create/')->with('info','  Remoção feita com sucesso');

    }
}
