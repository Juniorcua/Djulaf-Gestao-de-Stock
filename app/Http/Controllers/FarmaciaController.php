<?php

namespace App\Http\Controllers;

use App\distrito;
use App\farmacia;
use App\provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FarmaciaController extends Controller
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

        $farmacias = DB::table('farmacias')
            ->join('provincias', 'provincias.id', '=', 'farmacias.provinciaId')
            ->select('farmacias.*', 'provincias.nome as Fprov')
            ->get();

        $provincias = provincia::all();

        $distritos = distrito::all();

        return view('farmacia.create', compact('farmacias', 'provincias','distritos'));

    }

    public function perfil($id)
    {




        $farmacias = DB::table('farmacias')
            ->join('provincias', 'provincias.id', '=', 'farmacias.provinciaId')
            ->join('distritos', 'distritos.id', '=', 'farmacias.provinciaId')
            ->where('farmacias.id','=',$id)
            ->select('farmacias.*', 'provincias.nome as Fprov','distritos.nome as dt')
            ->first();

        $provincias = provincia::all();

        $distritos = distrito::all();

        return view('farmacia.perfil', compact('farmacias', 'provincias','distritos'));

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
            // farmacia::create($request->all());

            $farmacia = new farmacia();
            $farmacia->nome = $request->nome;
            $farmacia->contacto = $request->contacto;
            $farmacia->email = $request->email;
            $farmacia->endereco = $request->endereco;
            $farmacia->provinciaId = $request->provincia;
            $farmacia->distritoId = $request->distD;


            if ($request->hasfile('imgP')) {
                $file = $request->file('imgP');
                $extension = $file->getClientOriginalExtension();
                $filename = 'FarmaciaPr_' . time() . '.' . $extension;
                $file->move('upload/farmacia/', $filename);
                $farmacia->fotoP = $filename;
            }

            if ($request->hasfile('imgF')) {
                $file = $request->file('imgF');
                $extension = $file->getClientOriginalExtension();
                $filename = 'FarmaciaBg_' . time() . '.' . $extension;
                $file->move('upload/farmacia/', $filename);
                $farmacia->fotoF = $filename;
            }

            $farmacia->adress = $request->adress;
            $farmacia->latitude = $request->latitude;
            $farmacia->longitude = $request->longitude;
            $farmacia-> criadoPor= auth()->user()->id;

            $farmacia->save();

        } catch (Exception  $cl) {
            DB::rollback();
            return redirect('/farmacia/create')->with('danger', '  ocorreu um erro ao gravar' + substr($cl, 0, 10));
        }

        DB::commit();
        return redirect('/farmacia/create')->with('success', '  gravado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\farmacia  $farmacia
     * @return \Illuminate\Http\Response
     */
    public function show(farmacia $farmacia, Request $request )
    {
        $provIds=[1,2,3,4,5,6,7,8,9,10,11];
        $districtId=$request->dist;
        $provinceId=$request->prov;

        if(!empty($request->prov)){

            if($request->prov!='todas'){
                $provIds=[$request->prov];
            }

            switch ($request->dist) {
                case 'todos':
                    $farmacias = DB::table('farmacias')
                    ->join('provincias', 'provincias.id', '=', 'farmacias.provinciaId')
                    ->whereIn('farmacias.provinciaId',$provIds)
                    // ->where('farmacias.distritoId',$request->dist)
                    ->select('farmacias.*', 'provincias.nome as Fprov')
                    ->get();
                    break;

                default:
                    $farmacias = DB::table('farmacias')
                    ->join('provincias', 'provincias.id', '=', 'farmacias.provinciaId')
                    ->whereIn('farmacias.provinciaId',$provIds)
                    ->where('farmacias.distritoId',$districtId)
                    ->select('farmacias.*', 'provincias.nome as Fprov')
                    ->get();
                break;
            }


        }else{
            $farmacias = DB::table('farmacias')
            ->join('provincias', 'provincias.id', '=', 'farmacias.provinciaId')
            ->select('farmacias.*', 'provincias.nome as Fprov')
            ->get();
        }


        $provincias = provincia::all();
        $distritos = distrito::all();

        return view('farmacia.show', compact('farmacias', 'provincias','distritos','districtId','provinceId'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\farmacia  $farmacia
     * @return \Illuminate\Http\Response
     */
    public function edit(farmacia $farmacia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\farmacia  $farmacia
     * @return \Illuminate\Http\Response
     */

    public function updateFM(Request $request, farmacia $farmacia)
    {

        switch($request -> caso){

            case 1:

                if ($request->hasfile('imgP')) {
                    $file = $request->file('imgP');
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'FarmaciaPr_' . time() . '.' . $extension;
                    $file->move('upload/farmacia/', $filename);
                    $farmacia->fotoP = $filename;
                }

                $farmacia->update();


              return redirect('/farmacia/perfil/'.$farmacia->id)->with('info','  Dados actualizados com sucesso');

            break;
            case 2:

            $farmacia->nome = $request->nome;
            $farmacia->contacto = $request->contacto;
            $farmacia->email = $request->email;
            $farmacia->endereco = $request->endereco;
            $farmacia->provinciaId = $request->provincia;
            $farmacia->distritoId = $request->distrito;

            $farmacia->update();


            return redirect('/farmacia/perfil/'.$farmacia->id)->with('info','  Dados actualizados com sucesso');

            break;
            case 3:

                if ($request->hasfile('imgF')) {
                    $file = $request->file('imgF');
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'FarmaciaBg_' . time() . '.' . $extension;
                    $file->move('upload/farmacia/', $filename);
                    $farmacia->fotoF = $filename;
                }

                $farmacia-> update();


              return redirect('/farmacia/perfil/'.$farmacia->id)->with('info','  Dados actualizados com sucesso');

            break;
            case 4:

            $farmacia->adress = $request->adress;
            $farmacia->latitude = $request->latitude;
            $farmacia->longitude = $request->longitude;

            $farmacia->update();


            return redirect('/farmacia/perfil/'.$farmacia->id)->with('info','  Dados actualizados com sucesso');

            break;

        }







    }
    public function update(Request $request, farmacia $farmacia)
    {
        $farmacia->nome = $request->nome;
        $farmacia->contacto = $request->contacto;
        $farmacia->email = $request->email;
        $farmacia->endereco = $request->endereco;
        $farmacia->provinciaId = $request->provincia;


        if ($request->hasfile('imgP')) {
            $file = $request->file('imgP');
            $extension = $file->getClientOriginalExtension();
            $filename = 'FarmaciaPr_' . time() . '.' . $extension;
            $file->move('upload/farmacia/', $filename);
            $farmacia->fotoP = $filename;
        }

        if ($request->hasfile('imgF')) {
            $file = $request->file('imgF');
            $extension = $file->getClientOriginalExtension();
            $filename = 'FarmaciaBg_' . time() . '.' . $extension;
            $file->move('upload/farmacia/', $filename);
            $farmacia->fotoF = $filename;
        }

        $farmacia->adress = $request->adress;
        $farmacia->latitude = $request->latitude;
        $farmacia->longitude = $request->longitude;

        $farmacia ->update();

        return redirect('/farmacia/create')->with('info','  Dados actualizados com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\farmacia  $farmacia
     * @return \Illuminate\Http\Response
     */

    public function destroy(farmacia $farmacia,$status)
    {

        $farmacia -> estado =$status;

        $farmacia->update();

        return redirect('/farmacia/show')->with('info','  Remoção feita com sucesso');
    }
}
