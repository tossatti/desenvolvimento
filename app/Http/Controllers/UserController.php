<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Adress;
use App\Models\BancAcount;
use App\Models\Contrato;
use App\Models\PersonalDocument;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        //recuperar os dados do BD
        $users = User::orderBy('id')->get();

        //Retornar para a view
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        // recuperar informações do banco de dados
        $docs = (User::find($user->id)->documentos()->get())->first();
        $adress = (User::find($user->id)->adress()->get())->first();
        $banco = (User::find($user->id)->bancario()->get())->first();
        $contrato = (User::find($user->id)->contrato()->get())->first();
        //retornar para a view
        return view('users.show', [
            'user' => $user,
            'docs' => $docs,
            'adress' => $adress,
            'banco' => $banco,
            'contrato' => $contrato,
        ]);
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
        // dados pessoais
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // documentos pessoais
        PersonalDocument::create([
            'user_id' => $user->id,
            'cpf' => $request->cpf,
            'pis_pasep' => $request->pis,
            'titulo_eleitor' => $request->titulo,
            'cnh' => $request->cnh,
            'ctps' => $request->ctps,

        ]);

        // dados bancários
        BancAcount::create([
            'user_id' => $user->id,
            'banco' => $request->banco,
            'agencia' => $request->agencia,
            'tipoconta' => $request->tipoconta,
            'numeroConta' => $request->numeroConta,
            'tipopix' => $request->tipopix,
            'pix' => $request->pix,
        ]);

        // endereço
        Adress::create([
            'user_id' => $user->id,
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'telefone' => $request->telefone,
        ]);

        // contrato
        Contrato::create([
            'user_id' => $user->id,
            'tipoContrato' => $request->tipoContrato,
            'lotacao' => $request->lotacao,
            'equipe' => $request->equipe,
            'funcao' => $request->funcao,
            'remuneracao' => $request->remuneracao,
            'cbo' => $request->cbo,
            'situacao' => $request->situacao,
            'disponibilidade' => $request->disponibilidade,
            'aso' => $request->aso,
            'admissao' => $request->admissao,
            'termino' => $request->termino,
            'observacao' => $request->observacao,
        ]);

        // redirecionar para a view
        return redirect()->route('users.index')->with('success', 'Colaborador cadastrado com sucesso!');
    }

    public function edit(User $user)
    {
        //recuperar os dados do BD
        $docs = (User::find($user->id)->documentos()->get())->first();
        $adress = (User::find($user->id)->adress()->get())->first();
        $banco = (User::find($user->id)->bancario()->get())->first();
        $contrato = (User::find($user->id)->contrato()->get())->first();

        //retornar para a view
        return view('users.edit', [
            'user' => $user,
            'docs' => $docs,
            'adress' => $adress,
            'banco' => $banco,
            'contrato' => $contrato,
        ]);
    }

    public function update(UserRequest $request, User $user, PersonalDocument $docs)
    {

        //validar o formulário
        $request->validated();
        // recupera informaçoes do banco de dados
        $docs = (User::find($user->id)->documentos()->get())->first();
        $adress = (User::find($user->id)->adress()->get())->first();
        $banco = (User::find($user->id)->bancario()->get())->first();
        $contrato = (User::find($user->id)->contrato()->get())->first();

        //editar dados no BD
        // dados do usuário
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // atualiza informações no banco de dados
        // documentos pessoais 
        $docs->update([
            'cpf' => $request->cpf,
            'pis_pasep' => $request->pis,
            'titulo_eleitor' => $request->titulo,
            'cnh' => $request->cnh,
            'ctps' => $request->ctps,
        ]);

        // dados bancários
        $banco->update([
            'banco' => $request->banco,
            'agencia' => $request->agencia,
            'tipoconta' => $request->tipoconta,
            'numeroConta' => $request->numeroConta,
            'tipopix' => $request->tipopix,
            'pix' => $request->pix,
        ]);

        // endereço
        $adress->update([
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'telefone' => $request->telefone,
        ]);

        // Contrato
        $contrato->update([
            'tipoContrato' => $request->tipoContrato,
            'lotacao' => $request->lotacao,
            'equipe' => $request->equipe,
            'funcao' => $request->funcao,
            'remuneracao' => $request->remuneracao,
            'cbo' => $request->cbo,
            'situacao' => $request->situacao,
            'disponibilidade' => $request->disponibilidade,
            'aso' => $request->aso,
            'admissao' => $request->admissao,
            'termino' => $request->termino,
            'observacao' => $request->observacao,
        ]);




        // redirecionar para a view
        return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Colaborador editado com sucesso!');
    }

    public function destroy(User $user)
    {
        //apagar usuário do BD
        $user->delete();
        // redirecionar para a view
        return redirect()->route('users.index')->with('success', 'Colaborador apagado com sucesso!');
    }
}
