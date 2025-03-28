<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Dependente;
use App\Models\Role;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        //Retornar para a view
        return view('public.index');
    }

    public function quemsomos()
    {
        //Retornar para a view
        return view('public.quemsomos');
    }

    public function servicos()
    {
        //Retornar para a view
        return view('public.servicos');
    }

    public function projetos()
    {
        //Retornar para a view
        return view('public.projetos');
    }

    public function contatos()
    {
        //Retornar para a view
        return view('public.contatos');
    }

    public function curriculum()
    {
        // Buscar as funções excluindo os IDs especificados
        $roles = Role::whereNotIn('id', [15, 16, 17, 20, 21, 22, 23, 24, 25, 26, 27, 28, 32, 33])
            ->get();
        //Retornar para a view
        return view('public.curriculum', compact('roles'));
    }

    public function store(Request $request)
    {
        dd($request);
        // dados do currículo
        $curriculum = Curriculum::create([
            // ... dados do registro principal ...
        ]);
        // Salvar os dependentes
        if ($request->input('dependentes') == 1 && $request->has('dependente')) {
            foreach ($request->input('dependente') as $dependenteData) {
                Dependente::create([
                    'curriculum_id' => $curriculum->id,
                    'nome' => $dependenteData['nome'],
                    'cpf' => $dependenteData['cpf'],
                    'data_nascimento' => $dependenteData['dataNascimento'],
                ]);
            }
        }
        //Retornar para a view
        return view('public.curriculum');
    }


}
