<?php

namespace App\Http\Controllers;

use App\Models\Signature;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SignatureController extends Controller
{
    public function assinarDocumento(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'password' => 'required|string',
        ]);
    
        $user = User::findOrFail($request->user_id);
    
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['success' => false, 'message' => 'Senha incorreta.']);
        }
    
        $tipoAssinatura = $request->input('tipo') === 'trabalhador' ? 'trabalhador' : 'empregador';
    
        // Verifica se já existe uma assinatura para este usuário e tipo
        $existingSignature = Signature::where('user_id', $user->id)
                                    ->where('tipo_assinatura', $tipoAssinatura)
                                    ->first();
    
        if ($existingSignature) {
            return response()->json(['success' => true, 'message' => 'Documento já assinado anteriormente.', 'signature' => $existingSignature]);
        }
    
        $signature = new Signature();
        $signature->user_id = $user->id;
        $signature->tipo_assinatura = $tipoAssinatura;
        // Adicione outros campos relevantes para a sua assinatura, se necessário
        $signature->save();
    
        return response()->json(['success' => true, 'message' => 'Assinatura realizada com sucesso!', 'signature' => $signature]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Signature $signature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Signature $signature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Signature $signature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Signature $signature)
    {
        //
    }
}
