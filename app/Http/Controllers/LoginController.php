<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.index');
    }

    public function loginProcess(LoginRequest $request)
    {
        // validar as informações
        $request->validated();
        // validar o usuário e a senha no banco de dados
        $authenticated = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        // verificar se o usuário foi autenticado 
        if (!$authenticated) {
            // redirecionar para a página de login, com mensagem de erro
            return back()->withInput()->with('error', 'E-mail ou senha inválida');
        }else{
            // obter usuário autenticado
            $user = Auth::user();
            $user = User::find($user->id);
            // redirecionar usuário
            return redirect()->route('meka.index');
        }
    }

    public function destroy()
    {
        // deslogar o usuário
        Auth::logout();
        // redirecionar o usuário com mensagem de sucesso
        return redirect()->route('public.index')->with('sucess', 'Deslogado com sucesso!');
    }
}
