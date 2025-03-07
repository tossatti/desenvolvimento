<?php

namespace App\Http\Controllers;

use App\Models\GrupoInsumo;
use App\Models\SubgrupoInsumo;
use Illuminate\Http\Request;

class GrupoInsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //recuperar os dados do BD
        $grupoInsumos = GrupoInsumo::orderBy('id')->get();

        //Retornar para a view
        return view('grupoInsumo.index', [
            'grupoInsumos' => $grupoInsumos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // retorna para a view
        return view('grupoInsumo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        GrupoInsumo::create([
            'grupo' => $request->grupo,
        ]);
        // redirecionar para a view
        return redirect()->route('grupoInsumo.index')->with('success', 'Grupo de insumos cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(GrupoInsumo $grupoInsumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrupoInsumo $grupoInsumo)
    {
        //retornar para a view
        return view('grupoInsumo.edit', [
            'grupoInsumo' => $grupoInsumo,
        ]);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GrupoInsumo $grupoInsumo)
    {
        //editar dados no BD
        // dados do usuário
        $grupoInsumo->update([
            'grupo' => $request->grupo,
        ]);
        
        // redirecionar para a view
        return redirect()->route('grupoInsumo.index')->with('success', 'Grupo de insumos editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrupoInsumo $grupoInsumo)
    {
        //apagar usuário do BD
        $grupoInsumo->delete();
        // redirecionar para a view
        return redirect()->route('grupoInsumo.index')->with('success', 'Grupo de insumos apagado com sucesso!');
    }
}
