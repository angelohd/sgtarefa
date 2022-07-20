<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerTarefa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarefas = Tarefa::get();
        return view('admin.tarefa.index',['tarefas'=>$tarefas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funcionarios = Funcionario::get();
        return view('admin.tarefa.create',['funcionarios'=>$funcionarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tarefa::create([
            'descricao'=>$request->descricao,
            'cor'=>$request->cor,
            'prioridade'=>$request->prioridade,
            'data_inicio'=>$request->data_inicio,
            'hora_inicio'=>$request->hora_inicio,
            'data_fim'=>$request->data_fim,
            'hora_fim'=>$request->hora_fim,
            'funcionario_id'=>$request->funcionario_id,
            'user_id'=>Auth::user()->id,

        ]);

        return redirect()->route('tarefa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarefa = Tarefa::where('id',$id)->first();
        $funcionarios = Funcionario::get();
        $detalhes = "sim";
        return view('admin.tarefa.show',['tarefa'=>$tarefa,'funcionarios'=>$funcionarios,'detalhes'=>$detalhes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarefa = Tarefa::where('id',$id)->first();
        $funcionarios = Funcionario::get();
        return view('admin.tarefa.edit',['tarefa'=>$tarefa,'funcionarios'=>$funcionarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Tarefa::where('id',$id)->update([
            'descricao'=>$request->descricao,
            'cor'=>$request->cor,
            'prioridade'=>$request->prioridade,
            'data_inicio'=>$request->data_inicio,
            'hora_inicio'=>$request->hora_inicio,
            'data_fim'=>$request->data_fim,
            'hora_fim'=>$request->hora_fim,
            'funcionario_id'=>$request->funcionario_id,
            'user_id'=>Auth::user()->id,

        ]);

        return redirect()->route('tarefa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function kanban(){
        return view('admin.tarefa.kanban');
    }
}
