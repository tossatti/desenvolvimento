<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Mail\PasswordResetLink;


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

    public function reset()
    {
        return view('login.reset');
    }

    public function senha(Request $request, $token)
    {
        $passwordReset = DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subMinutes(5))
            ->first();

        if (!$passwordReset) {
            return redirect()->route('login.reset')->withErrors(['token' => 'O link para redefinição de senha é inválido ou expirou.']);
        }

        return view('login.senha', ['email' => $passwordReset->email, 'token' => $token]);
    }

    public function solicitarReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ], [
            'email.exists' => 'Não existe usuário cadastrado com este e-mail.',
        ]);

        $user = User::where('email', $request->email)->first();

        // Gerar um token único
        $token = Str::random(60);

        // Salvar o token no banco de dados
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        // Enviar o e-mail com o link de reset
        $resetLink = route('login.senha', ['token' => $token]);
        Mail::to($user->email)->send(new PasswordResetLink($resetLink));

        return back()->with('success', 'Um link para redefinição de senha foi enviado para o seu e-mail.');
    }

    public function updateSenha(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8|confirmed',
        ], [
            'email.exists' => 'Não existe usuário cadastrado com este e-mail.',
            'password.confirmed' => 'As senhas não coincidem.',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
        ]);

        $passwordReset = DB::table('password_resets')
            ->where('token', $request->token)
            ->where('email', $request->email)
            ->where('created_at', '>', Carbon::now()->subMinutes(5))
            ->first();

        if (!$passwordReset) {
            return redirect()->route('login.reset')->withErrors(['token' => 'O link para redefinição de senha é inválido ou expirou.']);
        }

        $user = User::where('email', $request->email)->first();

        // Atualizar a senha do usuário
        $user->password = Hash::make($request->password);
        $user->save();

        // Remover o token de redefinição
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Sua senha foi alterada com sucesso! Faça login com a nova senha.');
    }

    
}
