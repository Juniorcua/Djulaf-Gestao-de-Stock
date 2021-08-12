<?php

namespace App\Http\Controllers;

use App\categoria;
use App\disponibilidade;
use App\farmacia;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;

class DisponibilidadeController extends Controller
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


        $disponibilidades = DB::table('disponibilidades')
        ->join('categorias', 'categorias.id', '=', 'disponibilidades.categoriaId')
        ->select('disponibilidades.*', 'categorias.nome as Fcat')
        ->get();

        $farmacias = farmacia::all();
        $categorias =categoria::all();


        return view('disponibilidade.create', compact('farmacias','categorias','disponibilidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     function saveAll($farm_id, $categoryId,$disponibilidade=7, $collection){

        $count=0;
        if($categoryId=='todas'){
        $medicamentos = DB::table('medicamentos')
        // ->where('disponibilidades.categoriaId',$categoryId)
        ->get();

        }else{
            $medicamentos = DB::table('medicamentos')
            ->where('medicamentos.categoriaId',$categoryId)
            ->get();
        }

// DB::update('update disponiblidade set estado = 0 where estado = ?', ['1']);

                       foreach($medicamentos as $med){
                        $verifica=$this->verifica($farm_id, $med->id);

                            if(empty($verifica)){
                                $dispo=new disponibilidade();
                                $dispo->farmaciaId=$farm_id;
                                $dispo->medicamentoId=$med->id;
                                $dispo-> criadoPor= auth()->user()->id;
                                $dispo->estado='0';
                                $dispo ->save();

                                $count++;
                                $collection->push(["med_id"=>$med->id]);
                            }else{
                                if($disponibilidade==0){
                                   $dispo=disponibilidade::find($verifica->id);
                                   $dispo->estado="0";
                                   $dispo->update();
                                   $collection->push(["med_id"=>$med->id]);
                                   $count++;
                                }elseif($disponibilidade==2){
                                    $dispo=disponibilidade::find($verifica->id);
                                   $dispo->estado="1";
                                   $dispo->update();
                                   $collection->push(["med_id"=>$med->id]);
                                   $count++;

                                }
                            }

                       }

         return $count;
     }


    public function save($farm_id,Request $request)
    {
       $retorno='';
       $collection=collect([]);

        DB::beginTransaction();

        try {
              //Alocar Todos
              if($request->type==1){
               $retorno= $this->saveAll($farm_id, $request->category,1,$collection);

              //Disponibilizar todos medicamentos
              }elseif($request->type==2){
                $retorno= $this->saveAll($farm_id, $request->category,0,$collection);
                // echo "aa";

            }elseif($request->type==3){
                $retorno= $this->saveAll($farm_id, $request->category,2,$collection);
                // echo "aa";

                //alocar um unico medicamento
              }elseif($request->type==0){
               $verifica=$this->verifica($farm_id, $request->medId);

                if(!empty($verifica)){
                    $dispo= disponibilidade::find($verifica->id);
                    $dispo->estado=$request->status;
                    $dispo->update();

                }else{
                    $dispo=new disponibilidade();
                    $dispo->farmaciaId=$farm_id;
                    $dispo->medicamentoId=$request->medId;
                    $dispo->estado=$request->status;
                    $dispo ->save();
                    // echo "save";
                }
            }


    } catch (Exception  $cl) {
        DB::rollback();
        return $cl;
        // return redirect('/dispo/show/')->with('danger', '  ocorreu um erro ao gravar' + substr($cl, 0, 10));
    }

    DB::commit();
    if($request->type!=0){

            return response()->json(array(
                'Id'=>$collection,
                'count'=>$retorno
            ),200);

    }else{
        return $request->status;
    }



    }





    /**
     * Display the specified resource.
     *
     * @param  \App\disponibilidade  $disponibilidade
     * @return \Illuminate\Http\Response
     */
    public function show($farmacia_id,Request $request )
    {
        $cat = $request-> categor;

      if(!empty($cat)){



                    switch($request-> categor) {

                        case 'todas':

                         $medicamentos = DB::table('medicamentos')
                         ->join('categorias', 'categorias.id', '=', 'medicamentos.categoriaId')
                         ->select('medicamentos.*', 'categorias.nome as Fcat')
                         ->get();


                        break;

                        default:

                        $medicamentos = DB::table('medicamentos')
                        ->join('categorias', 'categorias.id', '=', 'medicamentos.categoriaId')
                        ->where('medicamentos.categoriaId',$cat)
                        ->select('medicamentos.*', 'categorias.nome as Fcat')
                        ->get();



                        break;
                    }

                } else{

                    $medicamentos = DB::table('medicamentos')
                    ->join('categorias', 'categorias.id', '=', 'medicamentos.categoriaId')
                    ->select('medicamentos.*', 'categorias.nome as Fcat')
                    ->get();


                }



                // for($i=0; $i<count($request->dispo); $i++){
                //         // if($request->dispo[$i]){
                //     echo 'selected';
                // }else{
                //     echo ' not selected';
                // }
                // }

                // if($request->ch){
                //     echo 'selected';
                // }else{
                //     echo ' not selected';
                // }


                $farmacias = farmacia::all();
                $categorias =categoria::all();

                return view('disponibilidade.create', compact('farmacias','categorias','medicamentos','cat','farmacia_id'));


    }

    function verifica($farm_id,$med_id){
        $estado=DB::table('disponibilidades')
                     ->where('disponibilidades.farmaciaId',$farm_id)
                     ->where('disponibilidades.medicamentoId',$med_id)
                    //  ->select('disponibilidades.estado as estado')
                     ->first();

         return $estado;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\disponibilidade  $disponibilidade
     * @return \Illuminate\Http\Response
     */
    public function edit(disponibilidade $disponibilidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\disponibilidade  $disponibilidade
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, disponibilidade $disponibilidade)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\disponibilidade  $disponibilidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(disponibilidade $disponibilidade)
    {
        //
    }
}
