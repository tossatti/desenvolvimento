<?php

namespace App\Http\Controllers;

use App\Models\{GrupoInsumo, Insumo, SubgrupoInsumo};
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //recuperar os dados do BD
        $insumos = Insumo::orderBy('id')->get();
        $grupos = GrupoInsumo::orderBy('grupo')->get();
        $subgrupos = SubgrupoInsumo::orderBy('subgrupo')->get();

        //Retornar para a view
        return view('insumos.index', [
            'insumos' => $insumos,
            'grupos' => $grupos,
            'subgrupos' => $subgrupos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //recuperar os dados do BD
        $grupos = GrupoInsumo::orderBy('grupo')->get();
        $subgrupos = SubgrupoInsumo::orderBy('subgrupo')->get();
        // retorna para a view
        return view('insumos.create', [
            'grupos' => $grupos,
            'subgrupos' => $subgrupos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Insumo::create([
            'grupo' => $request->grupo,
            'subgrupo' => $request->subgrupo,
            'codigo' => $request->codigo,
            'sinapi' => $request->sinapi,
            'descricao' => $request->descricao,
            'referencia' => $request->referencia,
            'unidade' => $request->unidade,
            'valor' => $request->valor,
            'imagem' => $request->imagem,
        ]);

        // redirecionar para a view
        return redirect()->route('insumos.index')->with('success', 'Insumo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Insumo $insumo)
    {
        //retornar para a view
        return view('insumos.show', [ 'insumo' => $insumo ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insumo $insumo)
    {
        //recuperar os dados do BD
        $grupos = GrupoInsumo::orderBy('grupo')->get();
        $subgrupos = SubgrupoInsumo::orderBy('subgrupo')->get();
        //retornar para a view
        return view('insumos.edit', [ 
            'insumo' => $insumo,
            'grupos' => $grupos,
            'subgrupos' => $subgrupos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Insumo $insumo)
    {
        $insumo->update([
            'grupo' => $request->grupo,
            'subgrupo' => $request->subgrupo,
            'codigo' => $request->codigo,
            'sinapi' => $request->sinapi,
            'descricao' => $request->descricao,
            'referencia' => $request->referencia,
            'unidade' => $request->unidade,
            'valor' => $request->valor,
            'imagem' => $request->imagem,
        ]);

        // redirecionar para a view
        return redirect()->route('insumos.index')->with('success', 'Insumo editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insumo $insumo)
    {
        //apagar dado do BD
        $insumo->delete();
        // redirecionar para a view
        return redirect()->route('insumos.index')->with('success', 'Insumo apagado com sucesso!');
    }
}
