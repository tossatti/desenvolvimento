<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\PersonalDocument;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        //recuperar os dados do BD
        $users = User::orderByDesc('id')->get();
        // $users = User::with('documentos')->get();
        
        //Retornar para a view
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        //retornar para a view
        return view('users.show', ['user' => $user]);
    }

    public function create()
    {
        // retorna para a view
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        //validar formulário
        $request->validated();
        //cadastrar usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        PersonalDocument::create([
            'cpf' => $request->cpf,
            'pis_pasep' => $request->pis,
            'titulo_eleitor' => $request->titulo,
            'cnh' => $request->cnh, 
            'user_id' => $user->id,
        ]);

        
        // redirecionar para a view
        return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');
        
    }

    public function edit(User $user)
    {
        //recuperar os dados do BD
        $docs = (User::find($user->id)->documentos()->get())->first();
        if(!$docs){
          echo 'nada' ;
        }else{
            dd($docs->cpf);
        }
            
        
        //retornar para a view
        return view('users.edit', ['user' => $user, 'docs' => $docs]);
       
    }

    public function update(UserRequest $request, User $user)
    {
        //validar o formulário
        $request->validated();
        //editar dados no BD
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        // redirecionar para a view
        return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Usuário editado com sucesso!');
    }

    public function destroy(User $user)
    {
        //apagar usuário do BD
        $user->delete();
        // redirecionar para a view
        return redirect()->route('users.index')->with('success', 'Usuário apagado com sucesso!');
    }

}
