<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ControllerFuncionario extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('categoria')->get();
        $funcionarios = Funcionario::get();
       return view('admin.funcionario.index',['categorias'=>$categorias,'funcionarios'=>$funcionarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $categoria = Categoria::where('id',$request->categoria_id)->first();
        if(!$user){
            Funcionario::create($request->all());
            $funcionario = Funcionario::get()->last();
            $id = $funcionario->id;
            $nome = explode(" ",$request->nome);
            User::create([
                'name'=>'#'.$nome[0],
                'email'=>$request->email,
                'password' => Hash::make('@12345'),
                'funcionario_id'=>$id,
            ])->assignRole($categoria->categoria);
            return redirect()->route('funcionarios.index');
        }
        return redirect()->route('funcionarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        Funcionario::where('id',$id)->update([
            'nome'=>$request->nome,
            'telefone'=>$request->telefone,
            'categoria_id'=>$request->categoria_id
        ]);
        $nome = explode(" ",$request->nome);

        User::where('funcionario_id',$id)->update([
            'name'=>$nome[0],
            'email'=>$request->email
        ]);

        return redirect()->route('funcionarios.index');
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
}
