<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //recuperar os dados do BD
        $roles = Role::orderBy('funcao')->paginate(30);

        //Retornar para a view
        return view('roles.index', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // criar função no bd
        Role::create([
            'funcao' => $request->funcao,
        ]);
        // view
        return redirect()->route('roles.index')->with('success', 'Função cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        ////retornar para a view
        $role->load('role');
        return view('roles.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role->update([
            'funcao' => $request->funcao,
        ]);

        return redirect()->route('roles.index')->with('success', 'Função atualizada com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //apagar dado do BD
        $role->delete();
        // redirecionar para a view
        return redirect()->route('roles.index')->with('success', 'Função apagada com sucesso!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $roles = Role::where('funcao', 'like', "%$search%")
            ->paginate(30);

        return view('roles.index', compact('roles'));
    }
}
