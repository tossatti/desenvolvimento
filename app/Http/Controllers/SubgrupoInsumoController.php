<?php

namespace App\Http\Controllers;

use App\Models\SubgrupoInsumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubgrupoInsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //recuperar os dados do BD
        $subgrupoInsumos = SubgrupoInsumo::orderBy('id')->paginate(30);

        //Retornar para a view
        return view('subgrupoInsumo.index', [
            'subgrupoInsumos' => $subgrupoInsumos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // retorna para a view
        return view('subgrupoInsumo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SubgrupoInsumo::create([
            'subgrupo' => $request->subgrupo,
        ]);
        // redirecionar para a view
        return redirect()->route('subgrupoInsumo.index')->with('success', 'Subgrupo de insumos cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubgrupoInsumo $subgrupoInsumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubgrupoInsumo $subgrupoInsumo)
    {
        //retornar para a view
        return view('subgrupoInsumo.edit', [
            'subgrupoInsumo' => $subgrupoInsumo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubgrupoInsumo $subgrupoInsumo)
    {
        //editar dados no BD
        $subgrupoInsumo->update([
            'subgrupo' => $request->subgrupo,
        ]);
        
        // redirecionar para a view
        return redirect()->route('subgrupoInsumo.index')->with('success', 'Subgrupo de insumos editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubgrupoInsumo $subgrupoInsumo)
    {
        //apagar usuário do BD
        $subgrupoInsumo->delete();
        // redirecionar para a view
        return redirect()->route('subgrupoInsumo.index')->with('success', 'Subgrupo de insumos apagado com sucesso!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $subgrupoInsumos = SubgrupoInsumo::where('subgrupo', 'like', "%$search%")
            ->paginate(30);

        return view('subgrupoinsumo.index', compact('subgrupoInsumos'));
    }

}
