<?php

namespace App\Http\Controllers;
use App\User;
use App\locate;
use App\role_user;
use App\roleSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocateController extends Controller
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
        $user = User::all();

        $roles = roleSummary::all();


        return view('auth.locate', compact('user', 'roles'));
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

            $papel = new role_user();

            $papel-> user_id = $request-> categoriaM;

            $papel-> role_id= $request-> nomeM ;

            $papel->save();


        } catch(Exception $md){
            DB::rollback();
            return redirect('/auth/locate')->with('danger','  Ocorreu um erro ao gravar'+substr($md,0,10));
          }

          DB::commit();
          return redirect('/auth/locate')->with('success','  Usuário alocado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\locate  $locate
     * @return \Illuminate\Http\Response
     */
    public function show(locate $locate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\locate  $locate
     * @return \Illuminate\Http\Response
     */
    public function edit(locate $locate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\locate  $locate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, locate $locate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\locate  $locate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locate = new role_user();

        $locate = role_user::find($id);

        $locate->delete();

        return redirect('/auth/locate')->with('info','  Remoção feita com sucesso');
    }
}
