<?php

namespace App\Http\Controllers;

use App\Models\Almoxarifado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlmoxarifadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //recuperar os dados do BD
    

        //Retornar para a view
        return view('almoxarifado.index');
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
    public function show(Almoxarifado $almoxarifado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Almoxarifado $almoxarifado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Almoxarifado $almoxarifado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Almoxarifado $almoxarifado)
    {
        //
    }
}
