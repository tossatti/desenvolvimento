<?php

namespace App\Http\Controllers;

use App\Models\Meka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MekaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $logged_user =  Auth::user();
       //Retornar para a view
       return view('meka.index', compact('logged_user'));
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
    public function show(Meka $meka)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meka $meka)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meka $meka)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meka $meka)
    {
        //
    }
}
