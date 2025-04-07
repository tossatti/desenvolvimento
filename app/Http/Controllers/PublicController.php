<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Dependente;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(Request $request)
    {
        
    }


}
