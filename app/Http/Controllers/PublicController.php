<?php

namespace App\Http\Controllers;

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
        //Retornar para a view
        return view('public.curriculum');
    }

    public function store()
    {
        //Retornar para a view
        return view('public.curriculum');
    }


}
